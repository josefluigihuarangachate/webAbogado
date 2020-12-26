<?php
session_start();
if (session('acceso') <> true) {
    header("Location: " . URL::to('/'));
    exit();
}

header('Content-Type: text/html; charset=UTF-8');

$v = "?v=" . date('YmdHis');
?>
<!DOCTYPE html>
<html>
    <head>
        @include('admin/include/head_all')
    </head>
    <body>
        <!--================================-->
        <!-- Page Container Start -->
        <!--================================-->
        <div class="page-container">

            <!-- Sidebar Start -->
            @include('admin/include/sidebar')
            <!-- End Sidebar Start -->


            <!-- Page Content Start -->
            <!--================================-->
            <div class="page-content">
                <!-- Navbar Start -->
                @include('admin/include/navbar')
                <!-- End Navbar Start -->



                <!-- Page Inner Start -->
                <!--================================-->
                <div class="page-inner">

                    <div class="row row-xs">
                        <!--================================-->
                        <!-- Products Status Start -->
                        <!--================================-->
                        <div class="col-xl-12">
                            <div class="card mg-b-20">
                                <div class="d-block d-md-flex justify-content-between align-items-center pd-15 bd-b">
                                    <h2 class="tx-13 tx-medium mb-0 tx-dark">
                                        Listado de Notificaciones
                                        <br>
                                        <small>*Notificaciones: Recibe y envia notificaciones a tu cuenta de usuario.</small>
                                    </h2>

                                </div>
                                <div class="tab-content">
                                    <div class="custom-fieldset mg-b-30">
                                        <div class="row">                                            
                                            <div class="col-12 col-md-12 bd pd-15">
                                                <div class="tab-pane fade active show" id="latestProducts" role="tabpanel" aria-labelledby="latestProducts">
                                                    <div class="card-body"  id="productScrollBar">
                                                        <h4>Notificacion : </h4>
                                                        <br>
                                                        <div style="overflow-x:auto;height: calc(100vh - 358px) !important;">
                                                            <!-- EJM : https://stackoverflow.com/questions/49126162/laravel-get-items-from-session-array --> 
                                                            <div class="alert alert-<?php echo session('idNotifyTemp.color'); ?> alert-bordered pd-y-15" role="alert">
                                                                <button type="button" class="close" aria-label="Close">
                                                                    <span aria-hidden="true">
                                                                        <i class="mdi mdi-close tx-16"></i>
                                                                    </span>
                                                                </button>
                                                                <div class="d-sm-flex align-items-center justify-content-start">
                                                                    <i class="mdi <?php echo session('idNotifyTemp.icon'); ?> alert-icon tx-50 mg-r-20 tx-<?php echo session('idNotifyTemp.color'); ?>"></i>
                                                                    <div class="mg-t-20 mg-sm-t-0">
                                                                        <h5 class="mg-b-2 tx-<?php echo session('idNotifyTemp.color'); ?>"><?php echo session('idNotifyTemp.tipo'); ?></h5>
                                                                        <br>
                                                                        <h6 class="mg-b-2 tx-<?php echo session('idNotifyTemp.color'); ?>">Codigo: <?php echo session('idNotifyTemp.codigo'); ?></h6>
                                                                        <br>
                                                                        <h7 class="mg-b-2 tx-<?php echo session('idNotifyTemp.color'); ?>">Asunto:<br><?php echo session('idNotifyTemp.asunto'); ?></h7>
                                                                        <br>
                                                                        <br>
                                                                        <p class="mg-b-0" style="width: 100%;">
                                                                            Mensaje:
                                                                            <br>
                                                                            <?php echo session('idNotifyTemp.mensaje'); ?>
                                                                        </p>

                                                                        <br>
                                                                        <br>
                                                                        <span><?php echo session('idNotifyTemp.fechahora'); ?></span>
                                                                        <span style="float: right;"><i class="mdi mdi-check-all"></i>&nbsp;<?php echo session('idNotifyTemp.leido'); ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>       
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>                    
                </div>                
            </div>
            <!--/ Page Content End -->
        </div>
        <!--/ Page Container End -->




        <div style="display: none;">
            @include('admin/include/translate')
        </div>


        <!--================================-->
        <!-- Scroll To Top Start-->
        <!--================================-->	
        <a href="" data-click="scroll-top" class="btn-scroll-top fade waves-effect"><i data-feather="arrow-up" class="wd-16 ht-16"></i></a>
        <!--/ Scroll To Top End -->
        <!-- BEGIN: Theme Customizer-->

        <!-- End: Theme Customizer-->
        <!--================================-->

        @include('admin/include/script_all')
        <script>
            $(document).ready(function () {
                $(".close").click(function () {
                    $("#myAlert").alert("close");
                });
            });


            $('#Rusuario').selectpicker(
                    {
                        liveSearchPlaceholder: 'Buscar persona...'
                    }
            );
        </script>
        <script src="admin/assets/js/crud/crud_notificacion.js<?php echo $v; ?>"></script>

    </body>
</html>