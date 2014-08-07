<?php
	include("../phpscripts/config.php");

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
	$selQuery = "SELECT * FROM QUEUE ORDER BY day_id,slot_id";
	$result = pg_query($dbconn,$selQuery);
	

echo "retry: 3000\n";
echo "data: <table id=\"livefeed\">" ;
	echo "<thead>";
		echo "<th>Slot </th>";
		echo "<th>ID </th>";
		echo "<th> Day</th>";
	echo "</thead>";
	while($row = pg_fetch_row($result)){
			echo "<tr>";

					echo "<td>$row[0]</td>";
					echo "<td>$row[1]</td>";
					echo "<td>$row[2]</td>";
			echo "</tr>";

	}

echo "</table>";

echo "\n\n";

flush();
?>
