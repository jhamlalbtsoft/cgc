<?php
// ERROR REPORTING
//error_reporting(E_ALL & ~E_NOTICE);
//init_set("display_errors",1);
ini_set('display_errors', 0);
//ini_set('display_startup_errors', 1);
date_default_timezone_set('Asia/Kolkata');
//error_reporting(E_ALL);
// DATABASE SETTINGS
define('DB_HOST', 'localhost');
define('DB_NAME', 'cgc');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('webUrl', 'http://localhost/cgc/');

// FILE PATHS
define("PATH_LIB", __DIR__ . DIRECTORY_SEPARATOR);
define("PGMID", "CHHATT41787972867989");
define("PGKEY", "Rh1j%YuuAkNaDPRy");
define("PGURL", "https://securegw.paytm.in/");
define("MembershipFee", 3500.00);
/* for Staging */
//$url = "https://securegw-stage.paytm.in/v3/order/status";

/* for Production */
// $url = "https://securegw.paytm.in/v3/order/status";
?>