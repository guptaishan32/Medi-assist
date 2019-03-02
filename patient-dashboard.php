<?php
    session_start();
    if(isset($_SESSION["uid"])==false)
    {
        header("location:index.php");
    }

?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Patient-Dashboard</title>

        <!--CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/fontawesome-all.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/rating.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/header.css">

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-1.9.1.js"></script>
            <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script src="js/highcharts.js"></script>
        <script src="js/exporting.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/fontawesome-all.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                fillallhospitals();
                /*filldoctors();*/
                $("#sugarsave").click(function() {
                    $q = $("#sfrm").serialize();
                    /*alert($q);*/
                    $url = "ajax-sugar-record.php?" + $q;
                    $.get($url, function(result) {
                        /*alert(result);*/
                        $("#sugarresult").html(result);

                    });
                });

                $("#bpsave").click(function() {
                    $q = $("#bpfrm").serialize();
                    /*alert($q);*/
                    $url = "ajax-bp-record.php?" + $q;
                    $.get($url, function(result) {
                        /*alert(result);*/
                        $("#bpresult").html(result);

                    });
                });

                $("#ratingsubmit").click(function() {
                    $q = $("#ratingfrm").serialize();
                    /*alert($q);*/
                    $url = "rating-process.php?" + $q;
                    $.get($url, function(result) {
                        /*alert(result);*/
                        $("#ratingresult").html(result);

                    });
                });
                 $("#resett").hide();
                $("#feedbacksubmit").click(function() {
                    $q = $("#feedbackfrm").serialize();
                    /*alert($q);*/
                    $url = "feedback-processpage.php?" + $q;
                    $.get($url, function(result) {
                        /*alert(result);*/
                        if(result=="Your Feedback Is Highly Appreciated!")
                            {
                                $("#feedbackresult").html(result);
                                $("#resett").show();
                            }
                        else
                            {
                                   $("#feedbackresult").html(result);
                                    $("#resett").hide();
                            }
                     
                        

                    });
                });



                   
           function fillallhospitals()
            {
                $.getJSON("rate-fetch-all-hospitals.php",function(jsonArray){
                  /*  alert(JSON.stringify(jsonArray));*/
                    
                    for(i=0;i<jsonArray.length;i++)
                        {
                            /*alert(jsonArray[i].hospital);*/
                            $("#rname").append("<option value='"+jsonArray[i].hospital+"'></option>");
                        }
                    
                });
            }  

            $("#hlist").change(function(){
                /*alert();*/
                $hlist=$("#hlist").val();
                $.getJSON("rate-doctor-hospitals.php?hlist="+$hlist,function(jsonArray){
//                    alert(JSON.stringify(jsonArray));
                    
                    for(i=0;i<jsonArray.length;i++)
                        {
                            alert(jsonArray[i].name);
                            $("#rdid").append("<option value='"+jsonArray[i].name+"'></option>");
                        }
                    
                    });
                });    
            });

        </script>
        <style>
         #resett
        {
            display: none;
        }

        </style>
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip(); 
            });
            </script>


    </head>

    <body class="body">
                    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
       
       <!--Desktop Header-->
    <div id="headerinfoline1" class="fixed-top">
   <div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 d-none d-sm-block">
            <center>
                <a href="patient-dashboard.php"><img src="pics/4%20png.png" id="headerlogo"></a>
            </center>
        </div>
        <div class="col-lg-7 d-sm-none d-none d-lg-block" style="margin-top:4px" id="headername">
            <center>
                MEDI-ASSIST
            </center>
        </div>
        <div class="col-lg-3 d-sm-none d-none d-lg-block float-right" id="headerid">
            <div style="margin-top:10px; margin-left:100px"><h6>Welcome: <?php echo $_SESSION["name"]; ?> </h6></div>
            <div class="d-lg-inline-flex float-right" style="margin-right:20px">
            <div><a href="patient-dashboard.php" class="text-primary" value="home"><h5>Home</h5></a></div>
            &emsp;
            <div><a href="logout.php" class="text-danger" value="logout"><h5>Logout</h5></a></div>
            </div>
                </div>
        </div>
    </div>
    </div>
        <!--Mobile Header-->
        <div class="fixed-top">
    <div id="headerinfolinem">
       <div class="container-fluid">
    <div class="row">
       <div class="col-4 d-block d-sm-none" style="margin-top:4px">
             <center>
                 <a href="patient-dashboard.php"><img src="pics/4%20png.png" id="headerlogom"></a>
            </center>
       </div>
        <div class="col-8 d-block d-sm-none float-right" style="margin-top:7px">
            <center>
                <h4>MEDI-ASSIST</h4>
            </center>
        </div>
    </div>
    </div>
    </div>
       <div id="headerinfoline">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-8 d-block d-sm-none">
                       <div style="font-size:13px; margin-top:10px">Welcome:<?php echo $_SESSION["name"]; ?></div>
                   </div>
                   <div class="col-4 d-block d-sm-none float-left">
                       <div class="d-inline-flex d-block d-sm-none" style="font-size:12px; margin-top:10px">
                        <div><a href="patient-dashboard.php" class="text-dark" value="home">Home</a></div>
                        &nbsp;&nbsp;
                        <div><a href="logout.php" class="text-danger" value="logout">Logout</a></div>
                        </div>
                   </div>
               </div>
           </div>
       </div>
        </div>
               
    <!--Tablet Version-->
        <div class="fixed-top">
    <div id="headerinfolinem">
       <div class="container-fluid">
    <div class="row">
       <div class="col-4 d-sm-block d-lg-none d-none" style="margin-top:4px">
             <center>
                 <a href="patient-dashboard.php"><img src="pics/4%20png.png" id="headerlogom"></a>
            </center>
       </div>
        <div class="col-8 d-sm-block d-lg-none d-none float-right" style="margin-top:7px">
            <center>
                <h1>MEDI-ASSIST</h1>
            </center>
        </div>
    </div>
    </div>
    </div>
       <div id="headerinfoline">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-8 d-sm-block d-lg-none d-none">
                       <div style="font-size:15px; margin-top:10px; margin-right:10px"><h4>Welcome: <?php echo $_SESSION["name"]; ?></h4></div>
                   </div>
                   <div class="col-4 d-sm-block d-lg-none d-none">
                      <center>
                       <div class="d-sm-inline-flex d-sm-block d-lg-none d-none" style="font-size:15px; margin-top:10px">
                        <div><a href="patient-dashboard.php" class="text-dark" value="home"><h4>Home</h4></a></div>
                        &nbsp;&nbsp;
                        <div><a href="logout.php" class="text-danger" value="logout"><h4>Logout</h4></a></div>
                        </div>
                       </center>
                   </div>
               </div>
           </div>
       </div>
        </div>
        


        <!--Header image-->
        <!--Desktop Version-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 d-sm-none d-none d-lg-block" style="margin-top:70px">
                    <img src="pics/header2.jpg" id="desimg" class="img-fluid">
                </div>
                <div class="col-sm-12 d-sm-none d-none d-lg-block">
                        <center><div id="infolines">Patient Dashboard</div></center>
                </div>
            </div>
        </div>

        <!--Mobile Version-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-block d-sm-none" style="margin-top:70px">
                    <img src="pics/headermobile.jpg" id="desimg" class="img-fluid">
                </div>
                <div class="col-12 d-block d-sm-none">
                    <center><div id="infolines">Patient Dashboard</div></center>            
                </div>
            </div>
        </div>
        
        <!--Tablet Version-->
                <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-sm-block d-lg-none d-none" style="margin-top:70px">
                    <img src="pics/headermobile.jpg" id="desimg" class="img-fluid">
                </div>
                <div class="col-12 d-sm-block d-lg-none d-none">
                    <center><div id="infolines">Patient Dashboard</div></center>            
                </div>
            </div>
        </div>

        <br>
        <!--Cards-->
        <div class="container">
            <div class="card-deck">
                <!--Record Sugar-->
                <div class="card col-md bg-light border-info" id="card" data-toggle="modal" data-target="#sugarmodal">
                    <center><img class="card-img-top" src="pics/monitoring-form-icon.png" alt="Sugar Record" id="cardimg"></center>
                    <div class="card-body">
                        <center>
                            <h4 class="card-title" id="cardtitle">Record Sugar</h4>
                        </center>
                        <p class="card-text" id="cardpara">You will be able to record your your blood sugar readings over time. Before-meal normal sugars are 70–99 mg/dl. “Postprandial” sugars taken two hours after meals should be less than 140 mg/dl. </p>
                        <center><a href="#" class="btn btn-primary">Record Sugar</a></center>
                    </div>
                </div>
                <!--Record Bp-->
                <div class="card col-md border-info bg-light" id="card" data-toggle="modal" data-target="#bpmodal">
                    <center><img class="card-img-top" src="pics/20-512.png" alt="BP Record" id="cardimg"></center>
                    <div class="card-body">
                        <center>
                            <h4 class="card-title" id="cardtitle">Record BP</h4>
                        </center>
                        <p class="card-text" id="cardpara">You will be able to record your your blood pressure readings over time.Normal Systolic pressure is below 120. Normal Diastolic pressure is lower than 80.</p><br>
                        <center><a href="#" class="btn btn-primary">Record BP</a></center>
                        <!--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
                    </div>
                </div>
                <!--BP Chart-->
                 <!--data-toggle="modal" data-target="#sugarchart"-->
                <div class="card col-md border-info bg-light" id="card">
                    <center><img class="card-img-top" src="pics/performance-png-5.png" alt="Card image cap" id="cardimg"></center>
                    <div class="card-body">
                        <center>
                            <h4 class="card-title" id="cardtitle">Sugar Chart</h4>
                        </center>
                        <p class="card-text" id="cardpara">Knowing your blood sugar level quickly can help alert you to when your sugar level has fallen or risen outside the target range.We always keeps track of your sugar level by showing them on high charts.</p>
                        <center><a href="highchartssugar.php" class="btn btn-primary">Click Here</a></center>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!--Card row 2-->
        <div class="container">
            <div class="card-deck">
                <!--Bp chart-->
                <!--data-toggle="modal" data-target="#bpchart"-->
                <div class="card col-md border-info bg-light" id="card" >
                    <center><img class="card-img-top" src="pics/medical-chart-icon-31.png" alt="Card image cap" id="cardimg"></center>
                    <div class="card-body">
                        <center>
                            <h4 class="card-title" id="cardtitle">BP chart</h4>
                        </center>
                        <p class="card-text" id="cardpara">Blood Pressure(BP) monitoring is one of the principal vital signs.We always Keeps track of your Blood Preesure by showing them on high charts.</p>
                        <center><a href="highchartsbp.php" class="btn btn-primary">Click Here</a></center>
                    </div>
                </div>
                <!--Consultant-->
                <div class="card col-md border-info bg-light" href="consultant.php" role="link" id="card">
                    <center><img class="card-img-top" src="pics/a-12-512.png" alt="Doctor Consultant" id="cardimg"></center>
                    <div class="card-body">
                        <center>
                            <h4 class="card-title" id="cardtitle">Doctor Consultant</h4>
                        </center>
                        <p class="card-text" id="cardpara">Record prescription provided by doctor here.You can also upload the prescription image and can also schedule next consultation.</p>
                        <br>
                        <center> <a href="consultant.php" class="btn btn-primary">Record</a></center>
                        <!--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
                    </div>
                </div>
                <!--Show Consultations-->
                <div class="card col-md border-info bg-light" href="consultant.php" role="link" id="card">
                    <center><img class="card-img-top" src="pics/5-512.png" alt="Doctor Consultant" id="cardimg"></center>
                    <div class="card-body">
                        <center>
                            <h4 class="card-title" id="cardtitle">Show Consultations</h4>
                        </center>
                        <p class="card-text" id="cardpara">See all your upcoming and previous Consulations. You can also delete the record of prev. consultations if you want. </p>
                        <br>
                        <center>
                            <a href="show-consultations.php" class="btn btn-primary">Show</a></center>
                        <!--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!--Card row 3-->
        <div class="container">
            <div class="card-deck">
                <!--Doctor Rating-->
                <div class="card col-md border-info bg-light" data-toggle="modal" data-target="#doctorrating" id="card">
                    <center><img class="card-img-top" src="pics/rating.png" alt="Doctor Consultant" id="cardimg"></center>
                    <div class="card-body">
                        <center>
                            <h4 class="card-title" id="cardtitle">Rate Your Doctor</h4>
                        </center>
                        <p class="card-text" id="cardpara">Rate your doctor and write Your reviews.</p>
                        <center><a href="#" class="btn btn-primary">Rate</a></center>
                        <!--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
                    </div>
                </div>
                <!--Patient Profile-->
                <div class="card col-md border-info bg-light" id="card">
                    <center> <img class="card-img-top" src="pics/user-male-circle-blue-512.png" alt="Card image cap" id="cardimg"></center>
                    <div class="card-body">
                        <center>
                            <h4 class="card-title" id="cardtitle">Patient Profile</h4>
                        </center>
                        <p class="card-text" id="cardpara">Update and complete your profile.</p>
                        <br>
                        <center><a href="patient-profile.php" class="btn btn-primary">Click Here</a></center>
                        <!--    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
                    </div>
                </div>
                <div class="card col-md border-info bg-light" data-toggle="modal" data-target="#feedback" id="card">
                    <center><img class="card-img-top" src="pics/Is-your-customer-feedback-languishing-in-excel-part-2_5-300x300.png" alt="Feedback" id="cardimg"></center>
                    <div class="card-body">
                        <center>
                            <h4 class="card-title" id="cardtitle">Feedback</h4>
                        </center>
                        <p class="card-text" id="cardpara">Share Your Experience on @medi-assist.</p>
                        <center><a href="#" class="btn btn-primary">Feedback</a></center>
                        <!--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
                    </div>
                </div>
            </div>
        </div>
        <br>
         <?php include_once("footer.php") ?>

        <!--Sugar Modal-->
        <div class="modal fade" id="sugarmodal" tabindex="-1" role="dialog" aria-labelledby="SugarTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modalcolor">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                    </button>
                        <div class="align-content-center" id="SugarTitle">
                            <center><img src="pics/sugar.jpg" alt="Sugar Record" id="modalimg">
                                <h5 class="">Record Your Sugar</h5>
                            </center>
                        </div>
                    </div>
                    <div class="modal-body modalbodyy">
                        <form action="" id="sfrm">
                            <!--Patient Id-->
                            <div class="form-row container">
                                <div class="form-group form-check-inline col-md-4 modalheadings ">
                                    <h5>Patient Id :</h5>
                                </div>
                                <fieldset disabled class="col-md-7">
                                    <div class="form-group form-check-inline  modelcontent">
                                        <input type="text" id="pid" name="pid" class="form-control" value="<?php echo $_SESSION["uid"]; ?>" readonly>
                                    </div>
                                </fieldset>
                            </div>
                            <!--Sugar Type-->
                            <div class="form-row container">
                                <div class="form-check form-check-inline col-md-4 modalheadings ">
                                    <h5>Sugar Type :</h5>
                                </div>
                                <div class="form-group text-white form-check-inline col-md-5 modelcontent">
                                    <select class="form-control" name="sugartype" id="sugartype" value="Sugar Type">
                          <option value="select">Sugar Type</option>
                          <option value="Blood">Blood</option>
                          <option value="Urine">Urine</option>
                        </select>
                                </div>
                            </div>
                            <!--Category-->
                            <div class="form-row container">
                                <div class="form-check form-check-inline col-md-4 modalheadings">
                                    <h5>Category :</h5>
                                </div>
                                <div class="form-group form-check-inline col-md-5 modelcontent ">
                                    <select class="form-control" name="category" id="Category" value="Category">
                          <option value="select">Category</option>
                          <option value="Random">Random</option>
                          <option value="Fasting">Fasting</option>
                        </select>
                                </div>
                            </div>
                            <!--Level-->
                            <div class="form-row container">
                                <div class="form-group form-check-inline col-md-4 modalheadings">
                                    <h5>Sugar Level :</h5>
                                </div>
                                <div class="form-group form-check-inline col-md-5 modelcontent">
                                    <input type="number" class="form-control" name="slevel" id="slevel" autocomplete="off" min="40" maxlength="3" data-toggle="tooltip" data-placement="top" title="Fasting glucose of reading less than 100 mg/dL is normal and between 79–160 mg/dl of random glucose is considered normal">
                                </div>
                            </div>
                            <!--Date-->
                            <div class="form-row container">
                                <div class="form-group form-check-inline col-md-4 modalheadings">
                                    <label><h5>Date :</h5></label></div>
                                <div class="form-group form-check-inline col-md-5 modelcontent">
                                    <input type="date" class="form-control" name="sdate" id="sdate" autocomplete="off" data-toggle="tooltip" data-placement="top" title="Date Format: Month/Date/Year">
                                </div>
                            </div>
                            <!--Time-->
                            <div class="form-row container">
                                <div class="from-group form-check-inline col-md-4 modalheadings">
                                    <h5>Time :</h5>
                                </div>
                                <div class="form-group form-check-inline col-md-5 modelcontent">
                                    <input type="time" class="from-control" name="stime" id="stime" autocomplete="off"  data-toggle="tooltip" data-placement="top" title="Time Format: Hrs/Minutes/AMorPM">
                                </div>
                            </div>
                            <center>
                                <h5 id="sugarresult" class="text-success"></h5>
                            </center>
                        </form>
                    </div>
                    <center>
                        <div class=" modal-footer modalcolor mx-auto">
                            <br>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="sugarsave" name="btn">Save</button>
                            <br>
                        </div>
                    </center>

                </div>
            </div>
        </div>

        <!--BP Modal-->
        <div class="modal fade" id="bpmodal" tabindex="-1" role="dialog" aria-labelledby="BPTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modalcolor">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                    </button>
                        <div class="align-content-center" id="BPTitle">
                            <center><img src="pics/bp.jpg" alt="Sugar Record" id="modalimg">
                                <h5>Record Your Blood Pressure</h5>
                            </center>
                        </div>
                    </div>
                    <div class="modal-body modalbodyy">
                        <form action="" id="bpfrm">
                            <!--Patient Id-->
                            <div class="form-row container">
                                <div class="form-group form-check-inline col-md-4 modalheadings ">
                                    <h5>Patient Id :</h5>
                                </div>
                                <fieldset disabled class="col-md-6">
                                    <div class="form-group form-check-inline  modelcontent">
                                        <input type="text" id="pid" name="pid" class="form-control" value="<?php echo $_SESSION["uid"]; ?>" readonly>
                                    </div>
                                </fieldset>
                            </div>
                            <!--Low and high-->
                            <div class="form-row container">
                                <div class="form-check form-check-inline col-md-2 modalheadings">
                                    <h5>Low :</h5>
                                </div>
                                <div class="form-group text-white form-check-inline col-md-3 modelcontent">
                                    <input type="number" class="form-control" name="low" id="low" min="60" max="140" autocomplete="off"  data-toggle="tooltip" data-placement="top" title="Diastolic BP(LOW) usually ranges between 60 to 140.Generally lower the blood pressure is BETTER!">
                                </div>
                                <div class="form-group text-white form-check-inline d-sm-block d-none">
                                    &nbsp;&nbsp;
                                </div>

                                <div class="form-check form-check-inline col-md-2 modalheadings">
                                    <h5>High :</h5>
                                </div>
                                <div class="form-group text-white form-check-inline col-md-3 modelcontent">
                                    <input type="number" class="form-control" name="high" id="high" min="90" max="250" autocomplete="off"
                                    data-toggle="tooltip" data-placement="top" title="Systolic BP(HIGH) usually ranges between 90 to 250.">
                                </div>
                            </div>

                            <!--Date-->
                            <div class="form-row container">
                                <div class="form-group form-check-inline col-md-2 modalheadings">
                                    <label><h5>Date :</h5></label></div>
                                <div class="form-group form-check-inline col-md-5 modelcontent">
                                    <input type="date" class="form-control" name="date" id="date" autocorrect="date" required data-toggle="tooltip" data-placement="top" title="Date Format: Month/Date/Year">
                                </div>
                            </div>
                            <!--Time-->
                            <div class="form-row container">
                                <div class="from-group form-check-inline col-md-2 modalheadings">
                                    <h5>Time :</h5>
                                </div>
                                <div class="form-group form-check-inline col-md-5 modelcontent">
                                    <input type="time" class="from-control" name="time" id="time" autocomplete="off" required data-toggle="tooltip" data-placement="top" title="Time Format: Hrs/Minutes/AMorPM">
                                </div>
                            </div>
                            <center>
                                <h5 id="bpresult" class="text-success modelcontent"></h5>
                            </center>
                        </form>
                    </div>
                    <center>
                        <div class=" modal-footer modalcolor mx-auto">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="bpsave" name="btn">Save</button>
                        </div>
                    </center>

                </div>
            </div>
        </div>

        <!--Doctor Rating-->
        <div class="modal fade" id="doctorrating" tabindex="-1" role="dialog" aria-labelledby="RatingTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modalcolor">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                    </button>
                        <div class="align-content-center" id="RatingTitle">
                            <center><img src="pics/review-icon-png-1.png" alt="Star Rating" id="modalimg">
                                <h5>Rate Your doctor</h5>
                            </center>
                        </div>
                    </div>
                    <div class="modal-body modalbodyy">
                        <form action="" id="ratingfrm">
                            <!--Hospital name-->
                            <div class="form-row container">
                                <div class="form-group form-check-inline col-md-5 modalheadings">
                                    <h5>Hospital Name :</h5>
                                </div>
                                <fieldset class="col-md-6 modelcontent">
                                    <div class="form-group form-check-inline">
                                        <input list="rname" name="rname" id="hlist" class="form-control">
                                        <datalist id="rname" name="rname">
                                        <option value="select"></option>      
                                        </datalist>
                                    </div>
                                </fieldset>
                            </div>
                            <!--Dcotor Id-->
                            <div class="form-row container">
                                <div class="form-group form-check-inline col-md-5 modalheadings ">
                                    <h5>Doctor Name :</h5>
                                </div>
                                <fieldset class="col-md-6 modelcontent">
                                    <div class="form-group form-check-inline">
                                        <input list="rdid" name="rdid" id="dlist" class="form-control" >
                                        <datalist id="rdid" name="rdid">
                                        <option value="select"></option>      
                                        </datalist>
                                    </div>
                                </fieldset>
                            </div>

                            <br>
                            <div class="form-row container">
                                <div class="form-group col-md-5 modalheadings"><label><h5>Rate Here:</h5></label></div>
                                <div class="form-group form-check-inline col-md-6">
                                    <fieldset class="rating">
                                        <input type="radio" id="star5" name="star" value="5" />
                                        <label for="star5">5 stars</label>
                                        <input type="radio" id="star4" name="star" value="4" />
                                        <label for="star4">4 stars</label>
                                        <input type="radio" id="star3" name="star" value="3" />
                                        <label for="star3">3 stars</label>
                                        <input type="radio" id="star2" name="star" value="2" />
                                        <label for="star2">2 stars</label>
                                        <input type="radio" id="star1" name="star" value="1" />
                                        <label for="star1">1 star</label>
                                    </fieldset>
                                </div>
                            </div>
                            <!--Review-->
                            <div class="form-row container">
                                <div class="form-group col-md-7 modalheadings">
                                    <label><h5>Write Your Reviews:</h5></label></div>
                                <textarea class="form-control" rows="2" id="review" name="review"></textarea>
                            </div>
                         <center>
                            <h5 id="ratingresult" class="modelcontent "></h5>
                        </center>
                        </form>
                    </div>
                   
                    <div class=" modal-footer modalcolor modalbutton">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="ratingsubmit" name="btn">Submit</button>
                    </div>


                </div>
            </div>
        </div>
        
        <!--Sugar High Charts-->
        <!--        <div class="modal fade" id="sugarchart" tabindex="-1" role="dialog" aria-labelledby="SugarTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modalcolor">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                    </button>
                        <div class="align-content-center" id="SugarTitle">
                               <center>
                               <br>
                                <h5>Sugar High chart</h5>
                                <br>
                            </center>
                        </div>
                    </div>
                    <div class="modal-body modalbodyy">
                        <div class="form-row container">
                                <div class="form-group form-check-inline col-md-4 modalheadings ">
                                    <h5>Patient Id :</h5>
                                </div>
                                <fieldset disabled class="col-md-7">
                                    <div class="form-group form-check-inline  modelcontent">
                                        <input type="text" id="pid" name="pid" class="form-control" value="<?php echo $_SESSION["uid"]; ?>" readonly>
                                    </div>
                                </fieldset>
                            </div>
                    <br>
                       <div class="form-row col-md-12">
                        <div id="containerr1" style="width:100%; height:300px; font-family:Adobe Garamond Pro Bold;"><h5>LOADING:</h5><br><h4>BREATH IN BREATH OUT</h4></div>
                    </div>
                    </div>
                    <center>
                        <div class=" modal-footer modalcolor mx-auto">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </center>

                </div>
            </div>
        </div>-->
        
         <!--BP High Charts-->
        <!--        <div class="modal fade" id="bpchart" tabindex="-1" role="dialog" aria-labelledby="BPTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modalcolor">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                    </button>
                        <div class="align-content-center" id="BPTitle">
                               <center>
                               <br>
                                <h5>Blood Pressure High chart</h5>
                                <br>
                            </center>
                        </div>
                    </div>
                    <div class="modal-body modalbodyy">
                        <div class="form-row container">
                                <div class="form-group form-check-inline col-md-4 modalheadings ">
                                    <h5>Patient Id :</h5>
                                </div>
                                <fieldset disabled class="col-md-7">
                                    <div class="form-group form-check-inline  modelcontent">
                                        <input type="text" id="pid" name="pid" class="form-control" value="<?php echo $_SESSION["uid"]; ?>" readonly>
                                    </div>
                                </fieldset>
                            </div>
                    <br>
                       <div class="form-row col-md-12">
                        <div id="containerr" style="width:100%; height:300px; font-family:Adobe Garamond Pro Bold;"><h5>LOADING:</h5><br><h4>BREATH IN BREATH OUT</h4></div>
                    </div>
                    </div>
                    <center>
                        <div class=" modal-footer modalcolor mx-auto">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </center>

                </div>
            </div>
        </div>-->

           <!--Feedback-->
           <div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="feedbackTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modalcolor">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                    </button>
                        <div class="align-content-center" id="feedbackTitle">
                            <center><img src="pics/feedback.png" alt="Feedback" id="modalimg">
                            </center>
                        </div>
                    </div>
                    <div class="modal-body modalbodyy">
                        <form action="" id="feedbackfrm">
                            <!--Patient name-->
                            <div class="form-row container">
                                <div class="form-group form-check-inline col-md-4 modalheadings ">
                                    <h5>Patient Id :</h5>
                                </div>
                                <fieldset disabled class="col-md-7">
                                    <div class="form-group form-check-inline  modelcontent">
                                        <input type="text" id="fpid" name="fpid" class="form-control" value="<?php echo $_SESSION["uid"]; ?>" readonly>
                                    </div>
                                </fieldset>
                            </div>
        
                            <br>
                            <div class="form-row container">
                                <div class="form-group col-md-12 modalheadings">
                                    <label><h5>Which feature do you like in our site?</h5></label></div>
                                <textarea class="form-control" rows="2" id="flike" name="flike" required maxlength="50" placeholder="Feature You Like?" autocomplete="off"></textarea>
                            </div>
                            <!--Review-->
                            <div class="form-row container">
                                <div class="form-group col-md-12 modalheadings">
                                    <label><h5>Acc to you we should improve?</h5></label></div>
                                <textarea class="form-control" rows="2" id="fimprove" name="fimprove" required maxlength="100" placeholder="What We should Improve?" autocomplete="off"></textarea>
                            </div>
                              <div class="form-row container">
                                <div class="form-group col-md-12 modalheadings">
                                    <label><h5>Other Suggestions:</h5></label></div>
                                <textarea class="form-control" rows="2" id="fsug" name="fsug" maxlength="100" placeholder="Suggestions If Any.." autocomplete="off"></textarea>
                            </div>
                         <center>
                            <h5 id="feedbackresult" class="modelcontent text-success" style="font-family: Adobe Garamond Pro Bold;"></h5>
                             
                        </center>
                            <!--<div id="resett" class="d-inline-flex" style="font-family: Adobe Garamond Pro Bold;">
                                <div><h5>Wanna give another feedback?</h5></div>&nbsp;
                                <div><button type="reset" class="btn btn-outline-info" value="click here" id="reset" name="reset">Click Here</button></div></div>-->
                        </form>
                    </div>
                   
                    <div class=" modal-footer modalcolor modalbutton">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="feedbacksubmit" name="btn">Submit</button>
                    </div>


                </div>
            </div>
        </div>
        
    </body>

    </html>
