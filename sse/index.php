<!DOCTYPE html>
<html>
	<head> 
		<link href="../css/bootstrap.css" type="text/css" rel="stylesheet">
		<link href="../css/buttons.css" type="text/css" rel="stylesheet">
		<link href="../css/jquery.dataTables.css" type="text/css" rel="stylesheet">
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/jquery.dataTables.js"></script>
	</head>
<body>

<h1>Getting server updates</h1>
<div id="result"></div>
	
<script>
if(typeof(EventSource) !== "undefined") {
    var source = new EventSource("sse.php");
    source.onmessage = function(event) {
        document.getElementById("result").innerHTML = event.data + "<br>";
 		$('#livefeed').DataTable({
 			  "order": [[ 2, "asc" ]]
 		});
    };
} else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
}
</script>

</body>
</html>

