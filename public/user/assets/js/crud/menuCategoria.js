// CSRF-TOKEN PARA LARAVEL
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var globalName = 'General';

function librodereclamo() {

    var formData = new FormData($('#formDataLR')[0]);
    formData.append("cmd", 'web');

    $.ajax({
        url: ruta() + 'registrarLibroReclamo' + globalName,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false
    })

            .done(function (json) {
                if (json['status'] == 'Ok') {
                    swal.fire({
                        title: "Aviso Importante",
                        text: json['msg'],
                        icon: "success",
                        button: "Aceptar", // buttons: ["Cancelar", "Aceptar"],
                        closeOnClickOutside: false
                    });
                    document.getElementById("formDataLR").reset();
                } else if (json['status'] == 'Error') {
                    swal.fire({
                        title: "Aviso Importante",
                        text: json['msg'],
                        icon: "error",
                        button: "Aceptar", // buttons: ["Cancelar", "Aceptar"],
                        closeOnClickOutside: false
                    });
                }
            })
            .always(function () {
                // Likewise, if .always is defined last, it will execute last:
            })
            .fail(function () {
                // console.log("An error occurred, the files couldn't be sent!");
            });

}

function loadConversaciones() {
    $.post(ruta() + "appconversation" + globalName, {cmd: 'web'}, function (json) {
        if (json['status'] == 'Ok') {
            if (json['data']) {
                var datos = json['data'];
                var listaAbogados = "";

                for (var c = 0; c < datos.length; c++) {
                    listaAbogados += '<div class="activity">';
                    listaAbogados += '<a onclick="saveIdAbogadoChatTemp(\'' + datos[c].id + '\')" href="/appchatabogadoGeneral" class="btn btn-success" style="background-color: #39d857; border-radius: 50px;margin-top: 5px;margin-right: 18px;position: absolute; right: 0;border: 4px solid #ffffff;">';
                    listaAbogados += '<i class="lni lni-wechat"></i>';
                    listaAbogados += '</a>';
                    listaAbogados += '<figure>';

                    var src = datos[c].foto;
                    if (datos[c].foto == null) {
                        src = 'empty/empty-photo.jpg';
                    }
                    listaAbogados += '<img alt="Icono" src="general/fotos/' + src + '" style="width: 60px;height: 60px;">';
                    listaAbogados += '<span>';
                    listaAbogados += '<img src="user/assets/images/svg/trending.png" alt="">';
                    listaAbogados += '</span>';
                    listaAbogados += '</figure>';
                    listaAbogados += '<div class="history-meta">';
                    listaAbogados += '<h5><a title="" href="#">' + datos[c].nombre + '</a></h5>';
                    listaAbogados += '<span>' + datos[c].correo + '</span>';
                    listaAbogados += '<br>';
                    listaAbogados += '<span>';
                    listaAbogados += '<sup style="font-size: 10px;color: #ccc;">' + datos[c].celular + '</sup>';
                    listaAbogados += '</span>';
                    listaAbogados += '</div>';
                    listaAbogados += '</div>';
                }

                document.getElementById("listado_conversaciones").innerHTML = listaAbogados;
            }
        }
    });
}
//loadConversaciones();


function countNotify() {
    $.post(ruta() + "appcontarnotificacion" + globalName, {cmd: 'web'}, function (html) {
        document.getElementById("countNotify").innerHTML = "";
        if (html > 0) {
            document.getElementById("countNotify").innerHTML = "<span>" + html + "</span>";
        }
    });
}
countNotify();

setInterval(function () {
    countNotify();
}, 10000);

function loadNotify() {

    // https://codepen.io/tomosewe/pen/RQNBJZ
    $.post(ruta() + "appnotificaciones" + globalName, {cmd: 'web'}, function (json) {

        //try {
        if (json['status'] === 'Ok' && json['data']) {
            var data = json['data'];
            var innerHTML = "";

            for (var i = 0; i < data.length; i++) {

                innerHTML += '<div class="' + data[i].class + '">';
                innerHTML += '<button type="button" data-dismiss="alert" aria-hidden="true" class="close"><sup>&#10004</sup><sup>&#10004</sup></button>';
                innerHTML += '<div class="icon hidden-xs">';
                innerHTML += '<i class="fa fa-bell"></i>';
                innerHTML += '</div>';
                innerHTML += '<strong>';
                innerHTML += '<label style="font-size: 18px;">' + data[i].tipo + '</label>';
                innerHTML += '</strong>';
                innerHTML += '<p>';
                innerHTML += '<label>';
                innerHTML += data[i].mensaje;
                innerHTML += '</label>';
                innerHTML += '</p>';
                innerHTML += '<p>';
                innerHTML += '<small>' + data[i].fechahora + '</small>';
                innerHTML += '</p>';
                innerHTML += '</div>';
            }
            document.getElementById("listado_notificaciones").innerHTML = innerHTML;
        } else {
            document.getElementById("listado_notificaciones").innerHTML = "";
            document.getElementById("listado_notificaciones").innerHTML = "<center>No se encontraron datos</center>";
        }

    });
}

function loadCategoria() {
    //var txt = $("input").val();
    $.post(ruta() + "appcategoria" + globalName, {cmd: 'web'}, function (json) {

        //try {
        if (json['data']) {
            var data = json['data'];
            var innerHTML = "";
            // console.log();
            for (var i = 0; i < data.length; i++) {
                //console.log("DATOS : " + data[i].nombre);
                //innerHTML += '<li data-text="' + data[i].nombre + '">';
                //innerHTML += '<a href="./subcategoria' + globalName + '/' + data[i].id + '" title="">';
                //innerHTML += '<li>';



                var src = FOLDER_IMAGE + data[i].icono;
                if (data[i].icono == null) {
                    src = FOLDER_IMAGE + 'empty/empty-photo.jpg';
                }

                innerHTML += '<li data-text="' + data[i].nombre + '"><a onclick="saveNameService(' + "'" + data[i].nombre + "'" + ')" href="./applistaservicoxabogado' + globalName + '" title=""><i><img src="' + src + '" alt="" style="border-radius: 50px;width: 100px;height:30px;"></i><span>' + data[i].nombre + '</span></a></li>';
                //innerHTML += '<img src="' + src + '" alt="">';
                //innerHTML += '</li>';
                //innerHTML += '<span>' + data[i].nombre + '</span>';
                //innerHTML += '</a>';
                //innerHTML += '</li>';
            }
            //innerHTML = '<li data-text="Home"><a href="newsfeed.html" title=""><i><img src="user/assets/images/svg/home.png" alt=""></i><span>Home</span></a></li>';
            document.getElementById("menuCategoria").innerHTML = innerHTML;
        } else {
            document.getElementById("menuCategoria").innerHTML = "";
            document.getElementById("menuCategoria").innerHTML = "<center>No se encontraron datos</center>";
        }
        //} catch (e) {
        //    document.getElementById("menuCategoria").innerHTML = "";
        //    document.getElementById("menuCategoria").innerHTML = "<center>No se encontraron datos</center>";
        //}
    });
}
loadCategoria();


function saveIdCategory(id) {
    $.post(ruta() + "appidservicio" + globalName, {cmd: 'web', idcategoria: id}, function (json) {
        console.log("Id del servicio fue guardado temporalmente");
    });
}


function loadServicios() {
    $.post(ruta() + "appservicio" + globalName, {cmd: 'web'}, function (json) {

        document.getElementById("listado_servicios").innerHTML = "";
        var innerHTML = "";
        if (json['status']) {
            if (json['data']) {
                var datos = json['data'];
                for (var i = 0; i < datos.length; i++) {
                    innerHTML += '<div class="activity">';
                    innerHTML += '<a onclick="saveNameService(\'' + datos[i].nombre + '\')" href="#/applistaservicoxabogado' + globalName + '" class="btn btn-danger" style="border-radius: 50px;margin-top: 13px;margin-right: 75px;position: absolute; right: 0;"><i class="lni lni-files"></i></a>';
                    innerHTML += '<a onclick="saveNameService(\'' + datos[i].nombre + '\')" href="/applistaservicoxabogado' + globalName + '" class="btn btn-primary" style="border-radius: 50px;margin-top: 13px;margin-right: 18px;position: absolute; right: 0;"><i class="lni lni-users"></i></a>';
                    innerHTML += '<figure>';

                    if (datos[i].icono != null) {
                        innerHTML += '<img alt="Icono" src="' + FOLDER_IMAGE + datos[i].icono + '" style="width: 60px;height: 60px;">';
                    } else {
                        innerHTML += '<img alt="Icono" src="' + FOLDER_IMAGE + 'empty/empty-photo.jpg" style="width: 60px;height: 60px;">';
                    }

                    innerHTML += '<span><img src="user/assets/images/svg/trending.png" alt=""></span>';
                    innerHTML += '</figure>';
                    innerHTML += '<div class="history-meta">';
                    innerHTML += '<h3><a title="" href="#">' + datos[i].nombre + '</a></h3>';
                    //innerHTML += '<span>Nombre : ' + datos[i].nombreAbogado + '</span>';
                    //innerHTML += '<br><span><img src="user/assets/images/dinero.png" width="38" height="38"> <sup style="font-size: 12px;color: #66bb6a;">S/. ' + datos[i].precio + '</sup></span>';
                    innerHTML += '</div>';
                    innerHTML += '</div>';
                }
            } else {
                innerHTML = "<center>No se encontraron datos</center>";
            }
        } else {
            innerHTML = "<center>" + json['msg'] + "</center>";
        }
        document.getElementById("listado_servicios").innerHTML = innerHTML;
    });
}


function loadAbogados() {
    $.post(ruta() + "appnombreabogado" + globalName, {cmd: 'web'}, function (json) {

        document.getElementById("listado_servicios").innerHTML = "";
        var innerHTML = "";
        if (json['status']) {
            if (json['data']) {
                var datos = json['data'];
                for (var i = 0; i < datos.length; i++) {
                    innerHTML += '<div class="activity">';
                    innerHTML += '<a onclick="saveIdAbogadoChatTemp(\'' + datos[i].idAbogado + '\')" href="/appchatabogado' + globalName + '" class="btn btn-success" style="background-color: #39d857; border-radius: 50px;margin-top: 5px;margin-right: 18px;position: absolute; right: 0;border: 4px solid #ffffff;"><i class="lni lni-wechat"></i></a>';
                    innerHTML += '<figure>';

                    if (datos[i].fotoAbogado != null) {
                        innerHTML += '<img alt="Icono" src="' + FOLDER_IMAGE + datos[i].fotoAbogado + '" style="width: 60px;height: 60px;">';
                    } else {
                        innerHTML += '<img alt="Icono" src="' + FOLDER_IMAGE + 'empty/empty-photo.jpg" style="width: 60px;height: 60px;">';
                    }

                    innerHTML += '<span><img src="user/assets/images/svg/trending.png" alt=""></span>';
                    innerHTML += '</figure>';
                    innerHTML += '<div class="history-meta">';
                    innerHTML += '<h5><a title="" href="#">' + datos[i].nombreAbogado + '</a></h5>';
                    innerHTML += '<span>' + datos[i].correoAbogado + '</span>';
                    innerHTML += '<br><span><sup style="font-size: 10px;color: #ccc;">' + datos[i].celularAbogado + '</sup></span>';
                    innerHTML += '</div>';
                    innerHTML += '</div>';
                }
            } else {
                innerHTML = "<center>No se encontraron datos</center>";
            }
        } else {
            innerHTML = "<center>" + json['msg'] + "</center>";
        }
        document.getElementById("listado_servicios").innerHTML = innerHTML;
    });
}


function saveNameService(nombre) {
    $.post(ruta() + "appnameservicio" + globalName, {cmd: 'web', nameservice: nombre}, function (json) {
        console.log("Nombre del servicio fue guardado temporalmente");
    });
}

function saveIdAbogadoChatTemp(id) {
    $.post(ruta() + "appidabogado" + globalName, {cmd: 'web', idabogado: id}, function (json) {
        console.log("Id de abogado fue guardado temporalmente");
    });
}



// Ejm : https://stackoverflow.com/questions/44736054/live-search-on-an-div-with-input-filter
$(document).ready(function ()
{
    $("#filterServices").keyup(function () {

        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val(),
                count = 0;

        // Loop through the comment list
        $('#listado_servicios div').each(function () {


            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).hide();  // MY CHANGE

                // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show(); // MY CHANGE
                count++;
            }

        });

    });


});



function loadInfoLawyer() {
    $.post(ruta() + "appchatinfoabogado" + globalName, {cmd: 'web'}, function (json) {
        if (json['status'] == 'Ok') {
            if (json['data']) {
                var datos = json['data'];

                var src = FOLDER_IMAGE + "empty/empty-photo.jpg";
                if (datos.foto != null) {
                    src = FOLDER_IMAGE + datos.foto;
                }


                document.getElementById("imginfoAbogado").src = "" + src;
                document.getElementById("nombreinfoAbogado").innerHTML = "" + datos.nombre;
                //var datos = json['data'];
                //for (var i = 0; i < datos.length; i++) {
                //    document.getElementById("nombreinfoAbogado").innerHTML = "dsds" + datos.nombre;
                //}
            } else {
                window.history.back();
            }
        } else {
            window.history.back();
        }
    });
}