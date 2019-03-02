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

    <title>Doctor-Profile</title>

    <!--CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="css/patient-dashboard-style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">

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
            
                $("#dmobile").keyup(function() {
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
            
                    $("#search").click(function() {
                $ddid = $("#ddid").val();
                $.getJSON("doctor-fetch.php?ddid=" + $ddid, function(jsonArray) {
                    if (jsonArray.length != 0) {
                        $("#ddname").val(jsonArray[0].name);
                        $("#ddage").val(jsonArray[0].age);
                        $('#prev').attr('src', jsonArray[0].pic);
                        $("#ddqual").val(jsonArray[0].qual);
                        $("#dcity").val(jsonArray[0].city);
                        $("#list").val(jsonArray[0].hospital);
                        $("#dzipcode").val(jsonArray[0].zipcode);
                        $("#ddexp").val(jsonArray[0].exp);
                        $("#dhospitaladd").val(jsonArray[0].hadd);
                        $("#dmobile").val(jsonArray[0].mobile);
                        $("#hdn").val(jsonArray[0].pic);

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
            
        });
    </script>
      
       <style type="text/css">
    #update, #updatetext
        {
            display: none;
        }
        .modalimg
        {
            width:100px;
            height:100px;
            /*border:2px black solid;*/
            border-radius: 50%;
            margin-top: 10px;
            background-size: contain;
            object-position: center
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
                        <center><div id="infolines">Doctor's Profile</div></center>
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
                    <center><div id="infolines"><h6>Doctor's Profile</h6></div></center>            
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
                    <center><div id="infolines">Doctor's Profile</div></center>            
                </div>
            </div>
        </div>
        <!--Form-->
    <div class="container">
        <div class="row">
           <div class="col-12 col-sm-2"></div>
            <div class="col-12 col-sm-8 table-bordered border-primary" style="font-family:Adobe Garamond Pro Bold;">
                <form action="doctors-profile-submit-process.php" method="post" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <div>
                            <center><div class="figure-img"><img id="prev" width="50x" height="50px" class="modalimg"></div>
                                <h5>PLEASE FILL YOUR PROFILE</h5>
                            </center>
                        </div>
                    </div>
                    <hr>
                    <!--Name-->
                    <br>
                         <!--Doctor Id-->
                        <div class="form-row container" style="font-family:Adobe Garamond Pro Bold;">
                        <div class="form-group form-check-inline col-md-2">
                            <h4>Doctor Id :</h4>
                        </div>
                        <div class="form-group form-check-inline col-md-4">
                            <input type="text" class="form-control" name="ddid" id="ddid" value="<?php echo $_SESSION["uid"]; ?>" readonly>
                        </div>
                            <span class="col-md-5" id="updatesearch">Wanna Update?<button class="btn btn-link" value="click here" id="search" name="search">Click Here</button></span>
                    </div>
                    <div >
                        <center><div class="text-muted" id="updatetext" style="font-family:Adobe Garamond Pro Bold;">Update Your Profile and click Update</div></center>
                    </div>
                    <br>
                    <!--Name and Age-->
                    <div class="form-row container" style="font-family:Adobe Garamond Pro Bold;">
                        <div class="form-check form-check-inline col-md-auto">
                            <h4>Doctor Name :</h4>
                        </div>
                        <div class="form-group text-white form-check-inline col-md-3">
<!--                        <input type="text" class="form-control" name="ddname" id="ddname" placeholder="Your Name" required autocomplete="off" value="<?php echo $_SESSION["name"]; ?>" readonly>-->
                        <input type="text" class="form-control" name="ddname" id="ddname" placeholder="Your Name" required autocomplete="off" value="Dr. <?php echo $_SESSION["name"]; ?>" readonly>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="form-check form-check-inline col-md-auto">
                        <h4>Age :</h4>
                        </div>
                        <div class="form-group text-white form-check-inline col-md-3">
                         <input type="number" class="form-control" name="ddage" id="ddage" min="20" placeholder="Min Age:20" maxlength="3" required autocomplete="off">
                        </div>
                    </div> 
                     <!--Qualification-->
                    <div class="form-row container" style="font-family:Adobe Garamond Pro Bold;">
                    <div class="form-check form-check-inline col-md-auto">
                     <h4>Qualification :</h4>
                    </div>
                      <div class="form-check form-check-inline col-md-3">
                            <input list="qualification" class="form-control" name="ddqual" id="ddqual" required placeholder="Qualification">
                            <datalist id="qualification" name="qualification">
                           <option value="Select"></option>
                            <!--<option value="Juit"></option>
                            <option value="Jiit"></option>
                            <option value="Juet"></option>-->
                        </datalist>
                        </div>
                    &nbsp;&nbsp;&nbsp;
                           <!--Experience-->                  
                     <div class="form-check form-check-inline col-md-auto">
                   <h4>Experience :</h4>
                     </div>
                     <div class="form-group text-white form-check-inline col-md-3">
                  <input type="text" class="form-control" name="ddexp" id="ddexp" required maxlength="20" placeholder="Eg 15 years">
                                </div>
                    </div>
                    <br>
                    <!--Doctor Pic-->
                    <input type="hidden" name="hdn" id="hdn">
                    <div class="form-row container">
                        <div class="form-group  form-check-inline col-md-3">
                            <h4>Doctor Pic :</h4>
                        </div>
                        <div class="form-group  form-check-inline">
                            <input type="file" name="pic" id="pic" onchange="showpreview(this);">
                            
                        </div>
                    </div>                   
                    <br>
                    <!--Hospital-->
                     <div class="form-row container">
                        <div class="form-check form-check-inline col-md-3">
                            <h4>Hospital Name:</h4>
                        </div>
                        <div class="form-check form-check-inline col-md-5">
                            <input list="dhospital" class="form-control" name="dhospital" id="list" required placeholder="Hospital Name">
                            <datalist id="dhospital" name="dhospital">
                           <option value="Select"></option>
                        </datalist>
                        </div>
                    </div>
                    <br>
                            <!--Zipcode-->
                    <div class="form-row container" style="font-family:Adobe Garamond Pro Bold;">
                    <div class="form-check form-check-inline col-md-3">
                     <h4>Zipcode :</h4>
                    </div>
                    <div class="form-group text-white form-check-inline col-md-3">
                    <input type="text" class="form-control" name="dzipcode" id="dzipcode" maxlength="6" required autocomplete="off" placeholder="Eg 15xxxx">
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                             
                     <div class="form-check form-check-inline col-md-auto">
                   <h4>City :</h4>
                     </div>
                     <div class="form-group text-white form-check-inline col-md-3">
                  <input type="text" class="form-control" name="dcity" id="dcity" required maxlength="20" placeholder="Eg Bathinda">
                                </div>
                    </div> 
                    <!--Hospital Address-->
                    <div class="form-row container">
                        <div class="form-group form-check-inline col-md-auto">
                            <label><h4>Hospital Address :</h4></label></div>
                            <div class="form-group form-check-inline col-md-5">
                            <textarea class="form-control" rows="4" id="dhospitaladd" name="dhospitaladd" required autocomplete="off" placeholder="Containing StreetNo, House No, Locality etc"></textarea>
                        </div></div>
                    <!--Mobile No-->
                    <div class="form-row container">
                        <div class="form-group form-check-inline col-md-3">
                            <h4>Mobile No :</h4>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="form-group form-check-inline col-md-5">
                            <input type="text" class="form-control" name="dmobile" id="dmobile" required maxlength="10" autocomplete="off" placeholder="78xxxxxxxx" pattern="[7-9]{1}[0-9]{9}" value="<?php echo $_SESSION["mobile"]; ?>" readonly>
                        </div>
<!--                         <div class="form-check form-check-inline col-md-4">
                         <span><small id="messagemobile"></small></span>
                        </div>-->
                    </div>                   <hr>
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
