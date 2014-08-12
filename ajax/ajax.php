<?php 
	include("../phpscripts/config.php");

	$dayquery[1]="SELECT slots.slot_id, users.nickname, slots.day_id, users.student_num FROM users INNER JOIN slots ON users.student_num = slots.student_id WHERE slots.day_id=1 ORDER by slots.slot_id;";
	$dayquery[2]="SELECT slots.slot_id, users.nickname, slots.day_id, users.student_num FROM users INNER JOIN slots ON users.student_num = slots.student_id WHERE slots.day_id=2 ORDER by slots.slot_id;";	
	$dayquery[3]="SELECT slots.slot_id, users.nickname, slots.day_id, users.student_num FROM users INNER JOIN slots ON users.student_num = slots.student_id WHERE slots.day_id=3 ORDER by slots.slot_id;";


	$d = $_GET['day'];
					$result = pg_query($dbconn,$dayquery[$d]);
					echo "{\"data\": [";
					$size = pg_num_rows($result);
					$i=1;
					while($students = pg_fetch_row($result))
					{
						echo "[";
							echo "\"$students[0]\",";
							echo "\"$students[3]\",";
							echo "\"$students[1]\"";
						echo "]";
						if($i<$size)
							echo ",\n";

							$i++;
					}

					echo "]}";
?>