<?php
//ini_set("allow_url_fopen", true);
//phpinfo();
//die;
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "../admin/lib" . DIRECTORY_SEPARATOR . "config.php";
$_ADMIN = false;
//error_reporting(E_ALL); 
//ini_set('display_errors', 1);
$UserTypeId = 0;
$MembersId = 0;
$Rep = 1;
$Card = 0;
if(isset($_SESSION['user'])){
	$_ADMIN = is_array($_SESSION['user']);
	$UserTypeId = $_SESSION['user']['UserTypeId'];
}
if(!$_ADMIN){
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

if(isset($_REQUEST['Rep'])){
	$Rep = $_REQUEST['Rep'];//18
}

require PATH_LIB . "lib-members.php";
$memLib = new Members();

$memData = $memLib->get($MembersId);

if($memData==false){ 
	echo "Invalid userid";
	die;
}
///echo '<pre>', print_r($memData), '</pre>';
	
$FirmName = $memData['FirmName'];
$GroupName = $memData['GroupName'];
//$TINNo = $memData['TINNo'];
///$RegistrationNo = $memData['RegistrationNo'];
$RegistrationNo = $memData['RegistrationNoOld'];
//$RegistrationNoOld = "Old Registration No.- " . $memData['RegistrationNoOld'];
$RegistrationNoOld = " " . $memData['RegistrationNoOld'];//Registration No.-
$MemberType = $memData['MemberType']=='LT'?'LIFETIME MEMBER':"GENERAL MEMBER";
//$Representative = $Rep==2?$memData['Representative2']:$memData['Representative1'];
$Representative1 = $memData['Representative1'];
$Representative2 = $memData['Representative2'];
//$ImageRep1 = $Rep==2?$memData['ImageRep2']:$memData['ImageRep1'];
//$ImageRep2 = $Rep==2?$memData['ImageRep1']:$memData['ImageRep2'];
$ImageRep1 = $memData['ImageRep1'];
$ImageRep2 = $memData['ImageRep2'];
$OrgDesignationRep1 = $memData['OrgDesignationRep1'];
$OrgDesignationRep2 = $memData['OrgDesignationRep2'];
$GBDesignationIdNameRep1 = $memData['GBDesignationIdNameRep1'];
$GBDesignationIdNameRep2 = $memData['GBDesignationIdNameRep2'];

if($ImageRep1=='')
	$ImageRep1 = "Image/no.jpg";
	
if($ImageRep2=='')
	$ImageRep2 = "Image/no.jpg";

$s='';	
if($memData['SubGroupName'])
	$s.=$memData['SubGroupName'];
if($memData['Shop']){
	if($s)
		$s.=" ";
	$s.=$memData['Shop'];	
}

if($memData['Complex']){
	if($s)
		$s.="\r\n";
	$s.=$memData['Complex'];	
}

if($memData['Street']){
	if($s)
		$s.="\r\n";	
	$s.=$memData['Street'];	
}

if($memData['AreaName']){
	if($s)
		$s.="\r\n";	
	$s.=$memData['AreaName'];	
}
if($memData['CityName']){
	if($s)
		$s.=", ";	
	$s.=$memData['CityName'];	
}

if($memData['DistrictName']){
	if($s)
		$s.=",\r\nDist.-";	
	$s.=$memData['DistrictName'];	
}

if($memData['PIN']){
	if($s)
		$s.=", ";	
	$s.=$memData['PIN'];	
}

$s = trim(str_replace(",,", ",",$s));

if($Card=='1'){
	//createimageinstantly();die;
	header('Content-type: image/jpeg');

	//$jpg_image =mergeImages(webUrl.'image/ZIAUL-REHMAN_15057.jpg', webUrl.'image/1.jpg');
	//$ImageRep1 = str_replace(" ", "%20", $ImageRep1);
	//$src = webUrl.$ImageRep1;
	$src = '../'.$ImageRep1;
	//$src='../Image/4162_om 25-06-233333.jpg';
	
	//$dest = webUrl.'Image/1.jpg';
	//$dest = webUrl.'Image/cert_format1.jpg';
	$dest = '../Image/cert_format1.jpg';
	
	$src = imagecreatefromjpeg($src);
	$dest = imagecreatefromjpeg($dest);
	
	//imagealphablending($dest, false);
	imagesavealpha($dest, true);

	imagecopymerge($dest, $src, 55, 227, 10, 0, 202, 270, 100); 
	//85, 227, 20, 0, 232, 310, 100
	//imagecopymerge($dest, $src, 85, 227, 60, 0, 232, 300, 100); 
	
	//$white = imagecolorallocate($dest, 255, 255, 255);
	$black = imagecolorallocate($dest, 0, 0, 0);

	// Set Path to Font File
	//$font_path = '/home/cgchamber19/public_html/cgc/font/Verdana.ttf';
    $font_path = '../font/Verdana.ttf';
	// Set Text to Be Printed On Image
	//$ImageRep1 = "Image/ZIAUL-REHMAN_15057.jpg";
	////$RegistrationNo = "CCCI33963/19/LT";

	// Print Text On Image
	//imagettftext($dest, 10, 0, 575, 305, $black, $font_path, $RegistrationNo);
	//imagettftext($dest, 25, 0, 475, 355, $black, $font_path, $Representative1);
	//imagettftext($dest, 25, 0, 575, 405, $black, $font_path, $MemberType);
	
	$words = explode(' ', $Representative1);
    if (count($words) > 2) {
        $line1 = $words[0] . ' ' . $words[1];
        $line2 = implode(' ', array_slice($words, 2));
    } else {
        $line1 = $Representative1;
        $line2 = '';
    }

	imagettftext($dest, 30, 0, 425, 333, $black, $font_path, $line1);

    if (!empty($line2)) {
        imagettftext($dest, 30, 0, 425, (333+40), $black, $font_path, $line2); // 40px lower
    }
    //imagettftext($dest, 30, 0, 425, 333, $black, $font_path, $Representative1);
    
	imagejpeg($dest);

	imagedestroy($dest);
	imagedestroy($src);
}

if($Card=='1b'){
	//createimageinstantly();die;
	header('Content-type: image/jpeg');

	//$jpg_image =mergeImages(webUrl.'image/ZIAUL-REHMAN_15057.jpg', webUrl.'image/1.jpg');
	//$ImageRep2 = str_replace(" ", "%20", $ImageRep2);
	//$src = webUrl.$ImageRep2;
	$src = '../'.$ImageRep2;
	 
	//$dest = webUrl.'Image/1b.jpg';
	$dest = '../Image/1b.jpg';
	
	$src = imagecreatefromjpeg($src);
	$dest = imagecreatefromjpeg($dest);
	
	//imagealphablending($dest, false);
	imagesavealpha($dest, true);

	imagecopymerge($dest, $src, 73, 63, 20, 0, 185, 225, 100); 
	//imagecopymerge($dest, $src, 73, 63, 50, 20, 200, 225, 100); 
	//$white = imagecolorallocate($dest, 255, 255, 255);
	$black = imagecolorallocate($dest, 0, 0, 0);

	// Set Path to Font File
	$font_path = '../font/Verdana.ttf';
    
    $FirmNameTop = 215;
    if(strlen($FirmName) > 20){
        $FirmName = wordwrap($FirmName, 20, "\n");
        $FirmNameTop = 200;
    }
	// Set Text to Be Printed On Image
	//$ImageRep1 = "Image/ZIAUL-REHMAN_15057.jpg";
	//$RegistrationNo = "CCCI33963/19/LT";

	// Print Text On Image
	/*imagettftext($dest, 25, 0, 495, 133, $black, $font_path, $RegistrationNo);
	imagettftext($dest, 25, 0, 420, 175, $black, $font_path, $Representative2);
	imagettftext($dest, 25, 0, 495, 215, $black, $font_path, $OrgDesignationRep2);
	imagettftext($dest, 25, 0, 265, 380, $black, $font_path, $FirmName);
	imagettftext($dest, 18, 0, 71, 411, $black, $font_path, $RegistrationNoOld);
	imagettftext($dest, 18, 0, 71, 442, $black, $font_path, $s);*/
	// Print Text On Image
	imagettftext($dest, 25, 0, 495, 115, $black, $font_path, $RegistrationNo);
	///imagettftext($dest, 45, 0, 1260, 330, $black, $font_path, $MobileRep1);
	imagettftext($dest, 20, 0, 495, 165, $black, $font_path, $Representative2);
	imagettftext($dest, 20, 0, 585, $FirmNameTop, $black, $font_path, $FirmName);
	imagettftext($dest, 18, 0, 375, 315, $black, $font_path, $s);

	imagejpeg($dest);

	imagedestroy($dest);
	imagedestroy($src);
}

if($Card=='2'){
   // echo ":;".$Rep ;die;
	//createimageinstantly();die;
	header('Content-type: image/jpeg');

	//$jpg_image =mergeImages(webUrl.'image/ZIAUL-REHMAN_15057.jpg', webUrl.'image/1.jpg');
	//$ImageRep1 = str_replace(" ", "%20", $ImageRep1);
	
	//$src = webUrl.$ImageRep1;
	$src = $Rep == 1 ? '../'.$ImageRep1 : '../'.$ImageRep2;
	$representative = $Rep == 1 ? $Representative1 : $Representative2;
	$gbDesg = $Rep == 1 ? $GBDesignationIdNameRep1 : $GBDesignationIdNameRep2;
	//$dest = webUrl.'Image/cert_format2.jpg';
	$dest = '../Image/cert_format22.jpg';
	
	$src = imagecreatefromjpeg($src);
	$dest = imagecreatefromjpeg($dest);
	
	//imagealphablending($dest, false);
	imagesavealpha($dest, true);
	imagecopymerge($dest, $src, 57, 240, 30, 0, 233, 310, 100); 
	
	//imagecopymerge($dest, $src, 56, 240, 70, 0, 233, 300, 100); 
	
	//$white = imagecolorallocate($dest, 255, 255, 255);
	$black = imagecolorallocate($dest, 0, 0, 0);

	// Set Path to Font File
	$font_path = '../font/Verdana.ttf';

	// Set Text to Be Printed On Image
	
	// Print Text On Image
	/*imagettftext($dest, 25, 0, 527, 268, $black, $font_path, $RegistrationNo);
	imagettftext($dest, 25, 0, 455, 318, $black, $font_path, $Representative1);
	imagettftext($dest, 25, 0, 527, 365, $black, $font_path, $GBDesignationIdNameRep1);*/
	imagettftext($dest, 35, 0, 535, 335, $black, $font_path, $representative);
	imagettftext($dest, 35, 0, 700, 400, $black, $font_path, $gbDesg);

	imagejpeg($dest);

	imagedestroy($dest);
	imagedestroy($src);
}

if($Card=='2b'|| $Card=='3' || $Card=='3b'){
	//createimageinstantly();die;
	header('Content-type: image/jpeg');

	//$jpg_image =mergeImages(webUrl.'image/ZIAUL-REHMAN_15057.jpg', webUrl.'image/1.jpg');
	//$src = webUrl.'image/ZIAUL-REHMAN_15057.jpg';
	
	//$dest = webUrl.'Image/2b.jpg';
	$dest = '../Image/22b.jpg';
	
	//$src = imagecreatefromjpeg($src);
	$dest = imagecreatefromjpeg($dest);
	
	//imagealphablending($dest, false);
	imagesavealpha($dest, true);

	//imagecopymerge($dest, $src, 83, 227, 60, 0, 234, 300, 100); 
	
	//$white = imagecolorallocate($dest, 255, 255, 255);
	$black = imagecolorallocate($dest, 0, 0, 0);

	// Set Path to Font File
	$font_path = '../font/Verdana.ttf';

	// Set Text to Be Printed On Image

	// Print Text On Image
	/*imagettftext($dest, 25, 0, 280, 140, $black, $font_path, $FirmName);
	imagettftext($dest, 20, 0, 400, 180, $black, $font_path, $RegistrationNoOld);
	imagettftext($dest, 20, 0, 85, 220, $black, $font_path, $s);*/
	imagettftext($dest, 25, 0, 500, 130, $black, $font_path, $RegistrationNoOld);
	imagettftext($dest, 25, 0, 500, 185, $black, $font_path, $FirmName);
	
	imagettftext($dest, 20, 0, 500, 230, $black, $font_path, $s);

	imagejpeg($dest);

	imagedestroy($dest);
	imagedestroy($src);
}

?>