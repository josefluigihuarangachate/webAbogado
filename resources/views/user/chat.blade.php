<?php
session_start();
if (session('acceso') <> true) {
    header("Location: " . URL::to('/'));
    exit();
}

header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html>
    <head>
        @include('user/include/head_all')
    </head>
    <body class="full-page" onload="loadInfoLawyer();">

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

            <section>
                <div class="gap no-top">
                    <div class="height-100vh">
                        <div class="chat-head">
                            <div class="active-user" style="width: 100% !important;">

                                <div class="dropdown">
                                    <div class="more-attachments" style="float: right;right: 10px;top: 0;margin-top: 7px;">
                                        <i class="lni lni-plus"></i>
                                    </div>
                                </div>

                                <figure>
                                    <img src="" id="imginfoAbogado" name="imginfoAbogado">
                                </figure>
                                <div class="active-user-name">
                                    <h2 id="nombreinfoAbogado" name="nombreinfoAbogado"></h2>
                                    <span style="color: #ffffff;">
                                        <img src="general/img/online.png" alt="" style="width: 6px;"/>&nbsp;
                                        Conectado
                                    </span>
                                </div>
                            </div>

                            <!--                            <ul class="head-options">
                                                            <li class="ico-hover"><i class="lni lni-reply"></i></li>
                                                            <li class="ico-hover"><i class="lni lni-star"></i></li>
                                                            <li class="ico-hover"><i class="lni lni-trash"></i></li>
                                                            <li class="ico-hover"><i class="lni lni-files"></i></li>
                                                            <li class="ico-hover"><i class="lni lni-share"></i></li>
                                                            <li class="ico-hover"><i class="lni lni-more"></i></li>
                                                        </ul>-->
                        </div>
                        <div class="conversation">
                            <div class="bg-image" style="background:url(images/chat-bg.png)"></div>
                            <!--<div class="time">Today</div>-->
                            <ul class="chat-desc">
                                <li class="you">
                                    <span>Yo</span>
                                    <p>Buenos dias queria consultarle acerca de uno de sus servicio que esta brindando</p>
                                    <em>11:52PM</em>
                                </li>
                                <li class="me">
                                    <span>Abogado</span>
                                    <p>Buenos dias, en que le podemos ayudar. Gracias</p>
                                    <em>11:54PM</em>
                                </li>                                
                            </ul>
                            <div class="mesg-write-box">
                                <form method="post">
                                    <input type="text" placeholder="Escribir mensaje..." class="form-control">
                                    <button type="button"><i class="lni lni-pointer"></i></button>
                                    <div class="attach-options">
                                        <span class="closed"><i class="lni lni-cross-circle"></i></span>
                                        <a href="#" title=""><i class="lni lni-camera"></i> <label for="upload" onClick="showCamera('Android! Start Camera')">Abrir Camera</label></a>
                                        <a href="#" title=""><i class="lni lni-video"></i> <label for="upload">Subir Foto / Video</label></a>
                                        <a href="#" title=""><i class="lni lni-add-files"></i> <label for="upload">Cargar Documento</label></a>
                                        <input type="file" name="upload" id="upload" style="display: none;" accept="image/*;capture=camera">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

        <div style="text-align: center;display: none;">
            @include('user/include/translate')
        </div>

        @include('user/include/script_all')
        <script type="text/javascript">
            function showCamera(toast) {
                Android.showCamera(toast);
            }
        </script>
    </body>
</html>