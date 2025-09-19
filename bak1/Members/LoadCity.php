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

$DistrictId=0;
if(isset($_REQUEST['DistrictId'])){
	$DistrictId = $_REQUEST['DistrictId'];//18
}

require PATH_LIB . "lib-members.php";
$memLib = new Members();

$subGroups = $memLib->LoadCity($DistrictId);
//$memData = true;

if($subGroups==false){ 
	$subGroups=array();
}

?>

	<label for="City">City</label>
	<select class="span12" id="CityId" name="CityId" onchange="citychange()" placeholder="">
		<option selected="selected" value="0">Select City</option>
		<?php foreach($subGroups as $group){ ?>
		<option value="<?= $group['id'] ?>" <?php if($group['id']==$id) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
		<?php } ?>
	</select>
	<script type="text/javascript">
		$("#CityId").select2({ dropdownCssClass: 'bigdrop' });
	</script>	
