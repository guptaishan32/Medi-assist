<?php

include_once("connection.php");

$doctor=$_GET["doctor"];

$query="delete from consultation where doctor='$doctor'";

mysqli_query($dbcon,$query);

if(mysqli_affected_rows($dbcon)>0)
    echo "Deleted";
else
    echo "invalid id"; 
?>