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
<form action="/Groups/Create/B-Groups-Create?popup=1&amp;eid=AddGroup&amp;fname=LoadGroup" class="form-no-horizontal-spacing" data-ajax="true" data-ajax-mode="replace" data-ajax-update="#AddGroup > #modal-body" id="form0" method="post">    <div class="row-fluid ">
  <div class="span12">
				
                  <h4>Add New Groups</h4>
                   <div class="row-fluid">
                      <div class="span12">
                      <label for="Group_Name">Group Name</label>
                        <input class="span12" data-val="true" data-val-required="Group Name is required." id="GroupName" name="GroupName" placeholder="Group Name*" type="text" value="" />
                        <span class="field-validation-valid error" data-valmsg-for="GroupName" data-valmsg-replace="true"></span>
                      </div>
                </div>
                <div class="row-fluid">
                      <div class="span12">
                      <label for="Code">Code</label>
                        <input class="span12" data-val="true" data-val-required="Group Code is required." id="Code" name="Code" placeholder="Code*" type="text" value="" />
                        <span class="field-validation-valid error" data-valmsg-for="Code" data-valmsg-replace="true"></span>
                      </div>
                </div>
                </div>
                <div class="row-fluid"><div class="span12">
                    <div class="checkbox check-success 	">
                      
                       <input id="Visibility" type="checkbox" value="true" name="Visibility" ></input>
                    
                      <label for="Visibility">Visible</label>
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
					  <button class="btn btn-danger btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
					<a  class="btn btn-white btn-cons"  href="<?PHP ECHO webUrl ?>/Members/Groups-Index" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true">

Cancel</a>
					</div>
				  </div>
</form>    </div>
    </div>
  </div>
 </div>
    </div>