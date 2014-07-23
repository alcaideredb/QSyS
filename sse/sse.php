<?php
$i=0;$i++;
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$time = date('r');
echo "retry: 1000\n";
echo "data: Gwapo si $i\n\n";
$i++;
flush();
?>
<?php $i++;?>