<?php
	session_start();
	include("../../phpscripts/config.php");
	if(!isset($_SESSION['logged_admin']))
	{
		header("location:../login.php");
	}


	$dayquery[1]="SELECT slots.slot_id, users.nickname, slots.day_id, users.student_num FROM users INNER JOIN slots ON users.student_num = slots.student_id WHERE slots.day_id=1 ORDER by slots.slot_id;";
	$dayquery[2]="SELECT slots.slot_id, users.nickname, slots.day_id, users.student_num FROM users INNER JOIN slots ON users.student_num = slots.student_id WHERE slots.day_id=2 ORDER by slots.slot_id;";	
	$dayquery[3]="SELECT slots.slot_id, users.nickname, slots.day_id, users.student_num FROM users INNER JOIN slots ON users.student_num = slots.student_id WHERE slots.day_id=3 ORDER by slots.slot_id;";
?>


<html>
	<head> 
		<!--<script src="../js/dropzone.js"></script>
		<script src="../js/dropzoneconfig.js"></script>
		<link href="../css/dropzone.css" type="text/css" rel="stylesheet" />-->
		<link href="../../css/bootstrap.css" type="text/css" rel="stylesheet">
		<link href="../../css/jquery.dataTables.css" type="text/css" rel="stylesheet">
		<script src="../../js/jquery.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
		<script src="../../js/jquery.dataTables.js"></script>
		<script>
			$(document).ready(function(){
				$('#studentsday1').DataTable();
			});
		</script>
	</head>
	<body>


	<nav class="navbar navbar-default" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="../index.php">QSyS</a>
		</div>
			<ul class="nav navbar-nav">
			 <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">View Students<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          		        <li role="presentation" class="dropdown-header">Add</li>
		         <li><a href="../addstudents.php">Add Student</a></li>
		        <li class="divider"></li>
			   <li role="presentation" class="dropdown-header">View</li>
            <li><a href="day1.php">Day 1</a></li>
            <li><a href="day2.php">Day 2</a></li>
            <li><a href="day3.php">Day 3</a></li>
          </ul>
      </li>
				<li><a href="../logout.php">Logout</a></li>
			</ul>
			 <p class="navbar-text navbar-right" style="margin-right:1em">Signed in as </p> 

	</nav>
		<div class="container">
		<div  class="panel panel-primary">

		<div class="panel-heading"><h3>Day 1</h3></div>
		<div class="panel-body">

		<table id="studentsday1" >
			<thead>
				<tr>
				<th>Queue Number</th>
				<th>Student Number</th>
				<th>Nickname</th>
				<th></th>
				<th></th>

				</tr>
			</thead>
			<tbody>
				<?php 

					$result = pg_query($dbconn,$dayquery[1]);
					while($students = pg_fetch_row($result))
					{
						echo "<tr>";
							echo "<td>$students[0]</td>";
							echo "<td>$students[3]</td>";
							echo "<td>$students[1]</td>";
							echo "<td><a href=\"../editstudents.php?id=$students[3]\">Edit</td>";
							echo "<td><a href=\"../delete.php?id=$students[3]\" onClick=\"return confirm('Delete This account?')\">Delete</a></td>";
						echo "</tr>";
					}


				?>
			</tbody>
		</table>
		</div>
		<br>
	</div>
		</div>

		
	</body>

</html>
