

        <main class="banner-area">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  <!--<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button> -->
                </div>

                <!-- Image Sliders -->
                <div class="carousel-inner">
                <!-- Image one-->
                  <div class="carousel-item active">
                    <img src="assets/images/page-banner/banner-1.jpg" class="d-block w-100" alt="estart-banner">
                  </div>

                  <!-- image two -->
                  <div class="carousel-item">
                    <img src="assets/images/page-banner/guest-2.jpg" class="d-block w-100" lt="estart-banner">
                  </div>

                  <!-- Image Three -->
                  <div class="carousel-item">
                    <img src="assets/images/page-banner/guest-3.jpg" class="d-block w-100" lt="estart-banner">
                  </div>

                  <!-- Image Four -->
                  <!--<div class="carousel-item">-->
                  <!--  <img src="assets/images/page-banner/banner-4.jpg" class="d-block w-100" lt="estart-banner">-->
                  <!--</div>  -->
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
      

        <div class="academic-area pt-70 pb-70 bg-f4f6f9" id="newregistration">
            <div class="container"> 
                <div class="row justify-content-center">
                    <div class="first_page ">
                        <div class="estemate-form">
                            <div class="section-title">
                                <h2>New User Registration</h2> 
                            </div> 
                            <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
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
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Full Name" id="name" />
                                        </div>
                                    </div>
                                     
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" maxlength="10" class="form-control" placeholder="Enter Mobile number" id="mobileno" />
                                        </div>
                                    </div> 

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Create Password" id="password" />
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Confirm Create Password" id="cpassword" />
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <button type="submit" class="default-btn btn registration" id="otpbtn">Send OTP<i class="flaticon-paper-plane"></i></button>
                                    </div>
                                </div>
                            </form>
                    

                        <div class="otp_page" style="display: none;">
                            <h3>Enter OTP Here</h3>
                            <?php $send_otp = $session->get('send_otp'); ?>
                            <?php if (isset($otpmessage) && !empty($otpmessage)):
                                  echo '<div class="alert alert-primary" role="alert">
                                          <button type="button" class="close" data-dismiss="alert">x</button>
                                         '.$otpmessage.'
                                        </div>';
                                  ?>  
                            <?php endif; ?> 
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" pattern="\d{6}\.\d{2}$" name="otp" class="form-control" id="otp" maxlength="6" placeholder="Enter OTP " />
                                        <input type="hidden" name="sid" class="form-control sid" id="stid"/>
                                    </div>
                                </div> 
                                <div class="col-lg-12">
                                    <button type="submit" class="default-btn btn verify">Verify<i class="flaticon-paper-plane"></i></button>
                                </div>
                            </div>
                            <!-- </form> -->
                        </div>
                        </div>
                        <div class="col-lg-3"></div>
                        </div>
                    </div>
                    </div>
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
        <script src="assets/js/jquery.session.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>  
        <script src="assets1/sstoast.js"></script>
        <script>
            $(document).ready(function () {
                // $(".submitpage").hide();
            });

            $("#add_form").on("submit", function( event ) {
                event.preventDefault();               
                name = $('#name').val();
                password = $('#password').val();
                cpassword = $('#cpassword').val();
                if (name=='') { 
                    errorMsg('Please Enter Full Name.');return;
                }
                mobileno = $('#mobileno').val();
                if (mobileno.length!='10') {
                    errorMsg('Please Enter Valid Mobile No.');return;
                }
                if (password!=cpassword) {
                    errorMsg('Please Enter Valid Password and Confirm');return;
                }

                $('#otpbtn').prop('disabled', true);
                $('#otpbtn').text('Please Wait');
                data = "list=list";        
                $.ajax({
                    url: "<?php echo base_url('Home/sendotp');?>",
                    type:'POST',
                    data: data+'&name='+name+'&mobileno='+mobileno+'&password='+password,
                    success: function(response) {   
                        if(response>0) 
                        {            
                            $(".sid").val(response);
                            $('.registration').hide();
                            $('#name').attr('readonly',true);
                            $('#mobileno').attr('readonly',true);
                            $(".otp_page").show(); 
                            $('#otpbtn').prop('disabled', false);
                            $('#otpbtn').text('Send OTP');
                        }        
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                       
                    }       
                });
            });



            $(document).on("click", ".verify", function () {
                otp = $('#otp').val();
                stid = $('#stid').val();
                // if (otp.length!='5') {
                //     errorMsg('Please Enter Valid OTP');return;
                // }

                data = "list=list"; 
                  $.ajax({
                      url: "<?php echo base_url('Home/verify');?>",
                      type: "POST",
                      data: data+'&stid='+stid+'&otp='+otp,
                      cache: false,
                      success: function (html) 
                      {              
                          if (html==1) {
                            window.location.href = '<?php echo base_url('Home/registration');?>';
                          }else{
                            $('.registration').hide();
                            $('#name').attr('readonly',true);
                            $('#mobileno').attr('readonly',true);
                            $(".otp_page").show(); 
                            errorMsg('Please Enter Valid OTP');return;
                            $('#otp').focus();
                          } 
                        // $(".first_page").hide();                                    
                      }
                  });                
            });

            $(document).on("click", ".savecontact", function () {
                name = $('#name').val(); 
                if (name=='') {
                    alert('Please Enter Your Name.');return;
                }

                email = $('#email').val();
                if (mobileno=='') {
                    alert('Please Enter Valid email id');return;
                }

                mobileno = $('#phone_number').val();
                if (mobileno.length!='10' || mobileno=='') {
                    alert('Please Enter Valid Mobile No.');return;
                }

                msg_subject = $('#msg_subject').val();
                if (msg_subject=='') {
                    alert('Please Enter subject');return;
                }

                message = $('#message').val();
                if (message=='') {
                    alert('Please Enter message');return;
                } 

                data = $('#contactFormNew').serialize(); 
                $.ajax({
                      url: "<?php echo base_url('Home/savecontact');?>",
                      type: "POST",
                      data: data,
                      cache: false,
                      success: function (html) 
                      {        
                        alert('Message successfully saved.'); 
                        setTimeout(function() {
                            location.reload();
                        }, 100);
                      }
                  });
                
            });

             
        </script>
    </body>

     
</html>
