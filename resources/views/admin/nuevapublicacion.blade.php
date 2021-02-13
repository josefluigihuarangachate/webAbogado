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
            ol {
                list-style:none;
            }

            .btn-group{
                width: 180px !important;
            }
            .btn-group.special {
                display: flex;
            }

            .special .btn {
                flex: 1
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
                                    <h2 class="tx-13 tx-medium mb-0 tx-dark" style="width: 100% !important;">
                                        Registrar Nuevo Blog
                                        <div class="dropdown float-right">
                                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Instrucciones
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#"><small>1.- El <strong>Nombre de Carpeta</strong> no debe tener un nombre existente, de lo contrario no se registrara el blog</small></a>
                                                <a class="dropdown-item" href="#"><small>2.- La primera pagina debe tener como <strong>Nombre de Pagina : </strong> index, esto hara referencia a cual pagina debe ejecutarse al iniciar el blog</small></a>
                                                <a class="dropdown-item" href="#"><small>3.- Los <strong>Nombre de Pagina</strong> no deben tener el mismo nombre. procura poner nombre sin espacio y  que no se repitan</small></a>
                                                <a class="dropdown-item" href="#"><small>4.- El <strong>Nombre de Pagina</strong> no debe tener extensiones como .html, .php, .exe, etc</small></a>
                                                <a class="dropdown-item" href="#"><small>5.- Los <strong>Links</strong> es segun las sub paginas que creas ya que se hacen referencia a ellas</small></a>
                                                <a class="dropdown-item" href="#"><small>6.- No usar <strong>Tildes, Comas, Etc.</strong> en Nombre de Carpeta, Links, Nombre de Pagina, Titulo o Sub Titulo.</small></a>
                                                <a class="dropdown-item" href="#"><small>7.- Si no va a linkear una pagina poner asi, Ejemplo : para linkear <strong>link27</strong> Para no linkear : <strong>#link27</strong>, Se debe agregar un hashtag al inicio</small></a>
                                            </div>
                                        </div>
                                        <br>
                                    </h2>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="latestProducts" role="tabpanel" aria-labelledby="latestProducts">
                                        <div class="card-body"  id="productScrollBar" style="background-color: #333;">

                                            <div class="row" style="overflow-x:scroll;">
                                                <div class="col-md-12" id="col4" name="col4" style="height: calc(100vh - 320px);overflow-x:scroll;">
                                                    <form action="{{ url('/registrarBlog') }}" method="post" enctype="multipart/form-data">
                                                        @csrf

                                                        @if (@$status == 'Ok')
                                                        <div class="alert alert-success" role="alert">
                                                            <strong>Exito!</strong> Pagina registrada.
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        @elseif (@$status == 'Error')
                                                        <div class="alert alert-danger" role="alert">
                                                            <strong>Error!</strong> Pagina no registrada.
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        @endif

                                                        {{ $status = '' }}
                                                        <ol>
                                                            <li class="special" role="group">
                                                                <input type="hidden" hidden="hidden" id="max" name="max" value="0">
                                                                <input type="text" id="folder" name="folder" autocomplete="off" class="btn btn-default" placeholder="Nombre de Carpeta" required="required">
                                                                <button type="button" class="add btn btn-success" id="uniqueAdd" name="uniqueAdd">Agregar Pagina +</button>
                                                                <a href="" class="add btn btn-danger">Borrar Todo</a>
                                                                <button type="submit" id="registrarBlog" name="registrarBlog" class="btn btn-info" style="float: right;">Guardar Registro</button>
                                                                <br>
                                                                <br>
                                                            </li>
                                                        </ol>
                                                    </form>
                                                </div>                                                
                                            </div>

                                        </div>
                                        <div class="card-footer tx-center mg-t-5">
                                            <a href="#" class="tx-12">Registro De Datos</a>
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

        <script src="admin/assets/js/crud/crud_blog.js<?php echo $v; ?>"></script>
    </body>
</html>