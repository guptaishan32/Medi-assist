<?php

include_once("connection.php");

$ddid=$_GET["ddid"];

$query="select * from doctors where ddid='$ddid'";

$table=mysqli_query($dbcon,$query);

$all=array();

while($row=mysqli_fetch_array($table))
{
    $all[]=$row;
}

echo json_encode($all);
?>