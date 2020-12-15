// LISTAR
$(document).ready(function () {
    $.fn.dataTable.ext.errMode = 'throw';
    var listar = function () {
        var table = $('#noStyleedTable').DataTable({
            "destroy": true,
            "ajax": {
                "url": ruta() + 'lista_administrador', //"{{ url('lista_categoria') }}",
                "type": "POST",
                "data": {
                    "cmd": "web"
                }
            },
            "columns": [
                {"data": "foto",
                    "searchable": false,
                    "orderable": false,
                    "render": function (data, type, row) {
                        console.log(row.foto);
                        if (row.foto == null || row.foto == "") {
                            return '<center><img src="assets/images/photos/empty/empty-avatar.png" style="height: 50px;"></center>';
                        } else {
                            return '<center><a href="' + row.foto + '" target="_blank"><img src="' + row.foto + '" style="height: 50px;"></a></center>';
                        }
                    }},
                {"data": "dni",
                    "searchable": false,
                    "orderable": false,
                    "render": function (data, type, row) {
                        if (row.dni === null) {
                            return '<center>---</center>';
                        } else {
                            return '<center>' + row.dni + '</center>';

                        }
                    }
                },
                {"data": "nombre"},
                {"data": "celular",
                    "searchable": false,
                    "orderable": false,
                    "render": function (data, type, row) {
                        if (row.celular === null) {
                            return '<center>---</center>';
                        } else {
                            return '<center><a href="tel:' + row.celular + '">' + row.celular + '</a></center>';

                        }
                    }
                },
                {"data": "direccion",
                    "searchable": false,
                    "orderable": false,
                    "render": function (data, type, row) {
                        if (row.direccion === null) {
                            return '<center>---</center>';
                        } else {
                            return row.direccion;

                        }
                    }
                },
                {"data": "longitud",
                    "searchable": false,
                    "orderable": false,
                    "render": function (data, type, row) {
                        if (row.latitud === null || row.longitud === null) {
                            return '<center>---</center>';
                        } else {
                            // https://stackoverflow.com/questions/1801732/how-do-i-link-to-google-maps-with-a-particular-longitude-and-latitude

                            // http://maps.google.com/maps?z=12&t=m&q=<lat>,<lng>
                            // z is the zoom level (1-21)
                            // t is the map type ("m" map, "k" satellite, "h" hybrid, "p" terrain, "e" GoogleEarth)
                            // q is the search query

                            return '<center><a target="_blank" href="http://maps.google.com/maps?z=12&t=k&q=' + row.latitud + ',' + row.longitud + '&z=25"><i class="fa fa-bullseye"></i> Ver Mapa</a></center>';

                        }
                    }
                },
                {"data": "correo"},
                {"data": "usuario"},
                {"data": "fecha_registro"},
                {"data": "nombreTipo"},
                {"data": "registrado_por"},
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
        $(tbody).on('click', 'button.editar', function () {
            var data = table.row($(this).parents("tr")).data();
            //console.log("Editar : " + data.id);

            console.log(data);
            if (data.dni != null || data.dni != "") {
                try {
                    document.getElementById("txtdniu").value = data.dni;
                } catch (error) {
                }
            }

            if (data.celular != null || data.celular != "") {
                try {
                    document.getElementById("txtcelularu").value = data.celular;
                } catch (error) {
                }
            }

            if (data.direccion != null || data.direccion != "") {
                try {
                    document.getElementById("txtdireccionu").value = data.direccion;
                } catch (error) {
                }
            }

            if (data.latitud != null || data.latitud != "") {
                try {
                    document.getElementById("txtlatitudu").value = data.latitud;
                    cargarMapaUpdate(data.latitud, data.longitud);
                } catch (error) {
                }
            }

            if (data.longitud != null || data.longitud != "") {
                try {
                    document.getElementById("txtlongitudu").value = data.longitud;

                    cargarMapaUpdate(data.latitud, data.longitud);
                } catch (error) {
                }
            }

            document.getElementById("txtidu").value = data.id;
            document.getElementById("txtnombreu").value = data.nombre;
            document.getElementById("txtcorreou").value = data.correo;
            document.getElementById("txtusuariou").value = data.usuario;

            loadCategoriaUpd(data.idtipo);

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
                    $.post(ruta() + "eliminar_administrador", {cmd: 'web', id: id}, function (json) {
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

        var lat = parseFloat(document.getElementById('txtlatitud').value);
        var lng = parseFloat(document.getElementById('txtlongitud').value);

        if (isNaN(lat) || isNaN(lng)) {
            lat = "";
            lng = "";
        } else if (lat === "" || lng === "") {
            lat = "";
            lng = "";
        }

        formData.append("txtlatitud", lat);
        formData.append("txtlongitud", lng);

        formData.append("cmd", 'web');

        $.ajax({
            url: ruta() + 'registrar_administrador',
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

        console.log(formData);

        var lat = parseFloat(document.getElementById('txtlatitudu').value);
        var lng = parseFloat(document.getElementById('txtlongitudu').value);

        if (isNaN(lat) || isNaN(lng)) {
            lat = "";
            lng = "";
        } else if (lat === "" || lng === "") {
            lat = "";
            lng = "";
        }

        formData.append("txtlatitudu", lat);
        formData.append("txtlongitudu", lng);
        formData.append("cmd", 'web');
        $.ajax({
            url: ruta() + 'actualizar_administrador',
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

// Limpio el input porque me esta autocompletando
setTimeout(function () {
    document.getElementById("txtusuario").value = "";
    document.getElementById("txtclave").value = "";
}, 1000);



// LISTA DE TIPO DE USUARIOS
function loadCategoriaUpd(selectedID) {
    $.post(ruta() + "listar_tipos", {cmd: 'web'}, function (result) {
        // SELECT CATEGORIA
        var categoriasu = "";
        var datos = result['data'];
        //categoriasu = '<select id="idcategoriau" name="idcategoriau" class="selectpicker" data-live-search="true">';
        if (result['status'] == 'Ok') {
            for (var i = 0; i < datos.length; i++) {

                if (selectedID === datos[i].id) {
                    categoriasu += "<option selected='selected' data-subtext=' - TIPO DE USUARIO' value='" + datos[i].id + "'>";
                } else {
                    categoriasu += "<option data-subtext=' - TIPO DE USUARIO' value='" + datos[i].id + "'>";
                }
                categoriasu += datos[i].nombre;
                categoriasu += "</option>";
            }
        }
        //categoriasu += "</select>";
        // FIN SELECT CATEGORIA
        $("#idtipousuario").html(categoriasu);
        $('#idtipousuario').selectpicker('refresh');
        // document.getElementById("selectSubcategoriau").innerHTML = categoriasu;
    });
}
//