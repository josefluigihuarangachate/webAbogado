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
                <!--================================-->
                <!-- Service Dropdown Start -->
                <!--================================-->
                <li class="list-inline-item dropdown hidden-xs">
                    <a class="dropdown-icon waves-effect" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg  class="adata-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <rect fill="#000000" opacity="0.3" x="4" y="4" width="4" height="4" rx="1"/>
                        <path d="M5,10 L7,10 C7.55228475,10 8,10.4477153 8,11 L8,13 C8,13.5522847 7.55228475,14 7,14 L5,14 C4.44771525,14 4,13.5522847 4,13 L4,11 C4,10.4477153 4.44771525,10 5,10 Z M11,4 L13,4 C13.5522847,4 14,4.44771525 14,5 L14,7 C14,7.55228475 13.5522847,8 13,8 L11,8 C10.4477153,8 10,7.55228475 10,7 L10,5 C10,4.44771525 10.4477153,4 11,4 Z M11,10 L13,10 C13.5522847,10 14,10.4477153 14,11 L14,13 C14,13.5522847 13.5522847,14 13,14 L11,14 C10.4477153,14 10,13.5522847 10,13 L10,11 C10,10.4477153 10.4477153,10 11,10 Z M17,4 L19,4 C19.5522847,4 20,4.44771525 20,5 L20,7 C20,7.55228475 19.5522847,8 19,8 L17,8 C16.4477153,8 16,7.55228475 16,7 L16,5 C16,4.44771525 16.4477153,4 17,4 Z M17,10 L19,10 C19.5522847,10 20,10.4477153 20,11 L20,13 C20,13.5522847 19.5522847,14 19,14 L17,14 C16.4477153,14 16,13.5522847 16,13 L16,11 C16,10.4477153 16.4477153,10 17,10 Z M5,16 L7,16 C7.55228475,16 8,16.4477153 8,17 L8,19 C8,19.5522847 7.55228475,20 7,20 L5,20 C4.44771525,20 4,19.5522847 4,19 L4,17 C4,16.4477153 4.44771525,16 5,16 Z M11,16 L13,16 C13.5522847,16 14,16.4477153 14,17 L14,19 C14,19.5522847 13.5522847,20 13,20 L11,20 C10.4477153,20 10,19.5522847 10,19 L10,17 C10,16.4477153 10.4477153,16 11,16 Z M17,16 L19,16 C19.5522847,16 20,16.4477153 20,17 L20,19 C20,19.5522847 19.5522847,20 19,20 L17,20 C16.4477153,20 16,19.5522847 16,19 L16,17 C16,16.4477153 16.4477153,16 17,16 Z" fill="#000000"/>
                        </g>
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="row no-gutters header-service">
                            <div class="col-md-6 bd-r bd-b">
                                <a href="" class="tx-center d-block waves-effect waves-light">
                                    <img src="admin/assets/images/icon/bag.png" class="img-fluid wd-50" alt="">
                                    <h2 class="tx-13 mg-t-10 mb-0">Shopping</h2>
                                    <p class="tx-11 mb-0">Shopping Cart</p>
                                </a>
                            </div>
                            <div class="col-md-6 bd-b">
                                <a href="" class="tx-center d-block waves-effect waves-light">
                                    <img src="admin/assets/images/icon/bill.png" class="img-fluid wd-50" alt="">
                                    <h2 class="tx-13 mg-t-10 mb-0">Billing</h2>
                                    <p class="tx-11 mb-0">Online Billing</p>
                                </a>
                            </div>
                            <div class="col-md-6 bd-r bd-b">
                                <a href="" class="tx-center d-block waves-effect waves-light">
                                    <img src="admin/assets/images/icon/bill-reciept.png" class="img-fluid wd-50" alt="">
                                    <h2 class="tx-13 mg-t-10 mb-0">Billing</h2>
                                    <p class="tx-11 mb-0">Billing Receipt</p>
                                </a>
                            </div>
                            <div class="col-md-6 bd-b">
                                <a href="" class="tx-center d-block waves-effect waves-light">
                                    <img src="admin/assets/images/icon/finance.png" class="img-fluid wd-50" alt="">
                                    <h2 class="tx-13 mg-t-10 mb-0">Finance</h2>
                                    <p class="tx-11 mb-0">Finance Details</p>
                                </a>
                            </div>
                            <div class="col-md-6 bd-r bd-b">
                                <a href="" class="tx-center d-block waves-effect waves-light">
                                    <img src="admin/assets/images/icon/offer.png" class="img-fluid wd-50" alt="">
                                    <h2 class="tx-13 mg-t-10 mb-0">Offers</h2>
                                    <p class="tx-11 mb-0">Big Deal Offers</p>
                                </a>
                            </div>
                            <div class="col-md-6 bd-b">
                                <a href="" class="tx-center d-block waves-effect waves-light">
                                    <img src="admin/assets/images/icon/shipping.png" class="img-fluid wd-50" alt="">
                                    <h2 class="tx-13 mg-t-10 mb-0">Shipping</h2>
                                    <p class="tx-11 mb-0">Shipping Details</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <!--/ Service Dropdown End -->
                <!--================================-->
                <!-- Languages Dropdown Start -->
                <!--================================-->
                <li class="list-inline-item dropdown hidden-xs">
                    <a class="dropdown-icon waves-effect" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg  class="adata-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M13,17.0484323 L13,18 L14,18 C15.1045695,18 16,18.8954305 16,20 L8,20 C8,18.8954305 8.8954305,18 10,18 L11,18 L11,17.0482312 C6.89844817,16.5925472 3.58685702,13.3691811 3.07555009,9.22038742 C3.00799634,8.67224972 3.3975866,8.17313318 3.94572429,8.10557943 C4.49386199,8.03802567 4.99297853,8.42761593 5.06053229,8.97575363 C5.4896663,12.4577884 8.46049164,15.1035129 12.0008191,15.1035129 C15.577644,15.1035129 18.5681939,12.4043008 18.9524872,8.87772126 C19.0123158,8.32868667 19.505897,7.93210686 20.0549316,7.99193546 C20.6039661,8.05176407 21.000546,8.54534521 20.9407173,9.09437981 C20.4824216,13.3000638 17.1471597,16.5885839 13,17.0484323 Z" fill="#000000" fill-rule="nonzero"/>
                        <path d="M12,14 C8.6862915,14 6,11.3137085 6,8 C6,4.6862915 8.6862915,2 12,2 C15.3137085,2 18,4.6862915 18,8 C18,11.3137085 15.3137085,14 12,14 Z M8.81595773,7.80077353 C8.79067542,7.43921955 8.47708263,7.16661749 8.11552864,7.19189981 C7.75397465,7.21718213 7.4813726,7.53077492 7.50665492,7.89232891 C7.62279197,9.55316612 8.39667037,10.8635466 9.79502238,11.7671393 C10.099435,11.9638458 10.5056723,11.8765328 10.7023788,11.5721203 C10.8990854,11.2677077 10.8117724,10.8614704 10.5073598,10.6647638 C9.4559885,9.98538454 8.90327706,9.04949813 8.81595773,7.80077353 Z" fill="#000000" opacity="0.3"/>
                        </g>
                        </svg>
                    </a>
                    <ul class="dropdown-menu languages-dropdown">
                        <li>
                            <a href="" class="d-flex align-items-center" data-lang="en"><i class="flag-icon flag-icon-us mr-2"></i><span>English-US</span></a>
                        </li>
                        <li>
                            <a href="" class="d-flex align-items-center" data-lang="es"><i class="flag-icon flag-icon-es mr-2"></i><span>Spanish</span></a>
                        </li>
                        <li>
                            <a href="" class="d-flex align-items-center" data-lang="fr"><i class="flag-icon flag-icon-fr mr-2"></i><span>French</span></a>
                        </li>
                        <li>
                            <a href="" class="d-flex align-items-center" data-lang="gr"><i class="flag-icon flag-icon-de mr-2"></i><span>German</span></a>
                        </li>
                        <li>
                            <a href="" class="d-flex align-items-center" data-lang="ru"><i class="flag-icon flag-icon-ru mr-2"></i><span>Russian</span></a>
                        </li>
                        <li>
                            <a href="" class="d-flex align-items-center" data-lang="ru"><i class="flag-icon flag-icon-gb mr-2"></i><span>English-UK</span></a>
                        </li>
                    </ul>
                </li>
                <!--/ Languages Dropdown End -->
                <!--================================-->
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
                                    <h6>Notifications</h6>
                                </div>
                                <span>5+ New Notifications</span>
                            </div>
                            <div class="notifications-box" id="notificationsBox">
                                <div class="notifications-date tx-uppercase tx-11 d-block tx-spacing-1">Today, Mar 20</div>
                                <a class="dropdown-item list-group-item" href="">
                                    <div class="d-flex justify-content-between">
                                        <div class="wd-40 ht-40 mg-r-10 d-flex align-items-center justify-content-center rounded card-icon-success">
                                            <i data-feather="smile" class="wd-20"></i>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h3 class="tx-11 mb-0 tx-dark">Your order is placed</h3>
                                        <div class="tx-11 d-block text-truncate">System reboot has been successfully completed</div>
                                        <span class="tx-9 tx-light">Mar 15, 12:32pm</span>
                                    </div>
                                </a>
                                <a class="dropdown-item list-group-item" href="">
                                    <div class="d-flex justify-content-between">
                                        <div class="wd-40 ht-40 mg-r-10 d-flex align-items-center justify-content-center rounded card-icon-warning">
                                            <i data-feather="bell" class="wd-20"></i>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h3 class="tx-11 mb-0 tx-dark">Document available</h3>
                                        <div class="tx-11 d-block text-truncate">New user feedback received</div>
                                        <span class="tx-9 tx-light">Mar 15, 12:32pm</span>
                                    </div>
                                </a>
                                <a class="dropdown-item list-group-item" href="">
                                    <div class="d-flex justify-content-between">
                                        <div class="wd-40 ht-40 mg-r-10 d-flex align-items-center justify-content-center rounded card-icon-success">
                                            <i data-feather="check-circle" class="wd-20"></i>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h3 class="tx-11 mb-0 tx-dark">Payment failed!</h3>
                                        <div class="tx-11 d-block text-truncate">New payment has been failed</div>
                                        <span class="tx-9 tx-light">Mar 15, 12:32pm</span>
                                    </div>
                                </a>
                                <a class="dropdown-item list-group-item" href="">
                                    <div class="d-flex justify-content-between">
                                        <div class="wd-40 ht-40 mg-r-10 d-flex align-items-center justify-content-center rounded card-icon-primary">
                                            <i data-feather="info" class="wd-20"></i>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h3 class="tx-11 mb-0 tx-dark">Document available</h3>
                                        <div class="tx-11 d-block text-truncate">New order has been received</div>
                                        <span class="tx-9 tx-light">Mar 15, 12:32pm</span>
                                    </div>
                                </a>
                                <div class="clearfix"></div>
                                <div class="notifications-date tx-uppercase tx-11 d-block tx-spacing-1">Yesterday, Mar 19</div>
                                <a class="dropdown-item list-group-item" href="">
                                    <div class="d-flex justify-content-between">
                                        <div class="wd-40 ht-40 mg-r-10 d-flex align-items-center justify-content-center rounded card-icon-success">
                                            <i data-feather="smile" class="wd-20"></i>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h3 class="tx-11 mb-0 tx-dark">System reboot</h3>
                                        <div class="tx-11 d-block text-truncate">System reboot has been successfully completed</div>
                                        <span class="tx-9 tx-light">Mar 15, 12:32pm</span>
                                    </div>
                                </a>
                                <a class="dropdown-item list-group-item" href="">
                                    <div class="d-flex justify-content-between">
                                        <div class="wd-40 ht-40 mg-r-10 d-flex align-items-center justify-content-center rounded card-icon-primary">
                                            <i data-feather="info" class="wd-20"></i>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h3 class="tx-11 mb-0 tx-dark">New order available</h3>
                                        <div class="tx-11 d-block text-truncate">New order has been received</div>
                                        <span class="tx-9 tx-light">Mar 15, 12:32pm</span>
                                    </div>
                                </a>
                                <a class="dropdown-item list-group-item" href="">
                                    <div class="d-flex justify-content-between">
                                        <div class="wd-40 ht-40 mg-r-10 d-flex align-items-center justify-content-center rounded card-icon-primary">
                                            <i data-feather="info" class="wd-20"></i>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h3 class="tx-11 mb-0 tx-dark">Document available</h3>
                                        <div class="tx-11 d-block text-truncate">New order has been received</div>
                                        <span class="tx-9 tx-light">Mar 15, 12:32pm</span>
                                    </div>
                                </a>
                                <a class="dropdown-item list-group-item" href="">
                                    <div class="d-flex justify-content-between">
                                        <div class="wd-40 ht-40 mg-r-10 d-flex align-items-center justify-content-center rounded card-icon-success">
                                            <i data-feather="smile" class="wd-20"></i>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h3 class="tx-11 mb-0 tx-dark">Your order is placed</h3>
                                        <div class="tx-11 d-block text-truncate">System reboot has been successfully completed</div>
                                        <span class="tx-9 tx-light">Mar 15, 12:32pm</span>
                                    </div>
                                </a>
                                <a class="dropdown-item list-group-item" href="">
                                    <div class="d-flex justify-content-between">
                                        <div class="wd-40 ht-40 mg-r-10 d-flex align-items-center justify-content-center rounded card-icon-warning">
                                            <i data-feather="bell" class="wd-20"></i>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h3 class="tx-11 mb-0 tx-dark">New user feedback</h3>
                                        <div class="tx-11 d-block text-truncate">New user feedback received</div>
                                        <span class="tx-9 tx-light">Mar 15, 12:32pm</span>
                                    </div>
                                </a>
                            </div>
                            <div class="notifications-footer d-flex justify-content-between align-items-center">
                                <a href="">View all Notifications</a>
                                <a href="" class="tooltip-primary" data-toggle="tooltip" data-placement="left" title="" data-original-title="Notifications Settings"><i data-feather="settings" class="wd-16 ht-16"></i></a>
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
                    <a href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="admin/assets/images/users-face/1.png" class="img-fluid wd-30 ht-30 rounded-circle" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-profile">
                        <div class="user-profile-area">
                            <div class="user-profile-heading">
                                <div class="profile-thumbnail">
                                    <img src="admin/assets/images/users-face/1.png" class="img-fluid wd-40 ht-40 rounded-circle" alt="">
                                </div>
                                <div class="profile-text">
                                    <h6>Ruhul Hasan</h6>
                                    <span class="tx-rubik">Balance: $1,425</span>
                                </div>
                            </div>
                            <a href="" class="dropdown-item d-flex align-items-center"><span data-feather="user" class="wd-16 ht-16 mr-2"></span>Profile</a>
                            <a href="" class="dropdown-item d-flex align-items-center"><span data-feather="message-square" class="wd-16 ht-16 mr-2"></span>Messages</a>
                            <div class="dropdown-divider"></div>
                            <a href="" class="dropdown-item d-flex align-items-center"><span data-feather="settings" class="wd-16 ht-16 mr-2"></span>Settings</a>
                            <a href="" class="dropdown-item d-flex align-items-center"><span data-feather="activity" class="wd-16 ht-16 mr-2"></span>Activity</a>
                            <a href="" class="dropdown-item d-flex align-items-center"><span data-feather="download" class="wd-16 ht-16 mr-2"></span>Download</a>
                            <div class="dropdown-divider"></div>
                            <a href="" class="dropdown-item d-flex align-items-center"><span data-feather="layout" class="wd-16 ht-16 mr-2"></span>Forum</a>
                            <a href="" class="dropdown-item d-flex align-items-center"><span data-feather="headphones" class="wd-16 ht-16 mr-2"></span>Support</a>
                            <a href="" class="dropdown-item d-flex align-items-center"><span data-feather="life-buoy" class="wd-16 ht-16 mr-2"></span>Help</a>
                            <a href="" class="dropdown-item d-flex align-items-center"><span data-feather="log-out" class="wd-16 ht-16 mr-2"></span>Sign Out</a>
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