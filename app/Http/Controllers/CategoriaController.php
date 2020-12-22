<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
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

class CategoriaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cargarImgCategory(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $idCategoria = htmlspecialchars(strtolower(trim($request->input('idCategoria'))));
        @$antiguaImagen = htmlspecialchars(strtolower(trim($request->input('imgAntigua'))));

        if (empty(@$_FILES['imageFile']['name']) || empty($idCategoria)) {
            $json = json('error', 'Debe subir una imagen', '');
        } else {

            $rules = [
                'idCategoria' => 'required|integer',
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
                    $nombreImagen = 'Category' . date('dmYHis') . str_replace(" ", "", basename(@$_FILES["imageFile"]["name"]));
                    $rutaDestino = FOLDER_CATEGORIA . $nombreImagen;

                    // Registro los datos
                    $affected = DB::table(table('categoria'))
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
        }
        return jsonPrint($json, $cmd);
    }

    public function index(Request $request) {
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
        $status = htmlspecialchars(strtolower(trim($request->input('Restado'))));

        $rules = [
            'Rcodigo' => 'required|string',
            'Rnombre' => 'required|string|min:3|max:255',
            'Rdescripcion' => 'required|string',
            'Restado' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            if (
                    empty($code) ||
                    empty($name) ||
                    empty($describe) ||
                    empty($status)
            ) {
                $json = json('error', strings('error_empty'), '');
            } else {
                $json = json('error', strings('error_option'), '');
            }
        } else {

            try {
                // Registro los datos
                $id = DB::table(table('categoria'))->insertGetId(
                        [
                            'codigo' => $code,
                            'nombre' => $name,
                            'descripcion' => $describe,
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
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $id = htmlspecialchars(strtolower(trim($request->input('id'))));

        $data = DB::table(table('categoria'))
                ->where('id', '=', $id)
                ->first();

        if ($data) {
            $json = json('ok', strings('success_read'), $data);
        } else {
            $json = json('error', strings('error_read'), '');
        }
        return jsonPrint($json, $cmd);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        $id = htmlspecialchars(strtolower(trim($request->input('Eid'))));
        $code = htmlspecialchars(strtoupper(trim($request->input('Ecodigo'))));
        $name = htmlspecialchars(ucwords(trim($request->input('Enombre'))));
        $describe = htmlspecialchars(trim($request->input('Edescripcion')));
        $status = htmlspecialchars(strtolower(trim($request->input('Eestado'))));


        $rules = [
            'Eid' => 'required|integer',
            'Ecodigo' => 'required|string',
            'Enombre' => 'required|string',
            'Edescripcion' => 'required|string',
            'Eestado' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            if (
                    empty($id) ||
                    empty($code) ||
                    empty($name) ||
                    empty($describe) ||
                    empty($status)
            ) {
                $json = json('error', strings('error_empty'), '');
            } else {
                $json = json('error', strings('error_option'), '');
            }
        } else {


            // Registro los datos
            $affected = DB::table(table('categoria'))
                    ->where('id', $id)
                    ->update(
                    [
                        'codigo' => $code,
                        'nombre' => $name,
                        'estado' => $status,
                        'descripcion' => $describe,
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
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        //
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $id = htmlspecialchars(strtolower(trim($request->input('id'))));
        @$imageAntigua = htmlspecialchars(trim($request->input('imageAntigua')));

        $anidado = DB::table(table('servicio'))->where('idcategoria', $id)->first();

        if ($anidado) {
            $json = json('error', strings('relative_data'), '');
        } else {

            try {
                $affected = DB::table(table('categoria'))->where('id', '=', $id)->delete();
                if ($affected) {

                    if (!empty(@$imageAntigua)) {
                        unlink(FOLDER_CATEGORIA . @$imageAntigua);
                    }
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
