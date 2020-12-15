$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    $("#btnuploadimage").click(function () {

        var formData = new FormData($('#formdataImage')[0]);
        formData.append("cmd", 'web');

        $.ajax({
            url: ruta() + 'photoProfile',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false
        })
                .done(function (json) {
                    if (json['status'] == 'Ok') {
                        Swal.fire({
                            title: 'Mensaje Importante',
                            text: json['msg'],
                            icon: 'success',
                            confirmButtonColor: '#1ac9ff',
                            confirmButtonText: 'Aceptar Cambios'
                        }).then((result) => {
                            if (result.value) {
                                location.reload();
                            }
                        });
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