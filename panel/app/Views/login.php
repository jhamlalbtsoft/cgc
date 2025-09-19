        <main class="banner-area d-none">
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
                        <img src="assets/images/page-banner/banner-1.jpg" class="d-block w-100" alt="estart-banner" />
                    </div>

                    <!-- image two -->
                    <div class="carousel-item">
                        <img src="assets/images/page-banner/banner-3.jpg" class="d-block w-100" lt="estart-banner" />
                    </div>

                    <!-- Image Three -->
                    <div class="carousel-item">
                        <img src="assets/images/page-banner/banner-2.jpg" class="d-block w-100" lt="estart-banner" />
                    </div>

                    <!-- Image Four -->
                    <div class="carousel-item">
                        <img src="assets/images/page-banner/banner-4.jpg" class="d-block w-100" lt="estart-banner" />
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
                            <h3 style="text-align: center;">Registered User Login</h3>
                            <form action="#" method="post" enctype="multipart/form-data" id="add_form">
                                <?php 
                                    $session = \Config\Services::session();
                                    echo \Config\Services::validation()->listErrors(); ?>

                                <?php   
                                        if (isset($message) && !empty($message)):
                                            echo $message;die();
                                        endif;
                                        //echo \Config\Services::validation()->listErrors(); ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" maxlength="10" class="form-control" placeholder="Enter Mobile number" id="mobileno" />
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Enter Password" id="password" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="default-btn btn registration">Login<i class="flaticon-paper-plane"></i></button>
                                    </div>
                                </div>
                            </form>
                            <h6 class="text-center mt-3"><a href="<?=site_url('Home/index')?>"> Back to Home</a></h6>
                            <h6 class="text-center mt-3"><a href="<?=site_url('Home/index#newregistration')?>"> Dont have User id Register Here!</a></h6>
                            <form id="contactForm1" method="post"></form>
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

        <link href="assets1/toastr.min.css" rel="stylesheet">
 
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
            $("#add_form").on("submit", function( event ) {
                event.preventDefault();
                password = $('#password').val();
                mobileno = $('#mobileno').val();
                if (mobileno.length!='10') {
                    errorMsg('Please Enter Valid Mobile No.');return;
                }
                if (password=='') {
                    errorMsg('Please Enter Valid Password');return;
                }
                data = "list=list";
                $.ajax({
                    url: "<?php echo base_url('Home/checklogin');?>",
                    type:'POST',
                    data: data+'&mobileno='+mobileno+'&password='+password,
                    success: function(response) {
                        if(response==1)
                        {
                            window.location.href = '<?php echo base_url('Home/guesthome');?>';
                        }
                        else if(response==2)
                        {
                            errorMsg('Enter password does not match');
                        }
                        else if(response==4)
                        {
                            warningMsg('Your account is not verified. Please Re-Register and verify.');
                            setTimeout(function() {
                                window.location.href = '<?php echo base_url('Home/index#newregistration');?>';
                            },2000);   
                        }
                        else
                        { 
                            errorMsg('Enter mobile number not registered');
                            setTimeout(function() {
                                window.location.href = '<?php echo base_url('Home/index#newregistration');?>';
                            },1000);                            
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {

                    }
                });
            });
        </script>
    </body>
</html>
