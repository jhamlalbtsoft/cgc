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
                            
                            <!-- <div class="logo-text">
                                <strong lang="hi" class="site_name_regional">महासमुंद</strong>
                                <h1 class="site_name_english">Mahasamund </h1>
                            </div> -->
                            <!--<img src="assets/images/logo.png" class="main-logo" alt="logo" />-->
                            <!--<img src="assets/images/white-logo.png" class="white-logo" alt="logo" />-->
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto"> 
                                <li class="nav-item">
                                    <a href="<?=site_url()?>" class="nav-link active">
                                        Home
                                    </a> 
                                </li>

                                <li class="nav-item"> 
                                    <a href="#newregistration" class="nav-link active">
                                        New User Registration
                                    </a> 
                                </li> 

                                <li class="nav-item">
                                    <a href="#apply-job" class="nav-link active">
                                        Check Availability
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?=base_url('/login')?>" class="nav-link active">
                                        Applicant Login
                                    </a> 
                                </li>
                                <li class="nav-item">
                                    <a href="#courses-area" class="nav-link active">
                                        Guest House Login
                                    </a> 
                                </li>
                                <li class="nav-item">
                                    <a href="#courses-area" class="nav-link active">
                                        List of State Guest House
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
                            <h3>Registration Form</h3>
                            <form id="add_form" method="post" action="<?=base_url('Home/finalsave')?>" enctype="multipart/form-data">
                                <?php 
                                    $session = \Config\Services::session();
                                    echo \Config\Services::validation()->listErrors();
                                ?>
                                                  
                                  <?php if (isset($message) && !empty($message)):
                                      echo '<div class="alert alert-primary" role="alert">
                                              <button type="button" class="close" data-dismiss="alert">x</button>
                                             '.$message.'
                                            </div>';
                                      ?>  
                                  <?php endif; ?> 
                                  <?php

                                    $db      = \Config\Database::connect();
                                    $myrequest = \Config\Services::request();
                                    $session = \Config\Services::session();

                                    $sid = $session->get('sid');
                                    $query=$db->query("select * from register where id='".$sid."'"); 
                                    $rowt=$query->getRow(); 

                                    ?>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Full Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control form-control-sm" required data-error="Please enter name" required name="full_name" value="<?=$rowt->name?>" readonly/>
                                            <input type="hidden" name="sid" class="form-control sid" id="sid"/>

                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Gender<span class="text-danger">*</span></label>
                                             <select class="form-select form-select-md mb-3 select2" id="gender" name="gender" required>
                                                    <option value="">Select Gender</option>
                                                    <option value="Male" <?php if ($rowt->gender=='Male') { echo 'selected'; } ?>>Male </option>
                                                    <option value="Female" <?php if ($rowt->gender=='Female') { echo 'selected'; } ?>>Female</option>
                                                    <option value="Prefer Not to Say" <?php if ($rowt->gender=='Prefer Not to Say') { echo 'selected'; } ?>>Prefer Not to Say</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Age<span class="text-danger">*</span></label>
                                            <input type="text" id="age" class="form-control" required data-error="Please enter Age" name="age"  value="<?=$rowt->age?>"/>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>City <span class="text-danger">*</span></label>
                                             <select class="form-select form-select-md mb-3 select2" name="city" id="city" required>
                                                  <option value="">Choose City</option>
                                                  <?php 
                                                        foreach ($city_list as $row) {
                                                          echo '<option value="'.$row['name'].'"';
                                                          if ($row['name']==$rowt->city) {
                                                              echo "selected";
                                                          }
                                                          echo ' >'.$row['name'].'</option>';
                                                        }
                                                    ?>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 address">
                                        <div class="form-group">
                                            <label>Enter Address <span class="text-danger">*</span></label>
                                            <input type="text" name="address" id="address" data-error="Please Enter Address" class="form-control" value="<?=$rowt->address?>"/>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Mobile <span class="text-danger">*</span></label>
                                            <input type="text" name="mobileno" id="mobileno" required data-error="Please enter number" class="form-control" name="mobileno" value="<?=$rowt->mobileno?>" readonly/>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input type="email" id="emailid" class="form-control" required data-error="Please enter email" name="emailid" value="<?=$rowt->emailid?>"/>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>ID Proof <span class="text-danger">*</span></label>
                                             <select class="form-select form-select-md mb-3 select2" id="guestid" name="guestid" required>
                                                    <option value="">Select ID Proof</option>
                                                    <option value="Driving Licence" <?php if ($rowt->guestid=='Driving Licence') { echo 'selected'; } ?>>Driving Licence</option>
                                                    <option value="Aadhaar Card" <?php if ($rowt->guestid=='Aadhaar Card') { echo 'selected'; } ?>>Aadhaar Card</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Guest Type<span class="text-danger">*</span></label><br>
                                            <select  id="guesttype" style="max-height: 70px !important;overflow-y: auto;" data-error="Please enter Course" class="form-select form-select-md mb-3 select2" name="guesttype">
                                                <option value="">Select Guest type</option>
                                                <option value="Govt." <?php if ($rowt->guesttype=='Govt.') { echo 'selected'; } ?>>Govt.</option>
                                                <option value="Private" <?php if ($rowt->guesttype=='Private') { echo 'selected'; } ?>>Private</option>
                                                <option value="Department" <?php if ($rowt->guesttype=='Department') { echo 'selected'; } ?>>Department</option>
                                            </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12 col-sm-12 guestidfile">
                                        <div class="form-group">
                                            <label>Select File <span class="text-danger">*</span></label>
                                            <input type="file" name="guestidfile" id="guestidfile" data-error="Please Enter Select File" class="form-control" />
                                            <div class="help-block with-errors"></div>
                                            <input type="hidden" name="guestidfile_old" value="<?=$rowt->guestidfile?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input name="gridCheck" value="I agree to the terms and privacy policy." class="form-check-input" type="checkbox" id="gridCheck" required />
                                            <label class="form-check-label" for="gridCheck"> I agree to the <a href="terms-conditions.html">terms</a> and <a href="privacy-policy.html">privacy policy</a> </label>
                                            <div class="help-block with-errors gridCheck-error"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn">
                                            <span>Submit</span>
                                        </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3"></div> 
                </div>
            </div>
        </div>
         

        <div class="footer-area pt-100 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="footer-logo-area">
                            <!--<a href="index.html"><img src="assets/images/white-logo.png" alt="Image" /></a>-->
                            <p style="font-size: 18px;">E-Start</p>
                            <p style="font-size: 14px;">Building Chhattisgarh’s IT hub</p>
                            <div class="contact-list">
                                <ul>
                                    <li><a href="tel:+01987655567685">+01-9876-5556-7685 </a></li>
                                    <li>
                                        <a href="#">
                                            <span class="__cf_email__" data-cfemail="1a7b7e7773745a697b746f347f7e6f">[email&#160;protected]</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                     
                </div>
                <div class="shape">
                    <img src="assets/images/shape-1.png" alt="Image" />
                </div>
            </div>
        </div>

        <div class="copyright-area">
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-lg-6 col-md-4">
                            <div class="social-content ">
                                <ul>
                                    <li><span>Copyright @ E-Start</span></li>
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
        <script src="assets/js/jquery.session.min.js"></script>

        <script>

          // $(document).ready(function() {
          //   var currentYear = new Date().getFullYear();
          //   var yearSelect = $('#Passed_Year');

          //   for (var i = 0; i <= 50; i++) {
          //     var yearOption = $('<option>').text(currentYear - i);
          //     yearSelect.append(yearOption);
          //   }
          // });

           var level;
           var year;
            $(document).ready(function() {
            $('#Current_level, #Passed_experience').on('change', function() {
              
              year = $('#Passed_experience').val();
              if (year === "No") {
                $('#Past_Experience_container').hide();      
              } else 
              {
                 $('#Past_Experience_container').show(); 
                 $('#Past_Experience').attr('required',true);

              }

              Current_level = $('#Current_level').val();
              if (Current_level === "Senior Secondary") { 
                 $('.course_view').hide();     
                 $('#course').attr('required',false);
              } else 
              {
                 $('.course_view').show(); 
                 $('#course').attr('required',true);

              }
            });

            $('#course').on('change', function() {
              course = $('#course').val();
              // console.log(course);
              if (course=="Other") {
                 $('.other_course').show(); 
                 $('#other_course').attr('required',true)
                             
              } else 
              {
                $('.other_course').hide();   
              }
            });

            $('#home_town').on('change', function() {
              home_town = $('#home_town').val();
              // console.log(course);
              if (home_town=="Other") {
                 $('.other_home_town').show(); 
                 $('#other_home_town').attr('required',true)
                             
              } else 
              {
                $('.other_home_town').hide();   
              }
            });

            $('#college').on('change', function() {
              college = $('#college').val();
              // console.log(college);
              if (college=="Other") {
                 $('.other_college').show(); 
                 $('#other_college').attr('required',true)
                             
              } else 
              {
                $('.other_college').hide();   
              }
            });
          });

        // $(document).ready(function() {
        //     var id = $.session.get("sid");
        //     if (id >0)
        //     {  
        //         $.ajax({
        //                 url:"<?=base_url('Home/GetListById')?>",
        //                 type: "post", 
        //                 data:{
        //                     id:id
        //                 },
        //                 dataType: "json",
        //                 contentType:"application/json",
        //                 success: function(data) 
        //                 {
        //                 var obj = JSON.parse(data);
        //                   $("#name").val(obj.name);
        //                   $("#password").val(obj.password);
        //                   $("#gender").val(obj.gender);
        //                   $("#age").val(obj.age);
        //                   $("#mobileno").val(obj.mobileno);
        //                   $("#emailid").val(obj.emailid);
        //                   $("#address").val(obj.address);
        //                   $("#city").val(obj.city);
        //                   $("#guestid").val(obj.guestid);
        //                   $("#guestidfile").val(obj.guestidfile);
        //                   $("#guesttype").val(obj.guesttype);
        //                   $("#sid").val(obj.id);

        //                 },
        //                 error: function() 
        //                 {
        //                     alert("Error while retrieving data of :"+ id);
        //                 }
        //             });         
        //     }
        //     else
        //     {
        //         alert('id not found');
        //     }
        // });



        // $("#add_form").on("submit", function( event ) {
        //         event.preventDefault();               
        //         var form = document.getElementById("add_form");
        //         var formdata = new FormData(form);
        //         data = "list=list";        
        //         $.ajax({
        //             url: "<?=base_url('Home/finalsave')?>",
        //             type:'POST',
        //             contentType: false,
        //             processData: false,
        //             data: formdata,
        //             success: function(response) {  
        //                 console.log(response);
        //                 // var obj = JSON.parse(response);
        //                 if(response.id>0) 
        //                 {            
        //                     // $(".sid").val(response.id);
        //                     // $.session.set("send_otp", "1234");
        //                     // $.session.set("sid", response.id);
        //                     // $.session.set("full_name", response.name);
        //                     // $.session.set("mobileno", response.mobileno);
        //                     // $.session.set("password", response.password);
        //                     // // alert($.session.get("myVar"));
        //                     // $('.registration').hide();
        //                     // $('#full_name').attr('readonly',true);
        //                     // $('#mobileno').attr('readonly',true);
        //                     // $(".otp_page").show(); 
        //                 }        
        //             },
        //             error: function(XMLHttpRequest, textStatus, errorThrown) {
                       
        //             }       
        //         });
        //     });

        // $(".select2").select2({
        //     // placeholder: "-- Select --",
        //     allowClear: true
        // }); 





               function mainSlider() {

        var BasicSlider = $(".slider-active");

        BasicSlider.on("init", function (e, slick) {

            var $firstAnimatingElements = $(".single-slider:first-child").find(

                "[data-animation]"

            );

            doAnimations($firstAnimatingElements);

        });

        BasicSlider.on("beforeChange", function (e, slick, currentSlide, nextSlide) {

            var $animatingElements = $(

                '.single-slider[data-slick-index="' + nextSlide + '"]'

            ).find("[data-animation]");

            doAnimations($animatingElements);

        });

        BasicSlider.slick({

            autoplay: false,

            autoplaySpeed: 10000,

            dots: true,

            fade: true,

            arrows: true,

            prevArrow: "<button type='button' class='slick-prev pull-left'>prev</button>",

            nextArrow: "<button type='button' class='slick-next pull-right'>next</button>",

            responsive: [

                { breakpoint: 767, settings: { dots: false, arrows: false } }

            ]

        });



        function doAnimations(elements) {

            var animationEndEvents =

                "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";

            elements.each(function () {

                var $this = $(this);

                var $animationDelay = $this.data("delay");

                var $animationType = "animated " + $this.data("animation");

                $this.css({

                    "animation-delay": $animationDelay,

                    "-webkit-animation-delay": $animationDelay

                });

                $this.addClass($animationType).one(animationEndEvents, function () {

                    $this.removeClass($animationType);

                });

            });

        }

    }

    mainSlider();
</script> 

    </body> 
</html>
