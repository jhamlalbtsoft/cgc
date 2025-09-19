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
                        <div id="image_detail"></div>
                    </div>                    
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
              </div>
            </div>
          </div>
        </div>

<div class="academic-area pb-70 bg-f4f6f9" id="newregistration">
            <div class="container " style="min-height: 45vh;"> 
                <div class="row justify-content-center">
                    <div class="first_page ">
                        <div class="estemate-form  mt-3">
                            
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
                                            <div class="col-md-3">
                                                <label class="form-label">Guest House </label>
                                                <select class="form-select form-select-md mb-2 select2" name="guesthouse_id" id="guesthouse_id" required>
                                                      <option value="">Choose Guest House</option>
                                                        <?php 
                                                            foreach ($guesthouse_list as $row) {
                                                              echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
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
                                        <div class="col-lg-1"></div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-10">
                                            <div class="availability_list"></div>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>
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
                                        <input type="text" class="form-control" placeholder="Mobile Number" id="mobileno" name="mobileno" readonly value="<?=$rowt->mobileno?>" required/>
                                    </div>
                                    <div class="col-md-4  mb-3">
                                        <label class="form-label">Email ID <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" placeholder="Email ID" id="emailid" name="emailid" readonly value="<?=$rowt->emailid?>" required/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-md-4  mb-3">
                                        <label class="form-label">Department <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" placeholder="Department" id="department" name="department" value="<?=$rowt->city?>" required/>
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
                                        <input type="text" class="form-control" placeholder="Visitor Name" id="visitor_name" readonly name="visitor_name" value="<?=$rowt->name?>" required/>
                                    </div>
                                    <div class="col-md-4  mb-3">
                                        <label class="form-label">Mobile Number <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" placeholder="Mobile Number" id="visitor_mobileno" readonly name="visitor_mobileno" value="<?=$rowt->mobileno?>" required/>
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
                                        <textarea type="text" class="form-control" placeholder="Postal Address" id="address" name="address" value="<?=$rowt->address?>"></textarea>
                                        <span class="text-danger error address"></span>
                                    </div>
                                    <div class="col-md-4  mb-3">
                                        <label class="form-label">Email ID   <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" placeholder="Email ID   " id="visitor_emailid" readonly name="visitor_emailid" value="<?=$rowt->emailid?>" required/>
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
                setroom_direct();
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
                if (guesthouse_id<0 || guesthouse_id=='') {
                    alert('Please Select Guest House');
                }
                if (checkin_date=='') {
                    alert('Please Enter Check In Date');return;
                }
                if (no_of_days<0 || no_of_days=='') {
                    alert('Please Enter No Of Days');return;
                }
                if (checkout_date=='') {
                    alert('Please Enter Check Out Date');return;
                }
                data = "list=list";        
                $.ajax({
                    url: "<?php echo base_url('Booking/checkAvailability');?>",
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
                    errorMsg('Please Select Guest House');
                }
                if (checkin_date=='') {
                    errorMsg('Please Enter Check In Date');return;
                }
                if (no_of_days<0) {
                    errorMsg('Please Enter No Of Days');return;
                }
                if (checkout_date=='') {
                    errorMsg('Please Enter Check Out Date');return;
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
                                successMsg("Thank You for Your Booking.. We Will Confirm You Soon.");

                                setTimeout(function() {
                                    location.reload();
                                }, 5000);
                            }
                            else
                            { 
                                $.each(obj.errors, function(key, value) {
                                    $("."+key+"").html(value);
                                });
                                errorMsg('Some field empty please fill first and submit');
                            }
                            $(".addButton").prop('disabled', false);                                
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            $.each(XMLHttpRequest.responseJSON.errors, function(key, value) {
                                $("."+key+"").html(value);
                            });
                            errorMsg('Some field empty please fill first and submit');
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
                console.log(room_id);
                $('#room_charges').val(0);
                var data = "list=list";
                var guesthouse_id = $('#guesthouse_id').val(); 
                console.log(guesthouse_id);
                $.ajax({
                    url: "<?php echo site_url('Booking/getAmount');?>",
                    type: "POST",
                    data: data+'&guesthouse_id='+guesthouse_id+'&room_id='+room_id,
                    cache: false,
                    success: function (html) 
                    {                 
                        $("#room_charges").val(html);  

                        setTimeout(function() {
                            tolAmount();
                        },100);
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
                        //getAmount();
                    }
                });
            }

            function setroom(room_id) {
                $('.availability_list,.show1').hide();
                $('.show2').show();
                $('#room_type').val(room_id);
                $('#no_of_days,#checkin_date').prop('readonly', true);

                $('#guesthouse_id,#room_type,#no_of_days').on('mousedown', function(e) {
                    e.preventDefault();
                }).addClass('readonly');
            }

            function setroom_direct() {
                room_id = '<?=$bk_room_id?>'; 
                guesthouse_id = '<?=$bk_guesthouse_id?>';
                if(room_id>0 && guesthouse_id>0)
                {
                    $('#guesthouse_id').val(guesthouse_id);
                    $('#checkin_date').val('<?=$bk_ckecking_date?>');
                    $('#checkout_date').val('<?=$bk_ckeckout_date?>');
                    $('#no_of_days').val('<?=$no_of_days?>');
                    data = 'list=list';
                    $.ajax({
                        url: "<?php echo site_url('Booking/getRoomtype');?>",
                        type: "POST",
                        data: data+'&guesthouse_id='+guesthouse_id,
                        cache: false,
                        success: function (html) 
                        {                 
                            $("#room_type").append(html);    
                            //getAmount();    
                        }
                    });

                    setTimeout(function(argument) {
                        $('#room_type').val(room_id);
                    },1000);

                    setTimeout(function(argument) {
                        getAmount();
                    },3000);
                    

                    $('.availability_list,.show1').hide();
                    $('.show2').show();
                    $('#no_of_days,#checkin_date').prop('readonly', true);

                    $('#guesthouse_id,#room_type,#no_of_days').on('mousedown', function(e) {
                        e.preventDefault();
                    }).addClass('readonly');
                }
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
                $.ajax({
                    url: "<?php echo site_url('Booking/getimagedetail');?>",
                    type: "POST",
                    data: data+'&guesthouse_id='+guesthouse_id+'&room_id='+room_id,
                    cache: false,
                    success: function (res) 
                    {        
                        $('#image_detail').html(res);
                    }
                }); 
            }
        </script>