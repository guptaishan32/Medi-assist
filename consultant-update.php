<?php

include_once("connection.php");
    $pid=$_POST['pid'];
    $doctors=$_POST['doctor'];  
    $cdate=$_POST['cdate'];
    $orgName = $_FILES["pic"]["name"];
    $tmpName = $_FILES["pic"]["tmp_name"];
    $inst=$_POST['instruction'];
    $doc=$_POST['doc'];
    if($orgName=="")
    {
        $picpath=$_POST["hdn"];
    }
    else
    {
        $picpath="uploads/".$orgName;
    
    move_uploaded_file($tmpName,$picpath);
    }
    
   $query="update consultant set pid='$pid',doctor='$doctors',cdate='$cdate',reportpic='$picpath',inst='$inst',nextdate='$doc' where pid='$pid' AND doctor='$doctors'";
    
   mysqli_query($dbcon,$query);
   if(mysqli_error($dbcon)=="")
    {
        if(mysqli_affected_rows($dbcon)!=0)
            echo "Record Updated";
        else
            echo "Record not Updated...";

    }
    else
        echo mysqli_error($dbcon);

?>