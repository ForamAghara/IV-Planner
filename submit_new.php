<?php
include('connect-db.php');

if(isset($_POST['submit_password']) && $_POST['email'] && $_POST['password'])
{
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $user=$_POST['user'];
  if($user == "admin"){
    $sql= "UPDATE `admin` SET  password='$pass' WHERE md5(email_id) = '$email'";
    mysqli_query($conn,$sql);
  }
  else if($user=="faculty"){
    $sql= "UPDATE `faculty` SET  password='$pass' WHERE md5(email_id) = '$email'";
    mysqli_query($conn,$sql);
  }
  else if($user=="student"){
    $sql= "UPDATE `student` SET  password='$pass' WHERE md5(email_id) = '$email'";
    mysqli_query($conn,$sql);
  }
  else if($user=="agent"){
    $sql= "UPDATE `agent` SET  password='$pass' WHERE md5(email_id) = '$email'";
    mysqli_query($conn,$sql);
  }
  else if($user=="parent"){
    $sql= "UPDATE `parent` SET  password='$pass' WHERE md5(email_id) = '$email'";
    mysqli_query($conn,$sql);
  }
  else if($user=="company"){
    $sql= "UPDATE `company` SET  password='$pass' WHERE md5(email_id) = '$email'";
    mysqli_query($conn,$sql);
  }

  header('Location: index.php');
}
?>