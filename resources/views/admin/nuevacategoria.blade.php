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
                                        Registrar Categoria
                                        <br>
                                        <small>*Categoria: No se podran eliminar las categorias que estan relacionadas a una sub sategoria.</small>
                                    </h2>

                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="latestProducts" role="tabpanel" aria-labelledby="latestProducts">

                                        <div class="card-body"  id="productScrollBar">
                                            <form method="POST" action="#" enctype="multipart/form-data" id="RformData" name="RformData">
                                                @csrf
                                                <div class="input-group" style="justify-content: center;">
                                                    <div class="row col-md-5">
                                                        <label for="Rcodigo">Codigo</label>
                                                        <input type="text" class="form-control" id="Rcodigo" name="Rcodigo" placeholder="*Codigo">
                                                    </div>
                                                    <div class="row col-md-2">
                                                    </div>
                                                    <div class="row col-md-5">
                                                        <label for="Rnombre">Nombre</label>
                                                        <input type="text" class="form-control" id="Rnombre" name="Rnombre" placeholder="*Nombre">
                                                    </div>

                                                </div>                                           
                                                <br>
                                                <div class="input-group" style="justify-content: center;">
                                                    <div class="row col-md-5">
                                                        <label for="Rdescripcion">Descripcion</label>
                                                        <textarea class="form-control" id="Rdescripcion" name="Rdescripcion" placeholder="*Nombre" rows="2" style="resize: none;"></textarea>
                                                    </div>
                                                    <div class="row col-md-2">
                                                    </div>
                                                    <div class="row col-md-5">
                                                        <label for="Restado">Estado</label>                                                
                                                        <select class="form-control" id="Restado" name="Restado">
                                                            <option value="activo">Activo</option>
                                                            <option value="inactivo">Inactivo</option>
                                                        </select>
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


        <!--================================-->
        <!-- Scroll To Top Start-->
        <!--================================-->	
        <a href="" data-click="scroll-top" class="btn-scroll-top fade waves-effect"><i data-feather="arrow-up" class="wd-16 ht-16"></i></a>
        <!--/ Scroll To Top End -->
        <!-- BEGIN: Theme Customizer-->

        <!-- End: Theme Customizer-->
        <!--================================-->

        @include('admin/include/script_all')
        <script src="admin/assets/js/crud/crud_categoria.js<?php echo $v; ?>"></script>
    </body>
</html>