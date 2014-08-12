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
		<link href="../css/buttons.css" type="text/css" rel="stylesheet">
		<link href="../css/jquery.dataTables.css" type="text/css" rel="stylesheet">
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/jquery.dataTables.js"></script>
		<script>
			$(document).ready(function(){
				$.ajax({
						url:"../ajax/currproc.php",
						type: 'post',
						success: function(output)
						{
							$("#currStudent").html(output);
						}
					});

				$("#mknull").click(function(){
					$.ajax({
						url:"../ajax/makenull.php",
						type: 'post',
						success: function(output)
						{
								$("#currStudent").html(output);

						}
					});
				});


				$("#pnext").click(function(){
					$.ajax({
						url:"../ajax/processqueue.php",
						type: 'post',
						success: function(output)
						{
						}
					});
					$.ajax({
						url:"../ajax/currproc.php",
						type: 'post',
						success: function(output)
						{
							$("#currStudent").html(output);
						}
					});
				});
			});
		</script>
		<style>
			.width75
			{
				width:75%;
				margin:auto;
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

		<div class="panel-heading"><h3>Process Student</h3></div>
		<div class="panel-body">
			<div class="col-md-8">
					<h4>Processing: <span id="currStudent"></span></h4><br>
					Log: <span id="log"></span><br>

					<button id="pnext">Process Next</button>
					<button id="mknull">End Processing</button>
			</div>
		</div>
			<script>
			if(typeof(EventSource) !== "undefined") {
			    var source = new EventSource("../sse/sse.php");
			    source.onmessage = function(event) {
			        document.getElementById("result").innerHTML = event.data + "<br>";
			 		$('#livefeed').DataTable({
			 			  "order": [[ 2, "asc" ]]
			 		});
			    };
			} else {
			    document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
			}


			</script>
			<div id="result" class="width75">

			</div>

		<br>
	</div>
		</div>

		
	</body>

</html>
