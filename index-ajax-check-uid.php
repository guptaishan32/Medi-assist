<?php
    include_once("connection.php");
    $suid=$_GET["suid"];
    $query="select * from mediassist where uid='$suid'";
    
    $table=mysqli_query($dbcon,$query);
    
    if(mysqli_num_rows($table)==0)
        echo "Available";
    else
        echo "Mail Id Already Exits";

?>