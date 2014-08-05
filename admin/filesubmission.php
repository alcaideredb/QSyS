<?php
	include("../phpscripts/config.php");
	
    function get2DArrayFromCsv($file,$delimiter) { 
    		if(!file_exists($file) || !is_readable($file))
			return FALSE;
		$data2darray[] = array();
        if (($handle = fopen($file, "r")) !== FALSE) { 
            $i = 0; 
         
            while(!feof($handle))
            {
            	$data2darray[$i]= fgetcsv($handle,"\t");
            	$i++;
            }
         


            fclose($handle); 
        } 

     

    	return $data2darray;
	}

		error_reporting(0);
if($_POST['uploadByFile']=='yes'){
	$allowedTypes = array(
    'text/csv',
    'text/plain',
    'application/csv',
    'text/comma-separated-values',
    'application/excel',
    'application/vnd.ms-excel',
    'application/vnd.msexcel',
    'text/anytext',
    'application/octet-stream',
    'application/txt',
    'application/download',
);
if (in_array($_FILES["file"]["type"], $allowedTypes)) {
    //Do your work

		$data = get2DArrayFromCsv($_FILES["file"]["tmp_name"],',');
		$errors = array();
		$errinc = 0;
		for($i=1;$i< count($data) - 1;$i++)
		{
			$student_num = $data[$i][0];
			$name = $data[$i][1];
			$birthdaydate = new DateTime($data[$i][2]);
			$pin = $data[$i][3];
	//	echo "$birthday.<br>";
			$birthday = $birthdaydate->format('Y-m-d');
			
			$query = "INSERT into Users (student_num,name,birthday,pin_num) values ($student_num,'$name',to_date('$birthday','YYYY-MM-DD'),md5('$pin'));";
			$results = pg_query($dbconn,$query);

			if(!$results)
				$errors[$errinc++] = $i;
		}
		if(count($errors)>0)
		{
			echo "Error on rows: ";
			echo $errors[0];
			for($i = 1; $i < count($errors); $i++)
			{
				echo ",$errors[$i] ";
			}
			echo "<br>The entry may exist already or an entry doesn't follow the format.";
		}
		else
		{
			echo "Adding Student/s Success!!!";
		}
}
else
{
	echo "Invalid Input File or invalid entry!!!";
}

}
else
{
	$name = $_POST['name'];

	$student_num = $_POST['studentNum'];
	$pin = $_POST['pin'];
	$birthday = $_POST['birthday'];

	echo $name." ".$student_num." ".$pin." ".$birthday;
	$query = "INSERT into Users (student_num,name,birthday,pin_num) values ($student_num,'$name',to_date('$birthday','YYYY-MM-DD'),md5('$pin'));";
	$results = pg_query($dbconn,$query);
	if(!$results)
	{
		echo pg_last_error($dbconn);
	}
	else
	{
		echo "Adding new student success!";
	}
}
?>
<html>
	<head></head>
	<body>

		<a href="addstudents.php"><br>Back</a>
	</body>
</html>