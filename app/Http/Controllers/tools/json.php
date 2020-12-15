<?php

function json($status, $msg, $data) {

    if (!$status || strtolower($status) == 'error') {
        $status = 'Error';
    }
    if (!$msg) {
        $msg = 'Acceso Denegado';
    }
    if (!$data) {
        $data = array();
    }
    $json = array(
        'status' => ucwords($status),
        'msg' => $msg,
        'data' => $data
    );

    return $json;
}

function jsonPrint($data, $device) {
    if (strtolower($device) == 'web') {
        return response()->json($data, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    } else if (strtolower($device) == 'app') {

    }
}
