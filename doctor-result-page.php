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

    <title>Message</title>
    <script type="text/javascript" src="js/angular.min.js"></script>
    <!--CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="css/patient-dashboard-style.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-1.9.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/patient-dashboard.js"></script>
    <script src="js/fontawesome-all.js"></script>

    <!-- Optional JavaScript -->
    <style>
    #message
        {
            font-family: Adobe Garamond Pro Bold;
            text-transform: uppercase;
            color: darkslategray;
            font-size: 20px;
            text-decoration: none;
        }
    </style>

</head>
<!-- ng-init="showvalue(); -->
<body style="background-color:aliceblue">
                <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0';
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>  
    <!--Header logo-->

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
                        <center><div id="infolines">Message</div></center>
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
                    <center><div id="infolines"><h6>Message</h6></div></center>            
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
                    <center><div id="infolines">Message</div></center>            
                </div>
            </div>
        </div>
<br><br><br>

<?php include_once("footer.php") ?>
    </body></html>