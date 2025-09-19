<?php
// INIT
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "../admin/lib" . DIRECTORY_SEPARATOR . "config.php";$_ADMIN = false;
$UserTypeId = 0;
$SGRep1 = 0;
if(isset($_SESSION['user'])){
	$_ADMIN = is_array($_SESSION['user']);
	$UserTypeId = $_SESSION['user']['UserTypeId'];
}if(isset($_REQUEST['SGRep1'])){
	$SGRep1 = $_REQUEST['SGRep1'];//18
}
?><!DOCTYPE html>
 
     
<html><head>
<style type ="text/css" >
body
{font-family :Cambria  ;font-size : 16px;color:Red;font-weight:bold;
    }
.name{letter-spacing:2px; font-size:100%}
.issue{font-size:120%}.bottom{font-family :Cambria  ;font-size : 13px;color:Black;font-weight:bold;
    }
.name{letter-spacing:2px; font-size:100%}
.issue{font-size:120%}
 </style></head><body style="margin:0px!important"><div style="position:relative; "><img style="width: 100%;z-index:999;visibility:hidden" src="../Image/cert2020v1.jpg"/>
<div style ="z-index:100000;position:absolute  ;top:26%;left:29%">CCCI/LT/01/27/05994 </div>
<div style ="z-index:100000;position:absolute  ;top:26%;left:79%"> 27  </div><div style ="z-index:100000;position:absolute  ;top:52%;left:20%" class="name">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp AIPHA CONSULTANT PVT. LTD., RAIPUR</div>
  
  
     
 <div style ="z-index:100000;position:absolute  ;top:47.5%;left:24%" class="name">Mr. RAMESH GANDHI <br/>Mrs. MEENA GANDHI </div>      
            
<div style ="z-index:100000;position:absolute  ;top:86%;left:5%" class="bottom">Issued By:  admin, &nbsp  Signature  </div><div style ="z-index:100000;position:absolute  ;top:99%;left:5%; font-size:12px; color:Black; font-weight:normal">Registration No:  CCCI05893/ 27 / LT  </div>
</div>  </body></html>