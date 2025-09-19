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


        <!-- <link rel="stylesheet" href="assets/css/font-awesome.min.css"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 

        <link rel="icon" type="image/png" href="assets/images/favicon.png" />

        <script src="assets/js/jquery.min.js"></script>

        <script src="assets/js/bootstrap.bundle.min.js"></script>

        <script src="assets/js/jquery.meanmenu.js"></script>

        <script src="assets/js/owl.carousel.min.js"></script>

        <script src="assets/js/carousel-thumbs.min.js"></script>

        <script src="assets/js/jquery.magnific-popup.js"></script>

        <script src="assets/js/aos.js"></script>

        <script src="assets/js/odometer.min.js"></script>

        <script src="assets/js/appear.min.js"></script>

        <script src="assets/js/form-validator.min.js"></script>

        <script src="assets/js/contact-form-script.js"></script>

        <script src="assets/js/ajaxchimp.min.js"></script>

        <script src="assets/js/custom.js"></script>
        <script src="assets/js/select2.min.js"></script>

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
        </style>
    </head>
    <body>        
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
                                    <a href="<?=site_url()?>" class="nav-link">
                                        Home
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?=base_url('/')?>#newregistration" class="nav-link">
                                        New User Registration
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?=base_url('/check')?>" class="nav-link">
                                        Check Availability
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?=base_url('/login')?>" class="nav-link">
                                        Applicant Login
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=base_url('/admin')?>" class="nav-link">
                                        Guest House Login
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=base_url('/list-of-district-guest-house')?>" class="nav-link active">
                                        List of District Guest House
                                    </a>
                                </li>
                            </ul>
                            <div class="others-options">
                                <!-- <div class="icon">
                                    <i class="ri-menu-3-fill" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
                                </div> -->
                            </div>
                        </div>
                        <a class="navbar-brand" href="<?=site_url()?>">
                            <img src="assets/images/gandhi.png" style="width:100px;" lt="logo" />   
                        </a>
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

        <div class="academic-area pb-70 bg-f4f6f9" id="newregistration">
            <div class="container"> 
                <div class="row justify-content-center">
                    <div class="first_page ">
                        <div class="estemate-form  mt-3">
                            
                            <div class="row">
                            <div class="col-lg-12">

                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                                    <div class="section-title show1">
                                        <h5>List of District Guest House</h5> 
                                    </div> 
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                           
                            <form action="#" method="post" enctype="multipart/form-data" id="add_form">
                                 
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-10">
                                       <div class="table-responsive">
                                            <table class="table table-bordered table-stripped">
                                                <thead>
                                                    <tr>
                                                        <th>SNo.</th>
                                                        <th>Guest House</th>
                                                        <th>Address </th>
                                                        <th>Contact Person</th>
                                                        <th>Contact No</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $j=1;
                                                    foreach ($guesthouse_list as $row) { ?>
                                                    <tr>
                                                        <td><?=$j++?></td>
                                                        <td><?=$row['name']?></td>
                                                        <td><?=$row['address']?></td>
                                                        <td><?=$row['contact_person']?></td>
                                                        <td><a href="tel:<?=$row['mobileno']?>"><?=$row['mobileno']?></td>
                                                    </tr> 
                                                    <?php }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> 
                                    <div class="col-lg-1"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
