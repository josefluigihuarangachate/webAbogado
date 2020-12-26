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

    try {
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
    } catch (error) {
    }

</script>

<script src="admin/assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>

<!-- BEGIN: Vendor JS -->
<script src="admin/assets/plugins/cleavejs/cleave.min.js"></script>
<script src="admin/assets/plugins/cleavejs/addons/cleave-phone.us.js"></script>
<!-- END: Vendor JS-->
<!-- BEGIN: Init JS -->      
<script>
    $(function () {
        'use strict'

        // Credit Card
        var cleaveA = new Cleave('#inputCreditCard', {
            creditCard: true,
            onCreditCardTypeChanged: function (type) {
                console.log(type)
                var card = $('#creditCardType').find('.' + type);

                if (card.length) {
                    card.addClass('tx-primary');
                    card.siblings().removeClass('tx-primary');
                } else {
                    $('#creditCardType span').removeClass('tx-primary');
                }
            }
        });

        // US Format Phone Number
        var cleaveB = new Cleave('#inputPhoneNumber', {
            phone: true,
            phoneRegionCode: 'US'
        });

        // Date Formatting
        var cleaveC = new Cleave('#inputDate', {
            date: true,
            datePattern: ['Y', 'm', 'd']
        });

        var cleaveD = new Cleave('#inputDate2', {
            date: true,
            datePattern: ['m', 'y']
        });

        // Time Formatting
        var cleaveE = new Cleave('#inputTime', {
            time: true,
            timePattern: ['h', 'm', 's']
        });

        var cleaveF = new Cleave('#inputTime2', {
            time: true,
            timePattern: ['h', 'm']
        });

        // Numeral Formatting
        var cleaveG = new Cleave('#inputNumeral', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });

        // Blocks Formatting
        var cleaveH = new Cleave('#inputBlocks', {
            blocks: [4, 3, 3, 4],
            uppercase: true
        });

        // Multiple Delimiter
        var cleaveI = new Cleave('#inputBlocks2', {
            delimiters: ['+', '+', '-'],
            blocks: [3, 3, 4, 2]
        });

        // Prefix
        var cleaveJ = new Cleave('#inputBlocks3', {
            prefix: 'Prefix-',
            uppercase: true
        });
    });
</script>
<!-- END: Init JS-->

<script src="admin/assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="admin/assets/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
<script src="admin/assets/plugins/bootstrap-multiselect/js/multiselect-active.js"></script>

<style>
    .goog-te-banner-frame{
        display: none;
        visibility: hidden;
        background-color: transparent;
    }

    #google_translate_element2{
        display: none;
        visibility: hidden;
        background-color: transparent;
    }
</style>

<script>

    setTimeout(function () {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/notifyAll",
            success: function (json) {
                if (json['status'] == 'Ok') {
                    if (json['data']) {
                        var data = json['data'];
                        var notificaciones = "";
                        for (var d = 0; d < data.length; d++) {
                            notificaciones += '<a class="dropdown-item list-group-item" href="">';
                            notificaciones += '<div class="d-flex justify-content-between">';
                            notificaciones += '<div class="wd-40 ht-40 mg-r-10 d-flex align-items-center justify-content-center rounded card-icon-' + data[d].color + '">';
                            notificaciones += '<i class="mdi mdi-bullhorn alert-icon text-' + data[d].color + '" style="font-size: 20px;"></i>';
                            notificaciones += '</div>';
                            notificaciones += '</div>';
                            notificaciones += '<div class="overflow-hidden">';
                            notificaciones += '<h3 class="tx-11 mb-0 tx-dark">' + data[d].asunto + '</h3>';
                            notificaciones += '<div class="tx-11 d-block text-truncate">' + data[d].mensaje + '</div>';
                            notificaciones += '<span class="tx-9 tx-light">' + data[d].fechahora + '</span>';
                            notificaciones += '</div>';
                            notificaciones += '</a>';
                        }
                        document.getElementById("scrollNotify").innerHTML = notificaciones;
                    }
                }
            }
        });
    }, 100);

    function loadNotificacion() {
        setInterval(function () {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "/notifyAll",
                success: function (json) {
                    if (json['status'] == 'Ok') {
                        if (json['data']) {
                            var data = json['data'];
                            var notificaciones = "";
                            for (var d = 0; d < data.length; d++) {
                                notificaciones += '<a class="dropdown-item list-group-item" href="./verNotificacion/' + data[d].id + '">';
                                notificaciones += '<div class="d-flex justify-content-between">';
                                notificaciones += '<div class="wd-40 ht-40 mg-r-10 d-flex align-items-center justify-content-center rounded card-icon-' + data[d].color + '">';
                                notificaciones += '<i class="mdi mdi-bullhorn alert-icon text-' + data[d].color + '" style="font-size: 20px;"></i>';
                                notificaciones += '</div>';
                                notificaciones += '</div>';
                                notificaciones += '<div class="overflow-hidden">';
                                notificaciones += '<h3 class="tx-11 mb-0 tx-dark">' + data[d].asunto + '</h3>';
                                notificaciones += '<div class="tx-11 d-block text-truncate">' + data[d].mensaje + '</div>';
                                notificaciones += '<span class="tx-9 tx-light">' + data[d].fechahora + '</span>';
                                notificaciones += '</div>';
                                notificaciones += '</a>';
                            }
                            document.getElementById("scrollNotify").innerHTML = notificaciones;
                        }
                    }
                }
            });
        }, 20000);
    }

    loadNotificacion();
</script>