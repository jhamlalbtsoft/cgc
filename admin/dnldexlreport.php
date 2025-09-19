<?php 
// Load the database configuration file 
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";

session_start();

$_ADMIN = is_array($_SESSION['user']);
if (!$_ADMIN && basename($_SERVER["SCRIPT_FILENAME"], '.php')!="login") {
  header('Location: login');
  die();
}

//ini_set("display_errors",1);
//ini_set('max_execution_time', 1);
//ini_set('memory_limit', '512M');
ini_set('memory_limit', '-1');

$_ADMIN = false;
$UserTypeId = 0;
$SGRep1 = 0;
if(isset($_SESSION['user'])){
	$_ADMIN = is_array($_SESSION['user']);
	$UserTypeId = $_SESSION['user']['UserTypeId'];
}
if (!$_ADMIN) {
	echo "you dont have permission";
	die;
}
if(isset($_SESSION['user']['name']) && $_SESSION['user']['name']!='superadmin' && $_SESSION['user']['name']!='admin') {
	echo "invalid try! you don't have permission";
	die;
}

$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);
mysqli_select_db($conn,DB_NAME); 
if(!$conn){
    die('Could not Connect My Sql:' .mysqli_error($conn));
}

$whereCond ="";
$limit = " limit 10 ";
if(isset($_REQUEST["cciFrom"]) && isset($_REQUEST["cciTo"]))
{
    $whereCond .= " AND rnoold >= " .$_REQUEST["cciFrom"];
    $whereCond .= " AND rnoold <= " .$_REQUEST["cciTo"];
    $limit = "";
}

$sql = "Update `members` set rnoold = REPLACE(RegistrationNoOld, 'CCCI', '') where rnoold = 0 ";
mysqli_query($conn,$sql) or die(mysqli_error($conn));

// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "members-data_" . date('Y-m-d-H:i') . ".xls"; 
 /*
 'SubGroupId', 'CityId','DistrictId', 'AreaId', 'Approved',
 , 'GoverningBodyIdRep1', 'GoverningBodyIdNameRep1', 'GBDesignationIdRep1', 'GBDesignationIdNameRep1', 'CommitteeIDRep1', 'CommitteeIDNameRep1', 'CdesignationIdRep1', 'CdesignationIdNameRep1'
 
 'GoverningBodyIdRep2', 'GoverningBodyIdNameRep2', 'GBDesignationIdRep2', 'GBDesignationIdNameRep2', 'CommitteeIDRep2', 'CommitteeIDNameRep2', 'CdesignationIdRep2', 'CdesignationIdNameRep2', 'CardPrintRep2', 'CardDispatchModeRep2', 'CardDetailsRep2'
 */
// Column names 
$fields = array('MemberType', 'FirmName', 'GroupsId', 'GroupName',  'SubGroupName', 'Email', 'STDCode', 'Landline', 'Mobile', 'Shop', 'Complex', 'Street', 'SectorMohalla', 'AreaName', 'CityName', 'DistrictName', 'PIN', 'GSTN', 'RegistrationNo', 'RegistrationNoOld',  'CertificatePrint', 'CertModeOfDispatch', 'CertDetails', 'CertUserId', 'Representative1', 'ImageRep1', 'MobileRep1', 'MobileRep1Alternate', 'OrgDesignationRep1', 'EmailRep1', 'SalutationRep1', 'CardPrintRep1', 'CardDispatchModeRep1', 'CardDetailsRep1', 'CardUserIdRep1', 'Representative2', 'ImageRep2', 'MobileRep2', 'MobileRep2Alternate', 'OrgDesignationRep2', 'EmailRep2', 'SalutationRep2', 'CardPrintRep2'
, 'BookNo', 'Year', 'ReceiptNo', 'BookDate', 'Amount', 'BankAccountNo', 'BankDate', 'BankName', 'BusinessGroupNo', 'MembershipNo', 'AcceptedDate', 'PaymentMode', 'Reference' 
); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 

$fields = str_replace("'", "", implode(',', $fields));
$sql = "SELECT {$fields} FROM members as m 
Left join members_book as mb ON m.MembersId = mb.MembersId
where m.DeletedStatus=0 {$whereCond} ORDER BY m.rnoold desc, m.MembersId desc {$limit}";
///$result = mysqli_query($conn, $sql);
if ($result = mysqli_query($conn, $sql)) {
    
    $num_fields = mysqli_num_fields($result);
            
    if($result->num_rows > 0){ 
        // Output each row of the data 
        while($row = mysqli_fetch_assoc($result)){ 
            $lineData = array_values($row); 
            array_walk($lineData, 'filterData'); 
            $excelData .= implode("\t", array_values($lineData)) . "\n"; 
        } 
    }
    $result->close();
}else{ 
    $excelData .= 'No records found...'. "\n"; 
}
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;