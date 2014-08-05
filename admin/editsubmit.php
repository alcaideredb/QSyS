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
	$origid = $_POST['origid'];
	$pinstring = (string) $pin;
	if(strlen($pinstring)!=0){
	$updQuery = "UPDATE users SET student_num=$id, name = '$name', pin_num=md5('$pin'),".
	"birthday = to_date('$bday','YYYY-MM-DD'), pin = $pin where student_num = $origid";
	}
	else{
		$updQuery = "UPDATE users SET student_num=$id, name = '$name', pin_num=md5('$pin'),".
	"birthday = to_date('$bday','YYYY-MM-DD') where student_num = $origid";
	}

	$result = pg_query($dbconn,$updQuery);

	if(!$result){
		echo "Edit failed!There was a problem in the database!Try again.";
	}
	else{
		echo "Edit success!";
	}
	echo "<br>";
	echo "<a href=\"index.php\">Back</a>";
?>