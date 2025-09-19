<?php
// INIT
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "../admin/lib" . DIRECTORY_SEPARATOR . "config.php";

$_ADMIN = false;
$UserTypeId = 0;
$Approved = 0;
$MembersId = 0;
$Rep = 0;
$rowid = 0;
if(isset($_SESSION['user']) && $_SESSION['user']['UserTypeId']<=2){
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

if(isset($_REQUEST['id'])){
	$MembersId = $_REQUEST['id'];//18
}else{
	echo "Invalid user";
	die;
}
if(isset($_REQUEST['rowid'])){
	$rowid = $_REQUEST['rowid'];//18
}else{
	echo "Invalid user";
	die;
}


require PATH_LIB . "lib-members.php";
$memLib = new Members();
$memData = $memLib->del($rowid);
echo "<font color='green'>Deleted Successfully</font>";
echo "<script>$('#".$rowid."').hide()</script>";
die;