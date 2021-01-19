<!DOCTYPE html>
<html>
    <head>
        @include('user/include/head_login')
    </head>
    <body class="full-page">

        <!--Loading-->
        @include('user/include/loading')
        <!--End Loading-->

        <div class="app-layout">
            <section>
                <div class="gap no-bottom blackish low-opacity 60-vh">
                    <div class="bg-image" style="background-image: url(user/assets/images/img/login-bg.jpg)"></div>
                    <!--<div class="content-bg-wrap" style="background: url(images/resources/login-bg.jpg)"></div> for animated bg-->
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="login-area">
                                    <div class="logo"><img src="user/assets/images/img/icono.png" alt="On Law" width="55"></div>
                                    <div class="tabBox">
                                        <ul class="tabs">
                                            <li><a href="#signin"><i class="lni lni-key"></i>&nbsp; Acceso</a></li>
                                            <li><a href="#signup"><i class="lni lni-pencil"></i>&nbsp; Registrate</a></li>
                                        </ul>
                                        <div class="tabContainer" style="margin-top: 10px;height: calc(100vh - 295px);">
                                            <div id="signin" class="tabContent" style="margin-top: 40px;">
                                                <h5>Proceda con su inicio de sesión</h5>
                                                <h4><i class="lni lni-key"></i><label>&nbsp;&nbsp;</label> Login </h4>

                                                <div class="scroll-form-login" style="overflow: auto;height: 190px;">
                                                    <form method="POST" class="form2" id="formdata" name="formdata">
                                                        <div>
                                                            <input type="text" placeholder="Cuenta de usuario" value="cliente" id="logUser" name="logUser">
                                                            <label><i class="lni lni-user"></i></label>
                                                        </div>
                                                        <br>
                                                        <br>
                                                        <div>
                                                            <input type="password" placeholder="Contraseña" value="cliente" id="logClave" name="logClave">
                                                            <label><i class="lni lni-lock"></i></label>
                                                        </div>
                                                        <br>
                                                        <br>
                                                        <button class="main-btn color-background btnsend" type="button">Iniciar Sesión</button>
                                                        <a href="#" title="">Olvide mi contraseña?</a>
                                                    </form>
                                                </div>
                                            </div>
                                            <div id="signup" class="tabContent">
                                                <h5>Proceda con su registro</h5>
                                                <h4><i class="lni lni-lock"></i><label>&nbsp;&nbsp;</label> Registrate</h4>

                                                <div class="scroll-form-login">
                                                    <form method="POST" class="form2" id="formdataReg" name="formdataReg">
                                                        <div>
                                                            <input type="text" placeholder="Nombre Completos" id="regName" name="regName">
                                                            <label><i class="lni lni-postcard"></i></label>
                                                        </div>
                                                        <div>
                                                            <input type="email" placeholder="Correo Electronico" id="regEmail" name="regEmail">
                                                            <label><i class="lni lni-google"></i></label>
                                                        </div>
                                                        <div>
                                                            <input type="text" placeholder="Crear nuevo usuario" value="" id="regUser" name="regUser">
                                                            <label><i class="lni lni-user"></i></label>
                                                        </div>
                                                        <div>
                                                            <input type="password" placeholder="Contraseña" value="" id="regClave" name="regClave">
                                                            <label><i class="lni lni-unlock"></i></label>
                                                        </div>
                                                        <div>
                                                            <input type="password" placeholder="Repetir Contraseña" value="" id="regRepClave" name="regRepClave">
                                                            <label><i class="lni lni-lock"></i></label>
                                                        </div>
                                                        <button type="button" class="btnsendreg">Registrarme Ahora</button>
                                                        <a href="#" title="">¿Ya tienes una cuenta?</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="col-lg-12">
                <div class="other-option">
                    <h5>Cambiar de Idioma</h5>
                    <div style="width: 100%;text-align: center;margin-top: 25px;">
                        <!-- GTranslate: https://gtranslate.io/ -->
                        @include('user/include/translate')
                    </div>
                </div>
            </div>
        </div>
        @include('user/include/script_login')
    </body>
</html>