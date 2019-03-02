<?php

include_once("connection.php");

$pid=$_GET['pid'];
$query="select distinct doctor from consultation where pid='$pid'";

$table=mysqli_query($dbcon,$query);

$all=array();

while($row=mysqli_fetch_array($table))
{
    $all[]=$row;
}

echo json_encode($all);
?>