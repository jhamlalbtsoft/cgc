
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
    </body> 
</html>

    
 
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


        <script>
            $("#add_form").on("submit", function( event ) {
                event.preventDefault();
                password = $('#password').val();
                mobileno = $('#mobileno').val();
                if (mobileno.length!='10') {
                    alert('Please Enter Valid Mobile No.');return;
                }
                if (password=='') {
                    alert('Please Enter Valid Password');return;
                }
                data = "list=list";
                $.ajax({
                    url: "<?php echo base_url('Home/checklogin');?>",
                    type:'POST',
                    data: data+'&mobileno='+mobileno+'&password='+password,
                    success: function(response) {
                        if(response>0)
                        {
                            window.location.href = '<?php echo base_url('Home/guesthome');?>';
                        }else{ 
                            window.location.href = '<?php echo base_url('Home/index#newregistration');?>';
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {

                    }
                });
            });
        </script>
    </body>
</html>
