<?php
include('connect-db.php');
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['user']) ){
    if($_SESSION['user']=="faculty"){
$sel = "SELECT * from `faculty` where `f_id` = ".$_SESSION['username']."";
$result = mysqli_query($conn,$sel);
$userdata=mysqli_fetch_array($result);
}
else{
    if($_SESSION['user']=="admin"){
        header("Location: admin.php");
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
                   <title>Faculty | Bonafide</title>
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
                                   <a class="navbar-brand" href="faculty.php">
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
                                                         <p class="text-muted"><?php echo $userdata['email_id']; ?></p><a href="facultyprofile.php" class="btn btn-rounded btn-danger btn-sm">My Profile</a></div>
                                                    </div>
                                                </li>
                                               
                                                <li role="separator" class="divider"></li>
                                                <li><a href="facultysetting.php"><i class="ti-settings"></i> Account Setting</a></li>
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
                         <a href="facultyprofile.php" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                         <!-- text-->  
                 
                         <!-- text--> 
                         <div class="dropdown-divider"></div>
                         <!-- text-->  
                         <a href="facultysetting.php" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
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
                                     
                                      
                                       <li> <a  href="faculty.php" ><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                                       </li>
               
                                       <li> <a href="facultycompanyapproval.php" ><i class="mdi mdi-checkbox-marked-circle-outline"></i><span class="hide-menu">Company Approvals</span></a>
                                       </li>
                                      
                                     
                                       <li> <a href="facultycreatetrip.php" ><i class="mdi mdi-voice"></i><span class="hide-menu">Create Trip</span></a>
                                       </li>
                                       
                                       <li> <a href="facultyinvoice.php" ><i class="mdi mdi-cursor-text"></i><span class="hide-menu" >Invoice Page</span></a>
                                         </li>
                                       
                                       <li> <a href="facultyundertaking.php" ><i class="mdi mdi-clipboard-text"></i><span class="hide-menu" >Undertaking</span></a>
                                       </li>
                                       
                                       <li> <a href="facultyinsurance.php" ><i class="mdi mdi-seat-recline-extra"></i><span class="hide-menu" >Insurance Companies</span></a>
                                       </li>

                                       <li> <a href="facultyblacklist.php" ><i class="mdi mdi-block-helper"></i><span class="hide-menu" >Blacklist</span></a>
                                       </li>
                                       
                                       <li> <a class="has-arrow waves-effect waves-dark" aria-expanded="false" href="#" ><i class="mdi mdi-credit-card"></i><span  class="hide-menu">Payment</span></a>
                                        <ul aria-expanded="false" class="collapse">
                                            <li><a href="facultypayment.php#report">Payment Report</a></li>
                                            <li><a href="facultypayment.php#entry">Payment Entry Coordinator</a></li>
                                            <li><a href="facultypayment.php#verify">Payment Verification</a></li>
                                        </ul>
                                        </li>
                                       
                                          <li> <a  href="facultybonafide.php" ><i class="mdi mdi-file-document"></i><span class="hide-menu">Bonafide</span></a>
                                       </li>
                                       <li> <a  href="facultyroom.php" ><i class="mdi mdi-home"></i><span class="hide-menu">Room Allocation</span></a>
                                       </li>
                                       <li> <a  href="facultyupdatestatus.php" ><i class="mdi mdi-comment-plus-outline"></i><span class="hide-menu">Update Status</span></a>
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
                        <h3 class="text-themecolor">Bonafide Letters</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                               <li class="breadcrumb-item active">Bonafide Letters</li>
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
						<div class="col-md-3">
                                <div class="card card-inverse card-dark">
                                    <div class="card-body">
                                        <div class="row p-t-10 p-b-10">
                                            <!-- Column -->
                                            <div class="col p-r-0">
                                                <h1 class="font-light text-white">ALL</h1>
												<h4 class="font-light text-white">Download</h4>
                                                </div>
                                            <!-- Column -->
                                            <div class="col text-right align-self-center">
                                                <a href=""> <div  class="css-bar m-b-0 css-bar-primary "><i class="mdi mdi-download"></i></div></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-3">
                                <div class="card card-inverse card-info">
                                        
                                    <div class="card-body">
                                            
                                        <div class="row p-t-10 p-b-10">
                                            
                                            <!-- Column -->
                                            <div class="col p-r-0">
                                                <h1 class="font-light text-white">C1</h1>
												<h4 class="font-light text-white">Download</h4>
                                                </div>
                                            <!-- Column -->
                                            <div class="col  align-self-center">
                                               <a href=""> <div  class="css-bar m-b-0 css-bar-primary "><i class="mdi mdi-download"></i></div></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-md-3">
                                <div class="card card-success card-inverse">
                                    <div class="card-body">
                                        <div class="row p-t-10 p-b-10">
                                            <!-- Column -->
                                            <div class="col p-r-0">
                                                <h1 class="font-light text-white">C2</h1>
												<h4 class="font-light text-white">Download</h4>
                                                </div>
                                            <!-- Column -->
                                            <div class="col text-right align-self-center">
                                               <a href=""> <div  class="css-bar m-b-0 css-bar-primary "><i class="mdi mdi-download"></i></div></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                    <div class="card  card-inverse card-danger">
                                        <div class="card-body">
                                            <div class="row p-t-10 p-b-10">
                                                <!-- Column -->
                                                <div class="col p-r-0">
                                                    <h1 class="font-light text-white">C3</h1>
													<h4 class="font-light text-white">Download</h4>
                                                    </div>
                                                <!-- Column -->
                                                <div class="col text-right align-self-center">
                                                 <a href=""><div  class="css-bar m-b-0 css-bar-primary "><i class="mdi mdi-download"></i></div></a>   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- Column -->
                            <!-- Column -->
                           
                            <!-- Column -->
                            <!-- Column -->
                            
                </div>
                <div class="row">
                        <div class="col-12">
                                <div class="card">
                                      <div class="card-body">
                                        <iframe src="assets/b.pdf" width="100%" height="900px" frameborder="0"></iframe>
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
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
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
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
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
    });
    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
