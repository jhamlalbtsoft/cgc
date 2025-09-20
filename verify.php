<?php
session_start();
include 'conn.php'; // $pdo connection

$otp = isset($_POST['otp']) ? trim($_POST['otp']) : '';

if (empty($otp) || !isset($_SESSION['send_otp'])) {
    echo 0;
    exit;
}

if ($otp == $_SESSION['send_otp']) {
   
    unset($_SESSION['send_otp']);
    echo 1;
} else {
    echo 0;
}
?>
