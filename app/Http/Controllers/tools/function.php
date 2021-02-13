<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function novenoNumero($ruc_sedula) {
    $return = NULL;

    if (strlen($ruc_sedula) == 13) {
        @$return = substr(strval(@$ruc_sedula), 8, -4);
    } else if (strlen(@$ruc_sedula) == 10) {
        @$return = substr(strval(@$ruc_sedula), 8, -1);
    }

    return @$return;
}

function novenoNumeroDayMonth($tipo_documento, $ruc_sedula) {
    $return = NULL;
    $dia = '';

    $dias = array(
        0 => '28',
        1 => '10',
        2 => '12',
        3 => '14',
        4 => '16',
        5 => '18',
        6 => '20',
        7 => '22',
        8 => '24',
        9 => '26',
    );

    @$dia = @novenoNumero($ruc_sedula);

    if ($dia >= 0) {
        if (strtolower($tipo_documento) === 'ruc') {
            @$return = @$dias[$dia] . "/03";
        } else if (strtolower($tipo_documento) === 'cedula') {
            @$return = @$dias[$dia] . "/04";
        }
    }
    return @$return;
}

function restarDosHoras2($hour, $second) {
    $restarHour = strtotime('-' . intval($second) . ' second', strtotime($hour));
    $newHour = date('H:i:s', $restarHour);
    return $newHour;
}

function restarDosHoras($h1, $h2) {
    $horaInicio = new DateTime($h1);
    $horaTermino = new DateTime($h2);

    $interval = $horaInicio->diff($horaTermino);
    return $interval->format('%H:%I:%S');
}

// SIRVE PARA CONVERTIR DE SEGUNDOS A HORA (HH:MM:SS)
// EJM : $segundos = 129600
// SERIA: 36:00:00
function convertSecondToHour($segundos) {
    // Ejm : https://aprenderaprogramar.com/foros/index.php?topic=5958.0#:~:text=PHP%20convertir%20dato%20segundos%20a%20horas%2C%20minutos%20y%20segundos%20usando%20funciones%20floor,-%C2%AB%20en%3A%2011%20de&text=%24segundos%20%3D%20%24_POST%5B',horas%20*%203600))%20%2F%2060)%3B
    if (!empty($segundos)) {
        $horas = floor($segundos / 3600);
        $minutos = floor(($segundos - ($horas * 3600)) / 60);
        $segundos = $segundos - ($horas * 3600) - ($minutos * 60);

        if ($horas <= 9) {
            $horas = "0" . $horas;
        }
        if ($minutos <= 9) {
            $minutos = "0" . $minutos;
        }
        if ($segundos <= 9) {
            $segundos = "0" . $segundos;
        }
        return $horas . ':' . $minutos . ":" . $segundos;
    } else {
        return "00:00:00";
        //return "00:00";
    }
}

// SIRVE PARA CONVERTIR DE HORA A SEGUNDOS (HH:MM:SS)
// EJM : $hour = 00:00:02
// SERIA: 2
function convertHourToSecond($hour) {
    if ($hour != '00:00:00') {
        return strtotime($hour) - strtotime('00:00:00');
    } else {
        return 0;
    }
}

function objectToArray(&$object) {
    return @json_decode(json_encode($object), true);
}

function imprimir($data) {
    echo "<pre>", print_r($data), "</pre>";
}

function colorAlert($tipoAlert) {
    // Icon : https://cdn.materialdesignicons.com/1.1.34/
    // Ejm : https://stackoverflow.com/questions/5692568/how-to-access-the-elements-of-a-functions-return-array
    $class = "";
    $icon = "";
    $color = "";
    $colorAlert = array();

    if (strtolower($tipoAlert) == 'alerta') {
        $class = "alert alert-success";
        $icon = 'mdi-bell-ring';
        $color = "success";
    } else if (strtolower($tipoAlert) == 'aviso') {
        $class = "alert alert-info";
        $icon = 'mdi-bullhorn';
        $color = "info";
    } else if (strtolower($tipoAlert) == 'importante') {
        $class = "alert alert-warning";
        $icon = "mdi-alert-circle";
        $color = "warning";
    } else if (strtolower($tipoAlert) == 'urgente') {
        $class = "alert alert-danger";
        $icon = "mdi-alarm-check";
        $color = "danger";
    } else {
        $class = 'alert alert-primary';
        $icon = 'mdi-message-alert';
        $color = "primary";
    }

    $colorAlert['class'] = $class;
    $colorAlert['icon'] = $icon;
    $colorAlert['color'] = $color;
    return $colorAlert;
}

function getUrl() {

    $http = "http://";
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $http = "https://";
    }

    $host = $_SERVER["HTTP_HOST"];
    $url = $_SERVER["REQUEST_URI"];
    //return $http . $host . $url;
    return $http . $host . "/";
}

function NotifyAreaCliente($titulo, $mensaje, $IdProfile, $imageUser) {
    $nombreEmpresa = "On Law";
    // Ejm : https://docs.webpushr.com/send-push-to-a-custom-attribute
    // Ejm : https://docs.webpushr.com/custom-attributes

    $bool = false;

    $end_point = 'https://api.webpushr.com/v1/notification/send/attribute';
    $http_header = array(
        "Content-Type: Application/Json",
        "webpushrKey: f059e71c90a831a6729ff13710f1cd91",
        "webpushrAuthToken: 20662"
    );

    $req_data = array(
        'title' => $titulo, //required
        'message' => $mensaje, //required
        'target_url' => strval(getUrl() . 'listaLibroReclamo'), //required
        // array('IdProfile_1' => 'ID1','IdProfile_1' => 'ID2')
        'attribute' => $IdProfile, //required - in Key/Value Pair(s)
        'name' => $nombreEmpresa,
            //'icon' => strval(getUrl() . 'general/fotos/' . $imageUser), // tiene que estar en https la url y en string
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, $http_header);
    curl_setopt($ch, CURLOPT_URL, $end_point);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($req_data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    @$prExp = explode(",", $response);
    unset($response);
    @$sgExp = explode(":", str_replace('"', "", @$prExp[0]));
    @$status = @substr(@$sgExp[1], 0, 7);


    if ($status == 'success') {
        $bool = true;
    }
    return $bool;
}

function Notify($titulo, $mensaje, $IdProfile, $imageUser) {
    $nombreEmpresa = "On Law";
    // Ejm : https://docs.webpushr.com/send-push-to-a-custom-attribute
    // Ejm : https://docs.webpushr.com/custom-attributes

    $bool = false;

    $end_point = 'https://api.webpushr.com/v1/notification/send/attribute';
    $http_header = array(
        "Content-Type: Application/Json",
        "webpushrKey: f059e71c90a831a6729ff13710f1cd91",
        "webpushrAuthToken: 20662"
    );

    $req_data = array(
        'title' => $titulo, //required
        'message' => $mensaje, //required
        'target_url' => strval(getUrl() . 'listaNotificacion'), //required
        // array('IdProfile_1' => 'ID1','IdProfile_1' => 'ID2')
        'attribute' => $IdProfile, //required - in Key/Value Pair(s)
        'name' => $nombreEmpresa,
            //'icon' => strval(getUrl() . 'general/fotos/' . $imageUser), // tiene que estar en https la url y en string
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, $http_header);
    curl_setopt($ch, CURLOPT_URL, $end_point);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($req_data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    @$prExp = explode(",", $response);
    unset($response);
    @$sgExp = explode(":", str_replace('"', "", @$prExp[0]));
    @$status = @substr(@$sgExp[1], 0, 7);


    if ($status == 'success') {
        $bool = true;
    }
    return $bool;
}

function NotifyChat($titulo, $mensaje, $IdProfile) {
    $appId = "e7635d8e-1534-46a4-8614-c16f227d65ef";
    // $auth_api = 'YWI4NjRjYjQtMGQyMy00YmFmLWIzNmQtYzI4OWQwM2E5ZTQ0';

    $content = array(
        "en" => $mensaje
    );

    $fields = array(
        'app_id' => $appId,
        'include_player_ids' => $IdProfile,
        'data' => array("foo" => "bar"),
        'contents' => $content
    );

    $fields = json_encode($fields);

    // print("\nJSON sent:\n");
    // print($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);
    $return["allresponses"] = $response;
    $return = json_encode($return);

    return true;
    //print("\n\nJSON received:\n");
    //print($return);
    //print("\n");
}

//
function NotifyOneSignal($titulo, $mensaje, $IdProfile) {
    $appId = "e7635d8e-1534-46a4-8614-c16f227d65ef";
    // $auth_api = 'YWI4NjRjYjQtMGQyMy00YmFmLWIzNmQtYzI4OWQwM2E5ZTQ0';

    $content = array(
        "en" => $mensaje
    );

    $fields = array(
        'app_id' => $appId,
        'include_player_ids' => $IdProfile,
        'data' => array("foo" => "bar"),
        'contents' => $content
    );

    $fields = json_encode($fields);

    // print("\nJSON sent:\n");
    // print($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);
    $return["allresponses"] = $response;
    $return = json_encode($return);

    return true;
    //print("\n\nJSON received:\n");
    //print($return);
    //print("\n");
}

function array_value_recursive($key, array $arr) {
    $val = array();
    array_walk_recursive($arr, function($v, $k) use($key, &$val) {
        if ($k == $key)
            array_push($val, $v);
    });
    return $val;
}

// SIRVE PARA ELIMINAR CARPETA CON SUS ARCHIVOS
function delete_files($target) {
    if (is_dir(@$target)) {
        @$files = glob(@$target . '*', GLOB_MARK); //GLOB_MARK adds a slash to directories returned

        foreach (@$files as $file) {
            @delete_files(@$file);
        }

        @rmdir(@$target);
    } elseif (@is_file(@$target)) {
        @unlink(@$target);
    }
}

function find_word_in_string($string, $find) {
    if (preg_match($find, $string)) {
        return true;
    } else {
        return false;
    }
}
