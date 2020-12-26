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
                        <div class="col-12">
                            <div class="card overflow-hidden mg-b-20">
                                <div class="profile-cover-photo d-flex justify-content-center align-items-center" style="background-image: url('general/img/background_profile.jpg');">
                                    <div style="text-align: center;">
                                        <h5>Bienvenido a tu perfil</h5>
                                        <p><?php echo ucwords(session('tipo_usuario')); ?></p>
                                    </div>
                                    <!--<span class="cover-main-pic-change"><i class="fa fa-camera mr-2"></i>Change Cover Photo</span>-->
                                </div>
                                <div class="card-body profile-summary">
                                    <div class="row d-flex align-items-end">
                                        <div class="col-lg-4 d-block d-lg-flex align-items-end ">
                                            <div class="profile-avatar">
                                                <?php
                                                $src = session('foto');
                                                if (empty(session('foto'))) {
                                                    $src = 'empty/empty-photo.jpg';
                                                }
                                                ?>
                                                <img src="general/fotos/<?php echo $src; ?>" class="img-thumbnail img-fluid rounded-circle" alt="" style="width: 145px;height: 145px;border-radius: 50px;">
                                                <span class="profile-main-pic-change hidden-xs hidden-sm"><i class="fa fa-camera"></i></span>
                                            </div>
                                            <div class="mg-t-20 mg-lg-t-0">
                                                <h5 class="tx-13 tx-dark"><?php echo ucwords(session('nombre_corto')); ?></h5>
                                                <p class="tx-11 mb-0"><?php echo session('usuario'); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="row">
                                                <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                                    <span class="tx-16 tx-dark tx-rubik tx-medium">
                                                        <i class="fa fa-phone"></i> Celular</span>
                                                    <span class="d-block tx-13" data-toggle="tooltip" title="" data-trigger="hover" data-original-title="<?php echo session('celular'); ?>" style="overflow:hidden;white-space:nowrap;text-overflow: ellipsis;" title="<?php echo session('celular'); ?>"><?php echo session('celular'); ?></span>
                                                </div>
                                                <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                                    <span class="tx-16 tx-dark tx-rubik tx-medium">
                                                        <i class="fa fa-map-marker"></i> Dirección</span>
                                                    <span class="d-block tx-13" data-toggle="tooltip" title="" data-trigger="hover" data-original-title="<?php echo session('direccion'); ?>"  style="overflow:hidden;white-space:nowrap;text-overflow: ellipsis;" title="<?php echo session('direccion'); ?>"><?php echo session('direccion'); ?></span>
                                                </div>
                                                <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                                    <span class="tx-16 tx-dark tx-rubik tx-medium">
                                                        <i class="fa fa-mail-reply-all"></i> Correo</span>
                                                    <span class="d-block tx-13" data-toggle="tooltip" title="" data-trigger="hover" data-original-title="<?php echo session('correo'); ?>"  style="overflow:hidden;white-space:nowrap;text-overflow: ellipsis;" title="<?php echo session('correo'); ?>"><?php echo session('correo'); ?></span>
                                                </div>
                                                <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                                    <span class="d-block tx-13">
                                                        <form id="IformData" name="IformData" method="POST" action="#" enctype="multipart/form-data">
                                                            <label for="imageFile" class="btn btn-info btn-xs" style="margin-top: 6px;">
                                                                <i class="fa fa-picture-o"></i>&nbsp; Cambiar Foto
                                                            </label>
                                                            <button type="button" class="btn btn-info btn-xs" onclick="cambiarImagen();">Guardar</button>
                                                            <input type="file" id="imageFile" name="imageFile" style="display: none;">
                                                        </form>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-xs">
                        <div class="col-xl-3 col-md-6 order-2 order-xl-1">
                            <div class="card mg-b-20">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h6 class="tx-13 mb-0 tx-dark">Información Personal</h6>
                                    <div class="card-header-btn">
                                        <div class="dropdown">
                                            <a href="" class="" data-toggle="dropdown"><i data-feather="more-horizontal" class="wd-16  ht-16 "></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="" class="dropdown-item"><i data-feather="info" class="wd-16 ht-16 mr-2"></i>View Details</a>
                                                <a href="" class="dropdown-item"><i data-feather="share" class="wd-16 ht-16 mr-2"></i>Share</a>
                                                <a href="" class="dropdown-item"><i data-feather="download" class="wd-16 ht-16 mr-2"></i>Download</a>
                                                <a href="" class="dropdown-item"><i data-feather="copy" class="wd-16 ht-16 mr-2"></i>Copy to</a>
                                                <a href="" class="dropdown-item"><i data-feather="folder" class="wd-16 ht-16 mr-2"></i>Move to</a>
                                                <a href="" class="dropdown-item"><i data-feather="edit" class="wd-16 ht-16 mr-2"></i>Rename</a>
                                                <a href="" class="dropdown-item"><i data-feather="trash" class="wd-16 ht-16 mr-2"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>Hola, <?php echo session('nombre_corto'); ?>. Este es un resumen de tu datos personales. si te equivocaste al registrar tus datos, podras editarlo o si hay campos vacios, trata para completarlos.</p>
                                    <ul class="list-unstyled profile-info-list mb-0">
                                        <li class="pd-y-5"><i data-feather="user" class="wd-16 ht-16 mr-2"></i><span class="tx-dark tx-medium mr-2">Nombre Completo: </span><?php echo session('nombre'); ?></li>
                                        <li class="pd-y-5"><i data-feather="mail" class="wd-16 ht-16 mr-2"></i><span class="tx-dark tx-medium mr-2">Correo: </span><?php echo session('correo'); ?></li>
                                        <li class="pd-y-5"><i data-feather="phone" class="wd-16 ht-16 mr-2"></i><span class="tx-dark tx-medium mr-2">Celular/Telefono: </span><?php echo session('celular'); ?></li>
                                        <li class="pd-y-5"><i data-feather="map-pin" class="wd-16 ht-16 mr-2"></i><span class="tx-dark tx-medium mr-2">Dirección: </span><?php echo session('direccion'); ?></li>                                       
                                    </ul>
                                </div>
                            </div>                   
                        </div>
                        <div class="col-xl-9 order-1 order-xl-2">

                            <div class="card mg-b-20">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm avatar-online mr-2">
                                            <img src="general/fotos/<?php echo $src; ?>" class="img-fluid" alt="" style="width: 30px; height: 30px;"/>
                                            <i></i>
                                        </div>
                                        <div class="">
                                            <h2 class="tx-13 mb-0"><a href="">Configuración de datos</h2>
                                            <p class="tx-9 mb-0">Conectado</p>
                                        </div>
                                    </div>
                                    <div class="card-header-btn">
                                        <div class="dropdown">
                                            <a href="" class="" data-toggle="dropdown"><i data-feather="more-horizontal" class="wd-16  ht-16 "></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="" class="dropdown-item"><i class="fa fa-refresh"></i>&nbsp; Recargar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="col-12">                                            
                                        <div>
                                            <form id="RformData" name="RformData" method="POST" action="#">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input name="Enombre" id="Enombre" type="text" required class="form-control col-md-12 col-lg-6" placeholder="*Nombre Completos" value="<?php echo session('nombre'); ?>">
                                                        <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                        <input name="Edni" id="Edni" type="text" required class="form-control col-md-12 col-lg-6" placeholder="*Dni" value="<?php echo session('dni'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input name="Ecorreo" id="Ecorreo" type="text" required class="form-control col-md-12 col-lg-6" placeholder="*Correo Electrónico" value="<?php echo session('correo'); ?>">
                                                        <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                        <input name="Ecelular" id="Ecelular" type="text" required class="form-control col-md-12 col-lg-6" placeholder="*Celular/Telefono" value="<?php echo session('celular'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input name="Edireccion" id="Edireccion" type="text" required class="form-control col-md-12 col-lg-6" placeholder="*Direccion" value="<?php echo session('direccion'); ?>">
                                                        <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                        <input type="hidden" hidden="hidden" id="txtlatitud" name="txtlatitud" value="<?php echo session('latitud'); ?>">
                                                        <input type="hidden" hidden="hidden" id="txtlongitud" name="txtlongitud" value="<?php echo session('longitud'); ?>">
                                                        <button class="btn btn-info col-md-12 col-lg-6" data-toggle="modal" data-target="#mapa" type="button">Ubicación Exacta</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input name="Eusuario" id="Eusuario" type="text" required class="form-control col-md-12 col-lg-6" placeholder="*Usuario" value="<?php echo session('usuario'); ?>">
                                                        <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                        <input name="Eclave" id="Eclave" type="text" required class="form-control col-md-12 col-lg-6" placeholder="*Cambiar Contraseña" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label>Cambiar de Idioma : &nbsp;&nbsp;</label>
                                                        @include('admin/include/translate')
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <button class="btn btn-success col-md-12" type="button" onclick="registrar();">Guardar Datos</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <br>
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
        <div class="modal fade" id="mapa" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" style="color: white;">Ubicación Exacta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" name="closePopup" id="closePopup">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="map" style="width: 100%; height: 350px; position: relative; overflow: hidden;"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark waves-effect" data-dismiss="modal">Aceptar Ubicación</button>
                    </div>
                </div>
            </div>
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function cambiarImagen() {
                Swal.fire({
                    title: 'Desea cambiar foto de perfil?',
                    text: "Al cargar la imagen, se guardara automaticamente!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si deseo cambiar'
                }).then((result) => {
                    if (result.value) {
                        // CAMBIAR FOTO DE PERFIL
                        var formData = new FormData($('#IformData')[0]);
                        formData.append('cmd', 'web');
                        $.ajax({
                            url: ruta() + 'fotoProfile',
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
                                    setTimeout(function () {
                                        location.reload();
                                    }, 200);
                                } else {
                                    Swal.fire(
                                            'Aviso Importante',
                                            json['msg'],
                                            'error'
                                            );
                                }
                            }
                        });
                        // FIN CAMBIAR FOTO DE PERFIL

                    }
                });
            }

            function registrar() {
                var formData = new FormData($('#RformData')[0]);
                var latitudMap = parseFloat(document.getElementById('txtlatitud').value);
                var longitudMap = parseFloat(document.getElementById('txtlongitud').value);

                formData.append('cmd', 'web');
                formData.append('txtlatitud', latitudMap);
                formData.append('txtlongitud', longitudMap);

                $.ajax({
                    url: ruta() + 'editarProfile',
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
                            setTimeout(function () {
                                location.reload();
                            }, 200);
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
        <script>
            // US Format Phone Number
            var cleaveB = new Cleave('#Ecelular', {
                phone: true,
                phoneRegionCode: 'US'
            });
        </script>
        <script src="general/js/mapa.js<?php echo $v; ?>" type="text/javascript"></script>
    </body>
</html>