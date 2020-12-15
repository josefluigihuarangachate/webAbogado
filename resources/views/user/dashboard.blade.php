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
    <body class="full-page">

        <!--Loading-->
        @include('user/include/loading')
        <!--End Loading-->

        <div class="app-layout">

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
            @php($titulo = "Inicio")
            @include('user/include/header-page')
            <!-- End Footer Page -->



            <section>
                <div class="gap no-gap">
                    <div class="good-day-notification">
                        <h4 style="margin-top: 8px;">CONSULTAS LEGALES</h4>
                        <p>On Law pone a su disposición este medio para que realice
                            sus consultas y/o sugerencias, las cuales serán atendidas a la brevedad.<br></p>
                        <div class="day-icon">
                            <img src="user/assets/images/consult.jpg" alt="" width="60">
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="gap no-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="main-title">Búsqueda Rapida</h5>
                                <input type="text" class="search-input" placeholder="Buscar servicios...">
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
                                <h5 class="main-title">Abogados Destacados</h5>
                                <div class="activity">
                                    <figure>
                                        <img alt="" src="user/assets/images/resources/user1.jpg" >
                                        <span><img src="user/assets/images/svg/aaa.png" alt=""></span>
                                    </figure>
                                    <div class="history-meta">
                                        <h5><a title="" href="#">Peter react to maria's pictures</a></h5>
                                        <span>Disponible</span>
                                        <br><span><img src="user/assets/images/star.png" width="18" height="18"> <sup style="font-size: 12px;color: #eeda68;">89</sup></span>
                                    </div>
                                </div>
                                <div class="activity">
                                    <figure>
                                        <img alt="" src="user/assets/images/resources/user6.jpg" >
                                        <span><img src="user/assets/images/svg/about.png" alt=""></span>
                                    </figure>
                                    <div class="history-meta">
                                        <h5><a title="" href="#">jack comment on the carter's post</a></h5>
                                        <span>Disponible</span>
                                        <br><span><img src="user/assets/images/star.png" width="18" height="18"> <sup style="font-size: 12px;color: #eeda68;">4</sup></span>

                                    </div>
                                </div>
                                <div class="activity">
                                    <figure>
                                        <img alt="" src="user/assets/images/resources/user2.jpg" >
                                        <span><img src="user/assets/images/svg/angry.png" alt=""></span>
                                    </figure>
                                    <div class="history-meta">
                                        <h5><a title="" href="#">gian reply the your comment</a></h5>
                                        <span>Disponible</span>
                                        <br><span><img src="user/assets/images/star.png" width="18" height="18"> <sup style="font-size: 12px;color: #eeda68;">64</sup></span>

                                    </div>
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

            <div class="search-post">
                <span class="close-btn"><i class="lni lni-cross-circle"></i></span>
                <div class="search-area">
                    <h5 class="main-title">Buscar Abogados</h5>
                    <form method="post">
                        <input type="text" placeholder="Buscar Abogados..">
                        <div class="filter-search">
<!--                            <div>
                                <i class="lni lni-users"></i>
                                <input type="checkbox" id="find-friend">
                                <label for="find-friend">Find Friends</label>
                            </div>
                            <div>
                                <i class="lni lni-signal"></i>
                                <input type="checkbox" id="nearby">
                                <label for="nearby">Nearby</label>
                            </div>
                            <div>
                                <i class="lni lni-calendar"></i>
                                <input type="checkbox" id="event">
                                <label for="event">Events</label>
                            </div>
                            <div>
                                <i class="lni lni-save"></i>
                                <input type="checkbox" id="saved">
                                <label for="saved">Saved Posts</label>
                            </div>
                            <div>
                                <i class="lni lni-network"></i>
                                <input type="checkbox" id="group">
                                <label for="group">Groups</label>
                            </div>
                            <div>
                                <i class="lni lni-add-files"></i>
                                <input type="checkbox" id="pages">
                                <label for="pages">Pages</label>
                            </div>
                            <div>
                                <i class="lni lni-map-marker"></i>
                                <input type="checkbox" id="loc">
                                <label for="loc">Select Location</label>
                            </div>-->
                        </div>
                        <button type="submit">Buscar</button>
                    </form>
                </div>
            </div><!-- search -->

            <div class="create-new">
                <div class="post-form">
                    <h5>Create New Post</h5>
                    <span class="close-btn"><i class="lni lni-cross-circle"></i></span>
                    <form>
                        <textarea placeholder="write something"></textarea>
                        <div class="attachments">
                            <ul>
                                <li>
                                    <i class="lni lni-music"></i>
                                    <label class="fileContainer">
                                        <input type="file">
                                    </label>
                                </li>
                                <li>
                                    <i class="lni lni-image"></i>
                                    <label class="fileContainer">
                                        <input type="file">
                                    </label>
                                </li>
                                <li>
                                    <i class="lni lni-video"></i>
                                    <label class="fileContainer">
                                        <input type="file">
                                    </label>
                                </li>
                                <li>
                                    <i class="lni lni-emoji-smile"></i>
                                    <label class="fileContainer">
                                        <input type="file">
                                    </label>
                                </li>
                                <li class="more-alt">
                                    <i class="lni lni-more-alt"></i>
                                </li>
                            </ul>
                            <div class="more-alt-options">
                                <ul>
                                    <li><a href="#" title=""><img src="user/assets/images/svg/recommend.png" alt="">Ask for Recommendation</a></li>
                                    <li><a href="#" title=""><img src="user/assets/images/svg/live.png" alt="">Go Live</a></li>
                                    <li><a href="#" title=""><img src="user/assets/images/svg/map-marker.png" alt="">Check in</a></li>
                                    <li><a href="#" title=""><img src="user/assets/images/svg/gif.png" alt="">Gif</a></li>
                                </ul>
                                <ol class="post-to-also">
                                    <li>
                                        <input type="checkbox" id="switch0002" /> 
                                        <label for="switch0002" data-on-label="ON" data-off-label="OFF"></label>
                                        <i class="lni lni-circle-plus"></i>
                                        NewsFeed
                                    </li>
                                    <li>
                                        <input type="checkbox" id="switch0003" /> 
                                        <label for="switch0003" data-on-label="ON" data-off-label="OFF"></label>
                                        <figure><img src="user/assets/images/resources/user1.jpg" alt=""></figure>Your Story
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <button type="submit">Publish</button>
                    </form>
                </div>
            </div><!-- create new post -->

            <div class="share-wraper">
                <div class="share-options">
                    <span class="close-btn"><i class="lni lni-cross-circle"></i></span>
                    <h5>Share To!</h5>
                    <form method="post">
                        <textarea placeholder="Write Something"></textarea>
                    </form>
                    <ul>
                        <li><a href="#" title="">Your Timeline</a></li>
                        <li class="friends"><a href="#" title="">To Friends</a></li>
                        <li class="socialz"><a href="#" title="">Social Media</a></li>
                    </ul>
                    <div class="social-media" style="display: none;">
                        <ul>
                            <li><a class="facebook" href="#" title=""><i class="lni lni-facebook"></i></a></li>
                            <li><a class="twitter" href="#" title=""><i class="lni lni-twitter"></i></a></li>
                            <li><a class="instagram" href="#" title=""><i class="lni lni-instagram"></i></a></li>
                            <li><a class="pinterest" href="#" title=""><i class="lni lni-pinterest"></i></a></li>
                            <li><a class="youtube" href="#" title=""><i class="lni lni-youtube"></i></a></li>
                            <li><a class="dribble" href="#" title=""><i class="lni lni-dribbble"></i></a></li>
                            <li><a class="behance" href="#" title=""><i class="lni lni-behance-original"></i></a></li>
                        </ul>
                    </div>
                    <div class="friends-to" style="display: none;">
                        <div class="follow-men">
                            <figure><img alt="" src="user/assets/images/resources/user1.jpg" class="mCS_img_loaded"></figure>
                            <div class="follow-meta">
                                <h5><a title="" href="#">Jack Carter</a></h5>
                                <span>family member</span>
                            </div>
                            <a title="" href="#">Share</a>
                        </div>
                        <div class="follow-men">
                            <figure><img alt="" src="user/assets/images/resources/user2.jpg" class="mCS_img_loaded"></figure>
                            <div class="follow-meta">
                                <h5><a title="" href="#">Xang Ching</a></h5>
                                <span>Close Friend</span>
                            </div>
                            <a title="" href="#">Share</a>
                        </div>
                        <div class="follow-men">
                            <figure><img alt="" src="user/assets/images/resources/user3.jpg" class="mCS_img_loaded"></figure>
                            <div class="follow-meta">
                                <h5><a title="" href="#">Emma Watson</a></h5>
                                <span>Matul Friend</span>
                            </div>
                            <a title="" href="#">Share</a>
                        </div>
                    </div>
                    <button class="main-btn" type="submit">Publish</button>
                </div>
            </div>

        </div>

        @include('user/include/script_all')
    </body>
</html>