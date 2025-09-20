<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<script type="text/javascript">
  var configuration = {
    widgetId: "3465756d3751343331323431",
    tokenAuth: "422468TJEekmav8Kp664ca9d6P1",
    exposeMethods: false,
    captchaRenderId: '', // id(must be unique) of html element where to render captcha, only works if there is exposedMethod is true,.
    success: (data) => {
        // get verified token in response
        console.log('success response', data);
    },
    failure: (error) => {
        // handle error
        console.log('failure reason', error);
    },

};
</script>
 <script type="text/javascript" onload="initSendOTP(configuration)" src="https://verify.msg91.com/otp-provider.js"></script>
</body>
</html>