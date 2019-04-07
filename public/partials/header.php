<!-- header with nav bar -->
<!DOCTYPE html>
<html>
    <head>
        <title>TDF</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="./stylesheets/signup.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
<div class="ui inverting menu">
  <a class="item" href="home.php">Tsec Discussion Forum 
  </a>
  <a class="item" href="post.php">
    New 
  </a>
  <a class="item" href="edit.php">
    Edit
  </a>
  <div class="right menu">
    
    <a class="item" id="profileBtn" href="profile.php"><?php echo $login_session; ?></a>
    <a class="item" href="logout.php">Logout</a>
  </div>
</div>
    