<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
// Agregar 
use Exception;
use Illuminate\Support\Facades\DB;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

include 'tools/string.php';
include 'tools/table.php';
include 'tools/function.php'; // Si funciona
include 'tools/json.php'; // Si funciona
// Fin Agregar

class ProfileController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fotoProfile(Request $request) {

        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        if (empty(@$_FILES['imageFile']['name'])) {
            $json = json('error', 'Debe subir una imagen', '');
        } else {

            $rules = [
                'cmd' => 'required|string',
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                if (
                        empty(@$cmd)
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
                            ->where('id', session('id'))
                            ->update(
                            [
                                'foto' => $nombreImagen,
                                'modificado_por' => session('id')
                            ],
                    );

                    if ($affected && $image->move(public_path(FOLDER_CATEGORIA), $nombreImagen)) {

                        if (!empty(session('foto'))) {
                            @unlink(FOLDER_CATEGORIA . session('foto'));
                        }
                        session()->put('foto', $nombreImagen);
                        $json = json('ok', strings('success_update'), '');
                    } else {
                        $json = json('error', strings('error_update'), '');
                    }
                } catch (Exception $e) {
                    $json = json('error', strings('error_update'), '');
                }
            }
        }
        return jsonPrint($json, $cmd);
    }

    public function cargarDiagrama(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        @$antiguaImagen = htmlspecialchars(strtolower(trim($request->input('imgAntigua'))));

        if (empty(@$_FILES['imageFile']['name']) || empty($idServicio)) {
            $json = json('error', 'Debe subir una imagen', '');
        } else {

            $rules = [
                'cmd' => 'required|string',
                'imageFile' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                if (
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
                            ->where('id', session('id'))
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
        }
        return jsonPrint($json, $cmd);
    }

    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        //
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
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function editProfile(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        $id = session('id');
        $name = htmlspecialchars(ucwords(trim($request->input('Enombre'))));
        $dni = htmlspecialchars(trim($request->input('Edni')));
        $email = htmlspecialchars(trim($request->input('Ecorreo')));
        $phone = htmlspecialchars(trim($request->input('Ecelular')));
        $address = htmlspecialchars(trim($request->input('Edireccion')));
        $latitud = htmlspecialchars(trim($request->input('txtlatitud')));
        $longitud = htmlspecialchars(trim($request->input('txtlongitud')));
        $usuario = htmlspecialchars(trim($request->input('Eusuario')));
        $clave = htmlspecialchars(trim($request->input('Eclave')));

        $rules = [
            'Enombre' => 'required|string',
            'Edni' => 'required|string',
            'Ecorreo' => 'required|string',
            'Ecelular' => 'required|string',
            'Edireccion' => 'required|string',
            'txtlatitud' => 'required|string',
            'txtlongitud' => 'required|string',
            'Eusuario' => 'required|string',
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
                    empty($usuario)
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
                        'celular' => str_replace(" ", "", $phone),
                        'direccion' => $address,
                        'latitud' => $latitud,
                        'longitud' => $longitud,
                        'usuario' => $usuario,
                        'modificado_por' => session('id')
                    ],
            );

            if (!empty($clave)) {

                $opciones = [
                    'cost' => 11,
                ];

                $affected2 = DB::table(table('usuario'))
                        ->where('id', $id)
                        ->update(
                        [
                            'clave' => password_hash($clave, PASSWORD_BCRYPT, $opciones)
                        ],
                );
            }

            if ($affected) {

                $nombre = explode(' ', $name);


                // Cambiar el value de un session
                // Ejm : https://laracasts.com/discuss/channels/eloquent/how-to-set-a-session-variable

                session()->put('dni', $dni);
                session()->put('celular', $phone);
                session()->put('direccion', $address);
                session()->put('nombre', $name);
                session()->put('nombre_corto', $nombre[0] . ' ' . @$nombre[1]);
                session()->put('correo', $email);
                session()->put('usuario', $usuario);
                session()->put('latitud', $latitud);
                session()->put('longitud', $longitud);

                if (!empty($clave)) {
                    session()->put('clave', $clave);
                }

                $json = json('ok', strings('success_update'), '');
            } else {
                $json = json('error', strings('error_update'), '');
            }
        }


        return jsonPrint($json, $cmd);
    }

    public function update(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        $id = session('id');
        $name = htmlspecialchars(ucwords(trim($request->input('Enombre'))));
        $dni = htmlspecialchars(trim($request->input('Edni')));
        $email = htmlspecialchars(trim($request->input('Ecorreo')));
        $phone = htmlspecialchars(trim($request->input('Ecelular')));
        $address = htmlspecialchars(trim($request->input('Edireccion')));
        $latitud = htmlspecialchars(trim($request->input('txtlatitud')));
        $longitud = htmlspecialchars(trim($request->input('txtlongitud')));
        $usuario = htmlspecialchars(trim($request->input('Eusuario')));
        $clave = htmlspecialchars(trim($request->input('Eclave')));

        $tipo_documento = htmlspecialchars(trim($request->input('Etipo_documento')));
        $ruc_cedula = htmlspecialchars(trim($request->input('Eruc_cedula')));

        if (
                session('idtipo') == 3 && strtolower($tipo_documento) == 'ruc' && (strlen($ruc_cedula) != 10 || !is_numeric($ruc_cedula))
        ) {
            $json = json('error', 'Numero de ruc no valida', '');
        } else if (
                session('idtipo') == 3 && strtolower($tipo_documento) == 'cedula' && (strlen($ruc_cedula) != 13 || !is_numeric($ruc_cedula))
        ) {
            $json = json('error', 'Numero de cédula no valida', '');
        } else {

            $rules = [
                'Enombre' => 'required|string',
                'Edni' => 'required|string',
                'Ecorreo' => 'required|string',
                'Ecelular' => 'required|string',
                'Edireccion' => 'required|string',
                'txtlatitud' => 'required|string',
                'txtlongitud' => 'required|string',
                'Eusuario' => 'required|string',
                    //'Eruc' => 'required|integer',
                    //'Esedula' => 'required|integer',
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                if (
                        empty($id) ||
                        //empty($ruc) ||
                        //empty($sedula) ||
                        empty($name) ||
                        empty($dni) ||
                        empty($email) ||
                        empty($phone) ||
                        empty($address) ||
                        empty($latitud) ||
                        empty($longitud) ||
                        empty($usuario)
                ) {
                    $json = json('error', strings('error_empty'), '');
                } else {
                    $json = json('error', strings('error_option'), '');
                }
            } else {

                // Actualizo los datos
                $affected = DB::table(table('usuario'))
                        ->where('id', $id)
                        ->update(
                        [
                            'nombre' => $name,
                            'tipo_documento' => $tipo_documento,
                            'ruc_cedula' => $ruc_cedula,
                            'noveno_numero' => novenoNumeroDayMonth($tipo_documento, $ruc_cedula),
                            'dni' => $dni,
                            'correo' => $email,
                            'celular' => $phone,
                            'direccion' => $address,
                            'latitud' => $latitud,
                            'longitud' => $longitud,
                            'usuario' => $usuario,
                            'modificado_por' => session('id')
                        ],
                );

                if (!empty($clave)) {

                    $opciones = [
                        'cost' => 11,
                    ];

                    $affected2 = DB::table(table('usuario'))
                            ->where('id', $id)
                            ->update(
                            [
                                'clave' => password_hash($clave, PASSWORD_BCRYPT, $opciones)
                            ],
                    );
                }

                if ($affected) {

                    $nombre = explode(' ', $name);


                    // Cambiar el value de un session
                    // Ejm : https://laracasts.com/discuss/channels/eloquent/how-to-set-a-session-variable

                    session()->put('dni', $dni);
                    session()->put('tipo_documento', $tipo_documento);
                    session()->put('ruc_cedula', $ruc_cedula);
                    session()->put('celular', $phone);
                    session()->put('direccion', $address);
                    session()->put('nombre', $name);
                    session()->put('nombre_corto', $nombre[0] . ' ' . @$nombre[1]);
                    session()->put('correo', $email);
                    session()->put('usuario', $usuario);
                    session()->put('latitud', $latitud);
                    session()->put('longitud', $longitud);

                    if (!empty($clave)) {
                        session()->put('clave', $clave);
                    }

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
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        //
    }

}
