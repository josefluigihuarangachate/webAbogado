<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
        return $horas . ':' . $minutos; // . ":" . $segundos;
    } else {
        //return "00:00:00";
        return "00:00";
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
        // array('IDNegocio' => 'ID1','IDNegocio' => 'ID2')
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
