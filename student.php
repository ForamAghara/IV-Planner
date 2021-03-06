<?php
include('connect-db.php');
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['user'])){
    if($_SESSION['user']=="student"){
        $sel = "SELECT * from `student` where `enroll_no` = ".$_SESSION['username']."";
        $result = mysqli_query($conn,$sel);
        $userdata=mysqli_fetch_array($result);

        $sel = "SELECT name from `student` where `room_preference` = '" . $userdata['room_preference'] . "' AND `student_id` != '" . $userdata['student_id'] . "'";
        $result = mysqli_query($conn,$sel);
        $groups=mysqli_fetch_all($result, MYSQLI_ASSOC);

        $sel = "SELECT * from `notification` where `user_type` = 'student'";
        $result = mysqli_query($conn,$sel);
        $notifications=mysqli_fetch_all($result, MYSQLI_ASSOC);

        $sel = "SELECT c_id from `approvals` where `visit_id` = " . $userdata['visit_id'];
        $result = mysqli_query($conn,$sel);
        $c_id=mysqli_fetch_assoc($result)['c_id'];

        $sel = "SELECT visit_activities from `company_person` where `c_id` = " . $c_id;
        $result = mysqli_query($conn,$sel);
        $visit_activities=mysqli_fetch_assoc($result)['visit_activities'];

        $sel = "SELECT rules_regulations from `company_person` where `c_id` = " . $c_id;
        $result = mysqli_query($conn,$sel);
        $rules_regulations=mysqli_fetch_assoc($result)['rules_regulations'];
    } else {
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
    <title>Student | Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="assets/plugins/morrisjs/morris.css" rel="stylesheet">
    
     <!-- chartist CSS -->

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
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true"> <i class="mdi mdi-message"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox animated slideInUp">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                        <?php
                                            foreach($notifications as $notification) :                                                                            
                                        ?>
                                            <a href="#">
                                                <div class="mail-contnet">
                                                    <h5><?=$notification['title']?></h5>
                                                    <span class="mail-desc"><?=$notification['info']?></span>
                                                    <span class="time"><?=$notification['created_at']?></span>
                                                </div>
                                            </a>
                                        <?php
                                            endforeach;
                                        ?>
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
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" >
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
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
                    <!-- Row -->
                    <div class="row">
                            <div class="col-12">
                        <div class="card-group">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="m-b-0"><i class="mdi mdi-wallet text-purple" ></i></h2>
                                            <h3 class="">Trip At</h3>
                                            <h5 class="card-subtitle">Pune</h5></div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="m-b-0"><i class="mdi mdi-buffer text-warning" ></i></h2>
                                            <h3 class="">232</h3>
                                            <h5 class="card-subtitle">No. of registered students</h5></div>
                                       
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="m-b-0"><i class="mdi mdi-briefcase-check text-info" ></i></h2>
                                            <h3 class="">50%</h3>
                                            <h5 class="card-subtitle">Payment done</h5></div>
                                       
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="m-b-0"><i class="mdi mdi-alert-circle text-success" ></i></h2>
                                            <h3 class="">Blacklisting</h3>
                                            <h5 class="card-subtitle">You are not blacklisted.</h5></div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                                <div class="col-lg-12">
                                        <!-- Column -->
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Trip Updates</h4>
                                                
                                            <!-- ============================================================== -->
                                            <!-- Comment widgets -->
                                            <!-- ============================================================== -->
                                            <div class="slimScrollDiv" style="height:280px; overflow: hidden; overflow-y: auto">
                                                <div class="comment-widgets m-b-20">
                                                    <!-- Comment Row -->
                                                    <div class="d-flex flex-row comment-row">
                                                        <div class="p-2"><span class="round"><img src="assets/images/users/1.jpg" alt="user" width="50"></span></div>
                                                        <div class="comment-text w-100">
                                                            <h5>James Anderson</h5>
                                                            <div class="comment-footer">
                                                                <span class="date">Nov 14, 2018</span>
                                                            
                                                                </span>
                                                            </div>
                                                            <p class="m-b-5 m-t-10">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing and type setting industry.</p>
                                                        </div>
                                                    </div>
                                                    <!-- Comment Row -->
                                                    <div class="d-flex flex-row comment-row ">
                                                        <div class="p-2"><span class="round"><img src="assets/images/users/2.jpg" alt="user" width="50"></span></div>
                                                        <div class="comment-text active w-100">
                                                            <h5>Michael Jorden</h5>
                                                            <div class="comment-footer">
                                                                <span class="date">Nov 17, 2018</span>
                                                            
                                                                </span>
                                                            </div>
                                                            <p class="m-b-5 m-t-10">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing and type setting industry..</p>
                                                        </div>
                                                    </div>
                                                    <!-- Comment Row -->
                                                    <div class="d-flex flex-row comment-row">
                                                        <div class="p-2"><span class="round"><img src="assets/images/users/3.jpg" alt="user" width="50"></span></div>
                                                        <div class="comment-text w-100">
                                                            <h5>Johnathan Doeting</h5>
                                                            <div class="comment-footer">
                                                                <span class="date">Dec 1, 2018</span>
                                                            
                                                                </span>
                                                            </div>
                                                            <p class="m-b-5 m-t-10">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing and type setting industry.</p>
                                                        </div>
                                                    </div>
                                                    <!-- Comment Row -->
                                                    <div class="d-flex flex-row comment-row">
                                                        <div class="p-2"><span class="round"><img src="assets/images/users/4.jpg" alt="user" width="50"></span></div>
                                                        <div class="comment-text w-100">
                                                            <h5>James Anderson</h5>
                                                            <div class="comment-footer">
                                                                <span class="date">Dec 12, 2018</span>
                                                            
                                                                </span>
                                                            </div>
                                                            <p class="m-b-5 m-t-10">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing and type setting industry..</p>
                                                        </div>
                                                    </div>
                                            </div>
                                    </div>
                                </div>
                                
                                
                                <!-- Row -->
                              <!-- Column -->
                            </div>
                
                    
                    
                        </div>
                        </div>
                        <div class="col-4">
                                <div class="col-12">
                                        <div class="card">
                                              <div class="card-body">
                                                      <h4 class="card-title">Room Allocation</h4>
                  
                                                          <div class="form-group row">
                                                                <div class="table-responsive">
                                                                        <table id="demo-foo-addrow" class="table md-12 table-hover no-wrap " data-page-size="10">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No</th>
                                                                                    <th>Name</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>1</td>
                                                                                    <td><?=$userdata['name']?></td>
                                                                                </tr>
                                                                                <?php
                                                                                    $count = 2;
                                                                                    foreach($groups as $group) :                                                                            
                                                                                ?>
                                                                                <tr>
                                                                                    <td><?=$count++?></td>
                                                                                    <td><?=$group['name']?></td>
                                                                                </tr>
                                                                                <?php
                                                                                    endforeach;
                                                                                ?>
                                                                            </tbody>
                                                                    </table>
                                                                </div>
            
                                                              </div>
                                                         
                                               </div>
                                                    
                                                      
                                              </div>
                                              
                                        </div> 
                        </div>
                        
                    </div>
                    <!-- Row -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Visit Activities</h4>
                            <?=$visit_activities?>
                        </div>
                    </div>                            
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Rules Regulations</h4>
                            <?=$rules_regulations?>
                        </div>
                    </div>                            
                </div> 
                
                    <!-- Column -->
                     </div>
                <!-- Row -->
                
			</div>
    </div>
                
                        <!-- Column -->
                
				
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            
        </div>
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
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--sparkline JavaScript -->
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--morris JavaScript -->
    <script src="assets/plugins/raphael/raphael-min.js"></script>
    <script src="assets/plugins/morrisjs/morris.min.js"></script>
    <!-- Chart JS -->
    <script src="js/dashboard1.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>