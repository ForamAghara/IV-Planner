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
    <title>Faculty | Create Trip</title>
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
                    <h3 class="text-themecolor">Create Trip</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                           <li class="breadcrumb-item active">Create Trip</li>
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
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                                <h4 class="card-title">Create Trip</h4>
                                <input type="hidden" type="text" name="fid" id="fid" value="<?php echo $userdata['f_id'];?>">
								<div class="form-group row">
                                                <label for="example-text-input" class="col-md-4 col-form-label">Enter Trip Title</label>
                                                <div class="col-md-8">
                                                        <input class="form-control" type="text" value="" id="title" name="title" required placeholder="Title..." >
                                                </div>
                                </div>
								<div class="form-group row">
                                                <label for="example-text-input" class="col-md-4 col-form-label">Enter City</label>
                                                <div class="col-md-8">
                                                        <input class="form-control" type="text" value="" id="city" name="city" required placeholder="City..." >
                                                </div>
                                </div>
								<div class="form-group row">
                                                <label for="example-text-input" class="col-md-4 col-form-label">Select starting date</label>
                                                <div class="col-md-8">
                                                        <input class="form-control" type="date" id="startdate" date_format="yyyy/mm/dd" name="startdate" onchange="disp()" required placeholder="DATE...">
                                                </div>
                                            </div>
											<div class="form-group row">
                                                <label for="example-text-input" class="col-md-4 col-form-label">Select ending date</label>
                                                <div class="col-md-8">
                                                        <input class="form-control" type="date"  id="enddate" date_format="yyyy/mm/dd" name="enddate" required onchange="disp()" placeholder="DATE...">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-4 col-form-label">Total Cost</label>
                                                <div class="col-md-8">
                                                        <input class="form-control" type="number"   name="amount" id="amount" required  placeholder="Amount...">
                                                </div>
                                            </div>
								 <div class="form-group row">
                                            <label for="example-text-input" class="col-md-4 col-form-label">Select insurance company</label>
                                            <div class="col-md-6">
                                            <select class="selectpicker m-b-20 m-r-10" data-style="btn-info btn-outline-info" id="i_id" name="i_id" onchange="myFunction()" required>
                                                                    <option value="" selected disabled>Companies</option> 
                                                                            <?php 
                                                                            $sql = "SELECT * FROM `insurance`";
                                                                            $result = $conn->query($sql);
                                                                            while($data=mysqli_fetch_array($result))
                                                                              {
                                                                            echo "<option value=".$data['docs'].">" .$data['company_name']. " - Rs " .$data['amount'].  " </option>";
                                                                            }
                                                                            ?>
                                                            </select>           
                                            </div>
											<div class="col-md-2">
											 <a class="btn btn-success" href="" id="doclink" target="_blank">View Doc</a>
											 </div>
                                        </div>
										<div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Micro Planning</label>
                                                <div class="col-md-10">
                                                       <div class="table-responsive">
                                                       <input type="hidden" id="microdays" name="microdays" value="">
                                    <table id="micro" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Planning</th>
                                                <th>Remarks</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody >

                                        </tbody>
                                        </table>
                                        </div>

													   </div>
                                            </div>
                    
									<label for="example-text-input" class="col-md-4 col-form-label">Enter description</label>
                                    <div class="form-group">
                                        <textarea class="textarea_editor form-control" rows="15" id="description" name="description" required  placeholder="Enter text ..."></textarea>
                                    </div>
                                    <h4 class="card-title">Upload .csv file of students here for announcement</h4>
                                    
                                        <div class="fallback">
                                            <input  name="stu" id="stu" type="file" required/>
                                        </div>
                         
                                <br>
                                <input type="submit" id="submit_btn" class="btn btn-success"  name="submit_btn" value="Create Trip and Announce ">
                                    </form>
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

<script>
function myFunction() {
  var x = document.getElementById("i_id").value;


  $("#doclink").attr("href", x);
}

function show_difference() {
    var d1 = new Date(document.getElementById("startdate").value);
    var date1_tm = d1.getTime();

    var d2 = new Date(document.getElementById("enddate").value);
    var date2_tm = d2.getTime();
	
	
	if(d1>d2){
		alert("Select End date greater than Start date!!!");
	}

    var diff_days = Math.abs((date2_tm - date1_tm) / 86400000);
    diff_days = Math.floor(diff_days) + 1;

    document.getElementById("microdays").value = diff_days;
    $('table#micro tbody').empty();
    return diff_days;

}

function disp() {
    
    
    var html ;
    var days = show_difference();
    var mydate = new Date(document.getElementById("startdate").value);

    var month = mydate.getUTCMonth() + 1; 
    var day = mydate.getUTCDate();
    var year = mydate.getUTCFullYear();
    

for(var i=1; i< days+1 ; i++){
    var a = i;
    
    

    var start = new Date(year, month, day+a);
    
    var m = start.getUTCMonth() ; 
    var d = start.getUTCDate();
    var y = start.getUTCFullYear();
    var newdate = d+ "/" + m + "/" + y;
   html = "<tr><td><input type='hidden' name='d"+a+"' id='d"+a+"' value='"+newdate+"'>"+newdate+"</td><td><input  class='form-control' type='text' name='p"+a+"' id='p"+a+"' required></td><td><input class='form-control' type='text' name='r"+a+"' id='r"+a+"'></td></tr>";
   $('table#micro').append(html);
//    mydate = mydate.setDate(mydate.getDate() + 1);
}

}

</script>
    <script src="assets/plugins/dropzone-master/dist/dropzone.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>


  <?php 
  if(isset($_POST['submit_btn'])){ 

    $title = $_POST['title'];
    
    $city = $_POST['city'];
    
    $start = $_POST['startdate'];
    
    $end = $_POST['enddate'];
    $cost = $_POST['amount'];
    
    $fid= $_POST['fid'];
    $iid= $_POST['i_id'];
    $days= $_POST['microdays'];
    $desc= $_POST['description'];

    $sel = "SELECT * from `insurance` where `docs` = '$iid'";
    $rel= mysqli_query($conn,$sel);
    $data=mysqli_fetch_array($rel);

    $aid = $data['a_id'];
    $insurance = $data['insurance_id'];
    $iamount = $data['amount'];

    $cost = $cost + $iamount;

    $sql="INSERT INTO `visit`(`title`, `city`, `starting_date`,`ending_date`, `description`,`cost`,`insurance_id`,`f_id`) VALUES ('".$title."','".$city."','".$start."','".$end."','".$desc."','".$cost."','".$insurance."','".$fid."')";
    $result=mysqli_query($conn,$sql);

    $sel1 = "SELECT * from `visit` where `title` = '$title' and `city` = '$city' and `description`= '$desc'";
    $re = $conn->query($sel1);
    $a=mysqli_fetch_array($re);
    
    $vid =$a['visit_id'];

    $agent = "UPDATE `agent` SET f_id='$fid',visit_id='$vid' WHERE `a_id` = $aid";
    mysqli_query($conn,$agent);

    for($i=1;$i<$days+1;$i++){
        $d = "d$i";
        $p = "p$i";
        $r = "r$i";
        $date = $_POST[$d];
        $plan = $_POST[$p];
        $remarks = $_POST[$r];

        $sql1="INSERT INTO `micro_planning`(`date`, `planning`, `remarks`,`visit_id`,`f_id`) VALUES ('".$date."','".$plan."','".$remarks."','".$vid."','".$fid."')";
        $result1=mysqli_query($conn,$sql1);
    }



    function RandomStringGenerator() { 
    // Variable which store final string 
    $generated_string = ""; 
      
    // Create a string with the help of  
    // small letters, capital letters and 
    // digits. 
    $domain = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"; 
      
    // Find the lenght of created string 
    $len = strlen($domain); 
      
    // Loop to create random string 
    for ($i = 0; $i < 10; $i++) 
    { 
        // Generate a random index to pick 
        // characters 
        $index = rand(0, $len - 1); 
          
        // Concatenating the character  
        // in resultant string 
        $generated_string = $generated_string . $domain[$index]; 
    } 
      
    // Return the random generated string 
    return $generated_string; 
    } 





    $filename = explode(".", $_FILES['stu']['name']);
  if(end($filename) == "csv")
  {
   $handle = fopen($_FILES['stu']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $enroll = mysqli_real_escape_string($conn, $data[0]);
    $name = mysqli_real_escape_string($conn, $data[1]);  
    $branch = mysqli_real_escape_string($conn, $data[2]);
    $gender = mysqli_real_escape_string($conn, $data[3]);
    $mobile = mysqli_real_escape_string($conn, $data[4]);
    $fmobile = mysqli_real_escape_string($conn, $data[5]);
    $email = mysqli_real_escape_string($conn, $data[6]);
    $iemail = mysqli_real_escape_string($conn, $data[7]);
    $fname = mysqli_real_escape_string($conn, $data[8]);
    $fmail = mysqli_real_escape_string($conn, $data[9]);
    $fpassword= RandomStringGenerator();
    $password = RandomStringGenerator();
    $college = mysqli_real_escape_string($conn, $data[10]);
    $hostel = mysqli_real_escape_string($conn, $data[11]);
    $jainfood = mysqli_real_escape_string($conn, $data[12]);
    $semester = mysqli_real_escape_string($conn, $data[13]);
    $class = mysqli_real_escape_string($conn, $data[14]);
    $query = "INSERT into student(`enroll_no`,`name`,`branch`,`gender`,`mobile_no`,`father_mobile_no`,
     `email_id`,`institute_email_id`,`password`,`college`,`hostel`,`jain_food`,`semester`,`class`,`f_id`,`visit_id`) VALUES 
     ('".$enroll."','".$name."','".$branch."','".$gender."','".$mobile."','".$fmobile."','".$email."','".$iemail."',
     '".$password."','".$college."','".$hostel."','".$jainfood."','".$semester."','".$class."','".$fid."','".$vid."')";
    $rel1=mysqli_query($conn, $query);

    $sel2 = "SELECT * from `student` where `enroll_no` = '$enroll' and `name` = '$name' and `email_id`= '$email'";
    $re2 = $conn->query($sel2);
    $studentdata=mysqli_fetch_array($re2);
    $sid =$studentdata['student_id'];
    

    
        


   $sql7 = "INSERT into parent(`name`,`email_id`,`mobile_no`,`password`,`student_id`,`f_id`,`visit_id`) VALUES ('".$fname."','".$fmail."','".$fmobile."','".$fpassword."','".$sid."','".$fid."','".$vid."')";
    $result7 = mysqli_query($conn, $sql7);


                    $link="<a href='localhost/ivplanner/index.php'>LINK</a>";
                    require_once('phpmail/class.phpmailer.php');
                    $mail = new PHPMailer();
                    $mail->CharSet =  "utf-8";
                    $mail->IsSMTP();
                    $mail->isHTML(true);
                    // enable SMTP authentication
                    $mail->SMTPAuth = true;                  
                    // GMAIL username
                    $mail->Username = "ivplanner9@gmail.com";
                    // GMAIL password
                    $mail->Password = "@dm!np@55";
                    $mail->SMTPSecure = "ssl";  
                    // sets GMAIL as the SMTP server
                    $mail->Host = "smtp.gmail.com";
                    // set the SMTP port for the GMAIL server
                    $mail->Port = "465";
                    $mail->From='ivplanner9@gmail.com';
                    $mail->FromName='IV Admin';
                    $mail->AddAddress($email);
                    $mail->Subject  =  'IV Planner Credentials';
                    $mail->IsHTML(true);
                    $mail->Body    = 
                    ' <h3>Welcome To IV PLANNER!!!</h3>
                      <h5>Click the link below to access login page and enter the credentials provided below to login.</h5>
                      <h6>Also check account details and edit it if any information is entered wrong.</h6>
                      <strong>Login Page :</strong> '.$link.'
                      <h6></h6> 
                      <strong>Email ID : </strong>'.$email.' 
                      <h6></h6>
                      <strong>Password : </strong>'.$password.'';
    
                      $mail->Send();
                      $mail->ClearAllRecipients(); 


                      require_once('phpmail/class.phpmailer.php');
                      $mail2 = clone $mail;
                      $mail2->AddAddress($fmail);
                      $mail2->Subject  =  'IV Planner Credentials';
                      $mail2->IsHTML(true);
                      $mail2->Body    = 
                      ' <h3>Welcome To IV PLANNER!!!</h3>
                        <h5>Click the link below to access login page and enter the credentials provided below to login.</h5>
                        <h6>Also check account details and edit it if any information is entered wrong.</h6>
                        <strong>Login Page :</strong> '.$link.'
                        <h6></h6>  
                        <strong>Email ID : </strong>'.$fmail.' 
                        <h6></h6>
                        <strong>Password : </strong>'.$fpassword.'';
                      $mail2->Send();
                      $mail2->ClearAllRecipients(); 
   }
   fclose($handle);
  }
  
   echo("Error description: " . mysqli_error($conn));

echo '<script>
window.location.href="facultycreatetrip.php";
 </script> ';
 }   
    
    
    
    
    ?>  
</body>

</html>