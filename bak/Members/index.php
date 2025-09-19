<?php
//print_r($_REQUEST);
if(isset($_REQUEST['path']))
	$page = $_REQUEST['path'];
else{
	$page = 'default';
	echo "Invalid request";
	die;
}
// INIT
//session_start();
//require __DIR__ . DIRECTORY_SEPARATOR . "admin/lib" . DIRECTORY_SEPARATOR . "config.php";

// HTML
require  __DIR__ . DIRECTORY_SEPARATOR  . "header.html"; ?>
<?PHP require  __DIR__ . DIRECTORY_SEPARATOR  . $page.".html"; ?>

<?php require  __DIR__ . DIRECTORY_SEPARATOR  . "footer.html"; ?>