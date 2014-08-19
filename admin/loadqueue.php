<?php
	session_start();
	include("../phpscripts/config.php");
	if(!isset($_SESSION['logged_admin']))
	{
		header("location:login.php");
	}
	$chair = $_SESSION['logged_admin'];
	$queryChair = "SELECT account_type FROM admin where username = '$chair'";
	$result = pg_query($dbconn,$queryChair);	
	$row = pg_fetch_row($result);
	if($row[0]!='c')
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
		<link href="../css/buttons.css" type="text/css" rel="stylesheet">
		<link href="../css/jquery.dataTables.css" type="text/css" rel="stylesheet">
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/jquery.dataTables.js"></script>
		<script>
			$(document).ready(function(){
				   $('#studentsday3').dataTable( {
     				   "ajax": '../ajax/ajax.php?day=1',
     				       "bDestroy": true

   					 } );


				$("#day").change(function(){
					var str="";
					str = $("#day option:selected").text();
					$("#dayEnum").val(str);
					 $('#studentsday3').dataTable( {
	     				   "ajax": '../ajax/ajax.php?day='+str,
	     				       "bDestroy": true


	   					 } );
					});

				$("#load").click(function(){
					var redir="loadtoqueue.php?day="+$("#dayEnum").val();
					var r = confirm("Are you sure?");
					var txt;
					if (r == true) {
 					   window.location.assign(redir);
					} else {
					    txt = "You pressed Cancel!";
					}				
				});

				$("#proc").click(function(){
					var redir="loadtoproc.php?day="+$("#dayEnum").val();
					var r = confirm("Are you sure?");
					var txt;
					if (r == true) {
 					   window.location.assign(redir);
					} else {
					    txt = "You pressed Cancel!";
					}				
				});
			$("#clear").click(function(){
					var redir="clear.php";
					var r = confirm("Are you sure?");
					var txt;
					if (r == true) {
 					   window.location.assign(redir);
					} else {
					    txt = "You pressed Cancel!";
					}				
				});

			});
		</script>
		<style>
			#day {
			   background-color: rgba(0,0,0,0.3);
			    color:#fff;
			    text-shadow:0 1px 0 rgba(0,0,0,0.4);
				border:0px;

			}
			#day > option {
			    margin:40px;
			    background-color: rgba(0,0,0,0.3);
			    color:#fff;
			    text-shadow:0 1px 0 rgba(0,0,0,0.4);
				border:0px;
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
            <li><a href="viewstudents/unregistered.php">All Users</a></li>
      
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

		<div class="panel-heading"><h3>Day
			<select class="input-lg" name="slct" id="day">
					<option value="1">1</option>
		  			<option value="2">2</option>
		  			<option value="3">3</option>
			</select></h3>
		</div>
		<div class="panel-body">
	
		<table id="studentsday3" >

			<thead>

				<tr>
					<th>Queue Number</th>
					<th>Student Number</th>
					<th>Nickname</th>
				</tr>

			</thead>
			<tbody>
				
			</tbody>
			
		</table>
		<br>
		<button id="load" class="nephritis-flat-button" value="">Load this into Processing Queue</button>
		<button id="proc" class="peter-river-flat-button" value="">Load this into Evaluation Queue</button>
			<button id="clear" class="pomegranate-flat-button" value="">Clear the Queue</button>

		<input type="hidden" name="dayEnum" id="dayEnum" value="1">
		</div>
		<br>
	</div>
		</div>

		
	</body>

</html>
