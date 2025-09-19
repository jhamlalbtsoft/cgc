<?php
class Members {
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

  function get ($id) {
  // get() : get user
  // PARAM $id : user ID

    $sql = "SELECT * FROM `members` WHERE `MembersId`=?";
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute([$id]);
    $entry = $this->stmt->fetchAll();
    return count($entry)==0 ? false : $entry[0] ;
  }
  
  function getSNO() {
  // get() : get user
  // PARAM $id : user ID

    $sql = "SELECT sno FROM `ccci_no`";
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute();
    $entry = $this->stmt->fetchAll();
    return count($entry)==0 ? false : $entry[0] ;
  }

  function getAll($searchType=1, $filter=array(), $menuType='',$pageNum=0) {
  // getAll() : get all users

    $sql = "SELECT * FROM `members` where DeletedStatus=0 ";
    if($_SESSION['user']['name']=='superadmin'){
		$sql = "SELECT * FROM `members` where DeletedStatus>=0 ";
	}
	//$Approved =1;
	
	if(isset($filter['Approved']) ){
		$Approved =$filter['Approved'];
		
		$sql .= " AND `Approved` = $Approved ";
	}
	
	
	
	if($searchType==1){
		if(isset($filter['FirmName']) && $filter['FirmName']!=''){
			$sql .= " AND (`FirmName` like '%".$filter['FirmName']."%' ";
			$sql .= " OR `Representative1` like '%".$filter['FirmName']."%' ";
			$sql .= " OR `Representative2` like '%".$filter['FirmName']."%' )";
		}
		
		if(isset($filter['RegistrationNo']) && $filter['RegistrationNo']!=''){
			$sql .= " AND `RegistrationNo` like '%".$filter['RegistrationNo']."%' ";
		}
		
		if(isset($filter['RegistrationNoOld']) && $filter['RegistrationNoOld']!=''){
			$sql .= " AND `RegistrationNoOld` like '%".$filter['RegistrationNoOld']."%' ";
		}
	}
	
	if($searchType==2){
		
		if(isset($filter['DistrictId']) && $filter['DistrictId']>0){
			$sql .= " AND `DistrictId` = ".$filter['DistrictId']." ";
		}
		
		if(isset($filter['CityId']) && $filter['CityId']>0){
			$sql .= " AND `CityId` = ".$filter['CityId']."";
		}
		
		if(isset($filter['AreaId']) && $filter['AreaId']>0){
			$sql .= " AND `AreaId` = ".$filter['AreaId']." ";
		}
		
		if(isset($filter['BloodGroupRep1']) && $filter['BloodGroupRep1']!=""){
			$sql .= " AND `BloodGroupRep1` like '".$filter['BloodGroupRep1']."' ";
		}
		
		if(isset($filter['MemberType']) && $filter['MemberType']!=''){
			$sql .= " AND `MemberType` like '".$filter['MemberType']."' ";
		}
		
		if(isset($filter['GroupsId']) && $filter['GroupsId']>0){
			$sql .= " AND `GroupsId` = ".$filter['GroupsId']." ";
		}
		
	}
	
	if($searchType==3){
		if(isset($filter['GoverningBodyIdRep1']) && $filter['GoverningBodyIdRep1']>0){
			$sql .= " AND (`GoverningBodyIdRep1` = ".$filter['GoverningBodyIdRep1']." or `CommitteeIDRep1` = ".$filter['GoverningBodyIdRep1']."  or `GoverningBodyIdRep2` = ".$filter['GoverningBodyIdRep1']." or `CommitteeIDRep2` = ".$filter['GoverningBodyIdRep1']."  )";
		}//or `GoverningBodyIdRep2` = ".$filter['GoverningBodyIdRep1']." or `CommitteeIDRep2` = ".$filter['GoverningBodyIdRep1']."
		
		if(isset($filter['SGRep1']) && $filter['SGRep1']>0){
			$sql .= " AND `SMSGroupRep1` like '%|".$filter['SGRep1']."|%' ";
		}
	}
	
	if($searchType==4){
		if(isset($filter['GoverningBodyIdRep1']) && $filter['GoverningBodyIdRep1']>0){
			$sql .= " AND ( `GoverningBodyIdRep2` = ".$filter['GoverningBodyIdRep1']." or `CommitteeIDRep2` = ".$filter['GoverningBodyIdRep1'].")";
		}
		
		if(isset($filter['SGRep1']) && $filter['SGRep1']>0){
			$sql .= " AND `SMSGroupRep1` like '%|".$filter['SGRep1']."|%' ";
		}
	}
	
	if(isset($filter['CertificatePrint']) && $filter['CertificatePrint']>0){
		$sql .= " AND `CertificatePrint	` = ".$filter['CertificatePrint']." ";
	}
	
	if(isset($filter['CardPrint']) && $filter['CardPrint']>0){
		$sql .= " AND (`CardPrintRep1` = ".$filter['CardPrint']." OR `CardPrintRep2` = ".$filter['CardPrint'].") ";
	}
	
	if(isset($filter['search']) && $filter['search']!=''){
		$sql .= " AND (`FirmName` like '%".$filter['search']."%' ";
		$sql .= " OR `Representative1` like '%".$filter['search']."%' ";
		$sql .= " OR `Representative2` like '%".$filter['search']."%' ";
		$sql .= " OR `RegistrationNoOld` like '%".$filter['search']."%' )";
	}
	if(isset($filter['pageFrom']) && $filter['pageFrom']=='PendingCardPrint'){
		$sql .= " AND `Approved` = 1 ";
	}
	
	
	//echo $sql;
	
	//$sql .= "limit 1000";
	//if($searchType==3){
	   $sql .= " ORDER BY  MembersId desc, GBOrderRep1, GBOrderRep2 "; 
	//}
	
	if(isset($_SESSION['user'])){
		//$sql .= " limit 70 offset $next_offset";
		$count_per_page = 50;
		if(isset($filter['pageFrom']) && $filter['pageFrom']=='PendingCardPrint'){
			$count_per_page = 500;
		}
		$next_offset = $pageNum * $count_per_page;
		$sql .= " limit $count_per_page offset $next_offset";
	}elseif($menuType==''){
		//$sql .= " limit 5 offset $next_offset";
		$count_per_page = 5;
		$next_offset = $pageNum * $count_per_page;	
		$sql .= " limit $count_per_page offset $next_offset";
	}
	
	//echo $sql;
	$this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute();
    $entry = $this->stmt->fetchAll();
    return count($entry)==0 ? false : $entry ;
    //return count($entry)==0 ? false : $entry ;
  }
  
  function getFirmBySearchCount ($search='') {
	$sql = "SELECT count(FirmName) FROM `members` WHERE `FirmName` like '%$search%'  ";
	$sql .= "union all SELECT count(Representative1) FROM `members` WHERE Representative1 like '%$search%' OR  Representative2 like '%$search%' ";
	return $nRows = $this->pdo->query($sql)->fetchColumn(); 
  }
  
  function getFirmBySearch ($search='', $pageSize=20, $pageNum=0) {
	 if($pageNum)
		 $pageNum--;
	$sql = "SELECT (FirmName) FROM `members` WHERE DeletedStatus>=0 and `FirmName` like '%$search%' ";//and Approved=1 
	$sql .= "union all SELECT (Representative1) FROM `members` WHERE DeletedStatus>=0 and Representative1 like '%$search%' ";//and Approved=1 
	$sql .= "union all SELECT (Representative2) FROM `members` WHERE DeletedStatus>=0 and Representative2 like '%$search%' ";//and Approved=1 
	$sql .= " limit $pageSize offset $pageNum";//and Approved=1 
	//return $nRows = $this->pdo->query($sql)->fetchColumn();
	return $nRows = $this->pdo->query($sql)->fetchAll();
  }
  
  function getFirmBySearchBak ($search='', $pageSize=20, $pageNum=0) {
  // get() : get user by email
  // PARAM $email : user email

    $sql = "SELECT FirmName FROM `members` WHERE `FirmName` like :NAME Limit :limit OFFSET :offset";
    //$sql = "SELECT FirmName FROM `members` WHERE `FirmName` like '%?%' Limit :limit OFFSET :offset";
    $this->stmt = $this->pdo->prepare($sql);
    //$this->stmt->bindParam(':limit', $pageSize, PDO::PARAM_INT);
    //$this->stmt->bindParam(':offset', $pageNum, PDO::PARAM_INT);
    $this->stmt->bindValue(':NAME', "%$search%");
    $this->stmt->bindValue(':limit', (int) $pageSize, PDO::PARAM_INT);
	$this->stmt->bindValue(':offset', (int) $pageNum, PDO::PARAM_INT);

	//$params = array("%$search%");
	//$this->stmt->execute($params);
	$this->stmt->execute();
	//$this->stmt->debugDumpParams();
    $entry = $this->stmt->fetchAll();
    //return count($entry)==0 ? false : $entry;
    return $entry;
  }
	
  function getGroups() {
  // get() : get user by email
  // PARAM $email : user email

    $sql = "SELECT GroupsId, GroupName FROM `groups` WHERE DeletedStatus=0 order by GroupName";
    $this->stmt = $this->pdo->prepare($sql);
    //$this->stmt->execute([$username]);
	//$this->stmt->debugDumpParams();
     $this->stmt->execute();
     $entry = $this->stmt->fetchAll();
     return count($entry)==0 ? false : $entry ;
  }
  
  function getSubGroups($groupId=0) {
  // get() : get user by email
  // PARAM $email : user email

    $sql = "SELECT SubGroupId as id, SubGroupName as name FROM `subgroup` WHERE DeletedStatus=0 order by SubGroupName";
    if($groupId)
		$sql .= " AND GroupsId=$groupId";
	$this->stmt = $this->pdo->prepare($sql);
    //$this->stmt->execute([$username]);
	//$this->stmt->debugDumpParams();
     $this->stmt->execute();
     $entry = $this->stmt->fetchAll();
     return  $entry ;
  }
  
  function LoadDistrict($id=0) {
    $sql = "SELECT DistrictId as id, DistrictName as name FROM `district` WHERE DeletedStatus=0 order by DistrictName";
    if($id)
		$sql .= " AND DistrictId=$id";
	$this->stmt = $this->pdo->prepare($sql);
    //$this->stmt->execute([$username]);
	//$this->stmt->debugDumpParams();
     $this->stmt->execute();
     $entry = $this->stmt->fetchAll();
     return  $entry ;
  }
  
  function LoadCity($id=0) {
    $sql = "SELECT CityId as id, CityName as name FROM `city` WHERE DeletedStatus=0 order by CityName";
    if($id)
		$sql .= " AND DistrictId=$id";
	$this->stmt = $this->pdo->prepare($sql);
    //$this->stmt->execute([$username]);
	//$this->stmt->debugDumpParams();
     $this->stmt->execute();
     $entry = $this->stmt->fetchAll();
     return  $entry ;
  }
  
  function LoadArea($id=0) {
    $sql = "SELECT AreaId as id, AreaName as name FROM `area` WHERE DeletedStatus=0 order by AreaName";
    if($id)
		$sql .= " AND CityId=$id";
	$this->stmt = $this->pdo->prepare($sql);
    //$this->stmt->execute([$username]);
	//$this->stmt->debugDumpParams();
     $this->stmt->execute();
     $entry = $this->stmt->fetchAll();
     return  $entry ;
  }
  
  function getGB($type) {
  // get() : get user by email
  // PARAM $email : user email

    $sql = "SELECT GoverningBodyId as id, GoverningBody as name FROM `governingbody` WHERE Visibility=1 and DeletedStatus=0 ";
    if($type)
		$sql .= "and type='$type' ";
	//$sql .= " order by Orders";
	$sql .= " order by GoverningBody";
    $this->stmt = $this->pdo->prepare($sql);
    //$this->stmt->execute([$username]);
	//$this->stmt->debugDumpParams();
     $this->stmt->execute();
     $entry = $this->stmt->fetchAll();
     return count($entry)==0 ? false : $entry ;
  }
  
  function getGBNameByID($id) {
  // get() : get user by email
  // PARAM $email : user email

    $sql = "SELECT GoverningBody as name, Type FROM `governingbody` WHERE GoverningBodyId=? order by GoverningBody";
    $this->stmt = $this->pdo->prepare($sql);
	$this->stmt->execute([$id]);
    //$this->stmt->execute([$username]);
	//$this->stmt->debugDumpParams();
     $this->stmt->execute();
     $entry = $this->stmt->fetchAll();
     return count($entry)==0 ? false : $entry[0] ;
  }
  
  function getDesignation() {
  // get() : get user by email
  // PARAM $email : user email

      ///$sql = "SELECT DesignationId as id, Designation as name FROM `designation` WHERE Visibility=1 and DeletedStatus=0  order by Orders";
      $sql = "SELECT DesignationId as id, Designation as name FROM `designation` WHERE Visibility=1 and DeletedStatus=0  order by Designation";
    $this->stmt = $this->pdo->prepare($sql);
    //$this->stmt->execute([$username]);
	//$this->stmt->debugDumpParams();
     $this->stmt->execute();
     $entry = $this->stmt->fetchAll();
     return count($entry)==0 ? false : $entry ;
  }
  
  function getAllUserType () {
  // getAll() : get all users

    $sql = "SELECT UserTypeId, UserTypeName FROM `user_type`";
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute();
    $entry = $this->stmt->fetchAll();
    return count($entry)==0 ? false : $entry ;
  }
  
  function exeQuery($data) {
	$MembersId = $data['MembersId'];
	
	unset($data['id']);
	unset($data['MembersId']);
	unset($data['X-Requested-With']);	
	date_default_timezone_set("Asia/Calcutta"); 
	if($MembersId){		
		$data['UpdationDate'] =  date('Y-m-d H:i:s');		
		//
		$nextSNO=0;
    }else{
		$data['DeletedStatus'] =  0;
		$data['CreationDate'] =  date('Y-m-d H:i:s');
		$data['UpdationDate'] =  date('Y-m-d H:i:s');
		$data['GBOrderRep1'] =  0;
		$data['GBOrderRep2'] =  0;
		$data['COrderRep1'] =  0;
		$data['COrderRep2'] =  0;
		
		if(isset($data['RegistrationNoOld']) && $data['RegistrationNoOld']!=""){
		    $data['RegistrationNoOld'] = trim($data['RegistrationNoOld']);
		}else{
		$sres = $this->getSNO();
		$nextSNO = $sres['sno'];
		
		$data['RegistrationNoOld'] =  (string) 'CCCI'.$nextSNO;
		}
	}
	
	$membersKeys='';
	$membersVlues='';
	foreach($data as $key=>$mem){
		if('X-Requested-With'!=$key){
			if($MembersId){
				if($membersKeys)
					$membersKeys.=',';
				$membersKeys .= $key."=:".$key;
				
				
			}else{//new
				if($membersKeys)
					$membersKeys.=',';
				$membersKeys .= $key;
				
				if($membersVlues)
					$membersVlues.=',';
				$membersVlues .= ':'.$key;
			}
		}
	}
    if($MembersId){
		$data['MembersId'] =  $MembersId;	
		$sql = "UPDATE `members` SET $membersKeys WHERE `MembersId`=:MembersId";
    }else{
		
		$sql = "INSERT INTO `members` ($membersKeys) VALUES ($membersVlues)";
		//$cond = [$first_name, $last_name, $email, $name, md5($passwor), 2];
	}
	//echo '<pre>'.$sql;
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($data);
	  $nextSNO=0;
	  if($nextSNO){
		$sql1 = "UPDATE `ccci_no` SET sno='".($nextSNO+1)."'";
		 $this->stmt = $this->pdo->prepare($sql1);
		$this->stmt->execute();
		echo "<font color='green'>Registration No is ".$data['RegistrationNoOld'].".</font>";
	  }else{
		echo "<font color='green'>Data has been saved successfully...</font>";
	  }
	  
	  unset($_SESSION['MemDoc']);
	  unset($_SESSION['ImageRep1']);
	  unset($_SESSION['ImageRep2']);
    } catch (Exception $ex) {
		print_r( $ex);
	 return false;
    }
    return true;
  }

  function updateItems ($type, $ids, $gb=0,$degi=0) {
	$idArr = explode(',', $ids);
	
	foreach($idArr as $idSet):
		$rset = explode('_', $idSet);
		$sql = "";
		
		if('order'==$type){
			if($rset[0]=='g1')
				$sql = "UPDATE `members` SET `GBOrderRep1`=? WHERE `MembersId`=?";
			if($rset[0]=='g2')
				$sql = "UPDATE `members` SET `GBOrderRep2`=? WHERE `MembersId`=?";
			
			$cond = [$rset[2], $rset[1]];//PASSWORD_DEFAULT
		}
		
		if('ApplyGB'==$type){
			if($rset[0]=='1')
				$sql = "UPDATE `members` SET `GoverningBodyIdRep1`=?, `GBDesignationIdRep1`=? WHERE `MembersId`=?";
			if($rset[0]=='2')
				$sql = "UPDATE `members` SET `GoverningBodyIdRep2`=?, `GBDesignationIdRep2`=? WHERE `MembersId`=?";
			
			$cond = [$gb, $degi, $rset[1]];//PASSWORD_DEFAULT
		}
		
		if('ApplySG'==$type){
			$gb = "'|".$gb."|'";
			if($rset[0]=='1')
				$sql = "UPDATE `members` SET `SMSGroupRep1`=concat(SMSGroupRep1, $gb) WHERE `MembersId`=?";
			if($rset[0]=='2')
				$sql = "UPDATE `members` SET `SMSGroupRep2`=concat(SMSGroupRep2, $gb) WHERE `MembersId`=?";
			
			$cond = [$rset[1]];//PASSWORD_DEFAULT
		}
		
		if('SendCardPrint'==$type){
			if($rset[0]=='1')
				$sql = "UPDATE `members` SET `CardPrintRep1`=1 WHERE `MembersId`=?";
			if($rset[0]=='2')
				$sql = "UPDATE `members` SET `CardPrintRep2`=1 WHERE `MembersId`=?";
			
			$cond = [$rset[1]];//PASSWORD_DEFAULT
		}
		//|5|18|
		if($sql){
			try {
			  $this->stmt = $this->pdo->prepare($sql);
			  $this->stmt->execute($cond);
			} catch (Exception $ex) {
			  return false;
			}
		}
	endforeach;
	
    return true;
  }
  
  
  
  function edit ($type, $filter) {
  // edit() : update user
	
	if($type=='status'){
		/* $sql = "UPDATE `members` SET `Approved`=? WHERE `MembersId` in (?)";
		$cond = [$filter['status'], $filter['id']]; */
		$sql = "UPDATE `members` SET `Approved`=".$filter['status']." WHERE `MembersId` in (".$filter['id'].")";
		$cond = [];
	}
	
	if($type=='cardPrint'){
		if($filter['Mem']==1)
			$sql = "UPDATE `members` SET `CardPrintRep1`=? WHERE `MembersId`=?";
		if($filter['Mem']==2)
			$sql = "UPDATE `members` SET `CardPrintRep2`=? WHERE `MembersId`=?";
		$cond = [$filter['Status'], $filter['id']];
              
		/* $sql = "UPDATE `members` SET `CardPrintRep2`=?, `last_name`=?, `user_email`=?, `user_name`=?, `user_password`=? WHERE `user_id`=?";
		$cond = [$first_name, $last_name, $email, $name, md5($password), $id];
 */ }
 
	if($type=='CardDetails'){
		if(isset($_REQUEST['CardDispatchModeRep1'])){
			$sql = "UPDATE `members` SET `CardDispatchModeRep1`=?, `CardDetailsRep1`=? WHERE `MembersId`=?";
			$cond = [$filter['CardDispatchModeRep1'], $filter['CardDetailsRep1'], $filter['id']];
		}
		if(isset($_REQUEST['CardDispatchModeRep2'])){
			$sql = "UPDATE `members` SET `CardDispatchModeRep2`=?, `CardDetailsRep2`=? WHERE `MembersId`=?";
			$cond = [$filter['CardDispatchModeRep2'],$filter['CardDetailsRep2'], $filter['id']];
		}
		

		/* $sql = "UPDATE `members` SET `CardPrintRep2`=?, `last_name`=?, `user_email`=?, `user_name`=?, `user_password`=? WHERE `user_id`=?";
		$cond = [$first_name, $last_name, $email, $name, md5($password), $id];
 */ }
 
    if($type=='certPrint'){
		if(isset($_REQUEST['MembersId'])){
		    $CertificatePrint = $filter['CertificatePrint']=='true'?1:0;
			$sql = "UPDATE `members` SET `CertificatePrint`=?, `CertModeOfDispatch`=?, `CertDetails`=? WHERE `MembersId`=?";
			$cond = [$CertificatePrint, $filter['CertModeOfDispatch'], $filter['CertDetails'], $filter['id']];
		}
    }
	//echo $sql;die;
	try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
	  return true;
	  //$this->stmt->debugDumpParams();
    } catch (Exception $ex) {
      return false;
    }
    return true;
  }

  function del ($id) {
  // del() : delete user
  // PARAM $id - user ID

    //$sql = "DELETE FROM `members` WHERE `MembersId`=?";
    $sql = "update `members` set DeletedStatus=1, UpdationDate  = '".date('Y-m-d H:i:s')."' WHERE `MembersId`=?";
    if($_SESSION['user']['name']=='superadmin'){
		$sql = "DELETE FROM `members` WHERE `MembersId`=?";
	}
	try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute([$id]);
    } catch (Exception $ex) {
      return false;
    }
    return true;
  }
  
   function sendSMS($ids, $SMSText) {
		$idArr = explode(',', $ids);
		$group1= array();
		$group2= array();
		foreach($idArr as $idSet):
			$rset = explode('_', $idSet);
			if($rset[0]==1){
				$group1[] = $rset[1];
			}
			if($rset[0]==2){
				$group2[] = $rset[1];
			}
		endforeach;
		$NOS = array_merge($group1, $group2);
		$sql = "INSERT INTO `smslog` (`SMSDateTime`,`SMSText`,`NOS`, `SMSGroup`, `CreatedBy`, `UpdatedBy`, `CreationDate`, `UpdationDate`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$cond = [date('Y-m-d H:i:s'), $SMSText, implode(",", $NOS), $ids, $_SESSION['user']['UserTypeId'], $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),date('Y-m-d H:i:s')];//PASSWORD_DEFAULT
		try {
		  $this->stmt = $this->pdo->prepare($sql);
		  $this->stmt->execute($cond);
		  
		} catch (Exception $ex) {
		  return false;
		}
		
	echo "<font color='green'>Message sent successfully...</font>";
    return true;
  }
  
  function sendRequest($data) {
		
		$sql = "INSERT INTO `request` (`RequestDate`,`RequestText`,`Approved`, `MembersId`, `Updated`, `UpdatedUserId`, `CreatedBy`, `UpdatedBy`, `CreationDate`, `UpdationDate`, `DeletedStatus`, `Name`, `EmailId`, `ContactNumber`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$cond = [date('Y-m-d'), $data['RequestText'], 0, $data['MembersId'], 0, $_SESSION['user']['UserTypeId'], $_SESSION['user']['UserTypeId'], $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),date('Y-m-d H:i:s'), 0, $data['Name'], $data['EmailId'], $data['ContactNumber']];//PASSWORD_DEFAULT
		try {
		  $this->stmt = $this->pdo->prepare($sql);
		  $this->stmt->execute($cond);
		  return $this->pdo->lastInsertId(); 
		} catch (Exception $ex) {
			echo $ex->getMessage();
		  return false;
		}
		
	//echo "<font color='green'>Message sent successfully...</font>";
    return true;
  }
  
  function senSMSAll($filter=array()) {
  // getAll() : get all users
	try{
	
    //$sql = "SELECT distinct Mobile FROM `members` where DeletedStatus=0 and Mobile not in ('', 0) ";
    $sql = "SELECT concat(MobileRep1,',', MobileRep2) as MobileNo FROM `members` where DeletedStatus=0 and MobileRep1 not in ('', 0) ";
	//$Approved =1;
	
		if(isset($filter['Approved']) ){
			$Approved =$filter['Approved'];
			
			$sql .= " AND `Approved` = $Approved ";
		}
	
		if(isset($filter['DistrictId']) && !empty($filter['DistrictId'])){
			$sql .= " AND `DistrictId` IN (".implode(',',$filter['DistrictId']).") ";
		}
		
		if(isset($filter['CityId']) && !empty($filter['CityId'])){
			$sql .= " AND `CityId` IN (".implode(',',$filter['CityId']).") ";
		}
		
		if(isset($filter['AreaId']) && !empty($filter['AreaId'])){
			$sql .= " AND `AreaId` IN (".implode(',',$filter['AreaId']).") ";
		}
		
		if(isset($filter['MemberType']) && !empty($filter['MemberType'])){
			$sql .= " AND `MemberType` IN ('".implode("','",$filter['MemberType'])."') ";
		}
		
		if(isset($filter['GroupsId']) && !empty($filter['GroupsId'])){
			$sql .= " AND `GroupsId` IN (".implode(',',$filter['GroupsId']).") ";
		}
		
		if(isset($filter['SubGroupId']) && !empty($filter['SubGroupId'])){
			$sql .= " AND `SubGroupId` IN (".implode(',',$filter['SubGroupId']).") ";
		}
		
		if(isset($filter['GB']) && !empty($filter['GB'])){
			$sql .= " AND (`GoverningBodyIdRep1` IN (".implode(',',$filter['GB']).") or `CommitteeIDRep1` IN (".implode(',',$filter['GB']).") or `GoverningBodyIdRep2` IN (".implode(',',$filter['GB']).") or `CommitteeIDRep2` IN (".implode(',',$filter['GB']).") )";
		}
		
		if(isset($filter['Designation']) && !empty($filter['Designation'])){
			$sql .= " AND (`GBDesignationIdRep1` IN (".implode(',',$filter['Designation']).") or `CdesignationIdRep1` IN (".implode(',',$filter['Designation']).") or `GBDesignationIdRep2` IN (".implode(',',$filter['Designation']).") or `CdesignationIdRep2` IN (".implode(',',$filter['Designation']).") )";
		}
		//echo $sql;
	
		$this->stmt = $this->pdo->prepare($sql);
		$this->stmt->execute();
		$entry = $this->stmt->fetchAll();
		$sentNos='';
		///print_r($entry);
		foreach($entry as $nos):
			if(!empty($nos)){
				if($sentNos)
					$sentNos.=',';
				//$sentNos.=trim(trim($nos['MobileNo']),',,');
				$sentNos.=trim(preg_replace('/\s+/', '', $nos['MobileNo']));
			}
		endforeach;
		
		$sentNos.=',7000828500,7987112524';
		///$sentNos ='9691633274,7987112524';
		$aUnique = array_unique(explode(',',$sentNos));
		//SMSText
		$sentNos = implode(',',$aUnique);
		if($sentNos){
			//$x   = $this->SendSMSApi('http://wbox.icansms.com/', 'cgchamber01', 'cgchamber01', $sentNos, $filter['SMSText'], $filter['sms_type']);
			$x   = $this->SendSMSApi('http://wbox.icansms.com/', 'cgchamber01', 'cgchamber01', $aUnique, $filter['SMSText'], $filter['sms_type']);
		}
		
		return  count($aUnique);
	}catch (Exception $ex) {
		print_r( $ex);
	 return false;
    }
    return true;
  }
  
  function SendSMSApi ($hostUrl, $username, $password, $phoneNoRecip, $msgText,$sms_type,
                  $n1 = NULL, $v1 = NULL, $n2 = NULL, $v2 = NULL, $n3 = NULL, $v3 = NULL, 
                  $n4 = NULL, $v4 = NULL, $n5 = NULL, $v5 = NULL, $n6 = NULL, $v6 = NULL, 
                  $n7 = NULL, $v7 = NULL, $n8 = NULL, $v8 = NULL, $n9 = NULL, $v9 = NULL  ) { 
	 
	
	/////////////////////////////////////////////////SMS API SEND CODE START //////////////////////////////////////////////////
	
	$phoneNoRecip100  =  array_chunk($phoneNoRecip, 100);
		foreach($phoneNoRecip100 as $user100):
		$From="CHAMBR";  //SENDER ID
		///
		///$Msg="CGNMS Registration OTP ". $_SESSION['session_otp'] . "\nThanks.\nChhattisgarh Niji Nursing Mahavidhyalay Sangh, Raipur (CG)"; 
		$Msg = urlencode($msgText);
		$DCS= $sms_type==''?0:8;
		$user100CS = implode(',',$user100);
		//$user100CS='7000828500,7987112524,8770814895';
		$url = "http://dndsms.ewaytech.net/api/mt/SendSMS?user=cgchamber&password=Chamber2020&senderid=$From&channel=Trans&DCS=$DCS&flashsms=0&number=$user100CS&text=$Msg&route=1";  

		$curl_handle=curl_init();
		curl_setopt($curl_handle, CURLOPT_URL, $url );
		curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');
		$query = curl_exec($curl_handle);
		curl_close($curl_handle);
		/////////////////////////////////////////////////SMS API SEND CODE END //////////////////////////////////////////////////
		endforeach;

	}
	
	 function SendSMSApibak ($hostUrl, $username, $password, $phoneNoRecip, $msgText,$sms_type,
                  $n1 = NULL, $v1 = NULL, $n2 = NULL, $v2 = NULL, $n3 = NULL, $v3 = NULL, 
                  $n4 = NULL, $v4 = NULL, $n5 = NULL, $v5 = NULL, $n6 = NULL, $v6 = NULL, 
                  $n7 = NULL, $v7 = NULL, $n8 = NULL, $v8 = NULL, $n9 = NULL, $v9 = NULL  ) { 
	 
	
	// Parameters:

	//  $hostUrl – URL of the NowSMS server (e.g., http://127.0.0.1:8800 or

	//            

	//  $username – “SMS Users” account on the NowSMS server

	//  $password – Password defined for the “SMS Users” account on the NowSMS Server

	//  $phoneNoRecip – One or more phone numbers (comma delimited) to receive the message

	//  $msgText – Text of the message

	//  $n1-$n9 / $v1-$v9 - Additional optional URL parameters, encoded as name/value pairs

	//                      Example: charset=iso-8859-1 encoded as 'charset', 'iso-8859-1'
	//$msgText = urlencode($msgText);
	
	 // $hostUrl = "http://wbox.icansms.com/API/WebSMS/Http/v1.0a/index.php?username=cgchamber01&password=cgchamber01&sender=CGCCCI&to=$phoneNoRecip&message=".$msgText."&reqid=1&format=text&route_id=pata_nahi&sendondate=".date('d-m-YTh:i:s');
	  $hostUrl = "http://wbox.icansms.com/API/WebSMS/Http/v1.0a/index.php?username=cgchamber01&password=cgchamber01&sender=CHAMBR&to=$phoneNoRecip&message=".$msgText."&reqid=1&format=text&route_id=pata_nahi&sendondate=".date('d-m-YTh:i:s')."&msgtype=unicode";
		

		$route = "default";
		//Prepare you post parameters
		$postData = array(
			'username' => 'cgchamber01',
			'password' => 'cgchamber01',
			//'authkey' => $authKey,
			'to' => $phoneNoRecip,
			'message' => $msgText,
			'sender' => 'CHAMBR',
			'reqid' => '1',
			'format' => 'text',
			'msgtype' => $sms_type,
			'route_id' => $route,
			'sendondate' => date('d-m-YTh:i:s')
		);
		
		//API URL
		$url="http://wbox.icansms.com/API/WebSMS/Http/v1.0a/index.php";

		// init the resource
		$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $postData
			//,CURLOPT_FOLLOWLOCATION => true
		));


		//Ignore SSL certificate verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		//get response
		$output = curl_exec($ch);

		//Print error if any
		if(curl_errno($ch))
		{
			echo 'error:' . curl_error($ch);
		}

		curl_close($ch);

		echo $output;

	}
	function insertPGTranscations($MembersId, $orderId, $amount="3500.00", $signature="", $txnToken="") {
		
		$sql = "INSERT INTO `pg_transcations` (`MembersId`,`orderId`,`amount`,`signature`,`txnToken`, `CreationDate`, `UpdationDate`, `DeletedStatus`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$cond = [$MembersId, $orderId, $amount,$signature,$txnToken, date('Y-m-d H:i:s'),date('Y-m-d H:i:s'), 0];//PASSWORD_DEFAULT
		//"CGC_".$MembersId.date('YmdHis')
		try {
		  $this->stmt = $this->pdo->prepare($sql);
		  $this->stmt->execute($cond);
		  return $this->pdo->lastInsertId(); 
		} catch (Exception $ex) {
			print_r($cond);
			////$this->stmt->debugDumpParams();
			echo $ex->getMessage();
		  return false;
		}
		
	//echo "<font color='green'>Message sent successfully...</font>";
    return true;
  }
  
  function updatePGTranscations($custId, $orderId, $response1, $txnId, $status){
		
		$sql = "UPDATE `pg_transcations` SET `resp_json`=?, `txnId`=?, `order_status`=? WHERE `MembersId`=? and `orderId`=?";
		$cond = [$response1, $txnId,$status,$custId, $orderId];//PASSWORD_DEFAULT
		//"CGC_".$MembersId.date('YmdHis')
		
		try {
		  $this->stmt = $this->pdo->prepare($sql);
		  $this->stmt->execute($cond);
		  ///return $this->pdo->lastInsertId(); 
		} catch (Exception $ex) {
			//print_r($cond);
			//$this->stmt->debugDumpParams();
			echo $ex->getMessage();
		  return false;
		}
		
	//echo "<font color='green'>Message sent successfully...</font>";
    return true;
  }
function getMembersBook ($membersId) {
  // get() : get user
  // PARAM $id : user ID

    $sql = "SELECT * FROM `members_book` WHERE `MembersId`=?";
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute([$membersId]);
    $entry = $this->stmt->fetchAll();
    return count($entry)==0 ? false : $entry[0] ;
  }
  
  function insertMembersBook($MembersId,$BookNo,$ReceiptNo,$BookDate,$Amount,$BankAccountNo,$BankDate,$BankName,$BusinessGroupNo,$MembershipNo,$AcceptedDate,$PaymentMode,$Reference,$Year) {
		$sql = "INSERT INTO `members_book` (`MembersId`,`BookNo`,`ReceiptNo`,`BookDate`,`Amount`,`BankAccountNo`,`BankDate`,`BankName`,`BusinessGroupNo`,`MembershipNo`,`PaymentMode`,`Reference`,`Year`,`AcceptedDate`,`CreatedBy`, `UpdatedBy`, `CreationDate`, `UpdationDate`, `DeletedStatus`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$cond = [$MembersId, $BookNo, $ReceiptNo,date("Y-m-d", strtotime($BookDate)),$Amount,$BankAccountNo,date("Y-m-d", strtotime($BankDate)),$BankName,intval($BusinessGroupNo),$MembershipNo,$PaymentMode,$Reference,$Year, date("Y-m-d", strtotime($AcceptedDate)), $_SESSION['user']['UserTypeId'], $_SESSION['user']['UserTypeId'], date('Y-m-d H:i:s'),date('Y-m-d H:i:s'), false];//
		
		try {
		  $this->stmt = $this->pdo->prepare($sql);
		  $this->stmt->execute($cond);
		  ///$this->stmt->debugDumpParams();
		  return $this->pdo->lastInsertId(); 
		} catch (Exception $ex) {
			echo $ex->getMessage();
		  return false;
		}
		
	//echo "<font color='green'>Message sent successfully...</font>";
    return true;
  }
  
  function updateMembersBook($MembersBookId,$MembersId,$BookNo,$ReceiptNo,$BookDate,$Amount,$BankAccountNo,$BankDate,$BankName,$BusinessGroupNo,$MembershipNo,$AcceptedDate,$PaymentMode,$Reference,$Year){
		///echo $BookDate;
		$sql = "UPDATE `members_book` SET `BookNo`=?, `ReceiptNo`=?,`BookDate`=?, `Amount`=?,`BankAccountNo`=?, `BankDate`=?,`BankName`=?, `BusinessGroupNo`=?,`MembershipNo`=?,`PaymentMode`=?,`Reference`=?,`Year`=?, `AcceptedDate`=? WHERE `MembersId`=? and `MembersBookId`=?";
		$cond = [$BookNo,$ReceiptNo,date("Y-m-d", strtotime($BookDate)),$Amount,$BankAccountNo,date("Y-m-d", strtotime($BankDate)),$BankName,$BusinessGroupNo,$MembershipNo,$PaymentMode,$Reference,$Year,date("Y-m-d", strtotime($AcceptedDate)),$MembersId, $MembersBookId];//PASSWORD_DEFAULT
		//"CGC_".$MembersId.date('YmdHis')
		
		try {
		  $this->stmt = $this->pdo->prepare($sql);
		  $this->stmt->execute($cond);
		  ///return $this->pdo->lastInsertId(); 
		} catch (Exception $ex) {
			//print_r($cond);
			//$this->stmt->debugDumpParams();
			echo $ex->getMessage();
		  return false;
		}
		
	//echo "<font color='green'>Message sent successfully...</font>";
    return true;
  }
}
?>