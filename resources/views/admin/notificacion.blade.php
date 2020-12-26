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
                                            <div class="col-12 col-md-4 bd pd-15">
                                                <h5>Registrar Notificacion</h5>
                                                <form id="RformData" name="RformData" method="POST" action="#">
                                                    <br>
                                                    <div>
                                                        <input type="text" class="form-control" placeholder="*Codigo" id="Rcodigo" name="Rcodigo">
                                                    </div>
                                                    <br>
                                                    <div>
                                                        <select class="selectpicker form-control" multiple data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true" id="Rusuario" name="Rusuario[]">
                                                        </select>
                                                    </div>                                                    
                                                    <br>
                                                    <div>
                                                        <input type="text" class="form-control" placeholder="*Asunto" id="Rasunto" name="Rasunto">
                                                    </div>
                                                    <br>
                                                    <div>
                                                        <textarea rows="7" type="text" class="form-control" placeholder="Escribir Mensaje" id="Rmensaje" name="Rmensaje"></textarea>
                                                    </div>                                                    
                                                    <br>                                                    
                                                    <div>
                                                        <select class="selectpicker form-control" id="Rtipo" name="Rtipo">
                                                            <option>Alerta</option>
                                                            <option>Aviso</option>
                                                            <option>Importante</option>
                                                            <option>Urgente</option>
                                                        </select>
                                                    </div> 
                                                    <br>
                                                    <div>
                                                        <center>
                                                            <button class="btn btn-success col-12 col-md-6" type="button" onclick="registrar();">Enviar Notificación</button>
                                                        </center>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-12 col-md-8 bd pd-15">
                                                <div class="tab-pane fade active show" id="latestProducts" role="tabpanel" aria-labelledby="latestProducts">
                                                    <div class="card-body"  id="productScrollBar">
                                                        <input id="buscar" type="text" class="form-control" placeholder="Buscar : Respetando la mayuscula y minuscula..." />
                                                        <br>
                                                        <div style="overflow-x:auto;height: calc(100vh - 200px) !important;" id="listado_table" name="listado_table" id="tabla" name="tabla">
                                                            <!-- PONER CODIGO AQUI --> 
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
                    $('.notificacion').hide();
                    //$('.card').css({
                    //    'float': 'left'
                    //});
                    var txt = $('#buscar').val();
                    $('.notificacion:contains("' + txt + '")').show();
                });
            } catch (error) {
                //console.error(error);
            }






//            $('#buscar').keyup(function () {
//                filter(this);
//            });
//            function filter(element) {
//                var value = $(element).val();
//                $("#listado_table > div").hide();
//                $("#listado_table > div:contains('" + value + "')").show();
//            }
        </script>
        <script src="admin/assets/js/crud/crud_notificacion.js<?php echo $v; ?>"></script>

    </body>
</html>