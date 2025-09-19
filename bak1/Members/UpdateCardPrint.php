<?php
// INIT
session_start();
 ini_set('display_errors', 1);
require __DIR__ . DIRECTORY_SEPARATOR . "../admin/lib" . DIRECTORY_SEPARATOR . "config.php";
$_ADMIN = false;

if(isset($_SESSION['user'])){
	$_ADMIN = is_array($_SESSION['user']);
	$UserTypeId = $_SESSION['user']['UserTypeId'];
}else{
	echo "Invalid Access";
	die;
}

require PATH_LIB . "lib-members.php";
$memLib = new Members();

if(isset($_REQUEST['Status'])){
	$searchType = $_REQUEST['Status'];//18
	$filter = $_REQUEST;//18
}
//die;
$memData = $memLib->edit($type='cardPrint', $filter);
if($memData){
echo "<script>alert('done');window.location = '". webUrl ."/Members/PendingCardPrint?Status=1';</script>";
}else{
echo "<script>alert('error');window.location = '". webUrl ."/Members/PendingCardPrint?Status=1';</script>";
}
?>