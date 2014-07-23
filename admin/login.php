<?php
	session_start();
	include("../phpscripts/config.php");
?>

<html>
	<head>
				<link href="../css/bootstrap.css" type="text/css" rel="stylesheet">
				<link href="../css/signin.css" type="text/css" rel="stylesheet">
		<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	</head>


	<body>
		<div class="container">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id ="login" name="login" method="post" class="form-signin" role="form">
				<h2 class="form-signin-heading">Test</h2>
				Username:<input type="text" name="user" class="form-control" required autofocus>
				Password:<input type="password" name="password" class="form-control" required>
				<?php
						error_reporting(0);
						if(isset($_POST['submit']))
						{
							$user = trim($_POST['user']);
							$password = trim($_POST['password']);
							$query = "SELECT * from admin where username = '$user'";
							$result = pg_query($dbconn,$query);
							
							if(pg_num_rows($result)>0){
								$admin = pg_fetch_assoc($result);
								if(md5($password)==$admin['password']){
									$_SESSION['logged_admin'] = $admin;	
									header("location:index.php");
								}
								else{
									echo "<span style='color:red'> <span class='glyphicon glyphicon-thumbs-down'></span> Wrong username or password
</span>";
								}
							}
							else
							{
								echo "<span style='color:red'> <span class='glyphicon glyphicon-thumbs-down'></span> User does not exist!
</span>";
							}
						}
					?>
				<button class="alizarin-flat-button" type="submit" name = "submit" >Submit</button>

					
			</form>

		</div>
	</body>




</html>