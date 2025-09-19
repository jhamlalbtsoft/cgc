<?php
/**
* import checksum generation utility
* You can get this utility from https://developer.paytm.com/docs/checksum/
*/
file_put_contents('myfile.json', ($_POST));
file_put_contents('myfile1.json', ($_REQUEST));
if(isset($_REQUEST["cgc_mid"]) && isset($_REQUEST["cgc_orderid"])){
require_once("PaytmChecksum.php");

	/* initialize an array */
	$paytmParams = array();

	/* body parameters */
	$paytmParams["body"] = array(

		/* Find your MID in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys */
		"mid" => $_REQUEST["cgc_mid"],

		/* Enter your order id which needs to be check status for */
		"orderId" => $_REQUEST["cgc_orderid"],
	);

	/**
	* Generate checksum by parameters we have in body
	* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
	*/
	$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), "YOUR_MERCHANT_KEY");

	/* head parameters */
	$paytmParams["head"] = array(

		/* put generated checksum value here */
		"signature"	=> $checksum
	);

	/* prepare JSON string for request */
	$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

	/* for Staging */
	$url = "https://securegw-stage.paytm.in/v3/order/status";

	/* for Production */
	$url = "https://securegw.paytm.in/v3/order/status";

	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  
	$response = curl_exec($ch);
}else{
	echo "invalid user action";
}
/*
?>