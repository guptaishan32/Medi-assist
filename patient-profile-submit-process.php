<?php

include_once("connection.php");

 $btn=$_POST["btn"];

if($btn=="save")
{
    doSave($dbcon);
}
else
{
    doUpdate($dbcon);
}

function doSave($dbcon)
{
    $ppid=$_POST['ppid'];
    $ppname=$_POST['ppname'];
    $ppage=$_POST['ppage'];
    $ppzipcode=$_POST['ppzipcode'];
    $ppcity=$_POST['ppcity'];
    $ppmobile=$_POST['ppmobile'];
    $ppadd=$_POST['ppadd'];
    $ppod=$_POST['ppod'];

    $query="insert into patient values('$ppid','$ppname','$ppage','$ppzipcode','$ppcity','$ppmobile','$ppadd','$ppod')";

    mysqli_query($dbcon,$query);

    if(mysqli_error($dbcon)=='')
    {
        if(mysqli_affected_rows($dbcon)!=0)
            header("location:profile-result.php?msg=Record Submitted Sucessfully");
        else
           header("location:profile-result.php?msg=Record Not Found");
    }
    else
        echo (mysqli_error($dbcon));


}
function doUpdate($dbcon)
{
    $ppid=$_POST['ppid'];
    $ppname=$_POST['ppname'];
    $ppage=$_POST['ppage'];
    $ppzipcode=$_POST['ppzipcode'];
    $ppcity=$_POST['ppcity'];
    $ppmobile=$_POST['ppmobile'];
    $ppadd=$_POST['ppadd'];
    $ppod=$_POST['ppod'];
        
    $query="update patient set ppid='$ppid', ppname='$ppname',ppage='$ppage', ppzipcode='$ppzipcode',ppcity='$ppcity',ppmobile='$ppmobile',ppadd='$ppadd',ppod='$ppod' where ppid='$ppid'";
    
   mysqli_query($dbcon,$query);
   if(mysqli_error($dbcon)=="")
    {
        if(mysqli_affected_rows($dbcon)!=0)
            header("location:profile-result.php?msg=Record Updated Sucessfully");
        else
            header("location:profile-result.php?msg=Record Not Updated by user");

    }
    else
        echo mysqli_error($dbcon);
}


?>
