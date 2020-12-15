document.getElementById('btnuploadimage').disabled = true;
function loadFile() {
    //const file = this.files[0];
    var fileInput = document.getElementById('cargarfoto');

    var filePath = fileInput.value;

    // Allowing file type 
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

    if (!allowedExtensions.exec(filePath)) {
        fileInput.value = '';
        document.getElementById("text_imagen").innerHTML = "&nbsp; Cargar Foto";
        Swal.fire(
                'Mensaje Importante',
                'Tipo de imagen  no permitida',
                'warning' // question,warning,error
                );
        document.getElementById('btnuploadimage').disabled = true;
    } else {
        document.getElementById("text_imagen").innerHTML = "&nbsp; Foto Listo";
        document.getElementById('btnuploadimage').disabled = false;
    }
}