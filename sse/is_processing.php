<?php
	include("../phpscripts/config.php");

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
	$selQuery = "SELECT username,is_processing FROM admin";
	$result = pg_query($dbconn,$selQuery);
	

echo "retry: 3000\n";
echo "data: " ;
	$i=0;
	echo "<h3 style='background-color:#8FE3CB'>";
	while($row = pg_fetch_row($result)){
				if($i==3)
				{
					$i=0;
					echo "<br>";
				}
					echo "<span style='background-color:#E3A28F'>$row[0]:";
					if($row[1]!="")
					echo "$row[1]</span>&nbsp&nbsp&nbsp";
					else
					echo "NONE</span>&nbsp&nbsp&nbsp";
					$i++;
	}
	echo "</h3>";

echo "\n\n";

flush();
?>
