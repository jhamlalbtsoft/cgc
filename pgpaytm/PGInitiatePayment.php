<?php
/*
* import checksum generation utility
* You can get this utility from https://developer.paytm.com/docs/checksum/
*/
session_start();
if(isset($_SESSION["orderId"]) && isset($_SESSION["MembersId"])){
	require_once __DIR__ . DIRECTORY_SEPARATOR . "../admin/lib" . DIRECTORY_SEPARATOR . "config.php";
	
	
require_once PATH_LIB . "lib-members.php";
$memLib = new Members();

require_once("PaytmChecksum.php");

	/* initialize an array */
	$paytmParams = array();

	/* body parameters */
	$paytmParams["body"] = array(

		/* Find your MID in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys */
		"mid" => PGMID,

		/* Enter your order id which needs to be check status for */
		"orderId" => $_SESSION["orderId"],
	);

	/**
	* Generate checksum by parameters we have in body
	* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
	*/
	$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), PGKEY);

/*
$paytmChecksum = PaytmChecksum::generateSignature($body, 'YOUR_MERCHANT_KEY');
$verifySignature = PaytmChecksum::verifySignature($body, 'YOUR_MERCHANT_KEY', $paytmChecksum);*/
	/* head parameters */
	$paytmParams["head"] = array(

		/* put generated checksum value here */
		"signature"	=> $checksum
	);

	/* prepare JSON string for request */
	$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);	
	$url = PGURL."v3/order/status";
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  
	$response1 = curl_exec($ch);
	//file_put_contents('myfile.json', ($response1));
	//print_r(json_decode($response1));
	//print_r($paytmParams);
	$response = json_decode($response1);
	$txnId="";
	$status="Failed";
	if(isset($response->body->resultInfo->resultCode) && $response->body->resultInfo->resultCode=="01"){//&& $response->body->resultInfo->resultStatus==TXN_SUCCESS
			$txnId= $response->body->txnId;	
			$status="Success";
		}else{
			echo $response->body->resultInfo->resultCode ." : ". $response->body->resultInfo->resultMsg;
			echo "<br/><br/><h1> Please go back and retry payment</h1>";
		}
		
		 $memData = $memLib->updatePGTranscations($custId=$_SESSION["MembersId"], $orderId=$_SESSION["orderId"], $response1, $txnId, $status);
		 if($memData){
		 //echo "<font color='green'>Payment Successful</font>";
		 Header( 'Location: http://www.cgchamber.org/Success?success='.$memData );
	die;
		 }
	die;
}

if(isset($_REQUEST["MembersId"])){
	require_once __DIR__ . DIRECTORY_SEPARATOR . "../admin/lib" . DIRECTORY_SEPARATOR . "config.php";
	
	
require_once PATH_LIB . "lib-members.php";
$memLib = new Members();
$txnToken="";
$orderId="";
$orderAmt="";

$memData = $memLib->get($_REQUEST["MembersId"]);
	if( count($memData) > 0 ){
		
		
		$orderId = isset($_SESSION["orderId"]) ? $_SESSION["orderId"] :"CGC_".$MembersId.date('YmdHi');
		$orderAmt = "1.00";//MembershipFee
		$custId = $_REQUEST["MembersId"];
		$_SESSION["MembersId"] = $_REQUEST["MembersId"];
		$_SESSION["orderId"] = $orderId;

		require_once("PaytmChecksum.php");

		$paytmParams = array();

		$paytmParams["body"] = array(
			"requestType"   => "Payment",
			"mid"           => PGMID,
			"websiteName"   => "DEFAULT",
			"orderId"       => $orderId,
			"callbackUrl"   => webUrl."pgpaytm/pg_notification_webhook.php",
			"txnAmount"     => array(
				"value"     => $orderAmt,
				"currency"  => "INR",
			),
			"userInfo"      => array(
				"custId"    => $custId,
			),
		);

		/*
		* Generate checksum by parameters we have in body
		* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
		*/
		$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), PGKEY);

		$paytmParams["head"] = array(
			"signature"    => $checksum
		);

		$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

		$url = PGURL."theia/api/v1/initiateTransaction?mid=". PGMID ."&orderId=".$orderId;

		/* for Production */
		// $url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=YOUR_MID_HERE&orderId=ORDERID_98765";

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json")); 
		$response = curl_exec($ch);
		$response = json_decode($response);
		///print_r(json_decode($response));
		//print_r($paytmParams);
		if(isset($response->body->resultInfo->resultCode) && $response->body->resultInfo->resultCode=="0000"){//Success
			$txnToken= $response->body->txnToken;
			$memData = $memLib->insertPGTranscations($custId, $orderId, $orderAmt, $checksum, $txnToken);
		}else{
			echo $response->body->resultInfo->resultCode ." : ". $response->body->resultInfo->resultMsg;
			echo "<br/><br/><h1> Please go back and retry payment</h1>";
		}
		
	}else{
		echo "invalid request";
		die;
	}
}
/*
Sample Response

{
    "head": {
        "responseTimestamp": "1526969112101",
        "version": "v1",
        "clientId": "C11",
        "signature": "TXBw50YPUKIgJd8gR8RpZuOMZ+csvCT7i0/YXmG//J8+BpFdY5goPBiLAkCzKlCkOvAQip/Op5aD6Vs+cNUTjFmC55JBxvp7WunZ45Ke2q0="
    },
    "body": {
        "resultInfo": {
            "resultStatus": "S",
            "resultCode": "0000",
            "resultMsg": "Success"
        },
        "txnToken": "fe795335ed3049c78a57271075f2199e1526969112097",
        "isPromoCodeValid": false,
        "authenticated": false
    }
}

*/
?>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title>Chhattisgarh Chamber of Commerce & Industries</title>
<meta content="Default" name="description" id="MetaTag1" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0"/>
    
<script>
function onScriptLoad(){
	var config = {
		"root": "",
		"flow": "DEFAULT",
		"data": {
		"orderId": "<?=$orderId?>", /* update order id */
		"token": "<?=$txnToken?>", /* update token value */
		"tokenType": "TXN_TOKEN",
		"amount": "<?=$orderAmt?>" /* update amount */
		//,"redirec":false
		},
		"handler": {
			"notifyMerchant": function(eventName,data){
				console.log("notifyMerchant handler function called");
				console.log("eventName => ",eventName);
				console.log("data => ",data);
			}
		}
	};
	if(window.Paytm && window.Paytm.CheckoutJS){
		window.Paytm.CheckoutJS.onLoad(function excecuteAfterCompleteLoad() {
		// initialze configuration using init method
		window.Paytm.CheckoutJS.init(config).then(function onSuccess() {
		// after successfully updating configuration, invoke JS Checkout
		window.Paytm.CheckoutJS.invoke();
		}).catch(function onError(error){
		console.log("error => ",error);
		});
		});
	}
}
</script>
<script type="application/javascript" src="<?=PGURL?>/merchantpgpui/checkoutjs/merchants/<?=PGMID?>.js" onload="onScriptLoad();" crossorigin="anonymous"></script>
	</head>
    <body>
        <center><h1>Please do not refresh this page...</h1></center>
        
    </body>
</html>