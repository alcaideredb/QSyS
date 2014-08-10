<?php
	session_start();
	include("../phpscripts/config.php");
	if(!isset($_SESSION['logged_admin']))
	{
		header("location:../login.php");
	}

	$id = $_GET['id'];

	$delQuery = "delete from queue where student_id=$id";
	$result = pg_query($dbconn,$delQuery);

	if(!$result)
	{
		echo "Deletion failed!There was a problem in the database!Try again.";
	}
	else
	{
		echo "Delete success!";
	}
	echo "<br>";
	echo "<a href=\"index.php\">Back</a>";
?>