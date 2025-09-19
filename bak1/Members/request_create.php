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
	$MembersId = $_REQUEST['id'];//18
}else{
	echo "Invalid user";
	die;
}

require PATH_LIB . "lib-members.php";
$memLib = new Members();

//$memData = $memLib->getAll($searchType=0, $filter);
$memData = $memLib->get($MembersId);
if($memData==false)
{
	echo "Invalid request";
	die;
}	

?>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <style type="text/css">
        label {
            font-weight: bold;
        }
    </style>
    <div class="row-fluid">
        <div class="span12">
            <div class="grid simple">
                <div class="grid-body no-border">
                    <div id="fc">
                        <form action="Members/request_create_submit" class="form-no-horizontal-spacing" data-ajax="true" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-update="#Req > #modal-body" id="form0" method="post">
                            <div class="row-fluid column-seperation">
                                <div class="span8">
                                    <h4>
                                    Request</h4>
                                    <div class="row-fluid">
                                        <div class="span12">

                                            आप यदि व्यूह (View) में फिड डाटा (Feed Data) में यदि कोई परिवर्तन चाहते है तो कृपया उस काॅलम को भरकर सेव (Save) करें । उसके पश्चात् उसका प्रिंट (Print) निकालकर अपने प्रतिष्ठान की शील (Seal) लगाकर एवं हस्ताक्षर कर चेम्बर में भेजने की कृपा करें।
                                            <br>
                                            <br> पत्र प्राप्त होने के 72 घंटे के अन्दर आपका नया डाटा अपडेट (Data Update) हो जायेगा।
                                            <br>
                                            <br>

                                            <b>नोट:-</b> यदि फोटो भी चेन्ज (Change) या अपलोड (Upload) करना (फोटो नहीं होने की दषा में) हो तो एक प्रति भेजने की कृपा करें।
                                            <br>
                                            <br>
                                            <br>
                                        </div>
                                    </div>

                                    <div class="row-fluid">
                                        <div class="span3">
                                            <label for="Firm_Name">Firm Name</label>
                                        </div>
                                        <div class="span9">
                                            <?= $memData['FirmName'] ?>
                                            <input data-val="true" data-val-number="The field MembersId must be a number." data-val-required="The MembersId field is required." id="MembersId" name="MembersId" type="hidden" value="<?= $memData['MembersId'] ?>" />
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span3">
                                            <label for="Registration_No">Registration No</label>
                                        </div>
                                        <div class="span9">
                                            <?= $memData['RegistrationNo'] ?>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span3">
                                            <label for="Name">Name</label>
                                        </div>
                                        <div class="span9">
                                            <input required class="span12" id="Name" name="Name" placeholder="Name*" type="text" value="" />
                                            <span class="field-validation-valid error" data-valmsg-for="Name" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span3">
                                            <label for="Contact_Number">Contact Number</label>
                                        </div>
                                        <div class="span9">
                                            <input required class="span12" id="ContactNumber" name="ContactNumber" placeholder="Contact Number*" type="text" value="" />
                                            <span class="field-validation-valid error" data-valmsg-for="ContactNumber" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span3">
                                            <label for="Email">Email</label>
                                        </div>
                                        <div class="span9">
                                            <input required class="span12" id="EmailId" name="EmailId" placeholder="Email*" type="text" value="" />
                                            <span class="field-validation-valid error" data-valmsg-for="EmailId" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span3">
                                            <label for="Request">Request</label>
                                        </div>
                                        <div class="span9">
                                            <textarea required class="span12" cols="20" id="RequestText" name="RequestText" placeholder="Request*" rows="2" style="height:300px"> </textarea>
                                            <span class="field-validation-valid error" data-valmsg-for="RequestText" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span3">

                                        </div>
                                        <div class="span9">
                                            <iframe src="<?PHP ECHO webUrl ?>Web_Image_Upload.php?size=50" width="100%" height="150px" frameborder="0">
                                            </iframe>
                                        </div>
                                    </div>

                                    <!--div class="row-fluid">
                                        <div class="span12">
                                            <label for="Enter_the_letters_in_the_image__Letters_are_case_sensitive_">Enter the letters in the image (Letters are case sensitive)</label>
                                            <img src="ImageGen.aspx?id=25/08/2019 12:29:03 PM" />
                                            <input class="span12" id="Image" name="Image" placeholder="*" type="text" value="" />
                                            <span class="field-validation-valid error" data-valmsg-for="Image" data-valmsg-replace="true"></span>
                                        </div>
                                    </div-->

                                </div>
                                <script type="text/javascript">
                                    $(document).ready(function() {
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        Inittinymce();
    </script>