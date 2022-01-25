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
  
    <section id="wrapper">
        <div class="login-register" style="background-image:url(assets/images/background/login-register.jpg);">        
            <div class="login-box card">
            <div class="card-body">
                    <?php
                    if(isset($_POST['submit_email']) && $_POST['email'])
                {
                
                $email_id= $_POST['email'];
                
                    while(1){
                        $sql = "SELECT * FROM admin WHERE email_id = '$email_id'";
                      $result = $conn->query($sql);
                      $count = mysqli_num_rows($result);  
                      if($count==1){
                        $not_found=1;
                        while($data=mysqli_fetch_array($result))
                        {
                           $receiptant = $data['email_id'];
                          $email=md5($data['email_id']);
                          $pass=md5($data['password']);
                        }
                        break;
                      }
                     
                        $sql = "SELECT * FROM faculty WHERE email_id = '$email_id'";
                        $result = $conn->query($sql);
                        $count = mysqli_num_rows($result);  
                        if($count==1){
                            $not_found=1;
                            while($data=mysqli_fetch_array($result))
                            {
                                $receiptant = $data['email_id'];
                                $email=md5($data['email_id']);
                                $pass=md5($data['password']);
                            }
                         break;
                        }
                            
                        $sql = "SELECT * FROM student WHERE email_id = '$email_id' ";
                          $result = $conn->query($sql);
                          $count = mysqli_num_rows($result);  
                          if($count==1){
                            $not_found=1;
                            while($data=mysqli_fetch_array($result))
                            {
                                $receiptant = $data['email_id'];
                                $email=md5($data['email_id']);
                                $pass=md5($data['password']);
                            }
                            break;
                          }
                        
                            $sql = "SELECT * FROM agent WHERE email_id = '$email_id'";
                            $result = $conn->query($sql);
                            $count = mysqli_num_rows($result);  
                            if($count==1){
                                $not_found=1;
                                while($data=mysqli_fetch_array($result))
                                {
                                    $receiptant = $data['email_id'];
                                    $email=md5($data['email_id']);
                                    $pass=md5($data['password']);
                                }
                             break;
                            }
                        
                              $sql = "SELECT * FROM company_person WHERE email_id = '$email_id' ";
                              $result = $conn->query($sql);
                              $count = mysqli_num_rows($result);  
                              if($count==1){
                                $not_found=1;
                                while($data=mysqli_fetch_array($result))
                                {
                                    $receiptant = $data['email_id'];
                                    $email=md5($data['email_id']);
                                    $pass=md5($data['password']);
                                }
                               break;
                              }
                        
                                $sql = "SELECT * FROM parent WHERE email_id = '$email_id' ";
                                $result = $conn->query($sql);
                                $count = mysqli_num_rows($result);  
                                if($count==1){
                                    $not_found=1;
                                    while($data=mysqli_fetch_array($result))
                                    {
                                        $receiptant = $data['email_id'];
                                        $email=md5($data['email_id']);
                                        $pass=md5($data['password']);
                                    }
                                  break;
                                }
                    
                        break; 
                      }
                      if($not_found == 1){
                    $link="<a href='localhost/ivplanner/reset_pass.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
                    require_once('phpmail/class.phpmailer.php');
                    $mail = new PHPMailer();
                    $mail->CharSet =  "utf-8";
                    $mail->IsSMTP();
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
                    $mail->AddAddress($receiptant);
                    $mail->Subject  =  'Reset Password';
                    $mail->IsHTML(true);
                    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
                    if($mail->Send())
                    {
                    ?>
                    <h3 class="box-title m-b-20"><?php  echo "Check Your EmailID:- '$receiptant' and Click on the link sent to your email";?></h3>
                    <?php
                    }
                    else
                    {
                    ?>
                    <h3 class="box-title m-b-20"><?php  echo "Mail Error - >".$mail->ErrorInfo;?></h3>
                    <?php
                        }
                    }
                    else {
                        header('Location: index.php');
                    }
                }	
                ?>
            </div>
          </div>
        </div>
    </section>

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
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>