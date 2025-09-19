<?php
$route = "default";
		//Prepare you post parameters
		$postData = array(
			'user' => 'rishindra100',
			'password' => 'eWaySMS2019',
			//'authkey' => $authKey,
			'number' => '9691633274',
			'text' => 'Your OTP is 7825, Thanks',
			'senderid' => 'INFORM',
			'channel' => 'Trans',
			'DCS' => 0,
			'flashsms' => 0,			
			'route' => 1
		);
		
		//API URL
		$url="http://dndsms.ewaytech.net/api/mt/SendSMS";

		// init the resource
		$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $postData
			//,CURLOPT_FOLLOWLOCATION => true
		));


		//Ignore SSL certificate verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		//get response
		$output = curl_exec($ch);

		//Print error if any
		if(curl_errno($ch))
		{
			echo 'error:' . curl_error($ch);
		}

		curl_close($ch);

		echo $output;
?>