<?php

function runQuery( $query ) {
	global $dbConn;

	$stmt = $dbConn->getConnection()->prepare($query);
	$stmt->execute();
}

function checkCronKey() {
	global $argv;

	if ( !isset($argv[1]) ) {
		$argv[1] = '';
	}

	if ( !isset($_GET['cron_key']) ) {
		$_GET['cron_key'] = '';
	}

	if ( ( $_GET['cron_key'] != Settings::get('cron_key') ) && $argv[1] != 'cron_key=' . Settings::get('cron_key') ) {
		die('Error: incorrect cron_key');
	}
}

function preprint( $object ) {
	echo '<pre>';
	print_r( $object );
	echo '</pre>';
}
