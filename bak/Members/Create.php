<?php
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "../admin/lib" . DIRECTORY_SEPARATOR . "config.php";
$_ADMIN = false;
error_reporting(E_ALL); ini_set('display_errors', 1);
$UserTypeId = 0;
$MembersId = 0;

if(isset($_SESSION['user'])){
	$_ADMIN = is_array($_SESSION['user']);
	$UserTypeId = $_SESSION['user']['UserTypeId'];
}
if(!$_ADMIN){
	echo "Invalid loggin";
	die;
}

if(isset($_REQUEST['id'])){
	$MembersId = $_REQUEST['id'];//18
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




    <div class="span12">
        <div class="grid simple">
        <div class="grid-body no-border">
    <div id="fc">
<form action="Members/Members-Edit?id=<?= $MembersId ?>" class="form-no-horizontal-spacing" data-ajax="true" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-update="#EditMem > #modal-body" id="form0" method="post">    <div class="row-fluid column-seperation">
  <div class="span12">
				
                  <h4><?php if($MembersId>0) echo "Edit"; else echo "New"; ?> Members</h4>
                   <div class="row-fluid">
                      <div class="span4">
                      <label for="Firm_Name">Firm Name</label>
                      <input data-val="true" data-val-number="The field MembersId must be a number." data-val-required="The MembersId field is required." id="MembersId" name="MembersId" type="hidden" value="<?= $MembersId ?>" />
                        <input class="span12" data-val="true" data-val-required="Firm Name is required." id="FirmName" name="FirmName" placeholder="Firm Name*" type="text" value="<?= $FirmName ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="FirmName" data-valmsg-replace="true"></span>
                      </div>
               
                      <div class="span3">
                      <label for="Member_Type">Member Type</label>
                        <select class="span12" id="MemberType" name="MemberType" placeholder="Orders*" required><option <?php if($MemberType=="") echo 'selected="selected"' ?> value="">Select Mem Type</option>
						<option <?php if($MemberType=="LT") echo 'selected="selected"' ?> value="LT">Life Time</option>
						<option <?php if($MemberType=="GM") echo 'selected="selected"' ?> value="GM">General Member</option>
						</select>
                        <span class="field-validation-valid error" data-valmsg-for="MemberType" data-valmsg-replace="true"></span>
						
                      </div>
					  <div class="span3" id="FY" style="display:<?php if($MemberType=="GM") echo 'block'; else echo 'none'; ?>">
					  
						  <label for="Sub_Group">FY<?=$FY?></label>
						   <select class="span12 multi FY" id="FY" multiple="multiple" name="FY[]" placeholder="FY*" style="display:none">
								<?php 
								$FYArr=array('2019-20','2020-21','2021-22','2022-23','2023-24','2025-26','2026-27','2027-28','2028-29','2029-30');
								foreach($FYArr as $group){ ?>
								<option value="<?= $group ?>" <?php if(in_array($group, explode(',',$FY))) echo 'selected="selected"' ?>><?= $group ?></option>
								<?php } ?>
						   </select>

						   
							<span class="field-validation-valid error" data-valmsg-for="FY" data-valmsg-replace="true"></span>
							<script type="text/javascript">
								$(".FY").select2();
							</script>	
						  </div>
                </div>
                <div class="row-fluid">
                      <div class="span4" id="grp">
                      <label for="Group">Group</label>
                        <select class="span12" id="GroupsId" name="GroupsId" placeholder="" required>
							<option value="">Select Group</option>
							<?php foreach($groups as $group){ ?>
							<option value="<?= $group['GroupsId'] ?>" <?php if($group['GroupsId']==$GroupsId) echo 'selected="selected"' ?>><?= $group['GroupName'] ?></option>
							<?php } ?>
						</select>
                        <span class="field-validation-valid error" data-valmsg-for="GroupsId" data-valmsg-replace="true"></span>
                      </div>
                      <div class="span4" id="grp">
                      <label for="SubGroupId">Sub Group</label>
                        <select class="span12" id="SubGroupId" name="SubGroupId" placeholder="">
							<option value="0">Select SubGroup</option>
							<?php foreach($subGroups as $group){ ?>
							<option value="<?= $group['id'] ?>" <?php if($group['id']==$SubGroupId) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
							<?php } ?>
						</select>
                        <span class="field-validation-valid error" data-valmsg-for="GroupsId" data-valmsg-replace="true"></span>
                      </div>
               <div class="span2">&nbsp;<br />
             
 <!--a class="btn btn-danger btn-mini"   data-ajax="true" data-ajax-begin="makedpt('AddGroup')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('AddGroup')" data-ajax-update="#AddGroup > #modal-body" href="Members/Groups-Create?popup=1&eid=AddGroup&fname=LoadGroup">Add</a-->

               </div>
                    <div class="span4" id="sgrp" style="display:none">
                     <label for="Sub_Group">Sub Group</label>
                       <select class="span12 multi SGId" id="SGId" multiple="multiple" name="SGId[]" placeholder="SubGroups*">
							<?php foreach($subGroups as $group){ ?>
							<option value="<?= $group['id'] ?>" <?php if($group['id']==$SubGroupId) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
							<?php } ?>
					</select>

                       
                        <span class="field-validation-valid error" data-valmsg-for="SGId" data-valmsg-replace="true"></span>
                        <script type="text/javascript">
                            $(".SGId").select2();
                        </script>	
                      </div>
                      <div class="span2">&nbsp;<br />
                 <!--a class="btn btn-danger btn-mini" id="sgrplink"    data-ajax="true" data-ajax-begin="makedpt('AddSubGroup')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('AddSubGroup')" data-ajax-update="#AddSubGroup > #modal-body" href="Members/SubGroup-Create?popup=1&eid=AddSubGroup&fname=LoadSubGroup&GroupsId=27">Add</a-->

               </div>
                </div>
                 <div class="row-fluid">
                      <div class="span3" id="dist">
                      <label for="District">District</label>
                        <select class="span12" id="DistrictId" name="DistrictId" placeholder="" required><option value="">Select Dist</option>
							<?php foreach($loadDistrict as $group){ ?>
							<option value="<?= $group['id'] ?>" <?php if($group['id']==$DistrictId) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
							<?php } ?>						
						</select>
                        <span class="field-validation-valid error" data-valmsg-for="DistrictId" data-valmsg-replace="true"></span>
                      </div>
               <div class="span1">&nbsp;<br />
                 <!--a class="btn btn-danger btn-mini"   data-ajax="true" data-ajax-begin="makedpt('AddDistrict')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('AddDistrict')" data-ajax-update="#AddDistrict > #modal-body" href="Members/District-Create?popup=1&eid=AddDistrict&fname=LoadDistrict">Add</a-->

               </div>
                      <div class="span3" id="city">
                      <label for="City">City</label>
                        <select class="span12" id="CityId" name="CityId" onchange="citychange()" placeholder="" required><option value="">Select City</option>
							<?php foreach($loadCity as $group){ ?>
							<option value="<?= $group['id'] ?>" <?php if($group['id']==$CityId) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
							<?php } ?>	
						</select>
                        <span class="field-validation-valid error" data-valmsg-for="CityId" data-valmsg-replace="true"></span>
                      </div>
                       <div class="span1">&nbsp;<br />
  <!--a class="btn btn-danger btn-mini" id="citylink"    data-ajax="true" data-ajax-begin="makedpt('AddCity')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('AddCity')" data-ajax-update="#AddCity > #modal-body" href="Members/City-Create?popup=1&eid=AddCity&fname=LoadCity&DistrictId=1">Add</a-->
               </div>
                       <div class="span3" id="area">
                      <label for="Area">Area</label>
                        <select class="span12" id="AreaId" name="AreaId" placeholder="" required><option value="">Select Area</option>
							<?php foreach($loadArea as $group){ ?>
							<option value="<?= $group['id'] ?>" <?php if($group['id']==$AreaId) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
							<?php } ?>	
						</select>
                        <span class="field-validation-valid error" data-valmsg-for="AreaId" data-valmsg-replace="true"></span>
                      </div>
                       <div class="span1">&nbsp;<br />
  <!--a class="btn btn-danger btn-mini" id="arealink"    data-ajax="true" data-ajax-begin="makedpt('AddArea')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('AddArea')" data-ajax-update="#AddArea > #modal-body" href="Members/Area-Create?popup=1&eid=AddArea&fname=LoadArea&CityId=1">Add</a-->

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
               
                      <div class="span2">
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
                      <label for="Pin">PIN</label>
                        <input class="span12" id="PIN" name="PIN" placeholder="" type="text" value="<?= $PIN ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="PIN" data-valmsg-replace="true"></span>
                      </div>
                </div>
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
               
                      <!--div class="span4">
                      <label for="PAN_No">PAN No</label>
                        <input class="span12" id="PAN" name="PAN" placeholder="" type="text" value="<?= $PAN ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="PAN" data-valmsg-replace="true"></span>
                      </div-->
                       <div class="span4">
                      <label for="Old_Registration_No">Registration No</label>
                        <input class="span12" id="RegistrationNoOld" name="RegistrationNoOld" placeholder="" type="text" value="<?= $RegistrationNoOld ?>" readOnly />
                        <span class="field-validation-valid error" data-valmsg-for="RegistrationNoOld" data-valmsg-replace="true"></span>
                      </div>
                        
                </div>
                <div class="row-fluid">
                      <div class="span4">
                     <div class="checkbox check-success 	">
                      
                       <input id="Approved" type="checkbox" value="<?= $Approved ?>" name="Approved" <?php if($Approved==1)echo "checked='checked'"  ?>></input>
                    
                      <label for="Approved">Approved</label>
                    </div>
                      </div>
                       <div class="span4">


                     <div class="checkbox check-success 	">

                      
                       <input id="CertificatePrint" type="checkbox" value="<?= $CertificatePrint ?>" name="CertificatePrint" <?php if($CertificatePrint==1)echo "checked='checked'"  ?>></input>
                    
                      <label for="CertificatePrint">Certificate</label>
                    </div>
                      </div>
               
               
                      <!--div class="span4">
                      <label for="Due_Date">Due Date</label>
                        <input class="datefield span12" id="DueDate" name="DueDate" type="text" value="<?= $DueDate ?>" />
      


                        <span class="field-validation-valid error" data-valmsg-for="DueDate" data-valmsg-replace="true"></span>
                      </div-->     
                </div>
                   <div class="row-fluid">
                <div class="span4">
                       <label for="Document_Upload">Document Upload</label>
                         <input class="span12" id="MemDoc" name="MemDoc" placeholder="document" type="text" value="<?= $MemDoc ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="MemDoc" data-valmsg-replace="true"></span>
                        <?php if($MemDoc!=''){ ?>
							<a href="<?= $MemDoc ?>" target="_blank" id="MemDocimg" >
							<img src="<?= $MemDoc ?>" id="ImageRep1img" style="Width:150px"><?= $MemDoc ?></a> 
						<?php } ?>
                       </div>
                   <div class="span4">     
                        <label for="Document_Type">Document Type</label>
                         <input class="span12" id="DocTitle" name="DocTitle" placeholder="type" type="text" value="<?= $DocTitle ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="DocTitle" data-valmsg-replace="true"></span>
                        </div>
                  <div class="span4">     
                                     
                       
                      <label for="Upload_file">Upload file</label>
                        <iframe src="<?PHP ECHO webUrl ?>Web_Image_Upload2.php?File=1&amp;id=MemDoc&amp;type=1&amp;size=150" width="500px" height="50px"  frameborder="0" scrolling=no >

						</iframe>
                  </div>
                      
                       </div>
                 <h4>Representative 1</h4>
                 <div class="row-fluid">
                      <div class="span3">
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
                        <input class="span12" data-val="true" data-val-required="Representative1 Name is required." id="Representative1" name="Representative1" placeholder="" type="text" value="<?= $Representative1 ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="Representative1" data-valmsg-replace="true"></span>
                      </div>
                         <div class="span3">
                      <label for="Mobile">Mobile</label>
                        <input class="span12" id="MobileRep1" name="MobileRep1" placeholder="" type="text" value="<?= $MobileRep1 ?>"  title="Error Message" pattern="[1-9]{1}[0-9]{9}"/>
                        <span class="field-validation-valid error" data-valmsg-for="MobileRep1" data-valmsg-replace="true"></span>
                      </div>
					   <div class="span3">
                      <label for="Mobile">Alternate Mobile</label>
                        <input class="span12" id="MobileRep1Alternate" name="MobileRep1Alternate" placeholder="Alternate Mobile" type="text" value="<?= $MobileRep1Alternate ?>"  title="Error Message" pattern="[1-9]{1}[0-9]{9}"/>
                        <span class="field-validation-valid error" data-valmsg-for="MobileRep1Alternate" data-valmsg-replace="true"></span>
                      </div>
                        
                </div>
                  <div class="row-fluid">
                      <!--div class="span4">
                      <label for="DOB">DOB</label>
                        
                        
							<input class="datefield span12" id="DOBRep1" name="DOBRep1" type="text" value="<?= $DOBRep1 ?>" />



                        <span class="field-validation-valid error" data-valmsg-for="DOBRep1" data-valmsg-replace="true"></span>
                      </div-->
					  <div class="span4">
                      <label for="Email">Email</label>
                        <input class="span12" id="EmailRep1" name="EmailRep1" placeholder="" type="text" value="<?= $EmailRep1 ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="EmailRep1" data-valmsg-replace="true"></span>
                      </div>
                      <div class="span4">
                      <label for="Organization_Designation">Organization Designation</label>
                        <input class="span12" id="OrgDesignationRep1" name="OrgDesignationRep1" placeholder="" type="text" value="<?= $OrgDesignationRep1 ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="OrgDesignationRep1" data-valmsg-replace="true"></span>
                      </div>
                      <?php /*   <div class="span4">
                      
					  <label for="Blood_Group">Blood Group</label>
                        <select class="span12" id="BloodGroupRep1" name="BloodGroupRep1" placeholder=""><option <?php if($BloodGroupRep1=="") echo 'selected="selected"' ?> value="">Select B Group</option>
						<option <?php if($BloodGroupRep1=="A+") echo 'selected="selected"' ?> value="A+">A+</option>
						<option <?php if($BloodGroupRep1=="A-") echo 'selected="selected"' ?> value="A-">A-</option>
						<option <?php if($BloodGroupRep1=="B+") echo 'selected="selected"' ?> value="B+">B+</option>
						<option <?php if($BloodGroupRep1=="B-") echo 'selected="selected"' ?> value="B-">B-</option>
						<option <?php if($BloodGroupRep1=="AB+") echo 'selected="selected"' ?> value="AB+">AB+</option>
						<option <?php if($BloodGroupRep1=="AB-") echo 'selected="selected"' ?> value="AB-">AB-</option>
						<option <?php if($BloodGroupRep1=="O+") echo 'selected="selected"' ?> value="O+">O+</option>
						<option <?php if($BloodGroupRep1=="O-") echo 'selected="selected"' ?> value="O-">O-</option>
						</select>
                        <span class="field-validation-valid error" data-valmsg-for="BloodGroupRep1" data-valmsg-replace="true"></span>
                      </div>
                      */ 
					  ?>
					  <!--input type="hidden" id="BloodGroupRep1" name="BloodGroupRep1" placeholder="" value="<?= $BloodGroupRep1 ?>"-->
                </div>

                   <div class="row-fluid">
                      <div class="span3">
                      <label for="Governing_Body">Governing Body</label>
                        <select class="span12" id="GoverningBodyIdRep1" name="GoverningBodyIdRep1" placeholder="">
						<option value="0">Select GBody/Comm</option>
							<?php foreach($getGB as $group){ ?>
							<option value="<?= $group['id'] ?>" <?php if($group['id']==$GoverningBodyIdRep1) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
							<?php } ?>
						</select>
                        <span class="field-validation-valid error" data-valmsg-for="GoverningBodyIdRep1" data-valmsg-replace="true"></span>
                      </div>
               
                       <div class="span3">
                      <label for="Designation">Designation</label>
                        <select class="span12" id="GBDesignationIdRep1" name="GBDesignationIdRep1" placeholder="">
						<option value="0">Select Designation</option>
							<?php foreach($getDesignation as $group){ ?>
							<option value="<?= $group['id'] ?>" <?php if($group['id']==$GBDesignationIdRep1) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
							<?php } ?>
						</select>
                        <span class="field-validation-valid error" data-valmsg-for="GBDesignationIdRep1" data-valmsg-replace="true"></span>
                      </div>
               
                      <div class="span3">
                      <label for="Committee">Committee</label>
                        <select class="span12" id="CommitteeIDRep1" name="CommitteeIDRep1" placeholder=""><option selected="selected" value="0">Select GBody/Comm</option>
							<?php foreach($getGBCommittee as $group){ ?>
							<option value="<?= $group['id'] ?>" <?php if($group['id']==$CommitteeIDRep1) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
							<?php } ?>
							</select>
                        <span class="field-validation-valid error" data-valmsg-for="CommitteeIDRep1" data-valmsg-replace="true"></span>
                      </div>
                       <div class="span3">
                      <label for="Designation">Designation</label>
                        <select class="span12" id="CdesignationIdRep1" name="CdesignationIdRep1" placeholder=""><option selected="selected" value="0">Select Designation</option>
							<?php foreach($getDesignation as $group){ ?>
							<option value="<?= $group['id'] ?>" <?php if($group['id']==$CdesignationIdRep1) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
							<?php } ?>
						</select>
                        <span class="field-validation-valid error" data-valmsg-for="CdesignationIdRep1" data-valmsg-replace="true"></span>
                      </div>
                    
                </div>
                
                   <div class="row-fluid">
                      <!--div class="span4">
                      <label for="SMS_Group">SMS Group</label>
                       <select class="span12 multi SGRep1" id="SGRep1" multiple="multiple" name="SGRep1" placeholder="SMS Groups*">
							<option <?php //if(18==$SGRep1) echo 'selected="selected"' ?> value="18">CORE COMMITTEE</option>
					   </select>

                       
                        <span class="field-validation-valid error" data-valmsg-for="SGRep1" data-valmsg-replace="true"></span>
                        <script type="text/javascript">
                            $(".SGRep1").select2();
                        </script>
                      </div-->
               
                     <div class="span4">
                       <label for="Photograph">Photograph</label>
                         <input class="span12" id="ImageRep1" name="ImageRep1" placeholder="Image*" type="text" value="<?= $ImageRep1 ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="ImageRep1" data-valmsg-replace="true"></span>
                        <?php if($ImageRep1){ ?>
							<img src="<?= $ImageRep1 ?>" id="ImageRep1img" style="Width:150px" /> 
						<?php } ?>
                        </div>
                       <div class="span4">
                      <label for="Upload_file">Upload file</label>
                        <iframe src="<?PHP ECHO webUrl ?>Web_Image_Upload2.php?File=1&amp;id=ImageRep1&amp;size=150" width="500px" height="50px"  frameborder="0" scrolling=no ></iframe>
                    
                      </div>
                       
                </div>
                <div class="row-fluid"  style="<?php if($MembersId==0) echo 'display:none;'  ?>">
                <div class="span6">
                                         <button class="btn btn-danger btn-mini" type="button" onclick="SendCardPrintSingle('1_<?= $MembersId ?>')">
                                            <i class="icon-ok"></i>Card Print</button>
                                    </div>
                                    <div class="span6">
                     <div class="checkbox check-success" >
                      
                       <input id="CardPrintRep1" type="checkbox" value="<?= $CardPrintRep1 ?>" name="CardPrintRep1" checked='checked'></input>
                    
                      <label for="CardPrintRep1">Card Print</label>
                    </div>
                      </div>
                </div>

             <h4>Representative 2</h4>
                 <div class="row-fluid">
                      <div class="span3">
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
                      <label for="Mobile">Alternate Mobile</label>
                        <input class="span12" id="MobileRep2Alternate" name="MobileRep2Alternate" placeholder="Alternate Mobile" type="text" value="<?= $MobileRep2Alternate ?>"  title="Error Message" pattern="[1-9]{1}[0-9]{9}"/>
                        <span class="field-validation-valid error" data-valmsg-for="MobileRep2Alternate" data-valmsg-replace="true"></span>
                      </div>
                      
                </div>
                  <div class="row-fluid">
                      <!--div class="span4">
                      <label for="DOB">DOB</label>
                        
        <input class="datefield span12" id="DOBRep2" name="DOBRep2" type="text" value="<?= $DOBRep2 ?>" />



                        <span class="field-validation-valid error" data-valmsg-for="SalutationRep1" data-valmsg-replace="true"></span>
                      </div-->
					<div class="span4">
                      <label for="Email">Email</label>
                        <input class="span12" id="EmailRep2" name="EmailRep2" placeholder="Email" type="text" value="<?= $EmailRep2 ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="EmailRep2" data-valmsg-replace="true"></span>
                      </div>
                      <div class="span4">
                      <label for="Organization_Designation">Organization Designation</label>
                        <input class="span12" id="OrgDesignationRep2" name="OrgDesignationRep2" placeholder="Organization Designation" type="text" value="<?= $OrgDesignationRep2 ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="OrgDesignationRep2" data-valmsg-replace="true"></span>
                      </div><?php /*
                         <div class="span4">
                      <label for="Blood_Group">Blood Group</label>
                        <select class="span12" id="BloodGroupRep2" name="BloodGroupRep2" placeholder=""><option selected="selected" value="">Select B Group</option>
						<option <?php if($BloodGroupRep2=="A+") echo 'selected="selected"' ?> value="A+">A+</option>
						<option <?php if($BloodGroupRep2=="A-") echo 'selected="selected"' ?> value="A-">A-</option>
						<option <?php if($BloodGroupRep2=="B+") echo 'selected="selected"' ?> value="B+">B+</option>
						<option <?php if($BloodGroupRep2=="B-") echo 'selected="selected"' ?> value="B-">B-</option>
						<option <?php if($BloodGroupRep2=="AB+") echo 'selected="selected"' ?> value="AB+">AB+</option>
						<option <?php if($BloodGroupRep2=="AB-") echo 'selected="selected"' ?> value="AB-">AB-</option>
						<option <?php if($BloodGroupRep2=="O+") echo 'selected="selected"' ?> value="O+">O+</option>
						<option <?php if($BloodGroupRep2=="O-") echo 'selected="selected"' ?> value="O-">O-</option>
						</select>
                        <span class="field-validation-valid error" data-valmsg-for="BloodGroupRep2" data-valmsg-replace="true"></span>
                      </div> */ ?>
					  <!--input type="hidden" id="BloodGroupRep2" name="BloodGroupRep2" placeholder="" value="<?= $BloodGroupRep2 ?>"-->
                    
                </div>

                   <div class="row-fluid">
                      <div class="span3">
                      <label for="Governing_Body">Governing Body</label>
                        <select class="span12" id="GoverningBodyIdRep2" name="GoverningBodyIdRep2" placeholder=""><option selected="selected" value="0">Select GBody/Comm</option>
						<?php foreach($getGB as $group){ ?>
							<option value="<?= $group['id'] ?>" <?php if($group['id']==$GoverningBodyIdRep2) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
							<?php } ?>
						</select>
                        <span class="field-validation-valid error" data-valmsg-for="GoverningBodyIdRep2" data-valmsg-replace="true"></span>
                      </div>
               
                       <div class="span3">
                      <label for="Designation">Designation</label>
                        <select class="span12" id="GBDesignationIdRep2" name="GBDesignationIdRep2" placeholder=""><option selected="selected" value="0">Select Designation</option>
						<?php foreach($getDesignation as $group){ ?>
							<option value="<?= $group['id'] ?>" <?php if($group['id']==$GBDesignationIdRep2) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
							<?php } ?>
						</select>
                        <span class="field-validation-valid error" data-valmsg-for="GBDesignationIdRep2" data-valmsg-replace="true"></span>
                      </div>
               
                      <div class="span3">
                      <label for="Committee">Committee</label>
                        <select class="span12" id="CommitteeIDRep2" name="CommitteeIDRep2" placeholder=""><option selected="selected" value="0">Select GBody/Comm</option>
							<?php foreach($getGBCommittee as $group){ ?>
							<option value="<?= $group['id'] ?>" <?php if($group['id']==$CommitteeIDRep2) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
							<?php } ?>
						</select>
                        <span class="field-validation-valid error" data-valmsg-for="CommitteeIDRep2" data-valmsg-replace="true"></span>
                      </div>
                       <div class="span3">
                      <label for="Designation">Designation</label>
                        <select class="span12" id="CdesignationIdRep2" name="CdesignationIdRep2" placeholder=""><option selected="selected" value="0">Select Designation</option>
						<?php foreach($getDesignation as $group){ ?>
							<option value="<?= $group['id'] ?>" <?php if($group['id']==$CdesignationIdRep2) echo 'selected="selected"' ?>><?= $group['name'] ?></option>
							<?php } ?>
						</select>
                        <span class="field-validation-valid error" data-valmsg-for="CdesignationIdRep2" data-valmsg-replace="true"></span>
                      </div>
                    
                </div>
                
                   <div class="row-fluid">
                      <!--div class="span4">
                      <label for="SMS_Group">SMS Group</label>
                       <select class="span12 multi SGRep2" id="SGRep2" multiple="multiple" name="SGRep2" placeholder="SMS Groups*"><option value="18" <?php //if(18==$SGRep2) echo 'selected="selected"' ?>>CORE COMMITTEE</option>
</select>

                       
                        <span class="field-validation-valid error" data-valmsg-for="SGRep2" data-valmsg-replace="true"></span>
                        <script type="text/javascript">
                            $(".SGRep2").select2();
                        </script>
                      </div-->
               
                       <div class="span4">
                       <label for="Photograph">Photograph</label>
                         <input class="span12" id="ImageRep2" name="ImageRep2" placeholder="Image*" type="text" value="<?= $ImageRep2 ?>" />
                        <span class="field-validation-valid error" data-valmsg-for="ImageRep2" data-valmsg-replace="true"></span>
                        <?php if($ImageRep2){ ?>
							<img src="<?= $ImageRep2 ?>" id="ImageRep2img" style="Width:150px" /> 
						<?php } ?>
                      </div>
                       <div class="span4">
                      <label for="Upload_file">Upload file</label>
                        <iframe src="<?PHP ECHO webUrl ?>Web_Image_Upload2.php?File=1&amp;id=ImageRep2&amp;size=150" width="500px" height="50px"  frameborder="0" scrolling=no ></iframe>
                    
                      </div>
                      
                </div>
                 <div class="row-fluid" style="<?php if($MembersId==0) echo 'display:none;'  ?>">
               <div class="span6">
                                         <button class="btn btn-danger btn-mini" type="button" onclick="SendCardPrintSingle('2_<?PHP ECHO $MembersId ?>')">
                                            <i class="icon-ok"></i>Card Print</button>
                                    </div>
                                     <div class="span6">
                     <div class="checkbox check-success" style="<?php if($MembersId==0) echo 'display:none;'  ?>">
                      
                       <input id="CardPrintRep2" type="checkbox" value="<?PHP ECHO $CardPrintRep2 ?>" name="CardPrintRep2" ></input>
                    
                      <label for="CardPrintRep2">Card Print</label>
                    </div>
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
					  <button class="btn btn-danger btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
					
					</div>
				  </div>  </div>
		</div>		  
</form>    </div>
    </div>
  </div>
 </div>
    </div>
 