// LISTADO DE CATEGORIA

// EJEMPLO LIVE SEARCH BOOSTRAP PHP MYSQL
// https://stackoverflow.com/questions/27727655/can-not-populate-bootstrap-select-with-data-live-search-multiple-with-jquery

// PARA UN WIDTH 100%
// https://stackoverflow.com/questions/35053963/bootstrap-and-bootstrap-select-fit-select-and-other-elements-to-div-width-100
function loadCategoriaReg() {
    $.post(ruta() + "listar_categorias", {cmd: 'web'}, function (result) {
        // SELECT CATEGORIA
        var categorias = "";
        var datos = result['data'];
        //categorias = '<select id="idcategoriar" name="idcategoriar" class="selectpicker" data-live-search="true">';
        if (result['status'] == 'Ok') {
            for (var i = 0; i < datos.length; i++) {
                categorias += "<option data-subtext=' - CATEGORIA' value='" + datos[i].id + "'>";
                categorias += datos[i].nombre;
                categorias += "</option>";
            }
        }

        // FIN SELECT CATEGORIA
        $("#idcategoriar").html(categorias);
        $('#idcategoriar').selectpicker('refresh');
    });
}
function loadCategoriaUpd(selectedID) {
    $.post(ruta() + "listar_categorias", {cmd: 'web'}, function (result) {
        // SELECT CATEGORIA
        var categoriasu = "";
        var datos = result['data'];
        //categoriasu = '<select id="idcategoriau" name="idcategoriau" class="selectpicker" data-live-search="true">';
        if (result['status'] == 'Ok') {
            for (var i = 0; i < datos.length; i++) {

                if (selectedID === datos[i].id) {
                    categoriasu += "<option selected='selected' data-subtext=' - CATEGORIA' value='" + datos[i].id + "'>";
                } else {
                    categoriasu += "<option data-subtext=' - CATEGORIA' value='" + datos[i].id + "'>";
                }
                categoriasu += datos[i].nombre;
                categoriasu += "</option>";
            }
        }
        //categoriasu += "</select>";
        // FIN SELECT CATEGORIA
        $("#idcategoriau").html(categoriasu);
        $('#idcategoriau').selectpicker('refresh');
        // document.getElementById("selectSubcategoriau").innerHTML = categoriasu;
    });
}
// LISTADO DE CATEGORIA


// LISTAR
$(document).ready(function () {
    $.fn.dataTable.ext.errMode = 'throw';
    var listar = function () {
        var table = $('#noStyleedTable').DataTable({
            "destroy": true,
            "ajax": {
                "url": ruta() + 'lista_subcategoria', //"{{ url('lista_categoria') }}",
                "type": "POST",
                "data": {
                    "cmd": "web"
                }
            },
            "columns": [
                {"data": "nombreCategoria"},
                {"data": "codigo"},
                {"data": "nombre"},
                {"data": "descripcion"},
                {"data": "estado",
                    "searchable": false,
                    "orderable": false,
                    "render": function (data, type, row) {
                        if (row.estado === 'activo') {
                            return '<center><span class="badge badge-success">Activo</span></center>';
                        } else {
                            return '<center><span class="badge badge-danger">Inactivo</span></center>';

                        }
                    }
                },
                {
                    "defaultContent": '<center><button id="editar" name="editar" type="button" class="editar btn btn-info btn-sm" data-toggle="modal" data-target="#exampleUpdate"><i class="fa fa-edit"></i></button> &nbsp;&nbsp; <button type="button" id="eliminar" name="eliminar" class="eliminar btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></center>'}
            ]
        });
        obtener_data_editar('#noStyleedTable tbody', table);
        obtener_id_eliminar('#noStyleedTable tbody', table);
    }

    // MOSTRAR DATOS EN EL POPUP
    var obtener_data_editar = function (tbody, table) {
        $(tbody).on("click", "button.editar", function () {
            var data = table.row($(this).parents("tr")).data();
            //console.log("Editar : " + data.id);

            loadCategoriaUpd(data.idcategoria);

            //console.log(data.idcategoria);
            document.getElementById("txtidu").value = data.id;
            document.getElementById("txtcodigou").value = data.codigo;
            document.getElementById("txtnombreu").value = data.nombre;
            document.getElementById("txtdescripcionu").value = data.descripcion;

            var select = '<select class="form-control input-lg" id="txtestadou" name="txtestadou">';
            if (data.estado === 'activo') {
                select += '<option value="activo" selected="selected">Activo</option>';
                select += '<option value="inactivo">Inactivo</option>';
            } else {
                select += '<option value="activo">Activo</option>';
                select += '<option value="inactivo" selected="selected">Inactivo</option>';
            }

            document.getElementById("estadoU").innerHTML = select;

        });
    }
    // FIN MOSTRAR DATOS EN EL POPUP

    // ELIMINAR
    var obtener_id_eliminar = function (tbody, table) {
        $(tbody).on('click', 'button.eliminar', function () {
            var data = table.row($(this).parents("tr")).data();
            //console.log("Eliminar : " + data.id);
            var id = data.id;

            Swal.fire({
                title: 'Mensaje Importante',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, deseo eliminarlo!'
            }).then((result) => {
                if (result.value) {
                    $.post(ruta() + "eliminar_subcategoria", {cmd: 'web', id: id}, function (json) {
                        if (json['status'] == "Ok") {
                            Swal.fire(
                                    'Mensaje Importante',
                                    json['msg'],
                                    'success'
                                    );
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        } else if (json['status'] == "Error") {
                            Swal.fire(
                                    'Mensaje Importante',
                                    json['msg'],
                                    'error'
                                    );
                        }
                    });
                }
            });
        });
    }
    // FIN ELIMINAR
    listar();
});
// FIN LISTAR

// REGISTRAR
$(document).ready(function () {
    $(".sendDataRegistrar").click(function () {
        var formData = new FormData($('#formdataRegistrar')[0]);
        formData.append("cmd", 'web');

        $.ajax({
            url: ruta() + 'registrar_subcategoria',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false
        })

                .done(function (json) {
                    if (json['status'] == 'Ok') {
                        Swal.fire(
                                'Mensaje Importante',
                                json['msg'],
                                'success' // question,warning,error
                                );
                        document.getElementById("formdataRegistrar").reset();
                    } else if (json['status'] == 'Error') {
                        Swal.fire(
                                'Mensaje Importante',
                                json['msg'],
                                'error' // question,warning,error
                                );
                    }
                })
                .always(function () {
                    // Likewise, if .always is defined last, it will execute last:
                })
                .fail(function () {
                    // console.log("An error occurred, the files couldn't be sent!");
                });
    });
});
// FIN REGISTRAR

// ACTUALIZAR
$(document).ready(function () {
    $(".sendDataActualizar").click(function () {
        var formData = new FormData($('#formdataActualizar')[0]);
        formData.append("cmd", 'web');
        $.ajax({
            url: ruta() + 'actualizar_subcategoria',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false
        })

                .done(function (json) {
                    if (json['status'] == 'Ok') {
                        Swal.fire(
                                'Mensaje Importante',
                                json['msg'],
                                'success' // question,warning,error
                                );
                        document.getElementById("closeActualizar").click();
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    } else if (json['status'] == 'Error') {
                        Swal.fire(
                                'Mensaje Importante',
                                json['msg'],
                                'error' // question,warning,error
                                );
                    }
                })
                .always(function () {
                    // Likewise, if .always is defined last, it will execute last:
                })
                .fail(function () {
                    // console.log("An error occurred, the files couldn't be sent!");
                });
    });
});
// FIN ACTUALIZAR