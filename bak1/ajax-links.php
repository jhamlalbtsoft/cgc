<?php
// RESTRICT ACCESS
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";
session_start();
if (!is_array($_SESSION['user'])) {
  die("ERR");
}

// INIT
require PATH_LIB . "lib-links.php";
$linksLib = new Links();
$TypeArr = array(11=>"Links");
// HANDLE AJAX REQUEST
$txtLBL='Links';
$Type = "links";
/* if(isset($_REQUEST['Type'])){
	$Type = $_REQUEST['Type'];
	$mType = isset($_REQUEST['mType'])?$_REQUEST['mType']:'';
	//$txtLBL = $TypeArr[$_REQUEST['Type']];
	$txtLBL = $_REQUEST['Type'];
}else{
	echo "invalid request";
	die;
} */

switch ($_REQUEST['req']) {
  /* [INVALID REQUEST] */
  default:
    die("ERR");
    break;

  /* [SHOW ALL USERS] */
  case "list":
	//
    $links = $linksLib->getAll($Type); 
	 
	?>
    <h1>Manage <?= $txtLBL ?></h1>
    <input type="button" value="Add New" onclick="mylinks.addEdit()"/>
    <?php
    if (is_array($links)) {
      echo "<table class='zebra'>";
      foreach ($links as $u) {
        printf("<tr><td>%s </td><td>(%s)</td><td class='right'>"
          . "<input type='button' value='Delete' onclick='mylinks.del(%u)'>"
          . "<input type='button' value='Edit' onclick='mylinks.addEdit(%u)'>"
          . "</td></tr>", 
          $u['title'], $u['ulink'],
          $u['id'], $u['id']
        );
      }
      echo "</table>";
    } else {
      echo "<div>No records found.</div>";
    }
    break;

  /* [ADD/EDIT USER DOCKET] */
  case "addEdit":
  $gbList=array();
	if($Type=='GoverningBody')
		$gbList = array(array('id'=>'GB', 'name'=>'GB'), array('id'=>'Committee', 'name'=>'Committee'));
	elseif($mType!='')
		$gbList = $linksLib->getParents($mType);
    $edit = is_numeric($_REQUEST['id']);
    if ($edit) {
      $user = $linksLib->get($Type, $_REQUEST['id']);
	  //print_r( $_REQUEST);
	  //print_r( $user);
    } ?>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <h1><?=$edit?"EDIT":"ADD"?> <?= $txtLBL ?></h1>
    <form onsubmit="return mylinks.save()" enctype="multipart/form-data">
      <input type="hidden" id="id" value="<?=$user['id']?>"/>
      <input type="hidden" id="Type" value="<?=$Type?>"/>
	  
	
	  <label for="Title">WebSite:</label>
      <input type="text" id="Title" required value="<?=$user['title']?>" />
     
      <br>
      <label for="ulink">Url Link :</label>
      <input type="text" id="ulink" value="<?=$user['ulink']?>" />
	       
      <input type="button" value="Cancel" onclick="mylinks.list()"/>
      <input type="submit" value="Save"/>
    </form>

    <?php break;
 
  /* [ADD USER] */
  case "add":
 /*  PRINT_R($_REQUEST);
 
  $_FILES = $_REQUEST['Image'];
	if ( 0 < $_FILES['Image']['error'] ) {
        echo 'Error: ' . $_FILES['Image']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['Image'], 'Image/merged/' . $_FILES['Image']['name']);
    }
	die; */
	//print_r($_REQUEST);
    echo $linksLib->add($_REQUEST['Title'], $_REQUEST['ulink'], $Type) ? "OK" : "ERR" ;
    break;

  /* [EDIT USER] */
  case "edit":
    echo $linksLib->edit($_REQUEST['Title'], $_REQUEST['ulink'], $Type, $_REQUEST['id']) ? "OK" : "ERR" ;
    break;

  /* [DELETE USER] */
  case "del":
    echo $linksLib->del($Type, $_REQUEST['id']) ? "OK" : "ERR" ;
    break;
}
?>