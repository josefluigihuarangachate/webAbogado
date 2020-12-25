// LISTAR
// CSRF-TOKEN PARA LARAVEL
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var globalName = "Plan";


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
function listar() {
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
                    tbody += datos[i].nombre;
                    tbody += '</td>';
                    tbody += '<td>';
                    tbody += '<textarea disabled="disabled" class="sizeText" style="border: 1px solid transparent;overflow:hidden;display:block;height:auto;resize: none !important;">';
                    tbody += datos[i].descripcion;
                    tbody += '</textarea>';
                    tbody += '</td>';
                    tbody += '<td>';
                    tbody += datos[i].precio;
                    tbody += '</td>';
                    tbody += '<td>';
                    tbody += datos[i].plan;
                    tbody += '</td>';
                    tbody += '<td>';
                    tbody += datos[i].horas;
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
            console.error(err);
        }
        document.getElementById("listado_table").innerHTML = tbody;



        // SIRVE PARA QUE EL TEXTAREA SE ADAPTE AL TEXTO
        // https://es.stackoverflow.com/questions/348567/auto-ajustar-el-textarea-seg%C3%BAn-el-contenido
        var newheight = 0;
        $(".sizeText").each(function () {
            var h = $(this).height();
            var s = $(this).prop("scrollHeight");
            console.log(h + "-" + s);
            if ((h + s) > newheight) {
                newheight = h + s;
            }
        });
        $(".sizeText").height(newheight);
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
            document.getElementById("Edescripcion").value = Odatos.descripcion;
            //document.getElementById("Eprecio").value = Odatos.precio;
            document.getElementById("Ehora").value = Odatos.horas;

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

                    listar();
                    document.getElementById("closePopup").click();
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