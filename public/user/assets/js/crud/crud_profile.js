$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var globalName = 'General';

function actualizarPerfil() {
    var formData = new FormData($('#formData')[0]);
    var latitudMap = parseFloat(document.getElementById('txtlatitud').value);
    var longitudMap = parseFloat(document.getElementById('txtlongitud').value);

    formData.append('cmd', 'web');
    formData.append('txtlatitud', latitudMap);
    formData.append('txtlongitud', longitudMap);

    $.ajax({
        url: ruta() + 'appprofileactualizar' + globalName,
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
                setTimeout(function () {
                    location.reload();
                }, 200);
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

