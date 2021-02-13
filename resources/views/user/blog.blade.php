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
            @php($titulo = "Blog")
            @include('user/include/header-page')
            <!-- End Footer Page -->

            <section>
                <div class="gap grey-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="tabBox">
                                    <div class="tabContainer">
                                        <div id="tab1" class="tabContent">
                                            <h5 class="main-title"><?php echo session('nameFolder'); ?></h5>

                                            <div class="row">
                                                <div class="col-12">
                                                    <iframe src="<?php echo session('linkBlog'); ?>?val=<?php echo 'yes'; ?>" style="width: 100%;height: calc(100vh - 260px);border: 1px solid transparent;">                                                        
                                                    </iframe>
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



        <div style="text-align: center;display: none;">
            @include('user/include/translate')
        </div>
        @include('user/include/script_all')
    </body>
</html>