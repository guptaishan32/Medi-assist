<?php

include_once("connection.php");
$rname=$_GET["rname"];
$rdid=$_GET["rdid"];
$review=$_GET["review"];
$star=$_GET["star"];

$query="insert into rating values('$rname','$rdid','$review','$star')";

mysqli_query($dbcon,$query);
if(mysqli_error($dbcon)=="")
    echo "Your Review Saved";
else
    echo mysqli_error($dbcon);




?>