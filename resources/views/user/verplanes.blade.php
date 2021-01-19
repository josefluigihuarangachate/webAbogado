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
        @include('user/include/head_all')
        <style>
            .form-control-b{
                background: #fff none repeat scroll 0 0;
                border: 1px solid #ccc;
                border-radius: 7px;
                display: inline-block;
                font-family: inherit;
                font-size: 13px;
                padding: 10px 20px;
                width: 100%;
                background-color: #25303b;
                color: #ffffff;
                border-color: rgba(255, 255, 255, 0.05);
            }
        </style>
    </head>
    <body class="full-page">

        <!--Loading-->
        @include('user/include/loading')
        <!--End Loading-->

        <!--<div class="app-layout">-->
        <div class="app-layout theme-black">

            <!-- Navbar Top-->
            @include('user/include/navbar-top')
            <!--End Navbar Top-->

            <!-- Navbar Bottom -->
            @include('user/include/navbar-bottom')
            <!-- End Navbar Bottom -->

            <!-- Sidebar Right -->
            @include('user/include/sidebar')
            <!-- End Sidebar Right -->

            <!-- Footer Page -->
            @php($titulo = "Planes")
            @include('user/include/header-page')
            <!-- End Footer Page -->

            <section>
                <div class="gap no-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="main-title">Planes</h5>                              



                                <!-- LISTAR PLANES -->
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>




        <!-- Modal -->
        <div id="popupMap" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onclick="reload();">&times;</button>
                        <h4 class="modal-title">Mapa</h4>
                    </div>
                    <div class="modal-body">
                        <div id="map" style="width: 100%;height: calc(100vh - 170px);"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar Ubicación</button>
                    </div>
                </div>
            </div>
        </div>



        <div style="text-align: center;display: none;">
            @include('user/include/translate')
        </div>
        @include('user/include/script_all')

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="general/js/mapa.js<?php echo $v; ?>" type="text/javascript"></script>
        <script src="user/assets/js/crud/crud_profile.js<?php echo $v; ?>" type="text/javascript"></script>


        <!-- Bootstrap CSS -->

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</body>
</html>