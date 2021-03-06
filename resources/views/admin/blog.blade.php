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
        <style>

            .modal {
                padding: 0 !important;
            }
            .modal .modal-dialog {
                width: 100%;
                max-width: none;
                height: 100%;
                margin: 0;
            }
            .modal .modal-content {
                height: 100%;
                border: 0;
                border-radius: 0;
            }
            .modal .modal-body {
                overflow-y: auto;
            }
        </style>
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
                                        Listado Blogs                                        
                                    </h2>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="latestProducts" role="tabpanel" aria-labelledby="latestProducts">
                                        <div class="card-body"  id="productScrollBar">
                                            <input id="buscar" type="text" class="form-control" placeholder="Buscar : Filtrar datos por..." />
                                            <br>
                                            <div style="overflow-x:auto;height: calc(100vh - 358px) !important;">
                                                <!-- PONER CODIGO AQUI --> 

                                                <!-- TABLA INICIA -->
                                                <table id="tabla" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre de Carpeta</th>
                                                            <th>Preview</th>
                                                            <th>Estado</th>
                                                            <th>Opciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="listado_table" name="listado_table">
                                                    </tbody>
                                                </table>
                                                <!-- TABLA FINALIZA -->
                                            </div>

                                        </div>
                                        <div class="card-footer tx-center mg-t-5">
                                            <a href="" class="tx-12">Listado De Datos Importantes</a>
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








        <!-- Modal -->
        <div class="modal fade" id="demoPopup" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <form method="POST" action="#" enctype="multipart/form-data" id="EformData" name="EformData">
                        <input type="hidden" hidden="hidden" id="Eid" name="Eid"> 
                        <div class="modal-header bg-warning">
                            <h5 class="modal-title" id="editar" style="color: white;">Demo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="/* height: calc(100vh - 200px);overflow: auto; */">
                            <!-- FORM  -->
                            <iframe id="popupframe" name="popupframe" style="border:1px solid black;width: 100%;height: calc(100vh - 150px);" src="">
                            </iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark waves-effect" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
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
        <script src="admin/assets/js/crud/crud_blog.js<?php echo $v; ?>"></script>
    </body>
</html>