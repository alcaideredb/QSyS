<?php
	session_start();
	include("../phpscripts/config.php");

	if(!isset($_SESSION['logged_admin']))
	{
		echo "INVALID USER!";
	}
	else
	{
			$selQuery = "SELECT * FROM QUEUE ORDER BY day_id,slot_id";
			$result = pg_query($dbconn,$selQuery);
			
		
				$row = pg_fetch_row($result);
			if($result)					
			{


				$user = $_SESSION['logged_admin'];

				$updQuery = "UPDATE admin SET is_processing=$row[0] where username ='$user'";
				$result = pg_query($dbconn,$updQuery);
				$delQuery = "DELETE from QUEUE where (slot_id=$row[0] and student_id=$row[1] and day_id=$row[2])";
				$result = pg_query($dbconn,$delQuery);
			}
			else
			{
				echo "NO MORE STUDENTS TO PROCESS!";
			}
	}

?>