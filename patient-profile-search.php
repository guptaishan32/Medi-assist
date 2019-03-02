<?php

include_once("connection.php");

$ppid=$_GET["ppid"];

$query="select * from patient where ppid='$ppid'";

$table=mysqli_query($dbcon,$query);

$all=array();

while($row=mysqli_fetch_array($table))
{
    $all[]=$row;
}

echo json_encode($all);
?>