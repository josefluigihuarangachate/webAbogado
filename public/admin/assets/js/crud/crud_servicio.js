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
            tbody += '<td colspan="7">';
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
                        tbody += datos[i].nombresubcategoria;
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
                        tbody += '<td>';
                        tbody += 'S/. ';
                        tbody += datos[i].precio;
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
            document.getElementById("Eprecio").value = Odatos.precio;
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



            // SIRVE PARA SABER SELECCIONAR LAS SUB CATEGORIA
            var option_subcategoria = "<option value=''>Seleccionar Sub Categoria</option>";
            try {
                if (json['subcategory'] != null) {

                    var subcategorias = json['subcategory'];
                    for (var c = 0; c < subcategorias.length; c++) {

                        var selected = "";
                        if (Odatos.idsubcategoria == subcategorias[c].id) {
                            selected = "selected='selected'";
                        }
                        option_subcategoria += "<option " + selected + " data-subtext=' (" + subcategorias[c].estado + ")' value='" + subcategorias[c].id + "'>" + subcategorias[c].nombre + "</option>";
                    }
                }
            } catch (err) {
                //console.error(err);
            }
            $("#Esubcategoria").html(option_subcategoria);
            $('#Esubcategoria').selectpicker('refresh');


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

function cargarSubCategoria() {
    // var txt = $("input").val();
    $.post(ruta() + "subcategoria" + globalName, {cmd: 'web'}, function (json) {

        // SIRVE PARA SABER SI ESTA ACTIVO O INACTIVO
        var option_subcategoria = "<option value='' selected='selected'>Seleccionar Sub Categoria</option>";
        try {
            if (json['data'] != null) {

                var subcategoria = json['data'];
                for (var c = 0; c < subcategoria.length; c++) {
                    option_subcategoria += "<option value='" + subcategoria[c].id + "' data-subtext=' (" + subcategoria[c].estado + ")'>" + subcategoria[c].nombre + "</option>";
                }
            }
        } catch (err) {
            //console.error(err);
        }
        $("#Rsubcategoria").html(option_subcategoria);
        $('#Rsubcategoria').selectpicker('refresh');
    });
}
cargarSubCategoria();