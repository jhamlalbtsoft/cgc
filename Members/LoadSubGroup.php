<?php
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "../admin/lib" . DIRECTORY_SEPARATOR . "config.php";
$_ADMIN = false;
error_reporting(E_ALL); ini_set('display_errors', 1);
$UserTypeId = 0;
$id = "";

if(isset($_SESSION['user'])){
	$_ADMIN = is_array($_SESSION['user']);
	$UserTypeId = $_SESSION['user']['UserTypeId'];
}
if(!$_ADMIN){
	echo "Invalid loggin";
	die;
}

if(isset($_REQUEST['id'])){
	$id = $_REQUEST['id'];//18
}else{
	echo "Invalid user";
	die;
}

$GroupId=0;
if(isset($_REQUEST['GroupId'])){
	$GroupId = $_REQUEST['GroupId'];//18
}

require PATH_LIB . "lib-members.php";
$memLib = new Members();

$subGroups = $memLib->getSubGroups($GroupId);
//$memData = true;

if($subGroups==false){ 
	$subGroups=array();
}

?>

	<label for="Sub_Group">Sub Group</label>
	<select class="span12 multi SGId" id="SGId" multiple="multiple" name="SGId" placeholder="SubGroups*">
		<?php foreach($subGroups as $group){ ?>
		<option value="<?= $group['id'] ?>" <?php if($group['id']==$id) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
		<?php } ?>
	</select>


	<span class="field-validation-valid error" data-valmsg-for="SGId" data-valmsg-replace="true"></span>
	<script type="text/javascript">
		$(".SGId").select2();
	</script>	
