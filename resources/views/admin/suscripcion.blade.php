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
                                        Suscripciones
                                        <br>
                                        <small>*Suscripcion: Sirve para ver los clientes suscritos a nuestros servicios.</small>
                                    </h2>

                                </div>
                                <div class="tab-content">
                                    <div class="custom-fieldset mg-b-30">
                                        <div class="row">

                                            <div class="col-12 col-md-12 bd pd-15">
                                                <div class="tab-pane fade active show" id="latestProducts" role="tabpanel" aria-labelledby="latestProducts">
                                                    <div class="card-body"  id="productScrollBar">
                                                        <input id="buscar" type="text" class="form-control" placeholder="Buscar : Respetando la mayuscula y minuscula..." />
                                                        <br>
                                                        <div class="row clearfix" style="overflow-x:auto;height: calc(100vh - 200px) !important;" id="listado_suscripcion" name="listado_suscripcion">
                                                            
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

            try {
                $('#buscar').keyup(function () {
                    $('.librodereclamo').hide();
                    var txt = $('#buscar').val();
                    $('.librodereclamo:contains("' + txt + '")').show();
                });
            } catch (error) {
                //console.error(error);
            }
        </script>
        <script src="admin/assets/js/crud/crud_suscripcion.js<?php echo $v; ?>"></script>

    </body>
</html>