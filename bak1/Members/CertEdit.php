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
}ELSE{
	ECHO "Have No Permission";
	DIE;
}

if(!$_ADMIN){
	echo "Invalid loggin";
	die;
}


if(isset($_REQUEST['SGRep1'])){
	$SGRep1 = $_REQUEST['SGRep1'];//18
}

if(isset($_REQUEST['id'])){
	$MembersId = $_REQUEST['id'];//18
}else{
	echo "Invalid user";
	die;
}



require PATH_LIB . "lib-members.php";
$memLib = new Members();

if(isset($_REQUEST['MembersId'])){
	$MembersId = $_REQUEST['MembersId'];//18
	$filter = $_REQUEST;
	$memData = $memLib->edit($type='certPrint', $filter);
	echo "<font color='green'>Successfully Saved...</font>";
	die;
}

$memData = $memLib->get($MembersId);

$FirmName = $memData['FirmName'];
$MemberType = $memData['MemberType'];

$CertificatePrint = $memData['CertificatePrint'];
$CertModeOfDispatch = $memData['CertModeOfDispatch'];
$CertDetails = $memData['CertDetails'];
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
                url: "<?PHP ECHO webUrl ?>Members/Print?id=" + id + "&Status=" + $("#CertificatePrint").is(":checked"),
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
<form action="<?PHP ECHO webUrl ?>Members/CertEdit?id=<?= $MembersId ?>" class="form-no-horizontal-spacing" data-ajax="true" data-ajax-mode="replace" data-ajax-update="#Cert > #modal-body" id="form0" method="post">                        <div class="row-fluid">
                            <div class="span12">
                                <h4>
                                    Certificate Details</h4>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Firm_Name">Firm Name</label> <input data-val="true" data-val-number="The field MembersId must be a number." data-val-required="The MembersId field is required." id="MembersId" name="MembersId" type="hidden" value="<?= $MembersId ?>" />
                                    </div>
                                    <div class="span6">
                                     <div class="span3">
                                        <?= $FirmName ?>
                                    </div>
                                    <div class="span3">
                                    <a class="noprint btn btn-primary btn-mini"target="_blank"  href="<?PHP ECHO webUrl ?>Members/CertPrint?id=<?= $MembersId ?>&Print=1">
                                                            <i class="icon-ok"></i>Cert Print (Blank Paper)</a>
                                    </div>

                                     <div class="span3">
                                    <a class="noprint btn btn-primary btn-mini"target="_blank"  href="<?PHP ECHO webUrl ?>Members/CertPrintNew?id=<?= $MembersId ?>&print=2">
                                                            <i class="icon-ok"></i>Cert Print(Pre Printed)</a>
                                    </div>
                                     </div>
                                </div>
                                <div class="row-fluid">
                                <div class="span3">
                                        <label for="Membership_Type">Membership Type</label> 
                                    </div>
                                    <div class="span9">
                                        <?= $MemberType ?> 
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Print_Status">Print Status</label>
                                    </div>
                                    
                                         <div class="span9">
                                        <div class="checkbox check-success 	">
                                            
                                             <input id="CertificatePrint" type="checkbox" value="<?php if($CertificatePrint==1) echo 'true';else echo "false" ?>" name="CertificatePrint"  <?php if($CertificatePrint==1) echo "checked='checked'" ?>></input>
                                            <label for="CertificatePrint">
                                                <?php if($CertificatePrint==1) echo 'Printed' ?></label>
                                        </div>
                                        <div id="Printmsg">
                                        </div>
                                    
                                    </div>
                                </div>
                                <div class="row-fluid">
                                 <div class="span3">
                                
                                    <label for="Dispatch_Mode">Dispatch Mode</label>
                                     </div>
                                     <div class="span9">
                                    <input class="span6" id="CertModeOfDispatch" name="CertModeOfDispatch" placeholder="" type="text" value="" />
                                    <span class="field-validation-valid error" data-valmsg-for="CertModeOfDispatch" data-valmsg-replace="true"></span>
                                </div>
                                </div>
                                <div class="row-fluid">
                                <div class="span3">
                                    <label for="Cert_Details">Cert Details</label>
                                       </div>
                                     <div class="span9">
                                     <textarea class="span6" cols="20" id="CertDetails" name="CertDetails" placeholder="" rows="2">
</textarea>
                                    <span class="field-validation-valid error" data-valmsg-for="CertDetails" data-valmsg-replace="true"></span>
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
</div>