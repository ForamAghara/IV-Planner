<?php

include('connect-db.php');
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
    <title>Reset Password</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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

<body>
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
    <?php
    
    if($_GET['key'] && $_GET['reset'])
    {
    $email=$_GET['key'];
    $pass=$_GET['reset'];
      while(1){
        
        $sql = "SELECT * FROM admin WHERE md5(email_id) = '$email' and md5(password) = '$pass'";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);  
        if($count==1){
        ?>
    <section id="wrapper">
        <div class="login-register" style="background-image:url(assets/images/background/login-register.jpg);">        
            <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material"  action="submit_new.php" method="post">
                    <h3 class="box-title m-b-20">Enter New Password</h3>
                    <div class="form-group ">
                      <div class="col-xs-12">
                        <input type="hidden" name="user" value="admin">
                        <input type="hidden" name="email" value="<?php echo $email;?>">
                        <input class="form-control" placeholder="Password" type="password" name="password">
                      </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                      <div class="col-xs-12">
                        <input type="submit" id="submit_password" class="btn btn-info btn-lg btn-block text-uppercase waves-light"  name="submit_password" value="Reset">
                      </div>
                    </div>
                  </form>
            </div>
          </div>
        </div>
    </section>
    <?php
        break;
    }

    $sql = "SELECT * FROM faculty WHERE md5(email_id) = '$email' and md5(password) = '$pass'";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);  
    if($count==1){
        ?>
        <section id="wrapper">
            <div class="login-register" style="background-image:url(assets/images/background/login-register.jpg);">        
                <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material"  action="submit_new.php" method="post">
                        <h3 class="box-title m-b-20">Enter New Password</h3>
                        <div class="form-group ">
                          <div class="col-xs-12">
                            <input type="hidden" name="user" value="faculty">
                            <input type="hidden" name="email" value="<?php echo $email;?>">
                            
                        <input class="form-control" placeholder="Password" type="password" name="password">
                          </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                          <div class="col-xs-12">
                            <input type="submit" id="submit_password" class="btn btn-info btn-lg btn-block text-uppercase waves-light"  name="submit_password" value="Reset">
                          </div>
                        </div>
                      </form>
                </div>
              </div>
            </div>
        </section>
        <?php
        break;
    }
        
    $sql = "SELECT * FROM student WHERE md5(email_id) = '$email' and md5(password) = '$pass'";
      $result = $conn->query($sql);
      $count = mysqli_num_rows($result);  
      if($count==1){
        ?>
        <section id="wrapper">
            <div class="login-register" style="background-image:url(assets/images/background/login-register.jpg);">        
                <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material"  action="submit_new.php" method="post">
                        <h3 class="box-title m-b-20">Enter New Password</h3>
                        <div class="form-group ">
                          <div class="col-xs-12">
                            <input type="hidden" name="user" value="student">
                            <input type="hidden" name="email" value="<?php echo $email;?>">
                        <input class="form-control" placeholder="Password" type="password" name="password">
                          </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                          <div class="col-xs-12">
                            <input type="submit" id="submit_password" class="btn btn-info btn-lg btn-block text-uppercase waves-light"  name="submit_password" value="Reset">
                          </div>
                        </div>
                      </form>
                </div>
              </div>
            </div>
        </section>
        <?php
        break;
    }
  
      $sql = "SELECT * FROM agent WHERE md5(email_id) = '$email' and md5(password) = '$pass'";
      $result = $conn->query($sql);
      $count = mysqli_num_rows($result);  
      if($count==1){
        ?> 
        <section id="wrapper">
            <div class="login-register" style="background-image:url(assets/images/background/login-register.jpg);">        
                <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material"  action="submit_new.php" method="post">
                        <h3 class="box-title m-b-20">Enter New Password</h3>
                        <div class="form-group ">
                          <div class="col-xs-12">
                            <input type="hidden" name="user" value="agent">
                            <input type="hidden" name="email" value="<?php echo $email;?>">
                        <input class="form-control" placeholder="Password" type="password" name="password">
                          </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                          <div class="col-xs-12">
                            <input type="submit" id="submit_password" class="btn btn-info btn-lg btn-block text-uppercase waves-light"  name="submit_password" value="Reset">
                          </div>
                        </div>
                      </form>
                </div>
              </div>
            </div>
        </section>
        <?php
        break;
        }
    
          $sql = "SELECT * FROM company_person WHERE md5(email_id) = '$email' and md5(password) = '$pass'";
          $result = $conn->query($sql);
          $count = mysqli_num_rows($result);  
          if($count==1){
        ?>
        <section id="wrapper">
            <div class="login-register" style="background-image:url(assets/images/background/login-register.jpg);">        
                <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material"  action="submit_new.php" method="post">
                        <h3 class="box-title m-b-20">Enter New Password</h3>
                        <div class="form-group ">
                          <div class="col-xs-12">
                            <input type="hidden" name="user" value="company">
                            <input type="hidden" name="email" value="<?php echo $email;?>">
                        <input class="form-control" placeholder="Password" type="password" name="password">
                          </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                          <div class="col-xs-12">
                            <input type="submit" id="submit_password" class="btn btn-info btn-lg btn-block text-uppercase waves-light"  name="submit_password" value="Reset">
                          </div>
                        </div>
                      </form>
                </div>
              </div>
            </div>
        </section>
        <?php
        break;
          }
    
            $sql = "SELECT * FROM parent WHERE md5(email_id) = '$email' and md5(password) = '$pass'";
            $result = $conn->query($sql);
            $count = mysqli_num_rows($result);  
            if($count==1){
        ?>
        <section id="wrapper">
            <div class="login-register" style="background-image:url(assets/images/background/login-register.jpg);">        
                <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material"  action="submit_new.php" method="post">
                        <h3 class="box-title m-b-20">Enter New Password</h3>
                        <div class="form-group ">
                          <div class="col-xs-12">
                            <input type="hidden" name="user" value="parent">
                            <input type="hidden" name="email" value="<?php echo $email;?>">
                        <input class="form-control" placeholder="Password" type="password" name="password">
                          </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                          <div class="col-xs-12">
                            <input type="submit" id="submit_password" class="btn btn-info btn-lg btn-block text-uppercase waves-light"  name="submit_password" value="Reset">
                          </div>
                        </div>
                      </form>
                </div>
              </div>
            </div>
        </section>
        <?php
        break;
    }
break; 
}
    }
        ?>

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
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>