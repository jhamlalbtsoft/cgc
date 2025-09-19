<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header d-none">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Member</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Member List</li>
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
                                Member List
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

                                            <label class="col-sm-1 col-form-label text-lg-right" for="exampleInputEmail1">Status </label>
                                            <div class="col-sm-2">
                                                <select name="status" id="status" class="form-control">
                                                    <option value="0">All</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="1StApprove">1St Approve</option>
                                                    <option value="2StApprove">2St Approve</option>
                                                    <option value="UnitApprove">Unit Approve</option>
                                                    <option value="Approved">Approved</option>
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

<!-- Approve Member Modal -->
<div class="modal fade" id="approveModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="approveForm">
        <div class="modal-header">
          <h5 class="modal-title">Approve Member</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="MembersId" id="approveMemberId">
          <div class="form-group">
            <label for="approveStatus">Select Status</label>
            <select name="Status" id="approveStatus" class="form-control">
              <option value="pending">Pending</option>
              <option value="1StApprove">1St Approve</option>
              <option value="2StApprove">2St Approve</option>
              <option value="UnitApprove">Unit Approve</option>
              <option value="Approved">Approved</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title float-left">Member Detail</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div id="Memberdetail"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>      
    </div>
</div>
<!-- Image Preview Modal -->
<div class="modal fade" id="imagePreviewModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Image Preview</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <img id="previewImage" src="" class="img-fluid rounded shadow">
      </div>
    </div>
  </div>
</div>

 <!-- View Member Modal -->
<div class="modal fade" id="viewMemberModal" tabindex="-1" aria-labelledby="viewMemberLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="viewMemberLabel">Member Details</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody id="memberDetailsBody">
            <!-- Filled by JS -->
          </tbody>
        </table>
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
        // GetList();       
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
            url: "<?php echo site_url('Admin/GetMemberList');?>",
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
<script>
function updateStatus(memberId, newStatus) {
    if (!confirm("Are you sure you want to change status to " + newStatus + "?")) return;

    $.ajax({
        url: "<?= site_url('Admin/updateStatus') ?>",
        type: "POST",
        data: { MembersId: memberId, Status: newStatus },
        success: function (res) {
            alert(res.message);
            location.reload();
        },
        error: function () {
            alert("Error updating status.");
        }
    });
}
</script>
<script>
function viewMember(id) {
    $.ajax({
        url: "<?= base_url('Admin/getMember/') ?>" + id,
        type: "GET",
        dataType: "json",
        success: function (response) {
            if (response.status === 'success') {
                let data = response.data;
                
                let html = `
                    <tr><th>Member Type</th><td>${data.MemberType ?? ''}</td></tr>
                    <tr><th>Firm Name</th><td>${data.FirmName ?? ''}</td></tr>
                    <tr><th>Shop</th><td>${data.Shop ?? ''}</td></tr>
                    <tr><th>Complex</th><td>${data.Complex ?? ''}</td></tr>
                    <tr><th>Street</th><td>${data.Street ?? ''}</td></tr>
                    <tr><th>District</th><td>${data.DistrictName ?? ''}</td></tr>
                    <tr><th>City</th><td>${data.CityName ?? ''}</td></tr>
                    <tr><th>Area</th><td>${data.AreaName ?? ''}</td></tr>
                    <tr><th>PIN</th><td>${data.PIN ?? ''}</td></tr>
                    <tr><th>STD Code</th><td>${data.STDCode ?? ''}</td></tr>
                    <tr><th>GSTN</th><td>${data.GSTN ?? ''}</td></tr>
                    <tr><th>Group</th><td>${data.GroupName ?? ''}</td></tr>
                    <tr><th>Representative 1</th><td>${data.Representative1 ?? ''}</td></tr>
                    <tr><th>Mobile Rep 1</th><td>${data.MobileRep1 ?? ''}</td></tr>
                    <tr><th>Email Rep 1</th><td>${data.EmailRep1 ?? ''}</td></tr>
                    <tr><th>Representative 2</th><td>${data.Representative2 ?? ''}</td></tr>
                    <tr><th>Mobile Rep 2</th><td>${data.MobileRep2 ?? ''}</td></tr>
                    <tr><th>Email Rep 2</th><td>${data.EmailRep2 ?? ''}</td></tr>
                    <tr><th>Website</th><td>${data.website ?? ''}</td></tr>
                    <tr><th>Reference</th><td>${data.reference ?? ''}</td></tr>
                    <tr><th>Reference Mobile</th><td>${data.referenceMobile ?? ''}</td></tr>

                    <tr><th>Representative 1 Photo</th>
                        <td>${data.ImageRep1 ? `<img src="${data.ImageRep1}" class="img-thumbnail" width="80" style="cursor:pointer" onclick="openImageModal('${data.ImageRep1}')">` : 'No Image'}</td></tr>

                    <tr><th>Representative 2 Photo</th>
                        <td>${data.ImageRep2 ? `<img src="${data.ImageRep2}" class="img-thumbnail" width="80" style="cursor:pointer" onclick="openImageModal('${data.ImageRep2}')">` : 'No Image'}</td></tr>

                    <tr><th>Shop Photo</th>
                        <td>${data.shopPhoto ? `<img src="${data.shopPhoto}" class="img-thumbnail" width="80" style="cursor:pointer" onclick="openImageModal('${data.shopPhoto}')">` : 'No Image'}</td></tr>

                    <tr><th>GST File</th>
                        <td>${data.gstfiles ? `<a href="${data.gstfiles}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-file"></i> View</a>` : 'No File'}</td></tr>

                    <tr><th>Payment File</th>
                        <td>${data.paymentfiles ? `<a href="${data.paymentfiles}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-file"></i> View</a>` : 'No File'}</td></tr>
                `;
                
                $('#memberDetailsBody').html(html);
                $('#viewMemberModal').modal('show');
            } else {
                alert(response.message);
            }
        },
        error: function () {
            alert("Error fetching member data.");
        }
    });
}

function openImageModal(imageUrl) {
    document.getElementById('previewImage').src = imageUrl;
    var myModal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
    myModal.show();
}
</script>



