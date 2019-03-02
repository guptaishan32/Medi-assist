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

    <title>Patient-Profile</title>

    <!--CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="css/patient-dashboard-style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <script type="text/javascript" src="js/angular.min.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-1.9.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Optional JavaScript -->
    <script type="text/javascript">
     

    function showpreview(file) {

        if (file.files && file.files[0])
		 {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#prev').attr('src', e.target.result);
            }
            reader.readAsDataURL(file.files[0]);
        }

    }
        $(document).ready(function(){
            
                  $("#search").click(function() {
                $ppid = $("#ppid").val();
                $.getJSON("patient-profile-search.php?ppid=" + $ppid, function(jsonArray) {
                    if (jsonArray.length != 0) {
                        $("#ppname").val(jsonArray[0].ppname);
                        $("#ppage").val(jsonArray[0].ppage);
                        $("#ppzipcode").val(jsonArray[0].ppzipcode);
                        $("#ppcity").val(jsonArray[0].ppcity);
                        $("#ppmobile").val(jsonArray[0].ppmobile);
                        $("#ppadd").val(jsonArray[0].ppadd);
                        $("#ppod").val(jsonArray[0].ppod);
                        $("#save").hide();
                        $("#update").show();
                        $("#updatetext").show();
                        $("#updatesearch").hide();
                    } else {
                        alert("Invalid Id");
                        $("#update").hide();
                        $("#updatetext").hide();
                    }
                });
            });

                       $("#ppmobile").keyup(function() {
                var val = this.value;
                var r = /[7-9]{1}[0-9]{9}$/
                
                $("#messagemobile").hide();
                
                    if(val.length<=1)
                    {
                        $("#messagemobile").html(" First digit must be from 7,8 or 9");
                        $("#messagemobile").css('color','grey');
                        $("#messagemobile").show();
                    }
                 else if(val.length < 10)
                    {   $("#messagemobile").html(" Minimum length: 10 digits");
                        $("#messagemobile").show();
                        $("#messagemobile").css('color','grey');
                    }

                if (r.test(val) == true)
                    {   
                        $("#messagemobile").html(" OK! ");
                        $("#messagemobile").show();
                        $("#messagemobile").css('color','green');
                    }
            });
        });
    </script>
  
    <style type="text/css">
    #update, #updatetext
        {
            display: none;
        }
    </style>
    

</head>

<body style="background-color:aliceblue">
                <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0';
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
   
    <?php include_once("header.php") ?>
   
  <!--Header image-->
        <!--Desktop Version-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 d-sm-none d-none d-lg-block" style="margin-top:70px">
                    <img src="pics/header2.jpg" id="desimg" class="img-fluid">
                </div>
                <div class="col-sm-12 d-sm-none d-none d-lg-block">
                        <center><div id="infolines">Patient Profile</div></center>
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
                    <center><div id="infolines"><h6>Patient Profile</h6></div></center>            
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
                    <center><div id="infolines">Patient Profile</div></center>            
                </div>
            </div>
        </div>
    <br>
    <div class="container">
        <div class="row">
           <div class="col-12 col-sm-2"></div>
            <div class="col-12 col-sm-8 table-bordered border-primary" style="font-family:Adobe Garamond Pro Bold;">
                <form action="patient-profile-submit-process.php" method="post" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <div>
                            <center><img src="pics/icon-profile.png" alt="Sugar Record" id="modalimg">
                                <h3>PlZ Complete Your Profile</h3>
                            </center>
                        </div>
                    </div>
                       <hr>
                        <!--Patient Id-->
                        <div class="form-row container" style="font-family:Adobe Garamond Pro Bold;">
                        <div class="form-group form-check-inline col-md-2">
                            <h4>Patient Id :</h4>
                        </div>
                        <div class="form-group form-check-inline col-md-4">
                            <input type="text" class="form-control" name="ppid" id="ppid" required  value="<?php echo $_SESSION["uid"]; ?>" readonly>
                        </div>
                            <span class="col-md-5" id="updatesearch">Wanna Update?<button class="btn btn-link" value="click here" id="search" name="search">Click Here</button></span>
                    </div>
                    <div >
                        <center><div class="text-muted" id="updatetext" style="font-family:Adobe Garamond Pro Bold;">Update Your Profile and click Update</div></center>
                    </div>
                    <br>
                    <!--Name and Age-->
                    <div class="form-row container" style="font-family:Adobe Garamond Pro Bold;">
                        <div class="form-check form-check-inline col-md-2">
                            <h4>Name :</h4>
                        </div>
                        <div class="form-group text-white form-check-inline col-md-3">
                        <input type="text" class="form-control" name="ppname" id="ppname" placeholder="Your Name" readonly value="<?php echo $_SESSION["name"]; ?>">
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="form-check form-check-inline col-md-auto">
                        <h4>Age :</h4>
                        </div>
                        <div class="form-group text-white form-check-inline col-md-3">
                         <input type="number" class="form-control" name="ppage" id="ppage" min="12" placeholder="Min Age:12" maxlength="3" required autocomplete="off">
                        </div>
                    </div> 
                    
                    <!--Zipcode-->
                    <div class="form-row container" style="font-family:Adobe Garamond Pro Bold;">
                    <div class="form-check form-check-inline col-md-2">
                     <h4>Zipcode :</h4>
                    </div>
                    <div class="form-group text-white form-check-inline col-md-3">
                    <input type="text" class="form-control" name="ppzipcode" id="ppzipcode" maxlength="6" required autocomplete="off" placeholder="Eg 15xxxx">
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                             
                     <div class="form-check form-check-inline col-md-auto">
                   <h4>City :</h4>
                     </div>
                     <div class="form-group text-white form-check-inline col-md-3">
                  <input type="text" class="form-control" name="ppcity" id="ppcity" required maxlength="20" placeholder="Eg Bathinda">
                                </div>
                    </div>
                     <!--Mobile No-->
                    <div class="form-row container" style="font-family:Adobe Garamond Pro Bold;">
                        <div class="form-check form-check-inline col-md-auto">
                            <h4>Mobile No :</h4>
                        </div>
                        <div class="form-check form-check-inline col-md-4">
                            <input type="text" class="form-control" name="ppmobile" id="ppmobile" autocomplete="off" readonly placeholder="78xxxxxxxx" value="<?php echo $_SESSION["mobile"]; ?>">
                        </div>
<!--                         <div class="form-check form-check-inline col-md-4">
                         <span><small id="messagemobile"></small></span>
                        </div>-->
                        
                    </div>
                    <br>
                    <!--Address-->
                    <div class="form-row container" style="font-family:Adobe Garamond Pro Bold;">
                        <div class="form-group form-check-inline col-md-2">
                            <label><h4>Address :</h4></label></div>
                            <div class="form-group form-check-inline col-md-8">
                            <textarea class="form-control" rows="1" id="ppadd" name="ppadd" required autocomplete="off" placeholder="Containing StreetNo, House No, Locality etc"></textarea>
                        </div></div>
                    <!--other details-->
                     <div class="form-row container" style="font-family:Adobe Garamond Pro Bold;">
                    <div class="form-group form-check-inline col-md-auto">
                      <label><h4>Other Details :</h4></label></div>
                        <div class="form-group form-check-inline col-md-8">
                        <textarea class="form-control" rows="1" id="ppod" name="ppod" autocomplete="off" placeholder="Any Other Details, Any Disease etc.... "></textarea>
                        </div></div>
               <hr>
                    <center>

                        <button type="submit" class="btn btn-primary" name="btn" id="save" value="save">Save</button>    
                        <button type="submit" class="btn btn-primary" name="btn" id="update" value="update">Update</button>    
                        <br>
                        <br>
                    </center>
                </form>
            </div>
        </div>
    </div>
    <br>

<?php include_once("footer.php") ?>
</body>

</html>
