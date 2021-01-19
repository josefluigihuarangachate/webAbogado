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
        @include('user/include/head_all')
        <style>
            .form-control-b{
                background: #fff none repeat scroll 0 0;
                border: 1px solid #ccc;
                border-radius: 7px;
                display: inline-block;
                font-family: inherit;
                font-size: 13px;
                padding: 10px 20px;
                width: 100%;
                background-color: #25303b;
                color: #ffffff;
                border-color: rgba(255, 255, 255, 0.05);
            }
        </style>

        <!--CSS CALIFICAR ESTRELLAS : https://codepen.io/jamesbarnett/pen/vlpkh-->
        <style>
            .form-control-b{
                background: #fff none repeat scroll 0 0;
                border: 1px solid #ccc;
                border-radius: 7px;
                display: inline-block;
                font-family: inherit;
                font-size: 13px;
                padding: 10px 20px;
                width: 100%;
                background-color: #25303b;
                color: #ffffff;
                border-color: rgba(255, 255, 255, 0.05);
            }




            @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

            fieldset, label { margin: 0; padding: 0; }

            h1 { font-size: 1.5em; margin: 10px; }

            /****** Style Star Rating Widget *****/

            .rating { 
                border: none;
                float: left;
            }

            .rating > input { display: none; } 
            .rating > label:before { 
                margin: 8px;
                font-size: 1.80em;
                font-family: FontAwesome;
                display: inline-block;
                content: "\f005";
            }

            .rating > .half:before { 
                content: "\f089";
                position: absolute;
            }

            .rating > label { 
                color: #777777; 
                float: right; 
            }

            /***** CSS Magic to Highlight Stars on Hover *****/

            .rating > input:checked ~ label, /* show gold star when clicked */
            .rating:not(:checked) > label:hover, /* hover current star */
            .rating:not(:checked) > label:hover ~ label { color: #eeda68;  } /* hover previous stars in list */

            .rating > input:checked + label:hover, /* hover current star when changing rating */
            .rating > input:checked ~ label:hover,
            .rating > label:hover ~ input:checked ~ label, /* lighten current selection */
            .rating > input:checked ~ label:hover ~ label { color: #eeda68;  } 
        </style>
        <style>
            .card {
                margin-bottom: 18px;
                background-color: #fff;
                padding: 25px;
                border: 1px solid #ccc; 
                border-radius: 8px;
            }

            /* USER PROFILE PAGE */
            .cardU {
                padding: 30px;
                background-color: rgba(214, 224, 226, 0.2);
                -webkit-border-top-left-radius:5px;
                -moz-border-top-left-radius:5px;
                border-top-left-radius:5px;
                -webkit-border-top-right-radius:5px;
                -moz-border-top-right-radius:5px;
                border-top-right-radius:5px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }
            .cardU.hovercard {
                position: relative;
                padding-top: 0;
                overflow: hidden;
                text-align: center;
                background-color: #fff;
                background-color: rgba(255, 255, 255, 1);
                width: 100%;
                border-radius: 0px;
            }
            .cardU.hovercard .card-background {
                height: 130px;
            }
            .card-background img {
                -webkit-filter: blur(25px);
                -moz-filter: blur(25px);
                -o-filter: blur(25px);
                -ms-filter: blur(25px);
                filter: blur(25px);
                margin-left: -100px;
                margin-top: -200px;
                min-width: 180%;
            }
            .cardU.hovercard .useravatar {
                position: absolute;
                top: 15px;
                left: 0;
                right: 0;
            }
            .cardU.hovercard .useravatar img {
                width: 100px;
                height: 100px;
                max-width: 100px;
                max-height: 100px;
                -webkit-border-radius: 50%;
                -moz-border-radius: 50%;
                border-radius: 50%;
                border: 5px solid rgba(255, 255, 255, 0.5);
            }
            .cardU.hovercard .card-info {
                position: absolute;
                bottom: 14px;
                left: 0;
                right: 0;
            }
            .cardU.hovercard .card-info .card-title {
                padding:0 5px;
                font-size: 20px;
                line-height: 1;
                color: #262626;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                color: #FFF;
            }
            .cardU.hovercard .card-info {
                overflow: hidden;
                font-size: 12px;
                line-height: 20px;
                color: #737373;
                text-overflow: ellipsis;
            }
            .cardU.hovercard .bottom {
                padding: 0 20px;
                margin-bottom: 17px;
            }
            .btn-pref .btn {
                -webkit-border-radius:0 !important;
            }
        </style>
    </head>
    <body class="full-page">

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
            @php($titulo = "Reseña")
            @include('user/include/header-page')
            <!-- End Footer Page -->

            <section>
                <div class="" style="margi">
                    <div class="container">
                        <div class="row">


                            <!-- LISTAR PLANES -->







                            <?php
                            $src = "general/fotos/empty/empty-photo.jpg";
                            if (!empty(session('foto'))) {
                                $src = "general/fotos/" . session('foto');
                            }
                            ?>





                            <div class="cardU hovercard">
                                <div class="card-background">
                                    <img class="card-bkimg" alt="" src="https://www.bellerbys.com/-/media/project/study-group/iscs/bellerbys/widget-images/bellerbys_widget_careerlaw600.jpg">
                                    <!-- http://lorempixel.com/850/280/people/9/ -->
                                </div>
                                <div class="useravatar">
                                    <img alt="" src="<?php echo $src; ?>">
                                </div>
                                <div class="card-info"> 
                                    <span class="card-title"><?php echo session('nombre_corto'); ?></span>
                                </div>
                            </div>
                            <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                                <div class="btn-group" role="group">
                                    <button type="button" id="stars" class="btn btn-warning" style="background-color: #f2efae;border: 1px solid #e5e052;color: #a09d36;" href="#tab1" data-toggle="tab">
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"><sup id="star" name="star">0</sup></span>
                                        <div class="hidden-xs">Estrellas</div>
                                    </button>
                                </div>
                                <div class="btn-group" role="group">
                                    <button type="button" id="favorites" class="btn btn-danger" style="background-color: #ea9993;border: 1px solid #e58780;color: #aa3c34;" href="#tab2" data-toggle="tab">
                                        <span class="glyphicon glyphicon-heart" aria-hidden="true"><sup id="favorite" name="favorite">0</sup></span>
                                        <div class="hidden-xs">Favoritos</div>
                                    </button>
                                </div>
                                <div class="btn-group" role="group">
                                    <button type="button" id="following" class="btn btn-primary" style="background-color: #88acc9;border: 1px solid #7b95aa;color: #3d617c;" href="#tab3" data-toggle="tab">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"><sup id="client" name="client">0</sup></span>
                                        <div class="hidden-xs">Clientes</div>
                                    </button>
                                </div>
                            </div>  
                            <br>
                            <br>
                            <br>
                            <div id="listado_resena" name="listado_resena" class="col-12"></div>
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>

                </div>
            </section>
        </div>

        <div style="text-align: center;display: none;">
            @include('user/include/translate')
        </div>

        @include('user/include/script_all')

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="general/js/mapa.js<?php echo $v; ?>" type="text/javascript"></script>
        <script src="user/assets/js/crud/crud_resena.js<?php echo $v; ?>" type="text/javascript"></script>


        <!-- Bootstrap CSS -->

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</body>
</html>