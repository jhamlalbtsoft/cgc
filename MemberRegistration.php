<?php
//session_start();
error_reporting(E_ALL); ini_set('display_errors', 1);
require __DIR__ . DIRECTORY_SEPARATOR . "/admin/lib" . DIRECTORY_SEPARATOR . "config.php";
$_ADMIN = false;

$UserTypeId = 0;
$MembersId = 0;


if(isset($_REQUEST['id'])){
	$MembersId = $_REQUEST['id'];//18
}
session_start();
if(isset($_SESSION["MembersId"])){
	$MembersId = $_SESSION["MembersId"];//18
	//unset($_SESSION["MembersId"]);
	if(isset($_SESSION["orderId"]))
		unset($_SESSION["orderId"]);
}

require PATH_LIB . "lib-members.php";
$memLib = new Members();
$groups = $memLib->getGroups();
$subGroups = $memLib->getSubGroups();
$loadDistrict = $memLib->LoadDistrict();
$loadCity = $memLib->loadCity();
$loadArea = $memLib->loadArea();
$getGB = $memLib->getGB('GB');
$getGBCommittee = $memLib->getGB('Committee');
$getDesignation = $memLib->getDesignation();

$FirmName = "";
$GroupName = "";
$TINNo = "";
$MemberType = "";
$GroupsId = 0;
$GroupName = "";
$SubGroupId = 0;
$SubGroupName = "";
$Email = "";
$STDCode = "";
$Landline = "";
$Mobile = "";
$Shop = "";
$Complex = "";
$Street = "";
$SectorMohalla = "";
$AreaId = 0;
$AreaName = "";
$CityId = 0;
$CityName = "";
$DistrictId = 0;
$DistrictName = "";
$PIN = "";
$PAN = "";
$RegistrationNo = "";
$RegistrationNoOld = "";
$Approved = 0;
$DueDate = "";
$FY = "";
$CertificatePrint = 0;
$CertModeOfDispatch = "";
$CertDetails = "";
$CertUserId = 0;

$Representative1 = "";
$ImageRep1 = "";
$DOBRep1 = "";
$MobileRep1 = "";
$MobileRep1Alternate = "";
$OrgDesignationRep1 = "";
$EmailRep1 = "";
$BloodGroupRep1 = "";
$SalutationRep1 = "";
$GoverningBodyIdRep1 = 0;
$GoverningBodyIdNameRep1 = "";
$GBDesignationIdRep1 = 0;
$GBDesignationIdNameRep1 = "";
$CommitteeIDRep1 = 0;
$CommitteeIDNameRep1 = "";
$CdesignationIdRep1 = 0;
$CdesignationIdNameRep1 = "";
$SMSGroupRep1 = "";
$CardPrintRep1 = 0;
$CardDispatchModeRep1 = "";
$CardDetailsRep1 = "";
$CardUserIdRep1 = 0;

$Representative2 = "";
$ImageRep2 = "";
$DOBRep2 = "";
$MobileRep2 = "";
$MobileRep2Alternate = "";
$OrgDesignationRep2 = "";
$EmailRep2 = "";
$BloodGroupRep2 = "";
$SalutationRep2 = "";
$GoverningBodyIdRep2 = 0;
$GoverningBodyIdNameRep2 = "";
$GBDesignationIdRep2 = 0;
$GBDesignationIdNameRep2 = "";
$CommitteeIDRep2 = 0;
$CommitteeIDNameRep2 = "";
$CdesignationIdRep2 = 0;
$CdesignationIdNameRep2 = "";
$SMSGroupRep2 = "";
$CardPrintRep2 = 0;
$CardDispatchModeRep2 = "";
$CardDetailsRep2 = "";
$CardUserIdRep2 = 0;

$CreatedBy = $UserTypeId;
$UpdateBy = $UserTypeId;
$CreationDate = date("Y-m-d H:i:s");
$UpdationDate = date("Y-m-d H:i:s");
$GBOrderRep1 = 0;
$GBOrderRep2 = 0;
$COrderRep1 = 0;
$COrderRep2 = 0;

$MemDoc = "";
$DocTitle = "";
$Remark = "";
	
if($MembersId>0){
	//require PATH_LIB . "lib-members.php";
	//$memLib = new Members();

	$memData = $memLib->get($MembersId);

	$FirmName = $memData['FirmName'];
	$GroupName = $memData['GroupName'];
	$TINNo = $memData['GSTN'];
	$MemberType = $memData['MemberType'];
	$GroupsId = $memData['GroupsId'];
	$GroupName = $memData['GroupName'];
	$SubGroupId = $memData['SubGroupId'];
	$SubGroupName = $memData['SubGroupName'];
	$Email = $memData['Email'];
	$STDCode = $memData['STDCode'];
	$Landline = $memData['Landline'];
	$Mobile = $memData['Mobile'];
	
	$Shop = $memData['Shop'];
	$Complex = $memData['Complex'];
	$Street = $memData['Street'];
	$SectorMohalla = $memData['SectorMohalla'];
	$AreaId = $memData['AreaId'];
	$AreaName = $memData['AreaName'];
	$CityId = $memData['CityId'];
	$CityName = $memData['CityName'];
	$DistrictId = $memData['DistrictId'];
	$DistrictName = $memData['DistrictName'];
	$PIN = $memData['PIN'];
	//$PAN = $memData['PAN'];
	$FY = $memData['FY'];
	$RegistrationNo = $memData['RegistrationNo'];
	$RegistrationNoOld = $memData['RegistrationNoOld'];
	$Approved = $memData['Approved']==''?0:$memData['Approved'];
	//$DueDate = date('d/m/Y', strtotime($memData['DueDate']));
	$CertificatePrint = $memData['CertificatePrint']==''?0:$memData['CertificatePrint'];
	$CertModeOfDispatch = $memData['CertModeOfDispatch'];
	$CertDetails = $memData['CertDetails'];
	$CertUserId = $memData['CertUserId'];

	$Representative1 = $memData['Representative1'];
	$ImageRep1 = $memData['ImageRep1'];
	//$DOBRep1 = (strtotime($memData['DOBRep1'])!=strtotime('01/01/1970'))?date('d/m/Y', strtotime($memData['DOBRep1'])):'';
	$MobileRep1 = $memData['MobileRep1'];
	$MobileRep1Alternate = $memData['MobileRep1Alternate'];
	$OrgDesignationRep1 = $memData['OrgDesignationRep1'];
	$EmailRep1 = $memData['EmailRep1'];
	//$BloodGroupRep1 = $memData['BloodGroupRep1'];
	$SalutationRep1 = $memData['SalutationRep1'];
	$GoverningBodyIdRep1 = $memData['GoverningBodyIdRep1'];
	$GoverningBodyIdNameRep1 = $memData['GoverningBodyIdNameRep1'];
	$GBDesignationIdRep1 = $memData['GBDesignationIdRep1'];
	$GBDesignationIdNameRep1 = $memData['GBDesignationIdNameRep1'];
	$CommitteeIDRep1 = $memData['CommitteeIDRep1'];
	$CommitteeIDNameRep1 = $memData['CommitteeIDNameRep1'];
	$CdesignationIdRep1 = $memData['CdesignationIdRep1'];
	$CdesignationIdNameRep1 = $memData['CdesignationIdNameRep1'];
	//$SMSGroupRep1 = $memData['SMSGroupRep1'];
	$CardPrintRep1 = $memData['CardPrintRep1']==''?0:$memData['CardPrintRep1'];
	$CardDispatchModeRep1 = $memData['CardDispatchModeRep1'];
	$CardDetailsRep1 = $memData['CardDetailsRep1'];
	$CardUserIdRep1 = $memData['CardUserIdRep1'];

	$Representative2 = $memData['Representative2'];
	$ImageRep2 = $memData['ImageRep2'];
	//$DOBRep2 = (strtotime($memData['DOBRep2'])!=strtotime('01/01/1970'))?date('d/m/Y', strtotime($memData['DOBRep2'])):'';
	$MobileRep2 = $memData['MobileRep2'];
	$MobileRep2Alternate = $memData['MobileRep2Alternate'];
	$OrgDesignationRep2 = $memData['OrgDesignationRep2'];
	$EmailRep2 = $memData['EmailRep2'];
	//$BloodGroupRep2 = $memData['BloodGroupRep2'];
	$SalutationRep2 = $memData['SalutationRep2'];
	$GoverningBodyIdRep2 = $memData['GoverningBodyIdRep2'];
	$GoverningBodyIdNameRep2 = $memData['GoverningBodyIdNameRep2'];
	$GBDesignationIdRep2 = $memData['GBDesignationIdRep2'];
	$GBDesignationIdNameRep2 = $memData['GBDesignationIdNameRep2'];
	$CommitteeIDRep2 = $memData['CommitteeIDRep2'];
	$CommitteeIDNameRep2 = $memData['CommitteeIDNameRep2'];
	$CdesignationIdRep2 = $memData['CdesignationIdRep2'];
	$CdesignationIdNameRep2 = $memData['CdesignationIdNameRep2'];
	//$SMSGroupRep2 = $memData['SMSGroupRep2'];
	$CardPrintRep2 = $memData['CardPrintRep2']==''?0:$memData['CardPrintRep2'];
	$CardDispatchModeRep2 = $memData['CardDispatchModeRep2'];
	$CardDetailsRep2 = $memData['CardDetailsRep2'];
	$CardUserIdRep2 = $memData['CardUserIdRep2'];

	$CreatedBy = $UserTypeId;
	$UpdateBy = $UserTypeId;
	$CreationDate = date("Y-m-d H:i:s");
	$UpdationDate = date("Y-m-d H:i:s");
	$GBOrderRep1 = $memData['GBOrderRep1'];
	$GBOrderRep2 = $memData['GBOrderRep2'];
	$COrderRep1 = $memData['COrderRep1'];
	$COrderRep2 = $memData['COrderRep2'];

	$MemDoc = $memData['MemDoc'];
	$DocTitle = $memData['DocTitle'];
	$Remark = $memData['Remark'];
}
?>
<div class="row-fluid">
<script type="text/javascript">
    function SetFileLink(link, id, type) {
        alert("Image uploaded " + link);
        //$("#Link").val(link);
        document.getElementById(id).value = link;
        if (type == '1') {
            $("#" + id + "img").attr("href", link);
            $("#" + id + "img").html(link);
        }
        else {
            $("#" + id + "img").attr("src", link);
        }

    }

    function LoadGroup(id) {
        $("#load").show();
        //alert("hi");
        $.ajax({
            url: "Members/LoadGroup?id=" + id,
            type: "GET",
            data: "",

            success: function (data) {
                //alert("hi");

                //$(".cpy").remove();
                $("#EditMem").find("#grp").html(data);
                $("#load").hide();
                //$.validator.unobtrusive.parse("form");
            },
            error: function (jqXhr, textStatus, errorThrown) {
                alert("Error '" + jqXhr.status + "' (textStatus: '" + textStatus + "', errorThrown: '" + errorThrown + "')");
            }
            //                complete: function () {
            //                    $("#ProgressDialog").dialog("close");
            //                }
        });
    }
    function LoadSubGroup(id) {
        $("#load").show();
        //alert("hi");
        $.ajax({
            url: "Members/LoadSubGroup?id=" + id + "&GroupId=" + $("#EditMem").find("#GroupsId").val(),
            type: "GET",
            data: "",

            success: function (data) {
               
                $("#EditMem").find("#sgrp").html(data);
                $("#load").hide();
                $("#EditMem").find("#SGId").select2();
                //$.validator.unobtrusive.parse("form");
            },
            error: function (jqXhr, textStatus, errorThrown) {
                alert("Error '" + jqXhr.status + "' (textStatus: '" + textStatus + "', errorThrown: '" + errorThrown + "')");
            }
            //                complete: function () {
            //                    $("#ProgressDialog").dialog("close");
            //                }
        });
    }

    $("#EditMem").find("#GroupsId").change(function (event) {
        LoadSubGroup(0);
        $("#EditMem").find("#sgrplink").attr("href", "Members/SubGroup-Create?popup=1&eid=AddSubGroup&fname=LoadSubGroup&GroupsId=" + $("#EditMem").find("#GroupsId").val());
    });

    function LoadDistrict(id) {
        $("#load").show();
        //alert("hi");
        $.ajax({
            url: "Members/LoadDistrict?id=" + id,
            type: "GET",
            data: "",

            success: function (data) {
                //alert("hi");

                //$(".cpy").remove();
                $("#EditMem").find("#dist").html(data);
               LoadCity(0);
               $("#EditMem").find("#citylink").attr("href", "Members/City-Create?popup=1&eid=AddCity&fname=LoadCity&DistrictId=" + $("#EditMem").find("#DistrictId").val());
                $("#load").hide();
                //$.validator.unobtrusive.parse("form");
            },
            error: function (jqXhr, textStatus, errorThrown) {
                alert("Error '" + jqXhr.status + "' (textStatus: '" + textStatus + "', errorThrown: '" + errorThrown + "')");
            }
            //                complete: function () {
            //                    $("#ProgressDialog").dialog("close");
            //                }
        });
    }

    function LoadCity(id) {
        $("#load").show();
        //alert("hi");
        $.ajax({
            url: "Members/LoadCity?id=" + id + "&DistrictId=" + $("#EditMem").find("#DistrictId").val(),
            type: "GET",
            data: "",

            success: function (data) {
                //alert("hi");

                //$(".cpy").remove();
                $("#EditMem").find("#city").html(data);
                LoadArea(0);
                $("#EditMem").find("#arealink").attr("href", "Members/Area-Create?popup=1&eid=AddArea&fname=LoadArea&CityId=" + $("#EditMem").find("#CityId").val());
                $("#load").hide();
                //$.validator.unobtrusive.parse("form");
            },
            error: function (jqXhr, textStatus, errorThrown) {
                alert("Error '" + jqXhr.status + "' (textStatus: '" + textStatus + "', errorThrown: '" + errorThrown + "')");
            }
            //                complete: function () {
            //                    $("#ProgressDialog").dialog("close");
            //                }
        });
    }

    $("#EditMem").find("#DistrictId").change(function (event) {
        LoadCity(0);
        $("#EditMem").find("#citylink").attr("href", "Members/City-Create?popup=1&eid=AddCity&fname=LoadCity&DistrictId=" + $("#EditMem").find("#DistrictId").val());
    });


    function LoadArea(id) {
        $("#load").show();
        //alert(id);
        $.ajax({
            url: "Members/LoadArea?id=" + id + "&CityId=" + $("#EditMem").find("#CityId").val(),
            type: "GET",
            data: "",

            success: function (data) {

                $("#EditMem").find("#area").html(data);
                $("#load").hide();
           
            },
            error: function (jqXhr, textStatus, errorThrown) {
                alert("Error '" + jqXhr.status + "' (textStatus: '" + textStatus + "', errorThrown: '" + errorThrown + "')");
            }
           
        });
    }


    function citychange() {
        LoadArea(0);
        $("#EditMem").find("#arealink").attr("href", "Members/Area-Create?popup=1&eid=AddArea&fname=LoadArea&CityId=" + $("#EditMem").find("#CityId").val());
    }
</script>


<?php $SalutationRep1="Mr.";?>
  <script src="<?PHP ECHO webUrl ?>cassette.axd/script/c5268df4c1f0bada95cb3d2b80089a50b494b5ee/assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
        <script src="<?PHP ECHO webUrl ?>cassette.axd/script/6ccdd8a368e50542c1ab2844b5fb7a8e71ad9c84/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="<?PHP ECHO webUrl ?>cassette.axd/script/6ab5d9b8349fc98fa656de69c8900ef968a96e75/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?PHP ECHO webUrl ?>cassette.axd/script/73be93c22b3dd6b424ee2f76f88227224579fc94/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
		<script src="<?PHP ECHO webUrl ?>cassette.axd/script/b0be42406b7f681a501d5845ce4b05be0b9f6bd8/Scripts/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?PHP ECHO webUrl ?>cassette.axd/script/644c0a4d39f177fc72b496eb30db16e109e1c2f5/Scripts/jquery.validate.unobtrusive.min.js" type="text/javascript"></script>
   <div id="page_header" class="uh_grey_with_glare bottom-shadow" style="height:10px;min-height:10px" >
			<div class=" bgback"></div>


<div class="zn_header_bottom_style"></div>
		</div>
    <section id="content">
    <div class="container">

        <div id="mainbody zn_has_sidebar">




            <div class="row">
  <div class="row">
    <div class="span6"><h1 class="page-title">Member Registration </h1>  </div><div class="span6"><h3 class="page-title">Lifetime Membership Fees : 3500/- Only  </h3></div>
  </div>
   <div class="row">   
<div class="grid-body no-border">
    <div id="fc">
<form action="Members/Members-Edit?id=<?= $MembersId ?>" class="form-no-horizontal-spacing" data-ajax="true" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-update="#EditMem > #modal-body" id="form0" method="post">    <div class="row-fluid column-seperation">
  <div class="span12">
				
                  
                   <div class="row-fluid">
                      <div class="span4">
                      <label for="Firm_Name">Firm Name</label>
                      <input data-val="true" data-val-number="The field MembersId must be a number." data-val-required="The MembersId field is required." id="MembersId" name="MembersId" type="hidden" value="<?= $MembersId ?>" />
                        <input class="span12" data-val="true" data-val-required="Firm Name is required." id="FirmName" name="FirmName" placeholder="Firm Name*" type="text" value="<?= $FirmName ?>" required />
                        <span class="field-validation-valid error" data-valmsg-for="FirmName" data-valmsg-replace="true"></span>
                      </div>
					   <div class="span4" id="grp">
                      <label for="Group">TYPE OF BUSSINESS</label>
                        <select class="span12" id="GroupsId" name="GroupsId" placeholder="" required>
							<option value="">Select Group</option>
							<?php foreach($groups as $group){ ?>
							<option value="<?= $group['GroupsId'] ?>" <?php if($group['GroupsId']==$GroupsId) echo 'selected="selected"' ?>><?= $group['GroupName'] ?></option>
							<?php } ?>
						</select>
                        <span class="field-validation-valid error" data-valmsg-for="GroupsId" data-valmsg-replace="true"></span>
                      </div>
                      <div class="span3">
                      <input type="hidden" id="MemberType" name="MemberType" value=""/>
					   <input type="hidden" id="FY" name="FY" value=""/>
					  
					   <input type="hidden" id="SubGroupId" name="SubGroupId" value=""/>
					   <input type="hidden" id="SGId" name="SubGroupId" value=""/>
					   <input type="hidden" id="RegistrationNoOld" name="RegistrationNoOld" value=""/>
					   <input type="hidden" id="MobileRep1Alternate" name="MobileRep1Alternate" value=""/>
					   <input type="hidden" id="MobileRep2Alternate" name="MobileRep2Alternate" value=""/>
						</div>
				</div>
                
                 <div class="row-fluid">
                      <div class="span4" id="dist">
                      <label for="District">District</label>
                        <select class="span12" id="DistrictId" name="DistrictId" placeholder="" required><option value="">Select Dist</option>
							<?php foreach($loadDistrict as $group){ ?>
							<option value="<?= $group['id'] ?>" <?php if($group['id']==$DistrictId) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
							<?php } ?>						
						</select>
                        <span class="field-validation-valid error" data-valmsg-for="DistrictId" data-valmsg-replace="true"></span>
                      </div>
              
                      <div class="span4" id="city">
                      <label for="City">City</label>
                        <select class="span12" id="CityId" name="CityId" onchange="citychange()" placeholder="" required><option value="">Select City</option>
							<?php foreach($loadCity as $group){ ?>
							<option value="<?= $group['id'] ?>" <?php if($group['id']==$CityId) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
							<?php } ?>	
						</select>
                        <span class="field-validation-valid error" data-valmsg-for="CityId" data-valmsg-replace="true"></span>
                      </div>
                       
                       <div class="span4" id="area">
                      <label for="Area">Area</label>
                        <select class="span12" id="AreaId" name="AreaId" placeholder="" required><option value="">Select Area</option>
							<?php foreach($loadArea as $group){ ?>
							<option value="<?= $group['id'] ?>" <?php if($group['id']==$AreaId) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
							<?php } ?>	
						</select>
                        <span class="field-validation-valid error" data-valmsg-for="AreaId" data-valmsg-replace="true"></span>
                      </div>
                       
                </div>
                  <div class="row-fluid">
                      <!--div class="span3">
                      <label for="Address">Address</label>
                        <input class="span12" id="SubGroupName" name="SubGroupName" placeholder="" type="text" value="<?= $SubGroupName ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="SubGroupName" data-valmsg-replace="true"></span>
                      </div-->
                      <div class="span3">
                      <label for="Shop">Shop & Floor No.</label>
                        <input class="span12" id="Shop" name="Shop" placeholder="" type="text" value="<?= $Shop ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="Shop" data-valmsg-replace="true"></span>
                      </div>
               
                      <div class="span3">
                      <label for="Complex">Complex /Landmark</label>
                        <input class="span12" id="Complex" name="Complex" placeholder="" type="text" value="<?= $Complex ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="Complex" data-valmsg-replace="true"></span>
                      </div>
                       <div class="span2">
                      <label for="Street">Street</label>
                        <input class="span12" id="Street" name="Street" placeholder="" type="text" value="<?= $Street	 ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="Street" data-valmsg-replace="true"></span>
                      </div>
                        <div class="span2">
                      <label for="Street">Sector or Mohalla</label>
                        <input class="span12" id="SectorMohalla" name="SectorMohalla" placeholder="" type="text" value="<?= $SectorMohalla	 ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="SectorMohalla" data-valmsg-replace="true"></span>
                      </div>
                        <div class="span2">
                      <label for="Pin">PIN CODE NO.</label>
                        <input class="span12" id="PIN" name="PIN" placeholder="" type="text" value="<?= $PIN ?>" required />
                        <span class="field-validation-valid error" data-valmsg-for="PIN" data-valmsg-replace="true"></span>
                      </div>
                </div>
				
                  <div class="row-fluid"><hr/></div>
                  <div class="row-fluid">
                      <div class="span3">
                      <label for="STD_-_Code">STD - Code</label>
                        <input class="span12" id="STDCode" name="STDCode" placeholder="" type="text" value="<?= $STDCode ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="STDCode" data-valmsg-replace="true"></span>
                      </div>
               
                      <div class="span3">
                      <label for="Landline">Landline</label>
                        <input class="span12" id="Landline" name="Landline" placeholder="" type="text" value="<?= $Landline ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="Landline" data-valmsg-replace="true"></span>
                      </div>
                       <div class="span3">
                      <label for="Mobile">Mobile</label>
                        <input class="span12" id="Mobile" name="Mobile" placeholder="" type="text" value="<?= $Mobile ?>" title="Error Message" pattern="[1-9]{1}[0-9]{9}"/>
                        <span class="field-validation-valid error" data-valmsg-for="Mobile" data-valmsg-replace="true"></span>
                      </div>
                        <div class="span3">
                      <label for="Email">Email</label>
                        <input class="span12" id="Email" name="Email" placeholder="" type="text" value="<?= $Email ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="Email" data-valmsg-replace="true"></span>
                      </div>
                </div>
                
                 <div class="row-fluid">
                      <div class="span4">
                      <label for="GSTN">GSTN</label>
                        <input class="span12" id="GSTN" name="GSTN" placeholder="" type="text" value="<?= $TINNo ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="GSTN" data-valmsg-replace="true"></span> 
                      </div>
               
                        <div class="span4">  
                       
						  <label for="Upload_file">Upload file(Gumasta/ GST certificate)</label>
							<iframe src="<?PHP ECHO webUrl ?>Web_Image_Upload2.php?File=1&amp;id=MemDoc&amp;type=1&amp;size=150" width="500px" height="50px"  frameborder="0" scrolling=no >

							</iframe>
					  </div> 
                </div>
                <div class="row-fluid"><hr/></div>
                   
                 <h4>Representative 1</h4>
                 <div class="row-fluid">
                      <div class="span1">
                      <label for="Salutation">Salutation</label>
                        <select class="span12" id="SalutationRep1" name="SalutationRep1" placeholder="">
						<option <?php if($SalutationRep1=="Mr.") echo 'selected="selected"' ?> value="Mr.">Mr.</option>
						<option <?php if($SalutationRep1=="Mrs.") echo 'selected="selected"' ?> value="Mrs.">Mrs.</option>
						<option <?php if($SalutationRep1=="Miss") echo 'selected="selected"' ?> value="Miss">Miss</option>
						</select>
                        <span class="field-validation-valid error" data-valmsg-for="SalutationRep1" data-valmsg-replace="true"></span>
                      </div>
               
                      <div class="span3">
                      <label for="Name">Name</label>
                        <input required  class="span12" data-val="true" data-val-required="Representative1 Name is required." id="Representative1" name="Representative1" placeholder="" type="text" value="<?= $Representative1 ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="Representative1" data-valmsg-replace="true"></span>
                      </div>
                         <div class="span3">
                      <label for="Mobile">Mobile</label>
                        <input required class="span12" id="MobileRep1" name="MobileRep1" placeholder="" type="text" value="<?= $MobileRep1 ?>"  title="Error Message" pattern="[1-9]{1}[0-9]{9}"/>
                        <span class="field-validation-valid error" data-valmsg-for="MobileRep1" data-valmsg-replace="true"></span>
                      </div>
					   <div class="span3">
                      <label for="Email">Email</label>
                        <input class="span12" id="EmailRep1" name="EmailRep1" placeholder="" type="text" value="<?= $EmailRep1 ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="EmailRep1" data-valmsg-replace="true"></span>
                      </div>
                        <div class="span6">
                      <label for="Upload_file">Upload file</label>
                        <iframe src="<?PHP ECHO webUrl ?>Web_Image_Upload2.php?File=1&amp;id=ImageRep1&amp;size=150" width="500px" height="50px"  frameborder="0" scrolling=no ></iframe>
                    
                      </div>
                </div>
                <div class="row-fluid"><hr/></div>
             <h4>Representative 2</h4>
                 <div class="row-fluid">
                      <div class="span1">
                      <label for="Salutation">Salutation</label>
                        <select class="span12" id="SalutationRep2" name="SalutationRep2" placeholder="">
						<option <?php if($SalutationRep2=="Mr.") echo 'selected="selected"' ?> value="Mr.">Mr.</option>
						<option <?php if($SalutationRep2=="Mrs.") echo 'selected="selected"' ?> value="Mrs.">Mrs.</option>
						<option <?php if($SalutationRep2=="Miss") echo 'selected="selected"' ?> value="Miss">Miss</option>
						</select>
                        <span class="field-validation-valid error" data-valmsg-for="SalutationRep2" data-valmsg-replace="true"></span>
                      </div>
               
                      <div class="span3">
                      <label for="Name">Name</label>
                        <input class="span12" id="Representative2" name="Representative2" placeholder="Name" type="text" value="<?= $Representative2 ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="Representative2" data-valmsg-replace="true"></span>
                      </div>
                         <div class="span3">
                      <label for="Mobile">Mobile</label>
                        <input class="span12" id="MobileRep2" name="MobileRep2" placeholder="Mobile" type="text" value="<?= $MobileRep2 ?>"  title="Error Message" pattern="[1-9]{1}[0-9]{9}"/>
                        <span class="field-validation-valid error" data-valmsg-for="MobileRep2" data-valmsg-replace="true"></span>
                      </div>
					  <div class="span3">
                      <label for="Email">Email</label>
                        <input class="span12" id="EmailRep2" name="EmailRep2" placeholder="Email" type="text" value="<?= $EmailRep2 ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="EmailRep2" data-valmsg-replace="true"></span>
                      </div>
					  <div class="span6">
                      <label for="Upload_file">Upload file</label>
                        <iframe src="<?PHP ECHO webUrl ?>Web_Image_Upload2.php?File=1&amp;id=ImageRep2&amp;size=150" width="500px" height="50px"  frameborder="0" scrolling=no ></iframe>
                    
                      </div>
                      
                </div>
				<div class="row-fluid"><hr/></div>
				<div class="row-fluid">
					<div class="checkbox check-success 	">
                      
                       <input id="tns" required type="checkbox" name="tns"></input>
                    
                      <label for="Approved">I hereby declare above information is true.<br/>
I agree with <a href="tnc/CCCI Policy.pdf" target="_blank" style="color:red">terms and conditions</a> related members.</label>
                    </div>
                </div>

     <script type="text/javascript">
         $(document).ready(function () {
             $("#fc > form").removeData("validator");
             $("#fc > form").removeData("unobtrusiveValidation");
             $.validator.unobtrusive.parse("#fc > form");
         });
  </script>
      
        <script>        
           function phoneno(_id){          
            $('#'+_id).keypress(function(e) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
        }
       </script>
				<div class="form-actions">
					<div class="pull-left">
					
					</div>
					<div class="pull-right">
					  <button class="btn btn-danger btn-cons" type="submit"><i class="icon-ok"></i> Proceed </button>
					
					</div>
				  </div>  </div>
		</div>		  
</form>    </div>
    </div>

                
            </div><!-- end row -->
        </div><!-- end mainbody -->

    </div><!-- end container -->

</section>
<script language="javascript" type="text/javascript">
  function resizeIframe() {
    //obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
document.getElementById('Mem').style.height = 100 + document.getElementById('Mem').contentWindow.document.body.scrollHeight + 'px';
//alert(document.getElementById('Mem').style.height);
  }
</script>