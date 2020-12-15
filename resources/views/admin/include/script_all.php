<?php
$v = "?v=" . date('YmdHis');
?>
<script src="admin/assets/js/jquery-3.5.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

<!-- BEGIN: Init JS-->
<script src="admin/assets/lib/dashboard/ecommerce/sales-monitoring-init.js"></script>
<!-- END: Init JS-->

<!-- BEGIN: Custom CSS-->  
<script src="admin/assets/plugins/toastr/toastr.min.js"></script>
<script src="admin/assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="admin/assets/plugins/sweetalert2/sweetalert2-active.js"></script>
<!-- END: Custom CSS-->

<script src="admin/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="admin/assets/plugins/peity/jquery.peity.min.js"></script>
<script src="admin/assets/plugins/jqvmap/jquery-jvectormap-2.0.2.min.js"></script>	
<script src="admin/assets/plugins/jqvmap/gdp-data.js"></script>
<script src="admin/assets/plugins/jqvmap/maps/jquery-jvectormap-world-mill-en.js"></script>
<!-- END: Vendor JS-->
<script src="admin/assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
<!-- END: Global JS-->
<!-- BEGIN: Vendor JS -->
<script src="admin/assets/plugins/chart.js/plugin/chartjs-plugin-labels.min.js"></script>
<!-- END: Vendor JS-->
<!-- BEGIN: Init JS -->
<script src="admin/assets/lib/dashboard/analytic/dashboard-acquisition.js"></script>
<!-- END: Init JS-->
<!--<script src="admin/assets/js/crud/verify_extension_image.js"></script>
<script src="admin/assets/js/crud/change_photo_profile.js"></script>-->

<script src="admin/assets/plugins/dataTable/datatables.min.js"></script>
<script src="admin/assets/plugins/dataTable/responsive/dataTables.responsive.js"></script>
<script src="admin/assets/plugins/dataTable/extensions/dataTables.jqueryui.min.js"></script>
<script src="admin/assets/js/datatable.js"></script>
<!-- END: Vendor JS-->
<!-- BEGIN: Init JS-->

<script src="admin/assets/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
<script src="admin/assets/plugins/bootstrap-multiselect/js/multiselect-active.js"></script>
<!--<script src="admin/assets/js/crud/mapa.js" type="text/javascript"></script>-->

<!-- BEGIN: Global JS -->	  
<script src="admin/assets/js/plugin-bundle.js"></script>
<script src="admin/assets/js/app.js"></script>
<script src="admin/assets/js/adata-init.js"></script>
<!-- END: Global JS-->
<!-- BEGIN: Vendor JS -->
<script src="admin/assets/plugins/chart.js/chart.min.js"></script> 
<script src="admin/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="admin/assets/plugins/peity/jquery.peity.min.js"></script>
<script src="admin/assets/plugins/jqvmap/jquery-jvectormap-2.0.2.min.js"></script>	
<script src="admin/assets/plugins/jqvmap/gdp-data.js"></script>
<script src="admin/assets/plugins/jqvmap/maps/jquery-jvectormap-world-mill-en.js"></script>
<!-- END: Vendor JS-->
<!-- BEGIN: Init JS-->
<script src="admin/assets/lib/dashboard/ecommerce/sales-monitoring-init.js"></script>
<!-- END: Init JS-->
<script>
    $(".data-attributes span").peity("donut")
</script>



<script>
    // Ejm : https://jsfiddle.net/xfxstudios/2az4nbvb/
    var busqueda = document.getElementById('buscar');
    var table = document.getElementById("tabla").tBodies[0];

    buscaTabla = function () {
        texto = busqueda.value.toLowerCase();
        var r = 0;
        while (row = table.rows[r++])
        {
            if (row.innerText.toLowerCase().indexOf(texto) !== -1)
                row.style.display = null;
            else
                row.style.display = 'none';
        }
    }

    busqueda.addEventListener('keyup', buscaTabla);
</script>