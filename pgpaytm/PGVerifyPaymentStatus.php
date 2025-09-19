<?php
/**
* import checksum generation utility
* You can get this utility from https://developer.paytm.com/docs/checksum/
*/
if(isset($_REQUEST["MembersId"]) && isset($_REQUEST["cgc_orderid"])){
require __DIR__ . DIRECTORY_SEPARATOR . "../admin/lib" . DIRECTORY_SEPARATOR . "config.php";
require_once("PaytmChecksum.php");

	/* initialize an array */
	$paytmParams = array();
	//$mid = "CHHATT41787972867989";
	//$MERCHANT_KEY = "Rh1j%YuuAkNaDPRy";
	/* body parameters */
	$paytmParams["body"] = array(

		/* Find your MID in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys */
		"mid" => PGMID,

		/* Enter your order id which needs to be check status for */
		"orderId" => $_REQUEST["cgc_orderid"],
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
	$response = curl_exec($ch);
	file_put_contents('myfile.json', ($response));
}else{
	echo "invalid user action";
}
/*
sample responce
{
    "head": {
        "responseTimestamp": "1553496322922",
        "version": "v1",
        "clientId": "C11",
        "signature": "xxxxx"
    },
    "body": {
        "resultInfo": {
            "resultStatus": "TXN_SUCCESS",
            "resultCode": "01",
            "resultMsg": "Txn Success"
        },
        "txnId": "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
        "bankTxnId": "xxxxxxxxxxxxxxx",
        "orderId": "xxxxxxx",
        "txnAmount": "100.00",
        "txnType": "SALE",
        "gatewayName": "HDFC",
        "bankName": "HSBC",
        "mid": "xxxxxxxxxxxxxxxxxxxx",
        "paymentMode": "CC",
        "refundAmt": "100.00",
        "txnDate": "2019-02-20 12:35:20.0",
        "authRefId": "50112883"
    }
}        
*/
?>