<?php
// RESTRICT ACCESS
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";
session_start();
if (!is_array($_SESSION['user'])) {
  die("ERR");
}

// INIT
require PATH_LIB . "lib-masters.php";
$mastersLib = new Masters();
$TypeArr = array(1=>"Events", 2=>"Latest News", 3=>"Photo Gallery", 4=>"Media", 5=>"Patrika", 6=>"Government Policy");
// HANDLE AJAX REQUEST
$txtLBL='Error';
if(isset($_REQUEST['Type'])){
	$Type = $_REQUEST['Type'];
	$mType = isset($_REQUEST['mType'])?$_REQUEST['mType']:'';
	//$txtLBL = $TypeArr[$_REQUEST['Type']];
	$txtLBL = $_REQUEST['Type'];
}else{
	echo "invalid request";
	die;
}

switch ($_REQUEST['req']) {
  /* [INVALID REQUEST] */
  default:
    die("ERR");
    break;

  /* [SHOW ALL USERS] */
  case "list":
	//
    $masters = $mastersLib->getAll($Type); 
	
	?>
    <h1>Manage <?= $txtLBL ?></h1>
    <input type="button" value="Add New" onclick="masters.addEdit()"/>
    <?php
    if (is_array($masters)) {
      echo "<table class='zebra'>";
      foreach ($masters as $u) {
        printf("<tr><td>%s - %s </td><td>(%s)</td><td class='right'>"
          . "<input type='button' value='Delete' onclick='masters.del(%u)'>"
          . "<input type='button' value='Edit' onclick='masters.addEdit(%u)'>"
          . "</td></tr>", 
          $u['id'],$u['name'], $u['Code'],
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
		$gbList = $mastersLib->getParents($mType);
    
	$edit = is_numeric($_REQUEST['id']);
    if ($edit) {
      $user = $mastersLib->get($Type, $_REQUEST['id']);
	  //print_r( $user);
    } ?>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <h1><?=$edit?"EDIT":"ADD"?> <?= $txtLBL ?></h1>
    <form onsubmit="return masters.save()" enctype="multipart/form-data">
      <input type="hidden" id="id" value="<?=$user['id']?>"/>
      <input type="hidden" id="Type" value="<?=$Type?>"/>
	  
	<?php if('SMSMaster'==$Type){ ?>  
	<input type="hidden" id="Visibility" value="0"/>
	<?php 
		$formatArr = array(array('id'=>'drop', 'name'=>'drop'), array('id'=>'Unicode', 'name'=>'Unicode'), array('id'=>'Normal', 'name'=>'Normal'));
		$TypeArr = array(array('id'=>'BDay', 'name'=>'BDay'), array('id'=>'Anniversary', 'name'=>'Anniversary'), array('id'=>'Normal', 'name'=>'Normal'));
		//$format = array(array('id'=>'GB', 'name'=>'GB'), array('id'=>'Committee', 'name'=>'Committee'));
	?>  
		<label for="Title">Message:</label>
		<textarea id="Title" required><?=$user['name']?></textarea>
		
		<label for="Code">Format :</label>
       <select id="Code">
		<option value="0" <?php if($user['Code']==0) echo 'selected="selected"' ?>></option>
		<?php foreach($formatArr as $gl){ ?>
			<option value="<?=$gl['id']?>" <?php if($user['Code']==$gl['id']) echo 'selected="selected"' ?>><?=$gl['name']?></option>
		<?php } ?>
	  </select>
	  <br>
	  <label for="ParentID">Type :</label>
      <select id="ParentID" >
		<option value="0" <?php if($user['ParentID']==0) echo 'selected="selected"' ?>></option>
		<?php foreach($TypeArr as $gl){ ?>
			<option value="<?=$gl['id']?>" <?php if($user['ParentID']==$gl['id']) echo 'selected="selected"' ?>><?=$gl['name']?></option>
		<?php } ?>
	  </select>
	<?php }else{ ?>  
	  <label for="Title">Title:</label>
      <input type="text" id="Title" required value="<?=$user['name']?>" />
     
      <br>
      <label for="Code" style="display:<?php if($mType=='' && 'SMSGroup' != $Type){?>block;<?php }else{ ?>none;<?php } ?>">Code or Order :</label>
      <input type="text" id="Code" value="<?=$user['Code']?>" style="display:<?php if($mType=='' && 'SMSGroup' != $Type){?>block;<?php }else{ ?>none;<?php } ?>"/>
	  
	  <br>
	   <label for="Visibility" style="display:<?php if($mType=='' && 'SMSGroup' != $Type || $Type=='GoverningBody'){?>block;<?php }else{ ?>none;<?php } ?>">Visible</label>
	  <input id="Visibility" type="checkbox" value="true" name="Visibility" style="display:<?php if($mType==''  && 'SMSGroup' != $Type){?>block;<?php }else{ ?>none;<?php } ?>" <?php if($user['Visibility']==1){?>checked<?php }else{ ?><?php } ?>>	
	 
	  
      <label for="ParentID" style="display:<?php if($mType!='' || count($gbList)>0){?>block;<?php }else{ ?>none;<?php } ?>"><?= $mType ?><?php if($Type=='GoverningBody') echo 'Type '?>:</label>
      <select id="ParentID" style="display:<?php if($mType!='' || count($gbList)>0){?>block;<?php }else{ ?>none;<?php } ?>">
		<option value="0" <?php if($user['ParentID']==0) echo 'selected="selected"' ?>></option>
		<?php foreach($gbList as $gl){ ?>
			<option value="<?=$gl['id']?>" <?php if($user['ParentID']==$gl['id']) echo 'selected="selected"' ?>><?=$gl['name']?></option>
		<?php } ?>
	  </select>
	<?php } ?> 
      
      <input type="button" value="Cancel" onclick="masters.list()"/>
      <input type="submit" value="Save"/>
    </form>
	<script>
        Inittinymce();
    </script>
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
    echo $mastersLib->add($_REQUEST['Title'], $_REQUEST['Code'], $_REQUEST['ParentID'], $_REQUEST['Visibility'], $Type) ? "OK" : "ERR" ;
    break;

  /* [EDIT USER] */
  case "edit":
    echo $mastersLib->edit($_REQUEST['Title'], $_REQUEST['Code'], $_REQUEST['ParentID'], $_REQUEST['Visibility'], $Type, $_REQUEST['id']) ? "OK" : "ERR" ;
    break;

  /* [DELETE USER] */
  case "del":
    echo $mastersLib->del($Type, $_REQUEST['id']) ? "OK" : "ERR" ;
    break;
}
?>