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
    public function loadphotoProfileApp(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $archivo = $request->file('inputFile');

        if (empty(@$_FILES['inputFile']['name'])) {
            $json = json('error', 'Debe subir una imagen', '');
        } else {

            $rules = [
                'cmd' => 'required|string',
                'inputFile' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                if (
                        empty($cmd) ||
                        empty($archivo)
                ) {
                    $json = json('error', strings('error_empty'), '');
                } else {
                    $json = json('error', strings('error_option'), '');
                }
            } else {

                try {

                    // Ejm : https://stackoverrun.com/es/q/5101323

                    $image = $request->file('inputFile');
                    $rutaTemporal = @$_FILES['inputFile']['tmp_name'];
                    $nombreImagen = 'Profile' . date('dmYHis') . str_replace(" ", "", basename(@$_FILES["inputFile"]["name"]));
                    $rutaDestino = FOLDER_CATEGORIA . $nombreImagen;

                    // Registro los datos
                    $affected = DB::table(table('usuario'))
                            ->where('id', session('id'))
                            ->update(
                            [
                                'foto' => $nombreImagen,
                                'modificado_por' => session('id')
                            ],
                    );

                    if ($affected && $image->move(public_path(FOLDER_CATEGORIA), $nombreImagen)) {

                        if (!empty(@session('foto'))) {
                            @unlink(FOLDER_CATEGORIA . @session('foto'));
                        }

                        session(['foto' => $nombreImagen]);

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
    }

    public function sendMessageLibroReclamo(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $correo = htmlspecialchars(trim($request->input('Ecorreo')));
        $celular = htmlspecialchars(trim($request->input('Ecelular')));
        $asunto = htmlspecialchars(trim($request->input('Easunto')));
        $mensaje = htmlspecialchars(trim($request->input('Emensaje')));
        $archivo = $request->file('Earchivo'); // ($mensaje) ? $mensaje : NULL;

        $destinationPath = 'general/libro_reclamo/';

        $rules = [
            'Ecorreo' => 'required|string',
            'Ecelular' => 'required|string',
            'Easunto' => 'required|string',
            'Emensaje' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            if (
                    empty($cmd) ||
                    empty($correo) ||
                    empty($celular) ||
                    empty($asunto) ||
                    empty($mensaje)
            ) {
                $json = json('error', strings('error_empty'), '');
            } else {
                $json = json('error', strings('error_option'), '');
            }
        } else {

            $filename = NULL;
            if ($archivo) {
                $filename = 'file' . session('id') . date('AYmdHis') . $archivo->getClientOriginalName();
                $archivo->move($destinationPath, $filename);
            }

            $data = array(
                'idusuario' => session('id'),
                'correo' => $correo,
                'celular' => $celular,
                'asunto' => $asunto,
                'mensaje' => $mensaje,
                'archivo' => $filename
            );

            // Registro los datos
            $affected = DB::table(table('libro_reclamo'))->insert($data); // Query Builder approach

            $admins = DB::table(table('usuario'))->where([
                        ['idtipo', 1],
                        ['estado', 'activo']
                    ])->get();

            $notifyIds = [];
            foreach ($admins as $admin) {
                $notifyIds['IdProfile' . $admin->id] = 'IdProfile_' . $admin->id; // PARA MULTIPLES USUARIOS 
            }

            if ($affected) {
                NotifyAreaCliente($asunto, $mensaje, $notifyIds, '');
                $json = json('ok', 'Su mensaje fue enviado', '');
            } else {
                $json = json('error', 'No se pudo enviar su mensaje', '');
            }
        }

        return jsonPrint($json, $cmd);
    }

    public function loadConversation(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        //  
        $data = DB::table(table('usuario'))
                //->join(table('chat'), table('chat') . '.idreceptor', '=', table('usuario') . '.id')
                ->join(table('chat'), function ($join) {
                    $join->on(table('chat') . '.idemisor', '=', table('usuario') . '.id')
                    ->orOn(table('chat') . '.idreceptor', '=', table('usuario') . '.id');
                })
                ->select(table('usuario') . '.*')
                ->where(table('usuario') . '.id', "!=", session('id')) // solo los que son abogados
                ->get();

        $data = @array_unique(objectToArray($data), SORT_REGULAR);
        sort($data);

        if ($data) {
            $json = json('ok', strings('success_read'), $data);
        } else {
            $json = json('error', strings('error_read'), '');
        }
        return jsonPrint($json, $cmd);
    }

    public function countNotify(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        // Para saber si esta suscrito 
        $data = DB::table(table('notificacion'))->where(
                        [
                            ['idusuario', session('id')],
                            ['leido', 'Sin Leer'],
                        ]
                )->count();

        if ($data) {
            echo $data;
        }
    }

    public function loadNotificaciones(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        // Actualizo las notificaciones que no son vistas
        DB::table(table('notificacion'))
                ->where(
                        [
                            ['idusuario', session('id')],
                            ['leido', 'Sin Leer'],
                        ]
                )
                ->update(
                        [
                            'leido' => 'Visto',
                        ]
        );

        // Para saber si esta suscrito 
        $data = DB::table(table('notificacion'))->where(
                        [
                            ['idusuario', session('id')],
                        ]
                )->get();

        if ($data) {
            $json = json('ok', strings('success_read'), $data);
        } else {
            $json = json('error', strings('error_read'), '');
        }
        return jsonPrint($json, $cmd);
    }

    public function sendMessageChat(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $mensaje = htmlspecialchars(trim($request->input('Rmensaje')));
        $archivos = $request->file('upload');

        $fechahora = date('Y-m-d H:i:s');

        $boolean = false;
        $data = array();

        if (!empty($mensaje)) {
            $boolean = true;

            $data[] = array(
                'idemisor' => session('id'),
                'idreceptor' => session('IdLawyerChatTemp'),
                'mensaje' => $mensaje,
                'archivo' => NULL,
                'fechahora' => $fechahora,
                'leido' => 'No Leido',
            );
        }

        if (!empty($archivos)) {
            $boolean = true;
            $destinationPath = 'general/archivosChat/';
            foreach ($archivos as $archivo) {
                $filename = 'file' . session('id') . date('AYmdHis') . $archivo->getClientOriginalName();
                $data[] = array(
                    'idemisor' => session('id'),
                    'idreceptor' => session('IdLawyerChatTemp'),
                    'mensaje' => '',
                    'archivo' => $filename,
                    'fechahora' => $fechahora,
                    'leido' => 'No Leido',
                );
                $uploadSuccess = $archivo->move($destinationPath, $filename);

                if (!$uploadSuccess) {
                    $boolean = false;
                }
            }
        }

        if ($boolean) {
            $affected = DB::table(table('chat'))->insert($data); // Query Builder approach

            if ($affected) {

                $idOneSignalLawyer = DB::table(table('usuario'))
                        ->select('idonesignal')
                        ->where('id', session('IdLawyerChatTemp'))
                        ->first();

                NotifyChat('Nuevo Mensaje', 'Tienes un nuevo mensaje de ' . session('nombre'), array($idOneSignalLawyer->idonesignal));

                $json = json('ok', strings('success_create'), '');
            } else {
                $json = json('error', strings('error_create'), '');
            }
        } else {
            $json = json('error', strings('error_empty'), '');
        }
        return jsonPrint($json, $cmd);
    }

    public function restarHora(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $segundos = htmlspecialchars(intval(trim($request->input('segundos'))));
        $convertSecondToHour = convertSecondToHour(session('restan_horas'));

        $return = session('restan_horas') - $segundos;

        if ($return <= 0) {
            $return = "0";
        }
        if ($convertSecondToHour == '00:00:00') {
            $return = "0";
        }

        session(['restan_horas' => $return]); // RESTAR_HORAS ESTA EN SEGUNDOS 
        // ACTUALIZO PARA DESCONTAR LOS SEGUNDOS QUE LE QUEDA
        DB::table(table('suscripcion'))
                ->where('idusuario', session('id'))
                ->update(
                        [
                            'segundos' => intval($return),
                            'restan_horas' => $convertSecondToHour
                        ]
        );

        // ACTUALIZO A VISTO LOS MENSAJES
        DB::table(table('chat'))
                ->where('idreceptor', session('id'))
                ->update(
                        [
                            'leido' => 'Visto',
                        ]
        );

        echo $convertSecondToHour;
    }

    public function loadMessage(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        // Para saber si esta suscrito 
        $suscrito = DB::table(table('suscripcion'))->where('idusuario', session('id'))->first();

        $mensajes = DB::table(table('chat'))
                ->join(table('usuario') . ' AS emisor', 'emisor.id', '=', table('chat') . '.idemisor')
                ->join(table('usuario') . ' AS receptor', 'receptor.id', '=', table('chat') . '.idreceptor')
                ->select(
                        table('chat') . '.*',
                        'emisor.nombre AS nombreEmisor',
                        'receptor.nombre AS nombreReceptor'
                )
                ->where([
                    [table('chat') . '.idemisor', '=', session('id')],
                    [table('chat') . '.idreceptor', '=', session('IdLawyerChatTemp')],
                ])
                ->orWhere([
                    [table('chat') . '.idreceptor', '=', session('id')],
                    [table('chat') . '.idemisor', '=', session('IdLawyerChatTemp')],
                ])
                ->limit(500)
                ->get();
        $mensajes = @array_unique(objectToArray($mensajes), SORT_REGULAR);
        sort($mensajes);

        $json = json('ok', strings('success_read'), '');
        $json['mensajes'] = $mensajes;
        $json['suscripcion'] = $suscrito;
        return jsonPrint($json, $cmd);
    }

    public function loadCatInfoAbogadoGeneral(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $data = DB::table(table('usuario'))->where('id', session('IdLawyerChatTemp'))->first();
        if ($data) {
            $json = json('ok', strings('success_read'), $data);
        } else {
            $json = json('error', strings('error_read'), '');
        }
        return jsonPrint($json, $cmd);
    }

    public function sessionServiceGeneral(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $idcategory = htmlspecialchars(intval(trim($request->input('idcategoria'))));
        session(['idCategoryTemp' => $idcategory]);
    }

    public function sessionNameServiceGeneral(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $nameservice = htmlspecialchars(strval(trim($request->input('nameservice'))));
        session(['NameServiceTemp' => $nameservice]);
    }

    public function sessionIdLawyerChatGeneral(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
        $nameservice = htmlspecialchars(strval(trim($request->input('idabogado'))));
        session(['IdLawyerChatTemp' => $nameservice]);
    }

    public function loadServiceGeneral(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        if (session('idtipo') == 2) { // ABOGADO
            $data = DB::table(table('servicio'))
                    ->join(table('usuario'), table('usuario') . '.id', '=', table('servicio') . '.idusuario')
                    ->join(table('categoria'), table('categoria') . '.id', '=', table('servicio') . '.idcategoria')
                    ->select(
                            table('servicio') . '.icono',
                            table('servicio') . '.nombre',
                            //table('servicio') . '.precio',
                            //table('usuario') . '.nombre AS nombreAbogado',
                    )
                    ->where([
                        [table('usuario') . '.id', '=', session('id')],
                        [table('servicio') . '.idcategoria', '=', session('idCategoryTemp')],
                        [table('categoria') . '.estado', '=', 'activo'],
                        [table('servicio') . '.estado', '=', 'activo'],
                        [table('usuario') . '.idtipo', '=', 2]
                    ])
                    ->get();
        } else if (session('idtipo') == 3) { // CLIENTE            
            $data = DB::table(table('servicio'))
                    ->join(table('usuario'), table('usuario') . '.id', '=', table('servicio') . '.idusuario')
                    ->join(table('categoria'), table('categoria') . '.id', '=', table('servicio') . '.idcategoria')
                    ->select(
                            table('servicio') . '.icono',
                            table('servicio') . '.nombre',
                            //table('servicio') . '.precio',
                            //table('usuario') . '.nombre AS nombreAbogado',
                    )
                    ->where([
                        [table('servicio') . '.idcategoria', '=', session('idCategoryTemp')],
                        [table('categoria') . '.estado', '=', 'activo'],
                        [table('servicio') . '.estado', '=', 'activo'],
                        [table('usuario') . '.idtipo', '=', 2]
                    ])
                    ->get();
        }

        $data = @array_unique(objectToArray($data), SORT_REGULAR);
        sort($data);

        if ($data) {
            $json = json('ok', strings('success_read'), $data);
        } else {
            $json = json('error', strings('error_read'), '');
        }
        return jsonPrint($json, $cmd);
    }

    public function loadServiceAbogadosGeneral(Request $request) {
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        if (session('idtipo') == 2) { // ABOGADO
            $data = DB::table(table('servicio'))
                    ->join(table('usuario'), table('usuario') . '.id', '=', table('servicio') . '.idusuario')
                    ->join(table('categoria'), table('categoria') . '.id', '=', table('servicio') . '.idcategoria')
                    ->select(
                            table('servicio') . '.icono',
                            table('servicio') . '.nombre',
                            //table('servicio') . '.precio',
                            table('usuario') . '.id AS idAbogado',
                            table('usuario') . '.foto AS fotoAbogado',
                            table('usuario') . '.nombre AS nombreAbogado',
                            table('usuario') . '.correo AS correoAbogado',
                            table('usuario') . '.celular AS celularAbogado',
                    )
                    ->where([
                        [table('usuario') . '.id', '=', session('id')],
                        [table('servicio') . '.nombre', '=', session('NameServiceTemp')],
                        [table('categoria') . '.estado', '=', 'activo'],
                        [table('servicio') . '.estado', '=', 'activo'],
                        [table('usuario') . '.idtipo', '=', 2]
                    ])
                    ->get();
        } else if (session('idtipo') == 3) { // CLIENTE            
            $data = DB::table(table('servicio'))
                    ->join(table('usuario'), table('usuario') . '.id', '=', table('servicio') . '.idusuario')
                    ->join(table('categoria'), table('categoria') . '.id', '=', table('servicio') . '.idcategoria')
                    ->select(
                            table('servicio') . '.icono',
                            table('servicio') . '.nombre',
                            //table('servicio') . '.precio',
                            table('usuario') . '.id AS idAbogado',
                            table('usuario') . '.foto AS fotoAbogado',
                            table('usuario') . '.nombre AS nombreAbogado',
                            table('usuario') . '.correo AS correoAbogado',
                            table('usuario') . '.celular AS celularAbogado',
                    )
                    ->where([
                        [table('servicio') . '.nombre', '=', session('NameServiceTemp')],
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
//        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));
//        $data = "";
//
//        if (session('idtipo') == 2) {
//            // PARA EL ABOGADO
//            $data = DB::table(table('servicio'))
//                            ->select(
//                                    table('categoria') . '.id',
//                                    table('categoria') . '.foto',
//                                    table('categoria') . '.nombre',
//                                    //'users.*',
//                                    //'contacts.phone',
//                                    //'orders.price'
//                            )
//                            //->join(table('subcategoria'), table('subcategoria') . '.id', '=', table('servicio') . '.idsubcategoria')
//                            ->join(table('categoria'), table('categoria') . '.id', '=', table('servicio') . '.idcategoria')
//                            ->where([
//                                [table('servicio') . '.idusuario', '=', session('id')],
//                                [table('servicio') . '.estado', '=', 'activo'],
//                                [table('categoria') . '.estado', '=', 'activo'],
//                            ])->get();
//
//            $data = @array_unique(objectToArray($data), SORT_REGULAR);
//            sort($data);
//        } else {
//            // PARA EL CLIENTE
//            $data = DB::table(table('servicio'))
//                            ->select(
//                                    table('categoria') . '.id',
//                                    table('categoria') . '.foto',
//                                    table('categoria') . '.nombre',
//                            )
//                            ->join(table('categoria'), table('categoria') . '.id', '=', table('servicio') . '.idcategoria')
//                            ->where([
//                                [table('servicio') . '.estado', '=', 'activo'],
//                                [table('categoria') . '.estado', '=', 'activo'],
//                            ])->get();
//
//            $data = @array_unique(objectToArray($data), SORT_REGULAR);
//            sort($data);
//        }
//
//        if ($data) {
//            $json = json('ok', strings('success_read'), $data);
//        } else {
//            $json = json('error', strings('error_read'), '');
//        }
//        return jsonPrint($json, $cmd);
        $cmd = htmlspecialchars(strtolower(trim($request->input('cmd'))));

        if (session('idtipo') == 2) { // ABOGADO
            $data = DB::table(table('servicio'))
                    ->join(table('usuario'), table('usuario') . '.id', '=', table('servicio') . '.idusuario')
                    ->join(table('categoria'), table('categoria') . '.id', '=', table('servicio') . '.idcategoria')
                    ->select(
                            table('servicio') . '.*',
                            //table('servicio') . '.nombre',
                            //table('servicio') . '.precio',
                            //table('usuario') . '.nombre AS nombreAbogado',
                    )
                    ->where([
                        [table('usuario') . '.id', '=', session('id')],
                        [table('servicio') . '.idusuario', '=', session('id')],
                        //[table('servicio') . '.idcategoria', '=', session('idCategoryTemp')],
                        [table('categoria') . '.estado', '=', 'activo'],
                        [table('servicio') . '.estado', '=', 'activo'],
                        [table('usuario') . '.idtipo', '=', 2]
                    ])
                    ->get();
        } else if (session('idtipo') == 3) { // CLIENTE            
            $data = DB::table(table('servicio'))
                    ->join(table('usuario'), table('usuario') . '.id', '=', table('servicio') . '.idusuario')
                    ->join(table('categoria'), table('categoria') . '.id', '=', table('servicio') . '.idcategoria')
                    ->select(
                            table('servicio') . '.icono',
                            table('servicio') . '.nombre',
                            //table('servicio') . '.precio',
                            //table('usuario') . '.nombre AS nombreAbogado',
                    )
                    ->where([
                        //[table('servicio') . '.idcategoria', '=', session('idCategoryTemp')],
                        [table('categoria') . '.estado', '=', 'activo'],
                        [table('servicio') . '.estado', '=', 'activo'],
                        [table('usuario') . '.idtipo', '=', 2]
                    ])
                    ->get();
        }

        $data = @array_unique(objectToArray($data), SORT_REGULAR);
        sort($data);

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
