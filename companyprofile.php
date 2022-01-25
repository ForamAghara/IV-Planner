<?php
include('connect-db.php');
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['user']) ){
    if($_SESSION['user']=="company"){
$sel = "SELECT * from `company_person` where `c_id` = ".$_SESSION['username']."";
$result = mysqli_query($conn,$sel);
$userdata=mysqli_fetch_array($result);

}
else{
    if($_SESSION['user']=="faculty"){
        header("Location: faculty.php");
    }
    else if($_SESSION['user']=="student"){
        header("Location: student.php");
    }
    else if($_SESSION['user']=="parent"){
        header("Location: parent.php");
    }
    else if($_SESSION['user']=="admin"){
        header("Location: admin.php");
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
    <title>Company | Profile</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="assets/plugins/morrisjs/morris.css" rel="stylesheet">
    
     <!-- chartist CSS -->
     
    <link rel="stylesheet" href="assets/plugins/html5-editor/bootstrap-wysihtml5.css" />

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
                    <a class="navbar-brand" href="company.php">
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
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
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
                           <!-- ============================================================== -->
                           <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/profile.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="assets/images/users/profile.png" alt="user"></div>
                                            <div class="u-text">
                                            <h4><?php echo $userdata['name']; ?></h4>
                                            <p class="text-muted"><?php echo $userdata['email_id']; ?></p><a href="companyprofile.php" class="btn btn-rounded btn-danger btn-sm">My Profile</a></div>
                                        </div>
                                    </li>
                                   
                                    <li role="separator" class="divider"></li>
                                    <li><a href="companysetting.php"><i class="ti-settings"></i> Account Setting</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
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
                    <div class="profile-img"> <img src="assets/images/users/profile.png" alt="user" />
                        <!-- this is blinking heartbit-->
                        <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text">
                    <h5><?php echo $userdata['name']; ?></h5>
                        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                                        
                        <div class="dropdown-menu animated flipInY">
                         <!-- text--> 
                         <a href="companyprofile.php" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                         <!-- text-->  
                 
                         <!-- text--> 
                         <div class="dropdown-divider"></div>
                         <!-- text-->  
                         <a href="companysetting.php" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                         <!-- text--> 
                         <div class="dropdown-divider"></div>
                         <!-- text-->  
                         <a href="logout.php" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                         <!-- text-->  
                         </div>
                    </div>
                      </div>
                       
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                
                        
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                      
                      
                       
                        <li> <a  href="company.php" ><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                      
                        <li> <a href="companyvisitactivities.php" ><i class="mdi mdi-voice"></i><span class="hide-menu">Visit Activities</span></a>
                        </li>
                        
                        <li> <a href="companyrules.php" ><i class="mdi mdi-format-quote"></i><span class="hide-menu" >Rules & Regulations</span></a>
                          </li>
                        
                        <li> <a href="companyapprovals.php" ><i class="mdi mdi-checkbox-marked-circle-outline"></i><span class="hide-menu" >Approvals</span></a>
                        </li>
                        
                        <li> <a href="companyfeedbacks.php" ><i class="mdi mdi-function"></i><span class="hide-menu" >Feedbacks</span></a>
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
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Profile</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                           <li class="breadcrumb-item active">Profile</li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Profile</h4>
                                
								<div class="form-group row">
                                                <label for="example-text-input" class="col-md-4 col-form-label">Name</label>
                                                <div class="col-md-8 col-form-label">
                                                       <h5><?php echo $userdata['name']; ?></h5>
                                                </div>
                                </div>
								<div class="form-group row">
                                                <label for="example-text-input" class="col-md-4 col-form-label"> Email Id</label>
                                                <div class="col-md-8 col-form-label">
                                                    <h5><?php echo $userdata['email_id']; ?></h5>
                                             </div>
                                </div>



                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label"> Mobile No.</label>
                        <div class="col-md-8 col-form-label">
                            <h5><?php echo $userdata['mobile_no']; ?></h5>
                     </div>
        </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-4 col-form-label">Password</label>
                                    <div class="col-md-8 col-form-label">
                                        <h5><?php echo $userdata['password']; ?></h5>
                                 </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-4 col-form-label">Company</label>
                                    <div class="col-md-8 col-form-label">
                                        <h5><?php echo $userdata['company_name']; ?></h5>
                                 </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label">City</label>
                        <div class="col-md-8 col-form-label">
                            <h5><?php echo $userdata['company_city']; ?></h5>
                     </div>
        </div>
                                </div>
                              

                             
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
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
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- wysuhtml5 Plugin JavaScript -->
	
    <script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="assets/plugins/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="assets/plugins/html5-editor/bootstrap-wysihtml5.js"></script>
    <script>
    $(document).ready(function() {

        $('.textarea_editor').wysihtml5();


    });
    </script>
    <script src="assets/plugins/dropzone-master/dist/dropzone.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>