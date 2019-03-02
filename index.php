<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mediassist Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="css/index.css">
    <script type="text/javascript" src="js/angular.min.js"></script>
    <script src="js/fontawesome-all.js"></script>
    <script src="js/jquery-1.9.1.js"></script>
    <script src="js/validate.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript">
        function showpasswords() {
            show = document.getElementById("spwd");
            if (show.type == "password") {
                show.type = "text";
            } else
                show.type = "password";
        }

        function showpasswordl() {
            show = document.getElementById("lpwd");
            if (show.type == "password") {
                show.type = "text";
            } else
                show.type = "password";
        }

    </script>
    <script type="text/javascript">
        var myapp = angular.module("app", []);
        myapp.controller("mycontroller", function($scope, $http) {
            $scope.json;
            $scope.doFetchJson = function() {
                $http.get("json-doctor-for-index.php").then(shanti, noshanti);

                function shanti(jsonArray) {
                    //alert(JSON.stringify(response.data));
                    $scope.json = jsonArray.data;

                }
                function noshanti(jsonArray) {
                    alert(jsonArray.data);
                }
            }
        });
    </script>
</head>

<body class="body" ng-app="app" ng-controller="mycontroller" ng-init="reload(true)">
    <!--Desktop Version-->
    <div class="fixed-top">
        <div id="headerinfoline1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2 d-none d-sm-block">
                        <center>
                            <a href="index.php"><img src="pics/4%20png.png" id="headerlogo"></a>
                        </center>
                    </div>
                    <div class="col-sm-10 d-none d-sm-block" style="margin-top:10px">
                        <center>
                            Welcome to MEDI-ASSIST
                        </center>
                    </div>
                </div>
            </div>
        </div>

        <!--Desktop Version navbar-->
        <div id="headerinfoline">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 d-sm-none d-none d-lg-block">
                        <div class="d-flex btn-sm">
                            <div> <button class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#signup">SIGNUP</button></div>&emsp;
                            <div> <button class="btn btn-success" href="#" role="button" data-toggle="modal" data-target="#login">LOGIN</button></div>
                        </div>
                    </div>
                    <div class="col-lg-auto col-xl-6 d-none d-lg-block d-lg-inline-flex justify-content-center" id="headernav" style="margin-top:10px">
                        <div><a href="#services" class="col-sm-auto" id="headercontent">OUR SERVICES</a></div>
                        <div><a href="#aboutus" class="col-sm-auto" id="headercontent">ABOUT US</a></div>
                        <div><a href="#contact" class="col-sm-auto" id="headercontent">CONTACT US</a></div>
                    </div>
                    <!--Navbar-->
                    <div class="col-lg-auto col-xl-3 d-sm-none d-none d-lg-block float-left">
                        <nav class="navbar float-right">
                            <form class="form-inline">
                                <input class="form-control" placeholder="Search Doctor" ng-model="hint" aria-label="Search">
                                <button class="btn btn-primary" type="submit" ng-click="doFetchJson();" data-toggle="modal" data-target="#doctorsearch">Search</button>
                            </form>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Mobile Version-->
    <div class="fixed-top">
        <div id="headerinfolinem">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4 d-block d-lg-none" style="margin-top:4px">
                        <center>
                            <a href="index.php"><img src="pics/4%20png.png" id="headerlogom"></a>
                        </center>
                    </div>
                    <div class="col-8 d-block d-lg-none float-right" style="margin-top:7px">
                        <center>
                            <h4>MEDI-ASSIST</h4>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <!--Mobile Version navbar-->
        <div class="col-12 d-block d-lg-none" id="headerinfoline">
            <nav class="navbar navbar-expand-lg navbar-light">
               <div>
                <button class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#signup">SIGNUP</button>
                <button class="btn btn-success" href="#" role="button" data-toggle="modal" data-target="#login">LOGIN</button>
               </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <div><a href="#services" class="col-sm-auto" id="headercontent1">OUR SERVICES</a></div>
                        </li>
                        <li class="nav-item">
                            <div><a href="#aboutus" class="col-sm-auto" id="headercontent1">ABOUT US</a></div>
                        </li>
                        <li class="nav-item">
                            <div><a href="#contact" class="col-sm-auto" id="headercontent1">CONTACT US</a></div>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control col-6" placeholder="Search Doctor" ng-model="hint" aria-label="Search">
                        <button class="btn btn-primary col-6" type="submit" ng-click="doFetchJson();" data-toggle="modal" data-target="#doctorsearch">Search</button>
                    </form>
                </div>
            </nav>
        </div>
    </div>


    <!--Carousel-->
    <div id="dcarousel">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="pics/medical-immunizations-nurse-stethoscope.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-lg-block">
                        <div style="font-family: Adobe Garamond Pro Bold; font-size:30px; color: darkslategrey">Our site helps patients to keep record of their blood pressure and sugar and allows them to regularly compare through high charts. </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="pics/P-4.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-lg-block">
                        <div style="font-family: Adobe Garamond Pro Bold; font-size:30px; color: darkslategrey">Never miss any appointment with your doctor. </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="pics/p5.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-lg-block">
                        <div style="font-family: Adobe Garamond Pro Bold; font-size:30px; color:darkslategrey">Doctor's rating help us to provide our patients the best doctors available.</div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <br>
    <!--Services-->
    <div id=services>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <center>
                        <div id="infolines">Our services</div>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!--Card row 1-->
    <!--Cards-->
    <div class="container">
        <div class="card-deck">
            <!--sugar-->
            <div class="card" id="card">
                <center><img class="card-img-top" src="pics/patient-chart-medical-clipboard.svg.hi.png" alt="Card image cap" id="cardimg1"></center>
                <img class="card-img-top" src="pics/sugarcheck.jpg" alt="Card image cap" id="cardimg2">
                <div class="card-body" id="cardbody">
                    <center>
                        <div class="card-text" id="cardtitle">Sugar Record</div>
                    </center>
                    <div class="card-text" id="cardpara">Keep a record of your blood sugar.</div>
                </div>
            </div>
            <!--bp-->
            <div class="card" id="card">
                <center><img class="card-img-top" src="pics/medical-chart-icon-31.png" alt="Card image cap" id="cardimg1"></center>
                <img class="card-img-top" src="pics/a-person-having-their-blood-pressure-checked.jpg" alt="Card image cap" id="cardimg2">
                <div class="card-body" id="cardbody">
                    <center>
                        <div class="card-text" id="cardtitle">BP REcord</div>
                    </center>
                    <div class="card-text" id="cardpara">Keep a record of your blood pressure.</div>
                </div>
            </div>
            <!--Highcharts-->
            <div class="card" id="card">
                <center><img class="card-img-top" src="pics/vue_highchart.png" alt="Card image cap" id="highcharts"></center>
                <div class="card-img-overlay" id="cardbody">
                    <div class="card-text" id="cardpara">Regularly compare your sugar level and blood pressure with help of high charts</div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!--Card Row 2-->
    <div class="container">
        <div class="card-deck">
            <!--appointments-->
            <div class="card" id="card">
                <center><img class="card-img-top" src="pics/5-512%20(1).png" alt="Card image cap" id="cardimg1"></center>
                <img class="card-img-top" src="pics/doctorsappointments.jpg" alt="Card image cap" id="cardimg2">
                <div class="card-body" id="cardbody">
                    <center>
                        <div class="card-text" id="cardtitle">Appointments</div>
                    </center>
                    <div class="card-text" id="cardpara">Record your consulations with doctor and check all your appointments.</div>
                </div>
            </div>
            <!--search-->
            <div class="card" id="card">
                <center><img class="card-img-top" src="pics/Doctor_Search-512.png" alt="Card image cap" id="cardimg1"></center>
                <img class="card-img-top" src="pics/UMHPhysDirectory_banner-img.jpg" alt="Card image cap" id="cardimg2">
                <div class="card-body" id="cardbody">
                    <center>
                        <div class="card-text" id="cardtitle">Doctor Search</div>
                    </center>
                    <div class="card-text" id="cardpara">Search doctor on basis of qualification, experience, hospital etc.</div>
                </div>
            </div>
            <!--review-->
            <div class="card" id="card">
                <center><img class="card-img-top" src="pics/review1.png" alt="Card image cap"></center>
                <div class="card-img-overlay" id="cardbody">
                    <div class="card-text" id="cardpara">Review your Doctor on the basis of your consultation.</div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!--About us-->
    <div id="aboutus">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <center>
                        <div id="infolines">About US</div>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!--Developed By-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-6 col-12">
                <center>
                    <div id="tableinfolines">Developed By</div>
                </center>
                <br>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-3">
                        <center><img src="pics/ishan.png" id="developpic"></center>
                    </div>
                    <div class="col-12 col-md-12 col-lg-3">
                        <table class="table table-borderless ">
                            <tbody>
                                <tr>
                                    <th id="tableheading">Name:</th>
                                    <td id="tablecontent">Ishan Gupta</td>
                                </tr>
                                <tr>
                                    <th id="tableheading">Email:</th>
                                    <td class="d-none d-md-block" id="tablecontent">guptaishan32@gmail.com</td>
                                    <td class="d-block d-md-none" style="font-size:12px">guptaishan32@gmail.com</td>
                                </tr>
                                <tr>
                                <tr>
                                    <th id="tableheading">Mobile:</th>
                                    <td id="tablecontent">7837100474</td>
                                </tr>
                                <tr>
                                    <th id="tableheading">Profession:</th>
                                    <td id="tablecontent">Student</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-12">
                <center>
                    <div id="tableinfolines">Under Guidance</div>
                </center>
                <br>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-3">
                        <center><img src="pics/itsme%20(2).png" width="150px"></center>
                    </div>
                    <div class="col-12 col-md-12 col-lg-3">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th id="tableheading">Name:</th>
                                    <td id="tablecontent">Rajesh K. Bansal</td>
                                </tr>
                                <tr>
                                    <th id="tableheading">Email:</th>
                                    <td class="d-none d-sm-block" id="tablecontent">bcebti@gmail.com</td>
                                    <td class="d-block d-sm-none font-weight-bold" style="font-size:14px">BCEBTI@GMAIL.COM</td>
                                </tr>
                                <tr>
                                <tr>
                                    <th id="tableheading">Mobile:</th>
                                    <td id="tablecontent">98722-46056</td>
                                </tr>
                                <tr>
                                    <th id="tableheading">Profession:</th>
                                    <td id="tablecontent">SCJP-Sun Certified Java Programme</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Contact Us-->
    <div id="contact">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <center>
                        <div id="infolines">Contact Us</div>
                    </center>
                </div>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <center>
                        <div id="tableinfolines" class="d-block d-md-none">Our Location</div>
                    </center>
                    <div class="col-12 col-lg-6 col-md-12" id="mframe">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13791.522932618522!2d74.9523281!3d30.2119513!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4a0d6293513f98ce!2sBanglore+Computer+Education+(C+C%2B%2B+Android+J2EE+PHP+Python+AngularJs+Spring+Java+Training+Institute)!5e0!3m2!1sen!2sin!4v1531409909358" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-6 col-12 d-block d-md-none">
                    <center>
                        <div id="tableinfolines">Follow Us</div>
                    </center>
                    <div class="col-12 d-block d-sm-none ">
                        <table class="table">
                            <td>
                                <a href="index.php"><img src="pics/4%20png.png" id="headerlogo"></a>
                            </td>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <center>
                    <div id="copyright">&copy;medi-assist 2018</div>
                </center>
            </div>
        </div>
    </div>
    <!--Doctor Search-->
    <div class="modal fade" id="doctorsearch" tabindex="-1" role="dialog" aria-labelledby="DoctorTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: aliceblue">
                <div style="background-color: aliceblue">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="align-content-center" id="DoctorTitle">
                        <center>
                            <br>
                            <h4><b>DOCTORS AVAILABLE</b></h4>
                            <br>
                        </center>
                    </div>
                </div>
                <div class="modal-body">

                    <div class="container">
                        <div class="row" ng-repeat="record in json| filter:hint">
                            <div class="col-md-12">
                                <div class="card" id="card1">
                                    <center><img class="card-img-top" src={{record.pic}} alt="Doctor Photo" id="cardimg3" style="background-color: aliceblue;"></center>
                                    <div class="card-body" id="searchbody">
                                        <center>
                                            <div class="card-title">
                                                <h5>NAME: {{record.name}}</h5>
                                            </div>
                                            <div class="card-text">QUALIFICATION: {{record.qual}}</div>
                                            <div class="card-text">EXPERIENCE: {{record.exp}}</div>
                                            <div class="card-text">HOSPITAL: {{record.hospital}}</div>
                                            <div class="card-text">MOBILE: {{record.mobile}}</div>
                                        </center>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <center>
                    <div class=" modal-footer mx-auto" style="background-color: aliceblue">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </center>

            </div>
        </div>
    </div>

    <!-- Signup Modal -->
    <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="signupTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="modalbodyy">
                <div class="modal-header" style="background-color: aliceblue;">
                    <div class="modal-title" id="signupTitle">
                        <center>
                            <div>
                                <h5>Signup</h5>
                            </div>
                        </center>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="sfrm" action="index-submitpage.php" method="post">
                    <div class="modal-body">
                        <!--user id-->
                        <div class="form-group">
                            <label class="font-weight-bold">Id: </label><span class="text-info font-weight-bold" id="res"><img src="pics/loading-ttcredesign.gif" id="waitt" width="20px" height="20px"></span>
                            <input type="email" required class="form-control" autofocus name="suid" id="suid" autocomplete="off" placeholder="xyz@gmail.com">
                        </div>
                        <button type="button" class="btn btn-primary" id="checkuid" name="checkuid">SUBMIT</button>
                        <div id="signupshow" name="signupshow">
                            <!--Name-->
                            <div class="form-group">
                                <label class="font-weight-bold">Name: </label>
                                <input type="text" required class="form-control" name="sname" id="sname" autocomplete="off" placeholder="Your Name">
                            </div>

                            <!--password-->
                            <div class="form-group form-check-password ">
                                <label class="font-weight-bold">Password:</label>
                                <span> <small id="messagepwd"></small></span>
                                <input type="password" class="form-control" placeholder="Atleast 8 characters:" pattern="(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*" name="spwd" id="spwd" required>
                                <input type="checkbox" onclick="showpasswords();" id="showpassword">Show password<br>
                            </div>
                            <!--mobile-->
                            <div class="form-group">
                                <label class="font-weight-bold">Mobile:</label><span><small id="messagemobile"></small></span>
                                <input type="tel" class="form-control" name="smobile" id="smobile" type="smobile" placeholder="78xxxxxxxx" required pattern="[6-9]{1}[0-9]{9}" maxlength="10" autocomplete="off">
                            </div>
                            <!--buttons-->
                            <div class="form-row">
                                <div class="form-check form-check-inline col-2 font-weight-bold">Are You?</div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="Doctor" name="category" value="Doctor" required>
                                    <label class="form-check-label" for="doctor">Doctor</label>&nbsp;&nbsp;
                                    <div class="form-check form-check-inline font-weight-bold">or</div>
                                    <input class="form-check-input" type="radio" id="Patient" name="category" value="Patient" required checked>
                                    <label class="form-check-label" for="patient">Patient</label>
                                </div>
                            </div>
                            <br>
                            <!--<small class="text-muted">We will send you a text to verify your phone. <br>Message and Data rates may apply.</small>-->
                            <center>
                                <h4 class="text-success" id="signupmessage"></h4>
                            </center>
                        </div>
                    </div>
                    <div class="modal-footer" style="background-color: aliceblue;">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">CLOSE</button>
                        <button type="submit" class="btn btn-primary" id="signupsubmit" name="submit">SIGNUP</button>
                    </div>
                </form>
                <div style="background-color: aliceblue;">
                    <center>
                        <h6>Already have an account? <a href="#" data-toggle="modal" data-target="#login" data-dismiss="modal" class="text-info">Login Here</a></h6>
                    </center>
                </div>

            </div>
        </div>
    </div>

    <!--Login-Model-->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="modalbodyy">
                <div class="modal-header" style="background-color: aliceblue;">
                    <div class="modal-title" id="signupTitle">
                        <h5>Login</h5>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="lfrm">
                        <!--login id-->
                        <div class="form-group">
                            <label class="font-weight-bold">Id:</label>
                            <input type="email" required class="form-control" autofocus id="luid" name="luid" placeholder="xyz@gmail.com" autocomplete="off">
                        </div>
                        <!--password-->
                        <div class="form-group">
                            <label class="font-weight-bold">Password:</label><span class="float-right">
                                <!--<a href="#" class="text-info" style="text-decoration:none" id="fetchpwd" name="fetchpwd">Forgot Password</a>-->
                                <a href="#" class="text-info" id="pwdsms" name="pwdsms">Forgot Password</a>

                            </span>
                            <input type="password" required class="form-control" id="lpwd" name="lpwd" placeholder="Atleast 8 characters">
                            <input type="checkbox" onclick="showpasswordl();">Show password<br>
                        </div>
                        <!--Hidden name-->
                        <input type="hidden" id="hdnname" name="hdnname">
                        <small id="smsmsg" name="smsmsg" class="text-warning" style="font-size:10px">Password will be sent on your mobile no between 9:00 to 21:00 hrs.</small>

                        <center>
                            <div class="text-info" id="loginresponse" name="loginresponse"></div>
                        </center>

                    </form>
                </div>
                <div class="modal-footer" style="background-color: aliceblue;">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">CLOSE</button>
                    <button type="button" class="btn btn-primary" id="loginsave" name="loginsave">LOGIN</button>
                    <br>
                </div>
                <div style="background-color: aliceblue;">
                    <center>
                        <h6>Don't have an account? <a href="#" data-toggle="modal" data-target="#signup" data-dismiss="modal" class="text-info">Signup Here</a></h6>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>
