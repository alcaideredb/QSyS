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
					
				$delQuery2 = "delete from slots where student_id=$value";
				$result2 = pg_query($dbconn,$delQuery2);
			if(!$result2)
			{
				echo "There was a problem in the database!Try again!<br>";
				$flag=false;
				break;
			}
			else
			{

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