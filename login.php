<?php
// Inialize session
session_start();
// Include database connection settings

include('connect-db.php');



if(isset($_POST['submit_btn'])){ 
  $email_id = $_POST['email'];
  $password = $_POST['pass']; 
 
  while(1){
    $sql = "SELECT * FROM admin WHERE email_id = '$email_id' and password = '$password'";
  $result = $conn->query($sql);
  $row = mysqli_fetch_array($result);
  $count = mysqli_num_rows($result);  
  if($count==1){
    $admin=1;
   $_SESSION['user'] = 'admin';
    $_SESSION['username'] = $row['ad_id'];
    break;
  }
 
    $sql = "SELECT * FROM faculty WHERE email_id = '$email_id' and password = '$password'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);  
    if($count==1){
      $faculty = 1;
      $_SESSION['user'] = 'faculty';
     $_SESSION['username'] = $row['f_id'];
     break;
    }
        
    $sql = "SELECT * FROM student WHERE email_id = '$email_id' and password = '$password'";
      $result = $conn->query($sql);
      $row = mysqli_fetch_array($result);
      $count = mysqli_num_rows($result);  
      if($count==1){
        $student = 1;
        $_SESSION['user'] = 'student';
       $_SESSION['username'] = $row['enroll_no'];
        break;
      }
    
        $sql = "SELECT * FROM agent WHERE email_id = '$email_id' and password = '$password'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);  
        if($count==1){
          $agent = 1;
          $_SESSION['user'] = 'agent';
         $_SESSION['username'] = $row['a_id'];
         break;
        }
    
          $sql = "SELECT * FROM company_person WHERE email_id = '$email_id' and password = '$password'";
          $result = $conn->query($sql);
          $row = mysqli_fetch_array($result);
          $count = mysqli_num_rows($result);  
          if($count==1){
            $company = 1;
            $_SESSION['user'] = 'company';
           $_SESSION['username'] = $row['c_id'];
           break;
          }
    
            $sql = "SELECT * FROM parent WHERE email_id = '$email_id' and password = '$password'";
            $result = $conn->query($sql);
            $row = mysqli_fetch_array($result);
            $count = mysqli_num_rows($result);  
            if($count==1){
              $parent = 1;
              $_SESSION['user'] = 'parent';
              $_SESSION['username'] = $row['p_id'];
              break;
            }
    break; 
  }

  if($admin == 1){
    header('Location: admin.php');
  }
  else if ($faculty == 1){
    header('Location: faculty.php');
  }
  else if($student == 1){
    header('Location: student.php');
  }
  else if($parent == 1) {
    header('Location: parent.php');
  }
  else if($agent == 1){
    header('Location: agent.php');
  }
  else if($company == 1){
    header('Location: company.php');
  }
  else {
    header('Location: index.php');
  }

  
      
    
  }


  
?>