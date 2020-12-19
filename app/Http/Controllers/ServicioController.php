<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
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

class ServicioController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loadSubCategory(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $data = DB::table(table('subcategoria'))
                ->where([
                    ['estado', '=', 'activo'],
                ])
                ->get();
        if ($data) {
            $json = json('ok', strings('success_read'), $data);
        } else {
            $json = json('error', strings('error_read'), '');
        }
        return jsonPrint($json, $cmd);
    }

    public function loadLaywer(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $data = DB::table(table('usuario'))
                ->where([
                    ['estado', '=', 'activo'],
                    ['idtipo', '=', 2], // TIPO 2 SON ABOGADOS
                ])
                ->get();
        if ($data) {
            $json = json('ok', strings('success_read'), $data);
        } else {
            $json = json('error', strings('error_read'), '');
        }
        return jsonPrint($json, $cmd);
    }

    public function index(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        $data = DB::table(table('servicio'))
                ->join(table('subcategoria'), function ($join) {
                    $join->on(table('subcategoria') . '.id', '=', table('servicio') . '.idsubcategoria')
                    ->orWhere(table('subcategoria') . '.id', '=', null);
                })
                ->join(table('usuario'), function ($join) {
                    $join->on(table('usuario') . '.id', '=', table('servicio') . '.idusuario')
                    ->orWhere(table('servicio') . '.idusuario', '=', null);
                })
                ->select(
                        table('servicio') . '.*',
                        table('subcategoria') . '.nombre AS nombresubcategoria',
                        table('usuario') . '.nombre AS nombreabogado'
                )
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
        $lawyer = htmlspecialchars(strtoupper(trim($request->input('Rabogado'))));
        $subcategory = htmlspecialchars(ucwords(trim($request->input('Rsubcategoria'))));
        $name = htmlspecialchars(trim($request->input('Rnombre')));
        $describe = htmlspecialchars(trim($request->input('Rdescripcion')));
        $price = htmlspecialchars(strtolower(trim($request->input('Rprecio'))));
        $status = htmlspecialchars(strtolower(trim($request->input('Restado'))));

        $rules = [
            'Rabogado' => 'required|integer',
            'Rsubcategoria' => 'required|integer',
            'Rnombre' => 'required|string|min:3|max:255',
            'Rdescripcion' => 'required|string',
            'Rprecio' => 'required|string',
            'Restado' => 'required|string',
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            if (
                    empty($lawyer) ||
                    empty($name) ||
                    empty($describe) ||
                    empty($subcategory) ||
                    empty($price) ||
                    empty($status)
            ) {
                $json = json('error', strings('error_empty'), '');
            } else {
                $json = json('error', strings('error_option'), '');
            }
        } else {

            try {
                // Registro los datos
                $id = DB::table(table('servicio'))->insertGetId(
                        [
                            'idsubcategoria' => $subcategory,
                            'idusuario' => $lawyer,
                            'nombre' => $name,
                            'descripcion' => $describe,
                            'precio' => number_format($price, 2, '.', ''),
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
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $id = htmlspecialchars(strtolower(trim($request->input('id'))));

        $data = DB::table(table('servicio'))
                ->where('id', '=', $id)
                ->first();

        if ($data) {
            $json = json('ok', strings('success_read'), $data);
        } else {
            $json = json('error', strings('error_read'), '');
        }

        $abogado = DB::table(table('usuario'))->where('idtipo', 2)->get(); // 2 = Abogado
        $json['lawyer'] = $abogado;

        $subcategorias = DB::table(table('subcategoria'))->get();
        $json['subcategory'] = $subcategorias;
        return jsonPrint($json, $cmd);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        $id = htmlspecialchars(strtolower(trim($request->input('Eid'))));
        $name = htmlspecialchars(ucwords(trim($request->input('Enombre'))));
        $price = htmlspecialchars(trim($request->input('Eprecio')));
        $describe = htmlspecialchars(trim($request->input('Edescripcion')));
        $idlawyer = htmlspecialchars(trim($request->input('Eabogado')));
        $idsubcategory = htmlspecialchars(trim($request->input('Esubcategoria')));
        $status = htmlspecialchars(strtolower(trim($request->input('Eestado'))));


        $rules = [
            'Eid' => 'required|integer',
            'Enombre' => 'required|string',
            'Eprecio' => 'required|string',
            'Edescripcion' => 'required|string',
            'Eabogado' => 'required|integer',
            'Esubcategoria' => 'required|integer',
            'Eestado' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            if (
                    empty($id) ||
                    empty($price) ||
                    empty($name) ||
                    empty($describe) ||
                    empty($idlawyer) ||
                    empty($idsubcategory) ||
                    empty($status)
            ) {
                $json = json('error', strings('error_empty'), '');
            } else {
                $json = json('error', strings('error_option'), '');
            }
        } else {


            // Registro los datos
            $affected = DB::table(table('servicio'))
                    ->where('id', $id)
                    ->update(
                    [
                        'nombre' => $name,
                        'precio' => number_format($price, 2, '.', ''),
                        'descripcion' => $describe,
                        'idusuario' => $idlawyer,
                        'idsubcategoria' => $idsubcategory,
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

        return jsonPrint($json, $cmd);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $id = htmlspecialchars(intval(trim($request->input('id'))));

        // ANTES DE ELIMINAR CONSULTO SI ESTE ID NO ESTA ANIDADO CON LOS SERVICIOS DEL USUARIO
        //$servicio = DB::table(table('servicio'))->where('idsubcategoria', $id)->first();
        //if ($servicio) {
        //    $json = json('error', strings('error_anidado'), '');
        //} else if (@$categoria->idcategoria) {
        //    $json = json('error', strings('relative_data'), '');
        //} else {

        try {
            $affected = DB::table(table('servicio'))->where('id', '=', $id)->delete();
            if ($affected) {
                $json = json('ok', strings('success_delete'), '');
            } else {
                $json = json('ok', strings('error_delete'), '');
            }
        } catch (Throwable $t) {
            $json = json('ok', strings('error_delete'), '');
        }
        //}

        return jsonPrint($json, $cmd);
    }

}
