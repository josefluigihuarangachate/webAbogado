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
            @php($titulo = "Area del Cliente")
            @include('user/include/header-page')
            <!-- End Footer Page -->

            <section>
                <div class="gap no-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="main-title">Area del Cliente</h5>

                                <form method="POST" class="white-form" action="#" id="formDataLR" name="formDataLR" enctype="multipart/form-data">
                                    <div>
                                        <label>Correo Electronico</label>
                                        <input type="email" placeholder="*Correo Electronico" id="Ecorreo" name="Ecorreo" value="<?php echo session('correo'); ?>">
                                    </div>
                                    <div>
                                        <label>Telefono / Celular</label>
                                        <input type="tel" placeholder="*Telefono/Celular" id="Ecelular" name="Ecelular" value="<?php echo session('celular'); ?>" maxlength="15">
                                    </div>
                                    <div>
                                        <label>Asunto</label>
                                        <input type="text" placeholder="*Asunto" id="Easunto" name="Easunto">
                                    </div>
                                    <div>
                                        <label>Mensaje</label>
                                        <textarea placeholder="*Deja tu mensaje..." id="Emensaje" name="Emensaje" rows="6"></textarea>
                                    </div>
                                    <div>
                                        <label>Adjuntar Archivo</label><br>
                                        <small style="color: red;">*Seleccione un archivo o una imagen</small><br>
                                        <br>
                                        <label class="btn btn-primary" style="width: 100%;" for="Earchivo">Adjuntar Archivo</label>
                                        <input class="form-control" type="file" id="Earchivo" name="Earchivo" style="display: none;">
                                    </div>  
                                    <div class="buttonz">
                                        <button class="main-btn" style="width: 100%;padding: 10px 20px;" type="button" data-ripple="" onclick="librodereclamo();">Enviar Mensaje</button><br><br>                                        
                                    </div>
                                </form>



                                <div style="text-align: center;display: none;">
                                    @include('user/include/translate')
                                </div>


                                <!-- load more -->
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