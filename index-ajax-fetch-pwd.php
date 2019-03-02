<?php
include_once("connection.php");
$luid=$_GET["luid"];
$query="select pwd from mediassist where uid='$luid'";
$table=mysqli_query($dbcon,$query);
$count=mysqli_num_rows($table);
if($count==0)
{
    echo "Invalid uid";
}
else
{
    $row=mysqli_fetch_array($table);
    echo $row["pwd"];
}



?>