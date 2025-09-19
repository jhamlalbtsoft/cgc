<?php
// INIT
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";
// HTML
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
require PATH_LIB . "page-top.php"; 
require PATH_LIB . "lib-members.php";
$memLib = new Members();
$DistrictId=0;
$CityId=0;
$AreaId=0;
$MemberType=0;
$GroupsId=0;
$SubGroupId=0;
$GoverningBodyIdRep1=0;
$GBDesignationIdRep1=0;
if(isset($_REQUEST['submit'])){
	//echo '<pre>';
	//print_r($_REQUEST);
	
	$filter = $_REQUEST;//18	
	$DistrictId = isset($_REQUEST['DistrictId'])?$_REQUEST['DistrictId']:0; 
	$CityId = isset($_REQUEST['CityId'])?$_REQUEST['CityId']:0;  
	$AreaId = isset($_REQUEST['AreaId'])?$_REQUEST['AreaId']:0; 
	//$AreaId = $_REQUEST['AreaId']; 
	$MemberType = isset($_REQUEST['MemberType'])?$_REQUEST['MemberType']:0;  
	$GroupsId = isset($_REQUEST['GroupsId'])?$_REQUEST['GroupsId']:0; 
	$SubGroupId = isset($_REQUEST['SubGroupId'])?$_REQUEST['SubGroupId']:0; 
	$GoverningBodyIdRep1 = isset($_REQUEST['GoverningBodyIdRep1'])?$_REQUEST['GoverningBodyIdRep1']:0;  
	$GBDesignationIdRep1 = isset($_REQUEST['GBDesignationIdRep1'])?$_REQUEST['GBDesignationIdRep1']:0;  
	
	$memData = $memLib->senSMSAll($filter);
	if($memData){
		echo '<br><font color="green">SMS Successfully Sent to '.$memData.' members</font><br>';
	}else{
		echo '<br><font color="red">Server Error!</font><br>';
	}
	///echo '</pre>'; 
}

$groups = $memLib->getGroups();
$subGroups = $memLib->getSubGroups();
$loadDistrict = $memLib->LoadDistrict();
$loadCity = $memLib->loadCity();
$loadArea = $memLib->loadArea();
$getGB = $memLib->getGB('GB');
//$getGBCommittee = $memLib->getGB('Committee');
$getGBCommittee = $memLib->getGB('');
$getDesignation = $memLib->getDesignation();
?>
<div id="container">

	<div class="row-fluid">
		<div class="span12">
			<div class="grid simple">
				<div class="grid-body no-border">
					<div id="fc">
	<form action="SendSMS.php" class="form-no-horizontal-spacing" data-ajax="true" data-ajax-mode="replace" data-ajax-update="#master" id="form0" name="SMSform" method="post">                        
				<div class="row-fluid column-seperation">
								
								<div class="span8">
									<h1>
										Send SMS</h1>
									<div class="row-fluid">
									  
										 <div class="span3">
											<label for="SMS_Group"><strong>SMS Filters : </strong></label>
										</div>
									</div>	
									<div class="row-fluid">
										<div class="span3" id="dist" name="dist">
											<label for="District">District</label>
											<select class="span12" id="DistrictId" name="DistrictId[]" multiple="multiple"  placeholder=""><!--option value="0">Select Dist</option-->
												<?php foreach($loadDistrict as $group){ ?>
												<option value="<?= $group['id'] ?>" <?php if($group['id']==$DistrictId) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
												<?php } ?>						
											</select>
											
										</div>
										
									
										 <div class="span3" id="city" name="city">
											<label for="City">City</label>
											<select class="span12" id="CityId" name="CityId[]" multiple="multiple"  onchange="citychange()" placeholder=""><!--option value="0">Select City</option-->
												<?php foreach($loadCity as $group){ ?>
												<option value="<?= $group['id'] ?>" <?php if($group['id']==$CityId) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
												<?php } ?>	
											</select>
											
										</div>
									   <div class="span3" id="area" name="area">
											<label for="Area">Area</label>
											<select class="span12" id="AreaId" name="AreaId[]" multiple="multiple"  placeholder=""><!--option value="0">Select Area</option--->
												<?php foreach($loadArea as $group){ ?>
												<option value="<?= $group['id'] ?>" <?php if($group['id']==$AreaId) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
												<?php } ?>	
											</select>
											
										</div>
									</div>
									 <div class="row-fluid">
										<div class="span3">
											<label for="Member_Type">Member Type</label>
											<select class="span12" id="MemberType" name="MemberType[]" multiple="multiple" placeholder="">
												<!--option value="">Select Mem Type</option-->
												<option value="LT" <?php if($MemberType=='LT') echo 'selected="selected"' ?>>Life Time</option>
												<option value="GM" <?php if($MemberType=='GM') echo 'selected="selected"' ?>>General Member</option>
											</select>											
										</div>
										<div class="span3" id="grp">
											<label for="Group">Group</label>
											<select class="span12" id="GroupsId" multiple="multiple" name="GroupsId[]" placeholder="">
											<!--option value="0">Select Group</option--->
												<?php foreach($groups as $group){ ?>
												<option value="<?= $group['GroupsId'] ?>" <?php if($group['GroupsId']==$GroupsId) echo 'selected="selected"' ?>><?= $group['GroupName'] ?></option>
												<?php } ?>
											</select>
											
										</div>
										<div class="span4" id="sgrp">
											<label for="Sub_Group">Sub Group</label>
											<select class="span12 multi" id="SubGroupId" multiple="multiple" name="SubGroupId[]" placeholder="SubGroups*">
												<?php foreach($subGroups as $group){ ?>
												<option value="<?= $group['id'] ?>" <?php if($group['id']==$SubGroupId) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
												<?php } ?>
											</select>
											
										</div>
									</div>
									 
									<div class="row-fluid">
										<div class="span3">
											<label for="Message">Message</label>
											<select class="span12" id="sms_type" name="sms_type"  placeholder="">
												<option value="" selected="selected">English</option>
												<option value="unicode">Unicode</option>
											</select>
										</div>
										<div class="span9">
											<textarea class="span12" cols="20" id="SMSText" name="SMSText" placeholder="Message*" rows="5" required></textarea>
											<span class="field-validation-valid error" data-valmsg-for="SMSText" data-valmsg-replace="true"></span>
										</div>
									</div>

									
								</div>
								<div class="span4">
									<div class="row-fluid">&nbsp;</div>
									<div class="row-fluid">&nbsp;</div>
									<div class="row-fluid">&nbsp;</div>
									<div class="row-fluid">&nbsp;</div>
									<div class="row-fluid">&nbsp;</div>
									<div class="row-fluid">
										<div class="span5">
											<label for="Gov_Body_Comm">Gov Body/Comm</label>
											<select class="span12" id="GB" name="GB[]" multiple="multiple" placeholder="">
												<?php foreach($getGBCommittee as $group){ ?>
													<option value="<?= $group['id'] ?>" <?php if($group['id']==$GoverningBodyIdRep1) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
													<?php } ?>
											</select>
										</div>
										<div class="span5">
											<label for="Designation">Designation</label>
											<select class="span12" id="Designation" multiple="multiple" name="Designation[]" placeholder="">
												<!--option selected="selected" value="0">Select Designation</option-->
												<?php foreach($getDesignation as $group){ ?>
													<option value="<?= $group['id'] ?>" <?php if($group['id']==$GBDesignationIdRep1) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
													<?php } ?>
											</select>
										</div>
										
									</div>
								</div>
								
								 <div class="row-fluid"></div>
								 <div class="pull-right">
									<button class="btn btn-danger btn-cons" type="submit" id="submit-form" name="submit">
										<i class="icon-ok"></i>Send</button>
								</div>
							</div>
		<div class="form-actions">
			<div class="pull-left">
			</div>
			<div class="pull-right">
			  
			</div>
		</div>
	</form>                </div>
				</div>
			</div>
		</div>
	</div>
</div>
<script language="JavaScript">
function onsubmitSMSForm(){
	if(document.getElementById('SMSText')==''){
		alert('Please enter SMS Text');
		return false
	}
	return true;
}
</script>
<?php require PATH_LIB . "page-bottom.php"; ?>
<link href="<?php echo webUrl ?>cassette.axd/stylesheet/b54e6c3cd41636c423439c76df997eefce57a3cb/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">