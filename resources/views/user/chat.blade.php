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
                                <div class="dropdown" id="Rarchivo" name="Rarchivo">
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
                                    <span class="badge badge-danger" style="font-size: 13px;color:#fff;background-color: #eb4132;" id="tiempo_restante" name="tiempo_restante"></span>
                                </div>
                            </div>
                        </div>
                        <div class="conversation">
                            <div class="bg-image" style="background:url(images/chat-bg.png)"></div>
                            <!--<div class="time">Today</div>-->
                            <ul class="chat-desc" id="conversacion" name="conversacion">
                            </ul>
                            <div class="mesg-write-box">
                                <form method="post">
                                    <input type="text" id="Rmensaje" name="Rmensaje" placeholder="Escribir mensaje..." class="form-control">
                                    <button type="button" id="Rsend" name="Rsend"><i class="lni lni-pointer"></i></button>
                                    <div class="attach-options" style="z-index: 9999999;">
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
        <script>
            var idUserChat = <?php echo session('id'); ?>
        </script>
        <script>

            var formatoHora = "00:00";
            function restarHora(segundos) {
                $.post(ruta() + "restarHora" + globalName, {cmd: 'web', segundos: segundos}, function (html) {
                    if (html == formatoHora) {
                        document.getElementById("tiempo_restante").innerHTML = 'Tiempo Terminado';
                        deshabilitarChat();
                    } else {
                        document.getElementById("tiempo_restante").innerHTML = 'Faltan : ' + html;
                        habilitarChat();
                    }
                });
            }

            function deshabilitarChat() {
                document.getElementById("Rmensaje").disabled = true;
                document.getElementById("Rmensaje").value = "";
                document.getElementById("Rsend").disabled = true;
                document.getElementById("Rarchivo").style.display = "none";
            }
            deshabilitarChat();

            function habilitarChat() {
                document.getElementById("Rmensaje").disabled = false;
                document.getElementById("Rsend").disabled = false;
                document.getElementById("Rarchivo").style.display = "block";
            }


            function tiempo_restante(segundos) {
                $.post(ruta() + "conversacion" + globalName, {cmd: 'web'}, function (json) {
                    if (json['status'] == 'Ok') {

                        if (json['mensajes']) {
                            var mensaje = json['mensajes'];

                            var conversacion = "";
                            for (var m = 0; m < mensaje.length; m++) {

                                var chat_archivo = ""; // SIRVE PARA CUANDO TIENE ARCHIVO
                                if (mensaje[m].archivo) {
                                    chat_archivo = "<br>" + mensaje[m].archivo;
                                }

                                if (mensaje[m].idemisor === idUserChat) {
                                    conversacion += '<li class="me">';
                                    conversacion += '<span>' + mensaje[m].nombreEmisor + '</span>';
                                    conversacion += '<p>' + mensaje[m].mensaje + chat_archivo + '</p>';
                                    conversacion += '<em>' + mensaje[m].fechahora + '</em>';
                                    conversacion += '</li>';
                                } else {
                                    conversacion += '<li class="you">';
                                    conversacion += '<span>' + mensaje[m].nombreEmisor + '</span>';
                                    conversacion += '<p>' + mensaje[m].mensaje + chat_archivo + '</p>';
                                    conversacion += '<em>' + mensaje[m].fechahora + '</em>';
                                    conversacion += '</li>';
                                }

                            }

                            document.getElementById("conversacion").innerHTML = conversacion;
                        }

<?php
if (session('idtipo') == 2) {
    ?>
                            if (json['suscripcion']) { // SI ESTA SUSCRITO EN ALGUN PLAN
                                var suscripcion = json['suscripcion'];
                                if (suscripcion.restan_horas != null || suscripcion.restan_horas != formatoHora) {
                                    restarHora(segundos);
                                } else {
                                    deshabilitarChat();
                                }

                            } else {
                                deshabilitarChat();
                            }
    <?php
} else {
    ?>
                            habilitarChat();
    <?php
}
?>
                    }
                });
            }
            tiempo_restante(0);








            function chat() {
                setInterval(function () {


                    tiempo_restante(5);

                }, 5000);
            }
            chat();
        </script>
    </body>
</html>