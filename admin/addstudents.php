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
		<script src="../js/bootstrap.min.js"></script>
		<style>
			#inputForms{
					width:50%;
			}
		</style>
	</head>
	<body>


	<nav class="navbar navbar-default" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">QSyS</a>
		</div>
			<ul class="nav navbar-nav">
				<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown">View Students<span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		         	<li role="presentation" class="dropdown-header">Add</li>
		         	<li><a href="addstudents.php">Add Student</a></li>
		          	<li class="divider"></li>
		            <li role="presentation" class="dropdown-header">View</li>
		            <li><a href="viewstudents/day1.php">Day 1</a></li>
		            <li><a href="viewstudents/day2.php">Day 2</a></li>
		            <li><a href="viewstudents/day3.php">Day 3</a></li>
		          </ul>
      			</li>
<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Queue<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          		        <li role="presentation" class="dropdown-header">Load</li>
		         <li><a href="loadqueue.php">Load to Queue</a></li>
		        <li class="divider"></li>
			   <li role="presentation" class="dropdown-header">View</li>
            <li><a href="../sse/index.php">View Queue</a></li>
         			   <li role="presentation" class="dropdown-header">Process</li>
            <li><a href="process.php">Process Students</a></li>
          </ul>
      </li>	
				<li><a href="logout.php">Logout</a></li>
			</ul>
			 <p class="navbar-text navbar-right" style="margin-right:1em">Signed in as </p> 

	</nav>
		<div class="container">
		<div  class="panel panel-primary">

		<div class="panel-heading"><h3>Upload Student</h3></div>
		<div class="panel-body">

			<form>


			</form>
			<div id="fileuploadform">
				<form action="filesubmission.php" method="post" class="dropzone" id = "uploadDrop" enctype="multipart/form-data" required>
				<div class="form-group" id="inputForms">
					<label for="studentNum">Student Number: </label>
						<input type="text" class="form-control" pattern="[0-9]{9}" name="studentNum" id="studentNum" placeholder="Enter 9 digit student number">
				<br>
					<label for="name">Student Name</label>
						<input type="text" class="form-control" name="name" id="name" placeholder="Enter student name" required>
					<br>
					<label for="birthday">Birthday</label>
						<input type="date" class="form-control" name="birthday" id="birthday" required>
										<br>
					<label for="name">Pin</label>

						<input type="text" class="form-control" pattern="[0-9]{6}" name="pin" id="pin" placeholder="Enter 6 digit pin number" required>	

				</div>


				  <br><br>
				  <div class="form-group">
				  		<input type="checkbox" name="uploadByFile" value="yes"> 
				    <label for="exampleInputFile">Add Students by file</label>
						<input type="file" name="file" accept=".csv">
				 	   <p class="help-block">Upload students by CSV file</p>
 					 </div>
				<input type="submit"><a href="index.php" style="color:black;"><button type="button">Back</button></a>		
			</div>
		</form>
		</div>
		<br>
	</div>
		</div>

		
	</body>

</html>
