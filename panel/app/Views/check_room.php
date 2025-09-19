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
        <link href="assets1/toastr.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>  
        <script src="assets1/sstoast.js"></script>

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
 
        .img-border {
          border: 2px solid #000; /* You can customize the border style, width, and color here */
          padding: 5px; /* Optional: Adds padding inside the border */
          margin-bottom: 15px; /* Optional: Adds space between rows */
        }  


        .loader {
          width: 64px;
          height: 64px;
          position: relative;
          background: #FFF;
          border-radius: 4px;
          overflow: hidden;
        }

        .loader:before {
          content: "";
          position: absolute;
          left: 0;
          bottom: 0;
          width: 40px;
          height: 40px;
          transform: rotate(45deg) translate(30%, 40%);
          background: #ff9371;
          box-shadow: 32px -34px 0 5px #ff3d00;
          animation: slide 2s infinite ease-in-out alternate;
        }

        .loader:after {
          content: "";
          position: absolute;
          left: 10px;
          top: 10px;
          width: 16px;
          height: 16px;
          border-radius: 50%;
          background: #ff3d00;
          transform: rotate(0deg);
          transform-origin: 35px 145px;
          animation: rotate 2s infinite ease-in-out;
        }

        @keyframes slide {
          0% , 100% {
            bottom: -35px
          }

          25% , 75% {
            bottom: -2px
          }

          20% , 80% {
            bottom: 2px
          }
        }

        @keyframes rotate {
          0% {
            transform: rotate(-15deg)
          }

          25% , 75% {
            transform: rotate(0deg)
          }

          100% {
            transform: rotate(25deg)
          }
        }
          
        </style>
    </head>
    <body>        
        <div class="preloader-area">
            <div class="spinner">
                <img src="assets/images/logo.png" class="main-logo" lt="logo" />
            </div>
        </div>

        <div class="modal fade" id="imagemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Guest Room Image</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body"> 
                <div class="row">                    
                    <div class="col-12">
                       <div class="loader" style="display:none;text-align: center;"></div>
                       <div id="image_detail">Loading ....</div>
                    </div>                    
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
              </div>
            </div>
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
                                    <a href="<?=base_url('/check')?>" class="nav-link active">
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

        <div class="academic-area pb-70 bg-f4f6f9" id="newregistration" >
            <div class="container" > 
                <div class="row justify-content-center">
                    <div class="first_page ">
                        <div class="estemate-form  mt-3" style="min-height: 45vh;"> 
                            <div class="row">
                            <div class="col-lg-12">

                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                                    <div class="section-title show1">
                                        <h5>Online Room Booking System(Booking Request)</h5> 
                                    </div> 
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                                    <div class="section-title show2" style="display: none;">
                                        <h5>Check-in Details</h5> 
                                    </div> 
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                            <form action="#" method="post" enctype="multipart/form-data" id="add_form">
                                <?php 
                                    $session = \Config\Services::session();
                                    echo \Config\Services::validation()->listErrors();
                                ?>
                                                  
                                  <?php   
                                        if (isset($message) && !empty($message)):
                                            echo $message;die();
                                        endif;
                                        //echo \Config\Services::validation()->listErrors();
                                    ?>
                                    <?php 

                                    $db      = \Config\Database::connect();
                                    $myrequest = \Config\Services::request();
                                    $session = \Config\Services::session();

                                    $sid = $session->get('sid');
                                    $query=$db->query("select * from register where id='".$sid."'"); 
                                    $rowt=$query->getRow(); 
                                 ?>
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-3 d-none">
                                                <label class="form-label">Guest House </label>
                                                <select class="form-select form-select-md mb-2 select2" name="guesthouse_id" id="guesthouse_id" required>
                                                      <option value="">Choose Guest House</option>
                                                      <?php 
                                                            foreach ($guesthouse_list as $row) {
                                                              echo '<option value="'.$row['id'].'"';
                                                              echo ' >'.$row['name'].'</option>';
                                                            }
                                                        ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">Check In Date <span class="text-danger">*</span> </label>
                                                <input type="date" class="form-control form-control-md mb-2" placeholder="Check in Date" id="checkin_date" name="checkin_date" onblur="tolAmount();" onchange="getAmount();" min="<?=date('Y-m-d')?>" value="<?=date('Y-m-d')?>" required/>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">No.of Days <span class="text-danger">*</span> </label>
                                                
                                                <select type="text" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" maxlength="10" class="form-control form-control-md mb-2" placeholder="Enter No Of Days" id="no_of_days" value="1" name="no_of_days" onblur="tolAmount();" onchange="tolAmount();" required> 
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>

                                                <span class="text-danger error no_of_days"></span>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">Check Out Date <span class="text-danger">*</span> </label>
                                                <input type="date" class="form-control mb-2" placeholder="Check Out Date" value="<?=date('Y-m-d', strtotime('+1 days'))?>" id="checkout_date" name="checkout_date" required readonly/>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">&nbsp;</label>
                                                <button type="button" class="default-btn btn checkAvailability show1">Check Availability </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1"></div> 
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-10">
                                        <div class="availability_list"></div>
                                    </div>
                                    <div class="col-lg-1"></div>
                                </div>
                            <div class="show2" style="display:none;">
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="form-label">Booking For </label>
                                                <select class="form-select form-select-md mb-2 select2" name="booking_for" id="booking_for" required>
                                                      <option value="Self">Self</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">Room Category </label>
                                                <select class="form-select form-select-md mb-2 select2" onchange="getAmount()" name="room_type" id="room_type" required>
                                                      <option value="">Choose Room Category</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">No of rooms/Beds <span class="text-danger">*</span> </label>
                                                <select type="text" class="form-select form-select-md mb-2" placeholder="No of rooms/Beds" id="no_of_rooms" name="no_of_rooms" required>
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                                <span class="text-danger error no_of_rooms"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-10">
                                        <div class="section-title mt-3">
                                            <h5>Billing Information</h5> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-md-4  mb-3">
                                        <label class="form-label">Room charges(INR) <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" placeholder="Room charges(INR)" id="room_charges" readonly name="room_charges" required/>
                                    </div>
                                    <div class="col-md-4  mb-3">
                                        <label class="form-label">Amount to Pay (INR) <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" placeholder="Amount to Pay (INR)" id="tol_amount" readonly name="tol_amount" required/>
                                    </div>
                                    <div class="col-lg-1"></div>
                                </div>
                                <div class="section-title mt-5">
                                    <h5>Users Details</h5> 
                                </div>
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-md-4  mb-3">
                                        <label class="form-label">Mobile Number <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" placeholder="Mobile Number" id="mobileno" name="mobileno" readonly value="<?=@$rowt->mobileno?>" required/>
                                    </div>
                                    <div class="col-md-4  mb-3">
                                        <label class="form-label">Email ID <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" placeholder="Email ID" id="emailid" name="emailid" readonly value="<?=@$rowt->emailid?>" required/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-md-4  mb-3">
                                        <label class="form-label">Department <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" placeholder="Department" id="department" name="department" value="<?=@$rowt->city?>" required/>
                                    </div>
                                    <div class="col-md-4  mb-3">
                                        <label class="form-label">Designation <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" placeholder="Designation" id="designation" name="designation"/>
                                        <span class="text-danger error designation"></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-10">
                                        <div class="section-title" style="display: none;">
                                            <h5>Main Guest Contact/Identification Details</h5> 
                                        </div> 
                                    </div>
                                    <div class="col-lg-1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-md-4  mb-3">
                                        <label class="form-label">Visitor Name <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" placeholder="Visitor Name" id="visitor_name" readonly name="visitor_name" value="<?=@$rowt->name?>" required/>
                                    </div>
                                    <div class="col-md-4  mb-3">
                                        <label class="form-label">Mobile Number <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" placeholder="Mobile Number" id="visitor_mobileno" readonly name="visitor_mobileno" value="<?=@$rowt->mobileno?>" required/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-md-4  mb-3">
                                        <label class="form-label">Purpose of Visit <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" placeholder=" Purpose of Visit" id="purpose_for_visit" name="purpose_for_visit"/>
                                        <span class="text-danger error purpose_for_visit"></span>
                                    </div>
                                    <div class="col-md-4  mb-3">
                                        <label class="form-label">Nationality <span class="text-danger">*</span> </label>
                                        <select class="form-select form-select-md mb-3 select2" name="nationality" id="nationality" required>
                                              <option value="Indian">Indian</option>
                                              <option value="Foreigner">Foreigner</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-md-4  mb-3">
                                        <label class="form-label">Postal Address <span class="text-danger">*</span> </label>
                                        <textarea type="text" class="form-control" placeholder="Postal Address" id="address" name="address" value="<?=@$rowt->address?>"></textarea>
                                        <span class="text-danger error address"></span>
                                    </div>
                                    <div class="col-md-4  mb-3">
                                        <label class="form-label">Email ID   <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" placeholder="Email ID   " id="visitor_emailid" readonly name="visitor_emailid" value="<?=@$rowt->emailid?>" required/>
                                    </div>
                                </div>
                              
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-10">
                                        <div class="section-title" style="display: none;">
                                            <h5>Other Member Details( if Any)</h5> 
                                        </div> 
                                    </div>
                                    <div class="col-lg-1"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-10 col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" id="tbl_product">
                                                <thead>
                                                    <tr>
                                                        <th class="align-top">Name  </th>
                                                        <th class="align-top">Gender  </th>          
                                                        <th class="align-top">Age</th>
                                                        <th class="align-top">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tableBody">
                                                    <tr>
                                                        <td style="vertical-align: top;">
                                                            <input type="text" id="guestname" class="form-control" placeholder="Enter Guest Name">
                                                        </td>
                                                        <td style="vertical-align: top;">
                                                            <select type="text"  id="guestgender" class="form-control"  placeholder="Enter Gender">
                                                                <option>Male</option>
                                                                <option>Female</option>
                                                            </select>
                                                        </td>
                                                        <td style="vertical-align: top;">
                                                            <input type="text"  id="guestage" class="form-control"  placeholder="Enter Age">
                                                        </td>
                                                        <td style="width: 5%;vertical-align: middle;">
                                                            <button type="button" class="default-btn btn addnew"><i class="fa fa-plus"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-10"> Note : Please carry a valid photo Identity card along with Booking Slip at the time of Check-in in the Guest house.    
                                    </div>
                                    <div class="col-lg-1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-2">
                                        <label class="form-label">&nbsp;</label>
                                        <button type="submit" class="default-btn btn addButton">Book Now </button>
                                    </div>
                                </div>
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

        <script type="text/javascript">

            // $(document).ready(function(){
            //     $('#checkin_date').datepicker({
            //         minDate: 0, // Set the minimum date to today (0 means today)
            //         dateFormat: 'dd-mm-yy',
            //         changeMonth: false,
            //         changeYear: false,
            //         //showButtonPanel: true,
            //         autoclose: true,
            //     });
            // });

            $(document).ready(function()
            { 
                $(".addnew").click(function()
                {
                      var guestname = $("#guestname").val();
                      var guestgender = $("#guestgender").val();
                      var guestage = $("#guestage").val();
                      if (guestname=='') {
                        alert('Please Enter Guest Name');return;
                      }
                      var markup = "<tr class='edit'>"
                        +"<td>"+guestname+"<input type='hidden' class='guestname' name='guestname[]' value='"+guestname+"'>"
                        +"<td>"+guestgender+"<input type='hidden' class='guestgender' name='guestgender[]' value='"+guestgender+"'></td>"
                        +"<td>"+guestage+"<input type='hidden' class='guestage' name='guestage[]' value='"+guestage+"'></td>"
                        +"<td><button type='button' class='btn btn-icon btn-danger btn-xs mr-2 deleterow'><i class='fa fa-trash'></i></button></td></tr>";
                        $("#tableBody").append(markup);         
                        $("#guestname").focus();
                    clearText();
                });
            });

            function clearText(){
                $('#guestname,#guestage').val('');
                $('#guestngender').val('Male');
            }

            $(document).on('click','.deleterow',function()
              {                   
                  $(this).closest('tr').remove();
              });

            $(".checkAvailability").on("click", function( event ) {
                event.preventDefault();               
                guesthouse_id = $('#guesthouse_id').val();
                checkin_date = $('#checkin_date').val();
                no_of_days = $('#no_of_days').val();
                checkout_date = $('#checkout_date').val();
                // if (guesthouse_id<0 || guesthouse_id=='') {
                //     errorMsg('Please Select Guest House');return;
                // }
                if (checkin_date=='') {
                    errorMsg('Please Enter Check In Date');return;
                }
                if (no_of_days<0 || no_of_days=='') {
                    errorMsg('Please Enter No Of Days');return;
                }
                if (checkout_date=='') {
                    errorMsg('Please Enter Check Out Date');return;
                }
                data = "list=list";        
                $.ajax({
                    url: "<?php echo base_url('Booking/checkAvailability1');?>",
                    type:'POST',
                    data: data+'&guesthouse_id='+guesthouse_id+'&checkin_date='+checkin_date+'&no_of_days='+no_of_days+'&checkout_date='+checkout_date,
                    success: function(response) {  
                        console.log(response);
                        $('.availability_list').html(response);
                        // var obj = JSON.parse(response);
                        // if(response>0) 
                        // {            
                        //     $(".sid").val(response);
                        //     $('.registration').hide();
                        //     $('#name').attr('readonly',true);
                        //     $('#mobileno').attr('readonly',true);
                        //     $(".otp_page").show(); 
                        // }        
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                       
                    }       
                });
            });

            $("#add_form").on("submit", function( event ) {
                event.preventDefault();             
                guesthouse_id = $('#guesthouse_id').val();
                checkin_date = $('#checkin_date').val();
                no_of_days = $('#no_of_days').val();
                checkout_date = $('#checkout_date').val();
                if (guesthouse_id<0) {
                    alert('Please Select Guest House');
                }
                if (checkin_date=='') {
                    alert('Please Enter Check In Date');return;
                }
                if (no_of_days<0) {
                    alert('Please Enter No Of Days');return;
                }
                if (checkout_date=='') {
                    alert('Please Enter Check Out Date');return;
                }
                $(".addButton").prop('disabled', true);
                $('.error').html(''); 

                var form = document.getElementById("add_form");
                var formdata = new FormData(form);      
                $.ajax({
                    url: "<?php echo base_url('Booking/saveBooking');?>",
                    type:'POST',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,

                    success: function(response) {   
                            $('.indicator-label').css('display', 'block');
                            $('.indicator-progress').css('display', 'none'); 
                            $(".addButton").prop('disabled', false); 
                            var obj = JSON.parse(response);
                            if(obj.resp==1) 
                            {            
                                alert("Thank You for Your Booking.. We Will Confirm You Soon.");
                                location.reload();
                            }
                            else
                            { 
                                $.each(obj.errors, function(key, value) {
                                    $("."+key+"").html(value);
                                });
                                alert('Some field empty please fill first and submit');
                            }
                            $(".addButton").prop('disabled', false);                                
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            $.each(XMLHttpRequest.responseJSON.errors, function(key, value) {
                                $("."+key+"").html(value);
                            });
                            alert('Some field empty please fill first and submit');
                            $(".addButton").prop('disabled', false); 
                        } 

                                   
                });
            });

            $("#guesthouse_id").on("change", function( event )
            {
                $("#room_type").html(''); 
                var data = "list=list";
                var guesthouse_id = $('#guesthouse_id').val();
                $.ajax({
                    url: "<?php echo site_url('Booking/getRoomtype');?>",
                    type: "POST",
                    data: data+'&guesthouse_id='+guesthouse_id,
                    cache: false,
                    success: function (html) 
                    {                 
                        $("#room_type").append(html);    
                        getAmount();    
                    }
                });
            });

            function getAmount()
            {
                room_id = $("#room_type").val(); 
                $('#room_charges').val(0);
                var data = "list=list";
                var guesthouse_id = $('#guesthouse_id').val();
                $.ajax({
                    url: "<?php echo site_url('Booking/getAmount');?>",
                    type: "POST",
                    data: data+'&guesthouse_id='+guesthouse_id+'&room_id='+room_id,
                    cache: false,
                    success: function (html) 
                    {                 
                        $("#room_charges").val(html);  
                    }
                });
            }

            function tolAmount(){ 
                checkin_date = $('#checkin_date').val();
                console.log(checkin_date);
                if (checkin_date=='') {
                     alert('Please select check in date');return;
                }
                no_of_days = $('#no_of_days').val() || 0;
                if (no_of_days>2) {
                    $('#no_of_days').val('2');
                    alert('Number of days more than two is not allowed');
                    no_of_days = 2;
                } 
                if (no_of_days===0 || no_of_days=='') {
                    alert('Please enter valid number');return;
                }
                room_charges = $('#room_charges').val() || 0;
                $('#tol_amount').val((parseFloat(room_charges)*parseFloat(no_of_days)).toFixed(2)); 

                getcheckoutdate(checkin_date,no_of_days);
            }

            function getcheckoutdate(checkin_date,no_of_days) {
                var data = "list=list";
                var guesthouse_id = $('#guesthouse_id').val();
                $.ajax({
                    url: "<?php echo site_url('Booking/getcheckoutdate');?>",
                    type: "POST",
                    data: data+'&checkin_date='+checkin_date+'&no_of_days='+no_of_days,
                    cache: false,
                    success: function (res) 
                    {        
                        $('#checkout_date').val(res);
                        getAmount();
                    }
                });
            }

            function checkloginuser(guesthouse_id,room_id) { 
                checkin_date = $('#checkin_date').val();
                checkout_date = $('#checkout_date').val();
                $.ajax({
                    url: "<?php echo site_url('Booking/setsessionforbooking');?>",
                    type: "POST",
                    data: data+'&checkin_date='+checkin_date+'&checkout_date='+checkout_date+'&guesthouse_id='+guesthouse_id+'&room_id='+room_id+'&no_of_days='+no_of_days,
                    cache: false,
                    success: function (res) 
                    {        
                        location.replace('<?=site_url('/login')?>');
                    }
                });  
            }
            
           //  $("#checkin_date").on("change paste keyup", function () {
           //     // alert($(this).val());
           //     var someDate = new Date($('#checkin_date').val());
           //     console.log(someDate);
           //     var numberOfDaysToAdd = $(this).val();
           //     date.setDate(numberOfDaysToAdd.getDate() + $('#no_of_days').val());
           //     var date = someDate.getMonth() + '/' + someDate.getDate() + '/' + someDate.getFullYear();
           //     $('#checkout_date').val(date);
           //     console.log(date);
           // });

            function showImage(guesthouse_id,room_id) {
                $('#imagemodal').modal('show');
                $('#image_detail').html('');
                $('.loader').show();
                $.ajax({
                    url: "<?php echo site_url('Booking/getimagedetail');?>",
                    type: "POST",
                    data: data+'&guesthouse_id='+guesthouse_id+'&room_id='+room_id,
                    cache: false,
                    success: function (res) 
                    {        
                        $('#image_detail').html(res);
                        $('.loader').hide();
                    }
                }); 
            }
        </script>