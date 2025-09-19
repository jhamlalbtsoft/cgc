<footer class="main-footer">
        <strong>Copyright &copy; <?=date('Y')?>  </strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
        
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-light" style="background-image: linear-gradient(to bottom, #dfb891, #d5b78c, #cab589, #c0b486, #b5b285);">        
      
        
        <form id="add_loc_form" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Change Location  <span class="text-danger">*</span> </label>
                    <select type="text" class="form-control" id="locid" name="locid">
                        <option value="">Select</option>
                        
                    </select>
                </div> 

             

                <div class="form-group">
                    <button type="submit" class="btn btn-default btn-sm addButton">Update</button>
                </div>
            </div>  
        </form> 
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->    
</body>
</html>
<script>
    $("#add_loc_form").on("submit", function( event ) {
        event.preventDefault();     
        $('.error').html('');   
        var locid = $('#locid').val();

        if (locid=='') 
        {
            errorMsg('Location is required');return;
        } 
        $(".addButton").prop('disabled', true);

        $.ajax({
            url: "<?=site_url('LocationController/loc_update')?>",
            type:'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(response) {   
                $('.indicator-label').css('display', 'block');
                $('.indicator-progress').css('display', 'none');

                var obj = JSON.parse(response);
                if(obj.resp==1) 
                {            
                    successMsg('Updated Successfully'); 
                    location.reload();
                }
                else
                { 
                    $.each(obj.errors, function(key, value) {
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

    $('#timepicker,#timepicker1,#timepicker2').datetimepicker({
      format: 'LT'
    });

    $(function () {
        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });           
    });

    function resetform()
    {
        $('#add_form')[0].reset();
        location.reload();
    }

    $(document).ready(function()
    {  
        MoveTextBox('.form-input'); 
    });
</script>
