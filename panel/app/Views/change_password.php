<div class="academic-area pb-70 bg-f4f6f9" id="newregistration">
    <div class="container" style="min-height: 45vh;">
        <div class="row justify-content-center">
            <div class="first_page">
                <div class="estemate-form mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                                    <div class="section-title show1">
                                        <h5>Change Password</h5>
                                    </div>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                            <form action="#" method="post" enctype="multipart/form-data" id="add_form">
                                <?php 
                                    $session = \Config\Services::session();
                                    echo \Config\Services::validation()->listErrors(); ?>

                                <?php   
                                    if (isset($message) && !empty($message)):
                                        echo $message;die();
                                    endif; 
                                ?>
                                <?php 
                                    $db         = \Config\Database::connect();
                                    $myrequest  = \Config\Services::request();
                                    $session    = \Config\Services::session();
                                    $sid = $session->get('sid'); $query=$db->query("select * from register where id='".$sid."'"); $rowt=$query->getRow(); ?>
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="form-label">New Password<span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control mb-2" placeholder="Enter New Password" id="password1" name="password1" />
                                                <span class="text-danger error password1"></span>
                                            </div>

                                            <div class="col-md-5">
                                                <label class="form-label">Confirm Password<span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control mb-2" placeholder="Enter Confirm Password" id="confirm_password" name="confirm_password" />
                                                <span class="text-danger error confirm_password"></span>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">&nbsp;</label>
                                                <button type="submit" class="default-btn btn checkAvailability show1">Change</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3"></div>
                                </div>
                            </form>
                        </div>
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

<link href="assets1/toastr.min.css" rel="stylesheet" />

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

<script type="text/javascript">
    $("#add_form").on("submit", function (event) {
        event.preventDefault();
        $(".addButton").prop("disabled", true);
        $(".error").html("");

        var form = document.getElementById("add_form");
        var formdata = new FormData(form);
        $.ajax({
            url: "<?php echo base_url('Booking/changepassword');?>",
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (response) {
                $(".indicator-label").css("display", "block");
                $(".indicator-progress").css("display", "none");
                $(".addButton").prop("disabled", false);
                var obj = JSON.parse(response);
                if (obj.resp == 1) {
                    successMsg("Password Changed Successfully.");
                    setTimeout(function () {
                        location.reload();
                    }, 3000);
                } else {
                    $.each(obj.errors, function (key, value) {
                        $("." + key + "").html(value);
                    });
                    errorMsg("Some field empty please fill first and submit");
                }
                $(".addButton").prop("disabled", false);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $.each(XMLHttpRequest.responseJSON.errors, function (key, value) {
                    $("." + key + "").html(value);
                });
                errorMsg("Some field empty please fill first and submit");
                $(".addButton").prop("disabled", false);
            },
        });
    });
</script>
