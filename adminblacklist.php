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
                   <title>Admin | Blacklist</title>
                   <!-- Bootstrap Core CSS -->
                   <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                   <!-- morris CSS -->
                   <link href="assets/plugins/morrisjs/morris.css" rel="stylesheet">
                   
                    <!-- chartist CSS -->
                    <link href="assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
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
                                   </div>
                                     </div>
                                      
                               <!-- End User profile text-->
                               <!-- Sidebar navigation-->
                               
                                       
                               <nav class="sidebar-nav">
                                   <ul id="sidebarnav">
                                       <li class="nav-devider"></li>
                                     
                                     
                                       <li> <a  href="admin.php" ><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
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
                        <h3 class="text-themecolor">BlackList</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                               <li class="breadcrumb-item active">BlackList</li>
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
                                
                        <div class="card-body bg-inverse" style="background: url(assets/images/background/user-info.jpg) / cover; width: 100%">
                            <h4 class="text-white card-title">BlackList</h4>
                            <h6 class="card-subtitle text-white m-0 op-5">BlackList</h6>
                        </div>
                        <div class="card-body"  style= "width:100% ;">
                            <div class="message-box contact-box">
                                <h2 class="add-ct-btn"><button type="button" data-toggle="modal" class="btn btn-circle btn-lg btn-success waves-effect waves-dark" data-target="#myModal">+</button></h2>
                            
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Add Student</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                        <div class="form-group">
                                                            <label>Select Student</label>
                                                            <select class="selectpicker m-b-20 m-r-10" data-style="btn-info btn-outline-info" id="student_id" name="student_id" required> 
                                                                            <?php 
                                                                            $sql = "SELECT * FROM `student`";
                                                                            $result = $conn->query($sql);
                                                                            while($data=mysqli_fetch_array($result))
                                                                              {
                                                                            echo "<option value=".$data['student_id'].">" .$data['name']. "-" .$data['enroll_no'].  "</option>";
                                                                            }
                                                                            ?>
                                                            </select>
                                                            <label>Enter Visit</label>
                                                            <input type="text" name="visit" class="form-control" placeholder="Enter Visit " required>
                                                            <label>Year</label>
                                                            <input type="number" name="year" class="form-control" placeholder="Enter Year" required>
                                                            <label>Remarks</label>
                                                            <input type="text" name="remarks" class="form-control" placeholder="Enter Remarks" required> 
                                                        </div>   
                                                    
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

                                    <div class="col-md-4">
                                        <select id="filterText" onchange='filterText()' class="selectpicker m-b-20 m-r-10" data-style="btn-info btn-outline-info">
                                                <option data-tokens="" selected disabled>Select Year</option>
                                                <option data-tokens="">ALL</option>
                                                <option data-tokens="">2018</option>
                                                <option data-tokens="">2017</option>
                                                <option data-tokens="">2016</option>
                                            </select>            
                                </div>
                                <div class="table-responsive">
                                        <table id="demo-foo-addrow search" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
                                            <thead>
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Enrollment No.</th>
                                                    <th>Student Name</th>
                                                    <th>Visit</th>
                                                    <th>Year</th>
                                                    <th>Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable">
                                            <?php

                                                $sql = "SELECT * FROM `blacklist`";
                                                $result = $conn->query($sql);


                                                    if(mysqli_num_rows($result)>0)
                                                    {
                                                    while($data=mysqli_fetch_array($result))
                                                    {
                                                        $sql = "SELECT * FROM `student` where `student_id` = ".$data['student_id']."";
                                                               $r = $conn->query($sql);
                                                               $d=mysqli_fetch_array($r);
                                                    ?>
                                                <tr class="content">
                                                <td>
                                                            <a href="#editModal" class="edit" data-toggle="modal"><i class="mdi mdi-marker editbutton" data-toggle="tooltip" title="Edit"></i></a>
                                                            <a href="#deleteModal"  class="delete" data-toggle="modal"><i class="mdi mdi-delete delete-row" data-toggle="tooltip" title="Delete"></i></a>
                                                        </td>
                                                    <td class="enroll_no"><?php echo $d['enroll_no']; ?></td>
                                                    <td class="name"><?php echo $d['name']; ?></td>
                                                    <td class="visit"><?php echo $data['visit']; ?></td>
                                                    <td class="year"><?php echo $data['year']; ?></td>
                                                    <td class="remarks"><?php echo $data['remarks']; ?></td>
                                                    <td class="blacklist_id" style="display:none;"><?php echo $data['blacklist_id']?></td>
                                                    
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
            </div>
            </div>
            </div>
          
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


<div id="editModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="modal-header">            
            <h4 class="modal-title">Edit Student</h4>
            <button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">          
          <div class="form-group">
                
          <label>Select Student</label>
         <select class="selectpicker m-b-20 m-r-10 student_modal" data-style="btn-info btn-outline-info" name="student" required> 
          <?php 
          $sql = "SELECT * FROM `student`";
           $result = $conn->query($sql);
          while($data=mysqli_fetch_array($result))
          {
            echo "<option value=".$data['student_id'].">" .$data['name']. "-" .$data['enroll_no'].  "</option>";
           }
          ?>
         </select>
               <label>Visit</label>
               <input type="text"  name="visit" class="form-control visit_modal" required>
               <label>Year</label>
               <input type="number"  name="year" class="form-control year_modal"required>
               <label>Remarks</label>
               <input type="text" name="remarks" class="form-control remarks_modal"  required>
             
            </div>
          </div>
          <input type="hidden" name="en_id" class="user_id">
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
          <input type="hidden" name="en_id" class="user_id">
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-danger " id="Delete_btn" name="Delete_btn" value="Delete">
          </div>
        </form>
      </div>
    </div>
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
    <script src="assets/plugins/switchery/dist/switchery.min.js"></script>
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

    
function filterText()
  {  
    var rex = new RegExp($('#filterText').val());
    if(rex =="/ALL/")
      {
        clearFilter()


      }
      else{
      $('.content').hide();
      $('.content').filter(function() {
      return rex.test($(this).text());
      }).show();
  }
  }
  
function clearFilter()
  {
    $('.filterText').val('');
    $('.content').show();
  }

    </script>

    
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
<script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <script type="text/javascript">
 
 $(document).ready(function(){
    $('.editbutton').click(function () {
       
        var id=$(this).closest('tr').children('td.blacklist_id').text();
      
      $('.user_id').val(id);
       
      var name=$(this).closest('tr').children('td.student').text();
      $('.student_modal').val(name);


      var visit=$(this).closest('tr').children('td.visit').text();
      $('.visit_modal').val(visit);

      var year=$(this).closest('tr').children('td.year').text();
      $('.year_modal').val(year);

      var rem=$(this).closest('tr').children('td.remarks').text();
      $('.remarks_modal').val(rem);


 });
 
});


//delete the values

      $(document).ready(function(){
    $('.delete-row').click(function() {
       
       var id=$(this).closest('tr').children('td.blacklist_id').text();
      
      $('.user_id').val(id);




   
 });
 
});
</script>

<?php

if(isset($_POST['submit_btn'])){ 

$student = $_POST['student_id'];

$visit = $_POST['visit'];

$year = $_POST['year'];

$remarks = $_POST['remarks'];


$sql = "SELECT * FROM `connect` where student_id = ".$student."";
$r = $conn->query($sql);
$d=mysqli_fetch_array($r);

$fid= $d['f_id'];

$sql="INSERT INTO `blacklist`(`visit`, `year`, `remarks`, `student_id`,`f_id`) VALUES ('".$visit."','".$year."','".$remarks."','".$student."','".$fid."')";
$result=mysqli_query($conn,$sql);


echo '<script>
			window.location.href="adminblacklist.php";
	</script> ';
}


if (isset($_POST['Delete_btn']))

{

// get form data, making sure it is valid

$id = $_POST['en_id'];


// save the data to the database


$sql = "DELETE FROM `blacklist` WHERE `blacklist_id` = ".$id."";
mysqli_query($conn,$sql);



echo '<script>
			window.location.href="adminblacklist.php";
	</script> ';
}




if (isset($_POST['Save_btn']))

{
    $id = $_POST['en_id'];


// get form data, making sure it is valid

$student= $_POST['student'];
$visit= $_POST['visit'];
$year= $_POST['year'];
$remarks= $_POST['remarks'];



// check that firstname/lastname fields are both filled in

// $sql = "SELECT * FROM `company` where `company_id` = ".$data['company_id']."";
// $r = $conn->query($sql);
// $d=mysqli_fetch_array($r);

// $c_name = $d['name'];
// $c_city = $d['city'];

// save the data to the database

$sql= "UPDATE `blacklist` SET visit='$visit', year ='$year',remarks='$remarks',student_id='$student' WHERE `blacklist_id` = $id";
 mysqli_query($conn,$sql);


 echo '<script>
			window.location.href="adminblacklist.php";
	</script> ';

}
?>
</body>

</html>