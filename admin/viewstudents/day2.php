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
				$('#select-all').click(function(event) {   
				    if(this.checked) {
				        // Iterate each checkbox
				        $(':checkbox').each(function() {
				            this.checked = true;                        
	        			});
	   			 	}
	   			 	else
	   			 	{
	   			 		 $(':checkbox').each(function() {
				            this.checked = false;                        
	        			});
	   			 	}
				});

				$(":checkbox").click(function(){
 					var flag=false;
 					var c=0;
 					$(':checkbox').each(function() {
				         if(this.checked==true){
				         		flag=true;
				         		return false;
	        				}
	        		});
 						if(flag==true){
 							$('.editlink').addClass('disabled');
							$('.editlink').bind('click', false);
 						}
 						else{
 							$('.editlink').removeClass('disabled');
 							$('.editlink').unbind('click', false);		}
				});
			
			});
		
		</script>
		<style>

			.disabled {
			  color: grey; 
			}

		</style>
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
            <li><a href="unregistered.php">All Users</a></li>
          </ul>
      </li>
<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Queue<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          		  	        <li role="presentation" class="dropdown-header">Load</li>
		         <li><a href="../loadqueue.php">Load to Queue</a></li>
		        <li class="divider"></li>
			   <li role="presentation" class="dropdown-header">View</li>
            <li><a href="../../sse/index.php">View Queue</a></li>
            
			   <li role="presentation" class="dropdown-header">Process</li>
            <li><a href="../process.php">Process Students</a></li>
          </ul>
      </li>	



				<li><a href="../logout.php">Logout</a></li>
			</ul>
			 <p class="navbar-text navbar-right" style="margin-right:1em">Signed in as </p> 

	</nav>
		<div class="container">
		<div  class="panel panel-primary">

		<div class="panel-heading"><h3>Day 2</h3></div>
		<div class="panel-body">
				<form  action="../delete.php" method="post">

		<table id="studentsday1" >
			<thead>
				<tr>
				<th><input type="checkbox" id="select-all"></th>
				<th>Queue Number</th>
				<th>Student Number</th>
				<th>Nickname</th>
				<th></th>

				</tr>
			</thead>
			<tbody>
						<?php 

					$result = pg_query($dbconn,$dayquery[2]);

					while($students = pg_fetch_row($result))
					{
						echo "<tr>";
						echo "<td><input type=\"checkbox\" value = \"$students[3]\" name=\"checked[]\"></td>";
							echo "<td>$students[0]</td>";
							echo "<td>$students[3]</td>";
							echo "<td>$students[1]</td>";
							echo "<td><a class = \"editlink\" href=\"../editstudents.php?id=$students[3]\">Edit</td>";
						echo "</tr>";
					}


				?>

			</tbody>
		</table>
				<button type="submit" name="submit">Delete</button>

		</div>


		<br>
	</div>
		</div>

		
	</body>

</html>
