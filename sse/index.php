<!DOCTYPE html>
<html>
	<head> 
		<link href="../css/bootstrap.css" type="text/css" rel="stylesheet">
		<link href="../css/buttons.css" type="text/css" rel="stylesheet">
        <link href="../css/jquery.dataTables.css" type="text/css" rel="stylesheet">
        <link href="box.css" type="text/css" rel="stylesheet">
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/jquery.dataTables.js"></script>
	</head>
<body>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Processing Queue</h4>
      </div>
      <div class="modal-body">
        
                <div id="result"></div>
                      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModalEval" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Processing Queue</h4>
      </div>
      <div class="modal-body">
        
                <div id="resulteval"></div>
                      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>







<h1 style="text-align:center">Getting server updates</h1>
<br>
<h2>Processing</h2>
<div id="processing" style="float:left"></div>
	

<script>
if(typeof(EventSource) !== "undefined") {
    var source = new EventSource("sse.php");
    source.onmessage = function(event) {
        document.getElementById("result").innerHTML = event.data + "<br>";
 		$('#livefeed').DataTable({
 		  "order": [[ 1, "asc" ]]
    		});
    };
} else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
}
</script>

<script>
if(typeof(EventSource) !== "undefined") {
    var source = new EventSource("sseval.php");
    source.onmessage = function(event) {
        document.getElementById("resulteval").innerHTML = event.data + "<br>";
    $('#livefeedeval').DataTable({
      "order": [[ 1, "asc" ]]
        });
    };
} else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
}
</script>

<script>
if(typeof(EventSource) !== "undefined") {
    var source = new EventSource("is_processing.php");
    source.onmessage = function(event) {
        document.getElementById("processing").innerHTML = event.data + "<br>";
 	
    };
} else {
    document.getElementById("processing").innerHTML = "Sorry, your browser does not support server-sent events...";
}
</script>








<div style="margin: 30em 1em;float:clear">
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
 Processing Queue
</button>
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalEval">
 Evaluation Queue
</button>

</div>
</body>
</html>

