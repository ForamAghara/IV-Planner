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
                   <title>Faculty | Company Approvals</title>
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
              <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>-->
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
                        <h3 class="text-themecolor">Company Approvals</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                               <li class="breadcrumb-item active">Company Approvals</li>
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
                                      <!--<form action="<?php //echo $_SERVER['PHP_SELF']; ?>" method="post">
                                        --><h4 class="card-title">Company Approvals</h4>
                                        
                                            <!-- Column -->
                                            <div class="form-group row">
                                                    
                                                    <div class="col-md-3">
                                                            <select id="filter" onchange='filter()' class="selectpicker m-b-20 m-r-10" data-style="btn-info btn-outline-info">

                                                                  <option data-tokens="" selected disabled>Branch</option>

                                                                        <?php
                                                              $sql = "SELECT DISTINCT branch FROM   `student`";
                                                              $result = $conn->query($sql);
                          

                                                          if(mysqli_num_rows($result)>0)
                                                          {
                                                            while($data=mysqli_fetch_array($result))
                                                        {
                                                                  ?>

                                                                  <option value="<?php echo $data['branch'];?>"><?php echo $data['branch']?></option>
                                                                  <?php
                                                    }
                                                  }
                                                  ?>
                                                                    
                                                                </select>            
                                                    </div>
                                                   <div class="col-md-3">
                                                      
                                                        <input class="form-control" type="date" value="" id="from" placeholder="DATE...">            
                                                    </div>
                            
                                                    <div class="col-md-3">
                                                        <input class="form-control" type="date" value=""  id="to" placeholder="DATE...">           
                                                    </div>
                                                    
                                                    <div class="col-md-3">
                                                       <input type="button" name="search" id="search" value="Search" class="btn btn-warning">
                                                      </div>  
                                                    
                                                  <!-- </form> -->
                                                </div>

                                            <!-- Column -->
                                            <div id="searchdata">
                                        <div class="table-responsive">
                                            <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Company Name</th>
                                                        <th>City</th>
                                                        <th>Available from</th>
                                                        <th>Available to</th>
                                                        <th>Branch</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php
                                                  
                                                  
                                                

                                                    $sql = "SELECT * FROM `company_person` ";
                                                     $result = $conn->query($sql);
                                                

                                                         
                     
                                                    $i = 0;
                                                  if(mysqli_num_rows($result)>0)
                                                    {
                                                       while($data=mysqli_fetch_array($result))
                                                        {
                                                            $i++;
                                                         
                                                   ?>

                                                    <tr class="content">
                                                        <td><?php echo $i;?></td>

                                                        <td><?php echo $data['company_name']; ?></td>
                                                        <td><?php echo $data['company_city']; ?></td>
                                                        <td><?php echo $data['start_date']; ?></td>
                                                        <td><?php echo $data['end_date']; ?></td>
                                                        <td><?php echo $data['branch']; ?></td>

                                                        <td class="cid" style="display:none;"><?php echo $data['c_id']?></td>
                                                        <td><a href="#reqModal" class="btn btn-success edit editbutton" data-toggle="modal">Send Request</a></td>
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

<div id="reqModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="modal-header">            
            <h4 class="modal-title">Send Approval Request</h4>
            <button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">          
          <div class="form-group">
                
          <label>Select visit</label>
         <select class="selectpicker m-b-20 m-r-10 student_modal" data-style="btn-info btn-outline-info" name="visit" required> 
          <?php 
          $sql = "SELECT * FROM `visit` where f_id=".$userdata['f_id']."";
           $result = $conn->query($sql);
          while($data=mysqli_fetch_array($result))
          {
            echo "<option value=".$data['visit_id'].">" .$data['title']. "-" .$data['city'].  "</option>";
           }
          ?>
         </select>
               <label>Number of students</label>
               <input type="text"  name="students" class="form-control" required>
               
            </div>
          </div>
          <input type="hidden" name="fid" value="<?php echo $userdata['f_id'];?>">
          <input type="hidden" name="cid" class="company">
          <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-info" name="Save_btn" value="Save">
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
    <script type="text/javascript">
 
 $(document).ready(function(){
     $('.editbutton').click(function () {
    
    
         var cid=$(this).closest('tr').children('td.cid').text();
         $('.company').val(cid);
    });

 });

</script>

<script type="text/javascript">

  $(document).ready(function() {

  $.datepicker.setDefaults({
    dateFormat: 'dd-mm-yyyy'
  });
  // $(function(){
  //   $("#from").datepicker();

  //   $("#to").datepicker();
  // });
  $('#search').click(function(){
    var branch = $('#filter').val();
    var from = $('#from').val();
    var to = $('#to').val();
    if(from != '' && to != '')
    {
      $.ajax({
        url:"range.php",  
        method:"POST",
        data:{from:from, to:to,branch:branch},
        success:function(data) 
        {
          $('#searchdata').html(data); 
        }
      });
    }
     else
    {
      alert("Please Select the Date");
    }
  });
});
  
</script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
<script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <?php

if(isset($_POST['Save_btn'])){ 

$student = $_POST['students'];

$visit = $_POST['visit'];

$fid = $_POST['fid'];

$cid = $_POST['cid'];




$sql="INSERT INTO `approvals`(`f_id`, `c_id`, `visit_id`, `students`) VALUES ('".$fid."','".$cid."','".$visit."','".$student."')";
$result=mysqli_query($conn,$sql);


echo '<script>
			window.location.href="facultycompanyapproval.php";
	</script> ';
}
?>

</body>

</html>
