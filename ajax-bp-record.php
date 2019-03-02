<?php

include_once("connection.php");

$pid=$_GET["pid"];
$low=$_GET["low"];
$high=$_GET["high"];
$date=$_GET["date"];
$time=$_GET["time"];

$query="insert into bp_record values('$pid','$low','$high','$date','$time')";

mysqli_query($dbcon,$query);
if(mysqli_error($dbcon)=="")
    echo "Record Saved";
else
    echo mysqli_error($dbcon);

?>