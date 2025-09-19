<?php
class Masters {
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

  function get ($type, $id) {
  // get() : get user
  // PARAM $id : user ID
	$typeId1 = $type."Id";
	$type = strtolower($type);
    //echo $sql = "SELECT * FROM `$type` WHERE `$typeId1`=?";
	if(strtolower($type)=='groups')
		$sql = "SELECT GroupsId as id, GroupName as name, Code, Visibility FROM `$type` where `$typeId1`=?";
	elseif(strtolower($type)=='subgroup')
		$sql = "SELECT SubGroupId as id, SubGroupName as name, g.GroupName as Code, sg.GroupsId as ParentID FROM `$type` as sg
				Left join groups as g ON g.GroupsId=sg.GroupsId
				where  sg.`$typeId1`=?";
	elseif(strtolower($type)=='district')
		$sql = "SELECT districtId as id, DistrictName as name, Code FROM `$type` where  `$typeId1`=?";
	elseif(strtolower($type)=='city')
		$sql = "SELECT CityId as id, CityName as name, g.DistrictName as Code, sg.DistrictId as ParentID FROM `$type` as sg
				Left join district as g ON g.DistrictId=sg.DistrictId
				where  sg.`$typeId1`=?";
	elseif(strtolower($type)=='area')
		$sql = "SELECT AreaId as id, AreaName as name, g.CityName as Code, sg.CityId as ParentID FROM `$type` as sg
				Left join city as g ON g.CityId=sg.CityId
				where  sg.`$typeId1`=?";
	elseif(strtolower($type)=='smsgroup')
		$sql = "SELECT SMSGroupId as id, SMSGroup as name FROM `$type` where  `$typeId1`=?";
	elseif(strtolower($type)=='designation')
		$sql = "SELECT DesignationId as id, Designation as name, Orders as Code, Visibility FROM `$type` where  `$typeId1`=?";
	elseif(strtolower($type)=='governingbody')
		$sql = "SELECT GoverningBodyId as id, GoverningBody as name, Orders as Code, Visibility, Type as  ParentID  FROM `$type` where  `$typeId1`=?";
	elseif(strtolower($type)=='governmentpolicy')
		$sql = "SELECT GovernmentPolicyId as id, GovtPolicyName as name, Orders as Code, Visibility FROM `$type` where  `$typeId1`=?";
	elseif(strtolower($type)=='smsmaster')
		$sql = "SELECT SMSmasterId as id, Message as name, format as Code, Type as ParentID FROM `$type` where  `$typeId1`=?";
	//echo $sql;
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute([$id]);
    $entry = $this->stmt->fetchAll();
	//print_r($entry);
    return count($entry)==0 ? false : $entry[0] ;
  }
  
  function getAll ($type) {
  // getAll() : get all users`///$typeId1`='$type' and
	//$typeId1 = $type."Id";
	$type = strtolower($type);
    if(strtolower($type)=='groups')
		$sql = "SELECT GroupsId as id, GroupName as name, Code FROM `$type` where  DeletedStatus=0 order by GroupName";
	elseif(strtolower($type)=='subgroup')
		$sql = "SELECT SubGroupId as id, SubGroupName as name, g.GroupName as Code, sg.GroupsId as ParentID FROM `$type` as sg
				Left join groups as g ON g.GroupsId=sg.GroupsId
				where  sg.DeletedStatus=0 order by SubGroupName";
	elseif(strtolower($type)=='district')
		$sql = "SELECT districtId as id, DistrictName as name, Code FROM `$type` where  DeletedStatus=0 order by DistrictName";
	elseif(strtolower($type)=='city')
		$sql = "SELECT CityId as id, CityName as name, g.DistrictName as Code, sg.DistrictId as ParentID FROM `$type` as sg
				Left join district as g ON g.DistrictId=sg.DistrictId
				where  sg.DeletedStatus=0 order by CityName";
	elseif(strtolower($type)=='area')
		$sql = "SELECT AreaId as id, AreaName as name, g.CityName as Code, sg.CityId as ParentID FROM `$type` as sg
				Left join city as g ON g.CityId=sg.CityId
				where  sg.DeletedStatus=0 order by AreaName";
	elseif(strtolower($type)=='designation')
		$sql = "SELECT DesignationId as id, Designation as name, Orders as Code FROM `$type` where  DeletedStatus=0 order by Designation";
	elseif(strtolower($type)=='smsgroup')
		$sql = "SELECT SMSGroupId as id, SMSGroup as name FROM `$type` where  DeletedStatus=0";
	elseif(strtolower($type)=='governingbody')
		$sql = "SELECT GoverningBodyId as id, GoverningBody as name, Orders as Code, Type FROM `$type` where  DeletedStatus=0 order by GoverningBody";
	elseif(strtolower($type)=='governmentpolicy')
		$sql = "SELECT GovernmentPolicyId as id, GovtPolicyName as name, Orders as Code FROM `$type` where  DeletedStatus=0 order by GovtPolicyName";
	elseif(strtolower($type)=='governmentpolicy')
		$sql = "SELECT GovernmentPolicyId as id, GovtPolicyName as name, Orders as Code FROM `$type` where  DeletedStatus=0 order by GovtPolicyName";
	elseif(strtolower($type)=='smsmaster')
		$sql = "SELECT SMSmasterId as id, Message as name, Format as Code, Type as ParentID FROM `$type` where  DeletedStatus=0";
		//echo $sql;
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute();
    $entry = $this->stmt->fetchAll();
    return count($entry)==0 ? false : $entry ;
  }

  function getParents ($type) {
  // getAll() : get all users
	if(strtolower($type)=='groups'){
		$sql = "SELECT groupsId as id, groupName as name FROM groups where DeletedStatus=0 order by groupName";
	}
	if(strtolower($type)=='district'){
		$sql = "SELECT DistrictId as id, DistrictName as name FROM district where DeletedStatus=0 order by DistrictName";
	}
	if(strtolower($type)=='city'){
		$sql = "SELECT CityId as id, CityName as name FROM city where DeletedStatus=0 order by CityName";
	}
	
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute();
    $entry = $this->stmt->fetchAll();
    return count($entry)==0 ? false : $entry ;
  }
  
  function add ($name, $Code, $ParentID=0, $Visibility=0, $type) {
  // add() : add a new user
  // PARAM $email - email
  //       $name - name
  //       $password - password (clear text)
  if($Visibility=='true')
	  $Visibility=1;
  else
	  $Visibility=0;
	if(strtolower($type)=='groups'){
		$sql = "INSERT INTO `groups` (`GroupName`,`code`,`Visibility`, DeletedStatus, `CreatedBy`, `UpdateBy`, `CreationDate`, `UpdationDate`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
		$cond = [($name), ($Code), (bool)$Visibility, false, $_SESSION['user']['UserTypeId'], $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),date('Y-m-d H:i:s')];//PASSWORD_DEFAULT
	}elseif(strtolower($type)=='subgroup'){
		$sql = "INSERT INTO `subgroup` (`SubGroupName`,`GroupsId`, DeletedStatus, `CreatedBy`, `UpdateBy`, `CreationDate`, `UpdationDate`) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$cond = [($name), $ParentID, false, $_SESSION['user']['UserTypeId'], $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),date('Y-m-d H:i:s')];//PASSWORD_DEFAULT
	}elseif(strtolower($type)=='district'){
		$sql = "INSERT INTO `district` (`DistrictName`,`code`, DeletedStatus, `CreatedBy`, `UpdateBy`, `CreationDate`, `UpdationDate`) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$cond = [($name), ($Code), false, $_SESSION['user']['UserTypeId'], $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),date('Y-m-d H:i:s')];//PASSWORD_DEFAULT
	}elseif(strtolower($type)=='city'){
		$sql = "INSERT INTO `city` (`CityName`,`DistrictId`, DeletedStatus, `CreatedBy`, `UpdateBy`, `CreationDate`, `UpdationDate`) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$cond = [($name), $ParentID, false, $_SESSION['user']['UserTypeId'], $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),date('Y-m-d H:i:s')];//PASSWORD_DEFAULT
	}elseif(strtolower($type)=='area'){
		$sql = "INSERT INTO `area` (`AreaName`,`CityId`, DeletedStatus, `CreatedBy`, `UpdateBy`, `CreationDate`, `UpdationDate`) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$cond = [($name), $ParentID, false, $_SESSION['user']['UserTypeId'], $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),date('Y-m-d H:i:s')];
	}elseif(strtolower($type)=='designation'){
		$sql = "INSERT INTO `designation` (`Designation`,`Orders`,`Visibility`, DeletedStatus, `CreatedBy`, `UpdateBy`, `CreationDate`, `UpdationDate`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
		$cond = [($name), ($Code), (bool)$Visibility, false, $_SESSION['user']['UserTypeId'], $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),date('Y-m-d H:i:s')];
	}elseif(strtolower($type)=='smsgroup'){
		$sql = "INSERT INTO `smsgroup` (`SMSGroup`, DeletedStatus, `CreatedBy`, `UpdateBy`, `CreationDate`, `UpdationDate`) VALUES (?, ?, ?, ?, ?, ?)";
		$cond = [($name), false, $_SESSION['user']['UserTypeId'], $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),date('Y-m-d H:i:s')];
	}elseif(strtolower($type)=='governingbody'){
		$sql = "INSERT INTO `governingbody` (`GoverningBody`,`Orders`,`Visibility`,`Type`, DeletedStatus, `CreatedBy`, `UpdateBy`, `CreationDate`, `UpdationDate`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$cond = [($name), ($Code), (bool)$Visibility, $ParentID, false, $_SESSION['user']['UserTypeId'], $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),date('Y-m-d H:i:s')];
	}elseif(strtolower($type)=='governmentpolicy'){
		$sql = "INSERT INTO `governmentpolicy` (`GovtPolicyName`,`Orders`,`Visibility`, DeletedStatus, `CreatedBy`, `UpdateBy`, `CreationDate`, `UpdationDate`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
		$cond = [($name), ($Code), (bool)$Visibility, false, $_SESSION['user']['UserTypeId'], $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),date('Y-m-d H:i:s')];
	}elseif(strtolower($type)=='smsmaster'){
		$sql = "INSERT INTO `smsmaster` (`Message`,`Format`,`Type`, DeletedStatus, `CreatedBy`, `UpdateBy`, `CreationDate`, `UpdationDate`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
		$cond = [($name), ($Code), (bool)$ParentID, false, $_SESSION['user']['UserTypeId'], $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),date('Y-m-d H:i:s')];
	}
	    
	try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
    } catch (Exception $ex) {
		ECHO $ex->getMessage();
      return false;
    }
    return true;
  }

  function edit ($name, $Code, $ParentID=0, $Visibility=0, $type, $id) {
	
	if($Visibility=='true')
	  $Visibility=true;
	else
	  $Visibility=false;
  
	if(strtolower($type)=='groups'){
		$sql = "UPDATE `groups` SET `GroupName`=?, `code`=?, `Visibility`=?, `UpdateBy`=?, `UpdationDate`=? WHERE `GroupsId`=?";
		$cond = [($name), ($Code), $Visibility, $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),$id];
	}
	
	if(strtolower($type)=='subgroup'){
		$sql = "UPDATE `subgroup` SET `SubGroupName`=?, `GroupsId`=?, `UpdateBy`=?, `UpdationDate`=? WHERE `SubGroupId`=?";
		$cond = [($name), ($ParentID), $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),$id];
	}
	
	if(strtolower($type)=='district'){
		$sql = "UPDATE `district` SET `DistrictName`=?, `code`=?, `UpdateBy`=?, `UpdationDate`=? WHERE `DistrictId`=?";
		$cond = [($name), ($Code), $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),$id];
	}
	
	if(strtolower($type)=='city'){
		$sql = "UPDATE `city` SET `CityName`=?, `DistrictId`=?, `UpdateBy`=?, `UpdationDate`=? WHERE `CityId`=?";
		$cond = [($name), ($ParentID), $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),$id];
	}
	
	if(strtolower($type)=='area'){
		$sql = "UPDATE `area` SET `AreaName`=?, `CityId`=?, `UpdateBy`=?, `UpdationDate`=? WHERE `AreaId`=?";
		$cond = [($name), ($ParentID), $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),$id];
	}
	
	if(strtolower($type)=='designation'){
		$sql = "UPDATE `designation` SET `Designation`=?, `orders`=?, `Visibility`=?, `UpdateBy`=?, `UpdationDate`=? WHERE `DesignationId`=?";
		$cond = [($name), ($Code), $Visibility, $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),$id];
	}
	
	if(strtolower($type)=='smsgroup'){
		$sql = "UPDATE `smsgroup` SET `SMSgroup`=?, `UpdateBy`=?, `UpdationDate`=? WHERE `SMSgroupId`=?";
		$cond = [($name), $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),$id];
	}
	
	if(strtolower($type)=='governmentpolicy'){
		$sql = "UPDATE `governmentgolicy` SET `GovtPolicyName`=?, `orders`=?,`Visibility`=?,  `UpdateBy`=?, `UpdationDate`=? WHERE `GovernmentPolicyId`=?";
		$cond = [($name), ($Code), $Visibility, $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),$id];
	}
	
	if(strtolower($type)=='governingbody'){
		$sql = "UPDATE `governingbody` SET `GoverningBody`=?, `orders`=?,`Visibility`=?, `Type`=?, `UpdateBy`=?, `UpdationDate`=? WHERE `GoverningBodyId`=?";
		$cond = [($name), ($Code), $Visibility, $ParentID, $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),$id];
	}
	
	if(strtolower($type)=='smsmaster'){
		$sql = "UPDATE `smsmaster` SET `Message`=?, `Format`=?, `Type`=?, `UpdateBy`=?, `UpdationDate`=? WHERE `smsmasterId`=?";
		$cond = [($name), ($Code), $ParentID, $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),$id];
	}
	
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
    $sql = "DELETE FROM `$type` WHERE `$typeId1`=?";
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