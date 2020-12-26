<!DOCTYPE html>
<html>
    <head>
        @include('admin/include/head_login')
    </head>
    <body>

        <!--================================-->
        <!-- Page Content Start -->
        <!--================================-->
        <div class="ht-100v text-center">
            <div class="row no-gutters pd-0 mg-0">
                <div class="col-lg-4 bg-gray-100">
                    <div class="ht-100v d-flex align-items-center justify-content-center">
                        <div class="wd-300">
                            <h3 class="tx-dark mg-b-5 tx-left">Bienvenido</h3>
                            <p class="tx-11 mg-b-30 tx-left">Por favor inicie sesion para continuar.</p>

                            <form method="POST" action="#" id="formdata" name="formdata">
                                <div class="form-group tx-left">
                                    <label class="mg-b-5">Usuario</label>
                                    <input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario">
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-between mg-b-5">
                                        <label class="mg-b-0">Contraseña</label>
                                        <a href="aut-password.html" class="tx-13 mg-b-0">Olvide mi contraseña?</a>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Contraseña" id="clave" name="clave">
                                </div>
                                <button class="btn btn-lg btn-outline-primary rounded-pill btn-block waves-effect btnsend" type="button">Iniciar Sesión</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 bg-image hidden-sm">
                </div>
            </div>
        </div>
        <!--/ Page Content End -->

        @include('admin/include/script_login')
    </body>
</html>