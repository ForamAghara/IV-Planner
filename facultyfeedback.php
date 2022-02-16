<?php
include('connect-db.php');
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['user']) ){
    if($_SESSION['user']=="faculty"){

        $sel = "SELECT cf.feedback, cf.date, cp.name FROM `companyfeedback` AS cf join `company_person` AS cp WHERE cp.c_id = cf.c_id";
        $result = mysqli_query($conn,$sel);
        $companyfeedbacks=mysqli_fetch_all($result, MYSQLI_ASSOC);

        $sel = "SELECT sf.feedback, sf.date, st.name FROM `studentfeedback` AS sf join `student` AS st WHERE st.student_id = sf.student_id";
        $result = mysqli_query($conn,$sel);
        $studentfeedbacks=mysqli_fetch_all($result, MYSQLI_ASSOC);

        $sel = "SELECT pf.feedback, pf.date, pa.name FROM `parentfeedback` AS pf join `parent` AS pa WHERE pa.p_id = pf.p_id";
        $result = mysqli_query($conn,$sel);
        $parentfeedbacks=mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
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
?><!DOCTYPE html>
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
    <title>Faculty | Dashboard</title>
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
                                                            <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
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
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Feedbacks</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        
                        <li class="breadcrumb-item active">Feedbacks</li>
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

           


        <div class="row">
                
            
                <div class="col-lg-12">
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                    <span id="company"> &nbsp; </span>Companies Feedback</h4>
                                    <div class="col-md-4">
                                        <select class="selectpicker m-b-20 m-r-10" data-style="btn-info btn-outline-info">
                                                <option data-tokens="" selected disabled>Select Year</option>
                                                <option data-tokens="">ALL</option>
                                                <option data-tokens="">2018</option>
                                                <option data-tokens="">2017</option>
                                                <option data-tokens="">2016</option>
                                            </select>            
                                </div>
                          
                        <!-- ============================================================== -->
                        <!-- Comment widgets -->
                        <!-- ============================================================== -->
                        <div class="slimScrollDiv" style="height:607px; overflow: hidden; overflow-y: auto">
                        <div class="comment-widgets m-b-20">
                                    <?php
                                        foreach($companyfeedbacks as $companyfeedback) :                                                                            
                                    ?>
                                    <div class="d-flex flex-row comment-row">
                                        <div class="p-2"><span class="round"><img src="assets/images/users/1.jpg" alt="user" width="50"></span></div>
                                        <div class="comment-text w-100">
                                            <h5><?=$companyfeedback['name']?></h5>
                                            <div class="comment-footer">
                                                <span class="date"><?=$companyfeedback['date']?></span>                                                
                                            </div>
                                            <p class="m-b-5 m-t-10"><?=$companyfeedback['feedback']?></p>
                                        </div>
                                    </div>
                                    <?php
                                        endforeach;
                                    ?>
                        </div>
                    </div>
                    </div>
    
                    <!-- Column -->
                </div>
            </div>
            </div>
            <div class="row">
                
            
                    <div class="col-lg-12">
                        <!-- Column -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                        <span id="student"> &nbsp; </span>Students Feedback</h4>
                                        <div class="col-md-4">
                                            <select class="selectpicker m-b-20 m-r-10" data-style="btn-info btn-outline-info">
                                                    <option data-tokens="" selected disabled>Select Year</option>
                                                    <option data-tokens="">ALL</option>
                                                    <option data-tokens="">2018</option>
                                                    <option data-tokens="">2017</option>
                                                    <option data-tokens="">2016</option>
                                                </select>            
                                    </div>
                            <!-- ============================================================== -->
                            <!-- Comment widgets -->
                            <!-- ============================================================== -->
                            <div class="slimScrollDiv" style="height:607px; overflow: hidden; overflow-y: auto">
                            <div class="comment-widgets m-b-20">
                                <!-- Comment Row -->
                                <?php
                                    foreach($studentfeedbacks as $studentfeedback) :                                                                            
                                ?>
                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2"><span class="round"><img src="assets/images/users/1.jpg" alt="user" width="50"></span></div>
                                    <div class="comment-text w-100">
                                        <h5><?=$studentfeedback['name']?></h5>
                                        <div class="comment-footer">
                                            <span class="date"><?=$studentfeedback['date']?></span>                                                
                                        </div>
                                        <p class="m-b-5 m-t-10"><?=$studentfeedback['feedback']?></p>
                                    </div>
                                </div>
                                <?php
                                    endforeach;
                                ?>
                            </div>
                        </div>
                        </div>
        
                        <!-- Column -->
                    </div>
                </div>
                </div>
                <div class="row">
                
            
                        <div class="col-lg-12">
                            <!-- Column -->
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">
                                            <span id="parent"> &nbsp; </span>Parents Feedback</h4>
                                            <div class="col-md-4">
                                                <select class="selectpicker m-b-20 m-r-10" data-style="btn-info btn-outline-info">
                                                        <option data-tokens="" selected disabled>Select Year</option>
                                                        <option data-tokens="">ALL</option>
                                                        <option data-tokens="">2018</option>
                                                        <option data-tokens="">2017</option>
                                                        <option data-tokens="">2016</option>
                                                    </select>            
                                        </div>
                                <!-- ============================================================== -->
                                <!-- Comment widgets -->
                                <!-- ============================================================== -->
                                <div class="slimScrollDiv" style="height:607px; overflow: hidden; overflow-y: auto">
                                <div class="comment-widgets m-b-20">
                                    <!-- Comment Row -->
                                    <?php
                                        foreach($parentfeedbacks as $parentfeedback) :                                                                            
                                    ?>
                                    <div class="d-flex flex-row comment-row">
                                        <div class="p-2"><span class="round"><img src="assets/images/users/1.jpg" alt="user" width="50"></span></div>
                                        <div class="comment-text w-100">
                                            <h5><?=$parentfeedback['name']?></h5>
                                            <div class="comment-footer">
                                                <span class="date"><?=$parentfeedback['date']?></span>                                                
                                            </div>
                                            <p class="m-b-5 m-t-10"><?=$parentfeedback['feedback']?></p>
                                        </div>
                                    </div>
                                    <?php
                                        endforeach;
                                    ?>
                            </div>
                            </div>
            
                            <!-- Column -->
                        </div>
                    </div>
                    </div>
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
    
    <script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript">
    </script>
<script type="text/javascript">
 

function co_validate(){


    var name = document.getElementById('name').value;
var regexname = /^[a-zA-Z\s]+$/;
if(!regexname.test(name)){
alert("please enter valid name.");
document.getElementById('name').focus();
return false;
}

var emailid = document.getElementById('email').value;
var regexemail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
if(!regexemail.test(emailid)){
alert("please enter valid Email Id.");
 document.getElementById('email').focus();
return false;
}

var mobile = document.getElementById('mobile_no').value;
var regexmobile = /^[6-9]{1}[0-9]{9}$/;
if(!regexmobile.test(mobile)){
alert("please enter valid Mobile No.. (10 digits only)");
document.getElementById('mobile_no').focus();
return false;
}

var cl = document.getElementById('stuclass').value;
var regexcl = /^[A-Za-z0-9\s]+$/;
if(!regexcl.test(cl)){
alert("please enter only letters and digits in Class.");
document.getElementById('stuclass').focus();
return false;
}


}












//edit the values

 $(document).ready(function(){
    $('.editbutton').click(function () {

       
      var title=$(this).data('ttitle');
      $('.title_modal').val(title);

      var tid=$(this).data('tid');
      $('.taskid_modal').val(tid);

});
 
});


//delete the values

     $(document).ready(function(){
    $('.delete-row').click(function() {

 var tid=$(this).data('tid');
 $('.taskid_modal').val(tid);

    
 });
 
});


</script>


<?php

if(isset($_POST['submit_btn'])){ 

$task = $_POST['taskname'];
$faculty = $_POST['fid'];
$sql="INSERT INTO `todo_list`(`title`,`f_id`) VALUES ('".$task."','".$faculty."')";
$result=mysqli_query($conn,$sql);


echo '<script>
            window.location.href="faculty.php";
    </script> ';
}






if (isset($_POST['Delete_btn']))

{

// get form data, making sure it is valid

$id = $_POST['taskid'];


// save the data to the database

$sql = "DELETE FROM `todo_list` WHERE `t_id` = '$id'";
mysqli_query($conn,$sql);


echo '<script>
            window.location.href="faculty.php";
    </script> ';
}




if (isset($_POST['Save_btn']))

{
    $id = $_POST['taskid']; 

// get form data, making sure it is valid

$name= $_POST['task'];

// check that firstname/lastname fields are both filled in

// save the data to the database

$sql= "UPDATE `todo_list` SET title='$name' WHERE `t_id` = '$id'";
 mysqli_query($conn,$sql);

 echo '<script>
            window.location.href="faculty.php";
    </script> ';

}
?>


<?php

if(isset($_POST['submit_btn2'])){ 

$name = $_POST['name'];
$visit = $_POST['v_id'];
$email = $_POST['email'];
$faculty = $userdata['f_id'];
$mobile = $_POST['mobile_no'];
$class = $_POST['stuclass'];
$desg = $_POST['radio'];

$sql="INSERT INTO `coordinator`(`name`, `email_id`,`designation`, `f_id`,`visit_id`,`mobile_no` ,`class`) VALUES ('".$name."','".$email."','".$desg."','".$faculty."','".$visit."','".$mobile."','".$class."')";
$result=mysqli_query($conn,$sql);


echo '<script>
            window.location.href="faculty.php";
    </script> ';
}

?>

</body>

</html>