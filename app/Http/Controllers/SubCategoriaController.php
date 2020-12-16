<?php

namespace App\Http\Controllers;

use App\Models\SubCategoria;
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

class SubCategoriaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function loadCategory(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $data = DB::table(table('categoria'))
                ->where('id', '>', 0)
                ->get();
        if ($data) {
            $json = json('ok', strings('success_login'), $data);
        } else {
            $json = json('error', strings('error_login'), '');
        }
        return jsonPrint($json, $cmd);
    }

    public function index(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        $data = DB::table(table('subcategoria'))
                ->join(table('categoria'), function ($join) {
                    $join->on(table('categoria') . '.id', '=', table('subcategoria') . '.idcategoria')
                    ->orWhere(table('subcategoria') . '.id', '=', null);
                })
                ->select(table('subcategoria') . '.*', table('categoria') . '.nombre AS nombrecategoria')
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
        $code = htmlspecialchars(strtoupper(trim($request->input('Rcodigo'))));
        $name = htmlspecialchars(ucwords(trim($request->input('Rnombre'))));
        $describe = htmlspecialchars(trim($request->input('Rdescripcion')));
        $category = htmlspecialchars(trim($request->input('Rcategoria')));
        $status = htmlspecialchars(strtolower(trim($request->input('Restado'))));

        $rules = [
            'Rcodigo' => 'required|string',
            'Rnombre' => 'required|string|min:3|max:255',
            'Rdescripcion' => 'required|string',
            'Rcategoria' => 'required|integer',
            'Restado' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            if (
                    empty($code) ||
                    empty($name) ||
                    empty($describe) ||
                    empty($category) ||
                    empty($status)
            ) {
                $json = json('error', strings('error_empty'), '');
            } else {
                $json = json('error', strings('error_option'), '');
            }
        } else {

            try {
                // Registro los datos
                $id = DB::table(table('subcategoria'))->insertGetId(
                        [
                            'codigo' => $code,
                            'nombre' => $name,
                            'descripcion' => $describe,
                            'idcategoria' => $category,
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
     * @param  \App\Models\SubCategoria  $subCategoria
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $id = htmlspecialchars(strtolower(trim($request->input('id'))));

        $data = DB::table(table('subcategoria'))
                ->where('id', '=', $id)
                ->first();

        if ($data) {
            $json = json('ok', strings('success_read'), $data);
        } else {
            $json = json('error', strings('error_read'), '');
        }

        $categorias = DB::table(table('categoria'))->where('estado', 'activo')->get();
        $json['categories'] = $categorias;
        return jsonPrint($json, $cmd);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategoria  $subCategoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategoria  $subCategoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        $id = htmlspecialchars(strtolower(trim($request->input('Eid'))));
        $code = htmlspecialchars(strtoupper(trim($request->input('Ecodigo'))));
        $name = htmlspecialchars(ucwords(trim($request->input('Enombre'))));
        $describe = htmlspecialchars(trim($request->input('Edescripcion')));
        $idcategory = htmlspecialchars(trim($request->input('Ecategoria')));
        $status = htmlspecialchars(strtolower(trim($request->input('Eestado'))));


        $rules = [
            'Eid' => 'required|integer',
            'Ecodigo' => 'required|string',
            'Enombre' => 'required|string',
            'Edescripcion' => 'required|string',
            'Ecategoria' => 'required|integer',
            'Eestado' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            if (
                    empty($id) ||
                    empty($code) ||
                    empty($name) ||
                    empty($describe) ||
                    empty($idcategory) ||
                    empty($status)
            ) {
                $json = json('error', strings('error_empty'), '');
            } else {
                $json = json('error', strings('error_option'), '');
            }
        } else {


            // Registro los datos
            $affected = DB::table(table('subcategoria'))
                    ->where('id', $id)
                    ->update(
                    [
                        'codigo' => $code,
                        'nombre' => $name,
                        'estado' => $status,
                        'descripcion' => $describe,
                        'idcategoria' => $idcategory,
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
     * @param  \App\Models\SubCategoria  $subCategoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $id = htmlspecialchars(strtolower(trim($request->input('id'))));

        // SELECCIONO TODO LA SUBCATEGORIA PARA AVERIGUAR SI EL IDCATEGORIA TIENE DATO
        $categoria = DB::table(table('subcategoria'))->where('id', $id)->first();

        if (@$categoria->idcategoria) {
            $json = json('error', strings('relative_data'), '');
        } else {

            try {
                $affected = DB::table(table('subcategoria'))->where('id', '=', $id)->delete();
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
