<?php
include_once("connection.php");
$suid=$_GET["suid"];
$spwd=$_GET["spwd"];
$smobile=$_GET["smobile"];
$category=$_GET["category"];
$query="insert into mediassist values('$suid','$spwd','$smobile','$category',current_date,current_time)";
mysqli_query($dbcon,$query);
if(mysqli_error($dbcon)=="")
    echo "Signup Successful";
else
    echo mysqli_error($dbcon);

?>