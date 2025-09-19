<!DOCTYPE html>
<html lang="en">
    <head> 
        <base href="<?=site_url()?>">
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

        <link rel="stylesheet" href="assets/css/meanmenu.css" />

        <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />

        <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />

        <link rel="stylesheet" href="assets/css/magnific-popup.css" />

        <link rel="stylesheet" href="assets/css/flaticon.css" />

        <link rel="stylesheet" href="assets/css/remixicon.css" />

        <link rel="stylesheet" href="assets/css/odometer.min.css" />

        <link rel="stylesheet" href="assets/css/aos.css" />

        <link rel="stylesheet" href="assets/css/style.css" />

        <link rel="stylesheet" href="assets/css/dark.css" />
        <link rel="stylesheet" href="assets/js/select2.min.css" />

        <link rel="stylesheet" href="assets/css/responsive.css" />


        <link href="assets1/toastr.min.css" rel="stylesheet">


        
        <title>Mahasamund - Rest House Room Booking Portal</title>
        <style type="text/css">
            .form-control {
                height: 43px !important;
            }  
            .switch-box { display:none !important;}
            .owl-carousel {
                width: 100% !important;
            }
            .top-header-area { 
                padding-top: 10px !important;
                padding-bottom: 1px !important;
            }

            .slider-active .slick-prev::before {

                position: absolute;

                content: "";

                width: 0;

                height: 2px;

                background: #fff;

                left: -40px;

                top: 13px;

                transition: .3s;

            }



            .slider-active-2 .slick-prev::before {

                display: none;

            }



            .slider-active-2 .slick-next::before {

                position: absolute;

                content: "";

                width: 50px;

                height: 2px;

                background: #fff;

                right: 0;

                top: 22px;

                left: -4px;

            }

            .slider-content h1{
              color:#fff;
            }
            @media (max-width: 767px){
            .slider-height {
                min-height: 450px;
            }
              .slider-content h1 span {
                font-size: 35px;
            }
              .slider-content h1 {
                font-size: 30px;
                line-height: 43px;
            }

            }

            .main-logo{
                    width: 80px !important;
            }

            .preloader-area {
                background: white !important;
            }

            .default-btn {
                display: block;
                width: 100%;
                padding : 8px !important;
            }

            /*@media (min-width: 1400px) {*/
                .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
                    max-width: 100%;
                }
            /*}*/

            select.readonly {
                background-color: #f9f9f9;
                color: #555;
                cursor: not-allowed;
            }

            input.readonly, input[readonly] {
                background-color: #f9f9f9; /* Light background color */
                color: #555;               /* Gray text color */
                cursor: not-allowed;       /* Not-allowed cursor */
            }

            .form-label {
                margin-bottom: .2rem;
            }

            .main-logo {
                            width: 80px !important;
                        }
</style>
    </head>
    <body>
        <?php 

            $db      = \Config\Database::connect();
            $myrequest = \Config\Services::request();
            $session = \Config\Services::session();
            $username ='';
            if ($session->get('sid')>0) { 
                $sid = $session->get('sid');
                $query=$db->query("select * from register where id='".$sid."'"); 
                $rowt=$query->getRow(); 
                $username = $rowt->name;
            }
         ?>
        <div class="preloader-area">
            <div class="spinner">
                <img src="assets/images/logo.png" class="main-logo" lt="logo" />
            </div>
        </div>

        <div class="top-header-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="header-left-content text-center">
                            <h5 style="color: white !important;"> PWD Rest House Booking Portal - Mahasamund </h5>
                            <?php if(!empty($username)){ ?>
                                <h6 style="text-align: center;color: white !important;">Welcome <?=$username?> !</h6>
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 d-none">
                        <div class="header-right-content">
                            <div class="list">
                                <ul>
                                    <li><a href="#">Students</a></li>
                                    <li><a href="#">Faculty & Staff</a></li>
                                    <li><a href="#">Visitors</a></li>
                                    <li><a href="#">Academics</a></li>
                                    <li><a href="#">Alumni</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="navbar-area nav-bg-2">
            <div class="mobile-responsive-nav">
                <div class="container">
                    <div class="mobile-responsive-menu">
                        <!-- <div class="logo"> -->
                            <a href="<?=site_url()?>">
                                <img src="assets/images/logo.png" class="main-logo" lt="logo" />
                                <div class="logo-text">
                                    <!-- <strong lang="hi" class="site_name_regional">महासमुंद</strong>
                                    <h1 class="site_name_english">Mahasamund </h1> -->
                                </div>
                                <!-- <img src="assets/images/white-logo.png" class="white-logo" alt="logo" /> -->
                            </a>
                        <!-- </div> -->
                    </div>
                </div>
            </div>

            <div class="desktop-nav">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="<?=site_url()?>">
                            <img src="assets/images/logo.png" class="main-logo" lt="logo" />   
                        </a>
                        <div class="logo-text mt-2">
                            <strong lang="hi" class="site_name_regional">महासमुंद</strong>
                            <h4>MAHASAMUND </h4>
                        </div>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto"> 
                                
                                <li class="nav-item">
                                    <a href="<?=site_url('Booking/newbooking')?>" class="nav-link <?=get_activemenu('Newbooking')?>">
                                        New Booking
                                    </a> 
                                </li>

                                <li class="nav-item"> 
                                    <a href="<?=site_url('Home/printBookingSlip')?>" class="nav-link <?=get_activemenu('printBookingSlip')?>">
                                        Print Booking Slip
                                    </a> 
                                </li> 

                                <li class="nav-item">
                                    <a href="<?=site_url('Home/feedbackform')?>" class="nav-link <?=get_activemenu('feedbackform')?>">
                                        Visitor Feedback Form
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?=site_url('Home/changepassword')?>" class="nav-link <?=get_activemenu('changepassword')?>">
                                        Change Password
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?=base_url('/logout_front')?>" class="nav-link">
                                        Logout
                                    </a> 
                                </li>
                            </ul>
                            <div class="others-options">
                                <!-- <div class="icon">
                                    <i class="ri-menu-3-fill" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
                                </div> -->
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="others-option-for-responsive">
                <div class="container">
                    <div class="dot-menu">
                        <div class="inner">
                            <!-- <div class="icon">
                                <i class="ri-menu-3-fill" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>