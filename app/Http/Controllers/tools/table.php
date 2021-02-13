<?php

function table($name) {
    $table = array(
        'pagina' => 'pagina',
        'chat' => 'chat',
        'libro_reclamo' => 'libro_reclamo',
        'notificacion' => 'notificacion',
        'suscripcion' => 'suscripcion',
        'suscripcion_historial' => 'suscripcion_historial',
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
