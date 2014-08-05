<?php
	session_start();
	include("../phpscripts/config.php");
	if(!isset($_SESSION['logged_admin']))
	{
		header("location:../login.php");
	}


	$id = $_POST['studentNum'];
	$name = $_POST['name'];
	$bday = $_POST['birthday'];
	$pin = $_POST['pin'];

	$updQuery = "UPDATE users "
	if(!$result){
		echo "Edit failed!There was a problem in the database!Try again.";
	}
	else{
		echo "Edit success!";
	}
	echo "<br>";
	echo "<a href=\"index.php\">Back</a>";
?>