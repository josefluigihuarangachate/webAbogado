// CSRF-TOKEN PARA LARAVEL
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    $(".btnsendreg").click(function () {
        var formData = new FormData($('#formdataReg')[0]);
        formData.append("cmd", 'web');

        $.ajax({
            url: ruta() + 'register_user',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false
        })

                .done(function (json) {
                    if (json['status'] == 'Ok') {

                        swal({
                            title: "Aviso Importante",
                            text: json['msg'],
                            // icon: "success",
                            button: "Aceptar", // buttons: ["Cancelar", "Aceptar"],
                            closeOnClickOutside: false
                        });

                        document.getElementById("formdataReg").reset();

                    } else if (json['status'] == 'Error') {
                        swal({
                            title: "Aviso Importante",
                            text: json['msg'],
                            // icon: "success",
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
    });
});

// Limpio el input porque me esta autocompletando
setTimeout(function () {
    document.getElementById("regUser").value = "";
    document.getElementById("regClave").value = "";
}, 200);