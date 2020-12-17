// LISTAR
// CSRF-TOKEN PARA LARAVEL
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var globalName = "Administrador";

// LISTAR DATOS
function listar() {
    document.getElementById("listado_table").innerHTML = "";
    // var txt = $("input").val();
    $.post(ruta() + "listado" + globalName, {cmd: 'web'}, function (json) {

        var tbody = '<tr>';
        tbody += '<td colspan="9">';
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
                    tbody += '<td style="text-align: center;">';

                    tbody += '<div class="dropdown">';
                    tbody += '<button class="btn btn-primary btn-sm dropdown-toggle waves-effect" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                    tbody += 'Imagen';
                    tbody += '</button>';
                    tbody += '<div class="dropdown-menu tx-13" style="text-align: center;">';

                    if (datos[i].foto != null) {
                        // tbody += datos[i].foto;
                        tbody += '<img src="' + FOLDER_IMAGE + datos[i].foto + '" style="width: 100px;"><br><br>';
                    }

                    tbody += '<form action="#" method="POST" enctype="multipart/form-data" id="formData' + datos[i].id + '" name="formData' + datos[i].id + '">';
                    tbody += '<input type="hidden" hidden="hidden" value="' + datos[i].foto + '" id="oldImage' + datos[i].id + '" name="oldImage' + datos[i].id + '">';
                    tbody += '<span>';
                    tbody += '<input type="file" onchange="uploadChange(' + datos[i].id + ')" id="uploadImage' + datos[i].id + '" name="uploadImage' + datos[i].id + '" class="inputUpload">';
                    tbody += '</span>';
                    tbody += '<label class="btn btn-primary btn-sm" style="width: 100px;" for="uploadImage' + datos[i].id + '">';
                    tbody += '<span id="labelUpload' + datos[i].id + '" name="labelUpload' + datos[i].id + '">';
                    tbody += '<i class="fa fa-picture-o"></i>&nbsp;Cargar...';
                    tbody += '</span>';
                    tbody += '</label><br>';
                    tbody += '<button type="button" id="btnupload' + datos[i].id + '" name=id="btnupload' + datos[i].id + '" disabled="disabled" class="btn btn-success btn-sm" style="width: 100px;color: #fff !important;" onclick="uploadImageAdministrador(' + datos[i].id + ')">';
                    tbody += '<i class="fa fa-save"></i>&nbsp; Guardar';
                    tbody += '</button>';
                    tbody += '</form>';
                    tbody += '</div>';
                    tbody += '</div>';
                    tbody += '</td>';


                    tbody += '<td>';
                    tbody += datos[i].nombre;
                    tbody += '</td>';
                    tbody += '<td>';
                    tbody += datos[i].dni;
                    tbody += '</td>';
                    tbody += '<td>';
                    tbody += '<a href="mailto:' + datos[i].correo + '">';
                    tbody += '<i class="fa fa-envelope-o"></i>&nbsp;';
                    tbody += datos[i].correo;
                    tbody += '</a>';
                    tbody += '</td>';
                    tbody += '<td>';
                    tbody += '<a href="tel:' + datos[i].celular + '">';
                    tbody += '<i class="fa fa-phone"></i>&nbsp;';
                    tbody += datos[i].celular;
                    tbody += '</a>';
                    tbody += '</td>';
                    tbody += '<td>';
                    tbody += datos[i].direccion;
                    tbody += '</td>';
                    tbody += '<td>';
                    tbody += '<a target="_blank" href="https://www.google.com/maps/dir/?api=1&travelmode=driving&layer=traffic&destination=' + datos[i].latitud + ',' + datos[i].longitud + '">';
                    tbody += '<i class="fa fa-crosshairs"></i> Mapa';
                    tbody += '</a>';
                    tbody += '</td>';
                    tbody += '<td>';
                    tbody += datos[i].usuario;
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
    var latitudMap = parseFloat(document.getElementById('txtlatitud').value);
    var longitudMap = parseFloat(document.getElementById('txtlongitud').value);

    formData.append('cmd', 'web');
    formData.append('txtlatitud', latitudMap);
    formData.append('txtlongitud', longitudMap);

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
    $.post(ruta() + "obtener" + globalName, {cmd: 'web', id: id}, function (json) {
        if (json['data']) {
            var Odatos = json['data'];

            document.getElementById("Eid").value = Odatos.id;
            document.getElementById("Enombre").value = Odatos.nombre;
            document.getElementById("Edni").value = Odatos.dni;
            document.getElementById("Ecorreo").value = Odatos.correo;
            document.getElementById("Ecelular").value = Odatos.celular;
            document.getElementById("Edireccion").value = Odatos.direccion;
            document.getElementById("txtlatitud").value = Odatos.latitud;
            document.getElementById("txtlongitud").value = Odatos.longitud;
            document.getElementById("Eusuario").value = Odatos.usuario;



            // SIRVE PARA SABER SI ESTA ACTIVO O INACTIVO
            var option_categoria = "<option value=''>Seleccionar Tipo de Usuario</option>";
            try {
                if (json['typeuser'] != null) {

                    var tipousuario = json['typeuser'];
                    for (var c = 0; c < tipousuario.length; c++) {

                        var selected = "";
                        if (Odatos.idtipo == tipousuario[c].id) {
                            selected = "selected='selected'";
                        }
                        option_categoria += "<option " + selected + " data-subtext=' (" + tipousuario[c].estado + ")' value='" + tipousuario[c].id + "'>" + tipousuario[c].nombre + "</option>";
                    }
                }
            } catch (err) {
                //console.error(err);
            }
            $("#Etipo").html(option_categoria);
            $('#Etipo').selectpicker('refresh');




            // SIRVE PARA SABER SI ESTA ACTIVO O INACTIVO
            var option_estado = "<option value='activo'>Activo</option>";
            option_estado += "<option value='inactivo' selected>Inactivo</option>";
            if (Odatos.estado == "activo") {
                option_estado = "<option value='activo' selected>Activo</option>";
                option_estado += "<option value='inactivo'>Inactivo</option>";
            }
            $("#Eestado").html(option_estado);
            console.log(option_estado);
        }
    });
}
$(document).ready(function () {
    // Ejm : https://makitweb.com/how-to-upload-image-file-using-ajax-and-jquery/
    $(".EsaveData").click(function () {
        var formData = new FormData($('#EformData')[0]);

        var latitudMap = parseFloat(document.getElementById('txtlatitud').value);
        var longitudMap = parseFloat(document.getElementById('txtlongitud').value);

        formData.append('cmd', 'web');
        formData.append('txtlatitud', latitudMap);
        formData.append('txtlongitud', longitudMap);

        $.ajax({
            url: ruta() + 'editar' + globalName,
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
                    document.getElementById("closeModal").click();
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
            var imageAntigua = document.getElementById("oldImage" + id).value;
            $.post(ruta() + "eliminar" + globalName, {cmd: 'web', id: id, imageAntigua: imageAntigua}, function (json) {
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
