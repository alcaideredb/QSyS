<?php
	session_start();
	include("../phpscripts/config.php");
	if(!isset($_SESSION['logged_admin']))
	{
		header("location:../login.php");
	}

	$id = $_GET['id'];

	$delQuery = "delete from users where student_num=$id";
	$result = pg_query($dbconn,$delQuery);

	$delQuery2 = "delete from slots where student_id=$id";
	$result2 = pg_query($dbconn,$delQuery2);
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