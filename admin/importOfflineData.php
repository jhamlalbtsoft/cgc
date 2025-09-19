<?php
// INIT
ini_set('session.gc_maxlifetime', 3600);
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";
ini_set("display_errors",1);
//ini_set('max_execution_time', 1);
//ini_set('memory_limit', '512M');
ini_set('memory_limit', '-1');
require PATH_LIB . "page-top.php"; 

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
//require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";
set_time_limit(0);
//$conn=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
 //$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,"location");
//$db=mysql_select_db(DB_NAME,$conn);
$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);
mysqli_select_db($conn,DB_NAME); 
          if(!$conn){
			die('Could not Connect My Sql:' .mysqli_error($conn));
		  }
		// create backup
		//////////////////////////////////////

		/* $backup_file = 'public/sqlbak/db-backup-'.time().'.sql';
		// get backup
		$mybackup = backup_tables(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME,"members");
		// save to f	ile
		$handle = fopen($backup_file,'w+');
		fwrite($handle,$mybackup);
		fclose($handle); */
       // backup_tables(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME,"members");
		///
		$sql = "TRUNCATE TABLE members";
		mysqli_query($conn,$sql) or die(mysqli_error($conn));

          $file = $_FILES['file']['tmp_name'];
          $handle = fopen($file, "r");
		if ($handle) {
			echo 'Start upload : <br>';
				
			
          $c = 0;$vals = Array(); $z=0;
          while(($filesop = fgetcsv($handle, 2000, ",")) !== false){
			  
			  if($c==0) 
			   
			  {
				 //$fname = $filesop[0];
				 //$lname = $filesop[1];
				 $sql = "insert into members(MembersId,MemberType,FirmName,GroupsId,GroupName,SubGroupId,SubGroupName,Email,STDCode,Landline,Mobile,Shop,Complex,Street,SectorMohalla,AreaId,AreaName,CityId,CityName,DistrictId,DistrictName,PIN,GSTN,RegistrationNo,RegistrationNoOld,Approved,CertificatePrint,CertModeOfDispatch,CertDetails,CertUserId,Representative1,ImageRep1,MobileRep1,MobileRep1Alternate,OrgDesignationRep1,EmailRep1,SalutationRep1,GoverningBodyIdRep1,GoverningBodyIdNameRep1,GBDesignationIdRep1,GBDesignationIdNameRep1,CommitteeIDRep1,CommitteeIDNameRep1,CdesignationIdRep1,CdesignationIdNameRep1,CardPrintRep1,CardDispatchModeRep1,CardDetailsRep1,CardUserIdRep1,Representative2,ImageRep2,MobileRep2,MobileRep2Alternate,OrgDesignationRep2,EmailRep2,SalutationRep2,GoverningBodyIdRep2,GoverningBodyIdNameRep2,GBDesignationIdRep2,GBDesignationIdNameRep2,CommitteeIDRep2,CommitteeIDNameRep2,CdesignationIdRep2,CdesignationIdNameRep2,CardPrintRep2,CardDispatchModeRep2,CardDetailsRep2,CardUserIdRep2,CreatedBy,UpdateBy,CreationDate,UpdationDate,DeletedStatus,GBOrderRep1,GBOrderRep2,COrderRep1,COrderRep2,MemDoc,DocTitle,Remark,FY)";
				  
			  }else{
				  $filesop[70] = date('Y-m-d h:i:s', strtotime($filesop[70]));
				  $filesop[71] = date('Y-m-d h:i:s');
				  //$filesop[3] = date('Y-m-d h:i:s');
				 for($j=0; $j<count($filesop); $j++){
					 if(isset($filesop[$j]) && trim($filesop[$j])!=''){
						$filesop[$j] = "'".mysqli_real_escape_string($conn, trim($filesop[$j],',') )."'";
					 }else{
						 $filesop[$j] = !empty($filesop[$j]) ? "'".$filesop[$j]."'" : "NULL";
						 //$filesop[$j]= '';
					 }
             	 }
				 $vals[$z]="(";
				//$values="'".implode("','",$filesop)."'";
				//$values="'".implode("','",$filesop)."'";
				$values= implode(",",$filesop);
				$vals[$z].= $values; 
				$vals[$z].= ")"; 
				$z++;
				/* if($values){
					$sql.=" values ($values)";
					echo '<br><br>'. $sql;
					//$stmt = mysql_query($sql)or die(mysql_error());
					$stmt = mysqli_query($conn, $sql)or die(mysqli_error($conn)); 
				} */
			  }
				$c = $c + 1;
           }
			
            if($sql && count($vals)>0){
				//$sql.=" values ($values)";
				//	echo '<br><pre>'. $sql;
				$vals1 = array_chunk($vals,100);
				//echo '<pre>';print_r($vals1);
				$sql1=$sql;
				foreach($vals1 as $vals2){
					$sql1 = $sql."  VALUES ".implode(",", $vals2).";";
					$stmt = mysqli_query($conn, $sql1)or die(mysqli_error($conn)); 
				}
				/*   
				$sql .= "  VALUES ".implode(",", $vals).";";
	  	       $stmt = mysqli_query($conn, $sql)or die(mysqli_error($conn)); */
               echo "<font color='Green'>No of records inserted ".($c-1)."</font>"; 
             } 
		 else
		 {
            echo "Sorry! Unable to impo.";
          }
		} else {
			echo "Error: " . $_FILES["file"]["error"] . "<br>";
			//print_R($_FILES);
			die("Error in file. Unable to open file");
		}
}

//Core function
function backup_tables($host, $user, $pass, $dbname, $tables = '*') {
    $link = mysqli_connect($host,$user,$pass, $dbname);

    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }

    mysqli_query($link, "SET NAMES 'utf8'");

    //get all of the tables
    if($tables == '*')
    {
        $tables = array();
        $result = mysqli_query($link, 'SHOW TABLES');
        while($row = mysqli_fetch_row($result))
        {
            $tables[] = $row[0];
        }
    }
    else
    {
        $tables = is_array($tables) ? $tables : explode(',',$tables);
    }

    $return = '';
    //cycle through
    foreach($tables as $table)
    {
        $result = mysqli_query($link, 'SELECT * FROM '.$table);
        $num_fields = mysqli_num_fields($result);
        $num_rows = mysqli_num_rows($result);

        $return.= 'DROP TABLE IF EXISTS '.$table.';';
        $row2 = mysqli_fetch_row(mysqli_query($link, 'SHOW CREATE TABLE '.$table));
        $return.= "\n\n".$row2[1].";\n\n";
        $counter = 1;

        //Over tables
        for ($i = 0; $i < $num_fields; $i++) 
        {   //Over rows
            while($row = mysqli_fetch_row($result))
            {   
                if($counter == 1){
                    $return.= 'INSERT INTO '.$table.' VALUES(';
                } else{
                    $return.= '(';
                }

                //Over fields
                for($j=0; $j<$num_fields; $j++) 
                {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = str_replace("\n","\\n",$row[$j]);
                    if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                    if ($j<($num_fields-1)) { $return.= ','; }
                }

                if($num_rows == $counter){
                    $return.= ");\n";
                } else{
                    $return.= "),\n";
                }
                ++$counter;
            }
        }
        $return.="\n\n\n";
    }

    //save file
    //$backup_file = 'public/sqlbak/db-backup-'.time().'.sql';
	$fileName = 'public/sqlbak/db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql';
    $handle = fopen($fileName,'w+');
    fwrite($handle,$return);
    if(fclose($handle)){
        //echo "Done, the file name is: ".$fileName;
        echo "Done, the backup<br> ";
        //exit; 
    }
}


function &backup_tables1($host, $user, $pass, $name, $tables = '*'){
  $data = "\n/*---------------------------------------------------------------".
          "\n  SQL DB BACKUP ".date("d.m.Y H:i")." ".
          "\n  HOST: {$host}".
          "\n  DATABASE: {$name}".
          "\n  TABLES: {$tables}".
          "\n  ---------------------------------------------------------------*/\n";
  //$link = mysql_connect($host,$user,$pass);
 /// mysql_select_db($name,$link);
	
	$link=mysqli_connect($host,$user,$pass);
	mysqli_select_db($link,$name); 

  //mysql_query( "SET NAMES `utf8` COLLATE `utf8_general_ci`" , $link ); // Unicode
  mysqli_query( $link, "SET NAMES `utf8` COLLATE `utf8_general_ci`" ); // Unicode

  if($tables == '*'){ //get all of the tables
    $tables = array();
    $result = mysqli_query( $link, "SHOW TABLES");
    while($row = mysqli_fetch_assoc($result)){
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
    $res = mysqli_query( $link, "SHOW CREATE TABLE `{$table}`");
    $row = mysqli_fetch_row($res);
    $data.= $row[1].";\n";

    $result = mysqli_query($link, "SELECT * FROM `{$table}`");
    $num_rows = mysqli_fetch_row($result);    

    if($num_rows>0){
      $vals = Array(); $z=0;
      for($i=0; $i<$num_rows; $i++){
        $items = mysqli_fetch_row($result);
        $vals[$z]="(";
        for($j=0; $j<count($items); $j++){
          if (isset($items[$j])) { $vals[$z].= "'".mysqli_real_escape_string($link, $items[$j])."'"; } else { $vals[$z].= "NULL"; }
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
<div id="container">

	<div class="row-fluid">
		<div class="span12">
			<div class="grid simple">
				<div class="grid-body no-border">
					<div id="fc">
<form enctype="multipart/form-data" method="post" role="form">
    <div class="form-group">
        <label class="span8" for="exampleInputFile"><h1>Upload Offline Data</h1></label>
        <input class="span8" type="file" name="file" id="file" size="150"><br><br>
        <p class="help-block">Only CSV File Can Import.(<a href="SAMPLE_FILE.csv" target="_new">Sample File</a>)</p>
    </div>
    <button type="submit" class="btn btn-default" name="submit" value="submit">Upload</button>
</form>				</div>
			</div>
		</div>
	</div>
</div>

<?php require PATH_LIB . "page-bottom.php"; ?>
<link href="<?php echo webUrl ?>cassette.axd/stylesheet/b54e6c3cd41636c423439c76df997eefce57a3cb/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">