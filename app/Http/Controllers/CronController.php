<?php

namespace App\Http\Controllers;

use App\Models\Cron;
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

class CronController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cronRucSedula(Request $request) {
        // http://192.168.0.105:8000/cronrucsedula
        echo "Ejecutando cron..." . PHP_EOL;

        $data = DB::table(table('usuario'))
                ->select(
                        'id',
                        'noveno_numero',
                        'idonesignal',
                )
                ->where(
                        [
                            ['tipo_documento', '!=', ''],
                            ['tipo_documento', '!=', null],
                            ['ruc_cedula', '!=', null],
                            ['ruc_cedula', '!=', ''],
                            ['idtipo', '=', 3],
                            ['estado', '=', 'activo'],
                            ['noveno_numero', '=', date('d/m')]
                        ]
                )
                ->get();

        $data = objectToArray($data);
        $idsOnseSignal = array();

        if ($data) {
            foreach ($data as $k => $v) {
                $idsOnseSignal[] = $data[$k]['idonesignal'];
            }

            NotifyOneSignal('Aviso Importante', 'Estimado cliente no olvide pagar tu pago tributario para esta fecha ' . date('d/m/Y'), $idsOnseSignal);
            echo "Fechas de presentación de la declaración enviadas" . PHP_EOL;
        } else {
            echo "No se encontraron fechas de presentación de la declaración" . PHP_EOL;
        }

        echo "Proceso Finalizado" . PHP_EOL;

        unset($data);
        unset($idsOnseSignal);
    }

    public function index(Request $request) {
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
     * @param  \App\Models\Cron  $cron
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cron  $cron
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cron  $cron
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cron  $cron
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        //
    }

}
