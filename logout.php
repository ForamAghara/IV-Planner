<?php
   session_start();
   unset($_SESSION['username']);
   unset($_SESSION['user']);
   unset($_SESSION['start']);
   unset($_SESSION['today']);
      header("Location: index.php");
  
?>