<?php
// INIT
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";

// HTML
require PATH_LIB . "page-top.php"; ?>
<script>var TypeId= <?= $_REQUEST['TypeId'] ?>;var catType= '<?= $_REQUEST['catType'] ?>';</script>
<script src="public/eep.js"></script>
<div id="container"></div>
<?php require PATH_LIB . "page-bottom.php"; ?>