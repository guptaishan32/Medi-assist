<?php

include_once("connection.php");
$fpid=$_GET["fpid"];
$flike=$_GET["flike"];
$fimprove=$_GET["fimprove"];
$fsug=$_GET["fsug"];

$query="insert into feedback values('$fpid','$flike','$fimprove','$fsug')";

mysqli_query($dbcon,$query);
if(mysqli_error($dbcon)=="")
    echo "Your Feedback Is Highly Appreciated!";
else
    echo mysqli_error($dbcon);




?>