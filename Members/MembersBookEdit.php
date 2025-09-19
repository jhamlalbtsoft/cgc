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
}ELSE{
	ECHO "Have No Permission";
	DIE;
}

if(!$_ADMIN){
	echo "Invalid loggin";
	die;
}

if(isset($_REQUEST['MembersId'])){
	$MembersId = $_REQUEST['MembersId'];//18
}else{
	echo "Invalid user";
	die;
}

require PATH_LIB . "lib-members.php";
$memLib = new Members();

$membersBookId = 0;


if(isset($_REQUEST['BookNo'])){
	///echo '<pre>'.print_r($_REQUEST);
	$MembersBookId = isset($_REQUEST['MembersBookId']) ? $_REQUEST['MembersBookId'] : "";
	$BookNo = isset($_REQUEST['BookNo']) ? $_REQUEST['BookNo'] : "";
	$ReceiptNo = isset($_REQUEST['ReceiptNo']) ? $_REQUEST['ReceiptNo'] : "";
	$BookDate = isset($_REQUEST['BookDate']) ? $_REQUEST['BookDate'] : "";
	$Amount = isset($_REQUEST['Amount']) ? round($_REQUEST['Amount'], 2) : "";
	$BankAccountNo = isset($_REQUEST['BankAccountNo']) ? $_REQUEST['BankAccountNo'] : "";
	$BankDate = isset($_REQUEST['BankDate']) ? $_REQUEST['BankDate'] : "";
	$BankName = isset($_REQUEST['BankName']) ? $_REQUEST['BankName'] : "";
	$BusinessGroupNo = isset($_REQUEST['BusinessGroupNo']) ? $_REQUEST['BusinessGroupNo'] : "";
	$MembershipNo = isset($_REQUEST['MembershipNo']) ? $_REQUEST['MembershipNo'] : "";
	$AcceptedDate = isset($_REQUEST['AcceptedDate']) ? $_REQUEST['AcceptedDate'] : "";
    
    $PaymentMode = isset($_REQUEST['PaymentMode']) ? $_REQUEST['PaymentMode'] : "";
	$Reference = isset($_REQUEST['Reference']) ? $_REQUEST['Reference'] : "";
	$Year = isset($_REQUEST['Year']) ? $_REQUEST['Year'] : "";
	
	if(isset($_REQUEST['MembersBookId']) && !empty($_REQUEST['MembersBookId'])){
		$memLib->updateMembersBook($MembersBookId,$MembersId,$BookNo,$ReceiptNo,$BookDate,$Amount,$BankAccountNo,$BankDate,$BankName,$BusinessGroupNo,$MembershipNo,$AcceptedDate,$PaymentMode,$Reference,$Year);
		echo "<font color='green'>Successfully Saved...</font>";
		die;
	}else{
		$res = $memLib->insertMembersBook($MembersId,$BookNo,$ReceiptNo,$BookDate,$Amount,$BankAccountNo,$BankDate,$BankName,$BusinessGroupNo,$MembershipNo,$AcceptedDate,$PaymentMode,$Reference,$Year);
		if( $res ){
		echo "<font color='green'>Successfully Saved...</font>";
		}else{
		    echo "<font color='#ff0000'>error, please contact support team</font>";
		}
		die;
	}
}

if(isset($_REQUEST['MembersId'])){
	///$MembersBookId = $_REQUEST['id'];
	///$MembersId = $_REQUEST['MembersId'];
	$MembersBookData = $memLib->getMembersBook($MembersId);
}else{
	$MembersBookData = $_REQUEST;
}
//echo $MembersBookData['BookDate'].'----';

$MembersBookId = isset($MembersBookData['MembersBookId']) ? $MembersBookData['MembersBookId'] : "";
$BookNo = isset($MembersBookData['BookNo']) ? $MembersBookData['BookNo'] : "";
$ReceiptNo = isset($MembersBookData['ReceiptNo']) ? $MembersBookData['ReceiptNo'] : "";
$BookDate = isset($MembersBookData['BookDate']) ? date("Y-m-d", strtotime($MembersBookData['BookDate'])) : "";
$Amount = isset($MembersBookData['Amount']) ? round($MembersBookData['Amount'], 2) : "";
$BankAccountNo = isset($MembersBookData['BankAccountNo']) ? $MembersBookData['BankAccountNo'] : "";
$BankDate = isset($MembersBookData['BankDate']) ? date("Y-m-d", strtotime($MembersBookData['BankDate'])) : "";
$BankName = isset($MembersBookData['BankName']) ? $MembersBookData['BankName'] : "";
$BusinessGroupNo = isset($MembersBookData['BusinessGroupNo']) ? $MembersBookData['BusinessGroupNo'] : "";
$MembershipNo = isset($MembersBookData['MembershipNo']) ? $MembersBookData['MembershipNo'] : "";
$AcceptedDate = isset($MembersBookData['AcceptedDate']) ? date("Y-m-d", strtotime($MembersBookData['AcceptedDate'])) : "";

$PaymentMode = isset($MembersBookData['PaymentMode']) ? $MembersBookData['PaymentMode'] : "";
$Reference = isset($MembersBookData['Reference']) ? $MembersBookData['Reference'] : "";
$Year = isset($MembersBookData['Year']) ? $MembersBookData['Year'] : "";
	
$memData = $memLib->get($MembersId);

$FirmName = $memData['FirmName'];
?>
<style>
    label
    {
        font-weight:bold ;
    
    }
    
     
    </style>
    <script >
        function Print(id) {
            $("#masterload").show();
        }
    </script>
<div class="row-fluid">
    <div class="span12">
        <div class="grid simple">
            <div class="grid-body no-border">
                <div id="fc">
					<form action="<?PHP ECHO webUrl ?>Members/MembersBookEdit?MembersId=<?= $MembersId ?>&MembersBookId=<?= $MembersBookId ?>" class="form-no-horizontal-spacing" data-ajax="true" data-ajax-mode="replace" data-ajax-update="#MembersBook > #modal-body" id="form0" method="post">                        
						<div class="row-fluid">
                            <div class="span12">
                                <h4>
                                    Book Details</h4>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <label for="Firm_Name">Firm Name</label> <input data-val="true" data-val-number="The field MembersId must be a number." data-val-required="The MembersId field is required." id="MembersId" name="MembersId" type="hidden" value="<?= $MembersId ?>" />
                                    </div>
                                    <div class="span6">
                                     <div class="span9">
                                        <?= $FirmName ?>
                                    </div>
                                    
                                     </div>
                                </div>
								
                                <div class="row-fluid">
									<div class="span3">                                
										<label for="BookNo">Book No</label>
                                    </div>
                                    <div class="span3">
										<input class="span4" id="BookNo" name="BookNo" placeholder="" type="text" value="<?=$BookNo?>" />&nbsp;<input class="span6" id="Year" name="Year" placeholder="Year" type="text" value="<?=$Year?>" />
										<span class="field-validation-valid error" data-valmsg-for="BookNo" data-valmsg-replace="true"></span>
										<span class="field-validation-valid error" data-valmsg-for="Year" data-valmsg-replace="true"></span>
									</div>
									<div class="span3">                                
										<label for="ReceiptNo">Receipt No</label>
                                    </div>
                                    <div class="span3">
										<input class="span6" id="ReceiptNo" name="ReceiptNo" placeholder="" type="text" value="<?=$ReceiptNo?>" />
										<span class="field-validation-valid error" data-valmsg-for="ReceiptNo" data-valmsg-replace="true"></span>
									</div>
									
                                </div>
								<div class="row-fluid">
									
                                </div>
								<div class="row-fluid">
									<div class="span3">                                
										<label for="BookDate">Book Date</label>
                                    </div>
                                    <div class="span3">
										<input class="span6" id="BookDate" name="BookDate" placeholder="" type="date" value="<?=$BookDate?>" />
										<span class="field-validation-valid error" data-valmsg-for="BookDate" data-valmsg-replace="true"></span>
									</div>
									<div class="span3">                                
										<label for="Amount">Amount</label>
                                    </div>
                                    <div class="span3">
										<input class="span6" id="Amount" name="Amount" placeholder="" type="text" value="<?=$Amount?>" />
										<span class="field-validation-valid error" data-valmsg-for="Amount" data-valmsg-replace="true"></span>
									</div>
                                </div>
								<div class="row-fluid">
									
                                </div>
								<div class="row-fluid">
									<div class="span3">                                
										<label for="BankAccountNo">Bank Account No</label>
                                    </div>
                                    <div class="span3">
										<input class="span6" id="BankAccountNo" name="BankAccountNo" placeholder="" type="text" value="<?=$BankAccountNo?>" />
										<span class="field-validation-valid error" data-valmsg-for="BankAccountNo" data-valmsg-replace="true"></span>
									</div>
									<div class="span3">                                
										<label for="BankDate">Bank Date</label>
                                    </div>
                                    <div class="span3">
										<input class="span6"  id="BankDate" name="BankDate" placeholder="" type="date" value="<?=$BankDate?>" />
										<span class="field-validation-valid error" data-valmsg-for="BankDate" data-valmsg-replace="true"></span>
									</div>
                                </div>
								<div class="row-fluid">
									
                                </div>
                                <div class="row-fluid">
									<div class="span3">                                
										<label for="BankName">Bank Name</label>
                                    </div>
                                    <div class="span3">
										<input class="span6" id="BankName" name="BankName" placeholder="" type="text" value="<?=$BankName?>" />
										<span class="field-validation-valid error" data-valmsg-for="BankName" data-valmsg-replace="true"></span>
									</div>
									
									<div class="span3">                                
										<label for="PaymentMode">Payment Mode</label>
                                    </div>
                                    <div class="span3">
										<input class=" span6" id="PaymentMode" name="PaymentMode" placeholder="" type="input" value="<?=$PaymentMode?>" />
										<span class="field-validation-valid error" data-valmsg-for="PaymentMode" data-valmsg-replace="true"></span>
									</div>
                                </div>
								<div class="row-fluid">
									
                                </div>
                                
								<div class="row-fluid">
									<div class="span3">                                
										<label for="MembershipNo">Membership No</label>
                                    </div>
                                    <div class="span3">
										<input class="span6" id="MembershipNo" name="MembershipNo" placeholder="" type="text" value="<?=$MembershipNo?>" />
										<span class="field-validation-valid error" data-valmsg-for="MembershipNo" data-valmsg-replace="true"></span>
									</div>
									<div class="span3">                                
										<label for="BusinessGroupNo">Business Group No</label>
                                    </div>
                                    <div class="span3">
										<input class="span6" id="BusinessGroupNo" name="BusinessGroupNo" placeholder="" type="text" value="<?=$BusinessGroupNo?>" />
										<span class="field-validation-valid error" data-valmsg-for="BusinessGroupNo" data-valmsg-replace="true"></span>
									</div>
                                </div>
								<div class="row-fluid">
									
                                </div>
                                <div class="row-fluid">
									
									<div class="span3">                                
										<label for="AcceptedDate">Accepted Date</label>
                                    </div>
                                    <div class="span3">
										<input class=" span6" id="AcceptedDate" name="AcceptedDate" placeholder="" type="date" value="<?=$AcceptedDate?>" />
										<span class="field-validation-valid error" data-valmsg-for="AcceptedDate" data-valmsg-replace="true"></span>
									</div>
									
									<div class="span3">                                
										<label for="Reference">Reference</label>
                                    </div>
                                    <div class="span3">
										<input class="span6" id="Reference" name="Reference" placeholder="" type="text" value="<?=$Reference?>" />
										<span class="field-validation-valid error" data-valmsg-for="Reference" data-valmsg-replace="true"></span>
									</div>
                                </div>
								<div class="row-fluid">
									
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $("#fc > form").removeData("validator");
                                    $("#fc > form").removeData("unobtrusiveValidation");
                                    $.validator.unobtrusive.parse("#fc > form");
                                });
                            </script>
                            <div class="form-actions">
                                <div class="pull-left">
                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-danger btn-cons" type="submit">
                                        <i class="icon-ok"></i>Save</button>
                                   
                                </div>
                            </div>
                        </div>		  
</form>                </div>
            </div>
        </div>
    </div>
</div>