<?php
// INIT
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";

// HTML
require PATH_LIB . "page-top.php"; ?>
<script>
var Type="<?= $_REQUEST['Type'] ?>";
var mType="<?= $_REQUEST['mType'] ?>"
</script>
<script src="public/links.js"></script>
<div id="container"></div>
<?php require PATH_LIB . "page-bottom.php"; ?>