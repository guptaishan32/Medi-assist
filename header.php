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
        
