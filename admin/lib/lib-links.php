<?php
class Links {
  private $pdo = null;
  private $stmt = null;

  function __construct () {
  // __construct() : connect to the database
  // PARAM : DB_HOST, DB_CHARSET, DB_NAME, DB_USER, DB_PASSWORD

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
      $this->CB->verbose(0, "DB", $ex->getMessage(), "", 1);
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

  function get ($type='links', $id) {
  // get() : get user
  // PARAM $id : user ID
	$typeId1 = $type."Id";
	$type = strtolower($type);
    $sql = "SELECT id, title, ulink FROM `$type` where `id`=?";
	//	echo $sql.$id;
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute([$id]);
    $entry = $this->stmt->fetchAll();
     return count($entry)==0 ? false : $entry[0] ;
  }
  
  
  
  function getAll ($type='links', $limit=0, $groupBy='') {
  // getAll() : get all users`///$typeId1`='$type' and
	//$typeId1 = $type."Id";
	$type = strtolower($type);
    $sql = "SELECT id, title, ulink FROM `$type` where  1";
	if($groupBy)
		$sql.= $groupBy;
	if($limit)
		$sql .= " limit $limit";
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute();
    $entry = $this->stmt->fetchAll();
    return count($entry)==0 ? false : $entry ;
  }
  
  function add ($title, $ulink, $type='links') {
  // add() : add a new user
  // PARAM $email - email
  //       $name - name
  //       $password - password (clear text)
	$sql = "INSERT INTO `links` (`title`,`ulink`, `CreationDate`) VALUES ( ?, ?, ?)";
		$cond = [($title), ($ulink),date('Y-m-d H:i:s')];
	   // print_r($cond);
	try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
    } catch (Exception $ex) {
		ECHO $ex->getMessage();
      return false;
    }
    return true;
  }

  function edit ($title, $ulink, $type, $id) {
	
	$sql = "UPDATE `$type` SET `title`=?, `ulink`=? WHERE `id`=?";
	$cond = [($title), ($ulink),$id];

	
	try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
    } catch (Exception $ex) {
		ECHO $ex->getMessage();
      return false;
    }
    return true;
  }

  function updateRequest ($type, $id, $Status) {
	
	if('true'==$Status)
		 $Status=true;
	else
		$Status=false;
	$sql = "UPDATE `request` SET `$type`=?, `UpdatedBy`=?, `UpdationDate`=? WHERE `requestId`=?";
		$cond = [$Status, $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),$id];

	try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
    } catch (Exception $ex) {
		ECHO $ex->getMessage();
      return false;
    }
    return true;
  }
  
  function del ($type, $id) {
  // del() : delete user
  // PARAM $id - user ID
	$typeId1 = $type."Id";
	$type = strtolower($type);
    $sql = "DELETE FROM `$type` WHERE `id`=?";
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute([$id]);
    } catch (Exception $ex) {
      return false;
    }
    return true;
  }
  
  function LoadRequest ($Approved=-1, $Updated=-1, $requestId=0) {
  // get() : get user
  // PARAM $id : user ID
	
    //$sql = "SELECT * FROM `members` WHERE `MembersId`=?";
    $sql = "SELECT r.*,m.RegistrationNo, m.FirmName FROM `request` r left join `members` m ON r.MembersId=m.MembersId  WHERE r.DeletedStatus=0 and r.`MembersId`>0";
	if($Approved!=-1)
		$sql .=" and r.Approved=$Approved ";
	if($Updated!=-1)
		$sql .=" and r.Updated=$Updated ";
	if($requestId>0)
		$sql .=" and r.requestId=$requestId ";
	//$sql .=" Order by requestId desc ";
	//ECHO $sql;
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute();
    $entry = $this->stmt->fetchAll();
    return count($entry)==0 ? false : $entry;
  }
}
?>