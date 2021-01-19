<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
// Agregar 
use Auth;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

include 'tools/string.php';
include 'tools/table.php';
include 'tools/function.php'; // Si funciona
include 'tools/json.php'; // Si funciona
// Fin Agregar

class AdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request) {
        // Login de usuario
        $usuario = htmlspecialchars(trim($request->input('usuario')));
        $clave = htmlspecialchars(trim($request->input('clave')));
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        $rules = [
            'usuario' => 'required|string|min:4|max:255',
            'clave' => 'required|string|min:4|max:255'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            if (
                    empty($usuario) ||
                    empty($clave)
            ) {
                $json = json('error', strings('error_empty'), '');
            } else {
                $json = json('error', strings('error_option'), '');
            }
        } else {
            // Login de usuario
            $data = DB::table(table('usuario'))
                    ->join(table('tipo_usuario'), function ($join) {
                        $join->on(
                                table('tipo_usuario') . '.id', '=', table('usuario') . '.idtipo'
                        )
                        ->where(
                                [
                                    [table('tipo_usuario') . '.estado', '=', 'activo'],
                                ]
                        );
                    })
                    ->select(
                            [
                                table('usuario') . '.*',
                                table('tipo_usuario') . '.nombre AS tipo_usuario',
                                table('tipo_usuario') . '.estado AS estado_tipo',
                            ]
                    )
                    ->where(
                            [
                                [table('usuario') . '.usuario', '=', $usuario],
                                [table('usuario') . '.estado', '=', 'activo'],
                            ]
                    )->whereNotIn(table('usuario') . '.idtipo', [2, 3]) // QUE SEA ADMINISTRADOR
                    ->first();
                    
            if ($data && password_verify($clave, $data->clave)) {
                $json = json('ok', strings('success_login'), $data);
                $json['redirect'] = "/dashboardAdmin";

                session_start();
                session_regenerate_id(true);
                $name = $data->nombre;
                $nombre = explode(' ', $name);


                $foto = $data->foto;
                if (empty($data->foto)) {
                    $foto = "empty/empty-photo.jpg";
                }
                session(['acceso' => true]);
                session(['id' => $data->id]);
                session(['tipo_documento' => $data->tipo_documento]);
                session(['ruc_cedula' => $data->ruc_cedula]);
                session(['foto' => $foto]);
                session(['dni' => $data->dni]);
                session(['celular' => $data->celular]);
                session(['direccion' => $data->direccion]);
                session(['nombre' => $data->nombre]);
                session(['nombre_corto' => @$nombre[0] . ' ' . @$nombre[1]]);
                session(['correo' => $data->correo]);
                session(['usuario' => $data->usuario]);
                session(['clave' => $data->clave]);
                session(['idonesignal' => $data->idonesignal]);
                session(['idtipo' => $data->idtipo]);
                session(['estado' => $data->estado]);
                session(['tipo_usuario' => $data->tipo_usuario]);
                session(['estado_tipo' => $data->estado_tipo]);
                session(['latitud' => $data->latitud]);
                session(['longitud' => $data->longitud]);
                session(['modificado_por' => $data->modificado_por]);
            } else {
                $json = json('error', strings('error_login'), '');
            }
        }
        return jsonPrint($json, $cmd);
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        $_SESSION = array();
        session_write_close();
        setcookie(session_name(), '', 0, '/');

        Auth::logout();
        Session::flush();

        session(['acceso' => false]);
        return redirect('/');
    }

    public function cargarImgUser(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $idCategoria = htmlspecialchars(strtolower(trim($request->input('idadmin'))));
        @$antiguaImagen = htmlspecialchars(strtolower(trim($request->input('imgAntigua'))));

        if (empty(@$_FILES['imageFile']['name']) || empty($idCategoria)) {
            $json = json('error', 'Debe subir una imagen', '');
        } else {

            $rules = [
                'idadmin' => 'required|integer',
                'cmd' => 'required|string',
                'imageFile' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                if (
                        empty($idCategoria) ||
                        empty(@$antiguaImagen)
                ) {
                    $json = json('error', strings('error_empty'), '');
                } else {
                    $json = json('error', strings('error_option'), '');
                }
            } else {

                try {

                    // Ejm : https://stackoverrun.com/es/q/5101323

                    $image = $request->file('imageFile');
                    $rutaTemporal = @$_FILES['imageFile']['tmp_name'];
                    $nombreImagen = 'Profile' . date('dmYHis') . str_replace(" ", "", basename(@$_FILES["imageFile"]["name"]));
                    $rutaDestino = FOLDER_CATEGORIA . $nombreImagen;

                    // Registro los datos
                    $affected = DB::table(table('usuario'))
                            ->where('id', $idCategoria)
                            ->update(
                            [
                                'foto' => $nombreImagen,
                                'modificado_por' => session('id')
                            ],
                    );

                    if ($affected && $image->move(public_path(FOLDER_CATEGORIA), $nombreImagen)) {

                        if (!empty(@$antiguaImagen)) {
                            @unlink(FOLDER_CATEGORIA . @$antiguaImagen);
                        }

                        $json = json('ok', strings('success_update'), '');
                    } else {
                        $json = json('error', strings('error_update'), '');
                    }
                } catch (Exception $e) {
                    $json = json('error', strings('error_update'), '');
                }
            }

            return jsonPrint($json, $cmd);
        }
    }

    public function index(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        $data = "";
        if (session('id') == 1) {
            $data = DB::table(table('usuario'))
                    ->where('idtipo', '=', 1)
                    ->get();
        } else {
            $data = DB::table(table('usuario'))
                    ->where([
                        ['idtipo', '=', 1],
                        ['id', '!=', 1]
                    ])
                    ->get();
        }

        if ($data) {
            $json = json('ok', strings('success_read'), $data);
        } else {
            $json = json('error', strings('error_read'), '');
        }
        return jsonPrint($json, $cmd);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        $name = htmlspecialchars(ucwords(trim($request->input('Rnombre'))));
        $dni = htmlspecialchars(trim($request->input('Rdni')));
        $email = htmlspecialchars(trim($request->input('Rcorreo')));
        $phone = htmlspecialchars(trim($request->input('Rcelular')));
        $address = htmlspecialchars(trim($request->input('Rdireccion')));
        $latitud = htmlspecialchars(trim($request->input('txtlatitud')));
        $longitud = htmlspecialchars(trim($request->input('txtlongitud')));
        $usuario = htmlspecialchars(trim($request->input('Rusuario')));
        $clave = htmlspecialchars(trim($request->input('Rclave')));
        $status = htmlspecialchars(trim($request->input('Restado')));

        $rules = [
            'Rnombre' => 'required|string',
            'Rdni' => 'required|string',
            'Rcorreo' => 'required|string',
            'Rcelular' => 'required|string',
            'Rdireccion' => 'required|string',
            'txtlatitud' => 'required|string',
            'txtlongitud' => 'required|string',
            'Rusuario' => 'required|string',
            'Rclave' => 'required|string',
            'Restado' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);

        $verify_user = DB::table(table('usuario'))->where('usuario', $usuario)->first();

        if ($verify_user) {
            $json = json('error', strings('verify_user'), '');
        } else if ($validator->fails()) {
            if (
                    empty($name) ||
                    empty($dni) ||
                    empty($email) ||
                    empty($phone) ||
                    empty($address) ||
                    empty($latitud) ||
                    empty($longitud) ||
                    empty($usuario) ||
                    empty($clave) ||
                    empty($status)
            ) {
                $json = json('error', strings('error_empty'), '');
            } else {
                $json = json('error', strings('error_option'), '');
            }
        } else {



            try {
                $opciones = [
                    'cost' => 11,
                ];

                // Registro los datos
                $id = DB::table(table('usuario'))->insertGetId(
                        [
                            'nombre' => $name,
                            'dni' => $dni,
                            'correo' => $email,
                            'celular' => $phone,
                            'direccion' => $address,
                            'latitud' => $latitud,
                            'longitud' => $longitud,
                            'usuario' => $usuario,
                            'clave' => password_hash($clave, PASSWORD_BCRYPT, $opciones),
                            'idtipo' => 1,
                            'estado' => $status,
                            'modificado_por' => session('id')
                        ]
                );

                if ($id) {
                    $json = json('ok', strings('success_create'), '');
                } else {
                    $json = json('error', strings('error_create'), '');
                }
            } catch (Exception $e) {
                $json = json('error', strings('error_create'), '');
            }
        }
        return jsonPrint($json, $cmd);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $id = htmlspecialchars(strtolower(trim($request->input('id'))));

        $data = DB::table(table('usuario'))
                ->where('id', '=', $id)
                ->first();

        if ($data) {
            $json = json('ok', strings('success_read'), $data);
        } else {
            $json = json('error', strings('error_read'), '');
        }

        $tipo_usuario = DB::table(table('tipo_usuario'))->where('estado', 'activo')->get();
        $json['typeuser'] = $tipo_usuario;
        return jsonPrint($json, $cmd);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        $id = htmlspecialchars(trim($request->input('Eid')));
        $name = htmlspecialchars(ucwords(trim($request->input('Enombre'))));
        $dni = htmlspecialchars(trim($request->input('Edni')));
        $email = htmlspecialchars(trim($request->input('Ecorreo')));
        $phone = htmlspecialchars(trim($request->input('Ecelular')));
        $address = htmlspecialchars(trim($request->input('Edireccion')));
        $latitud = htmlspecialchars(trim($request->input('txtlatitud')));
        $longitud = htmlspecialchars(trim($request->input('txtlongitud')));
        $usuario = htmlspecialchars(trim($request->input('Eusuario')));
        $tipo = htmlspecialchars(trim($request->input('Etipo')));
        $status = htmlspecialchars(trim($request->input('Eestado')));


        if ($id == 1) {
            $json = json('error', 'No puede editar los datos del Super Administrador', '');
        } else {


            $rules = [
                'Eid' => 'required|integer',
                'Enombre' => 'required|string',
                'Edni' => 'required|string',
                'Ecorreo' => 'required|string',
                'Ecelular' => 'required|string',
                'Edireccion' => 'required|string',
                'txtlatitud' => 'required|string',
                'txtlongitud' => 'required|string',
                'Eusuario' => 'required|string',
                'Etipo' => 'required|integer',
                'Eestado' => 'required|string',
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                if (
                        empty($id) ||
                        empty($name) ||
                        empty($dni) ||
                        empty($email) ||
                        empty($phone) ||
                        empty($address) ||
                        empty($latitud) ||
                        empty($longitud) ||
                        empty($usuario) ||
                        empty($tipo) ||
                        empty($status)
                ) {
                    $json = json('error', strings('error_empty'), '');
                } else {
                    $json = json('error', strings('error_option'), '');
                }
            } else {


                // Registro los datos
                $affected = DB::table(table('usuario'))
                        ->where('id', $id)
                        ->update(
                        [
                            'nombre' => $name,
                            'dni' => $dni,
                            'correo' => $email,
                            'celular' => $phone,
                            'direccion' => $address,
                            'latitud' => $latitud,
                            'longitud' => $longitud,
                            'usuario' => $usuario,
                            'idtipo' => $tipo,
                            'estado' => $status,
                            'modificado_por' => session('id')
                        ],
                );

                if ($affected) {
                    $json = json('ok', strings('success_update'), '');
                } else {
                    $json = json('error', strings('error_update'), '');
                }
            }
        }

        return jsonPrint($json, $cmd);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $id = htmlspecialchars(trim($request->input('id')));

        // SELECCIONO TODO LA SUBCATEGORIA PARA AVERIGUAR SI EL IDCATEGORIA TIENE DATO
        //$categoria = DB::table(table('subcategoria'))->where('id', $id)->first();

        if ($id == 1) {
            $json = json('error', 'No puede eliminar estos datos', '');
        } else {

            try {
                $affected = DB::table(table('usuario'))->where('id', '=', $id)->delete();
                if ($affected) {
                    $json = json('ok', strings('success_delete'), '');
                } else {
                    $json = json('ok', strings('error_delete'), '');
                }
            } catch (Exception $t) {
                $json = json('ok', strings('error_delete'), '');
            }
        }

        return jsonPrint($json, $cmd);
    }

}
