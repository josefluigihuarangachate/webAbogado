// LISTAR
// CSRF-TOKEN PARA LARAVEL
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var globalName = "Service";

// LISTAR DATOS
function listar() {

    try {
        document.getElementById("listado_table").innerHTML = "";
        // var txt = $("input").val();
        $.post(ruta() + "listado" + globalName, {cmd: 'web'}, function (json) {

            var tbody = '<tr>';
            tbody += '<td colspan="8">';
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

                        var btnWithIcono = "primary";
                        if (datos[i].icono != null) {
                            // tbody += datos[i].foto;
                            btnWithIcono = "success";
                        }

                        tbody += '<div class="dropdown">';
                        tbody += '<button class="btn btn-' + btnWithIcono + ' btn-sm dropdown-toggle waves-effect" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                        tbody += 'Icono';
                        tbody += '</button>';
                        tbody += '<div class="dropdown-menu tx-13" style="text-align: center;">';

                        if (datos[i].icono != null) {
                            // tbody += datos[i].foto;
                            tbody += '<img src="' + FOLDER_IMAGE + datos[i].icono + '" style="width: 100px;"><br><br>';
                        }

                        tbody += '<form action="#" method="POST" enctype="multipart/form-data" id="iformData' + datos[i].id + '" name="iformData' + datos[i].id + '">';
                        tbody += '<input type="hidden" hidden="hidden" value="' + datos[i].icono + '" id="ioldImage' + datos[i].id + '" name="ioldImage' + datos[i].id + '">';
                        tbody += '<span>';
                        tbody += '<input type="file" onchange="iuploadChange(' + datos[i].id + ')" id="iuploadImage' + datos[i].id + '" name="iuploadImage' + datos[i].id + '" class="inputUpload">';
                        tbody += '</span>';
                        tbody += '<label class="btn btn-primary btn-sm" style="width: 100px;" for="iuploadImage' + datos[i].id + '">';
                        tbody += '<span id="ilabelUpload' + datos[i].id + '" name="ilabelUpload' + datos[i].id + '">';
                        tbody += '<i class="fa fa-picture-o"></i>&nbsp;Cargar...';
                        tbody += '</span>';
                        tbody += '</label><br>';
                        tbody += '<button type="button" id="ibtnupload' + datos[i].id + '" name="ibtnupload' + datos[i].id + '" disabled="disabled" class="btn btn-success btn-sm" style="width: 100px;color: #fff !important;" onclick="iuploadImageCategoria(' + datos[i].id + ')">';
                        tbody += '<i class="fa fa-save"></i>&nbsp; Guardar';
                        tbody += '</button>';
                        tbody += '</form>';
                        tbody += '</div>';
                        tbody += '</div>';
                        tbody += '</td>';







                        tbody += '<td style="text-align: center;">';

                        var btnWithDiagram = "primary";
                        if (datos[i].foto != null) {
                            // tbody += datos[i].foto;
                            btnWithDiagram = "success";
                        }

                        tbody += '<div class="dropdown">';
                        tbody += '<button class="btn btn-' + btnWithDiagram + ' btn-sm dropdown-toggle waves-effect" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
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
                        tbody += '<button type="button" id="btnupload' + datos[i].id + '" name="btnupload' + datos[i].id + '" disabled="disabled" class="btn btn-success btn-sm" style="width: 100px;color: #fff !important;" onclick="uploadImageCategoria(' + datos[i].id + ')">';
                        tbody += '<i class="fa fa-save"></i>&nbsp; Guardar';
                        tbody += '</button>';
                        tbody += '</form>';
                        tbody += '</div>';
                        tbody += '</div>';
                        tbody += '</td>';







                        tbody += '<td>';
                        tbody += datos[i].nombrecategoria;
                        tbody += '</td>';
                        tbody += '<td>';
                        tbody += datos[i].nombreabogado;
                        tbody += '</td>';
                        tbody += '<td>';
                        tbody += datos[i].nombre;
                        tbody += '</td>';
                        tbody += '<td>';
                        tbody += datos[i].descripcion;
                        tbody += '</td>';
                        //tbody += '<td>';
                        //tbody += 'S/. ';
                        //tbody += datos[i].precio;
                        //tbody += '</td>';
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
    } catch (error) {
        // console.error(error);
    }
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
            //document.getElementById("Eprecio").value = Odatos.precio;
            document.getElementById("Edescripcion").value = Odatos.descripcion;


            // SIRVE PARA SABER SELECCIONAR AL ABOGADO
            var option_abogado = "<option value=''>Buscar Abogado</option>";
            try {
                if (json['lawyer'] != null) {

                    var abogados = json['lawyer'];
                    for (var c = 0; c < abogados.length; c++) {

                        var selected = "";
                        if (Odatos.idusuario == abogados[c].id) {
                            selected = "selected='selected'";
                        }
                        option_abogado += "<option " + selected + " data-subtext=' (" + abogados[c].estado + ")' value='" + abogados[c].id + "'>" + abogados[c].nombre + "</option>";
                    }
                }
            } catch (err) {
                //console.error(err);
            }
            $("#Eabogado").html(option_abogado);
            $('#Eabogado').selectpicker('refresh');



            // SIRVE PARA SABER SELECCIONAR LA CATEGORIA
            var option_categoria = "<option value=''>Seleccionar Sub Categoria</option>";
            try {
                if (json['category'] != null) {

                    var categorias = json['category'];
                    for (var c = 0; c < categorias.length; c++) {

                        var selected = "";
                        if (Odatos.idcategoria == categorias[c].id) {
                            selected = "selected='selected'";
                        }
                        option_categoria += "<option " + selected + " data-subtext=' (" + categorias[c].estado + ")' value='" + categorias[c].id + "'>" + categorias[c].nombre + "</option>";
                    }
                }
            } catch (err) {
                //console.error(err);
            }
            $("#Ecategoria").html(option_categoria);
            $('#Ecategoria').selectpicker('refresh');


            // SIRVE PARA SABER SI ESTA ACTIVO O INACTIVO
            var option_estado = "<option value='activo'>Activo</option>";
            option_estado += "<option value='inactivo' selected>Inactivo</option>";
            if (Odatos.estado == "activo") {
                option_estado = "<option value='activo' selected>Activo</option>";
                option_estado += "<option value='inactivo'>Inactivo</option>";
            }
            $("#Eestado").html(option_estado);
        }
    });
}
$(document).ready(function () {
    // Ejm : https://makitweb.com/how-to-upload-image-file-using-ajax-and-jquery/
    $(".EsaveData").click(function () {
        var formData = new FormData($('#EformData')[0]);
        formData.append('cmd', 'web');

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
            $.post(ruta() + "eliminar" + globalName, {cmd: 'web', id: id}, function (json) {
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



function cargarAbogados() {
    // var txt = $("input").val();
    $.post(ruta() + "abogado" + globalName, {cmd: 'web'}, function (json) {

        // SIRVE PARA SABER SI ESTA ACTIVO O INACTIVO
        var option_abogado = "<option value='' selected='selected'>Seleccionar Abogado</option>";
        try {
            if (json['data'] != null) {

                var abogado = json['data'];
                for (var c = 0; c < abogado.length; c++) {
                    option_abogado += "<option value='" + abogado[c].id + "' data-subtext=' (" + abogado[c].estado + ")'>" + abogado[c].nombre + "</option>";
                }
            }
        } catch (err) {
            //console.error(err);
        }
        $("#Rabogado").html(option_abogado);
        $('#Rabogado').selectpicker('refresh');
    });
}
cargarAbogados();

function cargarCategoria() {
    // var txt = $("input").val();
    $.post(ruta() + "categoria" + globalName, {cmd: 'web'}, function (json) {

        // SIRVE PARA SABER SI ESTA ACTIVO O INACTIVO
        var option_categoria = "<option value='' selected='selected'>Seleccionar Categoria</option>";
        try {
            if (json['data'] != null) {

                var categorias = json['data'];
                for (var c = 0; c < categorias.length; c++) {
                    option_categoria += "<option value='" + categorias[c].id + "' data-subtext=' (" + categorias[c].estado + ")'>" + categorias[c].nombre + "</option>";
                }
            }
        } catch (err) {
            //console.error(err);
        }
        $("#Rcategoria").html(option_categoria);
        $('#Rcategoria').selectpicker('refresh');
    });
}
cargarCategoria();