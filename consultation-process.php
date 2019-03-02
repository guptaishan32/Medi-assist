<?php
    session_start();
include_once("connection.php");
$pid=$_POST['pid'];
$doctors=$_POST['doctor'];
$cdate=$_POST['cdate'];
$orgName = $_FILES["pic"]["name"];
$tmpName = $_FILES["pic"]["tmp_name"];
$inst=$_POST['instruction'];
$doc=$_POST['doc'];

 $picpath="uploads/".$orgName;
move_uploaded_file($tmpName,$picpath);
$query="insert into consultation values('$pid','$doctors','$cdate','$picpath','$inst','$doc')";

mysqli_query($dbcon,$query);

if(mysqli_error($dbcon)=='')
{
    if(mysqli_affected_rows($dbcon)!=0)
    {
       header("location:consultant-page-result.php?msg=Record Submitted Sucessfully");
        
    }
    else
       header("location:consultant-page-result.php?msg=Record Not Found");
}
else
    echo (mysqli_error($dbcon));
?>