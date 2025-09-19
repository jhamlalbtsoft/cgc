<?php
// INIT
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";

// HTML
require PATH_LIB . "page-top.php"; ?>
<!--script src="public/users.js"></script-->
<div id="container">
	<iframe border="0" id="Mem" style="width:100%;border:0px solid;" src="<?PHP ECHO webUrl ?>Members/Request-Index" scrolling="no" onload='javascript:resizeIframe(this);'></iframe>
</div>
<?php require PATH_LIB . "page-bottom.php"; ?>
<script language="javascript" type="text/javascript">
  function resizeIframe() {
    //obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
document.getElementById('Mem').style.height = document.getElementById('Mem').contentWindow.document.body.scrollHeight + 'px';
//alert(document.getElementById('Mem').style.height);
  }
</script>	
