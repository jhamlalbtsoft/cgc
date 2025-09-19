<?php
class Eep {
  private $pdo = null;
  private $stmt = null;

  function __construct () {
  // __construct() : connect to the database
  // PARAM : DB_HOST, DB_CHARSET, DB_NAME, DB_USER, DB_PASSWORD
date_default_timezone_set('Asia/Kolkata');
    try {
      $this->pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD, [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false
        ]
      );
      return true;
    } catch (Exception $ex) {
      //$this->CB->verbose(0, "DB", $ex->getMessage(), "", 1);
      echo 'DataBase error : '.$ex->getMessage();
    }
  }

  function __destruct () {
  // __destruct() : close connection when done

    if ($this->stmt !== null) {
      $this->stmt = null;
    }
    if ($this->pdo !== null) {
      $this->pdo = null;
    }
  }

  function get ($id) {
  // get() : get user
  // PARAM $id : user ID

    $sql = "SELECT * FROM `eep` WHERE `EEPId`=?";
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute([$id]);
    $entry = $this->stmt->fetchAll();
    return count($entry)==0 ? false : $entry[0] ;
  }
  
  function getAll ($TypeId=0, $limit=0, $groupBy='', $cond="", $orderBy="") {
  // getAll() : get all users

    $sql = "SELECT * FROM `eep` where TypeId=$TypeId and DeletedStatus=0";
	if($cond)
		$sql.= $cond;
	if($groupBy)
		$sql.= $groupBy;
	if($orderBy)
		$sql.= $orderBy;
	else
		$sql .= " order by DateOfEEP desc, Title";
	if($limit)
		$sql .= " limit $limit";
    //echo $sql;
	$this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute();
    $entry = $this->stmt->fetchAll();
    return count($entry)==0 ? false : $entry ;
  }

  function getAllGoverningBody () {
  // getAll() : get all users

    $sql = "SELECT GoverningBodyId as id, GoverningBody as name FROM `governingbody` where type='GB' and DeletedStatus=0";
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute();
    $entry = $this->stmt->fetchAll();
    return count($entry)==0 ? false : $entry ;
  }
  
  function add ($Title, $Description, $Image, $filePath, $DateOfEEP, $TypeId, $GovernmentPolicyId) {
  // add() : add a new user
  // PARAM $email - email
  //       $name - name
  //       $password - password (clear text)

     $sql = "INSERT INTO `eep` (`Title`,`Description`,`Image`, `filePath`, `DateOfEEP`, `TypeId`,`GovernmentPolicyId`, DeletedStatus, `CreatedBy`, `UpdateBy`, `CreationDate`, `UpdationDate`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	///print_R( $cond);
    $cond = [$Title, $Description, $Image, $filePath, $DateOfEEP, $TypeId, $GovernmentPolicyId, false, $_SESSION['user']['UserTypeId'], $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),date('Y-m-d H:i:s')];//PASSWORD_DEFAULT
   
	try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
    } catch (Exception $ex) {
		ECHO $ex->getMessage();
      return false;
    }
    return true;
  }

  function edit ($Title, $Description, $ImagePath, $Image, $edfilePath, $filePath, $DateOfEEP, $TypeId, $GovernmentPolicyId, $id) {
	  //echo $edfilePath,'---',$filePath;
  // edit() : update user
  // PARAM $email - email
  //       $name - name
  //       $password - password (clear text)
  //       $id - user ID
 //$variable = htmlentities( utf8_decode($Title) ); 
	/*
	if($ImagePath){
		$Image.=','.$ImagePath;
		$Image = trim(str_replace(',,',',', $Image),',');
	}
	if($edfilePath){
		$filePath.=','.$edfilePath;
		$filePath = trim(str_replace(',,',',', $filePath),',');
	}
	
	if($Image || $filePath){
		 $sql = "UPDATE `eep` SET `Image`=?, `filePath`=?, `Title`=?, `Description`=?, `DateOfEEP`=?, `TypeId`=?, `GovernmentPolicyId`=?, `UpdateBy`=?, `UpdationDate`=? WHERE `EEPId`=?";
		$cond = [$Image, $filePath, ($Title), ($Description), $DateOfEEP, $TypeId, $GovernmentPolicyId, $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),$id];
	}else{
		$sql = "UPDATE `eep` SET  `Title`=?, `Description`=?, `DateOfEEP`=?, `TypeId`=?, `GovernmentPolicyId`=?, `UpdateBy`=?, `UpdationDate`=? WHERE `EEPId`=?";
		$cond = [ ($Title), ($Description), $DateOfEEP, $TypeId, $GovernmentPolicyId, $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),$id];
	}*/
	$sql = "UPDATE `eep` SET  `Title`=?, `Description`=?, `DateOfEEP`=?, `TypeId`=?, `GovernmentPolicyId`=?, `UpdateBy`=?, `UpdationDate`=? WHERE `EEPId`=?";
		$cond = [ ($Title), ($Description), $DateOfEEP, $TypeId, $GovernmentPolicyId, $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),$id];
		
    //$cond = [mysql_real_escape_string($Title), mysql_real_escape_string($Description), $DateOfEEP, $TypeId, $GovernmentPolicyId, $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),$id];
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
    } catch (Exception $ex) {
		ECHO $ex->getMessage();
      return false;
    }
    return true;
  }
  
   function updateFiles ($ImagePath, $filePath, $id) {
	  
	 $sql = "UPDATE `eep` SET `Image`=?, `filePath`=?, `UpdateBy`=?, `UpdationDate`=? WHERE `EEPId`=?";
		$cond = [$ImagePath, $filePath, $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),$id];
		
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
    } catch (Exception $ex) {
		ECHO $ex->getMessage();
      return false;
    }
    return true;
  }

  function del ($id) {
  // del() : delete user
  // PARAM $id - user ID

    $sql = "DELETE FROM `eep` WHERE `EEPId`=?";
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute([$id]);
    } catch (Exception $ex) {
      return false;
    }
    return true;
  }
  
   function remove ($id, $imgPath, $filePath) {
  // del() : delete user
  // PARAM $id - user ID
	$idArr = $this->get($id); 
	//print_R($idArr);
    if($idArr['Image'] || $filePath!=''){
		if($imgPath){
			$Image = trim(str_replace($imgPath,"",$idArr['Image']),',');
			$sql = "UPDATE `eep` SET `Image`=?, `UpdateBy`=?, `UpdationDate`=? WHERE `EEPId`=?";
			$cond = [$Image, $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),$id];
		}
		
		if($filePath){
			$filePth = trim(str_replace($filePath,"",$idArr['filePath']),',');
			$sql = "UPDATE `eep` SET `filePath`=?, `UpdateBy`=?, `UpdationDate`=? WHERE `EEPId`=?";
			$cond = [$filePth, $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),$id];
		}
		//echo $sql;
		try {
		  $this->stmt = $this->pdo->prepare($sql);
		  $this->stmt->execute($cond);
		} catch (Exception $ex) {
			ECHO $ex->getMessage();
		  return false;
		}
	}
    return true; 
  }
}
?>