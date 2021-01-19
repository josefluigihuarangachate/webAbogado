<?php

namespace App\Http\Controllers;

use App\Models\Login;
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

class LoginController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return redirect('/app');
    }

    public function index(Request $request) {
        // Login de usuario
        $usuario = htmlspecialchars(trim($request->input('logUser')));
        $clave = htmlspecialchars(trim($request->input('logClave')));
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        $rules = [
            'logUser' => 'required|string|min:4|max:255',
            'logClave' => 'required|string|min:4|max:255'
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
                    )->whereIn(table('usuario') . '.idtipo', [2, 3])
                    ->first();

            if ($data && password_verify($clave, $data->clave)) {
                $json = json('ok', strings('success_login'), $data);
                $json['redirect'] = "/dashboardUser";

                session_start();
                session_regenerate_id(true);
                $name = $data->nombre;
                $nombre = explode(' ', $name);


                $foto = $data->foto;
                if (empty($data->foto)) {
                    // Ruta general/fotos/
                    //$foto = "empty/empty-photo.jpg";
                    $foto = "";
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


                $suscripcion = DB::table(table('suscripcion'))->where('idusuario', $data->id)->first();
                $restan_horas = "0";
                if ($suscripcion) {
                    $restan_horas = $suscripcion->segundos;
                }
                session(['restan_horas' => $restan_horas]);
            } else {
                $json = json('error', strings('error_login'), '');
            }
        }

        return jsonPrint($json, $cmd);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {

        $nombre = htmlspecialchars(ucwords(trim($request->input('regName'))));
        $correo = htmlspecialchars(trim($request->input('regEmail')));
        $usuario = htmlspecialchars(trim($request->input('regUser')));
        $clave = htmlspecialchars(trim($request->input('regClave')));
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        $rules = [
            'regName' => 'required|string|min:3|max:255',
            'regEmail' => 'required|string|email|max:255',
            'regUser' => 'required|string|min:4|max:255',
            'regClave' => 'required|string|min:4|max:255'
        ];
        $validator = Validator::make($request->all(), $rules);

        $verify_user = DB::table(table('usuario'))->where('usuario', $usuario)->first();

        if ($validator->fails()) {
            if (
                    empty($nombre) ||
                    empty($correo) ||
                    empty($usuario) ||
                    empty($clave)
            ) {
                $json = json('error', strings('error_empty'), '');
            } else {
                $json = json('error', strings('error_option'), '');
            }
        } else if (!empty($verify_user)) {
            // Verifico si el usuario existe
            $json = json('error', strings('verify_user'), '');
        } else {

            $opciones = [
                'cost' => 11,
            ];

            // Registro los datos
            $id = DB::table(table('usuario'))->insertGetId(
                    [
                        'nombre' => $nombre,
                        'correo' => $correo,
                        'usuario' => $usuario,
                        'clave' => password_hash($clave, PASSWORD_BCRYPT, $opciones)
                    ]
            );

            if ($id) {
                $json = json('ok', strings('success_create'), $id);
            } else {
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
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        //
    }

}
