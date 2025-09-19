<?php
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "../admin/lib" . DIRECTORY_SEPARATOR . "config.php";
$_ADMIN = false;
//error_reporting(E_ALL); ini_set('display_errors', 1);
$UserTypeId = 0;
$MembersId = 0;

if(isset($_SESSION['user'])){
	$_ADMIN = is_array($_SESSION['user']);
	$UserTypeId = $_SESSION['user']['UserTypeId'];
}
if(!$_ADMIN){
	echo "Invalid loggin";
	die;
}

if(isset($_REQUEST['id'])){
	$MembersId = $_REQUEST['id'];//18
}
 //$_REQUEST['id'] = 17765;
// $_REQUEST['MembersId'] = 17765;

require PATH_LIB . "lib-members.php";
$memLib = new Members();
print_r($_REQUEST);
$data = $_REQUEST;
if($MembersId>0)
	$data['MembersId'] = $MembersId;
	$data['CreatedBy'] = $UserTypeId;
$data['UpdateBy'] = $UserTypeId;
$data['Remark'] = isset($data['Remark'])?htmlspecialchars($data['Remark']):'';
/* 
echo '<pre>';
print_r($data);
die;  */ 
$memData = $memLib->exeQuery($data);

?>
