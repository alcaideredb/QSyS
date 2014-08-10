<?php
	session_start();
	include("../phpscripts/config.php");
	if(!isset($_SESSION['logged_admin']))
	{
		header("location:../login.php");
	}

	
	$flag=true;
	if(!empty($_POST['checked'])){
		$flag = true;
		foreach($_POST['checked'] as $value)
		{
			$delQuery = "delete from users where student_num=$value";
			$result = pg_query($dbconn,$delQuery);

		
			if(!$result)
			{
				echo "There was a problem in the database!Try again!<br>";
				$flag=false;
				break;
			}
			else
			{
				$delQuery2 = "delete from slots where student_id=$value";
				$result2 = pg_query($dbconn,$delQuery2);
			}

		}
		if($flag==true)
		{
			echo "Deletion Success!<br>";
		}
	}
	else
	{
		echo "NOTHING TO DELETE<br>";
	}

			echo "<a href=\"index.php\">Back</a>";

?>