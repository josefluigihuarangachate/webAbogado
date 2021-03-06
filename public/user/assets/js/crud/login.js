// CSRF-TOKEN PARA LARAVEL
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    $(".btnsend").click(function () {
        var formData = new FormData($('#formdata')[0]);
        formData.append("cmd", 'web');

        $.ajax({
            url: ruta() + 'login_user',
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
                            //button: "Aceptar", // buttons: ["Cancelar", "Aceptar"],
                            closeOnClickOutside: false
                        });

                        document.getElementById("formdata").reset();

                        setTimeout(function () {
                            window.location.href = json['redirect'];
                        }, 500);

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