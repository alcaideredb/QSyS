<?php
	unset($_SESSION['logged_admin']);
	session_destroy();
	header("location:login.php");
?>