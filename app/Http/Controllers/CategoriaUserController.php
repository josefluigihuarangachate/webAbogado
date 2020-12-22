<?php

namespace App\Http\Controllers;

use App\Models\CategoriaUser;
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

class CategoriaUserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sessionServiceGeneral(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $idcategory = htmlspecialchars(intval(trim($request->input('idcategoria'))));
        session(['idCategoryTemp' => $idcategory]);
    }

    public function loadServiceGeneral(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        if (session('idtipo') == 2) { // ABOGADO
        } else if (session('idtipo') == 3) { // CLIENTE
            // $data = DB::table(table('servicio'))->where('idcategoria', session('idCategoryTemp'))->get();
            $data = DB::table(table('servicio'))
                    ->join(table('usuario'), table('usuario') . '.id', '=', table('servicio') . '.idusuario')
                    ->join(table('categoria'), table('categoria') . '.id', '=', table('servicio') . '.idcategoria')
                    ->select(
                            table('servicio') . '.icono',
                            table('servicio') . '.nombre',                            
                            table('servicio') . '.precio',
                            table('usuario') . '.nombre AS nombreAbogado',
                    )
                    ->where([
                        [table('servicio') . '.idcategoria', '=', session('idCategoryTemp')],
                        [table('categoria') . '.estado', '=', 'activo'],
                        [table('servicio') . '.estado', '=', 'activo'],
                        [table('usuario') . '.idtipo', '=', 2]
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

    public function loadCategoryGeneral(Request $request) {

        // Ejm quitar datos duplicados :
        // https://stackoverflow.com/questions/5036403/remove-duplicate-items-from-an-array

        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $data = "";

        if (session('idtipo') == 2) {
            // PARA EL ABOGADO
            $data = DB::table(table('servicio'))
                            ->select(
                                    table('categoria') . '.id',
                                    table('categoria') . '.foto',
                                    table('categoria') . '.nombre',
                                    //'users.*',
                                    //'contacts.phone',
                                    //'orders.price'
                            )
                            //->join(table('subcategoria'), table('subcategoria') . '.id', '=', table('servicio') . '.idsubcategoria')
                            ->join(table('categoria'), table('categoria') . '.id', '=', table('servicio') . '.idcategoria')
                            ->where([
                                [table('servicio') . '.idusuario', '=', session('id')],
                                [table('servicio') . '.estado', '=', 'activo'],
                                [table('categoria') . '.estado', '=', 'activo'],
                            ])->get();

            $data = @array_unique(objectToArray($data), SORT_REGULAR);
            sort($data);
        } else {
            // PARA EL CLIENTE
            $data = DB::table(table('servicio'))
                            ->select(
                                    table('categoria') . '.id',
                                    table('categoria') . '.foto',
                                    table('categoria') . '.nombre',
                            )
                            ->join(table('categoria'), table('categoria') . '.id', '=', table('servicio') . '.idcategoria')
                            ->where([
                                [table('servicio') . '.estado', '=', 'activo'],
                                [table('categoria') . '.estado', '=', 'activo'],
                            ])->get();

            $data = @array_unique(objectToArray($data), SORT_REGULAR);
            sort($data);
        }

        if ($data) {
            $json = json('ok', strings('success_read'), $data);
        } else {
            $json = json('error', strings('error_read'), '');
        }
        return jsonPrint($json, $cmd);
    }

    public function index(Request $request) {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id) {
        return view($this->path . '.servicio', ['id' => $id]);
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
     * @param  \App\Models\CategoriaUser  $categoriaUser
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoriaUser  $categoriaUser
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoriaUser  $categoriaUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoriaUser  $categoriaUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        //
    }

}
