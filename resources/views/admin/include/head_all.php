<?php
$v = "?v=" . date('YmdHis');
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="CREADO POR REINNOVATECH">
<meta name="keyword" content="">
<meta name="author"  content="REINNOVATECH"/>
<title>ABOGADOS | SISTEMA</title>
<meta name="csrf-token" content="<?php echo csrf_token() ?>" />

<script src="general/js/ruta.js<?php echo $v; ?>"></script>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<!-- BEGIN: Custom CSS-->  
<link type="text/css" rel="stylesheet" href="admin/assets/css/style.css<?php echo $v; ?>"/>
<link type="text/css" rel="stylesheet" href="admin/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css"/>
<!-- END: Custom CSS-->

<!-- BEGIN: Custom CSS-->  
<link type="text/css" rel="stylesheet" href="admin/assets/plugins/sweetalert2/sweetalert2.min.css"/>
<link type="text/css" rel="stylesheet" href="admin/assets/plugins/toastr/toastr.min.css"/>
<link type="text/css" rel="stylesheet" href="admin/assets/css/style.css"/>
<!-- END: Custom CSS-->

<!-- BEGIN: Favicon-->
<link type="image/x-icon" rel="icon" href="general/img/icono.png">
<!-- END: Favicon-->

<!-- BEGIN: Custom CSS-->  
<link type="text/css" rel="stylesheet" href="admin/assets/plugins/dataTable/datatables.min.css">
<link type="text/css" rel="stylesheet" href="admin/assets/plugins/dataTable/extensions/dataTables.jqueryui.min.css">
<link type="text/css" rel="stylesheet" href="admin/assets/plugins/bootstrap-multiselect/css/bootstrap-multiselect.css">
<link type="text/css" rel="stylesheet" href="admin/assets/plugins/bootstrap-multiselect/css/awesome-bootstrap-checkbox.css">
<link type="text/css" rel="stylesheet" href="admin/assets/plugins/bootstrap-select/css/bootstrap-select.min.css">
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsS1Y0-4vNu3rAiYF8Vo1wK9_oW6cvv_c&callback=initMap&libraries=&v=weekly"
    defer
></script>

<!-- BEGIN: Vendor CSS -->
<link type="text/css" rel="stylesheet" href="admin/assets/plugins/chart.js/chart.min.css"/>
<link type="text/css" rel="stylesheet" href="admin/assets/plugins/daterangepicker/daterangepicker.css"/>
<link type="text/css" rel="stylesheet" href="admin/assets/plugins/jqvmap/jquery-jvectormap-2.0.2.css">

<link type="text/css" rel="stylesheet" href="admin/assets/plugins/bootstrap-select/css/bootstrap-select.min.css">
<link type="text/css" rel="stylesheet" href="admin/assets/plugins/bootstrap-multiselect/css/awesome-bootstrap-checkbox.css">
<script>
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
                "IdProfile<?php echo session('id'); ?>": "IdProfile_<?php echo session('id'); ?>", // ESTE ID ESTA DECLARADO EN EL HEAD QUE SE INCLUYE EN TODOS LOS ARCHIVOS
            }
    );

</script>