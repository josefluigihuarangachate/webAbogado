<?php
$v = "?v=" . date('YmdHis');
?>

<script>
    setTimeout(function () {
        document.getElementById("regUser").value = "";
        document.getElementById("regClave").value = "";
        console.log("Datos Limpiados");
    }, 100);
</script>
<!--<script src="assets/js/ruta.js"></script>-->
<script src="user/assets/js/jquery-3.5.0.js"></script>
<!--<script src="assets/js/main.min.js<?php //echo $v;           ?>"></script>-->
<script src="user/assets/js/script.js<?php echo $v; ?>"></script>
<script src="user/assets/js/crud/login.js"></script>
<script src="user/assets/js/crud/register.js"></script>
<!--<script>
    swal({
        title: "Aviso Importante",
        text: "El mensaje fue eliminado",
        // icon: "success",
        button: "Aceptar", // buttons: ["Cancelar", "Aceptar"],
        closeOnClickOutside: false
    });
</script>-->