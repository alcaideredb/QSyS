<?php
	include("../phpscripts/config.php");

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
	$selQuery = "SELECT * FROM processed where status='f' ORDER BY slot_id ";
	$result = pg_query($dbconn,$selQuery);
	

echo "retry: 3000\n";
echo "data: <table  id=\"livefeed\" >" ;
	echo "<thead>";
		echo "<th>Server </th>";
		echo "<th>Slot </th>";
	echo "</thead>";
	echo "<tbody>";
	while($row = pg_fetch_row($result)){
			echo "<tr style='font-size:2em'>";

					echo "<td>$row[0]</td>";
					echo "<td style='width:1em'>$row[1]</td>";
			echo "</tr>";

	}
	echo "</tbody>";
echo "</table>";

echo "\n\n";

flush();
?>
