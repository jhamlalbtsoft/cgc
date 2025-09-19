<?php
session_start();
if(isset($_FILES['FileUpload1'])){
	
	require_once __DIR__ . DIRECTORY_SEPARATOR . "admin/lib" . DIRECTORY_SEPARATOR . "config.php";
	$_ADMIN = false;
	$UserTypeId = 0;
	$SGRep1 = 0;
	if(isset($_SESSION['user'])){
		$_ADMIN = is_array($_SESSION['user']);
		$UserTypeId = $_SESSION['user']['UserTypeId'];
	}elseif(isset($_COOKIE['user_id']) && $_COOKIE['user_id']!=0) {

	   $_SESSION['user'] = array(
			  "id" => $_COOKIE['user_id'],
			  "UserTypeId" => $_COOKIE['UserTypeId']
			);
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

	$uploaddir = 'Image/merged/';
	$uploadfile = $uploaddir . basename($_FILES['FileUpload1']['name']);
	//echo basename($_FILES['FileUpload1']['name']);

	if (move_uploaded_file($_FILES['FileUpload1']['tmp_name'], $uploadfile)) {
	  //echo "success<br>";
	  echo $_SESSION[$ImageRep] =  'Image/merged/'.basename($_FILES['FileUpload1']['name']);
	} else {
	  //echo "errors";
	}
	
	//die;
}


if(isset($_FILES['fuphoto']) && $_FILES['fuphoto']['tmp_name']){
	///session_start();
	require_once __DIR__ . DIRECTORY_SEPARATOR . "admin/lib" . DIRECTORY_SEPARATOR . "config.php";
	$_ADMIN = false;
	$UserTypeId = 0;
	$SGRep1 = 0;
	if(isset($_SESSION['user'])){
		$_ADMIN = is_array($_SESSION['user']);
		$UserTypeId = $_SESSION['user']['UserTypeId'];
	}elseif(isset($_COOKIE['user_id']) && $_COOKIE['user_id']!=0) {

	   $_SESSION['user'] = array(
			  "id" => $_COOKIE['user_id'],
			  "UserTypeId" => $_COOKIE['UserTypeId']
			);
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

	$uploaddir = 'Image/';
	$uploadfile = $uploaddir . basename($_FILES['fuphoto']['name']);
	//echo basename($_FILES['FileUpload1']['name']);

	if (move_uploaded_file($_FILES['fuphoto']['tmp_name'], $uploadfile)) {
	  //echo "success<br>";
	  echo $_SESSION['fuphoto'] =  'Image/'.basename($_FILES['fuphoto']['name']);
	} else {
	  //echo "errors on fuphoto";
	}
	
	//die;
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head id="Head1"><title>
	Untitled Page
</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
   
    <style type="text/css">
    .btn
{
	text-align: center;
	color: #333;
	line-height: 20px;
	padding-top: 4px;
	padding-right: 12px;
	padding-bottom: 4px;
	padding-left: 12px;
	font-size: 14px;
	margin-bottom: 0px;
	vertical-align: middle;
	border-top-color: rgba(0,0,0,0.1);
	border-right-color: rgba(0,0,0,0.1);
	border-bottom-color: #b3b3b3;
	border-left-color: rgba(0,0,0,0.1);
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	display: inline-block;
	cursor: pointer;
	border-top-left-radius: 4px;
	border-top-right-radius: 4px;
	border-bottom-right-radius: 4px;
	border-bottom-left-radius: 4px;
	box-shadow: inset 0px 1px 0px rgba(255,255,255,0.2), 0px 1px 2px rgba(0,0,0,0.05);
	text-shadow: 0px 1px 1px rgba(255,255,255,0.75);
	background-image: linear-gradient(rgb(255, 255, 255), rgb(230, 230, 230));
	background-repeat: repeat-x;
	background-color: rgb(245, 245, 245);
}
.btn-primary
{
	color: #fff;
	border-top-color: rgba(0,0,0,0.1);
	border-right-color: rgba(0,0,0,0.1);
	border-bottom-color: rgba(0,0,0,0.25);
	border-left-color: rgba(0,0,0,0.1);
	text-shadow: 0px -1px 0px rgba(0,0,0,0.25);
	background-image: linear-gradient(rgb(0, 136, 204), rgb(0, 68, 204));
	background-repeat: repeat-x;
	background-color: rgb(0, 109, 204);
}
.pull-right
{
	float: right;
}
    </style>
</head>
<body style="background-color:Transparent; background-image:none">
    <form name="form1" method="post" action="./Web_Image_eep2.php?File=<?= $_REQUEST['File'] ?>&amp;id=<?= $_REQUEST['id'] ?>&amp;size=150" id="form1" enctype="multipart/form-data">
<div>
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTQxMDExMDM1Mg9kFgICAQ8WAh4HZW5jdHlwZQUTbXVsdGlwYXJ0L2Zvcm0tZGF0YWRk8OPADNAZJhHMtot036xitlgjpOPdhJXZ2Io9Riw3NIw=" />
</div>

<div>

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="33A34985" />
	<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEdAANlNgAY0fVvtKukhH5X2ETedM1OpyGDooH7hqGwG0yx8M34O/GfAV4V4n0wgFZHr3e01PdE8qFfkas1Zxkt21gdJvJqFlZFeqsB+fuxRQW+VQ==" />
</div>
    <div>

        <input type="file" name="FileUpload1" id="FileUpload1" class="btn" style="width:270px;" />
        <input type="submit" name="Button1" value="Upload" id="Button1" class="btn btn-white btn-cons"/>

    </div>
        
    </form>
   
     <script type="text/javascript">
  var fuphoto = $("#fuphoto");
      $('#fuphoto').bind('change', function () {
            if((this.files[0].size / 1024) > parseInt(1500))
            {
                 alert('File Size exceed the permited limit of 1500 KB. Please reduce the file size. This file size is: ' + this.files[0].size / 1024  + "KB");
                 //fuphoto.replaceWith( fuphoto = fuphoto.clone( true ) );
                 $('#file_reset').trigger('click');
            }
         
      });
       var FileUpload1 = $("#FileUpload1");
      $('#FileUpload1').bind('change', function () {
          
            if((this.files[0].size / 1024) > parseInt(150000))
            {
                // alert('File Size exceed the permited limit of  50  KB. Please reduce the file size. This file size is: ' + this.files[0].size / 1024  + "KB");
                  //FileUpload1.replaceWith( FileUpload1 = FileUpload1.clone( true ) );
                 // $('#file_reset').trigger('click');
            }
         
      });
    </script>   
    
</body>
</html>
