<?php
// INIT
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "../admin/lib" . DIRECTORY_SEPARATOR . "config.php";

$_ADMIN = false;
$UserTypeId = 0;
$Approved = 0;
$MembersId = 0;
$Rep = 0;
$rowid = 0;
if(isset($_SESSION['user'])){
	$_ADMIN = is_array($_SESSION['user']);
	$UserTypeId = $_SESSION['user']['UserTypeId'];
}ELSE{
	ECHO "Have No Permission";
	DIE;
}

if(!$_ADMIN){
	echo "Invalid loggin";
	die;
}

if(isset($_REQUEST['id'])){
	$MembersId = $_REQUEST['id'];//18
}else{
	echo "Invalid user";
	die;
}
if(isset($_REQUEST['rowid'])){
	$rowid = $_REQUEST['rowid'];//18
}

if(isset($_REQUEST['Rep'])){
	$Rep = $_REQUEST['Rep'];//18
}

$filter = array();

if(isset($_REQUEST['Approved'])){
	$Approved = $_REQUEST['Approved'];//18
	$filter = $_REQUEST;
}

require PATH_LIB . "lib-members.php";
$memLib = new Members();
if(isset($_REQUEST['CardDispatchModeRep1']) || isset($_REQUEST['CardDispatchModeRep2'])){
	$memData = $memLib->edit("CardDetails",$_REQUEST);
	echo "<font color='green'>Saved Successfully</font>";
	die;
}
//$memData = $memLib->getAll($searchType=0, $filter);
$memData = $memLib->get($MembersId);

$FirmName = $memData['FirmName'];
$GroupName = $memData['GroupName'];
IF($Rep==2){
	$Representative = $memData['Representative2'];
	$CardDispatchModeRep = $memData['CardDispatchModeRep2'];
	$CardDetailsRep = $memData['CardDetailsRep2'];
	
	$CardDispatchModeRep_LBL = "CardDispatchModeRep2";
	$CardDetailsRep_LBL = "CardDetailsRep2";
}ELSE{
	$Representative = $memData['Representative1'];
	$CardDispatchModeRep = $memData['CardDispatchModeRep1'];
	$CardDetailsRep = $memData['CardDetailsRep1'];
	
	$CardDispatchModeRep_LBL = "CardDispatchModeRep1";
	$CardDetailsRep_LBL = "CardDetailsRep1";
}
?>
<style>
    label
    {
        font-weight:bold ;
    
    }
    
     
    </style>
    <script >
        function Print(id) {
            $("#masterload").show();
            //alert($("#CityId").val());

            $.ajax({
                url: "Members/Print?id=" + id + "&Status=" + $("#CertificatePrint").is(":checked"),
                type: "GET",
                data: "",

                success: function (data) {
                    //alert("hi");

                    //$(".cpy").remove();
                    $("#Printmsg").html(data);
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
<form action="<?PHP ECHO webUrl ?>Members/CardPrint?id=<?= $MembersId ?>" class="form-no-horizontal-spacing" data-ajax="true" data-ajax-mode="replace" data-ajax-update="#PrintId > #modal-body" id="form0" method="post">                        <div class="row-fluid column-seperation">
                            <div class="span12">
                                <h4>
                                    Id Card Details</h4>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Firm_Name">Firm Name</label> <input data-val="true" data-val-number="The field MembersId must be a number." data-val-required="The MembersId field is required." id="MembersId" name="MembersId" type="hidden" value="<?= $MembersId ?>" />
                                       
                                    </div>
                                    <div class="span6">
                                     <div class="span3">
                                        <?= $FirmName ?>
                                    </div>
                                   
                                     </div>
                                </div>
                                 <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Representative">Representative</label> 
                                       
                                    </div>
                                    <div class="span6">
                                     <div class="span3">
											<?= $Representative ?>
                                    </div>
                                   
                                     </div>
                                </div>

                                



                              <div class="row-fluid">
                                 <div class="span3">
                                
                                    <label for="Dispatch_Mode">Dispatch Mode</label>
                                     </div>
                                     <div class="span9">
                                    <input class="span6" id="<?= $CardDispatchModeRep_LBL ?>" name="<?= $CardDispatchModeRep_LBL ?>" placeholder="" type="text" value="<?= $CardDispatchModeRep ?>" />
                                    <span class="field-validation-valid error" data-valmsg-for="<?= $CardDispatchModeRep_LBL ?>" data-valmsg-replace="true"></span>
                                </div>
                                </div>
                                <div class="row-fluid">
                                <div class="span3">
                                    <label for="Card_Details">Card Details</label>
                                       </div>
                                     <div class="span9">
                                     <textarea class="span6" cols="20" id="<?= $CardDetailsRep_LBL ?>" name="<?= $CardDetailsRep_LBL ?>" placeholder="" rows="2"><?= $CardDetailsRep ?></textarea>
                                    <span class="field-validation-valid error" data-valmsg-for="<?= $CardDetailsRep_LBL ?>" data-valmsg-replace="true"></span>
                                </div>
                                </div>
                                




                            </div>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $("#fc > form").removeData("validator");
                                    $("#fc > form").removeData("unobtrusiveValidation");
                                    $.validator.unobtrusive.parse("#fc > form");
                                });
                            </script>
                            <div class="form-actions">
                                <div class="pull-left">
                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-danger btn-cons" type="submit">
                                        <i class="icon-ok"></i>Save</button>
                                   
                                </div>
                            </div>
                        </div>		  
</form>                </div>
            </div>
        </div>
    </div>