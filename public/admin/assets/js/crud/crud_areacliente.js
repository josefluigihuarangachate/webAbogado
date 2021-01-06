// LISTAR
// CSRF-TOKEN PARA LARAVEL
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var globalName = "AreaCliente";

// LISTAR DATOS
function listar() {
    $.get(ruta() + "listado" + globalName, {cmd: 'web'}, function (json) {
        if (json['status'] == 'Ok') {
            if (json['data'] != null) {
                var datos = json['data'];
                var div = "";
                for (var lr = 0; lr < datos.length; lr++) {
                    div += '<div class="col-6 librodereclamo">';
                    div += '<div class="card">';
                    div += '<div class="card-header">';
                    div += datos[lr].nombre_cliente;
                    div += '</div>';
                    div += '<div class="card-body">';
                    div += '<h5 class="card-title">' + datos[lr].asunto + '</h5>';
                    div += '<p class="card-text" style="font-weight: bold;">Correo Electronico : ' + datos[lr].correo + '</p>';
                    div += '<p class="card-text" style="font-weight: bold;">Telefono/Celular : ' + datos[lr].celular + '</p>';
                    div += '<p class="card-text">' + datos[lr].mensaje + '</p>';
                    if (datos[lr].archivo) {
                        div += '<a href="general/libro_reclamo/' + datos[lr].archivo + '" class="btn btn-primary waves-effect" style="font-weight: bold;float:right;" download><i class="fa fa-file-pdf-o"></i> &nbsp; Archivo Adjunto</a>';
                    }
                    div += '<br><br><br><p class="card-text" style="font-weight: bold;float:right;">Fecha y Hora : ' + datos[lr].fechahora + '</p>';
                    div += '</div>';
                    div += '</div>';
                    div += '</div>';
                }

                document.getElementById("listado_reclamo").innerHTML = div;

            } else {
                document.getElementById("listado_reclamo").innerHTML = "<center>" + json['msg'] + "</center>";
            }
        } else {
            document.getElementById("listado_reclamo").innerHTML = "<center>" + json['msg'] + "</center>";
        }
    });
}
listar();
// FIN LISTAR DATOS