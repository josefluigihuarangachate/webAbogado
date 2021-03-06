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
                                    <img src="general/fotos/empty/empty-photo.jpg" id="imginfoAbogado" name="imginfoAbogado">
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
                                <form action="#" method="POST" enctype="multipart/form-data" id="formdataChat" name="formdataChat">
                                    <input type="text" id="Rmensaje" name="Rmensaje" placeholder="Escribir mensaje..." class="form-control">
                                    <button type="button" id="Rsend" name="Rsend"><i class="lni lni-pointer"></i></button>
                                    <div class="attach-options" style="z-index: 9999999;" id="modalUpload" name="modalUpload">
                                        <span class="closed" id="closeUpload" name="closeUpload"><i class="lni lni-cross-circle"></i></span>
                                        <a href="#" title=""><i class="lni lni-camera"></i> <label for="upload" onClick="showCamera('Android! Start Camera')">Abrir Camera</label></a>
                                        <!--<a href="#" title=""><i class="lni lni-video"></i> <label for="upload">Subir Foto / Video</label></a>-->
                                        <a href="#" title=""><i class="lni lni-add-files"></i> <label for="upload">Cargar Documento</label></a>
                                        <input type="file" name="upload[]" id="upload" style="display: none;" accept="image/jpeg,image/jpg,image/png,application/pdf,image/x-eps" multiple="multiple">
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

            var formatoHora = "00:00:00";

            function restarHora(segundos) {
                $.post(ruta() + "restarHora" + globalName, {cmd: 'web', segundos: segundos}, function (html) {
                    if (html == formatoHora) {
                        document.getElementById("tiempo_restante").innerHTML = 'Tiempo Terminado';
                        document.getElementById("modalUpload").style.display = "none";
                        deshabilitarChat();
                    } else {

                        var HM = html.split(':');
                        //document.getElementById("tiempo_restante").innerHTML = 'Faltan : ' + HM[0] + ':' + HM[1] + ':' + HM[2];
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
                                    chat_archivo = "<div style='width: 100%;'></div><center><a href='general/archivosChat/" + mensaje[m].archivo + "' download>";
                                    chat_archivo += "<img src='general/img/downloadFile.png' style='width: 50px; height: 50px;'/>";
                                    chat_archivo += "</a></center><div style='width: 100%;'></div>";
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
                            habilitarChat();
    <?php
} else {
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
}
?>






                    }
                });
            }
            tiempo_restante(0);


            function chat() {
                setInterval(function () {
                    tiempo_restante(4);

                }, 4000);
            }
            chat();



            function correrSegundos() {

                var s = '00';
                var sep = document.getElementById("tiempo_restante").innerHTML;


                if (sep != "" && sep != "Faltan : 00:00:00" && sep != "Tiempo Terminado") {
                    var str = sep.split(" ");
                    var t = str[2].split(":");

                    if (0 < parseInt(t[2]) && parseInt(t[2]) < 60) {
                        if (0 < parseInt(t[2]) && parseInt(t[2]) < 10) {
                            t[2] = "0" + (parseInt(t[2] - 1));
                        } else if (10 <= parseInt(t[2]) && parseInt(t[2]) < 60) {
                            t[2] = t[2] - 1;
                            if (0 < parseInt(t[2]) && parseInt(t[2]) < 10) {
                                t[2] = "0" + parseInt(t[2]);
                            }
                        }

                        console.log(s);
                        document.getElementById("tiempo_restante").innerHTML = 'Faltan : ' + t[0] + ':' + t[1] + ':' + t[2];
                    } else {
                        document.getElementById("tiempo_restante").innerHTML = 'Faltan : ' + t[0] + ':' + t[1] + ':59';
                    }

                } else if (sep === "Faltan : 00:00:00" || sep === "Tiempo Terminado") {

                    // ENVIO NOTIFICACION PAR QUE EVALUE A LOS ABOGADOS
                    $.post(ruta() + 'notificarCalificarAbogado' + globalName, {'cmd': 'web'}, function (data) {
                        console.log("Notificacion Enviada");
                    });

                    clearInterval(runTime);
                }

            }

            var runTime = setInterval(function () {
                correrSegundos();
            }, 1000);











            // ENVIAR MENSAJE DE TEXTO
            $(document).ready(function () {
                $("#Rsend").click(function () {
                    var formData = new FormData($('#formdataChat')[0]);
                    var cmd = 'web';
                    formData.append("cmd", cmd);

                    $.ajax({
                        url: ruta() + 'registrarChat' + globalName,
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false
                    })

                            .done(function (json) {
                                if (json['status'] == 'Ok') {
                                    //Swal.fire(
                                    //        'Mensaje Importante',
                                    //        json['msg'],
                                    //        'success' // question,warning,error
                                    //        );
                                    //console.log(json['msg']);
                                    document.getElementById("formdataChat").reset();
                                    tiempo_restante(0);
                                    scrollToBottomChat();
                                } else if (json['status'] == 'Error') {
                                    console.log(json['msg']);
                                }
                            })
                            .always(function () {
                                // Likewise, if .always is defined last, it will execute last:
                            })
                            .fail(function () {
                                // console.log("An error occurred, the files couldn't be sent!");
                            });
                });
            });

            function scrollToBottomChat() {
                // conversacion (Chat scroll bottom)
                // https://jsfiddle.net/Truezplaya/phncn241/2/
                // https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_element_scrollleft

                var elmnt = document.getElementById("conversacion");
                var y = elmnt.scrollTop;

                $("#conversacion").animate({scrollTop: $('ul#conversacion li:last').offset().top + y});
            }

            setTimeout(function () {
                scrollToBottomChat();
            }, 3000);


        </script>


        <script type="text/javascript">
            // Teclado enter
            // https://www.jose-aguilar.com/blog/deshabilitar-tecla-enter-de-los-formularios/
            // Para deshabilitar la tecla enter, porque me estaba saliendo error
            $(document).ready(function () {
                $("form").keypress(function (e) {
                    if (e.which == 13) {
                        return false;
                    }
                });
            });
        </script>
    </body>
</html>