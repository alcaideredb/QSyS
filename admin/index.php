<?php
	session_start();
	include("../phpscripts/config.php");
	if(!isset($_SESSION['logged_admin']))
	{
		header("location:login.php");
	}
?>


<html>
	<head> 
		<!--<script src="../js/dropzone.js"></script>
		<script src="../js/dropzoneconfig.js"></script>
		<link href="../css/dropzone.css" type="text/css" rel="stylesheet" />-->
		<link href="../css/bootstrap.css" type="text/css" rel="stylesheet">
		<script src="../js/jquery.min.js"></script>
	</head>
	<body>


	<nav class="navbar navbar-default" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">QSyS</a>
		</div>
			<ul class="nav navbar-nav">
				<li id ="highlight" class="example expose"><a href="viewstudents.php">Students</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
			 <p class="navbar-text navbar-right" style="margin-right:1em">Signed in as </p> 

	</nav>
		<div class="container">
		<div  class="panel panel-primary">

		<div class="panel-heading"><h3>Upload Student</h3></div>
		<div class="panel-body">
			<form action="filesubmission.php" method="post" class="dropzone" id = "uploadDrop" enctype="multipart/form-data">
			<input type="file" name="file" accept=".csv">
			<input type="submit">	
		</form>
		</div>
		<br>
	</div>
		</div>

		
	</body>

</html>
