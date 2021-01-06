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
    <body class="full-page" onload="loadConversaciones();">

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

            <!-- Footer Page -->
            @php($titulo = "Conversaciones")
            @include('user/include/header-page')
            <!-- End Footer Page -->

            <section>
                <div class="gap no-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="main-title">Búsqueda Rapida</h5>
                                <input type="text" class="search-input" placeholder="Buscar..." id="filterServices" name="filterServices">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="gap no-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div id="listado_conversaciones" name="listado_conversaciones">
                                </div>
                                <!-- load more -->
                                <br>
                                <br>
                                <br>
                                <br>
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
            // https://stackoverflow.com/a/54461764
            jQuery("#filterServices").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                jQuery("#listado_conversaciones .activity").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        </script>
    </body>
</html>