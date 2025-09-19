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




 
<div class="row-fluid">
    <div class="span12">
        <div class="grid simple">
            <div class="grid-body no-border">
                <div id="fc">
<form action="/SMSlog/Create/B-SMSlog-Create?inline=0" class="form-no-horizontal-spacing" data-ajax="true" data-ajax-mode="replace" data-ajax-update="#master" id="form0" method="post">                        <div class="row-fluid column-seperation">
                            <div class="span8">
                                <h4>
                                    Send SMS</h4>
                                <div class="row-fluid">
                                  
                                      <div class="span3">
                                        <label for="SMS_Group">SMS Group</label>
                                    </div>
                                    <div class="span9">
                                        <select class="span12 multi" id="SG" multiple="multiple" name="SG" placeholder="SMS Groups*"><option selected="selected" value="0">All</option>
<option value="18">CORE COMMITTEE</option>
</select>
                                        
                                        <span class="field-validation-valid error" data-valmsg-for="SG" data-valmsg-replace="true"></span>
                                    </div>
                                     <script type="text/javascript">
                                    $("#SG").select2();
                                       </script>
                                    
                                </div>
                               

                                 
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Message">Message</label>
                                    </div>
                                    <div class="span9">
                                        <textarea class="span12" cols="20" id="SMSText" name="SMSText" placeholder="Message*" rows="2">
</textarea>
                                        <span class="field-validation-valid error" data-valmsg-for="SMSText" data-valmsg-replace="true"></span>
                                    </div>
                                </div>

                                 <div class="row-fluid">
                      
                </div>
                                <div class="pull-right">
                                    <button class="btn btn-danger btn-cons" type="submit">
                                        <i class="icon-ok"></i>Send</button>
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
          
        </div>
    </div>
</form>                </div>
            </div>
        </div>
    </div>
</div>