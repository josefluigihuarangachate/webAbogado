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
        <style>
            /*alert styling*/
            .alert-success {
                border-color: #e6e6e6;
                border-left: 5px solid #00986a;
                background-color: #fff;
                color: #888;
            }
            
            .alert-primary {
                border-color: #e6e6e6;
                border-left: 5px solid #0a71d8;
                background-color: #fff;
                color: #888;
            }

            .alert-info {
                border-color: #e6e6e6;
                border-left: 5px solid #00b3c8;
                background-color: #fff;
                color: #888;
            }

            .alert-warning {
                border-color: #e6e6e6;
                border-left: 5px solid #f9af2c;
                background-color: #fff;
                color: #888;
            }

            .alert-danger {
                border-color: #e6e6e6;
                border-left: 5px solid #c82630;
                background-color: #fff;
                color: #888;
            }

            @media (min-width: 768px) {
                .alert {
                    border-radius: 6px;
                    display: table;
                    width: 100%;
                    padding-left: 78px;
                    position: relative;
                    padding-right: 60px;
                    border: 1px solid #e6e6e6;
                }

                .alert .close {
                    color: #888;
                    opacity: 1;
                    float: none;
                    position: absolute;
                    right: 18px;
                    top: 50%;
                    margin-top: -12px;
                    font-size: 25px;
                }

                .alert .icon {
                    text-align: center;
                    width: 58px;
                    height: 100%;
                    position: absolute;
                    top: 0;
                    left: 0;
                    border: 1px solid #bdbdbd;
                    padding-top: 15px;
                    border-radius: 6px 0 0 6px;
                }

                .alert .icon i {
                    font-size: 20px;
                    color: #fff;
                    left: 21px;
                    margin-top: -10px;
                    position: absolute;
                    top: 50%;
                }

                .alert .icon img {
                    font-size: 20px;
                    color: #fff;
                    left: 18px;
                    margin-top: -10px;
                    position: absolute;
                    top: 50%;
                }
                /*============ colors ========*/
                .alert.alert-success .icon,
                .alert.alert-success .icon:after {
                    border-color: none;
                    background: #00986a;
                }
                
                .alert.alert-primary .icon,
                .alert.alert-primary .icon:after {
                    border-color: none;
                    background: #0a71d8;
                }

                .alert.alert-info .icon,
                .alert.alert-info .icon:after {
                    border-color: none;
                    background: #00b3c8;
                }

                .alert.alert-warning .icon,
                .alert.alert-warning .icon:after {
                    border: none;
                    background: #f9af2c;
                }

                .alert.alert-danger .icon,
                .alert.alert-danger .icon:after {
                    border-color: none;
                    background: #c82630;
                }
            }

        </style>
    </head>
    <body class="full-page" onload="loadNotify();">

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
            @php($titulo = "Notificaciones")
            @include('user/include/header-page')
            <!-- End Footer Page -->

            <section>
                <div class="gap no-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="main-title">Tus Notificaciones</h5>

                                <div id="listado_notificaciones" name="listado_notificaciones">                             
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
    </body>
</html>