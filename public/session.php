<?php
//    include('config.php');
   session_start();
   
//    $user_check = $_SESSION['login_user'];
   
//    $ses_sql = mysqli_query($db,"select username from admin where username = '$user_check' ");
   
//    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $_SESSION['myusername'];
   
   if(!isset($_SESSION['myusername'])){
      header("location:login.php");
   }
?>