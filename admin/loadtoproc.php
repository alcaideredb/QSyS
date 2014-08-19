<?php
	session_start();
	include("../phpscripts/config.php");
	if(!isset($_SESSION['logged_admin']))
	{
		header("location:login.php");
	}
	$dayquery[1] = "INSERT INTO PROC SELECT * FROM SLOTS WHERE day_id=1 order by slot_id";
	$dayquery[2] = "INSERT INTO PROC SELECT * FROM SLOTS WHERE day_id=2 order by slot_id";
	$dayquery[3] = "INSERT INTO PROC SELECT * FROM SLOTS WHERE day_id=3 order by slot_id";
	$d = $_GET['day'];

	error_reporting(0);
	$result = pg_query($dbconn,$dayquery[$d]);

	if(!$result)
		echo "An error occurred!Try Again!(The queue may have already been loaded,try clearing it first)";
	else
		echo "Success!!!";

	echo "<br><a href=\"index.php\">Back</a>";

?>