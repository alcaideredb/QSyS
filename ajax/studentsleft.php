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
				echo pg_num_rows($result);
			}
			else
			{
				echo "NO MORE STUDENTS TO PROCESS!";
			}
	}

?>