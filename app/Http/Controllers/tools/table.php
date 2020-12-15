<?php

function table($name) {
    $table = array(
        'calificacion' => 'calificacion',
        //'solicitud' => 'solicitud',
        'categoria' => 'categoria',
        'subcategoria' => 'subcategoria',
        //'servicio' => 'servicio',
        'tipo_usuario' => 'tipo_usuario',
        'usuario' => 'usuario',
    );

    return @$table[$name];
}
