<?php
// Connection 
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";
ini_set('max_execution_time', 1);
ini_set('memory_limit', '512M');
//$conn=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
//$db=mysql_select_db(DB_NAME,$conn);
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);
mysqli_select_db($con,DB_NAME); 
$filename = "members".date('YmdHis').".xls"; // File Name
// Download file
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
$user_query = mysqli_query($con, 'select * from members where MembersId>0');
// Write data to file
$flag = false;
while ($row = mysqli_fetch_assoc($user_query)) {
	//unset($row['MembersId']);
	unset($row['old_remarks']);
    if (!$flag) {
        // display field/column names as first row
        echo implode("\t", array_keys($row)) . "\r\n";
        $flag = true;
    }
	$row['Mobile']= trim($row['Mobile'],',');
	$row['CertDetails']= trim(preg_replace('/\s+/', ' ', $row['CertDetails']));
    echo implode("\t", array_values($row)) . "\r\n";
}
?>