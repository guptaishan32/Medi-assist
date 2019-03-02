<?php
session_start();
include_once("connection.php");
$uid=$_POST["suid"];
$_SESSION["uid"]=$uid;
$name=$_POST["sname"];
$_SESSION["name"]=$name;
$spwd=$_POST["spwd"];
$mobile=$_POST["smobile"];
$_SESSION["mobile"]=$mobile;
$category=$_POST["category"];
$query="insert into mediassist values('$uid','$name','$spwd','$mobile','$category',current_date,current_time)";
mysqli_query($dbcon,$query);
if(mysqli_error($dbcon)=="")
{
    if(isset($category) && ($category) == "Doctor")
    {
        header("location:doctor-profile.php");
    }
elseif(isset($category) && ($category) == "Patient")
        {
        header("location:patient-dashboard.php");
    }
}
else
    echo mysqli_error($dbcon);
/*header("location:patient-dashboard.php?&sname=".$sname."&suid=".$suid);*/
?>