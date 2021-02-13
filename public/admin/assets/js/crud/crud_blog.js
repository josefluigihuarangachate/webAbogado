// LISTAR
// CSRF-TOKEN PARA LARAVEL
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// LISTAR DATOS
var cod = 0;
var nextLink = 0;

function listar() {
    try {
        document.getElementById("listado_table").innerHTML = "";
        // var txt = $("input").val();
        $.post(ruta() + "listadoBlog", {cmd: 'web'}, function (json) {

            var tbody = '<tr>';
            tbody += '<td colspan="5">';
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
                        tbody += datos[i].carpeta;
                        tbody += '</td>';
                        tbody += '<td style="text-align: center;">';
                        tbody += "<button onclick='verdemo(" + datos[i].id + ");' class='btn btn-danger btn-sm' type='button' data-toggle='modal' data-target='#demoPopup'><i class='fa fa-html5'></i>&nbsp;&nbsp; Demo</button>";
                        tbody += '</td>';
                        tbody += '<td style="text-align: center;">';

                        if (datos[i].estado == 'activo') {
                            tbody += "<button class='btn btn-success btn-sm'>Activo</button>";
                        } else {
                            tbody += "<button class='btn btn-danger btn-sm'>Inactivo</button>";
                        }

                        tbody += '</td>';


                        tbody += '<td style="text-align: center;">';
                        tbody += '<button class="btn btn-danger btn-sm" type="button" onclick="eliminar(' + datos[i].id + ",'" + datos[i].carpeta + "'" + ');">Eliminar</button>';
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



function quitarAgregarPagina() {

    try {
        var element = document.getElementById('uniqueAdd');
        element.remove();
    } catch (e) {

    }
}
//
function verdemo(idFolder) {
    $.post(ruta() + "verdemoBlog", {cmd: 'web', idFolder: idFolder}, function (json) {
        if (json['status'] == 'Ok') {
            document.getElementById('popupframe').src = json['html'];
        }
    });
}

function eliminar(idFolder, nameFolder) {
    $.post(ruta() + "eliminarBlog", {cmd: 'web', idFolder: idFolder, nameFolder: nameFolder}, function (json) {
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
//
//function newPage() {
//    var iframe = document.getElementById('frame');
//    iframe.src = iframe.src;
//}
//
//function addFolder() {
//    var folder = document.getElementById("folder").value;
//    if (folder.trim() != "") {
//        folder = folder.match(/[^ ,]+/g).join('_');
//        page['codigo'] = 'COD-1';
//        page['folder'] = folder;
//    }
//    document.getElementById("folder").value = folder;
//}
//
//function ventanaEmergente() {
//    window.open('/editorCode', "Editor de Pagina", "width=1000,height=500,resizable=NO,scrollbars=NO");
//}


// Adding child node to list using Jquery
// https://stackoverflow.com/questions/16229116/adding-child-node-to-list-using-jquery
// 
// Dynamically add and remove <input> jQuery
// https://shouts.dev/add-or-remove-input-fields-dynamically-using-jquery
$(document).ready(function () {
    $('body').on('click', 'ol li .add', function () {
        var folder = document.getElementById("folder").value;
        if (folder.trim() != "") {
            cod = cod + 1;
            var ol = "";

            ol += '<div class="accordion" id="accordion' + cod + '">';
            ol += '<div class="card accordion-group" style="background-color: #333;border: 1px solid #76dd9b !important;">';
            ol += '<div class="card-header accordion-heading" style="border: 1px solid #76dd9b !important;">';
            ol += '<h5 class="mb-0">';
            ol += '<a class="accordion-toggle" style="color: #76dd9b;" data-toggle="collapse" data-parent="#accordion' + cod + '" href="#collapse' + cod + '">PAGINA COD-' + cod + '</a>';
            ol += '</h5>';
            ol += '</div>';
            ol += '<div id="collapse' + cod + '" class="accordion-body collapse">';
            ol += '<div class="card-body accordion-inner">';


            ol += "<ol>";
            ol += '<li class="special" role="group">';
            ol += '<input type="text" id="cod' + cod + '" name="cod' + cod + '" aria-label="Disabled input example" style="width: 250px;" disabled="disabled" autocomplete="off" class="btn btn-default" placeholder="COD-' + cod + '" value="COD-' + cod + '">';
            ol += '<input type="text" onkeyup="nombresinespacio(' + cod + ');" id="namepage' + cod + '" name="namepage' + cod + '" class="form-control" style="width: 250px;" placeholder="Nombre de Pagina (Obligatorio)" autocomplete="off" required="required">';
            ol += '<input type="text" id="title' + cod + '" name="title' + cod + '" class="form-control" style="width: 250px;" placeholder="Titulo (Opcional)" autocomplete="off">';
            ol += '<input type="text" id="subtitle' + cod + '" name="subtitle' + cod + '" class="form-control" style="width: 250px;" placeholder="Subtitulo (Opcional)" autocomplete="off">';
            ol += '<textarea type="text" id="descripcion' + cod + '" name="descripcion' + cod + '" class="form-control" style="width: 250px;height: 80px;resize: none;" rows="1" placeholder="Descripción (Opcional)" autocomplete="off"></textarea>';
            ol += '<input type="file" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" multiple="multiple" id="image' + cod + '" name="image' + cod + '[]" class="form-control" style="width: 250px;">';
            ol += '<div id="divlink' + cod + '" name="divlink' + cod + '">';
            ol += '<button class="btn btn-primary btn-sm" type="button" onclick="addinputLink(' + cod + ');" style="width: 250px;">+ Agregar Link</button>';
            ol += '</div>';
            ol += '<button type="button" style="margin-bottom: 20px;width: 125px;" class="add btn btn-success btn-sm">+</button>';
            ol += '<button type="button" id="btn' + cod + '" name="btn' + cod + '" style="margin-bottom: 20px;width: 125px;" class="delete btn btn-danger btn-sm">-</button> ';
            ol += '</li>';
            ol += '</ol>';

            ol += '</div>';
            ol += '</div>';
            ol += '</div>';
            ol += '</div>';

            document.getElementById("max").value = cod;
            $(this).parent().append(ol);

            // QUITO EL BOTON DE AGREGAR PAGINA PARA EL INDEX
            quitarAgregarPagina();
        }
    });
});

function nombresinespacio(codigo) {
    var value = document.getElementById("namepage" + codigo).value;
    value = value.match(/[^ ,]+/g).join('_');
    document.getElementById("namepage" + codigo).value = value;
}


function addinputLink(c) {
    nextLink = nextLink + 1;
    var input = '<div id="inputFormRow">';
    input += '<div class="input-group">';
    input += "<input type='text' name='link" + c + "[]' id='link" + c + "' style='width: 100px !important;padding-left: 10px;padding-right: 10px;' placeholder='Link de nombre de pagina' value='link" + nextLink + "' required='required'>";
    input += "<input type='text' name='linktitle" + c + "[]' id='linktitle" + c + "' style='width: 100px !important;padding-left: 10px;padding-right: 10px;' placeholder='Link Titulo'  required='required'>";
    input += '<span class="input-group-btn">';
    input += '<button id="removeRow" name="removeRow[]" type="button" class="btn btn-danger" style="width: 50px;">X</button>';
    input += '</span>';
    input += '</div>';
    input += '</div>';

    $('#divlink' + c).append(input);
}

$(document).on('click', '#removeRow', function () {
    $(this).closest('#inputFormRow').remove();
});

//function addinputLink(co){
//    
//}

//function addPage(id) {
//    // var link = document.getElementById("link" + id).value;
//    var pageName = document.getElementById("file" + id).value;
//    var body = document.getElementById("body" + id).value;
//    var css = document.getElementById("css" + id).value;
//
//    if (
//            // (link.trim() != '' && pageName.trim() != '' && body.trim() != '' && css.trim() != '') ||
//            pageName.trim() != '' && body.trim() != '' && css.trim() != ''
//            ) {
//        page["pages"]["COD-" + id] = {
//            'COD': "COD-" + id,
//            //'LINK': link,
//            'PAGE': pageName,
//            'BODY': body,
//            'CSS': css
//        };
//
//
//        // try {
//        //     document.getElementById("link" + id).value = link.match(/[^ ,]+/g).join('_');
//        // } catch (e) {}
//
//        try {
//            document.getElementById("file" + id).value = pageName.match(/[^ ,]+/g).join('_');
//        } catch (e) {
//
//        }
//
//    } else if (pageName.trim() == '' || body.trim() == '' || css.trim() == '') {
//        try {
//            delete page["pages"]["COD-" + id];
//        } catch (e) {
//
//        }
//    }
//}
//
//function removePage(id) {
//    delete page["pages"]["COD-" + id];
//    try {
//        for (var cd = 2; cd <= cod; cd++) {
//            if ($("#cod" + cd).length === 0) {
//                delete page["pages"]["COD-" + cd];
//            }
//            console.log("cod" + cd + " - " + $("#cod" + cd).length);
//        }
//    } catch (e) {
//    }
//}
//
$(document).ready(function () {
    $('body').on('click', 'ol li .delete', function (e) {
        e.preventDefault();
        $(this).parent().remove();
    });
});
//
//$(document).ready(function () {
//    $("#registrarBlog").click(function () {
//
//        //if (page.length > 0) {
//        $.post(ruta() + "registrarBlog", {cmd: 'web', pages: page}, function (json) {
//            if (json['status'] == 'Ok') {
//                Swal.fire(
//                        'Aviso Importante',
//                        json['msg'],
//                        'success'
//                        );
//
//                setTimeout(function () {
//                    location.reload();
//                }, 300);
//            } else {
//                Swal.fire(
//                        'Aviso Importante',
//                        json['msg'],
//                        'error'
//                        );
//            }
//        });
////        } else {
////            Swal.fire(
////                    'Aviso Importante',
////                    'No se encontraron paginas para registrar',
////                    'error'
////                    );
////        }
//    });
//});