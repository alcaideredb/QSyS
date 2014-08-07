<?php
	session_start();
	include("phpscripts/config.php");

	
?>


<html>
	<head>
		
		<title>QSystem</title>
						<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
						<link href="css/queue.css" type="text/css" rel="stylesheet">
					<script src="js/jquery.min.js"></script>
			

	</head>



	<body>
	<div id="overlay">	</div>
		<div class="blur"></div>

	<nav class="navbar navbar-default" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">QSyS</a>
		</div>
			<ul class="nav navbar-nav">
				<li id ="highlight" class="example expose"><a href="queuesignup.php">Register</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
			 <p class="navbar-text navbar-right" style="margin-right:1em">Signed in as 
			 	
	</nav>
		<div class="container">
		<div  class="panel panel-primary">

		<div class="panel-heading">Queue</div>
		<div class="panel-body">
			<table></table>
		</div>
		<br>
	</div>
		</div>

	</body>



</html>
