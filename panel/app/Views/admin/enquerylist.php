<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header d-none">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Booking</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Booking List</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div id="cover-spin" class="loading" style="display:none !important;"></div>
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12">
                    <div class="card mt-2 card-primary card-outline">
                        <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                                <i class="fas fa-list mr-1"></i>
                                Booking List
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12"> 
                                    <form id="search_form" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-sm-1 col-form-label text-lg-right" for="exampleInputEmail1">From Date</label>
                                            <div class="col-sm-2">
                                                <div class="input-group">
                                                    <input class="form-control cdate" id="from_date" name="from_date" value="<?=$month_start?>">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-sm-1 col-form-label text-lg-right" for="exampleInputEmail1">To Date</label>
                                            <div class="col-sm-2">
                                                <div class="input-group">
                                                    <input class="form-control cdate" id="to_date" name="to_date" value="<?=$cdate?>">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-sm-1 col-form-label text-lg-right" for="exampleInputEmail1">Guest Name </label>
                                            <div class="col-sm-3">
                                                <input type="text" name="sname" id="sname" class="form-control" placeholder="Search Guest Name or Mobile No.">
                                            </div>      
                                        </div>
                                        <div class="form-group row">  

                                            <?php if(get_guesthouse_id()==0) { ?>
                                                <label class="col-sm-1 col-form-label text-lg-right" for="exampleInputEmail1">Guest House </label>
                                                <div class="col-sm-5">
                                                    <select name="guesthouse_id" id="guesthouse_id" class="form-control">
                                                        <option value="0">All</option>
                                                        <?php
                                                            foreach ($guesthouse_list as $row) {
                                                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>  
                                            <?php } else { ?> 
                                                <input type="hidden" name="guesthouse_id" id="guesthouse_id" class="form-control" value="<?=get_guesthouse_id()?>">
                                             <?php } ?>

                                            <label class="col-sm-1 col-form-label text-lg-right" for="exampleInputEmail1">Status </label>
                                            <div class="col-sm-2">
                                                <select name="status" id="status" class="form-control">
                                                    <option value="0">All</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Accepted">Accepted</option>
                                                    <option value="Rejected">Rejected</option> 
                                                </select>
                                            </div> 

                                            <div class="col-sm-2 mt-2-sm">
                                                <button type="button" class="btn btn-sm btn-info" onclick="GetList();"><i class="fa fa-search"></i> <b>SEARCH</b></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">   
                                    <div id="table_list" class="table-responsive"></div> 
                                </div>
                            </div>
                        </div> 
                    </div>
                </section>
            </div>
        </div>
    </section>
    <!-- /. Main content --> 
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title float-left">Booking Detail</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div id="bookingdetail"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>      
    </div>
</div>
 
<script type="text/javascript">
    function showacceptmodal(booking_id)
    { 
        $('#myModal').modal('show');
        getbookingdetail(booking_id);
    }


    function getbookingdetail(booking_id)
    { 
        var data = "list=list"; 
        $.ajax({
            url: "<?php echo site_url('Admin/getbookingdetail');?>",
            type: "POST",
            data: data+'&booking_id='+booking_id,
            cache: false,
            success: function (html) 
            {                 
                $("#bookingdetail").html(html);  
            }
        });
    }

    function acceptbooking(booking_id)
    {  
        // var reason = $('#reason').val();
        // if (status=='Reject' && reason=='') 
        // {
        //     errorMsg('Please Enter Reject Reason');return;
        // }
        $(".loading").show(); 
        status ='Accept';
        var reason = '';
        var data = "list=list"; 
        $.ajax({
            url: "<?php echo site_url('Admin/updatebookingstatus');?>",
            type: "POST",
            data: data+'&booking_id='+booking_id+'&status='+status+'&reason='+reason,
            cache: false,
            success: function (res) 
            {                 
                $(".loading").hide(); 
                if (res==1) {
                    successMsg('Status Updated Successfully');
                    GetList();
                }
                else
                {
                    successMsg('Status Updated Successfully. But mail send failed');
                    GetList();
                }
                
                $('#myModal').modal('hide');
            }
        });
    }

    function rejectbooking(booking_id,status)
    {  
        status ='Reject';
        var reason = $('#reason').val();
        if (status=='Reject' && reason=='') 
        {
            errorMsg('Please Enter Reject Reason');return;
        }
        $(".loading").show(); 
        var data = "list=list"; 
        $.ajax({
            url: "<?php echo site_url('Admin/updatebookingstatus');?>",
            type: "POST",
            data: data+'&booking_id='+booking_id+'&status='+status+'&reason='+reason,
            cache: false,
            success: function (html) 
            {                 
                successMsg('Status Updated Successfully');
                GetList(); 
                $('#myModal').modal('hide');
                $(".loading").hide(); 
            }
        });
    }

    $(document).ready(function(){
        GetList();       
    });

    $("#add_form").on("submit", function( event ) {
        event.preventDefault();               
        var name = $('#name').val();
        var prefix = $('#prefix').val();        

        $(".addButton").prop('disabled', true);
        $('.error').html('');        
        // $('.loaderAjax').css('display', 'block');
        // $('.indicator-label').css('display', 'none');
        // $('.indicator-progress').css('display', 'block');
        $.ajax({
            url: "<?=site_url('PurchaseController/save')?>",
            type:'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(response) {  
                console.log(response);
                $('.indicator-label').css('display', 'block');
                $('.indicator-progress').css('display', 'none');

                var obj = JSON.parse(response);
                if(obj.resp==1) 
                {            
                    successMsg('Added Successfully');
                    $('#name').val('');
                    GetList();
                    $('#add_form')[0].reset();
                }
                else
                { 
                    $.each(obj.errors, function(key, value) {
                    //$("."+key).html(value); 
                        errorMsg(value);
                    });
                }
                $(".addButton").prop('disabled', false);                                
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                $.each(XMLHttpRequest.responseJSON.errors, function(key, value) {
                    $("."+key).html(value); 
                    errorMsg(value);
                });
                //errorMsg('Shop Name Already Exists');
                $(".addButton").prop('disabled', false); 
            }       
        });
    });


    function GetList() 
    {
        $(".loading").show(); 
        data = $('#search_form').serialize(); 
        var sname = $('#sname').val();
        $.ajax({
            url: "<?php echo site_url('Admin/GetBookingList');?>",
            type: "POST",
            data: data,
            cache: false,
            success: function (html) 
            {                
                $(".loading").hide();   
                $("#table_list").html(html);   
                //$('#party_id').val(ledger_id);   
                let table = new DataTable('#example1', {
                    //responsive: true,
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ]
                }); 
            }
        });
    }

    function PrintPI(id) 
    {
        window.open("<?php echo site_url();?>/SalesController/so_print/"+id,'_blank');
    }

    function PrintPIpdf(id) 
    {
        window.open("<?php echo site_url();?>/SalesController/so_print_pdf/"+id,'_blank');
    }


    function converttosales(id) 
    {
        window.open("<?php echo site_url();?>/SalesController/convert_to_sale/"+id,'_blank');
    }

    function partySearchNew(term)
    { 
        var area = '';
        $(".partysearch").autocomplete({
            source: "<?php echo site_url('LedgerController/partySearch');?>?area="+area,
            minLength: 1,    
            focus: function (event, ui) 
                {
                    $(event.target).val(ui.item.label);  
                    $('#ledger_id').val(ui.item.id);   
                    return false;
                },
                select: function (event, ui) 
                {
                    $(event.target).val(ui.item.label);
                    $('#ledger_id').val(ui.item.id);
                    return false;
                },
        })
        .autocomplete( "instance" )._renderItem = function( ul, item )
        {
            return $( "<li style='background-color:#99ccff;'>")
              .append( "<div style='padding:3px; font-weight: bold;'>" + item.label +"</div>" )
              .appendTo( ul );
        };
    }
</script>