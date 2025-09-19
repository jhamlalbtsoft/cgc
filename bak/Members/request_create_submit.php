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

if(isset($_REQUEST['MembersId'])){
	$MembersId = $_REQUEST['MembersId'];//18
}else{
	echo "Invalid user";
	die;
}

require PATH_LIB . "lib-members.php";
$memLib = new Members();

//$memData = $memLib->getAll($searchType=0, $filter);
$lastInsertId = $memLib->sendRequest($_REQUEST);
$memData = $memLib->get($MembersId);
if($memData==false)
{
	echo "Invalid request";
	die;
}	
//echo $memData['MembersId'];
?>


<style type="text/css">
    label
    {
       font-weight :bold  
    }


</style>

<script>
    function Approve(id) {
        $("#masterload").show();
        //alert($("#CityId").val());

        $.ajax({
            url: "Request/Approve?id=" + id + "&Status=" + $("#Approved").is(":checked"),
            type: "GET",
            data: "",

            success: function (data) {
                //alert("hi");

                //$(".cpy").remove();
                $("#Appmsg").html(data);
                $("#masterload").hide();
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

    function Update(id) {
        $("#masterload").show();
        //alert($("#CityId").val());

        $.ajax({
            url: "Request/Update?id=" + id + "&Status=" + $("#Updated").is(":checked"),
            type: "GET",
            data: "",

            success: function (data) {
                //alert("hi");

                //$(".cpy").remove();
                $("#Upmsg").html(data);
                $("#masterload").hide();
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
</script>
<div class="row-fluid">
    <div class="span12">
        <div class="grid simple">
            <div class="grid-body no-border">
			<div class="row-fluid">
				<div class="span12">

					आप यदि व्यूह (View) में फिड डाटा (Feed Data) में यदि कोई परिवर्तन चाहते है तो कृपया उस काॅलम को भरकर सेव (Save) करें । उसके पश्चात् उसका प्रिंट (Print) निकालकर अपने प्रतिष्ठान की शील (Seal) लगाकर एवं हस्ताक्षर कर चेम्बर में भेजने की कृपा करें।
					<br>
					<br> पत्र प्राप्त होने के 72 घंटे के अन्दर आपका नया डाटा अपडेट (Data Update) हो जायेगा।
					<br>
					<br>

					<b>नोट:-</b> यदि फोटो भी चेन्ज (Change) या अपलोड (Upload) करना (फोटो नहीं होने की दषा में) हो तो एक प्रति भेजने की कृपा करें।
					<br>
					<br>
					<br>
				</div>
			</div>
            <div class="print"><div class="printButton noprint"><input value="Print" onclick="printnew(this)" class="btn btn-danger btn-mini " type="Button"></div>
                <div id="fc">
                   <div class="row-fluid column-seperation">
                            <div class="span12">
                            <img src="./wp-content/v1.jpg" style="width:200px" />
                                <h4>
                                    Request Details</h4>
                        <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Request_No:">Request No:</label>
                                    </div>
                                    <div class="span9">
                                        <?= $lastInsertId ?> 
                                    </div>
                                    </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Firm_Name">Firm Name</label>
                                    </div>
                                    <div class="span9">
                                        <?= $memData['FirmName'] ?> 
                                    </div>
                                    </div> 

                                  <div class="row-fluid">
                                    <div class="span3">
                                       <label for="Registration_No">Registration No</label>
                                    </div>
                                    <div class="span9">
                                       <?= $memData['RegistrationNo'] ?> 
                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="span3">
                                       <label for="Name">Name</label>
                                    </div>
                                    <div class="span9">
                                       <?= $_REQUEST['Name'] ?>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                       <label for="Phone">Phone</label>
                                    </div>
                                    <div class="span9">
                                        <?= $_REQUEST['ContactNumber'] ?>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                       <label for="Email">Email</label>
                                    </div>
                                    <div class="span9">
                                        <?= $_REQUEST['EmailId'] ?>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                      <label for="Request_Date">Request Date</label> 
                                    </div>
                                    <div class="span9">
                                     <?= date("Y-m-d") ?> 
                                    </div>
                                </div>
                               

                                
                                
                                  <div class="row-fluid">
                                    <div class="span6">
                                        <label for="Request_Text"><?= $_REQUEST['FirmName'] ?> </label>
                                   

                                    </div>
                                </div>
                           
                                
                            
                                
                                
                            </div>
                        </div>		  
                   
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
