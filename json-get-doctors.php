<?php

include_once("connection.php");
/*$pid=$_GET['pid'];*/
$query="select doctor from consultation";

$table=mysqli_query($dbcon,$query);

$all=array();
while($row=mysqli_fetch_array($table))
{
    $output['doctor'][]= $row;
}

echo json_encode($output);
?>