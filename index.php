<?php
//print_r($_REQUEST);
if(isset($_REQUEST['path']))
	$page = $_REQUEST['path'];
else
	$page = 'default';

//http://localhost:8081/cgc
//define("webUrl", "http://www.cgchamber.org/cgc/");
define("webUrl", "https://cgchamber.org/cgc/");
// INIT
//session_start();
//require __DIR__ . DIRECTORY_SEPARATOR . "admin/lib" . DIRECTORY_SEPARATOR . "config.php";

// HTML
if($page=="MembersFormNew"){
    //die("online registration currently not available. please try again later");
	//require  __DIR__ . DIRECTORY_SEPARATOR  . "MembersFormNew.html"; 
}
if($page!='member' && $page!='pendingcardprint'){
require  __DIR__ . DIRECTORY_SEPARATOR  . "header.html"; ?>
<?PHP require  __DIR__ . DIRECTORY_SEPARATOR  . $page.".php"; ?>

<?php require  __DIR__ . DIRECTORY_SEPARATOR  . "footer.html"; ?>
<?php }else{ ?>
<?PHP require  __DIR__ . DIRECTORY_SEPARATOR  . $page.".php"; ?>
<?php } ?>
