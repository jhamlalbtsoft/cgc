<?php
session_start();
include 'conn.php'; // This should set up $pdo (PDO connection)

// Get data from AJAX
$mobile = isset($_POST['MobileRep1']) ? trim($_POST['MobileRep1']) : '';
if (empty($mobile) || !preg_match('/^[0-9]{10}$/', $mobile)) {
    echo 0;
    exit;
}

// Check if number already exists
$stmt = $pdo->prepare("SELECT MembersId, MobileRep1 FROM members WHERE MobileRep1 = ?");
$stmt->execute([$mobile]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Generate OTP
$otp = rand(10000, 99999);
$msg = "Hi, Your OTP Verification Code against your registration is $otp. Do Not share with anyone else. BTSOFT";

// Send OTP message
// sendotpmessage($mobile, $msg);
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://msg.msgclub.net/rest/services/sendSMS/sendGroupSms?AUTH_KEY=e5a518bed146a3a797f08dede042f1e3&message='.urlencode($msg).'&senderId=BTSOL&routeId=1&mobileNos='.$mobile.'&smsContentType=english&entityid=1201160438979641336&tmid=140200000022&templateid=1707171652652309251&concentFailoverId=30',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 10,
    ));

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        error_log('SMS Sending Failed: ' . curl_error($curl));
    }

    curl_close($curl);

if ($user) {
    // Update OTP for existing user
    $update = $pdo->prepare("UPDATE members SET otp = ? WHERE MembersId = ?");
    $update->execute([$otp, $user['MembersId']]);
} else {
    // Insert new user with OTP
    $insert = $pdo->prepare("INSERT INTO members (MobileRep1, otp) VALUES (?, ?)");
    $insert->execute([$mobile, $otp]);
}

// Store OTP in session for validation later
$_SESSION['send_otp'] = $otp;

echo 1; // Success

// Function to send SMS
function sendotpmessage($mobileno, $message)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://msg.msgclub.net/rest/services/sendSMS/sendGroupSms?AUTH_KEY=e5a518bed146a3a797f08dede042f1e3&message='.urlencode($message).'&senderId=BTSOL&routeId=1&mobileNos='.$mobileno.'&smsContentType=english&entityid=1201160438979641336&tmid=140200000022&templateid=1707171652652309251&concentFailoverId=30',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 10,
    ));

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        error_log('SMS Sending Failed: ' . curl_error($curl));
    }

    curl_close($curl);
}
?>
