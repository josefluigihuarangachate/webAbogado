<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
