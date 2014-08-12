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

	if($slot_num!="")
	{
		header("location:index.php");
	}
?>


<html>
	<head>
		
		<title>QSystem</title>
						<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
						<link href="css/queue.css" type="text/css" rel="stylesheet">
					<script src="js/jquery.min.js"></script>
					<script src = "js/bootstrap.js"></script>
	</head>



	<body>
		<div class="blur"></div>  
	<nav class="navbar navbar-default" role="navigation"
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">QSyS</a>
		</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="queuesignup.php">Register</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
			 <p class="navbar-text navbar-right" style="margin-right:1em">Signed in as 
			 	<?php echo "<span style=\"font-weight:bold\">$student_num</span>"; ?></p> 

	</nav>
		<div style="padding:30px"> </div>
		<div id="container" class="container">
		<div  class="panel panel-primary">

		<div class="panel-heading"><h3>Registration</h3></div>
		<div class="panel-body">
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

			<div class="form-group">
			<label for="nickname">Nickname</label>
			<input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nickname"> 
		
			</div>

			<div class="input-group" style = "padding-bottom:20px">
				<label>Day:</label><br>
				<label class="radio-inline">
  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1"> 1
</label>
<label class="radio-inline">
  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2"> 2
</label>
<label class="radio-inline">
  <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3"> 3
</label>
			</div>

			<button id="submit" value="submit" name="submit" class="btn btn-submit">Submit</button>
			<br>
			<?php
				if(isset($_POST['submit']))
				{
					$day = $_POST['inlineRadioOptions'];
					$insertquery = "insert into slots values(nextval('next_slot_day$day'),$student_num,$day);";
					$result = pg_query($dbconn,$insertquery);

					if(!$result)
						echo "<br><span color=\"red\">There was a problem with the server please try again by refreshing the page 	or resubmitting the form.</span>";
					else
					{
						$nickname = $_POST['nickname'];
						$updatenickname = "UPDATE users SET nickname = '$nickname' WHERE student_num  = $student_num";
						$updateresult = pg_query($dbconn,$updatenickname);
					 	header("location:index.php");
					}
				}
			?>
			</form>
		</div>

	</div>
</div>
	</body>



</html>
 