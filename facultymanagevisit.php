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
                   <title>Faculty | Manage Visits</title>
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
                        <h3 class="text-themecolor">Manage Visits</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                               <li class="breadcrumb-item active">Manage Visits</li>
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
                <?php 

                $sel1 = "SELECT * from `visit` where f_id= ".$userdata['f_id']."";
                $re = $conn->query($sel1);
                

                if(mysqli_num_rows($result)>0)
                {
                while($data=mysqli_fetch_array($re))
                {
                
                ?>
                <div class="row">
                    <!-- Column -->
                    <div class="col-12">
                            <div class="card">
                            
                            <div class="card-header">
                                <div class="card-actions">
                                    <a class="" data-action="collapse"><i class="ti-plus"></i></a>
                                </div>
                                <h4 class="card-title m-b-0"> <?php echo $data['title'];?></h4>
                            </div>
                            <div class="card-body collapse ">


                                        <h3 class="card-title">Trip Details</h3>
                                        <br>
                                        <div class="form-group row">
                                                <label for="example-text-input" class="col-md-4 col-form-label">Trip Title</label>
                                                <div class="col-md-8">
                                                        <?php echo $data['title'];?>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="example-text-input" class="col-md-4 col-form-label">City</label>
                                                <div class="col-md-8">
                                                        <?php echo $data['city'];?>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="example-text-input" class="col-md-4 col-form-label">Start Date</label>
                                                <div class="col-md-8">
                                                        <?php echo $data['starting_date'];?>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="example-text-input" class="col-md-4 col-form-label">End Date</label>
                                                <div class="col-md-8">
                                                        <?php echo $data['ending_date'];?>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                        <?php $sel7 = "SELECT * from `agent` where f_id= ".$userdata['f_id']."";
                                             $re7 = $conn->query($sel7);
                                             $a7=mysqli_fetch_array($re7);
                                             
                                             $sel8 = "SELECT * from `insurance` where a_id= ".$a7['a_id']."";
                                             $r8 = $conn->query($sel8);
                                             $a8=mysqli_fetch_array($r8);
                                             ?>
                                                <label for="example-text-input" class="col-md-4 col-form-label">Travel Insurance</label>
                                                <div class="col-md-4">

                                                        <?php echo $a8['company_name'];?> - <?php echo $a8['insurance_name'];?>  
                                                </div>
                                                <div class="col-md-4"><a class="btn btn-success" href="<?php echo $a8['docs'];?> " id="doclink" target="_blank">View Doc</a></div>
                                                
                                        </div>
                                        <div class="form-group row">
                                                <label for="example-text-input" class="col-md-4 col-form-label">Description</label>
                                                <div class="col-md-8">
                                                        <?php echo $data['description'];?>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Micro Planning</label>
                                                <div class="col-md-10">
                                                       <div class="table-responsive">
                                                       <input type="hidden" id="microdays" name="microdays" value="">
                                         <table class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Planning</th>
                                                <th>Remarks</th>                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody >
                                        <?php 
                                            $sel2 = "SELECT * from `micro_planning` where visit_id= ".$data['visit_id']." AND f_id=".$userdata['f_id']."";
                                            $r2 = $conn->query($sel2);
                                            
                                            
                                            if(mysqli_num_rows($r2)>0)
                                            {
                                            while($a2=mysqli_fetch_array($r2))
                                            {
                                        ?>
                                                <tr>
                                                    <td><?php echo $a2['date']?></td>
                                                    <td><?php echo $a2['planning']?></td>
                                                    <td><?php echo $a2['remarks']?></td>
                                                </tr>
                                                <?php

                                            }
                                            }
                                            ?>
                                        </tbody>
                                        </table>
                                        </div>

											</div>
                                            </div>

                                        <div class="form-group row">
                                                <label for="example-text-input" class="col-md-4 col-form-label">Total Cost</label>
                                                <div class="col-md-8">
                                                       Rs.  <?php echo $data['cost'];?> (*Including insurance amount)
                                                </div>
                                        </div>
                                        <hr>
                                        <h3 class="card-title">Manage Students</h3>
                                        <div class="row">
                                            <div class="col-12">
                                    <div class="card">
                                    <div class="card-body">
                                        
                                        
                                        
                                            <!-- Column -->
                                            <div class="form-group row">
                                                    
                                            <div class="col-md-9">
                                                        <input id="searchagent" class="form-control" type="text" name="SearchAgent"  placeholder="Search Student...">          
                                                    </div>
                                                    <div class="col-md-2">


                                                        </div>
                                                      <div class="col-md-1">
                                                     <a class="pull-right btn btn-sm btn-rounded btn-info">
                                                     <button class="pull-right btn btn-sm btn-rounded btn-info" data-toggle="modal" data-target="#myModal"> Add   <i class="mdi mdi-plus"></i></button>
                                                    </a>
                                                      </div>
                                                    
                                                
                                                     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                            
                                                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return addmodalvalidate();">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Add Student</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                   
                                                                        <div class="form-group">
                                                                            <label>Enrollment No.</label>
                                                                            <input type="text" id="enroll_no" name="enroll_no" class="form-control" placeholder="Enter Enrollment No."  required>
                                                                            <label>Student name</label>
                                                                            <input type="text" id="student_name" name="student_name" class="form-control" placeholder="Enter Student Name"  required> 
                                                                            <label>Branch</label>
                                                                            <input type="text" id="stu_branch" name="stu_branch" class="form-control" placeholder="Enter Branch"  required>  
                                                                            <label>Gender</label>
                                                                            <label class="custom-control custom-radio"> <input id="m" type="radio" name="radio"  class="custom-control-input" value="M" checked> <span class="custom-control-label">Male</span></label>
                                                                            <label class="custom-control custom-radio"> <input id="f" type="radio" name="radio"  class="custom-control-input" value="F"> <span class="custom-control-label">Female</span></label>
                                                                            <label>Mobile No.</label>
                                                                            <input type="number" id="mobile_no" name="mobile_no" class="form-control" placeholder="Enter Mobile No." required>
                                                                            <label>Father Mobile No.</label>
                                                                            <input type="number" id="f_mobile_no" name="f_mobile_no" class="form-control" placeholder="Enter Father Mobile No." required> 
                                                                            <label>Email ID</label>
                                                                            <input type="email" id="email_id" name="email_id" class="form-control" placeholder="Enter Email ID" required>
                                                                            <label>Institute Email ID</label>
                                                                            <input type="email" id="i_email_id" name="i_email_id"class="form-control" placeholder="Enter Institute Email ID" required>
                                                                            <label>Hostel</label>
                                                                            <input type="text" id="hostel" name="hostel" class="form-control" placeholder="Enter Hostel"  required> 
                                                                            <label>Jain Food</label>
                                                                            <input type="text" id="jain_food" name="jain_food" class="form-control" placeholder="Enter Jain Food"  required> 
                                                                            <label>Room Preference</label>
                                                                            <input type="text" id="room_preference" name="room_preference" class="form-control" placeholder="Enter Room Preference"  > 
                                                                            <label>Blacklisted</label>
                                                                            <input type="text" id="blacklisted" name="blacklisted" class="form-control" placeholder="Enter Blacklisted"  required> 
                                                                            <label>Password</label>
                                                                            <input type="password"  id="password" name="password"  class="form-control" placeholder="Enter Password" required>
                                                                            <label>Payment 1</label>
                                                                            <input type="text" id="payment_1" name="payment_1" class="form-control" placeholder="Enter Payment 1"  required> 
                                                                            <label>Payment 2</label>
                                                                            <input type="text" id="payment_2" name="payment_2" class="form-control" placeholder="Enter Payment 2"  required> 
                                                                            <label>Semester</label>
                                                                            <input type="text" id="semester" name="semester" class="form-control" placeholder="Enter Semester" required>  
                                                                            <label>Class</label>
                                                                            <input type="text" id="stu_class" name="stu_class" class="form-control" placeholder="Enter Class" required> 
                                                                            <label>College</label>
                                                                            <input type="text"  id="stu_college" name="stu_college"  class="form-control" placeholder="Enter College" required></div>
                                                                       
                                                                </div>
                                                                <div class="modal-footer">
                                                                <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
                                                                    <input type="submit" id="submit_btn" class="btn btn-success"  name="submit_btn" value="Submit">
                                                              </div>
                                                                </form>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                </div>
                                            <!-- Column -->
                                             <div class="table-responsive">
                                                 
                                            <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Enroll no.</th>
                                                        <th>Action</th>
                                                        <th>Student Name</th>
                                                        <th>Branch</th>
                                                        <th>Gender</th>                                                        
                                                        <th>Mobile No.</th>                                                        
                                                        <th>Father Mobile No.</th>
                                                        <th>Email ID</th>
                                                        <th>Institute Email ID</th>
                                                        <th>Hostel</th>
                                                        <th>Jain Food</th>
                                                        <th>Room Preference</th>
                                                        <th>Blacklisted</th>
                                                        <th>Password</th>
                                                        <th>Payment 1</th>
                                                        <th>Payment 2</th>
                                                        <th>Semester</th>
                                                        <th>Class</th>
                                                        <th>College</th>
                                                    </tr>
                                                </thead>
                                                <div style="width:100%;overflow:auto; max-height:100px;">
                                                <tbody  id="searchtable">
                                                <?php

                                                    $sql = "SELECT * FROM `student` where visit_id=".$data['visit_id']." AND f_id=".$userdata['f_id']."";
                                                    $result = $conn->query($sql);


                                                        if(mysqli_num_rows($result)>0)
                                                        {
                                                        while($data=mysqli_fetch_array($result))
                                                        {
                                                    ?>
                                                    <tr>
                                                       
                                                        <td class="enroll_no"><?php echo $data['enroll_no']; ?></td>
                                                        <td>
                                                            <a href="#editModal" class="edit" data-toggle="modal"><i class="mdi mdi-marker editbutton" data-toggle="tooltip" title="Edit"></i></a>
                                                            <a href="#deleteModal"  class="delete" data-toggle="modal"><i class="mdi mdi-delete delete-row" data-toggle="tooltip" title="Delete"></i></a>
                                                        </td>
                                                        <td class="name"><?php echo $data['name']; ?></td>
                                                        <td class="branch"><?php echo $data['branch']; ?></td>
                                                        <td class="gender"><?php echo $data['gender']; ?></td>
                                                        <td class="mobile_no"><?php echo $data['mobile_no']; ?></td>
                                                        <td class="f_mobile_no"><?php echo $data['father_mobile_no']; ?></td>
                                                        <td class="email_id"><?php echo $data['email_id']; ?></td>
                                                        <td class="i_email_id"><?php echo $data['institute_email_id']; ?></td>
                                                        <td class="hostel"><?php echo $data['hostel']; ?></td>
                                                        <td class="jain_food"><?php echo $data['jain_food']; ?></td>
                                                        <td class="room_preference"><?php echo $data['room_preference']; ?></td>
                                                        <td class="blacklisted"><?php echo $data['blacklisted']; ?></td>
                                                        <td class="password"><?php echo $data['password']; ?></td>
                                                        <td class="payment_1"><span class="<?php if($data[payment_1]=="paid") { echo "label label-info"; } else {echo "label label-danger";}?>"><?php echo $data['payment_1']; ?></span> </td>
                                                        <td class="payment_2"><span class="<?php if($data[payment_2]=="paid") { echo "label label-info"; } else {echo "label label-danger";}?>"><?php echo $data['payment_2']; ?></span> </td>
                                                        <td class="semester"><?php echo $data['semester']; ?></td>
                                                        <td class="stu_class"><?php echo $data['class']; ?></td>
                                                        <td class="college_name"><?php echo $data['college']; ?></td>
                                                        <td class="student_id" style="display:none;"><?php echo $data['student_id']?></td>
                                                        <td class="v_id" style="display:none;"><?php echo $data['visit_id']?></td>
                                                        <td class="f_id" style="display:none;"><?php echo $data['f_id']?></td>
                                                    </tr>
                                                      <?php

                                                        }
                                                        }
                                                        ?>    
                                                    </tbody>
                                                </div>
                                                                                            </table>
                                        </div>
                                   
                                    </div>
                                         </div>
                                             </div>
                                  </div>

                                            

                                     </div>

<div id="editModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return editmodalvalidate();">
          <div class="modal-header">            
            <h4 class="modal-title">Edit Student</h4>
            <button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">          
          <div class="form-group">
             
               <label>Enrollment No.</label>
                <input type="text"  name="enroll_no" id="enrollno" class="form-control enroll_modal" required>

               <label>Student name</label>
               <input type="text"  name="student_name" id="studentname" class="form-control name_modal" required>
               <label>Branch</label>
               <input type="text"  name="stubranch" id="stubranch" class="form-control branch_modal" required> 
               <label>Gender</label>
               <label class="custom-control custom-radio"> <input id="m" type="radio" name="radio"  class="custom-control-input gender_modal" value="M"> <span class="custom-control-label">Male</span></label>
               <label class="custom-control custom-radio"> <input id="f" type="radio" name="radio"  class="custom-control-input gender_modal" value="F"> <span class="custom-control-label">Female</span></label>
               <label>Mobile No.</label>
               <input type="number" name="mobile" id="mobileno" class="form-control mobile_modal"  required>
               <label>Father Mobile No.</label>
               <input type="number" name="f_mobile" id="f_mobileno" class="form-control f_mobile_modal"  required>
               <label>Email ID</label>
               <input type="email"  name="email" id="emailid" class="form-control email_id_modal" required>
               <label>Insitute Email ID</label>
               <input type="email"  name="i_email" id="i_emailid" class="form-control iemail_id_modal" required>
               <label>Hostel</label>
               <input type="text" name="hostel" id="stuhostel" class="form-control hostel_modal" required> 
               <label>Jain Food</label>
               <input type="text" name="jain_food" id="jainfood" class="form-control jain_modal " required> 
               <label>Room Preference</label>
               <input type="text"  name="room_preference"  id="roompreference" class="form-control room_modal" required> 
               <label>Blacklisted</label>
                <input type="text" name="blacklisted" id="stublacklisted" class="form-control blacklist_modal" required> 
                                                                            
               <label>Password</label>
               <input type="password"  name="pass" id="pass" class="form-control password_modal"  required>
               <label>Payment 1</label>
               <input type="text" name="payment_1" id="payment1" class="form-control p1_modal" required> 
               <label>Payment 2</label>
               <input type="text" name="payment_2" id="payment2" class="form-control p2_modal" required> 
               <label>Semester</label>
               <input type="text"name="semester" id="sem" class="form-control semester_modal" required> 
               <label>Class</label>
               <input type="text" name="stuclass" id="stuclass" class="form-control stuclass_modal" required> 
                                                                            
               <label>College</label>
               <input type="text"  name="stucollege" id="stucollege" class="form-control college_modal" required>
               
            </div>
          </div>
          <input type="hidden" name="student" class="user_id">
          <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-info" name="Save_btn" value="Save">
          </div>
        </form>
      </div>
    </div>
  </div> 

  <div id="deleteModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="modal-header">            
            <h4 class="modal-title">Delete Student</h4>
            <button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">          
            <p>Are you sure you want to delete these Record?</p>
            <p class="text-warning"><small>This action cannot be undone.</small></p>
          </div>
          <input type="hidden" name="student" class="user_id">
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-danger " id="Delete_btn" name="Delete_btn" value="Delete">
          </div>
        </form>
      </div>
    </div>
  </div>

                          
            </div>
                    <!-- Column -->
        </div>
                <!-- Row -->
    </div>
                <?php

                }
                }
                ?>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
               
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
    <script type="text/javascript">
 
 $(document).ready(function(){
    $('.editbutton').click(function () {
       
        var id=$(this).closest('tr').children('td.student_id').text();
      
      $('.user_id').val(id);

        
      var enroll=$(this).closest('tr').children('td.enroll_no').text();
      $('.enroll_modal').val(enroll);


      var name=$(this).closest('tr').children('td.name').text();
      $('.name_modal').val(name);

      var branch=$(this).closest('tr').children('td.branch').text();
      $('.branch_modal').val(branch);

      var gender=$(this).closest('tr').children('td.gender').text();
      $("input[name=radio][value=" + gender + "]").prop('checked', true);

      var mobile=$(this).closest('tr').children('td.mobile_no').text();
      $('.mobile_modal').val(mobile);

      var fmobile=$(this).closest('tr').children('td.f_mobile_no').text();
      $('.f_mobile_modal').val(fmobile);

      var email_id=$(this).closest('tr').children('td.email_id').text();
      $('.email_id_modal').val(email_id);

      var iemail_id=$(this).closest('tr').children('td.i_email_id').text();
      $('.iemail_id_modal').val(iemail_id);

      var hostel=$(this).closest('tr').children('td.hostel').text();
      $('.hostel_modal').val(hostel);
      var jain=$(this).closest('tr').children('td.jain_food').text();
      $('.jain_modal').val(jain);
      var room=$(this).closest('tr').children('td.room_preference').text();
      $('.room_modal').val(room);
      var blacklist=$(this).closest('tr').children('td.blacklisted').text();
      $('.blacklist_modal').val(blacklist);

      
      

      var password=$(this).closest('tr').children('td.password').text();
      $('.password_modal').val(password);

      var payment1=$(this).closest('tr').children('td.payment_1').text();
      $('.p1_modal').val(payment1);
      var payment2=$(this).closest('tr').children('td.payment_2').text();
      $('.p2_modal').val(payment2);
      var semester=$(this).closest('tr').children('td.semester').text();
      $('.semester_modal').val(semester);
      var stuclass=$(this).closest('tr').children('td.stu_class').text();
      $('.stuclass_modal').val(stuclass);

      var college=$(this).closest('tr').children('td.college_name').text();
      $('.college_modal').val(college);
        
      var fac=$(this).closest('tr').children('td.f_id').text();
      $('.faculty_modal').val(fac);

      var visit=$(this).closest('tr').children('td.v_id').text();
      $('.visit_modal').val(visit);

 });
 
});


//delete the values

      $(document).ready(function(){
    $('.delete-row').click(function() {
       
       var id=$(this).closest('tr').children('td.student_id').text();
      
      $('.user_id').val(id);





   
 });
 
});
$(document).ready(function(){
    $('#searchagent').on("keyup",function(){
        
        var value = $(this).val().toLowerCase();
        
         $("#searchtable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
  
   /*         function filter(element) {
         var value = $(element).val();
         $(".searchagent > tr").each(function () {
        if ($(this).text().indexOf(value) > -1) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}*/
        
    });
});



function addmodalvalidate(){

var no = document.getElementById('enroll_no').value;
var regexno = /^[1]{1}[0-9]{11}$/;
if(!regexno.test(no)){
alert("please enter valid Enrollment No.");
document.getElementById('enroll_no').focus();
return false;
}

var letter = document.getElementById('student_name').value;
var regexletter = /^[a-zA-Z\s]+$/;
if(!regexletter.test(letter)){
alert("please enter only letters in Student Name.");
document.getElementById('student_name').focus();
return false;
}

var emailid = document.getElementById('email_id').value;
var regexemail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
if(!regexemail.test(emailid)){
alert("please enter valid Email Id.");
document.getElementById('email_id').focus();
return false;
}

var iemailid = document.getElementById('i_email_id').value;

var regexiemail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
if(!regexiemail.test(iemailid)){
alert("please enter valid Institute Email Id.");
document.getElementById('i_email_id').focus();
return false;
}



var jain1 = document.getElementById('jain_food').value;
if(!(jain1 == "yes" || jain1 == "no")){
alert("please enter yes or no in Jainfood");
document.getElementById('jain_food').focus();
return false;
}

var hostel1 = document.getElementById('hostel').value;
if(!(hostel1 == "yes" || hostel1 == "no")){
alert("please enter yes or no in Hostel");
document.getElementById('hostel').focus();
return false;
}

var blacklist1 = document.getElementById('blacklisted').value;
if(!(blacklist1 == "yes" || blacklist1 == "no")){
alert("please enter yes or no in Blacklisted");
document.getElementById('blacklisted').focus();
return false;
}


var pay1 = document.getElementById('payment_1').value;
if(!(pay1 == "paid" || pay1 == "pending")){
alert("please enter paid or pending in Payment 1");
document.getElementById('payment_1').focus();
return false;
}

var pay2 = document.getElementById('payment_2').value;
if(!(pay2 == "paid" || pay2 == "pending")){
alert("please enter paid or pending in Payment 2");
document.getElementById('payment_2').focus();
return false;
}


var mobile = document.getElementById('mobile_no').value;
var regexmobile = /^[6-9]{1}[0-9]{9}$/;
if(!regexmobile.test(mobile)){
alert("please check Mobile No.. (10 digits only)");
document.getElementById('mobile_no').focus();
return false;
}

var fmobile = document.getElementById('f_mobile_no').value;
var regexfmobile = /^[6-9]{1}[0-9]{9}$/;
if(!regexfmobile.test(fmobile)){
alert("please Check Father Mobile No.. (10 digits only)");
document.getElementById('f_mobile_no').focus();
return false;
}



var pass = document.getElementById('password').value;
var regexpass = /^[a-zA-Z0-9!@#$%^&*]{6,10}$/;
if(!regexpass.test(pass)){
alert("please enter valid Password of size 6-10");
document.getElementById('password').focus();
return false;
}

var letter1 = document.getElementById('stu_college').value;
var regexletter1 = /^[a-zA-Z\s]+$/;
if(!regexletter1.test(letter1)){
alert("please enter only letters in College.");
document.getElementById('stu_college').focus();
return false;
}


var cl = document.getElementById('stu_class').value;
var regexcl = /^[A-Za-z0-9\s]+$/;
if(!regexcl.test(cl)){
alert("please enter only letters and digits in Class.");
document.getElementById('stu_class').focus();
return false;
}

var rp = document.getElementById('room_preference').value;
var regexrp = /^[A-Za-z0-9\s]+$/;
if(!regexrp.test(rp)){
alert("please enter only letters and digits in Room Preference.");
document.getElementById('room_preference').focus();
return false;
}


var br = document.getElementById('stu_branch').value;
var regexbr = /^[a-zA-Z\s]+$/;
if(!regexbr.test(br)){
alert("please enter only letters in Branch.");
document.getElementById('stu_branch').focus();
return false;
}

var sem = document.getElementById('semester').value;
var regexsem = /^[0-9]+$/;
if(!regexsem.test(sem)){
alert("please enter only digits in Semester.");
document.getElementById('semester').focus();
return false;
}
};



//edit modal validations

function editmodalvalidate(){

var no1 = document.getElementById('enrollno').value;
var regexno1 = /^[1]{1}[0-9]{11}$/;
if(!regexno1.test(no1)){
alert("please enter valid Enrollment No.");
document.getElementById('enrollno').focus();
return false;
}

var letter1 = document.getElementById('studentname').value;
var regexletter1 = /^[a-zA-Z\s]+$/;
if(!regexletter1.test(letter1)){
alert("please enter only letters in Student Name.");
document.getElementById('studentname').focus();
return false;
}


var emailid1 = document.getElementById('emailid').value;
var regexemail1 = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
if(!regexemail1.test(emailid1)){
alert("please enter valid Email Id.");
document.getElementById('emailid').focus();
return false;
}


var jain = document.getElementById('jainfood').value;
if(!(jain == "yes" || jain == "no")){
alert("please enter yes or no in Jainfood");
document.getElementById('jainfood').focus();
return false;
}

var hostel = document.getElementById('stuhostel').value;
if(!(hostel == "yes" || hostel == "no")){
alert("please enter yes or no in Hostel");
document.getElementById('stuhostel').focus();
return false;
}

var blacklist = document.getElementById('stublacklisted').value;
if(!(blacklist == "yes" || blacklist == "no")){
alert("please enter yes or no in Blacklisted");
document.getElementById('stublacklisted').focus();
return false;
}


var p1 = document.getElementById('payment1').value;
if(!(p1 == "paid" || p1 == "pending")){
alert("please enter paid or pending in Payment 1");
document.getElementById('payment1').focus();
return false;
}

var p2 = document.getElementById('payment2').value;
if(!(p2 == "paid" || p2 == "pending")){
alert("please enter paid or pending in Payment 2");
document.getElementById('payment2').focus();
return false;
}

var iemailid1= document.getElementById('i_emailid').value;

var regexiemail1 = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
if(!regexiemail1.test(iemailid1)){
alert("please enter valid Institute Email Id.");
document.getElementById('i_emailid').focus();
return false;
}


var mobile1 = document.getElementById('mobileno').value;
var regexmobile1 = /^[6-9]{1}[0-9]{9}$/;
if(!regexmobile1.test(mobile1)){
alert("please check Mobile No.. (10 digits only)");
document.getElementById('mobileno').focus();
return false;
}

var fmobile1 = document.getElementById('f_mobileno').value;
var regexfmobile1 = /^[6-9]{1}[0-9]{9}$/;
if(!regexfmobile1.test(fmobile1)){
alert("please Check Father Mobile No.. (10 digits only)");
document.getElementById('f_mobileno').focus();
return false;
}



var pass1 = document.getElementById('pass').value;
var regexpass1 = /^[a-zA-Z0-9!@#$%^&*]{6,10}$/;
if(!regexpass1.test(pass1)){
alert("please enter valid Password of size 6-10");
document.getElementById('pass').focus();
return false;
}

var let2 = document.getElementById('stucollege').value;
var regexlet2 = /^[a-zA-Z\s]+$/;
if(!regexlet2.test(let1)){
alert("please enter only letters in College.");
document.getElementById('stucollege').focus();
return false;
}


var cl1 = document.getElementById('stuclass').value;
var regexcl1 = /^[^A-Za-z0-9\s]+$/;
if(!regexcl1.test(cl1)){
alert("please enter only letters and digits in Class.");
document.getElementById('stuclass').focus();
return false;
}

var rp1 = document.getElementById('roompreference').value;
var regexrp1 = /^[^A-Za-z0-9\s]+$/;
if(!regexrp1.test(rp1)){
alert("please enter only letters and digits in Room Preference.");
document.getElementById('roompreference').focus();
return false;
}


var br1 = document.getElementById('stubranch').value;
var regexbr1 = /^[a-zA-Z\s]+$/;
if(!regexbr1.test(br1)){
alert("please enter only letters in Branch.");
document.getElementById('stubranch').focus();
return false;
}

var sem1 = document.getElementById('sem').value;
var regexsem1 = /^[0-9]+$/;
if(!regexsem1.test(sem1)){
alert("please enter only digits in Semester.");
document.getElementById('sem').focus();
return false;
}
};




</script>
</body>

</html>
