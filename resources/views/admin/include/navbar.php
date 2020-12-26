<div class="page-header">
    <div class="search-form">
        <form action="#" method="GET">
            <div class="input-group">
                <input class="form-control search-input typeahead" name="search" placeholder="Type something..." type="text"/>
                <span class="input-group-btn"><span id="close-search"><i data-feather="x" class="wd-16"></i></span></span>
            </div>
        </form>
    </div>
    <nav class="navbar navbar-default align-items-center">
        <!--================================-->
        <!-- Brand and Logo Start -->
        <!--================================-->
        <div class="navbar-header">
            <ul class="list-inline mb-0">
                <!-- Mobile Toggle and Logo -->
                <li class="list-inline-item">
                    <a class="hidden-md hidden-lg waves-effect tooltip-primary" href="javascript:void(0)" id="sidebar-toggle-button" data-toggle="tooltip" title="" data-trigger="hover" data-original-title="Toggle Sidebar">
                        <svg  class="adata-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16"/>
                        <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"/>
                        </g>
                        </svg>
                    </a>
                </li>
                <!-- PC Toggle and Logo -->
                <li class="list-inline-item">
                    <a class="hidden-xs hidden-sm waves-effect tooltip-primary" href="javascript:void(0)" id="collapsed-sidebar-toggle-button" data-toggle="tooltip" data-trigger="hover" title="" data-original-title="Toggle Sidebar">
                        <svg  class="adata-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16"/>
                        <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"/>
                        </g>
                        </svg>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="waves-effect tooltip-primary" href="javascript:void(0)" id="search-button" data-toggle="tooltip" data-trigger="hover" title="" data-original-title="Search">
                        <svg  class="adata-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/>
                        </g>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
        <!--/ Brand and Logo End -->
        <!--================================-->
        <!-- Header Right Start -->
        <!--================================-->
        <div class="header-right">
            <ul class="list-inline justify-content-end mb-0 d-flex align-items-center">
                <!-- Notifications Dropdown Start -->
                <!--================================-->
                <li class="list-inline-item dropdown hidden-xs">
                    <a class="dropdown-icon waves-effect" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg  class="adata-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <path d="M17,12 L18.5,12 C19.3284271,12 20,12.6715729 20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 C4,12.6715729 4.67157288,12 5.5,12 L7,12 L7.5582739,6.97553494 C7.80974924,4.71225688 9.72279394,3 12,3 C14.2772061,3 16.1902508,4.71225688 16.4417261,6.97553494 L17,12 Z" fill="#000000"/>
                        <rect fill="#000000" opacity="0.3" x="10" y="16" width="4" height="4" rx="2"/>
                        </g>
                        </svg>
                        <span class="notification-count wave in"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- Top Notifications Area -->
                        <div class="top-notifications-area">
                            <!-- Heading -->
                            <div class="notifications-heading">
                                <div class="heading-title">
                                    <h6>Notificaciones</h6>
                                </div>
                                <span>5+ Notificaciones</span>
                            </div>
                            <div class="notifications-box" id="notificationsBox">
                                <div class="notifications-date tx-uppercase tx-11 d-block tx-spacing-1">Hoy <span class="float-right"><?php echo date('d/m/Y'); ?></span></div>
                                <div id="scrollNotify" name="scrollNotify">                                    
                                </div>         
                            </div>
                            <div class="notifications-footer d-flex justify-content-between align-items-center">
                                <a href="/listaNotificacion">Ver todas las notificaciones</a>
                            </div>
                        </div>
                    </div>
                </li>
                <!--/ Notifications Dropdown End -->
                <!--================================-->
                <!-- Messages Dropdown Start -->
                <!--================================-->
                <li class="list-inline-item dropdown hidden-xs">
                    <a class="dropdown-icon waves-effect" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg  class="adata-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"/>
                        <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"/>
                        </g>
                        </svg>
                        <span class="messages-count wave in"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="top-message-area">
                            <div class="top-message-heading">
                                <div class="heading-title">
                                    <h6>Messages</h6>
                                </div>
                                <span>5+ New Messages</span>
                            </div>
                            <div class="message-box" id="messageBox">
                                <div class="messages-date tx-uppercase d-block tx-spacing-1">Today, Mar 20</div>
                                <a class="dropdown-item list-group-item" href="javascript:void(0)">
                                    <div class="pd-r-10 d-flex align-items-center justify-content-center">
                                        <span class="avatar avatar-online">
                                            <img src="admin/assets/images/users-face/1.png" class="img-fluid" alt="">
                                            <i></i>
                                        </span>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h3 class="tx-11 mb-0 tx-dark d-inline-block">Mary Adams</h3>
                                        <span class="tx-9 ft-right tx-light">Mar 20, 22:21pm</span>
                                        <div class="tx-11 text-truncate">Congratulate! Socrates Itumayfor work anniversaries</div>
                                    </div>
                                </a>
                                <a class="dropdown-item list-group-item" href="javascript:void(0)">
                                    <div class="pd-r-10 d-flex align-items-center justify-content-center">
                                        <span class="avatar avatar-online">
                                            <img src="admin/assets/images/users-face/2.png" class="img-fluid" alt="">
                                            <i></i>
                                        </span>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h3 class="tx-11 mb-0 tx-dark d-inline-block">Richards Caleb</h3>
                                        <span class="tx-9 ft-right tx-light">Mar 2, 22:21pm</span>
                                        <div class="tx-11 text-truncate">Richards Caleb, just created a new blog post</div>
                                    </div>
                                </a>
                                <a class="dropdown-item list-group-item" href="javascript:void(0)">
                                    <div class="pd-r-10 d-flex align-items-center justify-content-center">
                                        <span class="avatar avatar-busy">
                                            <img src="admin/assets/images/users-face/3.png" class="img-fluid" alt="">
                                            <i></i>
                                        </span>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h3 class="tx-11 mb-0 tx-dark d-inline-block">Lane Richards</h3>
                                        <span class="tx-9 ft-right tx-light">Mar 12, 22:21pm</span>
                                        <div class="tx-11 text-truncate">Richards Caleb, just created a new blog post</div>
                                    </div>
                                </a>
                                <a class="dropdown-item list-group-item" href="javascript:void(0)">
                                    <div class="pd-r-10 d-flex align-items-center justify-content-center">
                                        <span class="avatar avatar-busy">
                                            <img src="admin/assets/images/users-face/4.png" class="img-fluid" alt="">
                                            <i></i>
                                        </span>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h3 class="tx-11 mb-0 tx-dark d-inline-block">Edward Lane</h3>
                                        <span class="tx-9 ft-right tx-light">Mar 15, 02:21pm</span>
                                        <div class="tx-11 text-truncate">Adrian Monino, added new comment on your photo</div>
                                    </div>
                                </a>
                                <div class="messages-date tx-uppercase d-block tx-spacing-1">Yesterday, Mar 19</div>
                                <a class="dropdown-item list-group-item" href="javascript:void(0)">
                                    <div class="pd-r-10 d-flex align-items-center justify-content-center">
                                        <span class="avatar avatar-offline">
                                            <img src="admin/assets/images/users-face/5.png" class="img-fluid" alt="">
                                            <i></i>
                                        </span>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h3 class="tx-11 mb-0 tx-dark d-inline-block">Lane Richards</h3>
                                        <span class="tx-9 ft-right tx-light">Mar 20, 08:28pm</span>
                                        <div class="tx-11 text-truncate">Edward Lane, added new comment on your photo</div>
                                    </div>
                                </a>
                                <a class="dropdown-item list-group-item" href="javascript:void(0)">
                                    <div class="pd-r-10 d-flex align-items-center justify-content-center">
                                        <span class="avatar avatar-offline">
                                            <img src="admin/assets/images/users-face/6.png" class="img-fluid" alt="">
                                            <i></i>
                                        </span>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h3 class="tx-11 mb-0 tx-dark d-inline-block">Edward Lane</h3>
                                        <span class="tx-9 ft-right tx-light">Mar 21, 22:21pm</span>
                                        <div class="tx-11 text-truncate">Edward Lane, just created a new blog post</div>
                                    </div>
                                </a>
                                <a class="dropdown-item list-group-item" href="javascript:void(0)">
                                    <div class="pd-r-10 d-flex align-items-center justify-content-center">
                                        <span class="avatar avatar-online">
                                            <img src="admin/assets/images/users-face/1.png" class="img-fluid" alt="">
                                            <i></i>
                                        </span>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h3 class="tx-11 mb-0 tx-dark d-inline-block">Mary Adams</h3>
                                        <span class="tx-9 ft-right tx-light">Mar 20, 22:21pm</span>
                                        <div class="tx-11 text-truncate">Congratulate! Socrates Itumayfor work anniversaries</div>
                                    </div>
                                </a>
                                <a class="dropdown-item list-group-item" href="javascript:void(0)">
                                    <div class="pd-r-10 d-flex align-items-center justify-content-center">
                                        <span class="avatar avatar-online">
                                            <img src="admin/assets/images/users-face/2.png" class="img-fluid" alt="">
                                            <i></i>
                                        </span>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h3 class="tx-11 mb-0 tx-dark d-inline-block">Richards Caleb</h3>
                                        <span class="tx-9 ft-right tx-light">Mar 2, 22:21pm</span>
                                        <div class="tx-11 text-truncate">Richards Caleb, just created a new blog post</div>
                                    </div>
                                </a>
                                <a class="dropdown-item list-group-item" href="javascript:void(0)">
                                    <div class="pd-r-10 d-flex align-items-center justify-content-center">
                                        <span class="avatar avatar-busy">
                                            <img src="admin/assets/images/users-face/3.png" class="img-fluid" alt="">
                                            <i></i>
                                        </span>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h3 class="tx-11 mb-0 tx-dark d-inline-block">Lane Richards</h3>
                                        <span class="tx-9 ft-right tx-light">Mar 12, 22:21pm</span>
                                        <div class="tx-11 text-truncate">Richards Caleb, just created a new blog post</div>
                                    </div>
                                </a>
                            </div>
                            <div class="top-message-footer d-flex justify-content-between align-items-center">
                                <a href="">View all Messages</a>
                                <a href="" class="tooltip-primary" data-toggle="tooltip" data-placement="left" title="" data-original-title="Messages Settings"><i data-feather="settings" class="wd-16 ht-16"></i></a>
                            </div>
                        </div>
                    </div>
                </li>
                <!--/ Messages Dropdown End -->
                <!--================================-->
                <!-- Profile Dropdown Start -->
                <!--================================-->
                <li class="list-inline-item dropdown ml-2">
                    <?php
                    $src = session('foto');
                    if (empty(session('foto'))) {
                        $src = 'empty/empty-photo.jpg';
                    }
                    ?>
                    <a href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="general/fotos/<?php echo $src; ?>" class="img-fluid wd-30 ht-30 rounded-circle" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-profile">
                        <div class="user-profile-area">
                            <div class="user-profile-heading">
                                <div class="profile-thumbnail">

                                    <img src="general/fotos/<?php echo $src; ?>" class="img-fluid wd-40 ht-40 rounded-circle" alt="">
                                </div>
                                <div class="profile-text">
                                    <h6><?php echo session('nombre_corto'); ?></h6>
                                    <span class="tx-rubik">Conectado</span>
                                </div>
                            </div>
                            <a href="./editarProfile" class="dropdown-item d-flex align-items-center"><span data-feather="user" class="wd-16 ht-16 mr-2"></span>Mi Perfil</a>
                            <div class="dropdown-divider"></div>
                            <a href="./cerrarSesion" class="dropdown-item d-flex align-items-center"><span data-feather="log-out" class="wd-16 ht-16 mr-2"></span>Cerrar Sesion</a>
                        </div>
                    </div>
                </li>
                <!-- Profile Dropdown End -->
            </ul>
        </div>
        <!--/ Header Right End -->
    </nav>
    <div class="pd-y-10 pd-x-30 d-flex justify-content-between align-items-center header-bottom">
        <div class="d-flex align-items-center">
            <h2 class="d-flex align-items-center tx-16 mb-0 pd-r-15 mr-2 bd-r "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay wd-20 mr-2"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>&nbsp; Sistema Administrable</h2>
        </div>
        <div class="d-flex hidden-xs">
            <a href="" class="btn btn-light tx-uppercase waves-effect mg-l-20"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-crosshair wd-16 ht-16 mr-2"><circle cx="12" cy="12" r="10"></circle><line x1="22" y1="12" x2="18" y2="12"></line><line x1="6" y1="12" x2="2" y2="12"></line><line x1="12" y1="6" x2="12" y2="2"></line><line x1="12" y1="22" x2="12" y2="18"></line></svg>Recargar</a>
        </div>
    </div>    
</div>
<!--/ Page Header End -->   
<!--================================-->