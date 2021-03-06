// LISTAR
// CSRF-TOKEN PARA LARAVEL
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// LISTAR DATOS
function listar() {
    document.getElementById("listado_table").innerHTML = "";
    // var txt = $("input").val();
    $.post(ruta() + "listadoTypeUser", {cmd: 'web'}, function (json) {

        var tbody = '<tr>';
        tbody += '<td colspan="3">';
        tbody += '<center>';
        tbody += 'No se encontraron datos';
        tbody += '</center>';
        tbody += '</td>';
        tbody += '</tr>';
        try {
            if (json['data']) {
                var datos = json['data'];
                tbody = "";
                for (var i = 0; i < datos.length; i++) {
                    tbody += '<tr>';
                    tbody += '<td>';
                    tbody += datos[i].nombre;
                    tbody += '</td>';
                    tbody += '<td>';
                    if (datos[i].estado == 'activo') {
                        tbody += '<span class="badge badge-success">' + datos[i].estado.charAt(0).toUpperCase() + datos[i].estado.slice(1) + '</span>';
                    } else {
                        tbody += '<span class="badge badge-danger">' + datos[i].estado.charAt(0).toUpperCase() + datos[i].estado.slice(1) + '</span>';
                    }
                    tbody += '</td>';

                    tbody += '<td>';
                    tbody += "<button type='button' data-toggle='modal' data-target='#editar' class='btn btn-warning btn-sm waves-effect' style='color: #fff;' onclick=\"obtener(" + datos[i].id + ")\">Editar</button>";
                    tbody += "&nbsp;&nbsp;";
                    tbody += "<button class='btn btn-danger btn-sm' onclick=\"eliminar(" + datos[i].id + ")\">Eliminar</button>";
                    tbody += '</td>';

                    tbody += '</tr>';
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
        url: ruta() + 'registrarTypeUser',
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


// ACTUALIZAR DATOS
function obtener(id) {
    $.post(ruta() + "obtenerTypeUser", {cmd: 'web', id: id}, function (json) {
        if (json['data']) {
            var Odatos = json['data'];

            document.getElementById("Eid").value = Odatos.id;
            document.getElementById("Enombre").value = Odatos.nombre;

            // SIRVE PARA SABER SI ESTA ACTIVO O INACTIVO
            var option_estado = "<option value='activo'>Activo</option>";
            option_estado += "<option value='inactivo' selected>Inactivo</option>";
            if (Odatos.estado == "activo") {
                option_estado = "<option value='activo' selected>Activo</option>";
                option_estado += "<option value='inactivo'>Inactivo</option>";
            }
            $("#Etipousuario").html(option_estado);
        }
    });
}
$(document).ready(function () {
    // Ejm : https://makitweb.com/how-to-upload-image-file-using-ajax-and-jquery/
    $(".EsaveData").click(function () {
        var formData = new FormData($('#EformData')[0]);
        formData.append('cmd', 'web');

        $.ajax({
            url: ruta() + 'editarTypeUser',
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

                    listar();
                } else {
                    Swal.fire(
                            'Aviso Importante',
                            json['msg'],
                            'error'
                            );
                }
            }
        });
    });
});
// FIN EDITAR DATOS

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
            $.post(ruta() + "eliminarTypeUser", {cmd: 'web', id: id}, function (json) {
                if (json['status'] == 'Ok') {
                    Swal.fire(
                            'Aviso Importante',
                            json['msg'],
                            'success'
                            );
                    listar();
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