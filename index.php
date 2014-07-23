<?php
	session_start();
	include("phpscripts/config.php");

	if(!isset($_SESSION['logged_user']))
	{
		header("location:login.php");
	}
	$student_num = $_SESSION['logged_user'];
	$query = "SELECT * from users where student_num = $student_num";
	$result = pg_query($dbconn, $query);

	$student_details = pg_fetch_assoc($result);


	$queryslots = "SELECT * from slots where student_id = $student_num";
	$resultquery = pg_query($dbconn,$queryslots);
	$slots = pg_fetch_assoc($resultquery);

	$slot_num = $slots['slot_id'];

	if($student_details['logged_in']=='f')
	{
		
	}
	else
		;
?>


<html>
	<head>
		
		<title>QSystem</title>
						<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
						<link href="css/queue.css" type="text/css" rel="stylesheet">
					<script src="js/jquery.min.js"></script>
						<?php 
							if($slot_num==""){
						echo '<link href="css/highlight.css" type="text/css" rel="stylesheet">
						<script src="js/highlight.js"></script>';
						}

						?>

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
			 	<?php echo "<span style=\"font-weight:bold\">$student_num</span>"; ?></p> 

	</nav>
		<div class="container">
		<div  class="panel panel-primary">

		<div class="panel-heading"><h3>Your queue number is:</h3></div>
		<div class="panel-body">
		<?php
			
			echo "<h1 style=\"text-align:center;font-size:10em;font-weight:bold;color:black\">$slot_num</span></h1>";
			
			if($slot_num == "")
				echo "<br><h2 style=\"text-align:center;color:red\">Not yet assigned!</h2>";
		?>	
		</div>
		<br>
	</div>
		</div>

	</body>



</html>
