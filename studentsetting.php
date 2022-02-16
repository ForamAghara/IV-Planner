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
    <title>Student | Account Settings</title>
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
                         <!-- text-->  
                         </div>
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
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Account Settings</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                           <li class="breadcrumb-item active">Account Settings</li>
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
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  onSubmit="return passvalidate();">
                                <h4 class="card-title">Change Password</h4>
                                <input type="hidden" name="stu_id" id="stu_id" value="<?php echo $userdata['student_id']?>">
								
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-4 col-form-label">Old Password</label>
                                    <div class="col-md-8">
                                            <input class="form-control" type="password" value="" id="oldpass" name="oldpass" placeholder="Enter Old Password..." required>
                                            <input class="form-control" type="hidden" value="<?php echo $userdata['password']?>" id="oldpassdb"  >
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label for="example-text-input" class="col-md-4 col-form-label">New Password</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="password" id="newpass" name="newpass" placeholder="Enter New Password..." required>
                                </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-4 col-form-label">Confirm New Password</label>
                                    <div class="col-md-8">
                                    <input class="form-control" type="password" id="newpassconfirm" name="newpassconfirm" placeholder="Confirm New Password..." required>
                                    </div>
                                </div>

                                <br>
                                <input type="submit" id="submit_passbtn" class="btn btn-success"  name="submit_passbtn" value="Change Password">
                            
                            </form> 
                            <hr>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return validate();">
                                <h4 class="card-title">Edit Profile</h4>
                                <input type="hidden" name="stu_id" id="stu_id" value="<?php echo $userdata['student_id']?>">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-4 col-form-label">Change Enrollment No.</label>
                                    <div class="col-md-8">
                                            <input class="form-control" type="text" value="<?php echo $userdata['enroll_no']; ?>" id="enroll" name="enroll" placeholder=""  required >
                                    </div>
                                </div>
								<div class="form-group row">
                                                <label for="example-text-input" class="col-md-4 col-form-label">Change Name</label>
                                                <div class="col-md-8">
                                                        <input class="form-control" type="text" value="<?php echo $userdata['name']; ?>" id="name" name="name" placeholder=""  required  >
                                                </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-4 col-form-label">Change Branch</label>
                                    <div class="col-md-8">
                                            <input class="form-control" type="text" value="<?php echo $userdata['branch']; ?>" id="branch" name="branch" placeholder=""  required  >
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label for="example-text-input" class="col-md-4 col-form-label">Change Gender</label>
                                    <div class="col-md-8">
                                            <input class="form-control" type="text" value="<?php echo $userdata['gender']; ?>" id="gender" name="gender" placeholder=""  required >
                                    </div>
                                </div>              
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label">Change Mobile No.</label>
                        <div class="col-md-8">
                                <input class="form-control" type="text" value="<?php echo $userdata['mobile_no']; ?>" id="mobile" name="mobile" placeholder="" required>
                        </div>
        </div>
        
								<div class="form-group row">
                                                <label for="example-text-input" class="col-md-4 col-form-label">Change Email Id</label>
                                                <div class="col-md-8">
                                                        <input class="form-control" type="text" value="<?php echo $userdata['email_id']; ?>" id="emailid" name="emailid" placeholder=""  required>
                                                </div>
                                </div>


                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-4 col-form-label">Change Institute Email Id</label>
                                    <div class="col-md-8">
                                            <input class="form-control" type="text" value="<?php echo $userdata['institute_email_id']; ?>" id="iemailid" name="iemailid" placeholder=""  required >
                                    </div>
                    </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-4 col-form-label">Change Hostel</label>
                                    <div class="col-md-8">
                                            <input class="form-control" type="text" value="<?php echo $userdata['hostel']; ?>" id="hostel" name="hostel" placeholder=""  required >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-4 col-form-label">Change Jain Food</label>
                                    <div class="col-md-8">
                                            <input class="form-control" type="text" value="<?php echo $userdata['jain_food']; ?>" id="jainfood" name="jainfood" placeholder=""  required>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-4 col-form-label">Change Semester</label>
                                    <div class="col-md-8">
                                            <input class="form-control" type="text" value="<?php echo $userdata['semester']; ?>" id="semester" name="semester" placeholder=""  required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-4 col-form-label">Change Class</label>
                                    <div class="col-md-8">
                                            <input class="form-control" type="text" value="<?php echo $userdata['class']; ?>" id="class" name="class" placeholder=""  required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-4 col-form-label">Change College</label>
                                    <div class="col-md-8">
                                            <input class="form-control" type="text" value="<?php echo $userdata['college']; ?>"id="college" name="college" placeholder=""  required>
                                    </div>
                    </div>

                                <br>
                                <input type="submit" id="submit_btn" class="btn btn-success"  name="submit_btn" value="Save">
                          
                          </form>
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
      <script type="text/javascript">
    
    function passvalidate(){
        var newp = document.getElementById('newpass').value;
        var newpc = document.getElementById('newpassconfirm').value;
        var oldp = document.getElementById('oldpass').value;
        var oldpass = document.getElementById('oldpassdb').value; 
        
        if(!(oldp == oldpass)){
        alert("please enter same old password");
        document.getElementById('oldpass').focus();
        return false; 
        }
        
        if(!(newp == newpc)){
        alert("please enter same password in confirm field");
        document.getElementById('newpassconfirm').focus();
        return false; 
        }
/*var pass = document.getElementById('oldpass').value;
var regexpass = /^[a-zA-Z0-9!@#$%^&*]{6,10}$/;
if(!regexpass.test(pass)){
alert("please enter valid Password of size 6-10 ");
document.getElementById('oldpass').focus();
return false;
}*/
        
var pass1 = document.getElementById('newpass').value;
var regexpass1 = /^[a-zA-Z0-9!@#$%^&*]{6,10}$/;
if(!regexpass1.test(pass1)){
alert("please enter valid Password of size 6-10 ");
document.getElementById('newpass').focus();
return false;
}

var pass2 = document.getElementById('newpassconfirm').value;
var regexpass2 = /^[a-zA-Z0-9!@#$%^&*]{6,10}$/;
if(!regexpass2.test(pass2)){
alert("please enter valid Password of size 6-10 ");
document.getElementById('newpassconfirm').focus();
return false;
}


};


 function validate(){


var no = document.getElementById('enroll').value;
var regexno = /^[1]{1}[0-9]{11}$/;
if(!regexno.test(no)){
alert("please enter valid Enrollment No.");
document.getElementById('enroll').focus();
return false;
}

var letter = document.getElementById('name').value;
var regexletter = /^[a-zA-Z\s]+$/;
if(!regexletter.test(letter)){
alert("please enter only letters in Student Name.");
document.getElementById('name').focus();
return false;
}


var br = document.getElementById('branch').value;
var regexbr = /^[a-zA-Z\s]+$/;
if(!regexbr.test(br)){
alert("please enter only letters in Branch.");
document.getElementById('branch').focus();
return false;
}


var gender = document.getElementById('gender').value;
if(!(gender == "male" || gender == "female")){
alert("please enter male or female in Gender");
document.getElementById('gender').focus();
return false;
}



var mobile = document.getElementById('mobile').value;
var regexmobile = /^[6-9]{1}[0-9]{9}$/;
if(!regexmobile.test(mobile)){
alert("please check Mobile No.. (10 digits only)");
document.getElementById('mobile').focus();
return false;
}

var emailid = document.getElementById('emailid').value;
var regexemail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
if(!regexemail.test(emailid)){
alert("please enter valid Email Id.");
document.getElementById('emailid').focus();
return false;
}

var iemailid = document.getElementById('iemailid').value;

var regexiemail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
if(!regexiemail.test(iemailid)){
alert("please enter valid Institute Email Id.");
document.getElementById('iemailid').focus();
return false;
}

var mobile = document.getElementById('mobile').value;
var regexmobile = /^[6-9]{1}[0-9]{9}$/;
if(!regexmobile.test(mobile)){
alert("please check Mobile No.. (10 digits only)");
document.getElementById('mobile').focus();
return false;
}

var hostel1 = document.getElementById('hostel').value;
if(!(hostel1 == "yes" || hostel1 == "no")){
alert("please enter yes or no in Hostel");
document.getElementById('hostel').focus();
return false;
}


var jain1 = document.getElementById('jainfood').value;
if(!(jain1 == "yes" || jain1 == "no")){
alert("please enter yes or no in Jainfood");
document.getElementById('jainfood').focus();
return false;
}


var sem = document.getElementById('semester').value;
var regexsem = /^[0-9]+$/;
if(!regexsem.test(sem)){
alert("please enter only digits in Semester.");
document.getElementById('semester').focus();
return false;
}


var cl = document.getElementById('class').value;
var regexcl = /^[A-Za-z0-9\s]+$/;
if(!regexcl.test(cl)){
alert("please enter only letters and digits in Class.");
document.getElementById('class').focus();
return false;
}


var letter1 = document.getElementById('college').value;
var regexletter1 = /^[a-zA-Z\s]+$/;
if(!regexletter1.test(letter1)){
alert("please enter only letters in College.");
document.getElementById('college').focus();
return false;
}
}

</script>
    <script src="assets/plugins/dropzone-master/dist/dropzone.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <?php
        if (isset($_POST['submit_passbtn']))

        {
            $id = $_POST['stu_id'];
        // get form data, making sure it is valid
        
            
        $password= $_POST['newpass'];
    
    
        
        $sql= "UPDATE `student` SET password='$password' WHERE `student_id` = $id";
        mysqli_query($conn,$sql);
      
        
        
         echo '<script>
                    window.location.href="logout.php";
            </script> ';
        
        }
    

if (isset($_POST['submit_btn']))

    {
    $id = $_POST['stu_id'];
    $enroll = $_POST['enroll'];
    $name= $_POST['name'];
    $email= $_POST['emailid'];
    $iemail= $_POST['iemailid'];
    $mobile= $_POST['mobile'];
    $gender = $_POST['gender'];
    $college = $_POST['college'];
    $branch= $_POST['branch'];
    $class = $_POST['class'];
    $semester = $_POST['semester'];
    $hostel = $_POST['hostel'];
    $jainfood= $_POST['jainfood'];

    
    $sql= "UPDATE `student` SET name='$name',enroll_no='$enroll',institute_email_id='$iemail',mobile_no='$mobile', email_id ='$email',gender='$gender',college='$college',branch='$branch',class='$class',semester='$semester',hostel='$hostel',jain_food='$jainfood' WHERE `student_id` = $id";
    mysqli_query($conn,$sql);
  
    
    
     echo '<script>
                window.location.href="studentsetting.php";
        </script> ';
    
    }
    ?>
</body>

</html>
