<?php
session_start();
include_once("connection.php");
    
        $pid=$_SESSION['uid'];
        $query="select high,low,date from bp_record where pid='$pid'";
    
        $resp=mysqli_query($dbcon,$query);

        $date=array();
        $date['date']="Date";


        $high=array();
        $high['high']="Bp High";

        $low=array();
        $low['low']="Bp Low";

        while($row=mysqli_fetch_array($resp))
            {
                $date['data'][]=$row["date"];
                $high['data'][]=$row["high"];
                $low['data'][]=$row["low"];
            }
    
            $result=array();
            array_push($result,$date);
            array_push($result,$high);
            array_push($result,$low);
            echo json_encode($result,JSON_NUMERIC_CHECK);
    
?>


