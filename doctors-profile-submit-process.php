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
    $ddid=$_POST['ddid'];
    $ddname=$_POST['ddname'];
    $ddage=$_POST['ddage'];
    $ddqual=$_POST['ddqual'];
    $ddexp=$_POST['ddexp'];
    $orgName = $_FILES["pic"]["name"];
    $tmpName = $_FILES["pic"]["tmp_name"];
    $dzipcode=$_POST['dzipcode'];
    $dhospital=$_POST['dhospital'];
    $dhadd=$_POST['dhospitaladd'];
    $dcity=$_POST['dcity'];
    $dmobile=$_POST['dmobile'];

     $picpath="uploads/".$orgName;
    move_uploaded_file($tmpName,$picpath);
    $query="insert into doctors values('$ddname','$ddage','$picpath','$ddqual','$ddexp','$dhospital','$dzipcode','$dhadd','$dcity','$dmobile','$ddid')";

    mysqli_query($dbcon,$query);

    if(mysqli_error($dbcon)=='')
    {
        if(mysqli_affected_rows($dbcon)!=0)
           header("location:doctor-result-page.php?msg=Record Submitted Sucessfully");
        
        else
           header("location:doctor-result-page.php?msg=Record Not Found"); 
    }
    else
        echo (mysqli_error($dbcon));


}
function doUpdate($dbcon)
{
     $ddid=$_POST['ddid'];
    $ddname=$_POST['ddname'];
    $ddage=$_POST['ddage'];
    $ddqual=$_POST['ddqual'];
    $ddexp=$_POST['ddexp'];
    $orgName = $_FILES["pic"]["name"];
    $tmpName = $_FILES["pic"]["tmp_name"];
    $dzipcode=$_POST['dzipcode'];
    $dhospital=$_POST['dhospital'];
    $dhadd=$_POST['dhospitaladd'];
    $dcity=$_POST['dcity'];
    $dmobile=$_POST['dmobile'];

    if($orgName=="")
    {
        $picpath=$_POST["hdn"];
    }
    else
    {
        $picpath="uploads/".$orgName;
        move_uploaded_file($tmpName,$picpath);
    }
    
    
    $query="update doctors set name='$ddname', age='$ddage',pic='$picpath',qual='$ddqual', exp='$ddexp',hospital='$dhospital',zipcode='$dzipcode',hadd='$dhadd',city='$dcity',mobile='$dmobile',ddid='$ddid' where ddid='$ddid'";
    
   mysqli_query($dbcon,$query);
   if(mysqli_error($dbcon)=="")
    {
        if(mysqli_affected_rows($dbcon)!=0)
            header("location:doctor-result-page.php?msg=Record Updated Sucessfully");
        else
            header("location:doctor-result-page.php?msg=Record Not Updated");

    }
    else
        echo mysqli_error($dbcon);
}


?>