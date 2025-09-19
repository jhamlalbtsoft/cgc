<?php
// INIT
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "../admin/lib" . DIRECTORY_SEPARATOR . "config.php";
$_ADMIN = false;

$UserTypeId = 0;
$MembersId = 0;
$Rep = 0;
$Card = 0;
if(isset($_SESSION['user'])){
	$_ADMIN = is_array($_SESSION['user']);
	$UserTypeId = $_SESSION['user']['UserTypeId'];
}

$frmAdmin=0;
if(isset($_REQUEST['frmAdmin']) && $_REQUEST['frmAdmin']==1){
	$frmAdmin=$_REQUEST['frmAdmin'];
}elseif(!$_ADMIN){
	echo "Invalid loggin";
	die;
}

if(isset($_REQUEST['MembersId'])){
	$MembersId = $_REQUEST['MembersId'];//18
}else{
	echo "Invalid user";
	die;
}
if(isset($_REQUEST['Card'])){
	$Card = $_REQUEST['Card'];//18
}

$Rep = 1;
if(isset($_REQUEST['Rep'])){
	$Rep = $_REQUEST['Rep'];//18
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head><title>
	Untitled Page
</title></head>
<body>
    <form name="form1" method="post" action="showcard?MembersId=<?= $MembersId ?>&amp;Card=1&amp;Rep=<?= $Rep ?>" id="form1">
    <div>
		<img src="<?PHP ECHO webUrl ?>Members/Card?MembersId=<?= $MembersId ?>&amp;Card=<?= $Card ?>&amp;Rep=<?= $Rep ?>&amp;frmAdmin=1" />
		<img src="<?PHP ECHO webUrl ?>Members/Card?MembersId=<?= $MembersId ?>&amp;Card=<?= $Card ?>b&amp;Rep=<?= $Rep ?>&amp;frmAdmin=1" />
  <?php 
  
  
  /*
           <img src="<?PHP ECHO webUrl ?>card.aspx?MembersId=1419&img=1" />
			<img src="<?PHP ECHO webUrl ?>card.aspx?MembersId=1419&img=1b" />
     
 */  ?>
	<img src=""/>
    </div>
    </form>
</body>
</html