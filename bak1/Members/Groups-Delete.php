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
<form action="Groups-Delete?id=92" data-ajax="true" data-ajax-complete="RemoveRow(&#39;92&#39;)" data-ajax-mode="replace" data-ajax-success="hidedpt()" data-ajax-update="#modal-body" id="form0" method="post">    <fieldset>
      
        <h3>Are You Sure Want to Delete</h3>
 
        <p>
            <input type="submit" value="Yes" />
        </p>
    </fieldset>
</form>