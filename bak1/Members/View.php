<?php
// INIT
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "../admin/lib" . DIRECTORY_SEPARATOR . "config.php";

$_ADMIN = false;
$UserTypeId = 0;
$SGRep1 = 0;
if(isset($_SESSION['user'])){
	$_ADMIN = is_array($_SESSION['user']);
	$UserTypeId = $_SESSION['user']['UserTypeId'];
}

if(isset($_REQUEST['id'])){
	$MembersId = $_REQUEST['id'];//18
}else{
	echo "Invalid user";
	die;
}

require PATH_LIB . "lib-members.php";
$memLib = new Members();

//$memData = $memLib->getAll($searchType=0, $filter);
$memData = $memLib->get($MembersId);

//$FirmName = $memData['FirmName'];
//$GroupName = $memData['GroupName'];
?>

<!DOCTYPE html>
<html   xmlns="http://www.w3.org/1999/xhtml"  ><head   id="Head"  ><title>View Member- <?= $memData['FirmName'] ?></title>
<meta content="Default" name="description" id="MetaTag1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!-- BEGIN PLUGIN CSS -->
<link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/56c8cfe329e31aa9fc513f0f01e53c3fdf4646b5/assets/plugins/pace/pace-theme-flash.css" type="text/css" rel="stylesheet"/>
<link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/469a93b140601eea53d2f314a32626a6c4591b85/assets/plugins/gritter/css/jquery.gritter.css" type="text/css" rel="stylesheet"/>
<link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/4ce28ee88ecd18b3dea3fa978d94a216ecd7f2c5/assets/plugins/bootstrap-datepicker/css/datepicker.css" type="text/css" rel="stylesheet"/>
<link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/82b2a48cbf5634397e60d026890e94dc7def39f9/assets/plugins/jquery-ricksaw-chart/css/rickshaw.css" type="text/css" rel="stylesheet"/>
<link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/0f3af7869eb15b30e1884371604cd1596bb006ed/assets/plugins/jquery-morris-chart/css/morris.css" type="text/css" rel="stylesheet"/>
<link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/29dc8dbc181ded706139a7d4c1f1f4cd515cc7b7/assets/plugins/jquery-slider/css/jquery.sidr.light.css" type="text/css" rel="stylesheet"/>
<link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/b3585eb5627d7ede663eca4f59d3219fd4b645fa/assets/plugins/bootstrap-select2/select2.css" type="text/css" rel="stylesheet"/>
<link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/1884a59f7e7331825dca0b6e71043f98c0289f73/assets/plugins/jquery-jvectormap/css/jquery-jvectormap-1.2.2.css" type="text/css" rel="stylesheet"/>
<link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/be790d727366829c8dbfa2f3a2b9fc880e1435eb/assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css" type="text/css" rel="stylesheet"/>
<link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/b54e6c3cd41636c423439c76df997eefce57a3cb/assets/plugins/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
<link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/a7534c01230e13be1b3e63b7212818f1b29287c3/assets/plugins/bootstrap/css/bootstrap-responsive.min.css" type="text/css" rel="stylesheet"/>
<link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/257678ac5c078ba3d83505199d54da0c62791b68/assets/plugins/font-awesome/css/font-awesome.css" type="text/css" rel="stylesheet"/>
<link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/e24dc41868f2503ec60abaffb848b68b1ddb614c/assets/css/animate.min.css" type="text/css" rel="stylesheet"/>
<link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/9966e31d4e513faf36a0509dcb6377ffaa60de52/assets/css/style.css" type="text/css" rel="stylesheet"/>
<link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/8acc710df3723574cfd1c3af803c11a0f5747883/assets/css/responsive.css" type="text/css" rel="stylesheet"/>
<link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/59dbe900a4d9df8047f2617587728d46dc70553f/assets/css/custom-icon-set.css" type="text/css" rel="stylesheet"/>
<link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/9ef3dde572fbcedf13935e2f87c28d9b72349016/assets/plugins/jquery-superbox/css/style.css" type="text/css" rel="stylesheet"/>
  



   <script src="<?PHP ECHO webUrl ?>cassette.axd/script/c5268df4c1f0bada95cb3d2b80089a50b494b5ee/assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/6ccdd8a368e50542c1ab2844b5fb7a8e71ad9c84/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/6ab5d9b8349fc98fa656de69c8900ef968a96e75/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/abdebc690cfa2c0ee75c87b1f10be71fd9d90242/assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/3b7c8c788853aab78e8f4f91ef3dded17677acc7/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/f1f8eeeb18ee3187d996172c8cca43ae8fb922a6/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/d7dafe2c5520c3fb822ac3ad04bd71df57a809bf/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/18f44fdfb5ec231fbd3844043f7886de4a8c695d/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/3915de45f4d72a7aca4066d04f938e5b77340399/assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/73be93c22b3dd6b424ee2f76f88227224579fc94/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/76ff0db778e97654fa3919079a0be809483e25bf/assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/2d075abee9db8edcd7c2c5834f3940820b75abb4/assets/plugins/jquery-jvectormap/js/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/97ef49587508ee13c8021534c7c1a53596ee530b/assets/plugins/jquery-jvectormap/js/jquery-jvectormap-us-lcc-en.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/7e3cc75c9facc4ef22dc14002ee79e0976cc0130/assets/plugins/jquery-sparkline/jquery-sparkline.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/c1ca9d374b4458de55de8e7325d732e340d394d8/assets/plugins/jquery-flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/8c09f55eef4d4b7e0bcbe7e12222c21658fb7588/assets/plugins/jquery-flot/jquery.flot.animator.min.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/f4462282c6e584e0fbea01782f5b49ff869732c6/assets/plugins/skycons/skycons.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/21353672200991ed7a0826fae2134c4d47c7ec75/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/61a049346a38ba58e4a26248360bd2d20d9b91bf/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/db884486ad1d0fccb6bcbf793a21833b97df1e27/assets/plugins/jquery-inputmask/jquery.inputmask.min.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/3bfa4e389792f28faecb9f8abb2a2d7449e9d21d/assets/plugins/jquery-autonumeric/autoNumeric.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/cc1f96d99625d5285e12d56d1ab3baec75eb4f9f/assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/beff3b245fea750be9b7af1cdecf5efec07d0234/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/d950e8e239d6e02d08c94468dec057f386e80121/assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/016c7f61ede5d650b1740a1750cd994099ab7b09/assets/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/d260211b80908eae12f8d26715aad3f60c2fdb86/assets/js/form_elements.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/7f380366ef0d20c2ff7fa05805effbf3cadc1fad/assets/js/core.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/1919f8b69ec08263b0e357305c131b46c4872553/assets/js/demo.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/b0be42406b7f681a501d5845ce4b05be0b9f6bd8/Scripts/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?PHP ECHO webUrl ?>cassette.axd/script/644c0a4d39f177fc72b496eb30db16e109e1c2f5/Scripts/jquery.validate.unobtrusive.min.js" type="text/javascript"></script>
<style>
img[src="image/home.png?Red=1"] {
    background-color: Red;
}
img[src="image/home.png?Green=1"] {
    background-color: Yellow;
}
</style>

</head    ><body   class=""  >
<div id="load" class="pace  pace-inactive"><div data-progress="99" data-progress-text="100%" style="width: 100%;" class="pace-progress">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>






 
  <!-- BEGIN PAGE CONTAINER-->

    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content" id="master">  
		
<style type="text/css">
    label
    {
        font-weight: bold;
    }
</style>

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple">
            <div class="grid-body no-border">
                <div id="fc">
<form action="/Members/Create?Length=7" class="form-no-horizontal-spacing" data-ajax="true" data-ajax-mode="replace" data-ajax-update="#master" id="form0" method="post">                        <div class="row-fluid column-seperation">
                            <div class="span12">
                                <h4>
                                    Members Details</h4>
                                <div class="row-fluid">
                                    <div class="span3" >
                                        <label for="Firm_Name">Firm Name</label>
                                    </div>
                                    <div class="span9">
                                        <?= $memData['FirmName'] ?>
                                    </div>
                                </div>
                                 <div class="row-fluid">
                                    <div class="span3" >
                                        <label for="Registration_No">Registration No</label>
                                    </div>
                                    <div class="span9">
                                        <?= $memData['RegistrationNo'] ?>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Member_Type">Member Type</label>
                                    </div>
                                    <div class="span9">
                                        <?= $memData['MemberType'] ?>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3" id="grp">
                                        <label for="Group">Group</label>
                                    </div>
                                    <div class="span9" id="grp">
                                        <?= $memData['GroupName'] ?>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span3" id="sgrp">
                                            <label for="Sub_Group">Sub Group</label>
                                        </div>
                                        <div class="span9" id="sgrp">
                                            <?= $memData['SubGroupName'] ?>
                                        </div>
                                         <div class="span9">
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="District">District</label>
                                    </div>
                                    <div class="span9">
                                        <?= $memData['DistrictName'] ?>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="City">City</label>
                                    </div>
                                    <div class="span9">
                                        <?= $memData['CityName'] ?>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Address">Address</label>
                                    </div>
                                    <div class="span9">
										<?php 
											$s='';
											if($memData['Shop']){
												if($s)
													$s.=" ";
												$s.=$memData['Shop'];	
											}

											if($memData['Complex']){
												if($s)
													$s.="\r\n";
												$s.=$memData['Complex'];	
											}

											if($memData['Street']){
												if($s)
													$s.="\r\n";	
												$s.=$memData['Street'];	
											}
										?>
                                        <?= $s; ?>
                                    </div>
                                </div>
                                 <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Area">Area</label>
                                    </div>
                                    <div class="span9">
                                        <?= $memData['AreaName'] ?>
                                    </div>
                                </div>
                                
                               
                               
                               
                                <div class="row-fluid">
                                    


                                    <div class="row-fluid">
                                        <div class="span3">
                                            <label for="Pin">PIN</label>
                                        </div>
                                        <div class="span9">
                                            <?= $memData['PIN'] ?>
                                        </div>
                                    </div>
                                      <div class="span9">
                                        </div>
                                </div>
                                <div class="row-fluid">




                                    <div class="row-fluid">
                                        <div class="span3">
                                            <label for="Email">Email</label>
                                        </div>
                                        <div class="span9">
                                            <?= $memData['Email'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                 


                                    <div class="row-fluid">
                                        <div class="span3">
                                            <label for="Old_Registration_No">Old Registration No</label>
                                        </div>
                                        <div class="span9">
                                            <?= $memData['RegistrationNoOld'] ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Status">Status</label>
                                    </div>
                                    <div class="span9">
                                        <div class="checkbox check-success 	">
                                            <?php if($memData['Approved']){ ?>
                                             <input id="Approved" type="checkbox" value="true" name="Approved"
                                                checked='checked'></input>
                                            <label for="Approved">
                                                Approved</label>
											<?php }else{ ?>
											<input id="Approved" type="checkbox" value="false" name="Approved"
                                                checked='checked'></input>
                                            <label for="Approved">
                                                Approved</label>
											<?php } ?>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Certificate">Certificate</label>
                                    </div>
                                    <div class="span9">
                                        <div class="checkbox check-success 	">
                                            
                                             <input id="CertificatePrint" type="checkbox" value="<?php if($memData['CertificatePrint']==1) echo 'true'; else echo "false"; ?>" name="CertificatePrint"
                                                checked='checked'></input>
                                            <label for="CertificatePrint">
                                                Printed</label>
                                        </div>
                                    </div>
                                </div>
                               
                                
                                 <div class="row-fluid">
                                    <div class="span6">
                                <h4>
                                    Representative 1</h4>
                                
                                
                                
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Name">Name</label>
                                    </div>
                                    <div class="span9">
                                          <?= $memData['Representative1'] ?>
                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Mobile">Mobile</label>
                                    </div>
                                    <div class="span9">
                                        <?= $memData['MobileRep1'] ?>
                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Governing_Body">Governing Body</label>
                                    </div>
                                    <div class="span9">
                                        <?= $memData['GoverningBodyIdNameRep1'] ?>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Designation">Designation</label>
                                    </div>
                                    <div class="span9">
                                        <?= $memData['GBDesignationIdNameRep1'] ?>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="SMS_Group">SMS Group</label>
                                    </div>
                                    <div class="span9">
                                        <?= $memData['SMSGroupRep1'] ?>
                                    </div>
                                </div>
                                 <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Id_Card">Id Card</label>
                                    </div>
                                    <div class="span9">
                                        <div class="checkbox check-success 	">
                                            
                                             <input id="CardPrintRep1" type="checkbox" value="true" name="CardPrintRep1"
                                                checked='<?php if($memData['CardPrintRep1']==2) echo 'checked'; else echo ""; ?>'></input>
                                            <label for="CardPrintRep1">
                                                Printed</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Photograph">Photograph</label>
                                    </div>
                                    <div class="span9">
                                        
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <img src="<?= webUrl.$memData['ImageRep1'] ?>" id="ImageRep1img" style="Width:150px" />
                                    </div>
                                      <div class="span9">
                                        </div>
                                </div>
                                 </div>

                              
                               

                               
                               
                              
                                <div class="span6">
                                <h4>
                                    Representative 2</h4>
                               
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Name">Name</label>
                                    </div>
                                    <div class="span9">
                                        <?= $memData['Representative2'] ?>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Mobile">Mobile</label>
                                    </div>
                                    <div class="span9">
                                        <?= $memData['MobileRep2'] ?>
                                    </div>
                                </div>

                                 <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Id_Card">Id Card</label>
                                    </div>
                                    <div class="span9">
                                        <div class="checkbox check-success 	">
                                            
                                                <input id="CardPrintRep2" type="checkbox" value="<?php if($memData['CardPrintRep2']==2) echo 'true'; else echo "false"; ?>" name="CardPrintRep2"></input>
                                            <label for="CardPrintRep2">
                                                Printed</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Photograph">Photograph</label>
                                    </div>
                                    <div class="span9">
                                        
                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="span4">
                                        <img src="<?= webUrl.$memData['ImageRep2'] ?>" id="ImageRep2img" style="Width:150px" />
                                    </div>
                                </div>
                                 </div>

                                </div>
                            </div>
                        </div>		  
</form>                </div>
            </div>
        </div>
    </div>
</div>

	
	
		</div> 

	


        

		

<div style="display: none;" id="myModal" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><div style="clear:both"></div></div>
										<br/>	<div class="modal-body" id="modal-body"></div>							
										
									<div class="modal-footer">
										
										
									</div>
								</div>
<script type="text/javascript" src="<?PHP ECHO webUrl ?>assets/js/print.js"></script>
<script type="text/javascript" src="<?PHP ECHO webUrl ?>Scripts/jquery.unobtrusive-ajax.js"></script>
<!-- END CORE TEMPLATE JS -->
<script>
 function makedpt(id) {
       cloned = $( '#myModal' );
      $('#myModal').clone().attr('id', id ).insertBefore( cloned );
 $(".close").click(function(event) {
       $(this).parent(".modal-header").parent(".modal").hide();
$(this).parent(".modal-header").parent(".modal").remove();
    });
    }
 function showdpt(id) {
      
        $("#"+id).show();
        $("#" + id).display="block";
    }
    function hidedpt(id) {
       
        $("#" + id).hide();
       $("#" + id).remove();
    }

   


 function RemoveRow(id) {
       
        $('#'+id).remove();
    }
</script>
<script type="text/javascript" src="<?PHP ECHO webUrl ?>tinymce/tinymce.min.js"></script>
<script type="text/javascript">
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
</body>
</html>
