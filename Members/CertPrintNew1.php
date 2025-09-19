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
if(isset($_SESSION['user'])){
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

$Rep = 1;
if(isset($_REQUEST['print'])){
	$Rep = $_REQUEST['print'];//18
}


require PATH_LIB . "lib-members.php";
$memLib = new Members();

$memData = $memLib->get($MembersId);

$FirmName = $memData['FirmName'];
$RegistrationNo = $memData['RegistrationNoOld'];
//if($memData['GroupName'])
//    $FirmName .= ', '.$memData['GroupName'];
if($memData['AreaName'])
     $FirmName .= ', '.$memData['AreaName'];
if($memData['CityName'])
        $FirmName .= ', '.$memData['CityName'];
        
    $Representative = '';
    if($memData['SalutationRep1'])
        $Representative .= $memData['SalutationRep1'].' ';
	$Representative .= $memData['Representative1'];
	
        
	if($memData['Representative2']){
	    
        if($memData['SalutationRep2'])
            $memData['Representative2'] = $memData['SalutationRep2'].' '.$memData['Representative2'];
        
	    $Representative .= '<br/>'.$memData['Representative2'];
	}

$imgVisible = $Rep==2?"visibility:hidden":"";
?><!DOCTYPE html>
 
     
<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type ="text/css" >
body
{font-family :Cambria  ;font-size : 16px;color:Red;font-weight:bold;
    }
.name{letter-spacing:2px; font-size:100%}
.issue{font-size:120%}.bottom{font-family :Cambria  ;font-size : 13px;color:Black;font-weight:bold;
    }
.name{letter-spacing:2px; font-size:100%}
.issue{font-size:120%}
 </style></head><body style="margin:0px!important"><div style="position:relative; "><img style="width: 100%;z-index:999;<?= $imgVisible ?>"src="../Image/cert2020v2.jpg"/>
<div style ="z-index:100000;position:absolute  ;top:24.1%;left:28%"><?= $RegistrationNo ?></div>
<div style ="z-index:100000;position:absolute  ;top:24.1%;left:82%"> <?= $memData['GroupsId']-100 ?>  </div><div style ="z-index:100000;position:absolute  ;top:52.4%;left:18%" class="name">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?= $FirmName ?></div>
  
  
     
 <div style ="z-index:100000;position:absolute  ;top:47.2%;left:24%" class="name"><?= $Representative?> </div>      
            
<div style ="z-index:100000;position:absolute  ;top:91%;left:2%" class="bottom">Issued By:  admin, &nbsp  Signature  </div><!--div style ="z-index:100000;position:absolute  ;top:103%;left:5%; font-size:12px; color:Black; font-weight:normal">Registration No:  <?= $memData['RegistrationNoOld'] ?>  </div-->
</div>  </body></html>