<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Verify Mobile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
<div class="container py-5">
  <div class="card shadow p-4">
    <h4 class="mb-4 text-center">Mobile Verification</h4>
    <form id="otpForm">
      <div class="mb-3">
        <label class="form-label">Enter Mobile Number</label>
        <input type="tel" class="form-control" id="mobile" name="mobile" required>
      </div>
      <div class="mb-3 text-center">
        <button type="button" class="btn btn-primary" id="sendOtp">Request OTP</button>
      </div>

      <div id="otpSection" style="display:none;">
        <div class="mb-3">
          <label class="form-label">Enter OTP</label>
          <input type="text" class="form-control" id="otp" name="otp" required>
        </div>
        <div class="text-center">
          <button type="button" class="btn btn-success" id="verifyOtp">Verify & Continue</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
  $("#sendOtp").click(function(){
    var mobile = $("#mobile").val();
    if(mobile == "") { alert("Please enter mobile"); return; }
    $.post("send_otp.php", {mobile: mobile}, function(res){
      if(res == "sent"){
        alert("OTP sent to your mobile.");
        $("#otpSection").show();
      } else {
        alert("Error sending OTP!");
      }
    });
  });

  $("#verifyOtp").click(function(){
    var otp = $("#otp").val();
    $.post("verify_otp.php", {otp: otp}, function(res){
      if(res == "ok"){
        window.location.href = "MembersFormNew";
      } else {
        alert("Invalid OTP!");
      }
    });
  });
});
</script>
</body>
</html>
