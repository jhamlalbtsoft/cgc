<?php
ini_set('display_errors',0); 
if(isset($_FILES['FileUpload1'])){
session_start();
	require "./admin/lib" . DIRECTORY_SEPARATOR . "config.php";$_ADMIN = false;
	$UserTypeId = 0;
	$SGRep1 = 0;
	
	if(isset($_SESSION['user'])){
		$_ADMIN = is_array($_SESSION['user']);
		$UserTypeId = $_SESSION['user']['UserTypeId'];
	}elseif(isset($_COOKIE['user_id']) && $_COOKIE['user_id']!=0) {
        if(isset($_REQUEST['SixDRN'])){
        
            
        }else{
	      $_SESSION['user'] = array(
			  "id" => $_COOKIE['user_id'],
			  "UserTypeId" => $_COOKIE['UserTypeId']
			);
        }
		$_ADMIN = true;;
		$UserTypeId = $_COOKIE['UserTypeId'];
	}

	if (!$_ADMIN) {
		echo "you dont have permission";
		die;
	}
	$ImageRep='';
	if(isset($_REQUEST['id'])){
		$ImageRep = $_REQUEST['id'];//18
	}

$Pos=1;
	if(isset($_REQUEST['Pos'])){
		$Pos = $_REQUEST['Pos'];//1
	}
$SixDRN="";
	if(isset($_REQUEST['SixDRN'])){
		$SixDRN = $_REQUEST['SixDRN'];//1
	}
 $_SESSION['SixDRN'] = $SixDRN;	
 $_SESSION['Pos'] = $Pos;	
 
	$uploaddir = 'Image/';
	$uRand = rand(10000,999999);
	$uploadfile = $uploaddir . $uRand.'_'.basename($_FILES['FileUpload1']['name']);
	
	//echo basename($_FILES['FileUpload1']['name']);
    $filename = 'FileUpload'.$Pos.'.txt';
	if (move_uploaded_file($_FILES['FileUpload1']['tmp_name'], $uploadfile)) {
	  //echo "success<br>";
	  echo $_SESSION["ImageUrl"] =  'Image/'.$uRand.'_'.basename($_FILES['FileUpload1']['name']);
	  file_put_contents($filename, json_encode($_SESSION));
	} else {
	  echo "errors";
	}
	
	//print_r($_SESSION);
	
	//die;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<!-- BEGIN CORE CSS FRAMEWORK -->

<link href="./assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="./assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
<link href="./assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="./assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->
<!-- BEGIN CSS TEMPLATE -->
<link href="./assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="./assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="./assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body  style="background-color:Transparent; background-image:none;padding:0 0px" >
<div class="container" style="padding:0 0px">
  <div class="row"style="padding:0 0px">
    <div class="span12"style="padding:0 0px">
      <div class="row-fluid column-seperation" style="padding:0 10px">
       
        <div class="span5">
    <form name="form1" method="post" action="./Web_Image_Upload2.php?File=<?= $_REQUEST['File'] ?>&amp;id=<?= $_REQUEST['SixDRN'] ?>&amp;SixDRN=<?= $_REQUEST['SixDRN'] ?>&amp;Pos=<?= $_REQUEST['Pos'] ?>&amp;size=150" id="form1" enctype="multipart/form-data">
    <div>

        
                    <table id="Table1" width="100%" style="background-color:Transparent; font-family: calibri;">
	<tr>
		<td>
                    <input type="file" name="FileUpload1" id="FileUpload1" style="height:30px;width:200px;" accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.documen"/>
        <input type="submit" name="Button1" value="Upload" id="Button1" class="btn btn-white btn-cons" style="margin-bottom:0px" />
                    </td>
	</tr>
</table>

    </div>
    <button type="reset" id="file_reset" style="display:none">
        
    
    </form>
    </div>
    <script src="./assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="./assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script src="./assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="./assets/js/login.js" type="text/javascript"></script>

     <script type="text/javascript">
  var fuphoto = $("#fuphoto");
      $('#fuphoto').bind('change', function () {
            if((this.files[0].size / 1024) > parseInt(150))
            {
                 alert('File Size exceed the permited limit of 150 KB. Please reduce the file size. This file size is: ' + this.files[0].size / 1024  + "KB");
                 //fuphoto.replaceWith( fuphoto = fuphoto.clone( true ) );
                 $('#file_reset').trigger('click');
            }
         
      });
       var FileUpload1 = $("#FileUpload1");
      $('#FileUpload1').bind('change', function () {
          
            if((this.files[0].size / 1024) > parseInt(150))
            {
                 alert('File Size exceed the permited limit of  150  KB. Please reduce the file size. This file size is: ' + this.files[0].size / 1024  + "KB");
                  //FileUpload1.replaceWith( FileUpload1 = FileUpload1.clone( true ) );
                  $('#file_reset').trigger('click');
            }
         
      });
    </script>   
    
  
</body>
</html>
