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
                   <title>Admin | Manage Company</title>
                   <!-- Bootstrap Core CSS -->
                   <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                   <!-- morris CSS -->
                   <link href="assets/plugins/morrisjs/morris.css" rel="stylesheet">
                   
     <link href="assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
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
                        <h3 class="text-themecolor">Manage Company</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                               <li class="breadcrumb-item active">Manage Company</li>
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
                                        <h4 class="card-title">Manage Company Person</h4>
                                        
                                        
                                            <!-- Column -->
                                            <div class="form-group row">
                                                    
                                            <div class="col-md-9">
                                                        <input id="searchagent" class="form-control" type="text" name="SearchAgent" placeholder="Search Company Person ...">          
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
                                                                    <h4 class="modal-title">Add Company Person</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    
                                                                        <div class="form-group">
                                                                            <label>Company person name</label>
                                                                            <input type="text" id="companyperson_name" name="name" class="form-control" placeholder="Enter Company person Name" required>
                                                                            <label>Email ID</label>
                                                                            <input type="email" id="email_id" name="email_id" class="form-control" placeholder="Enter Email ID" required>
                                                                            <label>Mobile No.</label>
                                                                            <input type="number" id="mobile_no" name="mobile_no" class="form-control" placeholder="Enter Mobile No." required>
                                                                            <label>Password</label>
                                                                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required>
                                                                            <label>Company</label>
                                                                            <input type="text" id="c_name" name="c_name" class="form-control" placeholder="Enter Company Name" required>
                                                                            <label>City</label>
                                                                            <input type="text" id="c_city" name="c_city" class="form-control" placeholder="Enter Company City" required>
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
                                                </div>
                                            <!-- Column -->
                                             <div class="table-responsive">
                                            <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>C_id</th>
                                                        <th>Action</th>
                                                        <th>Name</th>
                                                        <th>Email ID</th>
                                                        <th>Mobile No.</th>
                                                        <th>Password</th>
                                                        <th>Company Name</th>
                                                        <th>City</th>
                                                    </tr>
                                                </thead>
                                                <div style="width:100%;overflow:auto; max-height:100px;">
                                                <tbody id="searchtable">
                                                <?php

                                                $sql = "SELECT * FROM `company_person`";
                                                $result = $conn->query($sql);


                                                    if(mysqli_num_rows($result)>0)
                                                    {
                                                    while($data=mysqli_fetch_array($result))
                                                    {
                                                       
                                                    ?>
                                                    <tr>
                                                        <td class="c_id" ><?php echo $data['c_id']; ?></td>
                                                        <td>
                                                            <a href="#editModal" class="edit" data-toggle="modal"><i class="mdi mdi-marker editbutton" data-toggle="tooltip" title="Edit"></i></a>
                                                            <a href="#deleteModal"  class="delete" data-toggle="modal"><i class="mdi mdi-delete delete-row" data-toggle="tooltip" title="Delete"></i></a>
                                                        </td>
                                                        <td class="name"><?php echo $data['name']; ?></td>
                                                        <td class="email_id"><?php echo $data['email_id']; ?></td>
                                                        <td class="mobile_no"><?php echo $data['mobile_no']; ?></td>
                                                        <td class="password"><?php echo $data['password']; ?></td>
                                                        <td class="company_name"><?php echo $data['company_name']; ?></td>
                                                        <td class="city"><?php echo $data['company_city']; ?></td>
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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  onSubmit="return editmodalvalidate();">
          <div class="modal-header">            
            <h4 class="modal-title">Edit Company Person</h4>
            <button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">          
          <div class="form-group">
       
               <label>Company Person name</label>
               <input type="text"  name="name" id="companypersonname" class="form-control name_modal" required>
               <label>Email ID</label>
               <input type="email"  name="email" id="emailid" class="form-control email_id_modal"required>
               <label>Mobile No.</label>
               <input type="number" name="mobile" id="mobileno" class="form-control mobile_modal"  required>
               <label>Password</label>
               <input type="password"  name="pass" id="pass" class="form-control password_modal"  required>
               <label>Company Name</label>
               <input type="text"  name="cname" id="cname" class="form-control cname_modal" required>
               <label>City</label>
               <input type="text"  name="city" id="city" class="form-control city_modal" required>
              
         
            </div>
          </div>
          <input type="hidden" name="c_id" class="user_id">
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
            <h4 class="modal-title">Delete Company Person</h4>
            <button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">          
            <p>Are you sure you want to delete these Record?</p>
            <p class="text-warning"><small>This action cannot be undone.</small></p>
          </div>
          <input type="hidden" name="c_id" class="user_id">
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
    </script>

    
<script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
<script type="text/javascript">
 
 $(document).ready(function(){
    $('.editbutton').click(function () {
       
        var id=$(this).closest('tr').children('td.c_id').text();
      
      $('.user_id').val(id);
       
      var name=$(this).closest('tr').children('td.name').text();
      $('.name_modal').val(name);


      var email_id=$(this).closest('tr').children('td.email_id').text();
      $('.email_id_modal').val(email_id);

      var mobile=$(this).closest('tr').children('td.mobile_no').text();
      $('.mobile_modal').val(mobile);

      var password=$(this).closest('tr').children('td.password').text();
      $('.password_modal').val(password);

      var cname=$(this).closest('tr').children('td.company_name').text();
      $('.cname_modal').val(cname);

      var city=$(this).closest('tr').children('td.city').text();
      $('.city_modal').val(city);

 });
 
});


//delete the values

      $(document).ready(function(){
    $('.delete-row').click(function() {
       
       var id=$(this).closest('tr').children('td.c_id').text();
      
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

var letter = document.getElementById('companyperson_name').value;
var regexletter = /^[a-zA-Z\s]+$/;
if(!regexletter.test(letter)){
alert("please enter only letters in Company Person Name.");
 document.getElementById('companyperson_name').focus();
return false;
}


var emailid = document.getElementById('email_id').value;
var regexemail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
if(!regexemail.test(emailid)){
alert("please enter valid Email Id.");
document.getElementById('email_id').focus();
return false;
}

var mobile = document.getElementById('mobile_no').value;
var regexmobile = /^[6-9]{1}[0-9]{9}$/;
if(!regexmobile.test(mobile)){
alert("please enter valid Mobile No.. (10 digits only)");
 document.getElementById('mobile_no').focus();
return false;
}

var pass = document.getElementById('password').value;
var regexpass = /^[a-zA-Z0-9!@#$%^&*]{6,10}$/;
if(!regexpass.test(pass)){
alert("please enter valid Password of size 6-10");
document.getElementById('password').focus();
return false;
}

var letter2 = document.getElementById('c_name').value;
var regexletter = /^[a-zA-Z\s]+$/;
if(!regexletter.test(letter2)){
alert("please enter only letters in Company Name.");
document.getElementById('c_name').focus();
return false;
}

var letter3 = document.getElementById('c_city').value;
var regexletter = /^[a-zA-Z\s]+$/;
if(!regexletter.test(letter3)){
alert("please enter only letters in City.");
document.getElementById('c_city').focus();
return false;
}
};


//edit modal validation

function editmodalvalidate(){

var letter1 = document.getElementById('companypersonname').value;
var regexletter1 = /^[a-zA-Z\s]+$/;
if(!regexletter1.test(letter1)){
alert("please enter only letters in Company Person Name.");
document.getElementById('companypersonname').focus();
return false;
}


var emailid1 = document.getElementById('emailid').value;
var regexemail1 = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
if(!regexemail1.test(emailid1)){
alert("please enter valid Email Id.");
document.getElementById('emailid').focus();
return false;
}

var mobile1 = document.getElementById('mobileno').value;
var regexmobile1 = /^[6-9]{1}[0-9]{9}$/;
if(!regexmobile1.test(mobile1)){
alert("please enter valid Mobile No.. (10 digits only)");
document.getElementById('mobileno').focus();
return false;
}

var pass1 = document.getElementById('pass').value;
var regexpass1 = /^[a-zA-Z0-9!@#$%^&*]{6,10}$/;
if(!regexpass1.test(pass1)){
alert("please enter valid Password of size 6-10");
document.getElementById('pass').focus();
return false;
}

var letter4 = document.getElementById('cname').value;
var regexletter = /^[a-zA-Z\s]+$/;
if(!regexletter.test(letter4)){
alert("please enter only letters in Company Name.");
document.getElementById('cname').focus();
return false;
}

var letter5 = document.getElementById('city').value;
var regexletter = /^[a-zA-Z\s]+$/;
if(!regexletter.test(letter5)){
alert("please enter only letters in City.");
document.getElementById('city').focus();
return false;
}

};



</script>
<?php

if(isset($_POST['submit_btn'])){ 

$name = $_POST['name'];

$email = $_POST['email_id'];

$mobile = $_POST['mobile_no'];

$password = $_POST['password'];

$cname = $_POST['c_name'];

$city = $_POST['c_city'];


$sql="INSERT INTO `company_person`(`name`, `email_id`, `password`, `mobile_no`, `company_name`,`company_city`) VALUES ('".$name."','".$email."','".$password."','".$mobile."','".$cname."','".$city."')";
$result=mysqli_query($conn,$sql);

echo '<script>
			window.location.href="adminmanagecompany.php";
	</script> ';
}


if (isset($_POST['Delete_btn']))

{

// get form data, making sure it is valid

$id = $_POST['c_id'];



// save the data to the database

$sql = "DELETE FROM `company_person` WHERE `c_id` = ".$id."";
mysqli_query($conn,$sql);



echo '<script>
			window.location.href="adminmanagecompany.php";
	</script> ';
}




if (isset($_POST['Save_btn']))

{
    $id = $_POST['c_id'];


// get form data, making sure it is valid

$name= $_POST['name'];
$email_id= $_POST['email'];
$mobile_no= $_POST['mobile'];
$password= $_POST['pass'];
$company_name= $_POST['cname'];
$company_city= $_POST['city'];



// check that firstname/lastname fields are both filled in

// $sql = "SELECT * FROM `company` where `company_id` = ".$data['company_id']."";
// $r = $conn->query($sql);
// $d=mysqli_fetch_array($r);

// $c_name = $d['name'];
// $c_city = $d['city'];

// save the data to the database

$sql= "UPDATE `company_person` SET name='$name', email_id ='$email_id',password='$password',mobile_no='$mobile_no',company_name='$company_name',company_city='$company_city' WHERE `c_id` = $id";
 mysqli_query($conn,$sql);




 echo '<script>
			window.location.href="adminmanagecompany.php";
	</script> ';

}
?>
</body>

</html>
