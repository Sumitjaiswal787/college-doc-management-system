<?php
if(isset($_POST["export"]))
{
	$connect= mysqli_connect("localhost","root","","fainal");
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');
	$output = fopen("php://output", "w");
	fputcsv($output,array('sr.no','auth','des','dep','act','date','org','title'));
	$query ="SELECT * FROM  data ";
	$result= mysqli_query($connect,$query);
	while($row = mysqli_fetch_assoc($result))
	{
		fputcsv($output,$row);
	}
	fclose($output);
}
?>





