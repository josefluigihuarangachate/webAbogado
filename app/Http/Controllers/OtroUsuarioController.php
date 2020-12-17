<?php

namespace App\Http\Controllers;

use App\Models\OtroUsuario;
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

class OtroUsuarioController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loadTypeUser(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $data = DB::table(table('tipo_usuario'))
                ->where('id', '>', 2)
                ->get();
        if ($data) {
            $json = json('ok', strings('success_read'), $data);
        } else {
            $json = json('error', strings('error_read'), '');
        }
        return jsonPrint($json, $cmd);
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
                    $nombreImagen = 'AA' . date('dmYHis') . str_replace(" ", "", basename(@$_FILES["imageFile"]["name"]));
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

        $data = DB::table(table('usuario'))
                ->where('idtipo', '>', 3)
                ->get();


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
        $typeuser = htmlspecialchars(trim($request->input('Rtipo')));
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
            'Rtipo' => 'required|string',
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
                    empty($typeuser) ||
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
                            'idtipo' => $typeuser,
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
        //if ($id == 1) {
        //    $json = json('error', 'No puede eliminar estos datos', '');
        //} else {

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
        //}       

        return jsonPrint($json, $cmd);
    }

}
