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
<form action="<?PHP ECHO webUrl ?>Members/Remark?id=<?= $_REQUEST['id'] ?>" class="form-no-horizontal-spacing" data-ajax="true" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-update="#Remark > #modal-body" id="form0" method="post">                        <div class="row-fluid column-seperation">
                            <div class="span8">
                                <h4>
                                    Remark</h4>
                               
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Remark">Remark</label>
                                    </div>
                                    <div class="span9">
                                        <textarea class="span12" cols="10" id="Remark" name="Remark" placeholder="Request*" rows="10">
</textarea>
                                        <span class="field-validation-valid error" data-valmsg-for="Remark" data-valmsg-replace="true"></span>
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