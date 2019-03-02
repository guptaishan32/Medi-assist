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
    <script type="text/javascript">
        
        $(document).ready(function(){
            
            fillalldoctors();
            function fillalldoctors()
            {
                $pid=$("#pid").val();
                $.getJSON("consultaion-fetch-all-doctors.php?pid="+$pid,function(jsonArray){
                    /*alert(JSON.stringify(jsonArray));*/
                    
                    for(i=0;i<jsonArray.length;i++)
                        {
                            /*alert(jsonArray[i].doctor);*/
                            $("#cdoctor").append("<option value='"+jsonArray[i].doctor+"'></option>");
                        }
                    
                });
            }  
/*
            $("#clist").click(function() {
                $pid = $("#pid").val();
                $cdoctor = $("#cdoctor").val();
                $.getJSON("consultation-fetch-all-data-pid.php?pid=" + $pid+"&cdoctor="+$cdoctor, function(jsonArray) {
                    if (jsonArray.length != 0) {
                        alert(jsonArray[0].pid);
                        $("#pid").val(jsonArray[0].pid);
                        
                        $("#cdoctor").val(jsonArray[0].doctor);
                        $("#cdate").val(jsonArray[0].cdate);
                    } else {
                        alert("Invalid Id");
                    }
                });
            });
*/

                    });
            
     var myapp = angular.module("app", []);
        myapp.controller("mycontroller", function($scope, $http) {
            $scope.json;
            $pid=$("#pid");
            $scope.doFetchJson= function() {
                /*alert();*/
                
                $http.get("consultaion-fetch-all-data-pid.php?pid="+$pid).then(shanti, noshanti);
                    
                function shanti(jsonArray) {
                    /*alert(JSON.stringify(jsonArray.data));*/
                    $scope.json = jsonArray.data;
                    
                }

                function noshanti(jsonArray) {
                    alert(jsonArray.data);
                }
            }
            

             $scope.deleteRecord = function(nextdate,doctor) {
                $http.get("consultation-cancel-nextdate-record.php?nextdate=" + nextdate+"&doctor="+doctor+"&pid="+$pid).then(shanti, noshanti);
                 /*alert();*/
                function shanti(jsonArray) {

                    alert(jsonArray.data);
                    $scope.doFetchJson();
                }

                function noshanti(jsonArray) {
                    alert(jsonArray.data);
                }
            }

        });
            

       </script>
       <style>
        #card1
{
        border:1px grey;
    box-shadow: 10px 10px 50px grey;
    background-color: ghostwhite;
    transition: ease all 1s;
    font-family:Adobe Garamond Pro Bold;
}
           
        </style>

</head>
<!-- ng-init="showvalue(); -->
<body ng-app="app" ng-controller="mycontroller" style="background-color:aliceblue">
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
                        <center><div id="infolines">Check Your Appointments</div></center>
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
                    <center><div id="infolines"><h6>Check Your Appointments</h6></div></center>            
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
                    <center><div id="infolines">Check Your Appointments</div></center>            
                </div>
            </div>
        </div>
    <br>
    <div class="form-group form-inline justify-content-center" style="font-family:Adobe Garamond Pro Bold;">
          <label class="col-sm-auto"><h4>Patient Id: </h4></label><input type="text" class="form-control col-sm-4" name="pid" id="pid" required value="<?php echo $_SESSION["uid"]; ?> "  readonly> 
    </div>
       
        <div class="form-group form-inline justify-content-center" style="font-family:Adobe Garamond Pro Bold;">
        <label class="col-sm-auto"><h4>Doctor:</h4></label>
<!--              <select ng-model="doctor" name="doctor" class="form-control" ng-options="record.doctor for record in doctor">
              <option value="select"></option>
          </select>-->
                             <input list="cdoctor" name="cdoctor" id="clist" class="form-control col-sm-3" ng-model="hint" placeholder="Select your Dcotor">
                            <datalist id="cdoctor" name="cdoctor">
                                <option value="select" disabled>Select</option>      
                            </datalist>
                           &nbsp;&nbsp;&nbsp;
                            <input type="button" class="btn btn-primary" ng-click="doFetchJson();" value="Submit">
      </div>
      <div class="container">
      <div class="row">
          <div class="col-sm-12 d-none d-sm-block" style="font-family:Adobe Garamond Pro Bold;">
      <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Sr No</th>
      <th scope="col">Patient Id</th>
      <th scope="col">Doctor Consulted</th>
      <th scope="col">Consultation date (yr/m/d)</th>
      <th scope="col">Report Pic</th>
      <th scope="col">Instructions</th>
      <th scope="col">Next Consult. Date (yr/m/d)</th>
      <th scope="col">Cancel Appointment??</th>
    </tr>
  </thead>
  <tbody>
<tr ng-repeat="record in json | filter:hint">
                <td>{{$index+1}}</td>
                <td>{{record.pid}}</td>
                <td>{{record.doctor}}</td>
                <td>{{record.cdate}}</td>
    <td><a href="{{record.reportpic}}" target="_blank"><img src="{{record.reportpic}}" width="50px" height="50px"></a></td>
                <td>{{record.inst}}</td>
                <td>{{record.nextdate}}</td>
                <td><input type="button" class="btn btn-outline-danger" ng-click="deleteRecord(record.nextdate,record.doctor);" value="Cancel"></td>
    </tr>
  </tbody>
</table>
    </div>
          </div></div>
          
          <div class="container-fluid">
      <div class="row" ng-repeat="record in json| filter:hint">
          <div class="col-12 d-block d-sm-none" style="font-family:Adobe Garamond Pro Bold;">
           <div class="card" id="card1">
                      <div class="card-body" id="searchbody">
                       
                           <div class="card-title"><h5>Patient Id: {{record.pid}}</h5></div>
                          <div class="card-text"><b>Doctor: </b>{{record.doctor}}</div>
                          <div class="card-text"><b>Consult Date: </b>{{record.cdate}}</div>
                          <div class="card-text"><b>Report Pic:</b><a href="{{record.reportpic}}" target="_blank"><img src="{{record.reportpic}}" width="50px" height="50px"></a></div>
                          <div class="card-text"><b>Inst: </b>{{record.inst}}</div>
                          <div class="card-text"><b>Next Date: </b>{{record.nextdate}}</div>
                          <div class="card-text"><b>Cancell Appointment: </b><input type="button" class="btn btn-outline-danger" ng-click="deleteRecord(record.nextdate,record.doctor);" value="Cancel"></div>
                    
                         </div>

          </div>
              </div>
    </div>
    </div>
    
    <br><br><br><br>

<?php include_once("footer.php") ?>
    </body></html>