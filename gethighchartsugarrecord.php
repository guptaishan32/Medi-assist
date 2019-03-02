<?php
session_start();
include_once("connection.php");
$pid=$_SESSION['uid'];
$query="select slevel,date from sugar_record where pid='$pid'";

$resp=mysqli_query($dbcon,$query);

$date=array();
$date['date']="Date";


$slevel=array();
$slevel['slevel']="Sugar Level";

while($row=mysqli_fetch_array($resp))
	{
		$date['data'][]=$row["date"];
		$slevel['data'][]=$row["slevel"];
    }
	$result=array();
	array_push($result,$date);
	array_push($result,$slevel);
	echo json_encode($result,JSON_NUMERIC_CHECK);
	
?>


