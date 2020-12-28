<?php

namespace App\Http\Controllers;

use App\Models\Plan;
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

class PlanController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $data = DB::table(table('plan'))
                ->where('id', '>', 0)
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
        $describe = htmlspecialchars(trim($request->input('Rdescripcion')));
        $price = htmlspecialchars(trim($request->input('Rprecio')));
        $hour = htmlspecialchars(trim($request->input('Rhora')));
        $plan = htmlspecialchars(ucwords(strtolower(trim($request->input('Rplan')))));
        $status = htmlspecialchars(strtolower(trim($request->input('Restado'))));

        $rules = [
            'Rnombre' => 'required|string|min:3|max:255',
            'Rdescripcion' => 'required|string|min:3|max:500',
            'Rprecio' => 'required|string',
            'Rhora' => 'required|string',
            'Rplan' => 'required|string',
            'Restado' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            if (
                    empty($name) ||
                    empty($describe) ||
                    empty($price) ||
                    empty($hour) ||
                    empty($plan) ||
                    empty($status)
            ) {
                $json = json('error', strings('error_empty'), '');
            } else {
                $json = json('error', strings('error_option'), '');
            }
        } else {

            try {
                // Registro los datos
                $id = DB::table(table('plan'))->insertGetId(
                        [
                            'nombre' => $name,
                            'descripcion' => $describe,
                            'precio' => number_format($price, 2, '.', ''),
                            'horas' => $hour,
                            'plan' => $plan,
                            'estado' => $status,
                            'segundos' => convertHourToSecond($hour),
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
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $id = htmlspecialchars(strtolower(trim($request->input('id'))));

        $data = DB::table(table('plan'))
                ->where('id', '=', $id)
                ->first();

        if ($data) {
            $json = json('ok', strings('success_read'), $data);
        } else {
            $json = json('error', strings('error_read'), '');
        }

        //$abogado = DB::table(table('usuario'))->where('idtipo', 2)->get(); // 2 = Abogado
        //$json['lawyer'] = $abogado;
        //$subcategorias = DB::table(table('categoria'))->get();
        //$json['category'] = $subcategorias;
        return jsonPrint($json, $cmd);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $id = htmlspecialchars(ucwords(trim($request->input('Eid'))));
        $name = htmlspecialchars(ucwords(trim($request->input('Enombre'))));
        $describe = htmlspecialchars(trim($request->input('Edescripcion')));
        //$price = htmlspecialchars(trim($request->input('Rprecio')));
        $hour = htmlspecialchars(trim($request->input('Ehora')));
        //$plan = htmlspecialchars(ucwords(strtolower(trim($request->input('Rplan')))));
        $status = htmlspecialchars(strtolower(trim($request->input('Eestado'))));

        $rules = [
            'Eid' => 'required|integer',
            'Enombre' => 'required|string|min:3|max:255',
            'Edescripcion' => 'required|string|min:3|max:500',
            'Ehora' => 'required|string',
            'Eestado' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            if (
                    empty($id) ||
                    empty($name) ||
                    empty($describe) ||
                    empty($hour) ||
                    empty($status)
            ) {
                $json = json('error', strings('error_empty'), '');
            } else {
                $json = json('error', strings('error_option'), '');
            }
        } else {

            try {

                // Editar los datos
                $affected = DB::table(table('plan'))
                        ->where('id', $id)
                        ->update(
                        [
                            'nombre' => $name,
                            'descripcion' => $describe,
                            'horas' => $hour,
                            'estado' => $status,
                            'segundos' => convertHourToSecond($hour),
                            'modificado_por' => session('id')
                        ],
                );

                if ($affected) {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        //
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $id = htmlspecialchars(intval(trim($request->input('id'))));

        $suscripcion = DB::table(table('suscripcion'))->where('idplan', $id)->first();

        if ($id == 1) {
            $json = json('error', strings('No puede eliminar el plan'), '');
        } else if (!empty($suscripcion)) {
            $json = json('error', strings('error_anidado'), '');
        } else {

            try {
                $affected = DB::table(table('plan'))->where('id', '=', $id)->delete();
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
