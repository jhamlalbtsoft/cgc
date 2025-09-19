<?php
// RESTRICT ACCESS
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";
session_start();

if (!is_array($_SESSION['user'])) {
  die("ERR");
}

// INIT
require PATH_LIB . "lib-eep.php";
$eepLib = new Eep();
$TypeArr = array(1=>"Events", 2=>"Latest News", 3=>"Photo Gallery", 4=>"Media", 5=>"Patrika", 6=>"Government Policy");
// HANDLE AJAX REQUEST
$txtLBL='Error';
if(isset($_REQUEST['TypeId'])){
	$TypeId = $_REQUEST['TypeId'];
	$txtLBL = $TypeArr[$_REQUEST['TypeId']];
}else{
	echo "invalid request";
	die;
}

 $imgPath="";

if(isset($_SESSION['eep'.$TypeId])){
    $imgPath = $_SESSION['eep'.$TypeId];
    unset($_SESSION['eep'.$TypeId]);
}
 $filePath1 ="";
 //print_r($_SESSION);
if(isset($_SESSION['fileeep'.$TypeId])){
    $filePath1 = $_SESSION['fileeep'.$TypeId];
    unset($_SESSION['fileeep'.$TypeId]);
}


switch ($_REQUEST['req']) {
  /* [INVALID REQUEST] */
  default:
    die("ERR");
    break;

  /* [SHOW ALL USERS] */
  case "list":
	//
	if($TypeId==2){
        $cond='';
        if($_REQUEST['catType'])
           $cond = " and title='".$_REQUEST['catType']."'";
		$eep = $eepLib->getAll($TypeId, 0, "", $cond);
	}else
	    $eep = $eepLib->getAll($TypeId); 
	
	?>
    <h1>MANAGE <?= $txtLBL ?></h1>
    <?php
    if($TypeId==2){
        
		$eepListNews = $eepLib->getAll(2, 0, " group by title", '', ' order by Title');
		?>
		<select id="catType"  onchange="if (this.value) window.location.href=this.value" style="float: right;">
		<option value="http://www.cgchamber.org/cgc/admin/eep?TypeId=2" <?php if(!isset($_REQUEST['catType']) && $_REQUEST['catType']=='') echo 'selected="selected"' ?>>All</option>
		<?php foreach($eepListNews as $gl){ ?>
			<option value="http://www.cgchamber.org/cgc/admin/eep?TypeId=2&catType=<?=$gl['Title']?>" <?php if(isset($_REQUEST['catType']) && $_REQUEST['catType']==$gl['Title']) echo 'selected="selected"' ?>><?=$gl['Title']?></option>
		<?php } ?>
	  </select>
	  <?php
    }
	?>
    <input type="button" value="Add New" onclick="eep.addEdit()"/>
    <?php
    if (is_array($eep)) {
      echo "<table class='zebra'>";
      foreach ($eep as $u) {
        printf("<tr><td>%s (%s)</td><td>%s</td><td class='right'>"
          . "<input type='button' value='Delete' onclick='eep.del(%u)'>"
          . "<input type='button' value='Edit' onclick='eep.addEdit(%u)'>"
          . "<a target='_new' href='multiFiles.php?fId=%u'>Upload files</a>"
          . "</td></tr>", 
          $u['Title'], $u['DateOfEEP'],$u['Description'],
          $u['EEPId'], $u['EEPId'], $u['EEPId']
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
	if($TypeId)
		$gbList = $eepLib->getAllGoverningBody();
    $edit = is_numeric($_REQUEST['id']);
    if ($edit) {
      $user = $eepLib->get($_REQUEST['id']);
    } ?>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <h1><?=$edit?"EDIT":"ADD"?> <?= $txtLBL ?></h1>
    <form onsubmit="return eep.save()" enctype="multipart/form-data">
      <input type="hidden" id="EEPId" value="<?=$user['EEPId']?>"/>
      <input type="hidden" id="TypeId" value="<?=$TypeId?>"/>
	  <label for="Title">Title:</label>
      <input type="text" id="Title" required value="<?=$user['Title']?>"/>
      <label for="DateOfEEP">Date:</label> <br>
      <input type="date" id="DateOfEEP" required value="<?=$user['DateOfEEP']?>"/>
      <br>
      <label for="Description">Description:</label>
      <textarea id="Description" ><?=$user['Description']?></textarea>
	  
	  
      <label for="GovernmentPolicyId" style="display:<?php if($TypeId==6){?>block;<?php }else{ ?>none;<?php } ?>">Government Policy Category:</label>
      <select id="GovernmentPolicyId" style="display:<?php if($TypeId==6){?>block;<?php }else{ ?>none;<?php } ?>">
		<option value="0" <?php if($user['GovernmentPolicyId']==0) echo 'selected="selected"' ?>></option>
		<?php foreach($gbList as $gl){ ?>
			<option value="<?=$gl['id']?>" <?php if($user['GovernmentPolicyId']==$gl['id']) echo 'selected="selected"' ?>><?=$gl['name']?></option>
		<?php } ?>
	  </select>
	  <?php if($TypeId==2 || $TypeId==5){ ?>
	  <label for="Image"  style="display:none">PDF File:</label><br>
	  <iframe src="<?PHP ECHO webUrl ?>Web_Image_eep2.php?File=eep&amp;id=fileeep<?= $TypeId ?>&amp;type=1&amp;size=150" width="500px" height="50px"  frameborder="0" scrolling=no  style="display:none"></iframe>
	  <br>
      <?php } ?>
      <label for="Image" style="display:none">Image:</label><br>
      <!--input type="file" id="Image" name="Image"/-->
      
      <iframe src="<?PHP ECHO webUrl ?>Web_Image_eep.php?File=eep&amp;id=eep<?= $TypeId ?>&amp;type=1&amp;size=150" width="500px" height="50px"  frameborder="0" scrolling=no style="display:none"></iframe>
      <input type="button" value="Cancel" onclick="eep.list()"/>
      <input type="submit" value="Save"/>
      <input type="hidden" id="ImagePath" value="<?= $user['Image'] ?>"/>
      <input type="hidden" id="filePath" value="<?= $user['filePath'] ?>"/>
	  <?PHP 
		$k=0;
		if($user['Image']){
			$imgArr = explode(',', trim($user['Image'],',')); 
			foreach($imgArr as $imgURL){
			?>
				<div class="superbox">
					<div class="superbox-list DSC_8986_14523" style="float:left;padding:5px;">
						<? /*<img src="<?= //webUrl.$imgURL ?>" data-img="<?= //$imgURL ?>" alt="" class="superbox-img" width="100px" height="">
						*/?>
						<a target="_new" href="<?= webUrl.$imgURL; ?>">File <?= ++$k ?></a></br>
						<a onclick="eep.Remove('<?= $user['EEPId'] ?>','<?= $imgURL ?>','img');" style="cursor: pointer;color:#ff0000">remove</a></div>
				</div>					 
			<?php
			}
		}
	  ?>
	  
	  <?PHP 
		if($user['filePath']){
			$imgArr = explode(',', trim($user['filePath'],',')); 
			foreach($imgArr as $imgURL){
			?>
				<div class="superbox">
					<div class="superbox-list DSC_8986_14523" style="float:left;padding:5px;">
						<a target="_new" href="<?= webUrl.$imgURL ?>">File <?= ++$k ?></a></br>
						<a  onclick="eep.Remove('<?= $user['EEPId'] ?>','<?= $imgURL ?>','file');" style="cursor: pointer;color:#ff0000">remove</a></div>
				</div>					 
			<?php
			}
		}
	  ?>
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
    echo $eepLib->add($_REQUEST['Title'], $_REQUEST['Description'], $imgPath, $filePath1, $_REQUEST['DateOfEEP'], $TypeId, $_REQUEST['GovernmentPolicyId']) ? "OK" : "ERR" ;
    break;

  /* [EDIT USER] */
  case "edit":
   /// echo $_REQUEST['filePath'].'000'.$filePath1;
    echo $eepLib->edit($_REQUEST['Title'], $_REQUEST['Description'], $_REQUEST['ImagePath'], $imgPath, $_REQUEST['filePath'], $filePath1, $_REQUEST['DateOfEEP'], $TypeId, $_REQUEST['GovernmentPolicyId'], $_REQUEST['id']) ? "OK" : "ERR" ;
    break;

  /* [DELETE USER] */
  case "del":
    echo $eepLib->del($_REQUEST['id']) ? "OK" : "ERR" ;
    break;
	
  case "remove":

	if($_REQUEST['ftype']!='file')
		echo $eepLib->remove($_REQUEST['id'], $_REQUEST['imgPath'], '') ? "OK" : "ERR" ;
    else
		echo $eepLib->remove($_REQUEST['id'], '', $_REQUEST['imgPath']) ? "OK" : "ERR" ;
    break;
}
?>