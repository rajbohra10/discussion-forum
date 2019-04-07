<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./stylesheets/signup.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>

<?php
session_start();
if(isset($_SESSION['myusername'])){
    header("location:home.php");
 }
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require '../vendor/autoload.php';
require '../src/config/db.php';
require '../src/routes/routes.php';

?>
<form action="api/user/add" method="POST">
            <div class="container">
              <h1>Sign Up</h1>
              <hr>
                
              <label for="fullname"><b>Name</b></label>
              <input type="text" placeholder="Enter name" name="fullname" class="InputFields" required>
        
              <label for="username"><b>Username</b></label>
              <input type="text" placeholder="Enter username" name="username" class="InputFields" required>

              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Enter email" name="email" class="InputFields" required>

              <label for="dob"><b>Date of Birth</b></label>
              <input type="text" placeholder="Enter DOB" name="dob" class="InputFields" required>

              <label for="userpassword"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="userpassword" class="InputFields" required>
          
              <!-- <label for="psw-confirm"><b>Confirm Password</b></label>
              <input type="password" placeholder="Repeat Password" name="psw-confirm" class="InputFields"   required> -->
              
              <button type="submit" id="registerbtn">Register</button>
              <a href="login.php" style="padding-bottom: 30px">Already have an account ?</a>
            </div>
          
            <div class="container signin">
              <!-- <p>Already have an account? <a href="#">Sign in</a>.</p> -->
           
            </div>
          </form>
</body>
</html>
