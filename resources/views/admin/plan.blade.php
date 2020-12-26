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
                                        Listado Planes
                                        <br>
                                        <small>*Planes: Sirve para la suscripcion y el pago por el servicio. </small>
                                    </h2>

                                </div>
                                <div class="tab-content">
                                    <div class="custom-fieldset mg-b-30">
                                        <div class="row">
                                            <div class="col-12 col-md-4 bd pd-15">
                                                <h5>Registrar Plan</h5>
                                                <form id="RformData" name="RformData" method="POST" action="#">
                                                    <br>
                                                    <div>
                                                        <input type="text" class="form-control" placeholder="*Nombre" id="Rnombre" name="Rnombre">
                                                    </div>
                                                    <br>
                                                    <div>
                                                        <textarea rows="3" type="text" class="form-control" placeholder="Descripción" id="Rdescripcion" name="Rdescripcion"></textarea>
                                                    </div>
                                                    <br>
                                                    <div>
                                                        <div class="form-group two-fields">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="*Precio : 00.00" id="Rprecio" name="Rprecio">
                                                                <input type="text" class="form-control" placeholder="*Hora : 00:00:00" id="Rhora" name="Rhora">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div>
                                                        <div class="form-group two-fields">
                                                            <div class="input-group">
                                                                <select type="text" class="form-control" id="Rplan" name="Rplan">
                                                                    <option value="Gratis">Gratis</option>
                                                                    <option value="Mensual">Mensual</option>
                                                                    <option value="Anual">Anual</option>
                                                                </select>

                                                                <select type="text" class="form-control" id="Restado" name="Restado">
                                                                    <option>Activo</option>
                                                                    <option>Inactivo</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div>
                                                        <center>
                                                            <button class="btn btn-success col-12 col-md-6" type="button" onclick="registrar();">Registrar Datos</button>
                                                        </center>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-12 col-md-8 bd pd-15">
                                                <div class="tab-pane fade active show" id="latestProducts" role="tabpanel" aria-labelledby="latestProducts">
                                                    <div class="card-body"  id="productScrollBar">
                                                        <input id="buscar" type="text" class="form-control" placeholder="Buscar : Filtrar datos por..." />
                                                        <br>
                                                        <div style="overflow-x:auto;height: calc(100vh - 358px) !important;">
                                                            <!-- PONER CODIGO AQUI --> 

                                                            <!-- TABLA INICIA -->
                                                            <table id="tabla" class="table table-striped" style="zoom: 90%;">

                                                                <thead>
                                                                    <tr>
                                                                        <th>Nombre</th>
                                                                        <th>Descripción</th>
                                                                        <th>Precio</th>
                                                                        <th>Plan</th>
                                                                        <th>Horas</th>
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








        <!--   Modal   -->
        <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <form method="POST" action="#" enctype="multipart/form-data" id="EformData" name="EformData">
                        <input type="hidden" hidden="hidden" id="Eid" name="Eid"> 
                        <div class="modal-header bg-warning">
                            <h5 class="modal-title" id="editar" style="color: white;">Editar Datos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" name="closePopup" id="closePopup">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="height: calc(100vh - 200px);overflow: auto;">
                            <div class="form-group">
                                <label for="Enombre">Nombre</label>
                                <input type="text" class="form-control" id="Enombre" name="Enombre" placeholder="*Nombre">
                            </div>
                            <div class="form-group">
                                <label for="Edescripcion">Descripción</label>
                                <textarea type="text" class="form-control" id="Edescripcion" name="Edescripcion" placeholder="*Descripcion" rows="6"></textarea>
                            </div>
                            <!--                            <div class="form-group">
                                                            <label for="Eprecio">Precio</label>
                                                            <input type="text" class="form-control" id="Eprecio" name="Eprecio" placeholder="*Precio : 00.00">
                                                        </div>-->
                            <div class="form-group">
                                <label for="Eprecio">Hora</label>
                                <input type="text" class="form-control" id="Ehora" name="Ehora" placeholder="*Hora : 00:00:00">
                            </div>
                            <div class="form-group">
                                <label for="Eestado">Estado</label>
                                <select class="form-control" id="Eestado" name="Eestado">
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark waves-effect" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-warning waves-effect EsaveData">Guardar Datos</button>
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

        <script>
            var cleaveE = new Cleave('#Ehora', {
                time: true,
                timePattern: ['h', 'm', 's']
            });
        </script>
        <script src="admin/assets/js/crud/crud_plan.js<?php echo $v; ?>"></script>

    </body>
</html>