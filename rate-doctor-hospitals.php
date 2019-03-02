<?php

include_once("connection.php");

$hlist=$_GET["hlist"];

$query="select distinct name from doctors where hospital='$hlist'";

$table=mysqli_query($dbcon,$query);

$all=array();

while($row=mysqli_fetch_array($table))
{
    $all[]=$row;
}

echo json_encode($all);
?>