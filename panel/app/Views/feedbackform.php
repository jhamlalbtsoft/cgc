<style type="text/css">
 
        input[type="radio"] {
            position: relative;
            display: inline-block;
            width: 17px;
            height: 17px;
            border-radius: 50%;
            border: 2px solid #000;
            cursor: pointer;
        }

        input[type="radio"]:checked + label::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 11px;
            height: 11px;
            background: #000;
            border-radius: 50%;
            transform: translate(-50%, -50%);
        }

         
</style>
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
                                        <h5 class="head1">FEEDBACK FORM</h5>
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
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label">Booking No.<span class="text-danger">*</span> </label>
                                                <input type="text" autofocus class="form-control mb-2" placeholder="Enter Booking No." id="booking_no" name="booking_no" />
                                                <span class="text-danger error booking_no"></span>
                                            </div>
 
                                            <div class="col-md-1">
                                                <label class="form-label">&nbsp;</label>
                                                <button type="button" onclick="getbookingdetail()" class="default-btn btn show1"> Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1"></div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-10">
                                        <div class="booking_detail row"> 
                                            <div class="col-md-5">
                                                <label class="form-label">Guest Name  </label>
                                                <input type="text" class="form-control mb-2" id="guestname" readonly />
                                            </div>
                                            <div class="col-md-5">
                                                <label class="form-label">Booking Date  </label>
                                                <input type="text" class="form-control mb-2" id="booking_date" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1"></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-10">
                                        <div class="booking_detail row"> 
                                            <div class="col-md-5">
                                                <label class="form-label">Check In Date  </label>
                                                <input type="text" class="form-control mb-2" id="checkin_date" readonly />
                                            </div>
                                            <div class="col-md-5">
                                                <label class="form-label">Check Out Date  </label>
                                                <input type="text" class="form-control mb-2" id="checkout_date" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1"></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-10">
                                        <div class="booking_detail row"> 
                                            <div class="col-md-10">
                                                <label class="form-label">Guest House  </label>
                                                <input type="text" class="form-control mb-2" id="guesthouse" readonly />
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-lg-1"></div>
                                </div>


                                <div class="row  mt-3">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-8">
                                        <h5 class="text-center" style="text-decoration: underline;">How would you rate this service</h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table"  style="width: 100%;border: 0px white;">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>Excellent</th>
                                                            <th>Good</th>
                                                            <th>Poor</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th>Front Desk  </th>
                                                            <td><input type="radio" name="front_desk" id="front_desk" value="Excellent" checked></td>
                                                            <td><input type="radio" name="front_desk" id="front_desk" value="Good"></td>
                                                            <td><input type="radio" name="front_desk" id="front_desk" value="Poor"></td>
                                                        </tr>

                                                        <tr>
                                                            <th>House Keeping/Cleanliness    </th>
                                                            <td><input type="radio" name="housekeeping" id="housekeeping" value="Excellent" checked></td>
                                                            <td><input type="radio" name="housekeeping" id="housekeeping" value="Good"></td>
                                                            <td><input type="radio" name="housekeeping" id="housekeeping" value="Poor"></td>
                                                        </tr>

                                                        <tr>
                                                            <th>Airconditioning  </th>
                                                            <td><input type="radio" name="airconditioning" id="airconditioning" value="Excellent" checked></td>
                                                            <td><input type="radio" name="airconditioning" id="airconditioning" value="Good"></td>
                                                            <td><input type="radio" name="airconditioning" id="airconditioning" value="Poor"></td>
                                                        </tr>

                                                        <tr>
                                                            <th>Food  </th>
                                                            <td><input type="radio" name="food" id="food" value="Excellent" checked></td>
                                                            <td><input type="radio" name="food" id="food" value="Good"></td>
                                                            <td><input type="radio" name="food" id="food" value="Poor"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1"></div>
                                </div>


                                <div class="row mt-5"> 
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-10">
                                        <h5 class="text-center" style="text-decoration: underline;">Suggestions Complaint !</h5>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="form-label">TV Viewing  </label>
                                                <input type="text" class="form-control mb-2" placeholder="" id="tv_viewing" name="tv_viewing" />
                                                <span class="text-danger error tv_viewing"></span>
                                            </div>

                                            <div class="col-md-5">
                                                <label class="form-label">Electrical  </label>
                                                <input type="text" class="form-control mb-2" placeholder=" " id="electrical" name="electrical" />
                                                <span class="text-danger error electrical"></span>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-lg-1"></div>

                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-10"> 
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="form-label">Plumbing </label>
                                                <input type="text" class="form-control mb-2" placeholder="" id="plumbing" name="plumbing" />
                                                <span class="text-danger error plumbing"></span>
                                            </div>

                                            <div class="col-md-5">
                                                <label class="form-label">Any Other  </label>
                                                <input type="text" class="form-control mb-2" placeholder=" " id="any_other" name="any_other" />
                                                <span class="text-danger error any_other"></span>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-lg-1"></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <label class="form-label">&nbsp;</label>
                                                <button type="submit" class="default-btn btn checkAvailability show1 addButton" disabled> Save</button>
                                            </div>
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

    $(document).ready(function(argument) {
        $(".booking_detail").hide(); 
        $('.checkAvailability').prop('disabled', true);
    });
    $("#add_form").on("submit", function (event) {
        event.preventDefault();
        $(".addButton").prop("disabled", true);
        $(".error").html("");

        var form = document.getElementById("add_form");
        var formdata = new FormData(form);
        $.ajax({
            url: "<?php echo base_url('Booking/savefeedbackform');?>",
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
                    successMsg("Thank you for your valuable feedback");
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
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

    function getbookingdetail() 
    {
        var booking_no = $('#booking_no').val();
        if (booking_no=='') {
            errorMsg("Please enter booking no");return;
        }
        data = "list=list"; 
        $.ajax({
            url: "<?php echo base_url('Booking/getbookingdetail');?>",
            type: "POST",
            data: data+'&booking_no='+booking_no,
            cache: false,
            success: function (data) 
            {              
                var report_obj = JSON.parse(data);
                if (report_obj.status == "Success")
                {                  
                    $(".booking_detail").show(); 
                    $("#guestname").val(report_obj.guestname); 
                    $("#guesthouse").val(report_obj.guesthouse); 
                    $("#booking_date").val(report_obj.booking_date); 
                    $("#checkin_date").val(report_obj.checkin_date); 
                    $("#checkout_date").val(report_obj.checkout_date); 
                    $('.checkAvailability').prop('disabled', false);
                }
                else
                {
                    msg="Booking No Not found";
                    errorMsg(msg);
                }                         
            }
        });  
    }
</script>
