$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var globalName = 'General';

function rate(idAbogado, cantidad) {
    document.getElementById("calificacion" + idAbogado).value = cantidad;
}

function sendCalificacion(idAbogado) {
    var mensaje = document.getElementById("mensaje" + idAbogado).value;
    var calificacion = document.getElementById("calificacion" + idAbogado).value;
    var idonesignal = document.getElementById("idonesignal" + idAbogado).value;

    $.post(ruta() + "appregistrarcalificacionabogado" + globalName,
            {
                cmd: 'web',
                idAbogado: idAbogado,
                mensaje: mensaje,
                calificacion: calificacion,
                idonesignal: idonesignal
            },
            function (json) {

                if (json['status'] === "Ok") {
                    Swal.fire(
                            'Aviso Importante',
                            json['msg'],
                            'success'
                            );
                    setTimeout(function () {
                        cargarAbogadosParaCalificar();
                    }, 200);
                } else {
                    Swal.fire(
                            'Aviso Importante',
                            json['msg'],
                            'success'
                            );
                }

            });

}

function cargarAbogadosParaCalificar() {
    $.post(ruta() + "appcalificarabogado" + globalName, {cmd: 'web'}, function (json) {
        if (json['status'] === "Ok") {
            if (json['data']) {
                var datos = json['data'];

                var html = "";

                for (var i = 0; i < datos.length; i++) {


                    html += '<div class="col-lg-4 card">';

                    var src = "general/fotos/empty/empty-photo.jpg";


                    if (datos[i].foto) {
                        src = 'general/fotos/' + datos[i].foto;
                    }
                    html += '<img class="img-circle" src="' + src + '" alt="' + datos[i].nombre + '" style="width: 145px;height: 145px;">';

                    html += '<br><br>';
                    html += '<label>' + datos[i].nombre + '</label><br><br>';
                    html += '<p>';
                    html += '<input type="hidden" hidden="hidden" id="calificacion' + datos[i].id + '" name="calificacion' + datos[i].id + '">';
                    html += '<input type="hidden" hidden="hidden" id="idonesignal' + datos[i].id + '" name="idonesignal' + datos[i].id + '" value="' + datos[i].idonesignal + '">';
                    html += '<textarea class="form-control" rows="5" placeholder="Dejame tu comentario..." id="mensaje' + datos[i].id + '" name="mensaje' + datos[i].id + '" style="resize: none;"></textarea>';
                    html += '<fieldset class="rating">';
                    html += '<input type="radio" id="star5" name="rating" value="5" onclick="rate(' + datos[i].id + ', 5);"/>';
                    html += '<label class = "full" for="star5" title="Awesome - 5 stars"></label>';
                    html += '<input type="radio" id="star4" name="rating" value="4" onclick="rate(' + datos[i].id + ', 4);"/>';
                    html += '<label class = "full" for="star4" title="Pretty good - 4 stars"></label>';
                    html += '<input type="radio" id="star3" name="rating" value="3" onclick="rate(' + datos[i].id + ', 3);"/>';
                    html += '<label class = "full" for="star3" title="Meh - 3 stars"></label>';
                    html += '<input type="radio" id="star2" name="rating" value="2" onclick="rate(' + datos[i].id + ', 2);" />';
                    html += '<label class = "full" for="star2" title="Kinda bad - 2 stars"></label>';
                    html += '<input type="radio" id="star1" name="rating" value="1" onclick="rate(' + datos[i].id + ', 1);"/>';
                    html += '<label class = "full" for="star1" title="Sucks big time - 1 star"></label>';
                    html += '</fieldset>';
                    html += '</p>';
                    html += '<p>';
                    html += '<br>';
                    html += '<br>';
                    html += '<br>';
                    html += '<button class="btn btn-success" style="width: 100%;" href="#" type="button" onclick="sendCalificacion(' + datos[i].id + ')">Registrar Calificación »</button>';
                    html += '</p>';
                    html += '</div>';
                }

                document.getElementById("calificarAbogados").innerHTML = html;
            }
        } else {
            document.getElementById("calificarAbogados").innerHTML = "<center><label style='color: #fff; text-align: center;'>" + json['msg'] + "<label></center>";
            //window.history.back();
        }
    });
}

cargarAbogadosParaCalificar();
