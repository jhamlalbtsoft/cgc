<?php
session_start();
$mobile = $_POST['mobile'] ?? '';

if(!$mobile){
    echo "error";
    exit;
}

// Generate random OTP
$otp = rand(100000, 999999);
$_SESSION['otp'] = $otp;
$_SESSION['otp_mobile'] = $mobile;

// TODO: integrate SMS API here
// Example: call your SMS gateway API to send $otp to $mobile

// For now, just log OTP (for testing)
file_put_contents("otp_log.txt", "Mobile: $mobile OTP: $otp\n", FILE_APPEND);

echo "sent";
