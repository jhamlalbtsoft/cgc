<?php
// THROW USER TO LOGIN PAGE IF NOT SIGNED IN
// YOU MIGHT WANT TO DO THIS DIFFERENTLY IF PLANNING TO USE PRETTY URL
$_ADMIN = false;
//$_ADMIN = is_array($_SESSION['user']);

if( isset( $_SESSION['user']['id'] ) ){
    $_ADMIN = true;
}else{
    $_ADMIN = false;
}

if (!$_ADMIN && basename($_SERVER["SCRIPT_FILENAME"], '.php')!="login") {
  header('Location: login');
  die();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>ADMIN PANEL - CGChamber </title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="robots" content="noindex">
    <link href="public/admin.css" rel="stylesheet">
    <link href="<?= webUrl ?>cassette.axd/stylesheet/257678ac5c078ba3d83505199d54da0c62791b68/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!--link href="<?= webUrl ?>cassette.axd/stylesheet/9966e31d4e513faf36a0509dcb6377ffaa60de52/assets/css/style.css" rel="stylesheet"-->
    <script src="public/admin.js"></script>

	<script type="text/javascript" src="<?= webUrl ?>tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?= webUrl ?>tinymce/Scripts/jquery.validate.unobtrusive.min.js"></script>
	
	<script type="text/javascript">
		function topFunction() {
		  document.body.scrollTop = 0;
		  document.documentElement.scrollTop = 0;
		}
		function Inittinymce() {
			tinymce.init({

				selector: "textarea",
				plugins: [
					"advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace  visualblocks visualchars code  insertdatetime media nonbreaking",
					"table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
			],

				toolbar1: " bold italic underline  |  fontselect fontsizeselect",
				 menubar: false
	//            toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo |  image media code |  preview | forecolor backcolor",
	//            toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | visualchars visualblocks nonbreaking template pagebreak "
	//           
	});
		 }
		 function SetImageOnTinyMce(ImageUrl) {
			
		  
			 tinyMCE.activeEditor.dom.add(tinyMCE.activeEditor.getBody(), 'div', { title: 'my title' }, "<img src='" + ImageUrl + "'/>");
		   
	   
		 }
		 function SetFileLinkOnTinyMce(FileLink, FileText) {
			 //var s = tinymce.activeEditor.getContent();
			 tinyMCE.activeEditor.dom.add(tinyMCE.activeEditor.getBody(), 'div', { title: 'my title' }, "<a target='_blank' href='" + FileLink + "'>" + FileText + "</a>");
			 //tinymce.activeEditor.setContent(s + "<a target='_blank' href='" + FileLink + "'>" + FileText + "</a>");

		 }

		</script>

  </head>
  <body>
    <!-- [NOW LOADING SPINNER] -->
    <div id="page-loader">
      <img id="page-loader-spin" src="public/cube-loader.svg">
    </div>

    <!-- [PAGE WRAPPER] -->
    <div id="page-wrap">
      <?php if ($_ADMIN) { ?>
      <!-- [SIDE BAR] -->
      <nav id="page-sidebar" class="active">
        <a href="#">
          <span class="ico">&#9788;</span>
          Welcome - <?= $_SESSION['user']['first_name'] ?>
        </a>
	<?php if($_SESSION['user']['UserTypeId']==1 && $_SESSION['user']['name']=='superadmin'){//admin ?>	
	   <a href="users">
          <!--span class="ico">&#9787;</span-->
          <i class="icon-key"></i> Manage Users
        </a>
	<?php } ?>	
	<?php if($_SESSION['user']['UserTypeId']<=2){//admin ?>	
	   <a href="members">
          <!--span class="ico">&#9787;</span-->
          <i class="icon-user"></i> Manage Members
        </a>
        <a href="dnldExcelForm">
          <!--span class="ico">&#9787;</span-->
          <i class="icon-user"></i> Download Members Sheet
        </a>
	<?php } ?>
	 <?php if($_SESSION['user']['name']=='superadmin1'){//admin ?>	
	   <a href="user_backup.php">
          <!--span class="ico">&#9787;</span-->
          <i class="icon-download"></i> Backup Members
        </a>
		<?php if($_SESSION['user']['UserTypeId']){// ?>	
		   <a href="importOfflineData">
			  <!--span class="ico">&#9787;</span-->
			  <i class="icon-upload"></i> Upload Offline Data
			</a>
		<?php } ?>
	<?php } ?>	
	<?php if($_SESSION['user']['UserTypeId']==3){//cardprint ?>	
	   <a href="PendingCardPrint">
          <!--span class="ico">&#9787;</span-->
          <i class="icon-user"></i> Pending Cards
        </a>
	<?php } ?>
	<?php if($_SESSION['user']['UserTypeId']<2){//admin ?>	
	   -----------------------------
	   <a href="links?TypeId=1" data-ajax-update="#link" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"> <i class="icon-link"></i> <span class="title">Links</span>   <span class="arrow "></span></a>
	<?php } ?>
	<?php if($_SESSION['user']['UserTypeId']<2){//admin ?>	
	   
	   
      <a href="eep?TypeId=1" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"> <i class="icon-star"></i> <span class="title">Events</span>   <span class="arrow "></span></a>
  
      <a href="eep?TypeId=2" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"> <i class="icon-comments"></i> <span class="title">Latest News </span>   <span class="arrow "></span></a>
  
      <a href="eep?TypeId=3" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"> <i class="icon-camera"></i> <span class="title">Photo Gallery</span>   <span class="arrow "></span></a>

      <a href="eep?TypeId=4" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"> <i class="icon-film"></i> <span class="title">Media</span>   <span class="arrow "></span></a>

          
      <a href="eep?TypeId=5" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"> <i class="icon-money"></i> <span class="title">Press </span>   <span class="arrow "></span></a>

           
      <a href="eep?TypeId=6" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"> <i class="icon-book"></i> <span class="title">Government Policy </span>   <span class="arrow "></span></a>
    -------------------------------
	<?php if($_SESSION['user']['UserTypeId']<2){//admin ?>	
      <a href="masters?Type=Groups" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"> <i class="icon-group"></i> <span class="title">Group</span>   <span class="arrow "></span></a>

      
         <a href="masters?Type=Subgroup&mType=Groups" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"> <i class="icon-sitemap"></i> <span class="title">Subgroup</span>   <span class="arrow "></span></a>

         <a href="masters?Type=District" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"> <i class="icon-play"></i> <span class="title">District</span>   <span class="arrow "></span></a>

         <a href="masters?Type=City&mType=District" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"> <i class="icon-forward"></i> <span class="title">City</span>   <span class="arrow "></span></a>

      
         <a href="masters?Type=Area&mType=City" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"> <i class="icon-fast-forward"></i> <span class="title">Area</span>   <span class="arrow "></span></a>

            
         <a href="masters?Type=Designation" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"> <i class="icon-desktop"></i> <span class="title">Designation</span>   <span class="arrow "></span></a>
		
		<a href="masters?Type=GovernmentPolicy" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"> <i class="icon-briefcase"></i> <span class="title">Govt Policy Master</span>   <span class="arrow "></span></a>
		
         <!--a href="masters?Type=SMSGroup" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"> <i class="icon-comments-alt"></i> <span class="title">SMS Group</span>   <span class="arrow "></span></a-->
		 
         <a href="masters?Type=GoverningBody" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"> <i class="icon-bullseye"></i> <span class="title">Governing Body</span>   <span class="arrow "></span></a>


         

       
         <!--a href="masters?Type=SMSMaster" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"> <i class="icon-envelope-alt"></i> <span class="title">SMS Master</span>   <span class="arrow "></span></a-->

       
          <!--li class="">
         <a href="<?PHP ECHO webUrl ?>Members/Members-Index" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"> <i class="icon-user"></i> <span class="title">Members</span>   <span class="arrow "></span></a>

       
       </li-->
         
         <!-- <a href="masters?Type=Request" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"> <i class="icon-edit"></i> <span class="title">Request</span>   <span class="arrow "></span></a> -->
		 <a href="request">
          <!--span class="ico">&#9787;</span-->
          <span class="title"><i class="icon-edit"></i> Request</span> 
        </a>
       
         <a href="SendSMS">
          <!--span class="ico">&#9787;</span-->
          <span class="title"><i class="icon-envelope"></i> Send SMS</span> 
        </a>
         <!--a href="#SendSMS" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"> <i class="icon-envelope"></i> <span class="title">Send SMS</span>   <span class="arrow "></span></a-->

            
         <a href="#" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"> <i class="icon-map-marker"></i> <span class="title">Media Contacts</span>   <span class="arrow "></span></a>
		 <?php }//admin ?>	
<!--li class="">
                  <a href="<?PHP ECHO webUrl ?>Members/Login-ChangePassword " data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-complete="$('.scrollup').trigger('click')" data-ajax="true"><i class="icon-key"></i> <span class="title">Change Password</span> <span class="arrow "></span></a>

      </li-->
          <li class="">
             <a href="#"><i class="icon-off"></i> <span class="title" onclick="adm.bye();"> Logout</span> </a>      
      </li>
        
	<?php } ?>
      </nav>
      <?php } ?>

      <!-- [MAIN CONTENTS] -->
      <div id="page-main">
        <?php if ($_ADMIN) { ?>
        <!-- [NAVIGATION BAR] -->
        <nav id="page-nav">
          <div id="page-button-side" onclick="adm.side();">&#9776;</div>
          <div id="page-button-out" onclick="adm.bye();">&#9747;</div>
        </nav>
        <?php } ?>

        <!-- [PAGE CONTENTS] -->
        <div id="page-contents">