<?php

include_once("connection.php");

$pid=$_GET['pid'];
$query="select * from consultation where pid='$pid' order by nextdate";

$table=mysqli_query($dbcon,$query);

$all=array();
while($row=mysqli_fetch_array($table))
{
    $all[]= $row;
}

echo json_encode($all);
?>