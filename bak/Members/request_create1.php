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

if(isset($_REQUEST['SGRep1'])){
	$SGRep1 = $_REQUEST['SGRep1'];//18
}
?>

<style type="text/css">
    label
    {
        font-weight: bold;
    }
</style>
<div class="row-fluid">
    <div class="span12">
        <div class="grid simple">
            <div class="grid-body no-border">
                <div id="fc">
<form action="" class="form-no-horizontal-spacing" data-ajax="true" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-update="#Req > #modal-body" id="form0" method="post">                        <div class="row-fluid column-seperation">
                            <div class="span8">
                                <h4>
                                    Request</h4>
                         <div class="row-fluid">
                                   <div class="span12">
                                    
                                    ?? ??? ????? (View) ??? ??? ???? (Feed Data) ??? ??? ??? ???????? ????? ?? ?? ????? ?? ????? ?? ???? ??? (Save) ???? ? ???? ??????? ???? ?????? (Print) ??????? ???? ?????????? ?? ??? (Seal) ????? ??? ????????? ?? ?????? ??? ????? ?? ???? ?????<br><br>

???? ??????? ???? ?? 72 ???? ?? ????? ???? ??? ???? ????? (Data Update) ?? ???????<br><br>

<b>???:-</b> ??? ???? ?? ????? (Change) ?? ????? (Upload) ???? (???? ???? ???? ?? ??? ???) ?? ?? ?? ????? ????? ?? ???? ?????<br><br><br>
                                    </div>
                                    </div>
                        
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Firm_Name">Firm Name</label>
                                    </div>
                                    <div class="span9">
                                        AIPHA CONSULTANT PVT. LTD. <input data-val="true" data-val-number="The field MembersId must be a number." data-val-required="The MembersId field is required." id="MembersId" name="MembersId" type="hidden" value="5994" />
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Registration_No">Registration No</label>
                                    </div>
                                    <div class="span9">
                                        CCCI/LT/01/27/05994
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Name">Name</label>
                                    </div>
                                    <div class="span9">
                                        <input class="span12" id="Name" name="Name" placeholder="Name*" type="text" value="" />
                                        <span class="field-validation-valid error" data-valmsg-for="Name" data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Contact_Number">Contact Number</label>
                                    </div>
                                    <div class="span9">
                                        <input class="span12" id="ContactNumber" name="ContactNumber" placeholder="Contact Number*" type="text" value="" />
                                        <span class="field-validation-valid error" data-valmsg-for="ContactNumber" data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Email">Email</label>
                                    </div>
                                    <div class="span9">
                                        <input class="span12" id="EmailId" name="EmailId" placeholder="Email*" type="text" value="" />
                                        <span class="field-validation-valid error" data-valmsg-for="EmailId" data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Request">Request</label>
                                    </div>
                                    <div class="span9">
                                        <textarea class="span12" cols="20" id="RequestText" name="RequestText" placeholder="Request*" rows="2" style="height:300px">
</textarea>
                                        <span class="field-validation-valid error" data-valmsg-for="RequestText" data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                 <div class="row-fluid">
                                    <div class="span3">
                                       
                                    </div>
                                    <div class="span9">
 <iframe src="<?PHP ECHO webUrl ?>Web_Image_Upload1.aspx?size=50" width="100%" height="150px"  frameborder="0">
 </iframe>                                    </div>
                                </div>
                               
                                <div class="row-fluid">
                                    <div class="span12">
                                        <label for="Enter_the_letters_in_the_image__Letters_are_case_sensitive_">Enter the letters in the image (Letters are case sensitive)</label>
                                        <img src="ImageGen.aspx?id=25/08/2019 12:29:03 PM" />
                                        <input class="span12" id="Image" name="Image" placeholder="*" type="text" value="" />
                                        <span class="field-validation-valid error" data-valmsg-for="Image" data-valmsg-replace="true"></span>
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
                        </div>
	<div class="form-actions">
        <div class="pull-left">
        </div>
        <div class="pull-right">
            <button class="btn btn-danger btn-cons" type="submit">
                <i class="icon-ok"></i>Save</button>
            
        </div>
    </div>
</form>                </div>
            </div>
        </div>
    </div>
</div>

<script>

    Inittinymce();
</script>