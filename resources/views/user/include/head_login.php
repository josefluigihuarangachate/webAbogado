<?php
$v = "?v=" . date('YmdHis');
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="CREADO POR REINNOVATECH">
<meta name="keyword" content="">
<meta name="author"  content="REINNOVATECH"/>
<title>ABOGADOS | BIENVENIDO</title>
<meta name="csrf-token" content="<?php echo csrf_token() ?>" />
<link type="image/x-icon" rel="icon" href="user/assets/images/img/icono.png">

<!--
Buscar Iconos : https://lineicons.com/icons/
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css" />
<script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>-->

<script src="general/js/ruta.js<?php echo $v; ?>"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<!-- BEGIN: Custom CSS-->  
<link type="text/css" rel="stylesheet" href="user/assets/css/main.min.css<?php echo $v; ?>"/>
<link type="text/css" rel="stylesheet" href="user/assets/css/style2.css<?php echo $v; ?>"/>
<link type="text/css" rel="stylesheet" href="user/assets/css/color.css<?php echo $v; ?>"/>
<link type="text/css" rel="stylesheet" href="user/assets/css/selectMultiLanguage.css<?php echo $v; ?>"/>
<!-- <script src="{{ asset('assets/js/jquery-3.5.0.js') }}"></script> -->

<!-- SWEETALERT -->
<script src="user/assets/js/sweetalert.min.js<?php echo $v; ?>"></script>
<!-- END SWEETALERT-->

<style>
    .swal-title {
        margin: 0px;
        font-size: 18px;
        box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.21);
        margin-bottom: 28px;
    }
    .swal-title:first-child{
        margin-top: 0px !important;
    }
    .swal-text {
        padding: 10px;
        font-size: 17px;
        text-align: center;
    }

    .swal-overlay {
        background-color: rgba(51, 51, 51, 0.8);
    }

    .swal-footer {
        background-color: rgb(245, 248, 250);
        margin-top: 32px;
        border-top: 1px solid #E9EEF1;
        overflow: hidden;
        text-align: center;
    }
</style>