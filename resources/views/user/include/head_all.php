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

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="general/js/ruta.js<?php echo $v; ?>"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<!-- BEGIN: Custom CSS-->  
<link type="text/css" rel="stylesheet" href="user/assets/css/main.min.css<?php echo $v; ?>"/>
<link type="text/css" rel="stylesheet" href="user/assets/css/style2.css<?php echo $v; ?>"/>
<link type="text/css" rel="stylesheet" href="user/assets/css/color.css<?php echo $v; ?>"/>
<link type="text/css" rel="stylesheet" href="user/assets/css/selectMultiLanguage.css<?php echo $v; ?>"/>

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

<style>
    .search-input{
        width: 100%;
        padding: 15px;
        font-size: 14px;
        border-radius: 50px;
        border: 1px solid #ccc;
        color: #333;
    }
</style>


<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsS1Y0-4vNu3rAiYF8Vo1wK9_oW6cvv_c&callback=initMap&libraries=&v=weekly"
    defer
></script>

<!--<script>
    (function (w, d, s, id) {
        if (typeof (w.webpushr) !== 'undefined')
            return;
        w.webpushr = w.webpushr || function () {
            (w.webpushr.q = w.webpushr.q || []).push(arguments)
        };
        var js, fjs = d.getElementsByTagName(s)[0];
        js = d.createElement(s);
        js.id = id;
        js.src = "https://cdn.webpushr.com/app.min.js";
        fjs.parentNode.appendChild(js);
    }(window, document, 'script', 'webpushr-jssdk'));
    webpushr(
            'setup',
            {
                'key': 'BGk7-JRUCYl4IiJzJgdr8w2itrI_r9SD9QiWbpPmsx91Q5Sf3nt7f4pkdJkr84yij1hfl69HhMNA3ahUsmTyI3o',
                'integration': 'popup'
            });

    webpushr(
            'attributes',
            {
                "IdProfile<?php //echo session('id');  ?>": "IdProfile_<?php //echo session('id');  ?>", // ESTE ID ESTA DECLARADO EN EL HEAD QUE SE INCLUYE EN TODOS LOS ARCHIVOS
            }
    );

</script>-->


<script>
    // ESTE AYUDA A QUE SE COMUNIQUE CON ANDROID STUDIO Y EJECUTE LA FUNCION Y GUARDE EL ID DE ONE SIGNAL
    function sendDataToAndroid(idUser) {
        Function_Notificacion.onButtonClick(idUser);
    }
    sendDataToAndroid("<?php echo session('id'); ?>");
</script>