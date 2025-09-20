<?php
session_start();
$otp = $_POST['otp'] ?? '';

if(isset($_SESSION['otp']) && $otp == $_SESSION['otp']){
    echo "ok";
    unset($_SESSION['otp']); // clear after use
} else {
    echo "fail";
}
