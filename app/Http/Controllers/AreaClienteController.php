<?php

namespace App\Http\Controllers;

use App\Models\AreaCliente;
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

class AreaClienteController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $data = DB::table(table('libro_reclamo'))
                ->join(table('usuario'), table('usuario') . '.id', '=', table('libro_reclamo') . '.idusuario')
                ->select(table('libro_reclamo') . '.*', table('usuario') . '.nombre AS nombre_cliente')
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
     * @param  \App\Models\AreaCliente  $areaCliente
     * @return \Illuminate\Http\Response
     */
    public function show(AreaCliente $areaCliente) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AreaCliente  $areaCliente
     * @return \Illuminate\Http\Response
     */
    public function edit(AreaCliente $areaCliente) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AreaCliente  $areaCliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AreaCliente $areaCliente) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AreaCliente  $areaCliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(AreaCliente $areaCliente) {
        //
    }

}
