<?php
    session_start();
    include_once("connection.php");
    include_once("SMS_OK_sms.php");

        $uid=$_GET["luid"];
        $_SESSION["uid"]=$uid;

$query="select * from mediassist where uid='$uid'";
$table=mysqli_query($dbcon,$query);
if(mysqli_num_rows($table)==0)
    echo "Invalid Email id!";
else
{
        $_SESSION["uid"]=$uid;
        $row=mysqli_fetch_array($table);
        $mobile=$row["mobile"];
        $name=$row["name"];
        $msg="Dear " .$row['name'] ." your medi-assist login password is: " .$row['pwd'];
        $_SESSION["mobile"]=$mobile;
        $_SESSION["name"]=$name;
        
            echo SendSMS("$mobile","$msg");
}

?>