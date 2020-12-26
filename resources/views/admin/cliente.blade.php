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
            .inputUpload{
                width: 0.1px;
                height: 0.1px;
                opacity: 0;
                overflow: hidden;
                position: absolute;
                z-index: -1;
            }

            .labelUpload{
                font-size: 10px;
                font-weight: 600;
                color: #fff;
                background-color: #106BA0;
                display: inline-block;
                transition: all .5s;
                cursor: pointer;
                padding: 5px 8px !important;
                text-transform: uppercase;
                width: fit-content;
                text-align: center;
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
                                        Listado de Clientes
                                        <br>
                                        <small>* Los Clientes son usuarios que contrataran el servicio de los abogados registrados.</small>
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
                                                            <th>Foto</th>                                                            
                                                            <th>Nombre</th>
                                                            <th>Dni</th>
                                                            <th>Correo</th>
                                                            <th>Celular</th>
                                                            <th>Direccion</th>
                                                            <th>Mapa</th>
                                                            <th>Usuario</th>
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
        <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <form method="POST" action="#" enctype="multipart/form-data" id="EformData" name="EformData">
                        <input type="hidden" hidden="hidden" id="Eid" name="Eid"> 
                        <div class="modal-header bg-warning">
                            <h5 class="modal-title" id="editar" style="color: white;">Editar Datos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal" name="closeModal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="height: calc(100vh - 200px);overflow: auto;">
                            <!-- FORM  -->
                            <div class="form-group">
                                <label for="Enombre">Nombre</label>
                                <input type="text" class="form-control" id="Enombre" name="Enombre" placeholder="*Nombre">
                            </div>
                            <div class="form-group">
                                <label for="Edni">Dni</label>
                                <input type="text" class="form-control" id="Edni" name="Edni" placeholder="*Dni">
                            </div>
                            <div class="form-group">
                                <label for="Ecorreo">Correo</label>
                                <input type="text" class="form-control" id="Ecorreo" name="Ecorreo" placeholder="*Correo Electronico">
                            </div>
                            <div class="form-group">
                                <label for="Ecelular">Celular</label>
                                <input type="tel" class="form-control" id="Ecelular" name="Ecelular" placeholder="*Celular">
                            </div>
                            <div class="form-group">
                                <label for="Edireccion">Direccion</label>
                                <input type="tel" class="form-control" id="Edireccion" name="Edireccion" placeholder="*Direccion">
                            </div>
                            <div class="form-group">
                                <label for="Eestado">Latitud y Longitud</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="txtlatitud" name="txtlatitud" placeholder="*Latitud" disabled="disabled">
                                    <input type="text" class="form-control" id="txtlongitud" name="txtlongitud" placeholder="*Longitud" disabled="disabled">
                                </div>
                                <button type="button" class="btn btn-info btn-sm waves-effect" style="width: 100%;" data-toggle="modal" data-target="#mapaLatLon" onclick="cargarMapaUpdate();">Ubicación Exacta</button>
                            </div>
                            <div class="form-group">
                                <label for="Eusuario">Usuario</label>
                                <input type="tel" class="form-control" id="Eusuario" name="Eusuario" placeholder="*Usuario">
                            </div>
                            <div class="form-group">
                                <label for="Etipo">Tipo de Usuario</label>
                                <select class="selectpicker form-control" data-live-search="true" id="Etipo" name="Etipo">
                                </select>
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
        <script src="admin/assets/js/crud/crud_cliente.js<?php echo $v; ?>"></script>

        <script>
                                    function uploadChange(id) {
                                        var fileInput = document.getElementById('uploadImage' + id);
                                        var filePath = fileInput.value;

                                        // Allowing file type 
                                        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

                                        if (!allowedExtensions.exec(filePath)) {
                                            fileInput.value = '';
                                            document.getElementById("labelUpload" + id).innerHTML = '<i class="fa fa-picture-o"></i>&nbsp;Cargar...';
                                            Swal.fire(
                                                    'Mensaje Importante',
                                                    'Tipo de imagen  no permitida',
                                                    'warning' // question,warning,error
                                                    );
                                            listar();
                                            //document.getElementById('btnuploadimage').disabled = true;
                                        } else {
                                            var filename = jQuery("#uploadImage" + id).val().split('\\').pop();
                                            document.getElementById("labelUpload" + id).innerHTML = "Cargado!";
                                            document.getElementById('btnupload' + id).disabled = false;
                                        }
                                    }

                                    function uploadImageAdministrador(id) {
                                        // https://stackoverflow.com/questions/21044798/how-to-use-formdata-for-ajax-file-upload
                                        var formData = new FormData($('#formData' + id)[0]);
                                        formData.append('cmd', 'web');
                                        formData.append('idadmin', id);
                                        formData.append('imageFile', $("#uploadImage" + id)[0].files[0]); // PONER UN INPUT FILE EN UN APPEND
                                        formData.append('imgAntigua', $("#oldImage" + id).val());
                                        $.ajax({
                                            url: ruta() + 'uploadImg' + globalName,
                                            type: 'POST',
                                            data: formData,
                                            contentType: false,
                                            processData: false,
                                            dataType: "json",
                                            success: function (json) {
                                                if (json['status'] == 'Ok') {
                                                    Swal.fire(
                                                            'Aviso Importante',
                                                            json['msg'],
                                                            'success'
                                                            );

                                                    listar();
                                                } else {
                                                    Swal.fire(
                                                            'Aviso Importante',
                                                            json['msg'],
                                                            'error'
                                                            );
                                                }
                                            }
                                        });
                                    }
        </script>
        <script src="general/js/mapa.js<?php echo $v; ?>" type="text/javascript"></script>
    </body>
</html>