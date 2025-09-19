<?php
// INIT
header("Access-Control-Allow-Origin: https://www.cgchamber.org");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";

// HTML
require PATH_LIB . "page-top.php"; ?>
<!--script src="public/users.js"></script-->
<div id="container">
	<iframe border="0" id="Mem" style="width:100%;border:0px solid;" src="<?php webUrl ?>/member" scrolling="no" onload='javascript:resizeIframe(this);'></iframe>
</div>
<?php require PATH_LIB . "page-bottom.php"; ?>
<script language="javascript" type="text/javascript">
  function resizeIframe() {
    //obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
document.getElementById('Mem').style.height = 200 + document.getElementById('Mem').contentWindow.document.body.scrollHeight + 'px';
//alert(document.getElementById('Mem').style.height);
  }
</script>	
