<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
// Agregar 
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

    public function index(Request $request) {
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
                                        [table('usuario') . '.idtipo', '=', 1], // QUE SEA ADMINISTRADOR
                                        [table('usuario') . '.estado', '=', 'activo'],
                                    ]
                            )->first();

            if ($data && password_verify($clave, $data->clave)) {
                $json = json('ok', strings('success_login'), $data);
                $json['redirect'] = "/dashboardAdmin";

                session_start();
                session_regenerate_id(true);
                $name = $data->nombre;
                $nombre = explode(' ', $name);


                $foto = $data->foto;
                if (empty($data->foto)) {
                    $foto = "general/fotos/empty/empty-photo.jpg";
                }
                session(['acceso' => true]);
                session(['id' => $data->id]);
                session(['foto' => $foto]);
                session(['nombre' => $data->nombre]);
                session(['nombre_corto' => $nombre[0] . ' ' . @$nombre[1]]);
                session(['correo' => $data->correo]);
                session(['usuario' => $data->usuario]);
                session(['clave' => $data->clave]);
//                session(['fecha_registro' => $data->fecha_registro]);
                session(['idtipo' => $data->idtipo]);
                session(['estado' => $data->estado]);
                session(['tipo_usuario' => $data->tipo_usuario]);
                session(['estado_tipo' => $data->estado_tipo]);
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
    public function create() {
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin) {
        //
    }

}
