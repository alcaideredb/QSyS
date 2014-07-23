<?php
	date_default_timezone_set('Asia/Manila');
	define("DB_HOST","localhost");
	define("DB_USER","qadmin");
	define("DB_PASS","akoangqadmin");
	define("DB_NAME","qsystem");

	$dbhost="host= ".DB_HOST;
	$dbuser="user= ".DB_USER;
	$dbpass="password= ".DB_PASS;
	$dbname="dbname= ".DB_NAME;
	
	$connection_string = "$dbhost $dbname $dbuser $dbpass";

	$dbconn = pg_connect($connection_string);

?>
