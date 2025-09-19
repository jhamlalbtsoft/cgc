<?php
// INIT
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "../admin/lib" . DIRECTORY_SEPARATOR . "config.php";

$_ADMIN = false;
$UserTypeId = 0;
$SGRep1 = 0;
if(isset($_SESSION['user'])){
	$_ADMIN = is_array($_SESSION['user']);
	$UserTypeId = $_SESSION['user']['UserTypeId'];
}


if(isset($_REQUEST['id'])){
	$rowid = $_REQUEST['id'];//18
}else{
	die("Invalid Request");
}


require PATH_LIB . "lib-masters.php";
$mastersLib = new Masters();

$requestD = $mastersLib->LoadRequest(-1, -1, $rowid);
$details = $requestD[0];
include('header.html');
?>


 
<style type="text/css">
    label
    {
       font-weight :bold  
    }


</style>

<script>
    function Approve(id) {
        $("#masterload").show();
        //alert($("#CityId").val());

        $.ajax({
            url: "Request-Update?type=Approved&id=" + id + "&Status=" + $("#Approved").is(":checked"),
            type: "GET",
            data: "",

            success: function (data) {
                //alert("hi");

                //$(".cpy").remove();
                $("#Appmsg").html(data);
                $("#masterload").hide();
                //$.validator.unobtrusive.parse("form");
            },
            error: function (jqXhr, textStatus, errorThrown) {
                alert("Error '" + jqXhr.status + "' (textStatus: '" + textStatus + "', errorThrown: '" + errorThrown + "')");
            }
            //                complete: function () {
            //                    $("#ProgressDialog").dialog("close");
            //                }
        });
    }

    function Update(id) {
        $("#masterload").show();
        //alert($("#CityId").val());

        $.ajax({
            url: "Request-Update?type=Updated&id=" + id + "&Status=" + $("#Updated").is(":checked"),
            type: "GET",
            data: "",

            success: function (data) {
                //alert("hi");

                //$(".cpy").remove();
                $("#Upmsg").html(data);
                $("#masterload").hide();
                //$.validator.unobtrusive.parse("form");
            },
            error: function (jqXhr, textStatus, errorThrown) {
                alert("Error '" + jqXhr.status + "' (textStatus: '" + textStatus + "', errorThrown: '" + errorThrown + "')");
            }
            //                complete: function () {
            //                    $("#ProgressDialog").dialog("close");
            //                }
        });
    }
</script>
<div class="row-fluid">
    <div class="span12">
        <div class="grid simple">
            <div class="grid-body no-border">
                <div id="fc">
<form action="/Request/Create?Length=7" class="form-no-horizontal-spacing" data-ajax="true" data-ajax-mode="replace" data-ajax-update="#master" id="form0" method="post">                        <div class="row-fluid column-seperation">
                            <div class="span12">
                                <h4>
                                    Request Details</h4>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Firm_Name">Firm Name</label>
                                    </div>
                                    <div class="span9">
                                        <?= $details['FirmName'] ?>
                                    </div>
                                    </div> 

                                  <div class="row-fluid">
                                    <div class="span3">
                                       <label for="Registration_No">Registration No</label>
                                    </div>
                                    <div class="span9">
                                       <?= $details['RegistrationNo'] ?>
                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="span3">
                                       <label for="Name">Name</label>
                                    </div>
                                    <div class="span9">
                                      <?= $details['Name'] ?>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                       <label for="Phone">Phone</label>
                                    </div>
                                    <div class="span9">
                                        <?= $details['ContactNumber'] ?>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                       <label for="Email">Email</label>
                                    </div>
                                    <div class="span9">
                                       <?= $details['EmailId'] ?>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                      <label for="Request_Date">Request Date</label> 
                                    </div>
                                    <div class="span9">
                                     <?= $details['RequestDate'] ?>
                                    </div>
                                </div>
                                 <div class="row-fluid">
                                  <div class="span3">
                                        <label for="Approve_Status">Approve Status</label>
                                    </div>
                                    <div class="span9">
                                        <div class="checkbox check-success 	">
                                            
                                             <input id="Approved" type="checkbox"  name="Approved" <?= $details['Approved']==1?"checked='checked'":''; ?> onclick="Approve('<?= $details['RequestId'] ?>')"></input>
                                            <label for="Approved">
                                                Approved</label>
                                        </div>
                                        <div id="Appmsg">
                                        </div>
                                    </div>
                                </div>

                                <div class="row-fluid">
                                 <div class="span3">
                                        <label for="Update_Status">Update Status</label>
                                    </div>
                                    <div class="span9">
                                        <div class="checkbox check-success ">
                                            
                                             <input id="Updated" type="checkbox" name="Updated" <?= $details['Updated']==1?"checked='checked'":''; ?> onclick="Update('<?= $details['RequestId'] ?>')"></input>
                                            <label for="Updated">
                                                Updated</label>
                                        </div>
                                        <div id="Upmsg">
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                  


                                           <div class="span3">
                                      <label for="Updated_By">Updated By</label> 
                                    </div>
                                    <div class="span9">
                                     <?= $req['UpdatedBy']==1?'Admin':'Other'; ?>
                                    </div>
                                        
                                    
                                </div>
                                  <div class="row-fluid">
                                    <div class="span6">
                                        <label for="Request_Text">Request Text</label>
 <?= $details['RequestText'] ?>

                                    </div>
                                </div>
                           
                                
                            
                                
                                
                            </div>
                        </div>		  
</form>                </div>
<br>
<input type="button" value="Back" onclick="history.back(-1)"/>
            </div>
        </div>
    </div>
	
</div>
<?php include('footer.html');?>