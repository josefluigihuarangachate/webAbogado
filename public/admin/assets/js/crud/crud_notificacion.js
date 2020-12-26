// LISTAR
// CSRF-TOKEN PARA LARAVEL
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Correo Notificacion CSS : https://codepen.io/Gonzalescagi/pen/KJmwXm
var globalName = "Notificacion";


function setTextareaHeight(textareas) {
    textareas.each(function () {
        var textarea = $(this);

        if (!textarea.hasClass('autoHeightDone')) {
            textarea.addClass('autoHeightDone');

            var extraHeight = parseInt(textarea.css('padding-top')) + parseInt(textarea.css('padding-bottom')), // to set total height - padding size
                    h = textarea[0].scrollHeight - extraHeight;

            // init height
            textarea.height('auto').height(h);

            textarea.bind('keyup', function () {

                textarea.removeAttr('style'); // no funciona el height auto

                h = textarea.get(0).scrollHeight - extraHeight;

                textarea.height(h + 'px'); // set new height
            });
        }
    });
}

// LISTAR DATOS
function listarUser() {
    // Ejm : https://codepen.io/yakyrefael/pen/XRmVRG
    // var txt = $("input").val();
    $.post(ruta() + "listado" + globalName, {cmd: 'web'}, function (json) {
        if (json['data']) {
            var datos = json['data'];
            var option_usuario = '';
            option_usuario += '<optgroup label="Usuarios">';
            for (var i = 0; i < datos.length; i++) {
                option_usuario += "<option value='" + datos[i].id + "'>";
                option_usuario += datos[i].nombre + " (" + datos[i].nombre_tipo + ")";
                option_usuario += "</option>";
            }
            option_usuario += '</optgroup>';

            $("#Rusuario").html(option_usuario);
            $('#Rusuario').selectpicker('refresh');
        }
    });

}
listarUser();



function listar() {
    // var txt = $("input").val();
    $.post(ruta() + "listadoUser" + globalName, {cmd: 'web'}, function (json) {

        var tbody = '';

        try {
            if (json['data']) {
                var datos = json['data'];
                tbody = "";
                //verNotificacion
                for (var i = 0; i < datos.length; i++) {
                    tbody += '<div class="' + datos[i].class + ' alert-bordered pd-y-15 notificacion" role="alert">';

                    tbody += '<button type="button" class="close" aria-label="Close" onclick="eliminar(' + datos[i].id + ')">';
                    tbody += '<span aria-hidden="true"><i class="mdi mdi-close tx-16"></i></span>';
                    tbody += '</button>';

                    tbody += '<div class="d-sm-flex align-items-center justify-content-start">';
                    tbody += '<i class="mdi ' + datos[i].icon + ' alert-icon tx-50 mg-r-20 tx-' + datos[i].color + '"></i>';
                    tbody += '<div class="mg-t-20 mg-sm-t-0">';
                    tbody += '<h5 class="mg-b-2 tx-' + datos[i].color + '">';
                    tbody += datos[i].tipo;
                    tbody += '</h5>';

                    if (datos[i].codigo) {
                        tbody += '<br>';
                        tbody += '<h6 class="mg-b-2 tx-' + datos[i].color + '">Codigo: ' + datos[i].codigo + '</h5>';
                    }
                    tbody += '<br>';
                    tbody += '<h7 class="mg-b-2 tx-' + datos[i].color + '">Asunto:<br>' + datos[i].asunto + '</h7>';
                    tbody += '<br>';
                    tbody += '<br>';
                    tbody += '<p class="mg-b-0" style="width: 100%;">Mensaje:<br>' + datos[i].mensaje + '</p>';

                    tbody += '<br>';
                    tbody += '<a class="btn btn-' + datos[i].color + ' btn-sm" href="./ver' + globalName + '/' + datos[i].id + '">';
                    tbody += '<span aria-hidden="true">VER NOTIFICACIÓN</span>';
                    tbody += '</a>';
                    tbody += '<br>';


                    tbody += '<br>';
                    tbody += '<span>' + datos[i].fechahora + '</span>';

                    var iconVisto = '<i class="mdi mdi-check-all"></i>';
                    if (datos[i].leido.toLowerCase() != 'visto') {
                        iconVisto = "";
                    }

                    tbody += '<span style="float: right;">' + iconVisto + "&nbsp;" + datos[i].leido + '</span>';
                    tbody += '</div>';
                    tbody += '</div>';
                    tbody += '</div>';
                    //tbody += "<button class='btn btn-danger btn-sm' onclick=\"eliminar(" + datos[i].id + ")\">Eliminar</button>";
                }
            }
        } catch (err) {
        }
        document.getElementById("listado_table").innerHTML = tbody;
    });

}
listar();
// FIN LISTAR DATOS


// REGISTRAR DATOS

function registrar() {
    var formData = new FormData($('#RformData')[0]);
    formData.append('cmd', 'web');

    $.ajax({
        url: ruta() + 'registrar' + globalName,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (json) {
            if (json['status'] == 'Ok') {
                Swal.fire(
                        'Aviso Importante',
                        json['msg'],
                        'success'
                        );
                document.getElementById("RformData").reset();
                listar();
                listarUser();
            } else {
                Swal.fire(
                        'Aviso Importante',
                        json['msg'],
                        'error'
                        );
            }
        }
    });
}
// FIN REGISTRAR DATOS

// ELIMINAR DATOS
function eliminar(id) {
    Swal.fire({
        title: 'Desea eliminar el dato?',
        text: "No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Deseo eliminarlo!'
    }).then((result) => {
        if (result.value) {
            $.post(ruta() + "eliminar" + globalName, {cmd: 'web', id: id}, function (json) {
                if (json['status'] == 'Ok') {
                    Swal.fire(
                            'Aviso Importante',
                            json['msg'],
                            'success'
                            );
                    listar();

                    try {
                        loadNotificacion();
                    } catch (e) {
                    }

                } else {
                    Swal.fire(
                            'Aviso Importante',
                            json['msg'],
                            'error'
                            );
                }
            });
        }
    })
}
// FIN ELIMINAR DATOS