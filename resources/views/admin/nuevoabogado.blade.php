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
                                        Registrar Abogado
                                        <br>
                                        <small>*Abogado: son los encargados de brindar servicios de varios tipos.</small>
                                    </h2>

                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="latestProducts" role="tabpanel" aria-labelledby="latestProducts">

                                        <div class="card-body"  id="productScrollBar">
                                            <form method="POST" action="#" enctype="multipart/form-data" id="RformData" name="RformData">
                                                @csrf
                                                <div class="input-group" style="justify-content: center;">
                                                    <div class="row col-md-5">
                                                        <label for="Rnombre">Nombre</label>
                                                        <input type="text" class="form-control" id="Rnombre" name="Rnombre" placeholder="*Nombre">
                                                    </div>
                                                    <div class="row col-md-2">
                                                    </div>
                                                    <div class="row col-md-5">
                                                        <label for="Rdni">Dni</label>
                                                        <input type="text" class="form-control" id="Rdni" name="Rdni" placeholder="*DNI">
                                                    </div>

                                                </div>                                           
                                                <br>
                                                <div class="input-group" style="justify-content: center;">
                                                    <div class="row col-md-5">
                                                        <label for="Rcorreo">Correo Electronico</label>
                                                        <input type="text" class="form-control" id="Rcorreo" name="Rcorreo" placeholder="*Correo Electronico">
                                                    </div>
                                                    <div class="row col-md-2">
                                                    </div>
                                                    <div class="row col-md-5">
                                                        <label for="Rcelular">Celular</label>
                                                        <input type="text" class="form-control" id="Rcelular" name="Rcelular" placeholder="*Celular">
                                                    </div>

                                                </div>                                           
                                                <br>
                                                <div class="input-group" style="justify-content: center;">
                                                    <div class="row col-md-5">
                                                        <label for="Rdireccion">Direccion</label>
                                                        <input type="text" class="form-control" id="Rdireccion" name="Rdireccion" placeholder="*Direccion">
                                                    </div>
                                                    <div class="row col-md-2">
                                                    </div>
                                                    <div class="row col-md-5">
                                                        <label>Latitud y Longitud</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="txtlatitud" name="txtlatitud" placeholder="*Latitud" disabled="disabled" style="cursor: not-allowed;">
                                                            <input type="text" class="form-control" id="txtlongitud" name="txtlongitud" placeholder="*Longitud" disabled="disabled" style="cursor: not-allowed;">
                                                            <button type="button" class="btn btn-info btn-sm waves-effect" data-toggle="modal" data-target="#mapaLatLon" onclick="cargarMapaUpdate();">Ubicación Exacta</button>

                                                        </div>
                                                    </div>

                                                </div>                                           
                                                <br>

                                                <div class="input-group" style="justify-content: center;">
                                                    <div class="row col-md-5">
                                                        <label for="Rusuario">Usuario</label>
                                                        <input type="text" class="form-control" id="Rusuario" name="Rusuario" placeholder="*Usuario">
                                                    </div>
                                                    <div class="row col-md-2">
                                                    </div>
                                                    <div class="row col-md-5">
                                                        <label for="Rclave">Contraseña</label>                                                
                                                        <input type="password" class="form-control" id="Rclave" name="Rclave" placeholder="*Contraseña">
                                                    </div>
                                                </div>                                           
                                                <br>
                                                <div class="input-group" style="justify-content: center;">
                                                    <div class="row col-md-5">
                                                        <label for="Restado">Estado</label>                                                
                                                        <select class="form-control" id="Restado" name="Restado">
                                                            <option value="activo">Activo</option>
                                                            <option value="inactivo">Inactivo</option>
                                                        </select>
                                                    </div>
                                                    <div class="row col-md-2">
                                                    </div>
                                                    <div class="row col-md-5">
                                                        <!-- PONER INPUT -->
                                                    </div>
                                                </div>                                           
                                                <br>
                                                <div class="input-group" style="justify-content: center;">
                                                    <div class="row col-md-5">
                                                    </div>
                                                    <div class="row col-md-2">
                                                        <button type="button" class="btn btn-success RsaveData" onclick="registrar()">Regitrar Datos</button>
                                                    </div>
                                                    <div class="row col-md-5">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-footer tx-center mg-t-5">
                                            <a href="" class="tx-12">Registro De Datos</a>
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








        <!-- Modal Mapa-->
        <div class="modal fade" id="mapaLatLon" tabindex="-1" role="dialog" aria-labelledby="ModalComponents" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalComponents">Ubicación Exacta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="map" style="width: 100%;height: 350px;"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>



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
        <script src="admin/assets/js/crud/crud_abogado.js<?php echo $v; ?>"></script>
        <script src="general/js/mapa.js<?php echo $v; ?>" type="text/javascript"></script>
    </body>
</html>