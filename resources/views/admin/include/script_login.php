<?php
$v = "?v=" . date('YmdHis');
?>

<!-- BEGIN: Custom CSS-->  
<script src="admin/assets/plugins/toastr/toastr.min.js<?php echo $v; ?>"></script>
<script src="admin/assets/plugins/sweetalert2/sweetalert2.all.min.js<?php echo $v; ?>"></script>
<script src="admin/assets/plugins/sweetalert2/sweetalert2-active.js<?php echo $v; ?>"></script>
<script src="admin/assets/js/crud/login.js<?php echo $v; ?>"></script>
<!-- END: Custom CSS-->

<!--<script>
    Swal.fire(
            'Mensaje Importante',
            'Hola como estan todos en peru',
            'success' // question,warning,error
            );
</script>-->
<!--<script>
    swal({
        title: "Aviso Importante",
        text: "El mensaje fue eliminado",
        // icon: "success",
        button: "Aceptar", // buttons: ["Cancelar", "Aceptar"],
        closeOnClickOutside: false
    });
</script>-->