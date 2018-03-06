<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

//
$settings = array();
require_once __DIR__ . "/../../settings/config.php";

//
require_once __DIR__ . "/_misc_functions.inc.php";
require_once __DIR__ . "/pdo.inc.php";
require_once __DIR__ . "/settings.inc.php";
require_once __DIR__ . "/syncinfo.inc.php";

// connect to databases
$dbConn = new class_pdo( $databases['default'] );

//
if ( !isset($settings) ) {
	$settings = array();
}

if (php_sapi_name() === 'cli') {
	$EOL = PHP_EOL;
} else {
	$EOL = '<br>' . PHP_EOL;
}
