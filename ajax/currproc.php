<?php
	session_start();
	include("../phpscripts/config.php");

	if(!isset($_SESSION['logged_admin']))
	{
		echo "INVALID USER!";
	}
	else
	{
			$user = $_SESSION['logged_admin'];
			$selQuery = "SELECT is_processing FROM admin where username='$user'";
			$result = pg_query($dbconn,$selQuery);
			$row = pg_fetch_row($result);

			echo $row[0];
	}

?>