<?php
session_start();
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
if($_SESSION['user']['name']!='superadmin') {
	echo "invalid try! you don't have permission";
	die;
}

if(isset($_POST["submit"]))
{
/* 
                $url='localhost';
                $username='root';
                $password='';
                $conn=mysqli_connect($url,$username,$password,"location"); */
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";
$conn=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
 //$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,"location");
$db=mysql_select_db(DB_NAME,$conn);

          if(!$conn){
			die('Could not Connect My Sql:' .mysqli_error());
		  }
		// create backup
		//////////////////////////////////////

		$backup_file = 'public/sqlbak/db-backup-'.time().'.sql';
		// get backup
		$mybackup = backup_tables(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME,"members");
		// save to file
		$handle = fopen($backup_file,'w+');
		fwrite($handle,$mybackup);
		fclose($handle);
        
		///
		$sql = "TRUNCATE TABLE members";
		mysql_query($sql) or die(mysql_error());

          $file = $_FILES['file']['tmp_name'];
          $handle = fopen($file, "r");
          $c = 0;
          while(($filesop = fgetcsv($handle, 2000, ",")) !== false){
			  if($c==0) 
			   
			  {
				 //$fname = $filesop[0];
				 //$lname = $filesop[1];
				 $sql = "insert into members(MembersId,MemberType,FirmName,GroupsId,GroupName,SubGroupId,SubGroupName,Email,STDCode,Landline,Mobile,Shop,Complex,Street,SectorMohalla,AreaId,AreaName,CityId,CityName,DistrictId,DistrictName,PIN,GSTN,RegistrationNo,RegistrationNoOld,Approved,CertificatePrint,CertModeOfDispatch,CertDetails,CertUserId,Representative1,ImageRep1,MobileRep1,MobileRep1Alternate,OrgDesignationRep1,EmailRep1,SalutationRep1,GoverningBodyIdRep1,GoverningBodyIdNameRep1,GBDesignationIdRep1,GBDesignationIdNameRep1,CommitteeIDRep1,CommitteeIDNameRep1,CdesignationIdRep1,CdesignationIdNameRep1,CardPrintRep1,CardDispatchModeRep1,CardDetailsRep1,CardUserIdRep1,Representative2,ImageRep2,MobileRep2,MobileRep2Alternate,OrgDesignationRep2,EmailRep2,SalutationRep2,GoverningBodyIdRep2,GoverningBodyIdNameRep2,GBDesignationIdRep2,GBDesignationIdNameRep2,CommitteeIDRep2,CommitteeIDNameRep2,CdesignationIdRep2,CdesignationIdNameRep2,CardPrintRep2,CardDispatchModeRep2,CardDetailsRep2,CardUserIdRep2,CreatedBy,UpdateBy,CreationDate,UpdationDate,DeletedStatus,GBOrderRep1,GBOrderRep2,COrderRep1,COrderRep2,MemDoc,DocTitle,Remark,FY)";
				  
			  }else{
				  $filesop[67] = date('Y-m-d h:i:s', strtotime($filesop[67]));
				  $filesop[68] = date('Y-m-d h:i:s');
				$values="'".implode("','",$filesop)."'";
				if($values){
					$sql.=" values ($values)";
					///echo '<br><br>'. $sql;
					$stmt = mysql_query($sql)or die(mysql_error());
				}
			  }
				$c = $c + 1;
           }
			
            if($sql){
               echo "<font color='Green'>No of records inserted ".($c-1)."</font>";
             } 
		 else
		 {
            echo "Sorry! Unable to impo.";
          }

}

function &backup_tables($host, $user, $pass, $name, $tables = '*'){
  $data = "\n/*---------------------------------------------------------------".
          "\n  SQL DB BACKUP ".date("d.m.Y H:i")." ".
          "\n  HOST: {$host}".
          "\n  DATABASE: {$name}".
          "\n  TABLES: {$tables}".
          "\n  ---------------------------------------------------------------*/\n";
  //$link = mysql_connect($host,$user,$pass);
 // mysql_select_db($name,$link);
  mysql_query( "SET NAMES `utf8` COLLATE `utf8_general_ci`" , $link ); // Unicode

  if($tables == '*'){ //get all of the tables
    $tables = array();
    $result = mysql_query("SHOW TABLES");
    while($row = mysql_fetch_row($result)){
      $tables[] = $row[0];
    }
  }else{
    $tables = is_array($tables) ? $tables : explode(',',$tables);
  }

  foreach($tables as $table){
    $data.= "\n/*---------------------------------------------------------------".
            "\n  TABLE: `{$table}`".
            "\n  ---------------------------------------------------------------*/\n";           
    $data.= "DROP TABLE IF EXISTS `{$table}`;\n";
    $res = mysql_query("SHOW CREATE TABLE `{$table}`", $link);
    $row = mysql_fetch_row($res);
    $data.= $row[1].";\n";

    $result = mysql_query("SELECT * FROM `{$table}`", $link);
    $num_rows = mysql_num_rows($result);    

    if($num_rows>0){
      $vals = Array(); $z=0;
      for($i=0; $i<$num_rows; $i++){
        $items = mysql_fetch_row($result);
        $vals[$z]="(";
        for($j=0; $j<count($items); $j++){
          if (isset($items[$j])) { $vals[$z].= "'".mysql_real_escape_string( $items[$j], $link )."'"; } else { $vals[$z].= "NULL"; }
          if ($j<(count($items)-1)){ $vals[$z].= ","; }
        }
        $vals[$z].= ")"; $z++;
      }
      $data.= "INSERT INTO `{$table}` VALUES ";      
      $data .= "  ".implode(";\nINSERT INTO `{$table}` VALUES ", $vals).";\n";
    }
  }
  ///mysql_close( $link );
  return $data;
}
?>
<!DOCTYPE html>
<html>
<body>
<form enctype="multipart/form-data" method="post" role="form">
    <div class="form-group">
        <label for="exampleInputFile">File Upload</label>
        <input type="file" name="file" id="file" size="150">
        <p class="help-block">Only CSV File Can Import.(<a href="SAMPLE_FILE.csv" target="_new">Sample File</a>)</p>
    </div>
    <button type="submit" class="btn btn-default" name="submit" value="submit">Upload</button>
</form>
</body>
</html> 