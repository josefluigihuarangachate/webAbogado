<?php

namespace App\Http\Controllers;

use App\Models\TipoUsuario;
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

class TipoUsuarioController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $data = DB::table(table('tipo_usuario'))
                ->where('id', '>', 3)
                ->get();
        if ($data) {
            $json = json('ok', strings('success_login'), $data);
        } else {
            $json = json('error', strings('error_login'), '');
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
        $status = htmlspecialchars(strtolower(trim($request->input('Rtipousuario'))));

        $rules = [
            'Rnombre' => 'required|string|min:3|max:255',
            'Rtipousuario' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            if (
                    empty($name) ||
                    empty($status)
            ) {
                $json = json('error', strings('error_empty'), '');
            } else {
                $json = json('error', strings('error_option'), '');
            }
        } else {

            try {
                // Registro los datos
                $id = DB::table(table('tipo_usuario'))->insertGetId(
                        [
                            'nombre' => $name,
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

        $data = DB::table(table('tipo_usuario'))
                ->where('id', '=', $id)
                ->first();

        if ($data) {
            $json = json('ok', strings('success_login'), $data);
        } else {
            $json = json('error', strings('error_login'), '');
        }
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
        $id = htmlspecialchars(strtolower(trim($request->input('Eid'))));
        $name = htmlspecialchars(ucwords(trim($request->input('Enombre'))));
        $typeuser = htmlspecialchars(strtolower(trim($request->input('Etipousuario'))));


        $rules = [
            'Eid' => 'required|integer',
            'Enombre' => 'required|string',
            'Etipousuario' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            if (
                    empty($id) ||
                    empty($name) ||
                    empty($typeuser)
            ) {
                $json = json('error', strings('error_empty'), '');
            } else {
                $json = json('error', strings('error_option'), '');
            }
        } else {


            // Registro los datos
            $affected = DB::table(table('tipo_usuario'))
                    ->where('id', $id)
                    ->update(
                    [
                        'nombre' => $name,
                        'estado' => $typeuser,
                        'modificado_por' => session('id')
                    ],
            );

            if ($affected) {
                $json = json('ok', strings('success_update'), '');
            } else {
                $json = json('error', strings('error_update'), '');
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
        //
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $id = htmlspecialchars(strtolower(trim($request->input('id'))));



        if ($id == 1 || $id == 2 || $id == 3) {
            $json = json('error', 'No puede eliminar datos que son por defectos', '');
        } else {

            try {
                $affected = DB::table(table('tipo_usuario'))->where('id', '=', $id)->delete();
                if ($affected) {
                    $json = json('ok', strings('success_delete'), '');
                } else {
                    $json = json('ok', strings('error_delete'), '');
                }
            } catch (Throwable $t) {
                $json = json('ok', strings('error_delete'), '');
            }
        }

        return jsonPrint($json, $cmd);
    }

}
