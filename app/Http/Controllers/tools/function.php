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



