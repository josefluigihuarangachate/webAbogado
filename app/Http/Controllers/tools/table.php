<?php

function table($name) {
    $table = array(
        'suscripcion' => 'suscripcion',
        'plan' => 'plan',
        'calificacion' => 'calificacion',
        'plan' => 'plan',
        'categoria' => 'categoria',
        'subcategoria' => 'subcategoria',
        'servicio' => 'servicio',
        'tipo_usuario' => 'tipo_usuario',
        'usuario' => 'usuario',
    );

    return @$table[$name];
}
