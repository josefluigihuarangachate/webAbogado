<?php
$v = "?v=" . date('YmdHis');
?>
<!--<script src="assets/js/ruta.js"></script>-->
<script src="user/assets/js/jquery-3.5.0.js"></script>
<script src="user/assets/js/main.min.js<?php echo $v; ?>"></script>
<script src="user/assets/js/jquery-stories.js<?php echo $v; ?>"></script>
<script src="user/assets/js/script.js<?php echo $v; ?>"></script>
<script src="user/assets/js/crud/menuCategoria.js<?php echo $v; ?>"></script>
<script>
    function reload() {
        location.reload();
    }
</script>

<script>
    document.getElementById('guardarFotoPerfil').disabled = true;

    function loadFile() {
        //const file = this.files[0];
        var fileInput = document.getElementById('inputFile');

        var filePath = fileInput.value;

        // Allowing file type 
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

        if (!allowedExtensions.exec(filePath)) {
            fileInput.value = '';
            document.getElementById("labelUploadProfile").innerHTML = '<i class="lni lni-gallery"></i>&nbsp; Cargar...';
            alert('Imagen no permitida');
            document.getElementById('guardarFotoPerfil').disabled = true;
        } else {
            document.getElementById("labelUploadProfile").innerHTML = '<i class="lni lni-gallery"></i>&nbsp;&nbsp;&nbsp; Listo! &nbsp;&nbsp;';
            document.getElementById('guardarFotoPerfil').disabled = false;
        }
    }

    $(document).ready(function () {
        $("#guardarFotoPerfil").click(function () {
            var fd = new FormData($('#formDataProfile')[0]);
            var files = $('#inputFile')[0].files;

            fd.append('inputFile', files[0]);
            fd.append('cmd', 'web');

            $.ajax({
                url: ruta() + 'photoProfile' + globalName,
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function (json) {
                    if (json['status'] == 'Ok') {
                        swal({
                            title: "Aviso Importante",
                            text: json['msg'],
                            // icon: "success",
                            button: "Aceptar", // buttons: ["Cancelar", "Aceptar"],
                            closeOnClickOutside: false
                        });

                        setTimeout(function () {
                            location.reload();
                        }, 200);

                    } else {
                        swal({
                            title: "Aviso Importante",
                            text: json['msg'],
                            // icon: "success",
                            button: "Aceptar", // buttons: ["Cancelar", "Aceptar"],
                            closeOnClickOutside: false
                        });
                    }
                }
            });
        });
    });
</script>
<!--<script>
    swal({
        title: "Aviso Importante",
        text: "El mensaje fue eliminado",
        // icon: "success",
        button: "Aceptar", // buttons: ["Cancelar", "Aceptar"],
        closeOnClickOutside: false
    });
</script>-->