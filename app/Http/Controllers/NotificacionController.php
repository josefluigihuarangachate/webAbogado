<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
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

class NotificacionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function regIdOneSignal($idOneSignal, $idUser, $cmd) {
        $affected = DB::table(table('usuario'))
                ->where('id', $idUser)
                ->update(
                [
                    'idonesignal' => $idOneSignal
                ],
        );

        echo "Datos afectados : " . $affected;
    }

    public function verNotifyAdminAll() {
        $data = DB::table(table('notificacion'))
                ->join(table('usuario'), table('usuario') . '.id', '=', table('notificacion') . '.idusuario')
                ->select(
                        table('notificacion') . '.*',
                        table('usuario') . '.nombre AS nombreUsuario'
                )->where(
                        [
                            [table('notificacion') . '.idusuario', "=", session('id')],
                            [table('notificacion') . '.leido', "=", 'Sin Leer']
                        ]
                )
                ->get();

        if ($data) {
            $json = json('ok', strings('success_delete'), $data);
        } else {
            $json = json('error', strings('error_delete'), '');
        }


        return jsonPrint($json, 'web');
    }

    public function verNotifyAdmin($id) {
        $affected = DB::table(table('notificacion'))
                ->where('id', $id)
                ->update(
                [
                    'leido' => 'Visto'
                ],
        );
        $notificacion = DB::table(table('notificacion'))->where('id', $id)->first();
        $notificacion = objectToArray($notificacion);
        session(['idNotifyTemp' => $notificacion]);
        return redirect('verNotify');
    }

    public function verNotifyUser($id) {
        $notificacion = DB::table(table('notificacion'))->where('id', $id)->first();
        $notificacion = objectToArray($notificacion);
        session(['idNotifyTemp' => $notificacion]);
        return redirect('verNotify');
    }

    public function eliminarNotify(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $id = htmlspecialchars(intval(trim($request->input('id'))));

        try {
            $affected = DB::table(table('notificacion'))
                            ->where(
                                    [
                                        ['id', '=', $id],
                                        ['idusuario', '=', session('id')]
                                    ]
                            )->delete();
            if ($affected) {
                $json = json('ok', strings('success_delete'), '');
            } else {
                $json = json('error', strings('error_delete'), '');
            }
        } catch (Exception $t) {
            $json = json('ok', strings('error_delete'), '');
        }

        return jsonPrint($json, $cmd);
    }

    public function registerNotify(Request $request) {

        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $codigo = htmlspecialchars(strtoupper(trim($request->input('Rcodigo'))));
        $idsuser = $request->input('Rusuario');
        $asunto = htmlspecialchars(ucwords(trim($request->input('Rasunto'))));
        $mensaje = htmlspecialchars(trim($request->input('Rmensaje')));
        $tipo = htmlspecialchars(ucwords(trim($request->input('Rtipo'))));

        if (
                !empty($codigo) &&
                !empty($idsuser) &&
                !empty($asunto) &&
                !empty($mensaje) &&
                !empty($tipo)
        ) {
            $idsIN = array();
            $insert = array();
            $notifyIds = [];

            $imgNotify = "empty/empty-photo.jpg";
            if (empty(session('foto'))) {
                $imgNotify = session('foto');
            }

            for ($u = 0; $u < count($idsuser); $u++) {
                $colorAlert = colorAlert($tipo);
                $idsIN[] = $idsuser[$u];
                $insert[] = array(
                    'codigo' => $codigo,
                    'idusuario' => $idsuser[$u],
                    'asunto' => $asunto,
                    'mensaje' => $mensaje,
                    'tipo' => $tipo,
                    'class' => $colorAlert['class'],
                    'icon' => $colorAlert['icon'],
                    'color' => $colorAlert['color']
                );

                $notifyIds['IdProfile' . $idsuser[$u]] = 'IdProfile_' . $idsuser[$u]; // PARA MULTIPLES USUARIOS
            }

            $idsuserOneSignal = array();
            if ($idsIN) {
                $idsuserOneSignal = DB::table(table('usuario'))
                        ->select(['idonesignal'])
                        ->where('idonesignal', "!=", null)
                        ->whereIn('id', $idsIN)
                        ->get();

                $idsuserOneSignal = array_value_recursive('idonesignal', objectToArray($idsuserOneSignal));
            }

            try {
                $affected = DB::table(table('notificacion'))->insert($insert);
                if ($affected > 0) {
                    // NotifyOneSignal($asunto, $mensaje,$idsuserOneSignal);
                    if (
                            Notify($asunto, $mensaje, $notifyIds, $imgNotify) &&
                            NotifyOneSignal($asunto, $mensaje, $idsuserOneSignal)
                    ) {
                        $json = json('ok', strings('success_notify'), '');
                    } else {
                        $json = json('ok', strings('error_notify'), '');
                    }
                    unset($insert);
                    unset($idsuser);
                } else {
                    $json = json('error', strings('error_notify'), '');
                }
            } catch (Exception $e) {
                $json = json('error', strings('error_notify'), '');
            }
        } else {
            $json = json('error', strings('error_empty'), '');
        }

        return jsonPrint($json, $cmd);
    }

    public function listNotify(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));


        $data = DB::table(table('notificacion'))
                ->join(table('usuario'), table('usuario') . '.id', '=', table('notificacion') . '.idusuario')
                ->select(
                        table('notificacion') . '.*',
                        table('usuario') . '.nombre AS nombreUsuario'
                )->where(table('usuario') . '.id', session('id'))
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
        $data = DB::table(table('usuario'))
                ->join(table('tipo_usuario'), table('tipo_usuario') . '.id', '=', table('usuario') . '.idtipo')
                ->select(
                        [
                            table('usuario') . '.*',
                            table('tipo_usuario') . '.nombre AS nombre_tipo',
                            table('tipo_usuario') . '.estado AS estado_tipo',
                        ]
                )
                ->get();
        if ($data) {
            $json = json('ok', strings('success_read'), $data);
        } else {
            $json = json('error', strings('error_read'), '');
        }
        return jsonPrint($json, $cmd);
    }

    public function create(Request $request) {
        
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
     * @param  \App\Models\Notificacion  $notificacion
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notificacion  $notificacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notificacion  $notificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notificacion  $notificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        //
    }

}
