<?php

include_once("connection.php");

$nextdate=$_GET["nextdate"];
$pid=$_GET["pid"];
$doctor=$_GET["doctor"];

$query="delete from consultation where nextdate='$nextdate' and pid='$pid'and doctor='$doctor'";
/*pid='$pid',doctor='$doctor*/
mysqli_query($dbcon,$query);

if(mysqli_affected_rows($dbcon)>0)
    echo "Appointment Cancelled";
else
    echo "invalid id"; 
?>