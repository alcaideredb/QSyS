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
				if(pg_num_rows($result)>0)
				{

					$updQuery = "UPDATE admin SET is_processing=$row[0] where username ='$user'";
					$result = pg_query($dbconn,$updQuery);
					$delQuery = "DELETE from QUEUE where (slot_id=$row[0] and student_id=$row[1] and day_id=$row[2])";
					$resultDel = pg_query($dbconn,$delQuery);
				}
				else
				{

					$updQuery2 = "UPDATE admin SET is_processing=NULL where username ='$user'";
					$resultUpd = pg_query($dbconn,$updQuery2);
				}
			}
			else
			{

					$updQuery2 = "UPDATE admin SET is_processing=NULL where username ='$user'";
					$resultUpd = pg_query($dbconn,$updQuery2);

				echo "NO MORE STUDENTS TO PROCESS!";
			}
	}

?>