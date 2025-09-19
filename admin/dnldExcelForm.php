<?php
// INIT
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";
// HTML
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
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

?>
<div id="container">

	<div class="row-fluid">
		<div class="span12">
			<div class="grid simple">
				<div class="grid-body no-border">
					<div id="fc">
	<form action="dnldexlreport.php" class="form-no-horizontal-spacing" data-ajax="true" data-ajax-mode="replace" data-ajax-update="#master" id="form0" name="SMSform" method="post">                        
				<div class="row-fluid column-seperation">
								
								<div class="span8">
									<h1>
										Download Members</h1>
									<div class="row-fluid">
									  <hr/>
										 
									</div>	
									<div class="row-fluid">
										<div class="span3" id="dist" name="dist">
											<label for="District">CCCI NO FROM</label>
											<input data-val="true" data-val-number="The field must be a number." data-val-required="The field is required." id="cciFrom" name="cciFrom" type="number" value="" required />
											
										</div>
										
									<div class="span2" id="dist" name="dist"></div>
										 <div class="span2" id="city" name="city">
											<label for="City">CCCI NO TO</label>
											
											<input data-val="true" data-val-number="The field must be a number." data-val-required="The field is required." id="cciTo" name="cciTo" type="number" value="" required />
										</div>
									   
									</div>
									 
									
								</div>
								
								 <div class="row-fluid"></div>
								 <div class="pull-right">
									<button class="btn btn-danger btn-cons" type="submit" id="submit-form" name="submit">
										<i class="icon-ok"></i>Submit</button>
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
    if(document.getElementById('cciFrom')==''){
		alert('Please enter CCCI From');
		return false
	}
	if(document.getElementById('cciTo')==''){
		alert('Please enter CCCI To');
		return false
	}
	return true;
}
</script>
<?php require PATH_LIB . "page-bottom.php"; ?>
<link href="<?php echo webUrl ?>cassette.axd/stylesheet/b54e6c3cd41636c423439c76df997eefce57a3cb/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">