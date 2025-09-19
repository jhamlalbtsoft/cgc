<?php
// ERROR REPORTING
//error_reporting(E_ALL & ~E_NOTICE);
//init_set("display_errors",1);
//ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
date_default_timezone_set('Asia/Kolkata');
//error_reporting(E_ALL);
// DATABASE SETTINGS
define('DB_HOST', 'localhost');
define('DB_NAME', 'cgchambe_raipur');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'cgchambe_raipur');
define('DB_PASSWORD', '2c&t?9Xh&n1^');

// FILE PATHS
define("PATH_LIB", __DIR__ . DIRECTORY_SEPARATOR);
define("webUrl", "http://www.cgchamber.org/");
?>