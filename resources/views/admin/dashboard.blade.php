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
        @include('admin/include/head_all')
    </head>
    <body>
        <!--================================-->
        <!-- Page Container Start -->
        <!--================================-->
        <div class="page-container">

            <!-- Sidebar Start -->
            @include('admin/include/sidebar')
            <!-- End Sidebar Start -->


            <!-- Page Content Start -->
            <!--================================-->
            <div class="page-content">
                <!-- Navbar Start -->
                @include('admin/include/navbar')
                <!-- End Navbar Start -->



                <!-- Page Inner Start -->
                <!--================================-->
                <div class="page-inner">
                    <!--================================-->
                    <!-- Card Count Start -->
                    <!--================================-->
                    <div class="row row-xs">
                        <div class="col-md-6 col-xl-3">
                            <div class="card mg-b-20">
                                <div class="card-body">
                                    <div class="row no-gutters">
                                        <div class="col-8">
                                            <h2 class="tx-medium tx-13 tx-dark tx-spacing-1">Visits</h2>
                                            <h1 class="tx-uppercase tx-24 tx-dark tx-rubik">12.5K</h1>
                                            <p class="mb-0 tx-10">Up From Yesterday<span class="tx-success ml-2">(<span data-feather="arrow-up" class="wd-10 ht-10"></span>5.3%)</span></p>
                                        </div>
                                        <div class="col-4">
                                            <p class="data-attributes mb-0 tx-center">
                                                <span data-peity='{ "fill": ["#3355ff", "#EFF4F8"],   "innerRadius": 40, "radius": 43 }'>5/9</span>
                                            </p>
                                            <div class="pos-absolute a-0 d-flex flex-column align-items-center justify-content-center">
                                                <h3 class="tx-20 tx-rubik tx-spacing-1 mg-b-0">56%</h3>
                                                <span class="tx-8 tx-semibold tx-uppercase">New Visits</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card mg-b-20">
                                <div class="card-body">
                                    <div class="row no-gutters">
                                        <div class="col-8">
                                            <h2 class="tx-medium tx-13 tx-dark tx-spacing-1">Orders</h2>
                                            <h1 class="tx-uppercase tx-24 tx-dark tx-rubik">590</h1>
                                            <p class="mb-0 tx-10">Down From Yesterday<span class="tx-danger ml-2">(<span data-feather="arrow-down" class="wd-10 ht-10"></span>2.3%)</span></p>
                                        </div>
                                        <div class="col-4">
                                            <p class="data-attributes mb-0 tx-center">
                                                <span data-peity='{ "fill": ["#FF3D57", "#EFF4F8"],   "innerRadius": 40, "radius": 43 }'>5/6</span>
                                            </p>
                                            <div class="pos-absolute a-0 d-flex flex-column align-items-center justify-content-center">
                                                <h3 class="tx-20 tx-rubik tx-spacing-1 mg-b-0">76%</h3>
                                                <span class="tx-8 tx-semibold tx-uppercase">New Orders</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card mg-b-20">
                                <div class="card-body">
                                    <div class="row no-gutters">
                                        <div class="col-8">
                                            <h2 class="tx-medium tx-13 tx-dark tx-spacing-1">Sales</h2>
                                            <h1 class="tx-uppercase tx-24 tx-dark tx-rubik">2.2K</h1>
                                            <p class="mb-0 tx-10">Up From Yesterday<span class="tx-success ml-2">(<span data-feather="arrow-up" class="wd-10 ht-10"></span>6.5%)</span></p>
                                        </div>
                                        <div class="col-4">
                                            <p class="data-attributes mb-0 tx-center">
                                                <span data-peity='{ "fill": ["#22CCE2", "#EFF4F8"],   "innerRadius": 40, "radius": 43 }'>5/8</span>
                                            </p>
                                            <div class="pos-absolute a-0 d-flex flex-column align-items-center justify-content-center">
                                                <h3 class="tx-20 tx-rubik tx-spacing-1 mg-b-0">65%</h3>
                                                <span class="tx-8 tx-semibold tx-uppercase">New Sales</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card mg-b-20">
                                <div class="card-body">
                                    <div class="row no-gutters">
                                        <div class="col-8">
                                            <h2 class="tx-medium tx-13 tx-dark tx-spacing-1">Revenue</h2>
                                            <h1 class="tx-uppercase tx-24 tx-dark tx-rubik">$25.6K</h1>
                                            <p class="mb-0 tx-10">Up From Yesterday<span class="tx-success ml-2">(<span data-feather="arrow-up" class="wd-10 ht-10"></span>5.3%)</span></p>
                                        </div>
                                        <div class="col-4">
                                            <p class="data-attributes mb-0 tx-center">
                                                <span data-peity='{ "fill": ["#FDBF5E", "#EFF4F8"],   "innerRadius": 40, "radius": 43 }'>7/9</span>
                                            </p>
                                            <div class="pos-absolute a-0 d-flex flex-column align-items-center justify-content-center">
                                                <h3 class="tx-20 tx-rubik tx-spacing-1 mg-b-0">79%</h3>
                                                <span class="tx-8 tx-semibold tx-uppercase">Total Earn</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Card Count End --> 
                    <div class="row row-xs">
                        <!--================================-->
                        <!-- Sales Overview Start -->
                        <!--================================-->
                        <div class="col-lg-8">
                            <div class="card mg-b-20">
                                <div class="d-block d-md-flex justify-content-between align-items-center pd-15 bd-b">
                                    <h2 class="tx-13 tx-medium mb-0 tx-dark">Sales Overview</h2>
                                    <ul class="nav nav-fill custom-btn-group mg-t-10 mg-md-t-0" role="tablist">
                                        <li class="nav-item">
                                            <a class="tx-uppercase tx-center active show waves-effect" data-toggle="pill" href="#pills-1" role="tab" aria-selected="false">
                                                <h2 class="tx-12 tx-spacing-1 mb-0">Day</h2>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="tx-uppercase tx-12 waves-effect" data-toggle="pill" href="#pills-2" role="tab" aria-selected="true">
                                                <h2 class="tx-12 tx-spacing-1 mb-0">Week</h2>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="tx-uppercase tx-12 waves-effect" data-toggle="pill" href="#pills-3" role="tab" aria-selected="false">
                                                <h2 class="tx-12 tx-spacing-1 mb-0">Month</h2>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="pills-1" role="tabpanel" aria-labelledby="pills-1">
                                            <canvas id="dailySalesChart" height="122"></canvas>
                                        </div>
                                        <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2">
                                            <canvas id="weeklySalesChart" height="122"></canvas>
                                        </div>
                                        <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3">
                                            <canvas id="monthlySalesChart" height="122"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="pd-20 bd-t">
                                    <div class="row clearfix">
                                        <div class="col-6 col-sm bd-r bd-gray-200">
                                            <label class="tx-11 mb-0">Total Cost</label>
                                            <div class="d-flex align-items-baseline">
                                                <h5 class="tx-16 tx-sm-14 tx-md-16 mg-b-0 tx-rubik tx-dark tx-normal"><span>$</span>852.80</h5>
                                                <span class="tx-12 ml-1 tx-success"><i class="ti-arrow-up tx-8 tx-8"></i> 3.4%</span>
                                            </div>
                                        </div>
                                        <!-- col -->
                                        <div class="col-6 col-sm bd-r bd-gray-200">
                                            <label class="tx-11 mb-0">Impressions</label>
                                            <div class="d-flex align-items-baseline">
                                                <h5 class="tx-16 tx-sm-14 tx-md-16 mg-b-0 tx-rubik tx-dark tx-normal">2,145</h5>
                                                <span class="tx-12 ml-1 tx-success"><i class="ti-arrow-up tx-8 tx-8"></i> 0.4%</span>
                                            </div>
                                        </div>
                                        <!-- col -->
                                        <div class="col-6 col-sm mg-t-15 mg-sm-t-0 bd-r bd-gray-200">
                                            <label class="tx-11 mb-0">Total Clicks</label>
                                            <div class="d-flex align-items-baseline">
                                                <h5 class="tx-16 tx-sm-14 tx-md-16 mg-b-0 tx-rubik tx-dark tx-normal">2,485</h5>
                                                <span class="tx-12 ml-1 tx-danger"><i class="ti-arrow-down tx-8 tx-8"></i> 0.8%</span>
                                            </div>
                                        </div>
                                        <!-- col -->
                                        <div class="col-6 col-sm mg-t-15 mg-sm-t-0 bd-r bd-gray-200">
                                            <label class="tx-11 mb-0">Click-Through Rate</label>
                                            <div class="d-flex align-items-baseline">
                                                <h5 class="tx-16 tx-sm-14 tx-md-16 mg-b-0 tx-rubik tx-dark tx-normal">01.84%</h5>
                                                <span class="tx-12 ml-1 tx-danger"><i class="ti-arrow-down tx-8 tx-8"></i> 0.5%</span>
                                            </div>
                                        </div>
                                        <!-- col -->
                                        <div class="col-6 col-sm mg-t-15 mg-sm-t-0">
                                            <label class="tx-11 mb-0">Cost Per Click</label>
                                            <div class="d-flex align-items-baseline">
                                                <h5 class="tx-16 tx-sm-14 tx-md-16 mg-b-0 tx-rubik tx-dark tx-normal"><span>$</span>5.45</h5>
                                                <span class="tx-12 ml-1 tx-success"><i class="ti-arrow-up tx-8 tx-8"></i>0.5%</span>
                                            </div>
                                        </div>
                                        <!-- col -->
                                    </div>
                                    <!-- row -->
                                </div>
                            </div>
                        </div>
                        <!--/ Sales Overview End --> 
                        <!--================================-->
                        <!-- Total Profit Start -->
                        <!--================================-->
                        <div class="col-lg-4">
                            <div class="card mg-b-20">
                                <div class="card-header d-flex justify-content-between">
                                    <h2 class="tx-13 mb-0 tx-dark">Total Profit</h2>
                                    <div class="dropdown pd-l-15">
                                        <a href="" data-toggle="dropdown"><i data-feather="more-horizontal" class="wd-16 ht-16"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right settings-dropdown">
                                            <a href="" class="dropdown-item"><i data-feather="clock" class="wd-16 ht-16 mr-2"></i>Today</a>
                                            <a href="" class="dropdown-item"><i data-feather="clock" class="wd-16 ht-16 mr-2"></i>Yesterday</a>
                                            <a href="" class="dropdown-item"><i data-feather="clock" class="wd-16 ht-16 mr-2"></i>This Week</a>
                                            <a href="" class="dropdown-item"><i data-feather="clock" class="wd-16 ht-16 mr-2"></i>Last Week</a>
                                            <a href="" class="dropdown-item"><i data-feather="clock" class="wd-16 ht-16 mr-2"></i>This Month</a>
                                            <a href="" class="dropdown-item"><i data-feather="clock" class="wd-16 ht-16 mr-2"></i>Last Month</a>
                                            <a href="" class="dropdown-item"><i data-feather="clock" class="wd-16 ht-16 mr-2"></i>This Year</a>
                                            <a href="" class="dropdown-item"><i data-feather="clock" class="wd-16 ht-16 mr-2"></i>Last Year</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="totalProfitDount" height="250"></canvas>
                                </div>
                                <div class="card-footer pd-0 bd-t-0-force">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-bordered table-hover">
                                            <tr>
                                                <td><span class="wd-10 ht-10 bg-primary mr-2 d-inline-block rounded-circle"></span>Current</td>
                                                <td class="tx-rubik tx-normal">$5,253<span data-feather="arrow-up-circle" class="wd-12 ht-12 ml-2 tx-success"></span></td>
                                                <td class="tx-rubik tx-normal">67%</td>
                                            </tr>
                                            <tr>
                                                <td><span class="wd-10 ht-10 mr-2 d-inline-block rounded-circle" style="background:#e0e7fd"></span>Target</td>
                                                <td class="tx-rubik tx-normal">$8,510<span data-feather="arrow-up-circle" class="wd-12 ht-12 ml-2 tx-success"></span></td>
                                                <td class="tx-rubik tx-normal">22%</td>
                                            </tr>
                                            <tr>
                                                <td><span class="wd-10 ht-10 mr-2 d-inline-block rounded-circle" style="background:#4ac7ec"></span>Lost</td>
                                                <td class="tx-rubik tx-normal">$2,533<span data-feather="arrow-down-circle" class="wd-12 ht-12 ml-2 tx-danger"></span></td>
                                                <td class="tx-rubik tx-normal">11%</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Total Profit End --> 
                    </div>
                    <div class="row">
                        <!--================================-->
                        <!-- Mini Card Start -->
                        <!--================================-->
                        <div class="col-lg-6">
                            <div class="row row-xs">
                                <div class="col-md-6 col-lg-6">
                                    <div class="card mg-b-20">
                                        <div class="card-body tx-center pd-y-30">
                                            <div class="card-icon-primary wd-60 ht-60 d-flex align-items-center justify-content-center rounded-circle m-auto">
                                                <span data-feather="shopping-bag" class="wd-24 ht-24"></span>
                                            </div>
                                            <h2 class="tx-13 mg-t-20 mb-0">New Products</h2>
                                            <h1 class="tx-20 mg-t-10 tx-rubik tx-normal tx-dark mb-0">2.35K</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="card mg-b-20">
                                        <div class="card-body tx-center pd-y-30">
                                            <div class="card-icon-success wd-60 ht-60 d-flex align-items-center justify-content-center rounded-circle m-auto">
                                                <span data-feather="users" class="wd-24 ht-24"></span>
                                            </div>
                                            <h2 class="tx-13 mg-t-20 mb-0">New Users</h2>
                                            <h1 class="tx-20 mg-t-10 tx-rubik tx-normal tx-dark mb-0">5.23K</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="card mg-b-20">
                                        <div class="card-body tx-center pd-y-30">
                                            <div class="card-icon-danger wd-60 ht-60 d-flex align-items-center justify-content-center rounded-circle m-auto">
                                                <span data-feather="credit-card" class="wd-24 ht-24"></span>
                                            </div>
                                            <h2 class="tx-13 mg-t-20 mb-0">Gross Earnings</h2>
                                            <h1 class="tx-20 mg-t-10 tx-rubik tx-normal tx-dark mb-0">22.84K</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="card mg-b-20">
                                        <div class="card-body tx-center pd-y-30">
                                            <div class="card-icon-teal wd-60 ht-60 d-flex align-items-center justify-content-center rounded-circle m-auto">
                                                <span data-feather="briefcase" class="wd-24 ht-24"></span>
                                            </div>
                                            <h2 class="tx-13 mg-t-20 mb-0">Net Earnings</h2>
                                            <h1 class="tx-20 mg-t-10 tx-rubik tx-normal tx-dark mb-0">52.43K</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Mini Card End --> 
                        <!--================================-->
                        <!-- Revenue by country Start -->
                        <!--================================-->
                        <div class="col-lg-6 revenue-country">
                            <div class="card mg-b-20">
                                <div class="d-block d-md-flex justify-content-between align-items-center pd-15 bd-b">
                                    <h2 class="tx-13 tx-medium mb-0 tx-dark">Revenue by country</h2>
                                    <ul class="nav nav-fill custom-btn-group mg-t-10 mg-md-t-0" role="tablist">
                                        <li class="nav-item">
                                            <a class="tx-uppercase tx-center active show waves-effect" data-toggle="pill" href="#revenue-1" role="tab" aria-selected="false">
                                                <h2 class="tx-12 tx-spacing-1 mb-0">Day</h2>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="tx-uppercase tx-12 waves-effect" data-toggle="pill" href="#revenue-2" role="tab" aria-selected="true">
                                                <h2 class="tx-12 tx-spacing-1 mb-0">Week</h2>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="tx-uppercase tx-12 waves-effect" data-toggle="pill" href="#revenue-3" role="tab" aria-selected="false">
                                                <h2 class="tx-12 tx-spacing-1 mb-0">Month</h2>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="revenue-1" role="tabpanel" aria-labelledby="pills-1">
                                            <h2 class="tx-13 ">Daily Revenue</h2>
                                            <h1 class="tx-24 tx-dark tx-normal tx-rubik">$20,536</h1>
                                            <div class="mg-y-20">
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 35%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">$5,965</div>
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">$3,527</div>
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">$2,245</div>
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 15%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">$2,125</div>
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">$2,523</div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table mb-0 table-bordered table-hover">
                                                    <tr>
                                                        <td><span class="wd-10 ht-10 bg-warning mr-2 d-inline-block rounded-circle"></span>United Kingdom</td>
                                                        <td class="tx-rubik tx-normal">$2,245<span data-feather="arrow-down-circle" class="wd-12 ht-12 ml-2 tx-danger"></span></td>
                                                        <td class="tx-rubik tx-light">20%</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="wd-10 ht-10 bg-danger mr-2 d-inline-block rounded-circle"></span>Australia</td>
                                                        <td class="tx-rubik tx-normal">$3,527<span data-feather="arrow-up-circle" class="wd-12 ht-12 ml-2 tx-success"></span></td>
                                                        <td class="tx-rubik tx-light">20%</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="wd-10 ht-10 bg-primary mr-2 d-inline-block rounded-circle"></span>United State</td>
                                                        <td class="tx-rubik tx-normal">$5,965<span data-feather="arrow-up-circle" class="wd-12 ht-12 ml-2 tx-success"></span></td>
                                                        <td class="tx-rubik tx-light">35%</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="wd-10 ht-10 bg-info mr-2 d-inline-block rounded-circle"></span>Germany</td>
                                                        <td class="tx-rubik tx-normal">$2,125<span data-feather="arrow-up-circle" class="wd-12 ht-12 ml-2 tx-success"></span></td>
                                                        <td class="tx-rubik tx-light">15%</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="wd-10 ht-10 bg-success mr-2 d-inline-block rounded-circle"></span>Russia</td>
                                                        <td class="tx-rubik tx-normal">$2,533<span data-feather="arrow-down-circle" class="wd-12 ht-12 ml-2 tx-danger"></span></td>
                                                        <td class="tx-rubik tx-light">20%</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="revenue-2" role="tabpanel" aria-labelledby="pills-2">
                                            <h2 class="tx-13 ">Weekly Revenue</h2>
                                            <h1 class="tx-24 tx-dark tx-normal tx-rubik">$50,269</h1>
                                            <div class="mg-y-20">
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">$25,965</div>
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">$23,527</div>
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">$12,245</div>
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">$22,125</div>
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 10%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">$22,523</div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table mb-0 table-bordered table-hover">
                                                    <tr>
                                                        <td><span class="wd-10 ht-10 bg-success mr-2 d-inline-block rounded-circle"></span>Russia</td>
                                                        <td class="tx-rubik tx-normal">$22,523<span data-feather="arrow-down-circle" class="wd-12 ht-12 ml-2 tx-danger"></span></td>
                                                        <td class="tx-rubik tx-light">10%</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="wd-10 ht-10 bg-primary mr-2 d-inline-block rounded-circle"></span>United State</td>
                                                        <td class="tx-rubik tx-normal">$25,965<span data-feather="arrow-up-circle" class="wd-12 ht-12 ml-2 tx-success"></span></td>
                                                        <td class="tx-rubik tx-light">45%</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="wd-10 ht-10 bg-warning mr-2 d-inline-block rounded-circle"></span>United Kingdom</td>
                                                        <td class="tx-rubik tx-normal">$12,245<span data-feather="arrow-down-circle" class="wd-12 ht-12 ml-2 tx-danger"></span></td>
                                                        <td class="tx-rubik tx-light">20%</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="wd-10 ht-10 bg-info mr-2 d-inline-block rounded-circle"></span>Germany</td>
                                                        <td class="tx-rubik tx-normal">$22,125<span data-feather="arrow-up-circle" class="wd-12 ht-12 ml-2 tx-success"></span></td>
                                                        <td class="tx-rubik tx-light">25%</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="wd-10 ht-10 bg-danger mr-2 d-inline-block rounded-circle"></span>Australia</td>
                                                        <td class="tx-rubik tx-normal">$23,527<span data-feather="arrow-up-circle" class="wd-12 ht-12 ml-2 tx-success"></span></td>
                                                        <td class="tx-rubik tx-light">15%</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="revenue-3" role="tabpanel" aria-labelledby="pills-3">
                                            <h2 class="tx-13 ">Monthly Revenue</h2>
                                            <h1 class="tx-24 tx-dark tx-normal tx-rubik">$250,269</h1>
                                            <div class="mg-y-20">
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">$25,965</div>
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">$23,527</div>
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">$12,245</div>
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">$22,125</div>
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 10%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">$22,523</div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table mb-0 table-bordered table-hover">
                                                    <tr>
                                                        <td><span class="wd-10 ht-10 bg-primary mr-2 d-inline-block rounded-circle"></span>United State</td>
                                                        <td class="tx-rubik tx-normal">$50,965<span data-feather="arrow-up-circle" class="wd-12 ht-12 ml-2 tx-success"></span></td>
                                                        <td class="tx-rubik tx-light">40%</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="wd-10 ht-10 bg-danger mr-2 d-inline-block rounded-circle"></span>Australia</td>
                                                        <td class="tx-rubik tx-normal">$30,527<span data-feather="arrow-up-circle" class="wd-12 ht-12 ml-2 tx-success"></span></td>
                                                        <td class="tx-rubik tx-light">15%</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="wd-10 ht-10 bg-warning mr-2 d-inline-block rounded-circle"></span>United Kingdom</td>
                                                        <td class="tx-rubik tx-normal">$20,245<span data-feather="arrow-down-circle" class="wd-12 ht-12 ml-2 tx-danger"></span></td>
                                                        <td class="tx-rubik tx-light">20%</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="wd-10 ht-10 bg-info mr-2 d-inline-block rounded-circle"></span>Germany</td>
                                                        <td class="tx-rubik tx-normal">$20,125<span data-feather="arrow-up-circle" class="wd-12 ht-12 ml-2 tx-success"></span></td>
                                                        <td class="tx-rubik tx-light">25%</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="wd-10 ht-10 bg-success mr-2 d-inline-block rounded-circle"></span>Russia</td>
                                                        <td class="tx-rubik tx-normal">$20,523<span data-feather="arrow-down-circle" class="wd-12 ht-12 ml-2 tx-danger"></span></td>
                                                        <td class="tx-rubik tx-light">10%</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Revenue by country End --> 
                    </div>
                    <div class="row row-xs">
                        <!--================================-->
                        <!-- Products Status Start -->
                        <!--================================-->
                        <div class="col-xl-8">
                            <div class="card mg-b-20">
                                <div class="d-block d-md-flex justify-content-between align-items-center pd-15 bd-b">
                                    <h2 class="tx-13 tx-medium mb-0 tx-dark">Products Status</h2>
                                    <ul class="nav nav-fill d-block d-md-flex  custom-btn-group mg-t-10 mg-md-t-0" role="tablist">
                                        <li class="nav-item">
                                            <a class="tx-uppercase tx-center active show waves-effect" data-toggle="pill" href="#latestProducts" role="tab" aria-selected="false">
                                                <h2 class="tx-12 tx-spacing-1 mb-0">Latest Products</h2>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="tx-uppercase tx-12 waves-effect" data-toggle="pill" href="#featureProducts" role="tab" aria-selected="true">
                                                <h2 class="tx-12 tx-spacing-1 mb-0">Feature Products</h2>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="tx-uppercase tx-12 waves-effect" data-toggle="pill" href="#topSellingProducts" role="tab" aria-selected="false">
                                                <h2 class="tx-12 tx-spacing-1 mb-0">Top Selling Products</h2>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="latestProducts" role="tabpanel" aria-labelledby="latestProducts">
                                        <div class="card-body"  id="productScrollBar">
                                            <div class="row bd mg-x-0 mg-b-20 box-shadow">
                                                <div class="col-md-3 col-lg-3 tx-center">
                                                    <img src="admin/assets/images/products/img-7.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="col-md-6 col-lg-6 pd-15 bd-l">
                                                    <a href="" class="tx-13 tx-medium">Cosco Footboll size-04</a>
                                                    <div>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <a href="#" class=" small">(20 Reviews)</a>
                                                    </div>
                                                    <p class="tx-11 pd-t-15">Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type specimen book text of the dummy text of and typesetting...</p>
                                                    <div class="d-inline-block">
                                                        <p class="tx-12 mb-1">Status: <span class="badge badge-primary">Stock</span></p>
                                                        <ul class="list-inline mb-1">
                                                            <li class="list-inline-item align-middle">Color: </li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-success"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-danger"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-info"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-dark"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-warning"></i></li>
                                                        </ul>
                                                        <p class="tx-12 mb-1">Category: <a href="">Sports</a></p>
                                                        <p class="tx-12 mb-1">Author: <a href="">Willbert Steele</a></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-3 pd-0 tx-center bd-l d-flex align-items-center justify-content-center">
                                                    <div class="wd-100p mg-y-20">
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark mt-3">$220</p>
                                                        <p class="tx-11 tx-medium">Price</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark">2250</p>
                                                        <p class="tx-11 tx-medium">Sales</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <a href="" class="btn btn-outline-brand waves-effect mr-1"><i data-feather="shopping-cart" class="wd-12 ht-12 mr-1"></i>Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row bd mg-x-0 mg-b-20 box-shadow">
                                                <div class="col-md-3 col-lg-3 tx-center">
                                                    <img src="admin/assets/images/products/img-3.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="col-md-6 col-lg-6 pd-15 bd-l">
                                                    <a href="" class="tx-13 tx-medium">Headphone F2020</a>
                                                    <div>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <a href="#" class=" small">(20 Reviews)</a>
                                                    </div>
                                                    <p class="tx-11 pd-t-15">Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type specimen book text of the dummy text of and typesetting...</p>
                                                    <div class="d-inline-block">
                                                        <p class="tx-12 mb-1">Status: <span class="badge badge-danger">Sold</span></p>
                                                        <ul class="list-inline mb-1">
                                                            <li class="list-inline-item align-middle">Color: </li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-success"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-danger"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-info"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-dark"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-warning"></i></li>
                                                        </ul>
                                                        <p class="tx-12 mb-1">Category: <a href="">Sports</a></p>
                                                        <p class="tx-12 mb-1">Author: <a href="">Willbert Steele</a></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-3 pd-0 tx-center bd-l d-flex align-items-center justify-content-center">
                                                    <div class="wd-100p mg-y-20">
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark mt-3">$49</p>
                                                        <p class="tx-11 tx-medium">Price</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark">3254</p>
                                                        <p class="tx-11 tx-medium">Sales</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <a href="" class="btn btn-outline-brand waves-effect mr-1"><i data-feather="shopping-cart" class="wd-12 ht-12 mr-1"></i>Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row bd mg-x-0 mg-b-20 box-shadow">
                                                <div class="col-md-3 col-lg-3 tx-center">
                                                    <img src="admin/assets/images/products/img-2.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="col-md-6 col-lg-6 pd-15 bd-l">
                                                    <a href="" class="tx-13 tx-medium">Apple Watch Series 3</a>
                                                    <div>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <a href="#" class=" small">(20 Reviews)</a>
                                                    </div>
                                                    <p class="tx-11 pd-t-15">Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type specimen book text of the dummy text of and typesetting...</p>
                                                    <div class="d-inline-block">
                                                        <p class="tx-12 mb-1">Status: <span class="badge badge-primary">Stock</span></p>
                                                        <ul class="list-inline mb-1">
                                                            <li class="list-inline-item align-middle">Color: </li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-success"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-danger"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-info"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-dark"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-warning"></i></li>
                                                        </ul>
                                                        <p class="tx-12 mb-1">Category: <a href="">Sports</a></p>
                                                        <p class="tx-12 mb-1">Author: <a href="">Willbert Steele</a></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-3 pd-0 tx-center bd-l d-flex align-items-center justify-content-center">
                                                    <div class="wd-100p mg-y-20">
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark mt-3">$352</p>
                                                        <p class="tx-11 tx-medium">Price</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark">2634</p>
                                                        <p class="tx-11 tx-medium">Sales</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <a href="" class="btn btn-outline-brand waves-effect mr-1"><i data-feather="shopping-cart" class="wd-12 ht-12 mr-1"></i>Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row bd mg-x-0 mg-b-20 box-shadow">
                                                <div class="col-md-3 col-lg-3 tx-center">
                                                    <img src="admin/assets/images/products/img-1.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="col-md-6 col-lg-6 pd-15 bd-l">
                                                    <a href="" class="tx-13 tx-medium">Unique Bag (Gray)</a>
                                                    <div>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <a href="#" class=" small">(20 Reviews)</a>
                                                    </div>
                                                    <p class="tx-11 pd-t-15">Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type specimen book text of the dummy text of and typesetting...</p>
                                                    <div class="d-inline-block">
                                                        <p class="tx-12 mb-1">Status: <span class="badge badge-primary">Stock</span></p>
                                                        <ul class="list-inline mb-1">
                                                            <li class="list-inline-item align-middle">Color: </li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-success"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-danger"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-info"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-dark"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-warning"></i></li>
                                                        </ul>
                                                        <p class="tx-12 mb-1">Category: <a href="">Sports</a></p>
                                                        <p class="tx-12 mb-1">Author: <a href="">Willbert Steele</a></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-3 pd-0 tx-center bd-l d-flex align-items-center justify-content-center">
                                                    <div class="wd-100p mg-y-20">
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark mt-3">$230</p>
                                                        <p class="tx-11 tx-medium">Price</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark">3245</p>
                                                        <p class="tx-11 tx-medium">Sales</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <a href="" class="btn btn-outline-brand waves-effect mr-1"><i data-feather="shopping-cart" class="wd-12 ht-12 mr-1"></i>Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mg-x-0 bd box-shadow">
                                                <div class="col-md-3 col-lg-3 tx-center">
                                                    <img src="admin/assets/images/products/img-4.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="col-md-6 col-lg-6 pd-15 bd-l">
                                                    <a href="" class="tx-13 tx-medium">Lavie Purse CN120</a>
                                                    <div>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <a href="#" class=" small">(20 Reviews)</a>
                                                    </div>
                                                    <p class="tx-11 pd-t-15">Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type specimen book text of the dummy text of and typesetting...</p>
                                                    <div class="d-inline-block">
                                                        <p class="tx-12 mb-1">Status: <span class="badge badge-primary">Stock</span></p>
                                                        <ul class="list-inline mb-1">
                                                            <li class="list-inline-item align-middle">Color: </li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-success"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-danger"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-info"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-dark"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-warning"></i></li>
                                                        </ul>
                                                        <p class="tx-12 mb-1">Category: <a href="">Sports</a></p>
                                                        <p class="tx-12 mb-1">Author: <a href="">Willbert Steele</a></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-3 pd-0 tx-center bd-l d-flex align-items-center justify-content-center">
                                                    <div class="wd-100p mg-y-20">
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark mt-3">$326</p>
                                                        <p class="tx-11 tx-medium">Price</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark">2351</p>
                                                        <p class="tx-11 tx-medium">Sales</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <a href="" class="btn btn-outline-brand waves-effect mr-1"><i data-feather="shopping-cart" class="wd-12 ht-12 mr-1"></i>Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer tx-center mg-t-5">
                                            <a href="" class="tx-12">All Latest Products</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="featureProducts" role="tabpanel" aria-labelledby="featureProducts">
                                        <div class="card-body"  id="featureProductsScrollBar">
                                            <div class="row bd mg-x-0 mg-b-20 box-shadow">
                                                <div class="col-md-3 col-lg-3 tx-center">
                                                    <img src="admin/assets/images/products/img-2.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="col-md-6 col-lg-6 pd-15 bd-l">
                                                    <a href="" class="tx-13 tx-medium">Apple Watch Series 3</a>
                                                    <div>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <a href="#" class=" small">(20 Reviews)</a>
                                                    </div>
                                                    <p class="tx-11 pd-t-15">Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type specimen book text of the dummy text of and typesetting...</p>
                                                    <div class="d-inline-block">
                                                        <p class="tx-12 mb-1">Status: <span class="badge badge-primary">Stock</span></p>
                                                        <ul class="list-inline mb-1">
                                                            <li class="list-inline-item align-middle">Color: </li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-success"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-danger"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-info"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-dark"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-warning"></i></li>
                                                        </ul>
                                                        <p class="tx-12 mb-1">Category: <a href="">Sports</a></p>
                                                        <p class="tx-12 mb-1">Author: <a href="">Willbert Steele</a></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-3 pd-0 tx-center bd-l d-flex align-items-center justify-content-center">
                                                    <div class="wd-100p mg-y-20">
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark mt-3">$352</p>
                                                        <p class="tx-11 tx-medium">Price</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark">2634</p>
                                                        <p class="tx-11 tx-medium">Sales</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <a href="" class="btn btn-outline-brand waves-effect mr-1"><i data-feather="shopping-cart" class="wd-12 ht-12 mr-1"></i>Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row bd mg-x-0 mg-b-20 box-shadow">
                                                <div class="col-md-3 col-lg-3 tx-center">
                                                    <img src="admin/assets/images/products/img-7.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="col-md-6 col-lg-6 pd-15 bd-l">
                                                    <a href="" class="tx-13 tx-medium">Cosco Footboll size-04</a>
                                                    <div>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <a href="#" class=" small">(20 Reviews)</a>
                                                    </div>
                                                    <p class="tx-11 pd-t-15">Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type specimen book text of the dummy text of and typesetting...</p>
                                                    <div class="d-inline-block">
                                                        <p class="tx-12 mb-1">Status: <span class="badge badge-primary">Stock</span></p>
                                                        <ul class="list-inline mb-1">
                                                            <li class="list-inline-item align-middle">Color: </li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-success"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-danger"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-info"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-dark"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-warning"></i></li>
                                                        </ul>
                                                        <p class="tx-12 mb-1">Category: <a href="">Sports</a></p>
                                                        <p class="tx-12 mb-1">Author: <a href="">Willbert Steele</a></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-3 pd-0 tx-center bd-l d-flex align-items-center justify-content-center">
                                                    <div class="wd-100p mg-y-20">
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark mt-3">$220</p>
                                                        <p class="tx-11 tx-medium">Price</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark">2250</p>
                                                        <p class="tx-11 tx-medium">Sales</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <a href="" class="btn btn-outline-brand waves-effect mr-1"><i data-feather="shopping-cart" class="wd-12 ht-12 mr-1"></i>Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row bd mg-x-0 mg-b-20 box-shadow">
                                                <div class="col-md-3 col-lg-3 tx-center">
                                                    <img src="admin/assets/images/products/img-1.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="col-md-6 col-lg-6 pd-15 bd-l">
                                                    <a href="" class="tx-13 tx-medium">Unique Bag (Gray)</a>
                                                    <div>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <a href="#" class=" small">(20 Reviews)</a>
                                                    </div>
                                                    <p class="tx-11 pd-t-15">Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type specimen book text of the dummy text of and typesetting...</p>
                                                    <div class="d-inline-block">
                                                        <p class="tx-12 mb-1">Status: <span class="badge badge-primary">Stock</span></p>
                                                        <ul class="list-inline mb-1">
                                                            <li class="list-inline-item align-middle">Color: </li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-success"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-danger"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-info"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-dark"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-warning"></i></li>
                                                        </ul>
                                                        <p class="tx-12 mb-1">Category: <a href="">Sports</a></p>
                                                        <p class="tx-12 mb-1">Author: <a href="">Willbert Steele</a></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-3 pd-0 tx-center bd-l d-flex align-items-center justify-content-center">
                                                    <div class="wd-100p mg-y-20">
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark mt-3">$230</p>
                                                        <p class="tx-11 tx-medium">Price</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark">3245</p>
                                                        <p class="tx-11 tx-medium">Sales</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <a href="" class="btn btn-outline-brand waves-effect mr-1"><i data-feather="shopping-cart" class="wd-12 ht-12 mr-1"></i>Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row bd mg-x-0 mg-b-20 box-shadow">
                                                <div class="col-md-3 col-lg-3 tx-center">
                                                    <img src="admin/assets/images/products/img-3.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="col-md-6 col-lg-6 pd-15 bd-l">
                                                    <a href="" class="tx-13 tx-medium">Headphone F2020</a>
                                                    <div>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <a href="#" class=" small">(20 Reviews)</a>
                                                    </div>
                                                    <p class="tx-11 pd-t-15">Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type specimen book text of the dummy text of and typesetting...</p>
                                                    <div class="d-inline-block">
                                                        <p class="tx-12 mb-1">Status: <span class="badge badge-danger">Sold</span></p>
                                                        <ul class="list-inline mb-1">
                                                            <li class="list-inline-item align-middle">Color: </li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-success"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-danger"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-info"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-dark"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-warning"></i></li>
                                                        </ul>
                                                        <p class="tx-12 mb-1">Category: <a href="">Sports</a></p>
                                                        <p class="tx-12 mb-1">Author: <a href="">Willbert Steele</a></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-3 pd-0 tx-center bd-l d-flex align-items-center justify-content-center">
                                                    <div class="wd-100p mg-y-20">
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark mt-3">$49</p>
                                                        <p class="tx-11 tx-medium">Price</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark">3254</p>
                                                        <p class="tx-11 tx-medium">Sales</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <a href="" class="btn btn-outline-brand waves-effect mr-1"><i data-feather="shopping-cart" class="wd-12 ht-12 mr-1"></i>Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mg-x-0 bd box-shadow">
                                                <div class="col-md-3 col-lg-3 tx-center">
                                                    <img src="admin/assets/images/products/img-4.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="col-md-6 col-lg-6 pd-15 bd-l">
                                                    <a href="" class="tx-13 tx-medium">Lavie Purse CN120</a>
                                                    <div>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <a href="#" class=" small">(20 Reviews)</a>
                                                    </div>
                                                    <p class="tx-11 pd-t-15">Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type specimen book text of the dummy text of and typesetting...</p>
                                                    <div class="d-inline-block">
                                                        <p class="tx-12 mb-1">Status: <span class="badge badge-primary">Stock</span></p>
                                                        <ul class="list-inline mb-1">
                                                            <li class="list-inline-item align-middle">Color: </li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-success"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-danger"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-info"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-dark"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-warning"></i></li>
                                                        </ul>
                                                        <p class="tx-12 mb-1">Category: <a href="">Sports</a></p>
                                                        <p class="tx-12 mb-1">Author: <a href="">Willbert Steele</a></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-3 pd-0 tx-center bd-l d-flex align-items-center justify-content-center">
                                                    <div class="wd-100p mg-y-20">
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark mt-3">$326</p>
                                                        <p class="tx-11 tx-medium">Price</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark">2351</p>
                                                        <p class="tx-11 tx-medium">Sales</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <a href="" class="btn btn-outline-brand waves-effect mr-1"><i data-feather="shopping-cart" class="wd-12 ht-12 mr-1"></i>Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer tx-center mg-t-5">
                                            <a href="" class="tx-12">All Feature Products</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="topSellingProducts" role="tabpanel" aria-labelledby="topSellingProducts">
                                        <div class="card-body"  id="topSellingProductsScrollBar">
                                            <div class="row bd mg-x-0 mg-b-20 box-shadow">
                                                <div class="col-md-3 col-lg-3 tx-center">
                                                    <img src="admin/assets/images/products/img-3.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="col-md-6 col-lg-6 pd-15 bd-l">
                                                    <a href="" class="tx-13 tx-medium">Headphone F2020</a>
                                                    <div>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <a href="#" class=" small">(20 Reviews)</a>
                                                    </div>
                                                    <p class="tx-11 pd-t-15">Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type specimen book text of the dummy text of and typesetting...</p>
                                                    <div class="d-inline-block">
                                                        <p class="tx-12 mb-1">Status: <span class="badge badge-danger">Sold</span></p>
                                                        <ul class="list-inline mb-1">
                                                            <li class="list-inline-item align-middle">Color: </li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-success"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-danger"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-info"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-dark"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-warning"></i></li>
                                                        </ul>
                                                        <p class="tx-12 mb-1">Category: <a href="">Sports</a></p>
                                                        <p class="tx-12 mb-1">Author: <a href="">Willbert Steele</a></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-3 pd-0 tx-center bd-l d-flex align-items-center justify-content-center">
                                                    <div class="wd-100p mg-y-20">
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark mt-3">$49</p>
                                                        <p class="tx-11 tx-medium">Price</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark">3254</p>
                                                        <p class="tx-11 tx-medium">Sales</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <a href="" class="btn btn-outline-brand waves-effect mr-1"><i data-feather="shopping-cart" class="wd-12 ht-12 mr-1"></i>Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row bd mg-x-0 mg-b-20 box-shadow">
                                                <div class="col-md-3 col-lg-3 tx-center">
                                                    <img src="admin/assets/images/products/img-7.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="col-md-6 col-lg-6 pd-15 bd-l">
                                                    <a href="" class="tx-13 tx-medium">Cosco Footboll size-04</a>
                                                    <div>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <a href="#" class=" small">(20 Reviews)</a>
                                                    </div>
                                                    <p class="tx-11 pd-t-15">Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type specimen book text of the dummy text of and typesetting...</p>
                                                    <div class="d-inline-block">
                                                        <p class="tx-12 mb-1">Status: <span class="badge badge-primary">Stock</span></p>
                                                        <ul class="list-inline mb-1">
                                                            <li class="list-inline-item align-middle">Color: </li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-success"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-danger"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-info"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-dark"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-warning"></i></li>
                                                        </ul>
                                                        <p class="tx-12 mb-1">Category: <a href="">Sports</a></p>
                                                        <p class="tx-12 mb-1">Author: <a href="">Willbert Steele</a></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-3 pd-0 tx-center bd-l d-flex align-items-center justify-content-center">
                                                    <div class="wd-100p mg-y-20">
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark mt-3">$220</p>
                                                        <p class="tx-11 tx-medium">Price</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark">2250</p>
                                                        <p class="tx-11 tx-medium">Sales</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <a href="" class="btn btn-outline-brand waves-effect mr-1"><i data-feather="shopping-cart" class="wd-12 ht-12 mr-1"></i>Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row bd mg-x-0 mg-b-20 box-shadow">
                                                <div class="col-md-3 col-lg-3 tx-center">
                                                    <img src="admin/assets/images/products/img-1.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="col-md-6 col-lg-6 pd-15 bd-l">
                                                    <a href="" class="tx-13 tx-medium">Unique Bag (Gray)</a>
                                                    <div>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <a href="#" class=" small">(20 Reviews)</a>
                                                    </div>
                                                    <p class="tx-11 pd-t-15">Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type specimen book text of the dummy text of and typesetting...</p>
                                                    <div class="d-inline-block">
                                                        <p class="tx-12 mb-1">Status: <span class="badge badge-primary">Stock</span></p>
                                                        <ul class="list-inline mb-1">
                                                            <li class="list-inline-item align-middle">Color: </li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-success"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-danger"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-info"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-dark"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-warning"></i></li>
                                                        </ul>
                                                        <p class="tx-12 mb-1">Category: <a href="">Sports</a></p>
                                                        <p class="tx-12 mb-1">Author: <a href="">Willbert Steele</a></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-3 pd-0 tx-center bd-l d-flex align-items-center justify-content-center">
                                                    <div class="wd-100p mg-y-20">
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark mt-3">$230</p>
                                                        <p class="tx-11 tx-medium">Price</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark">3245</p>
                                                        <p class="tx-11 tx-medium">Sales</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <a href="" class="btn btn-outline-brand waves-effect mr-1"><i data-feather="shopping-cart" class="wd-12 ht-12 mr-1"></i>Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row bd mg-x-0 mg-b-20 box-shadow">
                                                <div class="col-md-3 col-lg-3 tx-center">
                                                    <img src="admin/assets/images/products/img-2.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="col-md-6 col-lg-6 pd-15 bd-l">
                                                    <a href="" class="tx-13 tx-medium">Apple Watch Series 3</a>
                                                    <div>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <a href="#" class=" small">(20 Reviews)</a>
                                                    </div>
                                                    <p class="tx-11 pd-t-15">Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type specimen book text of the dummy text of and typesetting...</p>
                                                    <div class="d-inline-block">
                                                        <p class="tx-12 mb-1">Status: <span class="badge badge-primary">Stock</span></p>
                                                        <ul class="list-inline mb-1">
                                                            <li class="list-inline-item align-middle">Color: </li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-success"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-danger"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-info"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-dark"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-warning"></i></li>
                                                        </ul>
                                                        <p class="tx-12 mb-1">Category: <a href="">Sports</a></p>
                                                        <p class="tx-12 mb-1">Author: <a href="">Willbert Steele</a></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-3 pd-0 tx-center bd-l d-flex align-items-center justify-content-center">
                                                    <div class="wd-100p mg-y-20">
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark mt-3">$352</p>
                                                        <p class="tx-11 tx-medium">Price</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark">2634</p>
                                                        <p class="tx-11 tx-medium">Sales</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <a href="" class="btn btn-outline-brand waves-effect mr-1"><i data-feather="shopping-cart" class="wd-12 ht-12 mr-1"></i>Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mg-x-0 bd box-shadow">
                                                <div class="col-md-3 col-lg-3 tx-center">
                                                    <img src="admin/assets/images/products/img-4.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="col-md-6 col-lg-6 pd-15 bd-l">
                                                    <a href="" class="tx-13 tx-medium">Lavie Purse CN120</a>
                                                    <div>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <a href="#" class=" small">(20 Reviews)</a>
                                                    </div>
                                                    <p class="tx-11 pd-t-15">Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type specimen book text of the dummy text of and typesetting...</p>
                                                    <div class="d-inline-block">
                                                        <p class="tx-12 mb-1">Status: <span class="badge badge-primary">Stock</span></p>
                                                        <ul class="list-inline mb-1">
                                                            <li class="list-inline-item align-middle">Color: </li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-success"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-danger"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-info"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-dark"></i></li>
                                                            <li class="list-inline-item align-middle"><i class="fa fa-circle text-warning"></i></li>
                                                        </ul>
                                                        <p class="tx-12 mb-1">Category: <a href="">Sports</a></p>
                                                        <p class="tx-12 mb-1">Author: <a href="">Willbert Steele</a></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-3 pd-0 tx-center bd-l d-flex align-items-center justify-content-center">
                                                    <div class="wd-100p mg-y-20">
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark mt-3">$326</p>
                                                        <p class="tx-11 tx-medium">Price</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <p class="tx-16 mb-0 tx-rubik tx-dark">2351</p>
                                                        <p class="tx-11 tx-medium">Sales</p>
                                                        <div class="bd-t mb-3"></div>
                                                        <a href="" class="btn btn-outline-brand waves-effect mr-1"><i data-feather="shopping-cart" class="wd-12 ht-12 mr-1"></i>Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer tx-center mg-t-5">
                                            <a href="" class="tx-12">All Top Selling Products</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Products Status End --> 
                        <!--================================-->
                        <!-- Reviews Start -->
                        <!--================================-->
                        <div class="col-md-6 col-lg-6 col-xl-4">
                            <div class="card mg-b-20" id="reviewScroll">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h6 class="tx-13 mb-0 tx-dark">Reviews</h6>
                                    <div class="card-header-btn">
                                        <div class="dropdown">
                                            <a href="" class="" data-toggle="dropdown"><i data-feather="more-horizontal" class="wd-16  ht-16"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="" class="dropdown-item"><i data-feather="info" class="wd-16 ht-16 mr-2"></i>View Details</a>
                                                <a href="" class="dropdown-item"><i data-feather="share" class="wd-16 ht-16 mr-2"></i>Share</a>
                                                <a href="" class="dropdown-item"><i data-feather="download" class="wd-16 ht-16 mr-2"></i>Download</a>
                                                <a href="" class="dropdown-item"><i data-feather="copy" class="wd-16 ht-16 mr-2"></i>Copy to</a>
                                                <a href="" class="dropdown-item"><i data-feather="folder" class="wd-16 ht-16 mr-2"></i>Move to</a>
                                                <a href="" class="dropdown-item"><i data-feather="edit" class="wd-16 ht-16 mr-2"></i>Rename</a>
                                                <a href="" class="dropdown-item"><i data-feather="trash" class="wd-16 ht-16 mr-2"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pd-0" id="reviewScrollBar">
                                    <div class="bd-b pd-15">
                                        <div class="ft-left mr-3">
                                            <img src="admin/assets/images/users-face/1.png" class="wd-35 ht-35 rounded-circle" alt="">
                                        </div>
                                        <div class="overflow-hidden">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="mg-b-0 tx-medium"><a href="">Willbert Steele</a></p>
                                                    <div class="tx-12">
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                    </div>
                                                </div>
                                                <div class="tx-11 mg-b-0">Mar 20, 2020, 12:30pm</div>
                                            </div>
                                            <div>
                                                <p class="tx-11 mg-t-10 mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type specimen book text of the dummy text of and typesetting...</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bd-b pd-15">
                                        <div class="ft-left mr-3">
                                            <img src="admin/assets/images/users-face/2.png" class="wd-35 ht-35 rounded-circle" alt="">
                                        </div>
                                        <div class="overflow-hidden">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="mg-b-0 tx-medium"><a href="">Joyann Thebeau</a></p>
                                                    <div class="tx-12">													
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-gray-400"></i>
                                                    </div>
                                                </div>
                                                <div class="tx-11 mg-b-0">Mar 22, 2020, 2:52pm</div>
                                            </div>
                                            <div>
                                                <p class="tx-11 mg-t-10 mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type specimen book text of the dummy text of and typesetting...</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bd-b pd-15">
                                        <div class="ft-left mr-3">
                                            <img src="admin/assets/images/users-face/3.png" class="wd-35 ht-35 rounded-circle" alt="">
                                        </div>
                                        <div class="overflow-hidden">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="mg-b-0 tx-medium"><a href="">Dasi Cheeke</a></p>
                                                    <div class="tx-12">
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-gray-400"></i>
                                                        <i class="fa fa-star tx-gray-400"></i>
                                                    </div>
                                                </div>
                                                <div class="tx-11 mg-b-0">Mar 26, 2020, 5:24pm</div>
                                            </div>
                                            <div>
                                                <p class="tx-11 mg-t-10 mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type specimen book text of the dummy text of and typesetting...</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bd-b pd-15">
                                        <div class="ft-left mr-3">
                                            <img src="admin/assets/images/users-face/4.png" class="wd-35 ht-35 rounded-circle" alt="">
                                        </div>
                                        <div class="overflow-hidden">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="mg-b-0 tx-medium"><a href="">Maxine Lorraine</a></p>
                                                    <div class="tx-12">
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                    </div>
                                                </div>
                                                <div class="tx-11 mg-b-0">Mar 25, 2020, 1:52pm</div>
                                            </div>
                                            <div>
                                                <p class="tx-11 mg-t-10 mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type specimen book text of the dummy text of and typesetting...</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pd-15">
                                        <div class="ft-left mr-3">
                                            <img src="admin/assets/images/users-face/3.png" class="wd-35 ht-35 rounded-circle" alt="">
                                        </div>
                                        <div class="overflow-hidden">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="mg-b-0 tx-medium"><a href="">Lary Masey</a></p>
                                                    <div class="tx-12">
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-warning"></i>
                                                        <i class="fa fa-star tx-gray-400"></i>
                                                    </div>
                                                </div>
                                                <div class="tx-11 mg-b-0">Mar 26, 2020, 5:24pm</div>
                                            </div>
                                            <div>
                                                <p class="tx-11 mg-t-10 mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type specimen book text of the dummy text of and typesetting...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer tx-center mg-t-5">
                                    <a href="" class="tx-12">View All Reviews</a>
                                </div>
                            </div>
                        </div>
                        <!--/ Reviews End -->  
                        <!--================================-->
                        <!-- Users Conversion Rate Start -->	
                        <!--================================-->
                        <div class="col-md-6 col-lg-6 col-xl-4">
                            <div class="card mg-b-20">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h6 class="tx-13 mb-0 tx-dark">Users Conversion Rate</h6>
                                    <div class="card-header-btn">
                                        <div class="dropdown">
                                            <a href="" class="" data-toggle="dropdown"><i data-feather="more-horizontal" class="wd-16  ht-16"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="" class="dropdown-item"><i data-feather="info" class="wd-16 ht-16 mr-2"></i>View Details</a>
                                                <a href="" class="dropdown-item"><i data-feather="share" class="wd-16 ht-16 mr-2"></i>Share</a>
                                                <a href="" class="dropdown-item"><i data-feather="download" class="wd-16 ht-16 mr-2"></i>Download</a>
                                                <a href="" class="dropdown-item"><i data-feather="copy" class="wd-16 ht-16 mr-2"></i>Copy to</a>
                                                <a href="" class="dropdown-item"><i data-feather="folder" class="wd-16 ht-16 mr-2"></i>Move to</a>
                                                <a href="" class="dropdown-item"><i data-feather="edit" class="wd-16 ht-16 mr-2"></i>Rename</a>
                                                <a href="" class="dropdown-item"><i data-feather="trash" class="wd-16 ht-16 mr-2"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pd-0">
                                    <div class="table-responsive">
                                        <table class="table mg-b-0">
                                            <tbody>
                                                <tr>
                                                    <td class="d-flex justify-content-center align-items-center">
                                                        <img alt="avatar" src="admin/assets/images/users-face/2.png" class="wd-35 ht-35 img-fluid rounded-circle">
                                                    </td>
                                                    <td>
                                                        <a href="">Socrates Itumay</a>
                                                        <small class="tx-11 d-block">Sales Manager1</small>  
                                                    </td>
                                                    <td class="tx-right pd-r-15-force">
                                                        <h6 class="mg-b-0 tx-dark tx-13 tx-rubik">35%</h6>
                                                        <small class="tx-11">Conversion Rate</small> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="d-flex justify-content-center align-items-center">
                                                        <img alt="avatar" src="admin/assets/images/users-face/1.png" class="wd-35 ht-35 img-fluid rounded-circle">
                                                    </td>
                                                    <td>
                                                        <a href="">Reynante Labares</a>
                                                        <small class="tx-11 d-block">Sales Manager2</small> 
                                                    </td>
                                                    <td class="tx-right pd-r-15-force">
                                                        <h6 class="mg-b-0 tx-dark tx-13 tx-rubik">25%</h6>
                                                        <small class="tx-11">Conversion Rate</small> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="d-flex justify-content-center align-items-center">
                                                        <img alt="avatar" src="admin/assets/images/users-face/3.png" class="wd-35 ht-35 img-fluid rounded-circle">
                                                    </td>
                                                    <td>
                                                        <a href="">Owen Bongcaras</a>
                                                        <small class="tx-11 d-block">Sales Manager3</small> 
                                                    </td>
                                                    <td class="tx-right pd-r-15-force">
                                                        <h6 class="mg-b-0 tx-dark tx-13 tx-rubik">23%</h6>
                                                        <small class="tx-11">Conversion Rate</small> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="d-flex justify-content-center align-items-center">
                                                        <img alt="avatar" src="admin/assets/images/users-face/4.png" class="wd-35 ht-35 img-fluid rounded-circle">
                                                    </td>
                                                    <td>
                                                        <a href="">Mariane Galeon</a>
                                                        <small class="tx-11 d-block">Sales Manager4</small> 
                                                    </td>
                                                    <td class="tx-right pd-r-15-force">
                                                        <h6 class="mg-b-0 tx-dark tx-13 tx-rubik">19%</h6>
                                                        <small class="tx-11">Conversion Rate</small> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="d-flex justify-content-center align-items-center">
                                                        <img alt="avatar" src="admin/assets/images/users-face/5.png" class="wd-35 ht-35 img-fluid rounded-circle">
                                                    </td>
                                                    <td>
                                                        <a href="">Joyce Chua</a>
                                                        <small class="tx-11 d-block">Sales Manager5</small> 
                                                    </td>
                                                    <td class="tx-right pd-r-15-force">
                                                        <h6 class="mg-b-0 tx-dark tx-13 tx-rubik">17%</h6>
                                                        <small class="tx-11">Conversion Rate</small> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="d-flex justify-content-center align-items-center">
                                                        <img alt="avatar" src="admin/assets/images/users-face/2.png" class="wd-35 ht-35 img-fluid rounded-circle">
                                                    </td>
                                                    <td>
                                                        <a href="">Socrates Itumay</a>
                                                        <small class="tx-11 d-block">Sales Manager6</small>  
                                                    </td>
                                                    <td class="tx-right pd-r-15-force">
                                                        <h6 class="mg-b-0 tx-dark tx-13 tx-rubik">15%</h6>
                                                        <small class="tx-11">Conversion Rate</small> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="d-flex justify-content-center align-items-center">
                                                        <img alt="avatar" src="admin/assets/images/users-face/1.png" class="wd-35 ht-35 img-fluid rounded-circle">
                                                    </td>
                                                    <td>
                                                        <a href="">Reynante Labares</a>
                                                        <small class="tx-11 d-block">Sales Manager7</small> 
                                                    </td>
                                                    <td class="tx-right pd-r-15-force">
                                                        <h6 class="mg-b-0 tx-dark tx-13 tx-rubik">12%</h6>
                                                        <small class="tx-11">Conversion Rate</small> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="d-flex justify-content-center align-items-center">
                                                        <img alt="avatar" src="admin/assets/images/users-face/3.png" class="wd-35 ht-35 img-fluid rounded-circle">
                                                    </td>
                                                    <td>
                                                        <a href="">Owen Bongcaras</a>
                                                        <small class="tx-11 d-block">Sales Manager8</small> 
                                                    </td>
                                                    <td class="tx-right pd-r-15-force">
                                                        <h6 class="mg-b-0 tx-dark tx-13 tx-rubik">11%</h6>
                                                        <small class="tx-11">Conversion Rate</small> 
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer tx-center mg-t-5">
                                    <a href="" class="tx-12">View All Conversion</a>
                                </div>
                            </div>
                        </div>
                        <!--/ Users Conversion Rate End -->
                        <!--================================-->
                        <!-- Sales by Country Start -->	
                        <!--================================-->
                        <div class="col-md-6 col-xl-4">
                            <div class="card mg-b-20">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h6 class="tx-13 mb-0 tx-dark">Sales by Country</h6>
                                    <div class="card-header-btn">
                                        <div class="dropdown">
                                            <a href="" class="" data-toggle="dropdown"><i data-feather="more-horizontal" class="wd-16  ht-16"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="" class="dropdown-item"><i data-feather="info" class="wd-16 ht-16 mr-2"></i>View Details</a>
                                                <a href="" class="dropdown-item"><i data-feather="share" class="wd-16 ht-16 mr-2"></i>Share</a>
                                                <a href="" class="dropdown-item"><i data-feather="download" class="wd-16 ht-16 mr-2"></i>Download</a>
                                                <a href="" class="dropdown-item"><i data-feather="copy" class="wd-16 ht-16 mr-2"></i>Copy to</a>
                                                <a href="" class="dropdown-item"><i data-feather="folder" class="wd-16 ht-16 mr-2"></i>Move to</a>
                                                <a href="" class="dropdown-item"><i data-feather="edit" class="wd-16 ht-16 mr-2"></i>Rename</a>
                                                <a href="" class="dropdown-item"><i data-feather="trash" class="wd-16 ht-16 mr-2"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pd-0">
                                    <div id="world-map" style="height: 300px; padding: 15px"></div>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered mb-0 tx-medium">
                                            <tr>
                                                <td><span class="wd-10 ht-10 bg-primary mr-2 d-inline-block rounded-circle"></span>United State</td>
                                                <td class="tx-rubik tx-normal">$5,965<span data-feather="arrow-up-circle" class="wd-12 ht-12 ml-2 tx-success"></span></td>
                                                <td class="tx-rubik tx-light">35%</td>
                                            </tr>
                                            <tr>
                                                <td><span class="wd-10 ht-10 bg-danger mr-2 d-inline-block rounded-circle"></span>Australia</td>
                                                <td class="tx-rubik tx-normal">$3,527<span data-feather="arrow-up-circle" class="wd-12 ht-12 ml-2 tx-success"></span></td>
                                                <td class="tx-rubik tx-light">20%</td>
                                            </tr>
                                            <tr>
                                                <td><span class="wd-10 ht-10 bg-warning mr-2 d-inline-block rounded-circle"></span>United Kingdom</td>
                                                <td class="tx-rubik tx-normal">$2,245<span data-feather="arrow-down-circle" class="wd-12 ht-12 ml-2 tx-danger"></span></td>
                                                <td class="tx-rubik tx-light">20%</td>
                                            </tr>
                                            <tr>
                                                <td><span class="wd-10 ht-10 bg-info mr-2 d-inline-block rounded-circle"></span>Germany</td>
                                                <td class="tx-rubik tx-normal">$2,125<span data-feather="arrow-up-circle" class="wd-12 ht-12 ml-2 tx-success"></span></td>
                                                <td class="tx-rubik tx-light">15%</td>
                                            </tr>
                                            <tr>
                                                <td><span class="wd-10 ht-10 bg-success mr-2 d-inline-block rounded-circle"></span>Russia</td>
                                                <td class="tx-rubik tx-normal">$2,533<span data-feather="arrow-down-circle" class="wd-12 ht-12 ml-2 tx-danger"></span></td>
                                                <td class="tx-rubik tx-light">20%</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Sales by Country End -->
                        <!--================================-->
                        <!-- Transaction History Start -->	
                        <!--================================-->
                        <div class="col-md-6 col-xl-4">
                            <div class="card mg-b-20">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h6 class="tx-13 mb-0 tx-dark">Transaction History</h6>
                                    <div class="card-header-btn">
                                        <div class="dropdown">
                                            <a href="" class="" data-toggle="dropdown"><i data-feather="more-horizontal" class="wd-16  ht-16"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="" class="dropdown-item"><i data-feather="info" class="wd-16 ht-16 mr-2"></i>View Details</a>
                                                <a href="" class="dropdown-item"><i data-feather="share" class="wd-16 ht-16 mr-2"></i>Share</a>
                                                <a href="" class="dropdown-item"><i data-feather="download" class="wd-16 ht-16 mr-2"></i>Download</a>
                                                <a href="" class="dropdown-item"><i data-feather="copy" class="wd-16 ht-16 mr-2"></i>Copy to</a>
                                                <a href="" class="dropdown-item"><i data-feather="folder" class="wd-16 ht-16 mr-2"></i>Move to</a>
                                                <a href="" class="dropdown-item"><i data-feather="edit" class="wd-16 ht-16 mr-2"></i>Rename</a>
                                                <a href="" class="dropdown-item"><i data-feather="trash" class="wd-16 ht-16 mr-2"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pd-0">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex pd-y-12 pd-sm-x-15">
                                            <div class="d-none d-sm-block"><span class="wd-35 ht-35 mg-r-10 d-flex align-items-center justify-content-center rounded bg-primary tx-white rounded-circle"><i data-feather="check-circle" class="wd-12 ht-12"></i></span></div>
                                            <div class="pd-sm-l-10">
                                                <p class="mg-b-0 tx-normal">Transaction ID: <a href="">#985632</a></p>
                                                <small class="tx-11 mg-b-0">Mar 2, 2020, 2:30pm</small>
                                            </div>
                                            <div class="mg-l-auto text-right">
                                                <p class="mg-b-0 tx-rubik tx-dark tx-medium">$5,550</p>
                                                <span class="tx-success tx-10">Completed</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex pd-y-12 pd-sm-x-15">
                                            <div class="d-none d-sm-block"><span class="wd-35 ht-35 mg-r-10 d-flex align-items-center justify-content-center rounded bg-warning tx-dark rounded-circle"><i data-feather="anchor" class="wd-12 ht-12"></i></span></div>
                                            <div class="pd-sm-l-10">
                                                <p class="mg-b-0 tx-normal">Transaction ID: <a href="">#698524</a></p>
                                                <small class="tx-11 mg-b-0">Mar 6, 2020, 3:51pm</small>
                                            </div>
                                            <div class="mg-l-auto text-right">
                                                <p class="mg-b-0 tx-rubik tx-dark tx-medium">$2,645</p>
                                                <span class="tx-warning tx-10">Pending</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex pd-y-12 pd-sm-x-15">
                                            <div class="d-none d-sm-block"><span class="wd-35 ht-35 mg-r-10 d-flex align-items-center justify-content-center rounded bg-primary tx-white rounded-circle"><i data-feather="check-circle" class="wd-12 ht-12"></i></span></div>
                                            <div class="pd-sm-l-10">
                                                <p class="mg-b-0 tx-normal">Transaction ID: <a href="">#458762</a></p>
                                                <small class="tx-11 mg-b-0">Mar 10, 2020, 8:41pm</small>
                                            </div>
                                            <div class="mg-l-auto text-right">
                                                <p class="mg-b-0 tx-rubik tx-dark tx-medium">$3,248</p>
                                                <span class="tx-success tx-10">Completed</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex pd-y-12 pd-sm-x-15">
                                            <div class="d-none d-sm-block"><span class="wd-35 ht-35 mg-r-10 d-flex align-items-center justify-content-center rounded bg-warning tx-dark rounded-circle"><i data-feather="anchor" class="wd-12 ht-12"></i></span></div>
                                            <div class="pd-sm-l-10">
                                                <p class="mg-b-0 tx-normal">Transaction ID: <a href="">#698524</a></p>
                                                <small class="tx-11 mg-b-0">Mar 12, 2020, 1:43pm</small>
                                            </div>
                                            <div class="mg-l-auto text-right">
                                                <p class="mg-b-0 tx-rubik tx-dark tx-medium">$1,243</p>
                                                <p class="mg-b-0 tx-11 tx-warning">Pending</p>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex pd-y-15 pd-sm-x-15">
                                            <div class="d-none d-sm-block"><span class="wd-35 ht-35 mg-r-10 d-flex align-items-center justify-content-center rounded bg-primary tx-white rounded-circle"><i data-feather="check-circle" class="wd-12 ht-12"></i></span></div>
                                            <div class="pd-sm-l-10">
                                                <p class="mg-b-0 tx-normal">Transaction ID: <a href="">#365845</a></p>
                                                <small class="tx-11 mg-b-0">Mar 15, 2020, 5:15pm</small>
                                            </div>
                                            <div class="mg-l-auto text-right">
                                                <p class="mg-b-0 tx-rubik tx-dark tx-medium">$5,319</p>
                                                <span class="tx-success tx-10">Completed</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex pd-y-12 pd-sm-x-15">
                                            <div class="d-none d-sm-block"><span class="wd-35 ht-35 mg-r-10 d-flex align-items-center justify-content-center rounded bg-danger tx-white rounded-circle"><i data-feather="x" class="wd-12 ht-12"></i></span></div>
                                            <div class="pd-sm-l-10">
                                                <p class="mg-b-0 tx-normal">Transaction ID: <a href="">#475821</a></p>
                                                <small class="tx-11 mg-b-0">Mar 21, 2020, 3:30pm</small>
                                            </div>
                                            <div class="mg-l-auto text-right">
                                                <p class="mg-b-0 tx-rubik tx-dark tx-medium">$4,347</p>
                                                <span class="tx-danger tx-10">Canceled</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex pd-y-12 pd-sm-x-15">
                                            <div class="d-none d-sm-block"><span class="wd-35 ht-35 mg-r-10 d-flex align-items-center justify-content-center rounded bg-primary tx-white rounded-circle"><i data-feather="check-circle" class="wd-12 ht-12"></i></span></div>
                                            <div class="pd-sm-l-10">
                                                <p class="mg-b-0 tx-normal">Transaction ID: <a href="">#365845</a></p>
                                                <small class="tx-11 mg-b-0">Mar 15, 2020, 5:15pm</small>
                                            </div>
                                            <div class="mg-l-auto text-right">
                                                <p class="mg-b-0 tx-rubik tx-dark tx-medium">$5,319</p>
                                                <span class="tx-success tx-10">Completed</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer tx-center mg-t-5">
                                    <a href="" class="tx-12">View All Transaction</a>
                                </div>
                            </div>
                        </div>
                        <!--/ Transaction History End -->
                    </div>
                    <div class="row row-xs">
                        <!--================================-->
                        <!-- Orders History Start -->	
                        <!--================================-->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h6 class="tx-13 mb-0 tx-dark">Orders History</h6>
                                    <div class="card-header-btn">
                                        <div class="dropdown">
                                            <a href="" class="" data-toggle="dropdown"><i data-feather="more-horizontal" class="wd-16  ht-16"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="" class="dropdown-item"><i data-feather="info" class="wd-16 ht-16 mr-2"></i>View Details</a>
                                                <a href="" class="dropdown-item"><i data-feather="share" class="wd-16 ht-16 mr-2"></i>Share</a>
                                                <a href="" class="dropdown-item"><i data-feather="download" class="wd-16 ht-16 mr-2"></i>Download</a>
                                                <a href="" class="dropdown-item"><i data-feather="copy" class="wd-16 ht-16 mr-2"></i>Copy to</a>
                                                <a href="" class="dropdown-item"><i data-feather="folder" class="wd-16 ht-16 mr-2"></i>Move to</a>
                                                <a href="" class="dropdown-item"><i data-feather="edit" class="wd-16 ht-16 mr-2"></i>Rename</a>
                                                <a href="" class="dropdown-item"><i data-feather="trash" class="wd-16 ht-16 mr-2"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pd-0">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th>Address</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a href="">#963258</a></td>
                                                    <td class="d-flex align-items-center">
                                                        <div class="d-none d-sm-block"><span class="tx-8 wd-30 ht-30 mg-r-10 d-flex align-items-center justify-content-center rounded bg-primary tx-white rounded-circle op-7">WS</span>
                                                        </div>
                                                        <span>Willbert Steele</span>
                                                    </td>
                                                    <td>12-07-2020</td>
                                                    <td>$750</td>
                                                    <td>Winding Way West, RI 3261, US</td>
                                                    <td><span class="wd-10 ht-10 bg-primary mr-2 d-inline-block rounded-circle"></span>Paid</td>
                                                    <td class="tx-center">
                                                        <div class="dropdown">
                                                            <a href="" class="" data-toggle="dropdown"><i data-feather="more-horizontal" class="wd-16  ht-16"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="" class="dropdown-item"><i data-feather="info" class="wd-16 ht-16 mr-2"></i>View Details</a>
                                                                <a href="" class="dropdown-item"><i data-feather="share" class="wd-16 ht-16 mr-2"></i>Share</a>
                                                                <a href="" class="dropdown-item"><i data-feather="download" class="wd-16 ht-16 mr-2"></i>Download</a>
                                                                <a href="" class="dropdown-item"><i data-feather="copy" class="wd-16 ht-16 mr-2"></i>Copy to</a>
                                                                <a href="" class="dropdown-item"><i data-feather="folder" class="wd-16 ht-16 mr-2"></i>Move to</a>
                                                                <a href="" class="dropdown-item"><i data-feather="edit" class="wd-16 ht-16 mr-2"></i>Edit</a>
                                                                <a href="" class="dropdown-item"><i data-feather="trash" class="wd-16 ht-16 mr-2"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="">#247852</a></td>
                                                    <td class="d-flex align-items-center">
                                                        <div class="d-none d-sm-block"><span class="tx-8 wd-30 ht-30 mg-r-10 d-flex align-items-center justify-content-center rounded bg-danger tx-white rounded-circle op-7">DC</span>
                                                        </div>
                                                        <span>Dasi Cheeke</span>
                                                    </td>
                                                    <td>13-07-2020</td>
                                                    <td>$530</td>
                                                    <td>California, USA</td>
                                                    <td><span class="wd-10 ht-10 bg-danger mr-2 d-inline-block rounded-circle"></span>Canceled</td>
                                                    <td class="tx-center">
                                                        <div class="dropdown">
                                                            <a href="" class="" data-toggle="dropdown"><i data-feather="more-horizontal" class="wd-16  ht-16"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="" class="dropdown-item"><i data-feather="info" class="wd-16 ht-16 mr-2"></i>View Details</a>
                                                                <a href="" class="dropdown-item"><i data-feather="share" class="wd-16 ht-16 mr-2"></i>Share</a>
                                                                <a href="" class="dropdown-item"><i data-feather="download" class="wd-16 ht-16 mr-2"></i>Download</a>
                                                                <a href="" class="dropdown-item"><i data-feather="copy" class="wd-16 ht-16 mr-2"></i>Copy to</a>
                                                                <a href="" class="dropdown-item"><i data-feather="folder" class="wd-16 ht-16 mr-2"></i>Move to</a>
                                                                <a href="" class="dropdown-item"><i data-feather="edit" class="wd-16 ht-16 mr-2"></i>Edit</a>
                                                                <a href="" class="dropdown-item"><i data-feather="trash" class="wd-16 ht-16 mr-2"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="">#963258</a></td>
                                                    <td class="d-flex align-items-center">
                                                        <div class="d-none d-sm-block"><span class="tx-8 wd-30 ht-30 mg-r-10 d-flex align-items-center justify-content-center rounded bg-primary tx-white rounded-circle op-7">WS</span>
                                                        </div>
                                                        <span>Willbert Steele</span>
                                                    </td>
                                                    <td>12-07-2020</td>
                                                    <td>$750</td>
                                                    <td>Winding Way West, RI 3261, US</td>
                                                    <td><span class="wd-10 ht-10 bg-primary mr-2 d-inline-block rounded-circle"></span>Paid</td>
                                                    <td class="tx-center">
                                                        <div class="dropdown">
                                                            <a href="" class="" data-toggle="dropdown"><i data-feather="more-horizontal" class="wd-16  ht-16"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="" class="dropdown-item"><i data-feather="info" class="wd-16 ht-16 mr-2"></i>View Details</a>
                                                                <a href="" class="dropdown-item"><i data-feather="share" class="wd-16 ht-16 mr-2"></i>Share</a>
                                                                <a href="" class="dropdown-item"><i data-feather="download" class="wd-16 ht-16 mr-2"></i>Download</a>
                                                                <a href="" class="dropdown-item"><i data-feather="copy" class="wd-16 ht-16 mr-2"></i>Copy to</a>
                                                                <a href="" class="dropdown-item"><i data-feather="folder" class="wd-16 ht-16 mr-2"></i>Move to</a>
                                                                <a href="" class="dropdown-item"><i data-feather="edit" class="wd-16 ht-16 mr-2"></i>Edit</a>
                                                                <a href="" class="dropdown-item"><i data-feather="trash" class="wd-16 ht-16 mr-2"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="">#523698</a></td>
                                                    <td class="d-flex align-items-center">
                                                        <div class="d-none d-sm-block"><span class="tx-8 wd-30 ht-30 mg-r-10 d-flex align-items-center justify-content-center rounded bg-success tx-white rounded-circle op-7">DC</span>
                                                        </div>
                                                        <span>Maxine Lorraine</span>
                                                    </td>
                                                    <td>15-07-2020</td>
                                                    <td>$850</td>
                                                    <td>Boston, USA</td>
                                                    <td><span class="wd-10 ht-10 bg-primary mr-2 d-inline-block rounded-circle"></span>Paid</td>
                                                    <td class="tx-center">
                                                        <div class="dropdown">
                                                            <a href="" class="" data-toggle="dropdown"><i data-feather="more-horizontal" class="wd-16  ht-16"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="" class="dropdown-item"><i data-feather="info" class="wd-16 ht-16 mr-2"></i>View Details</a>
                                                                <a href="" class="dropdown-item"><i data-feather="share" class="wd-16 ht-16 mr-2"></i>Share</a>
                                                                <a href="" class="dropdown-item"><i data-feather="download" class="wd-16 ht-16 mr-2"></i>Download</a>
                                                                <a href="" class="dropdown-item"><i data-feather="copy" class="wd-16 ht-16 mr-2"></i>Copy to</a>
                                                                <a href="" class="dropdown-item"><i data-feather="folder" class="wd-16 ht-16 mr-2"></i>Move to</a>
                                                                <a href="" class="dropdown-item"><i data-feather="edit" class="wd-16 ht-16 mr-2"></i>Edit</a>
                                                                <a href="" class="dropdown-item"><i data-feather="trash" class="wd-16 ht-16 mr-2"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="">#874569</a></td>
                                                    <td class="d-flex align-items-center">
                                                        <div class="d-none d-sm-block"><span class="tx-8 wd-30 ht-30 mg-r-10 d-flex align-items-center justify-content-center rounded bg-warning tx-white rounded-circle op-7">DC</span>
                                                        </div>
                                                        <span>Joyann Thebeau</span>
                                                    </td>
                                                    <td>19-07-2020</td>
                                                    <td>$550</td>
                                                    <td>Sydney, Australia</td>
                                                    <td><span class="wd-10 ht-10 bg-warning mr-2 d-inline-block rounded-circle"></span>Pending</td>
                                                    <td class="tx-center">
                                                        <div class="dropdown">
                                                            <a href="" class="" data-toggle="dropdown"><i data-feather="more-horizontal" class="wd-16  ht-16"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="" class="dropdown-item"><i data-feather="info" class="wd-16 ht-16 mr-2"></i>View Details</a>
                                                                <a href="" class="dropdown-item"><i data-feather="share" class="wd-16 ht-16 mr-2"></i>Share</a>
                                                                <a href="" class="dropdown-item"><i data-feather="download" class="wd-16 ht-16 mr-2"></i>Download</a>
                                                                <a href="" class="dropdown-item"><i data-feather="copy" class="wd-16 ht-16 mr-2"></i>Copy to</a>
                                                                <a href="" class="dropdown-item"><i data-feather="folder" class="wd-16 ht-16 mr-2"></i>Move to</a>
                                                                <a href="" class="dropdown-item"><i data-feather="edit" class="wd-16 ht-16 mr-2"></i>Edit</a>
                                                                <a href="" class="dropdown-item"><i data-feather="trash" class="wd-16 ht-16 mr-2"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="">#523698</a></td>
                                                    <td class="d-flex align-items-center">
                                                        <div class="d-none d-sm-block"><span class="tx-8 wd-30 ht-30 mg-r-10 d-flex align-items-center justify-content-center rounded bg-success tx-white rounded-circle op-7">DC</span>
                                                        </div>
                                                        <span>Maxine Lorraine</span>
                                                    </td>
                                                    <td>15-07-2020</td>
                                                    <td>$850</td>
                                                    <td>Boston, USA</td>
                                                    <td><span class="wd-10 ht-10 bg-primary mr-2 d-inline-block rounded-circle"></span>Paid</td>
                                                    <td class="tx-center">
                                                        <div class="dropdown">
                                                            <a href="" class="" data-toggle="dropdown"><i data-feather="more-horizontal" class="wd-16  ht-16"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="" class="dropdown-item"><i data-feather="info" class="wd-16 ht-16 mr-2"></i>View Details</a>
                                                                <a href="" class="dropdown-item"><i data-feather="share" class="wd-16 ht-16 mr-2"></i>Share</a>
                                                                <a href="" class="dropdown-item"><i data-feather="download" class="wd-16 ht-16 mr-2"></i>Download</a>
                                                                <a href="" class="dropdown-item"><i data-feather="copy" class="wd-16 ht-16 mr-2"></i>Copy to</a>
                                                                <a href="" class="dropdown-item"><i data-feather="folder" class="wd-16 ht-16 mr-2"></i>Move to</a>
                                                                <a href="" class="dropdown-item"><i data-feather="edit" class="wd-16 ht-16 mr-2"></i>Edit</a>
                                                                <a href="" class="dropdown-item"><i data-feather="trash" class="wd-16 ht-16 mr-2"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="">#874569</a></td>
                                                    <td class="d-flex align-items-center">
                                                        <div class="d-none d-sm-block"><span class="tx-8 wd-30 ht-30 mg-r-10 d-flex align-items-center justify-content-center rounded bg-warning tx-white rounded-circle op-7">DC</span>
                                                        </div>
                                                        <span>Joyann Thebeau</span>
                                                    </td>
                                                    <td>19-07-2020</td>
                                                    <td>$550</td>
                                                    <td>Sydney, Australia</td>
                                                    <td><span class="wd-10 ht-10 bg-warning mr-2 d-inline-block rounded-circle"></span>Pending</td>
                                                    <td class="tx-center">
                                                        <div class="dropdown">
                                                            <a href="" class="" data-toggle="dropdown"><i data-feather="more-horizontal" class="wd-16  ht-16"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="" class="dropdown-item"><i data-feather="info" class="wd-16 ht-16 mr-2"></i>View Details</a>
                                                                <a href="" class="dropdown-item"><i data-feather="share" class="wd-16 ht-16 mr-2"></i>Share</a>
                                                                <a href="" class="dropdown-item"><i data-feather="download" class="wd-16 ht-16 mr-2"></i>Download</a>
                                                                <a href="" class="dropdown-item"><i data-feather="copy" class="wd-16 ht-16 mr-2"></i>Copy to</a>
                                                                <a href="" class="dropdown-item"><i data-feather="folder" class="wd-16 ht-16 mr-2"></i>Move to</a>
                                                                <a href="" class="dropdown-item"><i data-feather="edit" class="wd-16 ht-16 mr-2"></i>Edit</a>
                                                                <a href="" class="dropdown-item"><i data-feather="trash" class="wd-16 ht-16 mr-2"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="">#523698</a></td>
                                                    <td class="d-flex align-items-center">
                                                        <div class="d-none d-sm-block"><span class="tx-8 wd-30 ht-30 mg-r-10 d-flex align-items-center justify-content-center rounded bg-success tx-white rounded-circle op-7">DC</span>
                                                        </div>
                                                        <span>Maxine Lorraine</span>
                                                    </td>
                                                    <td>15-07-2020</td>
                                                    <td>$850</td>
                                                    <td>Boston, USA</td>
                                                    <td><span class="wd-10 ht-10 bg-primary mr-2 d-inline-block rounded-circle"></span>Paid</td>
                                                    <td class="tx-center">
                                                        <div class="dropdown">
                                                            <a href="" class="" data-toggle="dropdown"><i data-feather="more-horizontal" class="wd-16  ht-16"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="" class="dropdown-item"><i data-feather="info" class="wd-16 ht-16 mr-2"></i>View Details</a>
                                                                <a href="" class="dropdown-item"><i data-feather="share" class="wd-16 ht-16 mr-2"></i>Share</a>
                                                                <a href="" class="dropdown-item"><i data-feather="download" class="wd-16 ht-16 mr-2"></i>Download</a>
                                                                <a href="" class="dropdown-item"><i data-feather="copy" class="wd-16 ht-16 mr-2"></i>Copy to</a>
                                                                <a href="" class="dropdown-item"><i data-feather="folder" class="wd-16 ht-16 mr-2"></i>Move to</a>
                                                                <a href="" class="dropdown-item"><i data-feather="edit" class="wd-16 ht-16 mr-2"></i>Edit</a>
                                                                <a href="" class="dropdown-item"><i data-feather="trash" class="wd-16 ht-16 mr-2"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="">#874569</a></td>
                                                    <td class="d-flex align-items-center">
                                                        <div class="d-none d-sm-block"><span class="tx-8 wd-30 ht-30 mg-r-10 d-flex align-items-center justify-content-center rounded bg-warning tx-white rounded-circle op-7">DC</span>
                                                        </div>
                                                        <span>Joyann Thebeau</span>
                                                    </td>
                                                    <td>19-07-2020</td>
                                                    <td>$550</td>
                                                    <td>Sydney, Australia</td>
                                                    <td><span class="wd-10 ht-10 bg-warning mr-2 d-inline-block rounded-circle"></span>Pending</td>
                                                    <td class="tx-center">
                                                        <div class="dropdown">
                                                            <a href="" class="" data-toggle="dropdown"><i data-feather="more-horizontal" class="wd-16  ht-16"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="" class="dropdown-item"><i data-feather="info" class="wd-16 ht-16 mr-2"></i>View Details</a>
                                                                <a href="" class="dropdown-item"><i data-feather="share" class="wd-16 ht-16 mr-2"></i>Share</a>
                                                                <a href="" class="dropdown-item"><i data-feather="download" class="wd-16 ht-16 mr-2"></i>Download</a>
                                                                <a href="" class="dropdown-item"><i data-feather="copy" class="wd-16 ht-16 mr-2"></i>Copy to</a>
                                                                <a href="" class="dropdown-item"><i data-feather="folder" class="wd-16 ht-16 mr-2"></i>Move to</a>
                                                                <a href="" class="dropdown-item"><i data-feather="edit" class="wd-16 ht-16 mr-2"></i>Edit</a>
                                                                <a href="" class="dropdown-item"><i data-feather="trash" class="wd-16 ht-16 mr-2"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="">#247852</a></td>
                                                    <td class="d-flex align-items-center">
                                                        <div class="d-none d-sm-block"><span class="tx-8 wd-30 ht-30 mg-r-10 d-flex align-items-center justify-content-center rounded bg-danger tx-white rounded-circle op-7">DC</span>
                                                        </div>
                                                        <span>Dasi Cheeke</span>
                                                    </td>
                                                    <td>13-07-2020</td>
                                                    <td>$530</td>
                                                    <td>California, USA</td>
                                                    <td><span class="wd-10 ht-10 bg-danger mr-2 d-inline-block rounded-circle"></span>Canceled</td>
                                                    <td class="tx-center">
                                                        <div class="dropdown">
                                                            <a href="" class="" data-toggle="dropdown"><i data-feather="more-horizontal" class="wd-16  ht-16"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="" class="dropdown-item"><i data-feather="info" class="wd-16 ht-16 mr-2"></i>View Details</a>
                                                                <a href="" class="dropdown-item"><i data-feather="share" class="wd-16 ht-16 mr-2"></i>Share</a>
                                                                <a href="" class="dropdown-item"><i data-feather="download" class="wd-16 ht-16 mr-2"></i>Download</a>
                                                                <a href="" class="dropdown-item"><i data-feather="copy" class="wd-16 ht-16 mr-2"></i>Copy to</a>
                                                                <a href="" class="dropdown-item"><i data-feather="folder" class="wd-16 ht-16 mr-2"></i>Move to</a>
                                                                <a href="" class="dropdown-item"><i data-feather="edit" class="wd-16 ht-16 mr-2"></i>Edit</a>
                                                                <a href="" class="dropdown-item"><i data-feather="trash" class="wd-16 ht-16 mr-2"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Orders History End -->
                    </div>
                </div>
                <!--/ Page Inner End -->
                <!--================================-->
                <!-- Page Footer Start -->	
                <!--================================-->
                <footer class="page-footer d-block d-sm-flex justify-content-between pd-x-20 pd-t-20 pd-b-15 pd-lg-x-30">
                    <p class="mg-b-15 mg-sm-b-0">Copyright&copy; 2020 |  Created By  <a href="https://themeforest.net/user/colorlibcode/portfolio" target="_blank">ColorlibCode</a></p>
                    <div class="d-block d-sm-flex">
                        <a href="" class="mr-3">About Us</a>
                        <a href="" class="mr-3">Terms & Condition</a>
                        <a href="" class="mr-3">Privacy & Policy</a>
                        <a href="">Contact Us</a>
                    </div>
                </footer>
                <!--/ Page Footer End -->
            </div>
            <!--/ Page Content End -->
        </div>
        <!--/ Page Container End -->
        <!--================================-->
        <!-- Scroll To Top Start-->
        <!--================================-->	
        <a href="" data-click="scroll-top" class="btn-scroll-top fade waves-effect"><i data-feather="arrow-up" class="wd-16 ht-16"></i></a>
        <!--/ Scroll To Top End -->
        <!-- BEGIN: Theme Customizer-->

        <!-- End: Theme Customizer-->
        <!--================================-->

        @include('admin/include/script_all')
    </body>
</html>