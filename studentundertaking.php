<?php
include('connect-db.php');
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['user'])){
    if($_SESSION['user']=="student"){
$sel = "SELECT * from `student` where `enroll_no` = ".$_SESSION['username']."";
$result = mysqli_query($conn,$sel);
$userdata=mysqli_fetch_array($result);
}
else{
    if($_SESSION['user']=="faculty"){
        header("Location: faculty.php");
    }
    else if($_SESSION['user']=="admin"){
        header("Location: admin.php");
    }
    else if($_SESSION['user']=="parent"){
        header("Location: parent.php");
    }
    else if($_SESSION['user']=="company"){
        header("Location: company.php");
    }
    else if($_SESSION['user']=="agent"){
        header("Location: agent.php");
    }
    else{
        header("Location: logout.php");
    }
}
}
else {
	header("Location: logout.php");
}

?>
<!DOCTYPE html>
<html lang="en">
               
               <head>
                   <meta charset="utf-8">
                   <meta http-equiv="X-UA-Compatible" content="IE=edge">
                   <!-- Tell the browser to be responsive to screen width -->
                   <meta name="viewport" content="width=device-width, initial-scale=1">
                   <meta name="description" content="">
                   <meta name="author" content="">
                   <!-- Favicon icon -->
                   <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
                   <title>Student | Undertaking</title>
                   <!-- Bootstrap Core CSS -->
                   <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                   <!-- morris CSS -->
                   <link href="assets/plugins/morrisjs/morris.css" rel="stylesheet">
                   
                    <!-- chartist CSS -->
                  <link href="assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
     
                    <link href="assets/plugins/css-chart/css-chart.css" rel="stylesheet">
                   <!-- Custom CSS -->
                   <link href="css/style.css" rel="stylesheet">
                   
                   <!-- You can change the theme colors from here -->
                   <link href="css/colors/blue.css" id="theme" rel="stylesheet">
                   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                   <!--[if lt IE 9]>
                   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                   <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
               <![endif]-->
               </head>
               
               <body class="fix-header fix-sidebar card-no-border" >
                   <!-- ============================================================== -->
                   <!-- Preloader - style you can find in spinners.css -->
                   <!-- ============================================================== -->
                   <div class="preloader">
                       <svg class="circular" viewBox="25 25 50 50">
                           <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
                   </div>
                   <!-- ============================================================== -->
                   <!-- Main wrapper - style you can find in pages.scss -->
                   <!-- ============================================================== -->
                   <div id="main-wrapper">
                       <!-- ============================================================== -->
                       <!-- Topbar header - style you can find in pages.scss -->
                       <!-- ============================================================== -->
                       <header class="topbar">
                           <nav class="navbar top-navbar navbar-expand-md navbar-light">
                               <!-- ============================================================== -->
                               <!-- Logo -->
                               <!-- ============================================================== -->
                               <div class="navbar-header">
                                   <a class="navbar-brand" href="student.php">
                                       <!-- Logo icon --><b>
                                           <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                           <!-- Dark Logo icon -->
                                           <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                           <!-- Light Logo icon -->
                                           <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                                       </b>
                                       <!--End Logo icon -->
                                       <!-- Logo text --><span>
                                        <!-- dark Logo text -->
                                        <img src="assets/images/logo-text.png" height="70%" width="70%" alt="homepage" class="dark-logo" />
                                        <!-- Light Logo text -->    
                                        <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
                               </div>
                               <!-- ============================================================== -->
                               <!-- End Logo -->
                               <!-- ============================================================== -->
                               <div class="navbar-collapse">
                                   <!-- ============================================================== -->
                                   <!-- toggle and nav items -->
                                   <!-- ============================================================== -->
                                   <ul class="navbar-nav mr-auto mt-md-0">
                                       <!-- This is  -->
                                       <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                                       <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                                       <!-- ============================================================== -->
                                       <!-- Comment -->
                                       <!-- ============================================================== -->
                                       <li class="nav-item dropdown">
                                           <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" > <i class="mdi mdi-message"></i>
                                               <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                                           </a>
                                           <div class="dropdown-menu mailbox animated slideInUp">
                                               <ul>
                                                   <li>
                                                       <div class="drop-title">Notifications</div>
                                                   </li>
                                                   <li>
                                                       <div class="message-center">
                                                            <a href="#">
                                                                    <div class="btn btn-danger btn-circle"><i class="ti-user"></i></div>
                                                                    <div class="mail-contnet">
                                                                        <h5>Launch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                                                </a>
                                                                <!-- Message -->
                                                                <a href="#">
                                                                    <div class="btn btn-success btn-circle"><i class="ti-user"></i></div>
                                                                    <div class="mail-contnet">
                                                                        <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                                                </a>
                                                                <!-- Message -->
                                                                <a href="#">
                                                                     <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                                     <div class="mail-contnet">
                                                                         <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                                                 </a>
                                                                <!-- Message -->
                                                                <a href="#">
                                                                    <div class="btn btn-info btn-circle"><i class="ti-user"></i></div>
                                                                    <div class="mail-contnet">
                                                                        <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                                                </a>
                                                       </div>
                                                   </li>
                                                   <li>
                                                       <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                                   </li>
                                               </ul>
                                           </div>
                                       </li>
                                     </ul>
                                     
                                     
                                   <!-- ============================================================== -->
                                   <!-- User profile and search -->
                                   <!-- ============================================================== -->
                                   <ul class="navbar-nav my-lg-0">
                                       <!-- ============================================================== -->
                                       <!-- Profile -->
                                       <!-- ============================================================== -->
                                       <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/4.jpg" alt="user" class="profile-pic" /></a>
                                        <div class="dropdown-menu dropdown-menu-right scale-up">
                                            <ul class="dropdown-user">
                                                <li>
                                                    <div class="dw-user-box">
                                                        <div class="u-img"><img src="assets/images/users/4.jpg" alt="user"></div>
                                                        <div class="u-text">
                                                        <h4><?php echo $userdata['name']; ?></h4>
                                            <p class="text-muted"><?php echo $userdata['email_id']; ?></p><a href="studentprofile.php" class="btn btn-rounded btn-danger btn-sm">My Profile</a></div>
                                                    </div>
                                                </li>
                                               
                                                <li role="separator" class="divider"></li>
                                                <li><a href="studentsetting.php"><i class="ti-settings"></i> Account Setting</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>    
                                       </ul>
                                    </div>
                               </nav>
                       </header>
                       <!-- ============================================================== -->
                       <!-- End Topbar header -->
                       <!-- ============================================================== -->
                       <!-- ============================================================== -->
                       <!-- Left Sidebar - style you can find in sidebar.scss  -->
                       <!-- ============================================================== -->
                       <aside class="left-sidebar">
                           <!-- Sidebar scroll-->
                           <div class="scroll-sidebar">
                               <!-- User profile -->
                               <div class="user-profile">
                                   <!-- User profile image -->
                                   <div class="profile-img"> <img src="assets/images/users/4.jpg" alt="user" />
                                       <!-- this is blinking heartbit-->
                                       <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                                   </div>
                                   <!-- User profile text-->
                                   <div class="profile-text">
                                   <h5><?php echo $userdata['name']; ?></h5>
                                       <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                                        
                                       <div class="dropdown-menu animated flipInY">
                                        <!-- text--> 
                                        <a href="studentprofile.php" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                        <!-- text-->  
                                
                                        <!-- text--> 
                                        <div class="dropdown-divider"></div>
                                        <!-- text-->  
                                        <a href="studentsetting.php" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                                        <!-- text--> 
                                        <div class="dropdown-divider"></div>
                                        <!-- text-->  
                                        <a href="logout.php" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                   </div>
                                     </div>
                                      
                               <!-- End User profile text-->
                               <!-- Sidebar navigation-->
                               
                                       
                               <nav class="sidebar-nav">
                                   <ul id="sidebarnav">
                                       <li class="nav-devider"></li>
                                     
                                       <li> <a  href="student.php" ><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                                       </li>
                                       <li> <a href="studentregistration.php" ><i class="mdi mdi-bullseye"></i><span class="hide-menu">Registration</span></a>
                                       </li>
               
                                       <li> <a href="studentcoordinator.php"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Coordinators</span></a>
                                       </li>
               
                                       <li> <a href="studentroom.php"><i class="mdi mdi-apps"></i><span class="hide-menu">Room Allocation</span></a>
                                        </li>
                                        
                                       <li> <a href="studentpayment.php"><i class="mdi mdi-credit-card"></i><span  class="hide-menu">Payment Intimation</span></a>
                                         </li>
                                       
                                       <li> <a href="studentundertaking.php"><i class="mdi mdi-clipboard-text"></i><span class="hide-menu" >Undertaking</span></a>
                                       </li>
                                       
                                       <li> <a href="studentcancellation.php"><i class="mdi mdi-close-box"></i><span class="hide-menu">Trip Cancellation</span></a>
                                       </li>
                                       
                                       <li> <a href="studentinvoice.php"><i class="mdi mdi-cursor-text"></i><span class="hide-menu">Invoice</span></a>
                                       </li>
                                       
                                          <li> <a href="studentfeedback.php"><i class="mdi mdi-function"></i><span class="hide-menu">Feedback/Report</span></a>
                                       </li>
               
                                       <li> <a href="studenttickets.php"><i class="mdi mdi-burst-mode"></i><span class="hide-menu">Tickets</span></a>
                                       </li>       
                                       
                                       <li> <a href="studentinsurance.php"><i class="mdi mdi-seat-recline-extra"></i><span class="hide-menu">Insurance</span></a>
                                       </li>  
                                       <li> <a href="studentlivestatus.php"><i class="mdi mdi-crosshairs-gps"></i><span class="hide-menu">Live Status</span></a>
                                       </li>                
                                      </ul>
                               </nav>
                               
                               <!-- End Sidebar navigation -->
                           </div>
                           
                           <!-- End Sidebar scroll-->
                       </aside>



        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Student Undertaking</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                               <li class="breadcrumb-item active">Student Undertaking</li>
                        </ol>
                    </div>
                </div>    

               <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
            
                <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                
                <div class="row">
                    <!-- Column -->
                    <div class="col-12">
                            <div class="card">
                                  <div class="card-body">
                                         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                          <div class="form-group row">
                                                  <label for="example-text-input" class="col-md-4 col-form-label">Select Coordinator</label>
                                                  <div class="col-md-6">

                                                 <select class="selectpicker m-b-20 m-r-10" data-style="btn-info btn-outline-info" name="cname" required>

                                                  

                                                      <option data-tokens="" selected disabled>Coordinators</option>
                                                                  
                                                              <?php
                                                              $sql = "SELECT * FROM `coordinator` where f_id=".$userdata['f_id']." AND visit_id=".$userdata['visit_id']." AND designation='student'";
                                                              $result = $conn->query($sql);
                          

                                                          if(mysqli_num_rows($result)>0)
                                                          {
                                                            while($data=mysqli_fetch_array($result))
                                                        {
                                                   ?>

                                                                  <option value="<?php echo $data['name'];?>"><?php echo $data['name']?></option>
                                                                  <?php
                                                    }
                                                  }
                                                  ?>
                                              </select>
                                                       <input type="hidden" name="stuid" value="<?php echo $userdata['student_id'];?>">
                                                       <input type="hidden" name="fid" value="<?php echo $userdata['f_id'];?>">
                                                       <input type="hidden" name="visitid" value="<?php echo $userdata['visit_id'];?>">

                                                  </div>
                                                  <div class="col-md-2">
                                                         <input type="submit" id="submit_btn" class="btn btn-success"  name="submit_btn" value="Submit">
                                                    </div>
                                              </div>
                                              </form>    
                                              <?php 
                                                 $sel = "SELECT * from `undertaking` where student_id= ".$userdata['student_id']."";
                                                 $rel = $conn->query($sel);
                                                 $udata = mysqli_fetch_array($rel);
                                              ?>
                                              <h4>Submission Status : <?php echo $udata['status'];?></h4>
                                      </div> 
                                  </div>
                                </div>
                             </div>
             
                
                <div class="row">
                        <div class="col-12">
                                <div class="card">
                                      <div class="card-body">
                                          <?php 
                                                $sql = "SELECT * from `visit` where visit_id=".$userdata['visit_id']."";
                                                $result2 = $conn->query($sql);
                                                $vdata = mysqli_fetch_array($result2);
                                            ?>
                                          <div  id="undertaking">
                                                  <h2  style="text-align:center;"><b><u>UNDERTAKING BY STUDENTS</u></b></h2>
                                                  <p style="text-align:justify; font-size:17px">I,	Mr./Ms. <?php echo $userdata['name'];?> En. No. <?php echo $userdata['enroll_no']?> of <?php echo $userdata['branch'];?> Semester: <?php echo $userdata['semester'];?> do hereby undertake and abide by the following terms:</p>
                                                  <p style="text-align:justify; font-size:17px"> I am	attending	Industrial	Visit/Educational	Tour	at	<?php echo $vdata['city'];?> starting from <?php echo $vdata['starting_date'];?>	to <?php echo $vdata['ending_date'];?> at	my	own	interest	and	risk.</p>
                                                  <h2 style="text-align:center;"><b><u >RULES & REGULATIONS</u></b></h2>   
                                                  <ul style="text-align:left;">
                                                      <li >All the expenses of tour will	be bear	by me.</li>
                                                      <li >I	will conduct myself	in a highly	disciplined	and	decent manner both inside and outside the campus.</li>
                                                      <li >I	am	solely	responsible	for	my	entire	luggage	including	electronic	gadgets and	jewellery (suggested	not	to	wear)	if	any.</li>
                                                      <li >I	will stay and	work in	a TEAM	with	my	classmates and	Tour	In-Charge	(Faculty).</li>
                                                      <li >During	the	Tour,	if	I am	being	found	for	any	kind	of	rude	behavior, misconduct or	any	kind unexpected	behavior	with	my	classmates or	Tour In-charge	(Faculty),	Faculty has	full authority	to	take necessary	actions	as well	College	Management	can	also	take	appropriate	action,	and	I	am	ready for	the	same.</li>
                                                      <li >I	will	follow	the	rules	and	regulations	of	the	organizations	where	we	are	going	for	visit.</li>
                                                      <li >I	will	be	punctual	during	the	Tour,	if	I	miss	the	timing	during	the	Tour; Tour	In-Charge (Faculty)	is	free to	start	the	tour.</li>
                                                      <li >I	will	surely	attend	extra	classes	if	arranged	on	Sundays	in	nearby	future	to compensate these	leaves.</li>
                                                      <li >I	will	not	demand	any	special	or	extra	treatment	as	I	have	been	informed	and agreed	with facilities	to be	provided	during	tour.	(Like	Transportation,	Hotel, and	Food	etc.)</li>
                                                  </ul> 
                                                  <p style="text-align:left; margin-left:800px">Signature </p>
                                                    <p style="text-align:left; margin-left:800px">Date: </p><br>
                                                  <h2 style="text-align:center;"><b><u >UNDERTAKING BY PARENTS</u></b></h2>
                                                  <p style="text-align:justify; font-size:17px" >I,	 Mr./Ms. ..................................................................................................... Father/	 Mother	 of	Mr./Ms. <?php echo $userdata['name'];?> En. No. <?php echo $userdata['enroll_no']?> doing	 his/her <?php echo $userdata['branch']?>: Semester: <?php echo $userdata['semester']?>	do	 hereby undertake	and abide by	the	aforesaid terms:</p>
                                                  <p style="text-align:justify; font-size:17px" >My	 Son/Daughter	 has	 informed	 me	 that	 he/she	 will	 carry	 out/	 attend	 Industrial	Visit/Educational Tour	 at	<?php echo $vdata['city'];?>	 outside	 the	<?php echo $userdata['college'];?>	 campus starting from	 <?php echo $vdata['starting_date'];?>	to	<?php echo $vdata['ending_date'];?>. I	am	permitting	him/her for	the	same and	I	will	take	full	responsibility	during	this	period	of	stay	outside	the	<?php echo $userdata['college'];?>	campus. I	am	aware that <?php echo $userdata['college'];?>	is	not responsible	for	any	loss	to	an individual	or	group	occurred	due	to	any	action	by	any	individual or	group	during	tour	as	this	is extra-curricular	activity.</p>
                                                    <p style="text-align:left;">Phone number of the Parent: </p>
                                                    <p style="text-align:left; margin-left:800px">Signature </p>
                                                    <p style="text-align:left; margin-left:800px">Date: </p>
                                                    
                 
                                          </div>
                                          <div id="editor"></div>
                                          <button  class="btn btn-warning" type="button" id="cmd">Download</button>
                                    </div>
                                    
                                </div>
                                
                            </div>
                     </div> 
						</div>
                       <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
          
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
     
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>

    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    
    <script src="js/jquery-1.12.3.min.js"></script>
    <script src="js/jspdf.min.js"></script>
    <script src="js/jspdf.debug.js"></script>
    <script type="text/javascript" src="js/standard_fonts_metrics.js"></script>
    <script type="text/javascript" src="js/split_text_to_size.js"></script> 
    <script type="text/javascript" src="js/context2d.js"></script>
    <script type="text/javascript" src="js/addhtml.js"></script>
    <script type="text/javascript" src="js/acroform.js"></script>
    <script type="text/javascript" src="js/canvas.js"></script>
    <script type="text/javascript" src="js/annotations.js"></script>
    <script type="text/javascript" src="js/javascript.js"></script>
    
    <script type="text/javascript" src="js/from_html.js"></script>
    <script src="js/jquery.PrintArea.js" type="text/JavaScript"></script>
    <script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });

        $('#cmd').click(function () {   
    var doc = new jsPDF();
    doc.setFont('Helvetica-Oblique');
    doc.setFontSize(18);
    console.log(doc.getFontList());
  var specialElementHandlers = {
        '#editor': function (element, renderer) {
           return true;
       }
    };

    doc.fromHTML($('#undertaking').html(), 10, 10, {
        'width': 190,
        'elementHandlers': specialElementHandlers

    });
    doc.save('undertaking.pdf');
    
    // html2canvas($("#undertaking"), {
    //         onrendered: function(canvas) {         
    //             var imgData = canvas.toDataURL('image/jpeg');              
    //             var doc = new jsPDF('p','mm','a3');
    //             doc.addImage(imgData, 'JPEG', 10, 10);
    //             doc.save('sample-file.pdf');
    //         }
    //     });     
     


        });

      
     
     
     });

     
    </script>
  
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
     <script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>



<?php

if(isset($_POST['submit_btn'])){ 

$name = $_POST['cname'];

$student = $_POST['stuid'];

$visit = $_POST['visitid'];




$status = "submitted";

$sql= "UPDATE `undertaking` SET status='$status', coordinator_name ='$name',date= current_date() WHERE  `student_id`=$student AND `visit_id` = $visit";
 mysqli_query($conn,$sql);

//  echo("Error description: " . mysqli_error($conn));

echo '<script>
      window.location.href="studentundertaking.php";
  </script> ';
}

?>


</body>

</html>
