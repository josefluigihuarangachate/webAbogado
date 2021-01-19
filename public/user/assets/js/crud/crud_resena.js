$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var globalName = 'General';

function cargarResenaAbogado() {
    $.post(ruta() + "appresenaabogado" + globalName, {cmd: 'web'}, function (json) {
        if (json['status'] === "Ok") {
            if (json['data']) {
                var datos = json['data'];

                var html = "";

                for (var i = 0; i < datos.length; i++) {


                    html += '<div class="col-lg-4 card">';

                    var src = "general/fotos/empty/empty-photo.jpg";

                    var star1, star2, star3, star4, star5 = "";

                    if (datos[i].estrellas == 1) {
                        star1 = " checked='checked' ";
                    } else if (datos[i].estrellas == 2) {
                        star2 = " checked='checked' ";
                    } else if (datos[i].estrellas == 3) {
                        star3 = " checked='checked' ";
                    } else if (datos[i].estrellas == 4) {
                        star4 = " checked='checked' ";
                    } else if (datos[i].estrellas == 5) {
                        star5 = " checked='checked' ";
                    }

                    if (datos[i].foto) {
                        src = 'general/fotos/' + datos[i].foto;
                    }
                    html += '<center><img src="' + src + '" alt="' + datos[i].nombre_cliente + '" style="width: 120px;height: 120px;border-radius: 80px;"></center>';

                    html += '<br>';
                    html += '<center><label style="text-align: center;">' + datos[i].nombre_cliente + '</label></center>';
                    html += '<p>';
                    html += '<br><label>' + datos[i].mensaje + '</label><br>';
                    html += '<br><label style="color: #f0eb56;font-size: 18px;">Calificacion:</label><br>';
                    html += '<fieldset class="rating">';
                    html += '<input type="radio" id="star5" name="rating" value="5" ' + star5 + ' disabled/>';
                    html += '<label class = "full" for="star5" title="Awesome - 5 stars"></label>';
                    html += '<input type="radio" id="star4" name="rating" value="4" ' + star4 + ' disabled/>';
                    html += '<label class = "full" for="star4" title="Pretty good - 4 stars"></label>';
                    html += '<input type="radio" id="star3" name="rating" value="3" ' + star3 + ' disabled/>';
                    html += '<label class = "full" for="star3" title="Meh - 3 stars"></label>';
                    html += '<input type="radio" id="star2" name="rating" value="2" ' + star2 + ' disabled/>';
                    html += '<label class = "full" for="star2" title="Kinda bad - 2 stars"></label>';
                    html += '<input type="radio" id="star1" name="rating" value="1" ' + star1 + ' disabled/>';
                    html += '<label class = "full" for="star1" title="Sucks big time - 1 star"></label>';
                    html += '</fieldset>';
                    html += '</p>';
                    html += '<p>';
                    html += '<br>';
                    html += '<br>';
                    html += '</p>';
                    html += '</div>';
                }

                html += '<br>';
                html += '<br>';
                html += '<br>';


                document.getElementById("star").innerHTML = json['cant_calificacion'];
                document.getElementById("favorite").innerHTML = json['cant_favoritos'];
                document.getElementById("client").innerHTML = json['cant_client'];
                document.getElementById("listado_resena").innerHTML = html;
            }
        } else {
            document.getElementById("listado_resena").innerHTML = "<center" + json['msg'] + "</center>";
            //window.history.back();
        }
    });
}

cargarResenaAbogado();
