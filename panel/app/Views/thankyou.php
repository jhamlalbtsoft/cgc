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
        <link rel="icon" type="image/png" href="assets/images/favicon.png" />
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
                        <div class="logo"> 
                            <a href="<?=site_url()?>">
                                <img src="assets/images/logo.png" class="main-logo" lt="logo" /> 
                            </a>
                        </div>  
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
                                    <a href="<?=site_url()?>" class="nav-link <?=get_activemenu('Home')?>">
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
                                    <a href="<?=base_url('/login')?>" class="nav-link <?=get_activemenu('Login')?>">
                                        Applicant Login
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=base_url('/admin')?>" class="nav-link">
                                        Guest House Login
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=base_url('/list-of-district-guest-house')?>" class="nav-link">
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

        <main class="banner-area">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button> 
                </div>

                <!-- Image Sliders -->
                <div class="carousel-inner">
                <!-- Image one-->
                  <div class="carousel-item active">
                    <img src="assets/images/page-banner/banner-1.jpg" class="d-block w-100" alt="estart-banner">
                  </div>

                  <!-- image two -->
                  <div class="carousel-item">
                    <img src="assets/images/page-banner/banner-3.jpg" class="d-block w-100" lt="estart-banner">
                  </div>

                  <!-- Image Three -->
                  <div class="carousel-item">
                    <img src="assets/images/page-banner/banner-2.jpg" class="d-block w-100" lt="estart-banner">
                  </div>

                  <!-- Image Four -->
                  <div class="carousel-item">
                    <img src="assets/images/page-banner/banner-4.jpg" class="d-block w-100" lt="estart-banner">
                  </div>  
                </div>

                <!-- Carousel Controls -->
               <section>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
               </section>
              </div>
        </main> 

        <div class="contact-us-area pt-70 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="contacts-form">
                            <h3 class="text-center">Thank You for Your Registration</h3> 

                            <h5 class="text-center mt-3"><a href="<?=site_url('Home/login')?>"> Login</a></h5>

                            <h5 class="text-center mt-3"><a href="<?=site_url('Home/index')?>"> Back to Home</a></h5>

                            <form id="contactForm1" method="post" >
                               
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3"></div> 
                </div>
            </div>
        </div>

       <div class="footer-area pt-100" style="background-color: #f4f6f9;">
            <div class="container">
               
            </div>
        </div>

        <div class="footer-area mb-0 fixed-bottom">
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-lg-6 col-md-4">
                            <div class="social-content ">
                                <ul>
                                    <li><span>Copyright @ PWD Rest House Booking Portal - Mahasamund</span></li>
                                    <!-- <li>
                                        <a href="https://www.facebook.com/" target="_blank"><i class="ri-facebook-fill"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.twitter.com/" target="_blank"><i class="ri-twitter-fill"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://instagram.com/?lang=en" target="_blank"><i class="ri-instagram-line"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://linkedin.com/?lang=en" target="_blank"><i class="ri-linkedin-fill"></i></a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <div class="copy">
                                <p>© Designed by <a href="https://btsoft.in" target="_blank">BT SOFT</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="go-top">
            <i class="ri-arrow-up-s-line"></i>
            <i class="ri-arrow-up-s-line"></i>
        </div>

       <!--  <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
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

        <script>

        
</script> 

    </body> 
</html>
