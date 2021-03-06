<?php
include('connect-db.php');
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['user']) ){
    if($_SESSION['user']=="admin"){
$sel = "SELECT * from `admin` where `ad_id` = ".$_SESSION['username']."";
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
                   <title>Admin | Dashboard</title>
                   <!-- Bootstrap Core CSS -->
                   <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                   <!-- morris CSS -->
                   <link href="assets/plugins/morrisjs/morris.css" rel="stylesheet">
                   <link href="assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
                   <link href="assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
                   <link href="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
                    <!-- chartist CSS -->
                    <link href="assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
                     <link href="assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
                     <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
               
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
                                   <a class="navbar-brand" href="admin.php">
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
                                       <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/profile.png" alt="user" class="profile-pic" /></a>
                                        <div class="dropdown-menu dropdown-menu-right scale-up">
                                            <ul class="dropdown-user">
                                                <li>
                                                    <div class="dw-user-box">
                                                        <div class="u-img"><img src="assets/images/users/profile.png" alt="user"></div>
                                                        <div class="u-text">
                                                            <h4><?php echo $userdata['name']; ?></h4>
                                                            <p class="text-muted"><?php echo $userdata['email_id']; ?></p><a href="adminprofile.php" class="btn btn-rounded btn-danger btn-sm">My Profile</a>
                                                        </div>
                                                    </div>
                                                </li>
                                               
                                                <li role="separator" class="divider"></li>
                                                <li><a href="adminsetting.php"><i class="ti-settings"></i> Account Setting</a></li>
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
                                        <a href="adminprofile.php" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                        <!-- text-->  
                                
                                        <!-- text--> 
                                        <div class="dropdown-divider"></div>
                                        <!-- text-->  
                                        <a href="adminsetting.php" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
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
                                     
                                     
                                       <li> <a href="admin.php" ><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                                       </li>
               
                                       <li> <a href="adminmanagestudent.php" ><i class="mdi mdi-account-settings-variant"></i><span class="hide-menu">Manage Student</span></a>
                                       </li>
                                      
                                     
                                       <li> <a href="adminmanagefaculty.php" ><i class="mdi mdi-account-settings-variant"></i><span class="hide-menu">Manage Faculty</span></a>
                                       </li>
                                       
                                       <li> <a href="adminmanageagent.php" ><i class="mdi mdi-account-settings-variant"></i><span class="hide-menu" >Manage Agent</span></a>
                                         </li>
                                       
                                       <li> <a href="adminmanagecompany.php" ><i class="mdi mdi-account-settings-variant"></i><span class="hide-menu" >Manage Company</span></a>
                                       </li>

                                       <li> <a href="adminmanageparent.php" ><i class="mdi mdi-account-settings-variant"></i><span class="hide-menu" >Manage Parent</span></a>
                                       </li>
                                       
                                       <li> <a class="has-arrow waves-effect waves-dark" aria-expanded="false" href="#" ><i class="mdi mdi-function"></i><span class="hide-menu" >Feedbacks</span></a>
                                        <ul aria-expanded="false" class="collapse">
                                                <li><a  href="adminfeedbacks.php#company">Companies Feedback</a></li>
                                                <li><a href="adminfeedbacks.php#student">Students Feedback</a></li>
                                                <li><a href="adminfeedbacks.php#parent">Parents Feedback</a></li>
                                            </ul>
                                    </li>
                                       
                                       <li> <a  href="adminblacklist.php" ><i class="mdi mdi-block-helper"></i></i><span  class="hide-menu">Blacklist</span></a>
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
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-8"><h2>2</h2>
                                        <h6>Total Visits Active</h6></div>
                                    <div class="col-4 align-self-center text-right  p-l-0">
                                        <div id="sparklinedash3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-8"><h2 class="">250</h2>
                                        <h6>Total Students</h6></div>
                                    <div class="col-4 align-self-center text-right p-l-0">
                                        <div id="sparklinedash"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-8"><h2>25</h2>
                                        <h6>Industries</h6></div>
                                    <div class="col-4 align-self-center text-right p-l-0">
                                        <div id="sparklinedash2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-8"><h2>70%</h2>
                                        <h6>Feedbacks</h6></div>
                                    <div class="col-4 align-self-center text-right p-l-0">
                                        <div id="sparklinedash4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap">
                                    <div>
                                        <h4 class="card-title">Payment Collection</h4>
                                    </div>
                                    <div class="ml-auto">
                                        <ul class="list-inline">
                                            <li>
                                                <h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10 "></i>C1</h6> </li>
                                            <li>
                                                <h6 class="text-muted  text-info"><i class="fa fa-circle font-10 m-r-10"></i>C2</h6> </li>
                                            <li>
                                                <h6 class="text-muted  text-right"><i class="fa fa-circle font-10 m-r-10"></i>C3</h6> </li>
                                            <li>
                                                <h6 class="text-muted  text-warning"><i class="fa fa-circle font-10 m-r-10"></i>D1</h6> </li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="morris-area-chart2" style="height: 405px;"></div>

                            </div>
                        </div>
                        
                       
                    
                    </div>
                    <div class="col-lg-4 col-md-5">
                        <!-- Column -->
                        <div class="card card-default">
                            <div class="card-header">
                                <div class="card-actions">
                                    <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                    <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                                    <a class="btn-close" data-action="close"><i class="ti-close"></i></a>
                                </div>
                                <h4 class="card-title m-b-0">Insurance Stats</h4>
                            </div>
                            <div class="card-body collapse show">
                            <div id="morris-donut-chart" class="ecomm-donute" style="height: 317px;"></div>
                                <ul class="list-inline m-t-20 text-center">
                                    <li>
                                        <h6 class="text-muted"> <i class="fa fa-circle text-success"></i>Issued</h6>
                                        <h4 class="m-b-0">4870</h4>
                                    </li>
                                <li>
                                    <h6 class="text-muted"><i class="fa fa-circle text-danger"></i> Pending</h6>
                                    <h4 class="m-b-0">3630</h4>
                                </li>
                              
                            </ul>

                            </div>
                        </div>
                        <!-- Column -->
                      
                </div>
                <div class="row">  
                    
                    <div class="col-lg-6">
                        <!-- Column -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Queries</h4>
                                <h6 class="card-subtitle">Latest queries</h6> </div>
                            <!-- ============================================================== -->
                            <!-- Comment widgets -->
                            <!-- ============================================================== -->
                            <div class="slimScrollDiv" style="height:450px; overflow: hidden; overflow-y: auto">
                            <div class="comment-widgets m-b-20">
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2"><span class="round"><img src="assets/images/users/1.jpg" alt="user" width="50"></span></div>
                                    <div class="comment-text w-100">
                                        <h5>James Anderson</h5>
                                        <div class="comment-footer">
                                            <span class="date">Nov 14, 2018</span>
                                            <span class="label label-success">Solved</span> <span class="action-icons active">
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
                                            <span class="label label-success">Solved</span> <span class="action-icons active">
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
                                            <span class="label label-danger">Unsolved</span> <span class="action-icons">
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
                                            <span class="label label-info">Pending</span> <span class="action-icons">
                                            </span>
                                        </div>
                                        <p class="m-b-5 m-t-10">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing and type setting industry..</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>

                        <!-- Column -->
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Feeds</h4>
                                <ul class="feeds">
                                    <li>
                                        <div class="bg-light-info"><i class="fa fa-bell-o"></i></div> You have 4 pending tasks. <span class="text-muted">Just Now</span></li>
                                    <li>
                                        <div class="bg-light-success"><i class="ti-server"></i></div> Server #1 overloaded.<span class="text-muted">2 Hours ago</span></li>
                                    <li>
                                        <div class="bg-light-warning"><i class="ti-shopping-cart"></i></div> New order received.<span class="text-muted">31 May</span></li>
                                    <li>
                                        <div class="bg-light-danger"><i class="ti-user"></i></div> New user registered.<span class="text-muted">30 May</span></li>
                                    <li>
                                        <div class="bg-light-inverse"><i class="fa fa-bell-o"></i></div> New Version just arrived. <span class="text-muted">27 May</span></li>
                                    <li>
                                        <div class="bg-light-info"><i class="fa fa-bell-o"></i></div> You have 4 pending tasks. <span class="text-muted">Just Now</span></li>
                                    <li>
                                        <div class="bg-light-danger"><i class="ti-user"></i></div> New user registered.<span class="text-muted">30 May</span></li>
                                    <li>
                                        <div class="bg-light-inverse"><i class="fa fa-bell-o"></i></div> New Version just arrived. <span class="text-muted">27 May</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                <!-- Row -->
                
                
                <!-- Row -->
                
                <!-- Row -->
                <!-- Row -->
                
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
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
    <script src="js/dashboard1.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    
    <script src="assets/plugins/raphael/raphael-min.js"></script>
    <script src="assets/plugins/morrisjs/morris.min.js"></script>
    <script src="assets/plugins/switchery/dist/switchery.min.js"></script>
    <script src="js/jquery.PrintArea.js" type="text/JavaScript"></script>
    <script src="js/dashboard4.js"></script>
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
    });
    </script>

    
<script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
