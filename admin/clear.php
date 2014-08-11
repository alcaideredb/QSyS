<?php
	session_start();
	include("../phpscripts/config.php");
	if(!isset($_SESSION['logged_admin']))
	{
		header("location:../login.php");
	}


	$query = "DELETE FROM QUEUE";
	$result = pg_query($dbconn,$query);

	if(!$result)
		echo "An error occurred!Try Again!(The queue may have already been loaded)";
	else
		echo "Success!!!";

	echo "<br><a href=\"index.php\">Back</a>";

?>