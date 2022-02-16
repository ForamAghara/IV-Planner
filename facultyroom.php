<?php
include('connect-db.php');
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['user']) ){
    if($_SESSION['user']=="faculty"){
        $sel = "SELECT * from `faculty` where `f_id` = ".$_SESSION['username']."";
        $result = mysqli_query($conn,$sel);
        $userdata=mysqli_fetch_array($result);

        if(isset($_POST['edit'])) {
            $sel = "UPDATE student SET room_preference = '" . $_POST['room_preference'] . "' WHERE room_preference = " . $_POST['old_room_preference'];
            mysqli_query($conn,$sel);    
        }

        if(isset($_POST['gender']) && $_POST['gender'] == 'M') {
            $sel = "SELECT `room_preference` FROM `student`where room_preference is not null and gender = 'M' and f_id = " . $userdata['f_id'] . " GROUP BY `room_preference`";
        } else if(isset($_POST['gender']) && $_POST['gender'] == 'G') {
            $sel = "SELECT `room_preference` FROM `student`where room_preference is not null and gender = 'G' and f_id = " . $userdata['f_id'] . " GROUP BY `room_preference`";
        } else {
            $sel = "SELECT `room_preference` FROM `student`where room_preference is not null and f_id = " . $userdata['f_id'] . " GROUP BY `room_preference`";
        }

        $result = mysqli_query($conn,$sel);
        $groups=mysqli_fetch_all($result, MYSQLI_ASSOC);

        $sel = "SELECT count(student_id) student from `student`";
        $result = mysqli_query($conn,$sel);
        $registered_students=mysqli_fetch_assoc($result)['student'];

        $sel = "SELECT count(student_id) student from `student`where gender = 'M'";
        $result = mysqli_query($conn,$sel);
        $number_of_boys=mysqli_fetch_assoc($result)['student'];

        $sel = "SELECT count(student_id) student from `student`where gender = 'G'";
        $result = mysqli_query($conn,$sel);
        $number_of_girls=mysqli_fetch_assoc($result)['student'];

        $sel = "SELECT count(student_id) student from `student`where `room_preference` IS NULL";
        $result = mysqli_query($conn,$sel);
        $unallocated_students=mysqli_fetch_assoc($result)['student'];

        if(isset($_POST['csv'])) {
            $filename = 'RoomAllocation.csv';
            $fp = @fopen( 'php://output', 'w' );
            header('Content-type: application/csv');
            header('Content-Disposition: attachment; filename='.$filename);            
            foreach($groups as $group) :
                fputcsv($fp, $group);
                $sel = "SELECT name from `student` where `room_preference` = '" . $group['room_preference'] . "'";
                $result = mysqli_query($conn,$sel);
                $students=mysqli_fetch_all($result, MYSQLI_ASSOC);
                $count = 1;
                foreach($students as $student) :                                                                            
                    fputcsv($fp, $student);
                endforeach;
            endforeach;
            fclose($fp);
            exit;
        }
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
    <title>Faculty | Room Allocation</title>
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
                                            <!-- Message -->
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
                                                </a>                                        </div>
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
                    <h3 class="text-themecolor">Room Allocation</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        
                        <li class="breadcrumb-item active">Room Allocation</li>
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
                <!-- Row -->
                
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-12">
                            <div class="card">
                                  <div class="card-body">
                                        <div class="form-group row">
                                            
                                       <h3 class="card-title">Room Preferences and Insights</h3>
                                       <div class="col-md-4">
                                        <form method="POST" action="<?=$_SERVER['PHP_SELF']?>" id="gender">
                                            <select name="gender" class="selectpicker m-b-20 m-r-10" data-style="btn-info btn-outline-info" onchange="document.getElementById('gender').submit();">
                                                <option selected disabled>Category</option>
                                                <option>ALL</option>
                                                <option  value="M">BOYS</option>
                                                <option  value="G">GIRLS</option>
                                            </select>    
                                        </form>        
                                </div>
                                        <div class="ml-auto">
                                                        
                                            </div>
                                            <div class="col-md-2">
                                                <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                                                      <button name="csv" class=" pull-right btn btn-success"><i class="mdi mdi-download"></i><span>Download Report</span></button>
                                                </form>
                                            </div>
                                    </div>
                                        <div class="row m-t-40">
                                                <!-- Column -->
                                                <div class="col-md-6 col-lg-3 col-xlg-3">
                                                    <div class="card card-inverse card-info">
                                                        <div class="box bg-info text-center">
                                                            <h1 class="font-light text-white"><?=$registered_students?></h1>
                                                            <h6 class="text-white">Registered Students</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Column -->
                                                <div class="col-md-6 col-lg-3 col-xlg-3">
                                                    <div class="card card-success card-inverse">
                                                        <div class="box text-center">
                                                            <h1 class="font-light text-white"><?=$number_of_boys?></h1>
                                                            <h6 class="text-white">Number Of Boys</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Column -->
                                                <div class="col-md-6 col-lg-3 col-xlg-3">
                                                    <div class="card card-inverse card-danger">
                                                        <div class="box text-center">
                                                            <h1 class="font-light text-white"><?=$number_of_girls?></h1>
                                                            <h6 class="text-white">Number of Girls</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Column -->
                                                <div class="col-md-6 col-lg-3 col-xlg-3">
                                                    <div class="card card-inverse card-dark">
                                                        <div class="box text-center">
                                                            <h1 class="font-light text-white"><?=$unallocated_students?></h1>
                                                            <h6 class="text-white">Unallocated students</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Column -->
                                            </div>
                                            <div class="row">
                                                <!-- Column -->
                                                <?php
                                                    foreach($groups as $group) :
                                                        $sel = "SELECT name from `student` where `room_preference` = '" . $group['room_preference'] . "'";
                                                        $result = mysqli_query($conn,$sel);
                                                        $students=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                ?>
                                                <div class="col-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title"><?=$group['room_preference']?>
                                                            <?php
                                                                $room_preference = $group['room_preference'];
                                                            ?>
                                                                <span>
                                                                    <a href="#editRoomModal" class="edit "  data-toggle="modal" onclick="edit('<?=$room_preference?>')">
                                                                        <i class="pull-right mdi mdi-marker" data-toggle="tooltip" title="Edit Room ID"></i>
                                                                    </a>
                                                                </span>
                                                            </h4>                                                                        
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
                                                                            <?php
                                                                                $count = 1;
                                                                                foreach($students as $student) :                                                                            
                                                                            ?>
                                                                            <tr>
                                                                                <td><?=$count++?></td>                                                                                       
                                                                                <td><?=$student['name']?></td>
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
                                                <?php
                                                    endforeach;
                                                ?>
                                            </div>   
                                    </div>                     
                            </div>
                            
                        </div>
                    <!-- Column -->
                 </div>
                <!-- Row -->
                
			</div>
    </div>
                
 <div class="modal fade" id="editRoomModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Room ID</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="old_room_preference" name="old_room_preference" value="7000" />
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" name="room_preference" id="room_preference" class="form-control" placeholder="Enter ID">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="edit" class="btn btn-success">Submit</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>   
				
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
    
    <script src="assets/plugins/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="assets/plugins/html5-editor/bootstrap-wysihtml5.js"></script>
    <script>
        $(document).ready(function() {
            $('.textarea_editor').wysihtml5();        

        });
        function edit(room_preference) {
            $('#old_room_preference').val(room_preference)
            $('#room_preference').val(room_preference)
        }
    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    
<script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
</body>

</html>