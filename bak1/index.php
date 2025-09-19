<?php
//print_r($_REQUEST);
if(isset($_REQUEST['path']))
	$page = $_REQUEST['path'];
else
	$page = 'default';


//define("webUrl", "http://www.cgchamber.org/cgc/");
define("webUrl", "http://www.cgchamber.org/");
// INIT
//session_start();
//require __DIR__ . DIRECTORY_SEPARATOR . "admin/lib" . DIRECTORY_SEPARATOR . "config.php";

// HTML
if($page!='member' && $page!='pendingcardprint'){
require  __DIR__ . DIRECTORY_SEPARATOR  . "header.html"; ?>
<?PHP require  __DIR__ . DIRECTORY_SEPARATOR  . $page.".html"; ?>

<?php require  __DIR__ . DIRECTORY_SEPARATOR  . "footer.html"; ?>
<?php }else{ ?>
<?PHP require  __DIR__ . DIRECTORY_SEPARATOR  . $page.".html"; ?>
<?php } ?>