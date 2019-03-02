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

    <title>Consultant-Dashboard</title>

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
            fillalldoctorsids();
           function fillalldoctorsids()
            {
                $.getJSON("json-fetch-all-doctors.php",function(jsonArray){
                  /*  alert(JSON.stringify(jsonArray));*/
                    
                    for(i=0;i<jsonArray.length;i++)
                        {
                            /*alert(jsonArray[i].doctor);*/
                            $("#doctor").append("<option value='"+jsonArray[i].doctor+"'></option>");
                        }
                    
                });
            }
});
    </script>
            <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip(); 
            });
            </script>

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
                        <center><div id="infolines">Save Doctor's Prescription here</div></center>
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
                    <center><div id="infolines"><h6>Save Doctor's Prescription here</h6></div></center>            
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
                    <center><div id="infolines">Save Doctor's Prescription here</div></center>            
                </div>
            </div>
        </div>
   <!--Form-->
    <div class="container">
        <div class="row">
           <div class="col-12 col-sm-2"></div>
            <div class="col-12 col-sm-8 table-bordered border-primary" style="font-family:Adobe Garamond Pro Bold;">
                <form action="consultation-process.php" method="post" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <div>
                            <center><img src="pics/prescriptions.png" alt="Prescription" id="modalimg">
                                <h5>RECORD HERE:</h5>
                            </center>
                        </div>
                    </div>
                    <hr>
                    <!--patient id-->
                    <div class="form-row container">
                        <div class="form-group form-check-inline col-md-4">
                            <h4>Patient Id :</h4>
                        </div>
                        <div class="form-group text-white form-check-inline col-md-5">
                            <input type="text" class="form-control" name="pid" id="pid" required value="<?php echo $_SESSION["uid"]; ?> " readonly>
                        </div>
                    </div>
                    <!--Doctors-->
                    <div class="form-row container">
                        <div class="form-check form-check-inline col-md-4">
                            <h4>Doctor Consultated :</h4>
                        </div>
                        <div class="form-check form-check-inline col-md-5">
                            <input list="doctor" class="form-control" name="doctor" id="list" required placeholder="Doctor Name">
                            <datalist id="doctor" name="doctor">
                           <option value="Select"></option>
                            <!--<option value="Juit"></option>
                            <option value="Jiit"></option>
                            <option value="Juet"></option>-->
                        </datalist>
                        </div>
                    </div>
                    <br>
                    <!--Consultation Date-->
                    <div class="form-row container">
                        <div class="form-group form-check-inline col-md-4">
                            <h4>Consultation Date :</h4>
                        </div>
                        <div class="form-check form-check-inline col-md-5">
                            <input type="date" class="from-control" name="cdate" id="cdate" required autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Date Format: Month/Date/Year">
                        </div>
                    </div>
                    <br>
                    <!--Report Pic-->
                    <div class="form-row container">
                        <div class="form-group  form-check-inline col-md-4">
                            <h4>Report Pic :</h4>
                        </div>
                        <div class="form-group  form-check-inline">
                            <input type="file" name="pic" id="pic" onchange="showpreview(this);" class="from-control" required>
                        </div>

                        <center>
                            <!--<div class="figure-img"><img id="prev" width="50x" height="50px"></div>-->
                        </center>
                    </div>
                    <br>
                    <!--Inst by Doctor-->
                    <div class="form-row container">
                        <div class="form-group form-check-inline col-md-8">
                            <label><h4>Instructions Given By Doctor :</h4></label></div>
                            <textarea class="form-control" rows="3" id="instruction" name="instruction" placeholder="Instructions Given By Doctor...."></textarea>
                    </div>
                    <br>
                    <!--Next date of Cons-->
                    <div class="form-row container">
                        <div class="from-group form-check-inline col-md-5">
                            <h4>Next Date of Consultation:</h4>
                        </div>
                        <div class="form-group text-white form-check-inline">
                            <input type="date" class="from-control" name="doc" id="doc" required autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Date Format: Month/Date/Year">
                        </div>
                    </div>
                    <hr>
                    <center>
                        <center><span id="adelete"></span></center>

                        <button type="submit" class="btn btn-primary" name="btn" value="signup">Submit</button>    
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
