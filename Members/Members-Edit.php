<?php


session_start();

$SESS = array();$SESS2 = array();
$filename = "../FileUpload1.txt";
if (file_exists($filename)){
    //echo "File exist.";
	$SESS = json_decode(file_get_contents($filename));
}

$filename = "../FileUpload2.txt";
if (file_exists($filename)){
    //echo "File exist.";
	$SESS2 = json_decode(file_get_contents($filename));
}

require __DIR__ . DIRECTORY_SEPARATOR . "../admin/lib" . DIRECTORY_SEPARATOR . "config.php";
if(isset($_REQUEST["tns"])){
	
	$_ADMIN = false;
	$UserTypeId = 0;
	$MembersId = 0;
	$_REQUEST['id'] = 0;
}else{

	$_ADMIN = false;
	error_reporting(E_ALL); ini_set('display_errors', 1);
	$UserTypeId = 0;
	$MembersId = 0;

	if(isset($_SESSION['user'])){
		$_ADMIN = is_array($_SESSION['user']);
		$UserTypeId = $_SESSION['user']['UserTypeId'];
	}
	if(!$_ADMIN){
		echo "Invalid loggin";
		die;
	}
}

if(isset($_REQUEST['id'])){
	$MembersId = $_REQUEST['id'];//18
}
 //$_REQUEST['id'] = 17765;
// $_REQUEST['MembersId'] = 17765;

require PATH_LIB . "lib-members.php";
$memLib = new Members();
///print_r($_REQUEST);
$data = $_REQUEST;
if($_REQUEST['MembersId']>0)
	$data['CreatedBy'] = $UserTypeId;
$data['UpdateBy'] = $UserTypeId;
//$data['DueDate'] = isset($data['DueDate'])?date('Y-m-d',strtotime($data['DueDate'])):'0000-0-00';
//$data['DOBRep1'] = isset($data['DOBRep1'])?date('Y-m-d',strtotime($data['DOBRep1'])):'0000-0-00';
//$data['DOBRep2'] = isset($data['DOBRep2'])?date('Y-m-d',strtotime($data['DOBRep2'])):'0000-0-00';
//$data['FY'] = isset($data['FY'])?implode(',',$data['FY']):'';
if($data['MemberType']=='GM' && empty($data['FY'])){
if (date('m') < 4) {//Upto June 2014-2015
    $data['FY']  = (date('Y')-1) . '-' . date('Y');
} else {//After June 2015-2016
    $data['FY']  = date('Y') . '-' . (date('Y') + 1);
}
}
//$data['SubGroupId'] = isset($data['SGId'] && is_array($data['SGId']))?implode(',',$data['SGId']):0;

$data['Approved'] = isset($data['Approved'])?$data['Approved']:0;
$data['CardPrintRep1'] = isset($data['CardPrintRep1'])?1:($MembersId==0?1:0);
$data['CardPrintRep2'] = isset($data['CardPrintRep2'])?1:($MembersId==0?1:0);
$data['CertificatePrint'] = isset($data['CertificatePrint'])?1:0;
unset($data['SGId']);

if( isset($SESS->ImageUrl) && isset($SESS->SixDRN) && $SESS->SixDRN != $data['SixDRN']){
    unset($SESS->ImageUrl);
}

if( isset($SESS2->ImageUrl) && isset($SESS2->SixDRN) && $SESS2->SixDRN != $data['SixDRN']){
    unset($SESS2->ImageUrl);
}

//$data['MemDoc'] = isset($_SESSION['MemDoc'])?$_SESSION['MemDoc']:$data['MemDoc'];
$data['MemDoc'] = isset($SESS->MemDoc)?$SESS->MemDoc:$data['MemDoc'];
//$data['ImageRep1'] = isset($_SESSION['ImageRep1'])?$_SESSION['ImageRep1']:$data['ImageRep1'];
$data['ImageRep1'] = isset($SESS->ImageUrl)?$SESS->ImageUrl:$data['ImageRep1'];
//$data['ImageRep2'] = isset($_SESSION['ImageRep2'])?$_SESSION['ImageRep2']:$data['ImageRep2'];
$data['ImageRep2'] = isset($SESS2->ImageUrl)?$SESS2->ImageUrl:$data['ImageRep2'];

require PATH_LIB . "lib-masters.php";
$masterLib = new Masters();
if($data['GroupsId']>0){
	
	$gps = $masterLib->get('Groups',$data['GroupsId']);
	$data['GroupName'] = $gps['name'];
}

/* if($data['SubGroupId']>0){
	//$masterLib = new Masters();
	$gps = $masterLib->get('SubGroup',$data['SubGroupId']);
	$data['SubGroupName'] = $gps['name'];
}
 */
if($data['AreaId']>0){
	//$masterLib = new Masters();
	$gps = $masterLib->get('Area',$data['AreaId']);
	$data['AreaName'] = $gps['name'];
}

if($data['CityId']>0){
	//$masterLib = new Masters();
	$gps = $masterLib->get('City',$data['CityId']);
	$data['CityName'] = $gps['name'];
}
if($data['DistrictId']>0){
	//$masterLib = new Masters();
	$gps = $masterLib->get('District',$data['DistrictId']);
	$data['DistrictName'] = $gps['name'];
}

$data['GoverningBodyIdNameRep1'] = '';
$data['GoverningBodyIdNameRep2'] = '';
$data['GBDesignationIdNameRep1'] = '';
$data['GBDesignationIdNameRep2'] = '';
$data['CommitteeIDNameRep1'] = '';
$data['CommitteeIDNameRep2'] = '';
$data['CommitteeIDNameRep2'] = '';
$data['CdesignationIdNameRep1'] = '';
$data['CdesignationIdNameRep2'] = '';

if(isset($data['RegistrationNoOld']) && $data['RegistrationNoOld']<>""){
    $data['RegistrationNoOld'] = trim($data['RegistrationNoOld']);
}
if(isset($data['GoverningBodyIdRep1']) && $data['GoverningBodyIdRep1']>0){
	//$masterLib = new Masters();
	$gps = $masterLib->get('GoverningBody',$data['GoverningBodyIdRep1']);
	$data['GoverningBodyIdNameRep1'] = $gps['name'];
}

if(isset($data['GoverningBodyIdRep2']) && $data['GoverningBodyIdRep2']>0){
	//$masterLib = new Masters();
	$gps = $masterLib->get('GoverningBody',$data['GoverningBodyIdRep2']);
	$data['GoverningBodyIdNameRep2'] = $gps['name'];
}

if(isset($data['GBDesignationIdRep1']) && $data['GBDesignationIdRep1']>0){
	//$masterLib = new Masters();
	$gps = $masterLib->get('designation',$data['GBDesignationIdRep1']);
	$data['GBDesignationIdNameRep1'] = $gps['name'];
}

if(isset($data['GBDesignationIdRep2']) && $data['GBDesignationIdRep2']>0){
	//$masterLib = new Masters();
	$gps = $masterLib->get('designation',$data['GBDesignationIdRep2']);
	$data['GBDesignationIdNameRep2'] = $gps['name'];
}

if(isset($data['CommitteeIDRep1']) && $data['CommitteeIDRep1']>0){
	//$masterLib = new Masters();
	$gps = $masterLib->get('GoverningBody',$data['CommitteeIDRep1']);
	$data['CommitteeIDNameRep1'] = $gps['name'];
}

if(isset($data['CommitteeIDRep2']) && $data['CommitteeIDRep2']>0){
	//$masterLib = new Masters();
	$gps = $masterLib->get('GoverningBody',$data['CommitteeIDRep2']);
	$data['CommitteeIDNameRep2'] = $gps['name'];
}

if(isset($data['CdesignationIdRep1']) && $data['CdesignationIdRep1']>0){
	//$masterLib = new Masters();
	$gps = $masterLib->get('designation',$data['CdesignationIdRep1']);
	$data['CdesignationIdNameRep1'] = $gps['name'];
}

if(isset($data['CdesignationIdRep2']) && $data['CdesignationIdRep2']>0){
	//$masterLib = new Masters();
	$gps = $masterLib->get('designation',$data['CdesignationIdRep2']);
	$data['CdesignationIdNameRep2'] = $gps['name'];
}
if(isset($data['SubGroupId']) && $data['SubGroupId']>0){
	//$masterLib = new Masters();
	$gps = $masterLib->get('SubGroup',$data['SubGroupId']);
	$data['SubGroupName'] = $gps['name'];
}

if(isset($_REQUEST["tns"])){
	unset($data["tns"]);
}

if(isset($_REQUEST["SixDRN"])){
	unset($data["SixDRN"]);
}
$memData = $memLib->exeQuery($data);
if (file_exists($filename)){
    //unlink($filename);
	file_put_contents($filename, '');
}

if(isset($_REQUEST["tns"])){
	Header( 'Location: http://www.cgchamber.org/Success?success='.$memData );
	die;
	echo '<pre>';
//print_r($data);
//print_r($memData);
echo "wait for payment procesing ...";
echo '</pre>';
exit;
}	
/*MembersId	0
FirmName	CG+Tech
MemberType	LT
GroupsId	1
SGId	34
DistrictId	1
CityId	1
AreaId	84
SubGroupName	aaa
Shop	sss
Complex	ddd
Street	fff
PIN	490001
STDCode	0788
Landline	4040404
Mobile	909099090
Email	90@90.com
TINNo	tin123
PAN	pan123
RegistrationNoOld	oldr
Approved	true
CertificatePrint	true
DueDate	05/09/2019
MemDoc	123
DocTitle	pdf
SalutationRep1	Mr.
Representative1	mohan
MobileRep1	8080808080
EmailRep1	80@80.com
DOBRep1	01/07/2019
OrgDesignationRep1	CG+Tech
BloodGroupRep1	O+
GoverningBodyIdRep1	19
GBDesignationIdRep1	9
CommitteeIDRep1	11
CdesignationIdRep1	10
ImageRep1	123
CardPrintRep1	0
SalutationRep2	Mr.
Representative2	
MobileRep2	
EmailRep2	
DOBRep2	
OrgDesignationRep2	
BloodGroupRep2	
GoverningBodyIdRep2	0
GBDesignationIdRep2	0
CommitteeIDRep2	0
CdesignationIdRep2	0
ImageRep2	*/
?>
