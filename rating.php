<?php 
if(isset($_POST)){
	include_once("connection.php");
    $hname=$_POST['$hname'];
    $did=$_POST['$did'];
    $rating=$_POST['$rating'];
    $query="insert into rating values('$hname','$did','$rating')";
    mysqli_query($dbcon,$query);
	if(mysqli_affected_rows($dbcon))
       {
		echo "1";		
	}
    else
    {
		echo "2";
	}
}
?>