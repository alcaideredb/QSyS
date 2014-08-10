<?php
	session_start();
	unset($_SESSION['logged_admin']);
	session_destroy();
	header("location:login.php");
?>