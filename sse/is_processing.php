<?php
	include("../phpscripts/config.php");

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
	$selQuery = "SELECT username,is_processing FROM admin order by is_processing desc";
	$result = pg_query($dbconn,$selQuery);
	

echo "retry: 3000\n";
echo "data: " ;
	$i=0;
	while($row = pg_fetch_row($result)){
				
					echo "<div class='box'>";
					if($row[1]!="")
					echo "<div style='background:#CCCCCC;padding:0px 10px'>$row[1]</div>";
					else
					echo "<div style='background:#CCCCCC;padding:0px 10px'>NONE</div>";
					echo "$row[0]</div>";
					$i++;
					if($i==4)
				{
					$i=0;
					echo "<br>";
				}
	}
	

echo "\n\n";

flush();
?>
