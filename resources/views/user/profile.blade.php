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
            @php($titulo = "Mi Perfil")
            @include('user/include/header-page')
            <!-- End Footer Page -->

            <section>
                <div class="gap no-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="main-title">Configuración de datos</h5>

                                <form method="post" class="white-form" action="#" id="formData" name="formData">
                                    <div <?php
                                    if (session('idtipo') != 3) {
                                        echo "style='display:none;'";
                                    }
                                    ?>>
                                        <div>
                                            <label>Tipo de Documento</label>
                                            <select class="form-control-b" id="Etipo_documento" name="Etipo_documento">
                                                <option value="RUC" <?php
                                                if (strtolower(session('tipo_documento')) == 'ruc') {
                                                    echo "selected='selected'";
                                                }
                                                ?>>RUC</option>
                                                <option value="Cedula" <?php
                                                if (strtolower(session('tipo_documento')) == 'cedula') {
                                                    echo "selected='selected'";
                                                }
                                                ?>>CÉDULA</option>
                                            </select>
                                        </div>
                                        <small>&nbsp;</small>
                                        <div>
                                            <label>Numero de Documento</label>
                                            <input class="form-control-b" type="tel" placeholder="*Número de Documento" id="Eruc_cedula" name="Eruc_cedula" value="<?php echo trim(session('ruc_cedula')); ?>" maxlength="13">
                                        </div>
                                    </div>
                                    <div>
                                        <label>Nombre Completos</label>
                                        <input type="text" placeholder="*Nombre Completos" id="Enombre" name="Enombre" value="<?php echo ucwords(session('nombre')); ?>">
                                    </div>
                                    <div>
                                        <label>Dni / Pasaporte</label>
                                        <input type="text" placeholder="*Dni/Pasaporte" id="Edni" name="Edni" value="<?php echo session('dni'); ?>">
                                    </div>
                                    <div>
                                        <label>Correo Electronico</label>
                                        <input type="email" placeholder="*Correo Electronico" id="Ecorreo" name="Ecorreo" value="<?php echo session('correo'); ?>">
                                    </div>
                                    <div>
                                        <label>Telefono / Celular</label>
                                        <input type="tel" placeholder="*Telefono/Celular" id="Ecelular" name="Ecelular" value="<?php echo session('celular'); ?>">
                                    </div>
                                    <div>
                                        <label>Dirección</label>
                                        <input type="text" placeholder="*Dirección" id="Edireccion" name="Edireccion" value="<?php echo session('direccion'); ?>">
                                        <br>
                                        <br>                                        
                                        <input type="text" placeholder="*Latitud" value="<?php echo session('latitud'); ?>" id="txtlatitud" name="txtlatitud" disabled="disabled">
                                        <br>
                                        <br>  
                                        <input type="text" placeholder="*Longitud" value="<?php echo session('longitud'); ?>" id="txtlongitud" name="txtlongitud" disabled="disabled">
                                        <br>
                                        <br>  
                                        <button class="main-btn" style="width: 100%;" type="button" data-toggle="modal" data-target="#popupMap" onclick="cargarMapaUpdate();">Ubicación Exacta</button>
                                    </div>
                                    <div>
                                        <label>Cuenta de Usuario</label>
                                        <input type="text" placeholder="*Cuenta de Usuario" id="Eusuario" name="Eusuario" value="<?php echo session('usuario'); ?>">
                                    </div>
                                    <div>
                                        <label>Contraseña</label>
                                        <input type="password" placeholder="*Crear Nueva Contraseña" id="Eclave" name="Eclave">
                                    </div>                                    
                                    <div class="buttonz">
                                        <button class="main-btn" style="width: 100%;padding: 10px 20px;" type="button" data-ripple="" onclick="actualizarPerfil();">Actualizar Datos</button><br><br>                                        
                                    </div>
                                </form>



                                <div style="text-align: center;">
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