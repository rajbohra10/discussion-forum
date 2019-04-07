<?php

include('session.php');
include './partials/header.php';

?>

<form action="api/user/add" method="POST">
            <div class="container">
              <h1>My Profile</h1>
              <hr>
                
              <label for="fullname"><b>Name</b></label>
              <input type="text" placeholder="Enter name" name="fullname" class="InputFields" required>
        
              <label for="username"><b>Username</b></label>
              <input type="text" placeholder="Enter username" name="username" class="InputFields" readonly>

              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Enter email" name="email" class="InputFields" readonly>

              <label for="dob"><b>Date of Birth</b></label>
              <input type="text" placeholder="Enter DOB" name="dob" class="InputFields" readonly>

              <!-- <label for="userpassword"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="userpassword" class="InputFields" required> -->
          
              <!-- <label for="psw-confirm"><b>Confirm Password</b></label>
              <input type="password" placeholder="Repeat Password" name="psw-confirm" class="InputFields"   required> -->
              
              <!-- <button type="submit" id="registerbtn">Register</button>
              <a href="login.php" style="padding-bottom: 30px">Already have an account ?</a> -->
            </div>
          
            <div class="container signin">
              <!-- <p>Already have an account? <a href="#">Sign in</a>.</p> -->
           
            </div>
          </form>
<script>
var myusername = $("#profileBtn").text();
$.ajax({
                    url : "api/user/"+myusername,
                    type : "get", 
                    dataType: "json",
                    success : (list)=>{
                        list.forEach(function(obj, index){
                            $('input[name=fullname]').val(obj.fullname);
                            $('input[name=username]').val(obj.username);
                            $('input[name=dob]').val(obj.dob);
                            $('input[name=email]').val(obj.email);

                        });
                    }});
</script>

