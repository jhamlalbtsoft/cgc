<?php
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "../admin/lib" . DIRECTORY_SEPARATOR . "config.php";
$_ADMIN = false;
error_reporting(E_ALL); ini_set('display_errors', 1);
$UserTypeId = 0;
$MembersIds = 0;
$filter = array();

if(isset($_SESSION['user'])){
	$_ADMIN = is_array($_SESSION['user']);
	$UserTypeId = $_SESSION['user']['UserTypeId'];
}
if(!$_ADMIN){
	echo "Invalid loggin";
	die;
}

if(isset($_REQUEST['id'])){
	$MembersIds = $_REQUEST['id'];//18
}else{
	echo "Invalid user";
	die;
}

if(isset($_REQUEST['status'])){
	$filter = $_REQUEST;
}

require PATH_LIB . "lib-members.php";
$memLib = new Members();

$memData = $memLib->edit('status', $filter);

if($memData==false){ 
	echo "Invalid request";
	die;
}else
	echo "done";

?>