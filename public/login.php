<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
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
?>
<form action="api/login" method="POST">
            <div class="container">
              <h1>Login</h1>
              <hr>
              <label for="username"><b>Email</b></label>
              <input type="text" placeholder="Enter username" name="username" class="InputFields" required>
              <label for="userpassword"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="userpassword" class="InputFields" required>
              <hr>  
              <button type="submit" class="CustomBtn">Login</button>
              <a href="signup.php" >Create Account</a>
            </div>
</form>
</body>
</html>