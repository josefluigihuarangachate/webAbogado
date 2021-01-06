// LISTAR
// CSRF-TOKEN PARA LARAVEL
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var globalName = "Suscripcion";

// LISTAR DATOS
function listar() {
    $.get(ruta() + "listado" + globalName, {cmd: 'web'}, function (json) {
        if (json['status'] == 'Ok') {
            if (json['data'] != null) {
                var datos = json['data'];
                var div = "";
                for (var s = 0; s < datos.length; s++) {
                    div += '<div class="card" style="width: 18rem;">';

                    src = 'empty/empty-photo.jpg';
                    if (datos[s].foto_cliente != null) {
                        src = datos[s].foto_cliente;
                    }
                    div += '<img class="card-img-top" src="general/fotos/' + src + '" alt="' + datos[s].nombre_cliente + '">';
                    div += '<div class="card-body">';
                    div += '<h5 class="card-title">Nombre del Cliente</h5>';
                    div += '<p class="card-text">' + datos[s].nombre_cliente + '</p>';
                    div += '<h5 class="card-title">Plan</h5>';
                    div += '<p class="card-text">' + datos[s].nombreplan + '</p>';
                    div += '<h5 class="card-title">Descripción</h5>';
                    div += '<p class="card-text">' + datos[s].descripcionplan + '</p>';
                    div += '</div>';
                    div += '<ul class="list-group list-group-flush">';

                    var fecha_hora_ini = datos[s].ini_fechahora.split(' ');
                    var fecha_hora_fin = datos[s].fin_fechahora.split(' ');

                    div += '<li class="list-group-item">Fecha Inicio: ' + fecha_hora_ini[0] + '</li>';
                    div += '<li class="list-group-item">Fecha Final: ' + fecha_hora_fin[0] + '</li>';
                    div += '<li class="list-group-item">Precio: ' + datos[s].precio + '</li>';
                    div += '<li class="list-group-item">Total: ' + datos[s].total + '</li>';
                    div += '<li class="list-group-item">Horas de Chat: ' + datos[s].hora + '</li>';
                    div += '<li class="list-group-item">Horas Restantes: ' + datos[s].restan_horas + '</li>';
                    div += '<li class="list-group-item">Segundos Restantes: ' + datos[s].segundos + '</li>';
                    div += '</ul>';
                    div += '<div class="card-body">';

                    var fecha_hora = datos[s].fechahora.split(' ');

                    div += '<a href="javascript:void(0)" class="card-link">Fecha : ' + fecha_hora[0] + '</a>';
                    div += '<a href="javascript:void(0)" class="card-link">Hora : ' + fecha_hora[1] + '</a>';
                    div += '</div>';
                    div += '</div>';
                }

                document.getElementById("listado_suscripcion").innerHTML = div;

            } else {
                document.getElementById("listado_suscripcion").innerHTML = "<center>" + json['msg'] + "</center>";
            }
        } else {
            document.getElementById("listado_suscripcion").innerHTML = "<center>" + json['msg'] + "</center>";
        }
    });
}
listar();
// FIN LISTAR DATOS