<?php
include('connect-db.php');
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['user']) ){
    if($_SESSION['user']=="faculty"){
        $sel = "SELECT * from `faculty` where `f_id` = ".$_SESSION['username']."";
        $result = mysqli_query($conn,$sel);
        $userdata=mysqli_fetch_array($result);

        $sel = "SELECT * from `notification` where `user_type` = 'faculty'";
        $result = mysqli_query($conn,$sel);
        $notifications=mysqli_fetch_all($result, MYSQLI_ASSOC);

        $sel = "SELECT f_id from `approvals` where `f_id` = " . $userdata['f_id'];
        $result = mysqli_query($conn,$sel);
        $f_id=mysqli_fetch_assoc($result)['f_id'];

        $sel = "SELECT visit_activities from `company_person` where `c_id` = " . $f_id;
        $result = mysqli_query($conn,$sel);
        $visit_activities=mysqli_fetch_assoc($result)['visit_activities'];

        $sel = "SELECT rules_regulations from `company_person` where `c_id` = " . $f_id;
        $result = mysqli_query($conn,$sel);
        $rules_regulations=mysqli_fetch_assoc($result)['rules_regulations'];
    }else{
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
                                        <?php
                                            foreach($notifications as $notification) :                                                                            
                                        ?>
                                            <a href="<?=$notification['link']?>">
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
                    

                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="m-b-0"><i class="mdi mdi-wallet text-purple" ></i></h2>
                                    <h3 class="">1</h3>
                                    <h6 class="card-subtitle">Active Trip</h6></div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
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
                                    <h3 class="">
                                        
                                                    <?php
                                                      $sql="SELECT count(*) as name from undertaking";
                                                       $result = $conn->query($sql);
                                                      $data=mysqli_fetch_assoc($result);
                                                      echo $data['name'];
                                                      ?>

                                    </h3>
                                    <h6 class="card-subtitle">No. of student register</h6></div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 40%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
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
                                    <h3 class="">
                                        
                                     <?php
                                        $sql= "SELECT count( * ) as name FROM `undertaking` WHERE status = 'submitted'";
                                        $result = $conn->query($sql);
                                        $data=mysqli_fetch_assoc($result);
                                         echo $data['name'];
                                     ?>

                                    </h3>
                                    <h6 class="card-subtitle">No. of Undertaking Submited</h6></div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 56%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
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
                                    <h3 class="">
                                          <?php
                                              $sql= "SELECT count( * ) as name FROM `undertaking` WHERE status = 'pending'";
                                                 $result = $conn->query($sql);
                                                 $data=mysqli_fetch_assoc($result);
                                                  echo $data['name'];
                                          ?>
                                    </h3>
                                    <h6 class="card-subtitle">No. of Pending Undertaking</h6></div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 26%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
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
                                    </div>
                                    <div class="col-12">
                                        <div id="earning" style="height: 355px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                 </div>
                <!-- Row -->
                <!-- Row -->
                <div class="row">
                        <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <button class="pull-right btn btn-sm btn-rounded btn-info" data-toggle="modal" data-target="#myModal">Add Task</button>
                                        <h4 class="card-title">To Do list</h4>
                                        <h6 class="card-subtitle">List of your next task to complete</h6>
            
            
                                        <!-- ============================================================== -->
                                        <!-- To do list widgets -->
                                        <!-- ============================================================== -->
                                        <div class="to-do-widget m-t-20">
                                            <!-- .modal for add task -->
                                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
                                                        <div class="modal-header" >
                                                            <h4 class="modal-title">Add Task</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="addtask" name="addtask"> <span aria-hidden="true">&times;</span> </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                                <div class="form-group">
                                                                    <label>Task name</label>
                                                                    <input type="text" id="taskname" name="taskname" class="form-control" placeholder="Enter Task Name" > </div>
                                                                
                                                             <input type="hidden" name="fid" value="<?php echo $userdata['f_id'];?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <input type="submit" id="submit_btn" class="btn btn-success"  name="submit_btn" value="Submit">
                                                        </div>
                                                    </form>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <div class="slimScrollDiv" style="height:600px; overflow: hidden; overflow-y: auto">
                                            <!-- /.modal -->
                                            
                                            <?php

                                            $sql = "SELECT * FROM `todo_list`";
                                             $result = $conn->query($sql);
                     

                                            if(mysqli_num_rows($result)>0)
                                                {
                                                   while($data=mysqli_fetch_array($result))
                                                    {
                           
                                                    ?>
                  


                                          <ul  class="list-task todo-list list-group m-b-0 " data-role="tasklist" >
                                           
                                                <li class="list-group-item list-task" id="taskli" data-role="task" data-value="<?php echo $data['t_id']?>">
                                               <div class="checkbox checkbox-info" >
                                                        <input type="checkbox" id="<?php echo $data['t_id'];?>" class="" name="<?php echo $data['title'];?>">


                                                        <label for="<?php echo $data['t_id'];?>" class="">      <span id="taskid" style="display:none;">
                                                                <?php echo $data['t_id'];?> 
                                                            </span> 
                                                            <span id="tasktitle" class="tasktitle1">
                                                                <?php echo $data['title'];?>
                                                             </span>
                                                         </label>
                                                         
                                                            <!-- <span id="<?php //echo $data['title'];?>" class="get_clicked"> -->
                                                             <a href="#editModal" class="edit" data-toggle="modal">
                                                                <i class="mdi mdi-marker pull-right editbutton " data-toggle="tooltip" data-tid="<?php echo $data['t_id'];?>" data-ttitle="<?php echo $data['title'];?>" title="Edit">
                                                                </i>
                                                            </a>
                                                            <a href="#deleteModal"  class="delete"  data-toggle="modal">
                                                                <i class="mdi mdi-delete pull-right delete-row " data-toggle="tooltip"  data-tid="<?php echo $data['t_id'];?>" title="Delete">
                                                                </i>
                                                            </a>
                                                        <!-- </span> -->
                                                    </div>
                                                    
                                                </li>
                                              </ul>
                                                <?php
                                                    }
                                                }
                                            ?>


                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
   <div class="modal-header">
 <h4 class="modal-title">Edit Task</h4>
 <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
 </div>
 <div class="modal-body">
 <div class="form-group">
 <label>Task name</label>
<input id="edittasktitle" type="text" name="task"  class="form-control title_modal" >
   <input id="edittasktid" type="hidden" name="taskid"  class="taskid_modal">
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<input type="submit" id="Save_btn" class="btn btn-success "  name="Save_btn" value="Save">
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
            <h4 class="modal-title">Delete Task</h4>
            <button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">          
            <p>Are you sure you want to delete these Task?</p>
            <p class="text-warning"><small>This action cannot be undone.</small></p>
          </div>
          <input id="deletetaskid" type="hidden" name="taskid" class="taskid_modal">

          <!-- <input type="hidden" name="task" class="title_modal"> -->
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-danger" id="Delete_btn" name="Delete_btn" value="Delete">
          </div>
        </form>
      </div>
    </div>
  </div>

                    
                    <div class="col-lg-6">
                        <!-- Column -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Queries</h4>
                                <h6 class="card-subtitle">Latest queries</h6> </div>
                            <!-- ============================================================== -->
                            <!-- Comment widgets -->
                            <!-- ============================================================== -->
                            <div class="slimScrollDiv" style="height:607px; overflow: hidden; overflow-y: auto">
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
                </div>
                <!-- Row -->
                 <div class="row">
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-t-10 p-b-10">
                                    <!-- Column -->
                                    <div class="col p-r-0">
                                        <h1 class="font-light">C1</h1>
                                        <h6 class="text-muted">50|70</h6></div>
                                    <!-- Column -->
                                    <div class="col text-right align-self-center">
                                        <div data-label="70%" class="css-bar m-b-0 css-bar-primary css-bar-70"><i class="mdi mdi-account-circle"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-t-10 p-b-10">
                                    <!-- Column -->
                                    <div class="col p-r-0">
                                        <h1 class="font-light">C2</h1>
                                        <h6 class="text-muted">35|70</h6></div>
                                    <!-- Column -->
                                    <div class="col text-right align-self-center">
                                        <div data-label="50%" class="css-bar m-b-0 css-bar-danger css-bar-50"><i class="mdi mdi-account-circle"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-t-10 p-b-10">
                                    <!-- Column -->
                                    <div class="col p-r-0">
                                        <h1 class="font-light">C3</h1>
                                        <h6 class="text-muted">60|80</h6></div>
                                    <!-- Column -->
                                    <div class="col text-right align-self-center">
                                        <div data-label="80%" class="css-bar m-b-0 css-bar-warning css-bar-80"><i class="mdi mdi-account-circle"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-t-10 p-b-10">
                                    <!-- Column -->
                                    <div class="col p-r-0">
                                        <h1 class="font-light">D1</h1>
                                        <h6 class="text-muted">20|60</h6></div>
                                    <!-- Column -->
                                    <div class="col text-right align-self-center">
                                        <div data-label="20%" class="css-bar m-b-0 css-bar-info css-bar-20"><i class="mdi mdi-account-circle"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
 
                <!-- Column -->

                <!-- Row -->
				<div class="row">
                    <div class="col-lg-6">
                        <div class="card" >
                    <div class="card-body bg-inverse" style="background: url(assets/images/background/user-info.jpg) / cover; width: 100%">
                        <h4 class="text-white card-title">Coordinators List</h4>
                        <h6 class="card-subtitle text-white m-0 op-5">Checkout coordinators list here</h6>
                    </div>
                   
                    <div class="card-body"  style= "width:100% ;">
                        <div class="message-box contact-box">
                             
                             <h2 class="add-ct-btn"><button type="button" data-toggle="modal" class="btn btn-circle btn-lg btn-success waves-effect waves-dark add_co" data-target="#mycModal">+</button></h2>
                   
                            <div class="message-widget contact-widget">
                   
                                  <div class="modal fade" id="mycModal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return co_validate();">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Add Coordinator</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                </div>
                                                <div class="modal-body">
                                                  
                                                        <div class="form-group">
                                                        <label for="example-text-input" class=" col-form-label">Select Visit</label>
                                                            
                                                        <select class="selectpicker m-b-20 m-r-10" data-style="btn-info btn-outline-info" id="v_id" name="v_id"  required>
                                                                    <option value="" selected disabled>Visits</option> 
                                                                            <?php 
                                                                            $sql = "SELECT * FROM `visit` where f_id= ".$userdata['f_id']."";
                                                                            $result = $conn->query($sql);
                                                                            while($data=mysqli_fetch_array($result))
                                                                              {
                                                                            echo "<option value=".$data['visit_id'].">" .$data['title']. " - Rs " .$data['city'].  " </option>";
                                                                            }
                                                                            ?>
                                                            </select>           
                                                            
                                                            <label>Coordinator Name</label>
                                                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Coordinator Name">
                                                            <label>Enter Email Id</label>
                                                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email Id">
                                                            <label>Enter Mobile no</label>
                                                            <input type="number" name="mobile_no" id="mobile_no" class="form-control" placeholder="Enter Mobile No.">
                                                            <label>Enter Class</label>
                                                            <input type="text" name="stuclass" id="stuclass" class="form-control" placeholder="Enter Class">
                                                            <label>Designation</label>
                                                            <label class="custom-control custom-radio"> <input id="student" type="radio" name="radio"  class="custom-control-input" value="student" checked> <span class="custom-control-label">Student</span></label>
                                                            <label class="custom-control custom-radio"> <input id="faculty" type="radio" name="radio"  class="custom-control-input" value="faculty"> <span class="custom-control-label">Faculty</span></label>

                                                        </div>   
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <input type="submit" id="submit_btn2" class="btn btn-success"  name="submit_btn2" value="Submit">
                                                </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>  


                                <!-- Message -->
                                <?php
                                    $sql = "SELECT * FROM `coordinator` where f_id=".$userdata['f_id']."";
                                             $result = $conn->query($sql);
                     

                                            if(mysqli_num_rows($result)>0)
                                                {
                                                   while($data=mysqli_fetch_array($result))
                                                    {
                                  ?>

                                <a href="#">
                                    <div class="user-img"> <img src="assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5><?php echo $data['name'];?></h5> 
                                        <span class="mail-desc"><?php echo $data['email_id'];?></span></div>
                                </a>
                                <?php
                                                    }
                                                }
                                            ?>
                             </div>
                        </div>
                    </div>
                </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex no-block">
                                        <h4 class="card-title">Class wise Collection</h4>
                                        <div class="ml-auto">
                                            <select class="custom-select">
                                                <option selected="">C1</option>
                                                <option value="1">C2</option>
                                                <option value="2">C3</option>
                                                <option value="3">D1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-light p-20">
                                    <div class="d-flex">
                                        <div class="align-self-center">
                                            <h3 class="m-b-0">C1</h3><small>Total Earning</small>
                                        </div>
                                        <div class="ml-auto align-self-center">
                                            <h2 class="text-success">5000</h2></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover earning-box">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Name</th>
                                                    
                                                    <th colspan="2">amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr >
                                                    <td style="width:50px;"><span class="round"><img src="assets/images/users/8.jpg" alt="user" width="50"></span></td>
                                                    <td>
                                                    <h6>Foram patel</h6></td>
                                                    
                                                    <td>1000</td>
                                                </tr>
                                                <tr class="active">
                                                    <td><span class="round"><img src="assets/images/users/2.jpg" alt="user" width="50"></span></td>
                                                    <td>
                                                        <h6>Mohil patel</h6></td>
                                                
                                                    <td>2000</td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                        <hr width="0">
                                      
                                        
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
        </div>
    
                        <!-- Column -->
                
				
                <!-- ============================================================== -->
                <!-- End PAge Content -->
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