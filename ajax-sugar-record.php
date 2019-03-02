<?php

include_once("connection.php");
$pid=$_GET["pid"];
$sugartype=$_GET["sugartype"];
$category=$_GET["category"];
$slevel=$_GET["slevel"];
$sdate=$_GET["sdate"];
$stime=$_GET["stime"];

$query="insert into sugar_record values('$pid','$sugartype','$category','$slevel','$sdate','$stime')";

mysqli_query($dbcon,$query);
if(mysqli_error($dbcon)=="")
    echo "Record Saved";
else
    echo mysqli_error($dbcon);


?>