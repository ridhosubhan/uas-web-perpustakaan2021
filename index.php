<?php 
    $title = 'Dashboard';
    include 'konfigurasi/config.php';
    include 'layouts/header.php';
    include 'konfigurasi/function.php'; 
?>

<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#" class="active">Dashboard</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

                
        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-webcam"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <div class="m-l-10">
                                    <h5 class="mt-0 round-inner">$18090</h5>
                                    <p class="mb-0 text-muted">Visits Today</p>                                                                 
                                </div>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-danger"> <i class="mdi mdi-arrow-down"></i> <span>5.26%</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-6 text-center align-self-center">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0 round-inner">562</h5>
                                    <p class="mb-0 text-muted">New Users</p>
                                </div>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-success"> <i class="mdi mdi-arrow-up"></i> <span>8.68%</span></h6>
                            </div>                                                        
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0 round-inner">7514</h5>
                                    <p class="mb-0 text-muted">New Orders</p>
                                </div>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-danger"> <i class="mdi mdi-arrow-down"></i> <span>2.35%</span></h6>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-rocket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <div class="m-l-10">
                                    <h5 class="mt-0 round-inner">$32874</h5>
                                    <p class="mb-0 text-muted">Total Sales</p>
                                </div>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-success"> <i class="mdi mdi-arrow-up"></i> <span>2.35%</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-8">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h5 class="header-title pb-3 mt-0">Overview</h5>
                        <div id="multi-line-chart" style="height:400px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <a href="" class="btn btn-primary btn-sm float-right">More Info</a>
                        <h5 class="header-title mt-0 pb-3">Revenue By Country</h5>
                                                                        
                        <ul class="list-unstyled list-inline text-center">
                            <li class="list-inline-item">
                                <p><i class="mdi mdi-checkbox-blank-circle text-primary mr-2"></i>Canada</p> 
                            </li>
                            <li class="list-inline-item">
                                <p><i class="mdi mdi-checkbox-blank-circle text-info mr-2"></i>USA</p>
                            </li>
                            <li class="list-inline-item">
                                <p><i class="mdi mdi-checkbox-blank-circle text-greylight mr-2"></i>London</p>    
                            </li>
                        </ul> 
                        <div id="morris-donut-chart" style="height:345px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            
            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card bg-info m-b-30">
                    <div class="card-body">
                        <div id="verticalCarousel" class="carousel slide vertical" data-ride="carousel">
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row d-flex justify-content-center text-center">
                                        <div class="col-sm-12 carousel-icon">
                                            <i class="fa fa-twitter text-white pt-3"></i>
                                        </div>
                                        <div class="col-6 text-white">                                                                
                                            <h2>54k</h2>
                                            <p class="">Followers</p>                                                                
                                        </div>
                                        <div class="col-6 text-white">                                                                
                                            <h2>44k</h2>
                                            <p class="">Tweets</p>                                                               
                                        </div>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-sm-12 carousel-icon text-center">
                                            <i class="fa fa-twitter text-white pt-3"></i>
                                        </div>
                                        <div class="col-sm-10 mx-auto text-white text-center">
                                            <p>Lorem Ipsum is simply dummy text of the <span class="warning">#TWITTER</span> and typesetting industry. A description list is perfect for defining terms.</p>
                                        </div>
                                    </div>
                                </div>                                            
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card bg-primary ">
                    <div class="card-body">
                        <div id="verticalCarousel2" class="carousel slide" data-ride="carousel">
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-lg-12 carousel-icon text-center">
                                            <i class="fa fa-facebook text-white pt-3"></i>
                                        </div>
                                        <div class="col-sm-10 mx-auto text-white text-center">
                                            <p>Lorem Ipsum is simply dummy text of the <mark> FACEBOOK </mark> and typesetting industry.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row d-flex justify-content-center text-white text-center">
                                        <div class="col-sm-12 carousel-icon">
                                            <i class="fa fa-facebook text-white pt-3"></i>
                                        </div>
                                        <div class="col-6">                                                                
                                            <h2>54k</h2>
                                            <p class="">Followers</p>                                                               
                                        </div>
                                        <div class="col-6">                                                                
                                            <h2>44k</h2>
                                            <p class="">Posts</p>                                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card bg-white m-b-30">
                    <div class="card-body new-user">
                        
                        <div class="row text-center">
                            <div class="col-6">
                                <h5><i class="mdi mdi-database mr-2 text-primary font-20"></i> 5 TB</h5>
                                <h6 class="text-lightdark">Bandwidth usage</h6>
                                <span class="text-muted"> <small>June 2018</small></span>
                            </div>
                            <div class="col-6">
                                <h5><i class="mdi mdi-download mr-2 text-success font-20"></i>5412</h5>
                                <h6 class="text-lightdark">Download count</h6>
                                <span class="text-muted"> <small>June 2018</small></span>
                            </div>
                        </div>
                        <div id="morris-area-chart" style="height: 310px"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-4">
                <div class="card bg-white m-b-30">
                    <img src="assets/images/widgets/wather.jpg" alt="" class="img-fluid">
                    
                    <div class="card-body bg-primary">                                
                        <div class="row">
                            <div class="col-6  align-self-center">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 text-center">
                                        <canvas id="partly-cloudy-day" width="70" height="70"></canvas>
                                        <h6 class="text-white">SUNDAY <span>25<sup>th</sup></span></h6>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 text-center align-self-center">
                                        <h5 class="mt-0 text-white"><b>32°</b></h5>
                                        <p class="text-white  font-12">Partly cloudy</p>
                                        <p class="text-white font-12">15km/h - 37%</p>
                                    </div>
                                </div><!-- End row -->
                            </div>
                            <div class="col-6 align-self-center">
                                <div class="row">
                                    <div class="col-6 text-center">
                                        <h6 class="text-white mt-0 font-14">MON</h6>
                                        <canvas id="rain" width="28" height="35"></canvas>
                                        <h6 class="text-white font-14">38°<i class="wi-degrees"></i></h6>
                                    </div>
                                    <div class="col-6 text-center">
                                        <h6 class="text-white mt-0 font-14">TUE</h6>
                                        <canvas id="wind" width="35" height="35"></canvas>
                                        <h6 class="text-white font-14">32°<i class="wi-degrees"></i></h6>
                                    </div>                                                                                                                                              
                                </div><!-- end row -->
                            </div>
                        </div><!-- end row -->                            
                    </div>
                </div>
            </div>                                                 
        </div>
                                                        
    </div><!-- container -->


</div> <!-- Page content Wrapper -->

</div> <!-- content -->

<?php include 'layouts/footer.php';?>