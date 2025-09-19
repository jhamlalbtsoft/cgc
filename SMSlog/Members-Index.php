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

if(isset($_REQUEST['SMSGroup'])){
	$SMSGroup = $_REQUEST['SMSGroup'];//18
}else{
	echo "Invalid SMSGroup";
	die;
}

if(isset($_REQUEST['SMSText'])){
	$SMSText = htmlspecialchars($_REQUEST['SMSText']);//18
}else{
	echo "Invalid SMSText";
	die;
}

require PATH_LIB . "lib-members.php";
$memLib = new Members();

//$memData = $memLib->getAll($searchType=0, $filter);
$memData = $memLib->sendSMS($SMSGroup, $SMSText);

if(isset($_REQUEST['SMSGroup'])){
	?>
	 <div class="row-fluid">
                                            <div class="span12">
                                                <div class="grid simple">
                                                    <div class="grid-body no-border">
                                                        <div id="fc">
                                                            <form action="SMSlog/Members-Index?inline=1" class="form-no-horizontal-spacing" data-ajax="true" data-ajax-mode="replace" data-ajax-update="#listSMS" id="form4" method="post">
                                                                <div class="row-fluid column-seperation">
                                                                    <div class="span8">
                                                                        <h4>
                                    Send SMS</h4>
                                                                        <div class="row-fluid">

                                                                            <div class="span9">
                                                                                <input id="SMSGroup" name="SMSGroup" type="hidden" value="" />

                                                                            </div>

                                                                        </div>

                                                                        <div class="row-fluid">
                                                                            <div class="span3">
                                                                                <label for="Message">Message</label>
                                                                            </div>
                                                                            <div class="span9">
                                                                                <textarea class="span12" cols="20" id="SMSText" name="SMSText" placeholder="Message*" rows="2"></textarea>
                                                                                <span class="field-validation-valid error" data-valmsg-for="SMSText" data-valmsg-replace="true"></span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row-fluid">

                                                                        </div>
                                                                        <div class="pull-right">
                                                                            <button class="btn btn-danger btn-cons" type="submit">
                                                                                <i class="icon-ok"></i>Send</button>
                                                                        </div>
                                                                    </div>
                                                                    <script type="text/javascript">
                                                                        $(document).ready(function() {
                                                                            $("#fc > form").removeData("validator");
                                                                            $("#fc > form").removeData("unobtrusiveValidation");
                                                                            $.validator.unobtrusive.parse("#fc > form");
                                                                        });
                                                                    </script>

                                                                </div>
                                                                <div class="form-actions">
                                                                    <div class="pull-left">
                                                                    </div>
                                                                    <div class="pull-right">

                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

	<?php
	die;
}
//$FirmName = $memData['FirmName'];
//$GroupName = $memData['GroupName'];

/*
SMSGroup:""
SMSText:jai+mata+di	

*/
//SMS has been sent successfully.
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
                                    
                                    ?????? (Print) ??????? ???? ?????????? ?? ??? (Seal) ????? ??? ????????? ?? ?????? ??? ????? ?? ???? ?????<br><br>

???? ??????? ???? ?? 72 ???? ?? ????? ???? ??? ???? ????? (Data Update) ?? ???????<br><br>

???:- ??? ???? ?? ????? (Change) ?? ????? (Upload) ???? (???? ???? ???? ?? ??? ???) ?? ?? ?? ????? ????? ?? ???? ?????<br><br><br>
                                    </div>
                                    </div>
            <div class="print"><div class="printButton noprint"><input value="Print" onclick="printnew(this)" class="btn btn-danger btn-mini " type="Button"></div>
                <div id="fc">
                   <div class="row-fluid column-seperation">
                            <div class="span12">
                            <img src="wp-content/v1.jpg" style="width:200px" />
                                <h4>
                                    Request Details</h4>
                        <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Request_No:">Request No:</label>
                                    </div>
                                    <div class="span9">
                                        56 
                                    </div>
                                    </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Firm_Name">Firm Name</label>
                                    </div>
                                    <div class="span9">
                                        CG Tech
                                    </div>
                                    </div> 

                                  <div class="row-fluid">
                                    <div class="span3">
                                       <label for="Registration_No">Registration No</label>
                                    </div>
                                    <div class="span9">
                                       
                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="span3">
                                       <label for="Name">Name</label>
                                    </div>
                                    <div class="span9">
                                       cg tech
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                       <label for="Phone">Phone</label>
                                    </div>
                                    <div class="span9">
                                        9691633274
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                       <label for="Email">Email</label>
                                    </div>
                                    <div class="span9">
                                        cgmohanreddy@gmail.com
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span3">
                                      <label for="Request_Date">Request Date</label> 
                                    </div>
                                    <div class="span9">
                                     29/09/2019 
                                    </div>
                                </div>
                               

                                
                                
                                  <div class="row-fluid">
                                    <div class="span6">
                                        <label for="Request_Text">Request Text</label>
                                   
                                        
                                        

    <!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>szc ssd s df sd fds</p>
</body>
</html>
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
