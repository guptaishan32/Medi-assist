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

    <?php include_once("header.php") ?>
   
    <!--Header image-->
        <!--Desktop Version-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 d-sm-none d-none d-lg-block" style="margin-top:70px">
                    <img src="pics/header2.jpg" id="desimg" class="img-fluid">
                </div>
                <div class="col-sm-12 d-sm-none d-none d-lg-block">
                        <center><div id="infolines">Message Page</div></center>
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
                    <center><div id="infolines"><h6>Message Page</h6></div></center>            
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
                    <center><div id="infolines">Message Page</div></center>            
                </div>
            </div>
        </div>
<br>
<div class="container-fluid">
   <div class="row">
     <div class="col-12">
      <div><center id="message"><?php echo $_GET["msg"];?></center></div>
       
       <br>
       <center id="message" style="text-decoration:none"><a href ="patient-dashboard.php" class="btn-outline-primary">Go To home</a>&nbsp;&nbsp; or &nbsp;&nbsp;<a href="logout.php" class="btn-outline-danger">Logout</a></center>
       </div>
   </div>
    
</div>
<br><br><br>

<?php include_once("footer.php") ?>
    </body></html>