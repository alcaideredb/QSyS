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
			$updQuery = "UPDATE admin set is_processing=NULL where username='$user'";
			$result = pg_query($dbconn,$updQuery);


			$selQuery = "SELECT is_processing FROM admin where username='$user'";
			$result2 = pg_query($dbconn,$selQuery);

			$row = pg_fetch_row($result2);
			if($row[0]!="")
			echo $row[0];
			else
			echo "IDLE";
		}

?>