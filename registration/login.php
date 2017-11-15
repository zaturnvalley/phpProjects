<!DOCTYPE html>
<?php 
session_start();
$con = mysqli_connect("localhost", "root", "", "php");
?>
<html>
  <head>
    <title>Log In</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </head>
  <style>
  body {
    font-family: sans-serif;
    padding: 0;
    margin: 0;
  }
  .row {
      padding-bottom: 5px;
  }
  </style>
<body>
  <br>
  <h2 class="text-center">Basic PHP Registration Forms</h2>
  <hr>
  <div class="container text-center" style="width: 60%;">
    <div class="row">
      <div class="col-md-12">
        <h2 class="text-center">Log In</h2>
      </div>
    </div>
    <form action="login.php" method="post">
      <div class="form-group">
        <div class="row">
          <div class="col-md-2">
            <strong>Email:</strong>
          </div>
          <div class="col-md-10">
            <input class="form-control" type="text" name="user_email" placeholder="Enter your Email" required="required"/>
          </div>
        </div>         
        <div class="row">
          <div class="col-md-2">
            <strong>Password:</strong>
          </div>
          <div class="col-md-10">
            <input class="form-control" type="password" name="user_pass" placeholder="Enter your Password" required="required"/>
          </div>
        </div> 
        <div class="row">
          <div class="col-md-10">&nbsp;
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <input align="right" type="submit" class="btn btn-primary" name="login" value="Log In">
            </div>
          </div>
        </div>               
    </div>
    </form>
  </div>
  <?php
  if(isset($_POST['login'])){
    $user_pass = mysqli_real_escape_string($con, $_POST['user_pass']);
    $user_email = mysqli_real_escape_string($con, $_POST['user_email']);

    $sel = "select * from register_user where user_email='$user_email' AND user_pass='$user_pass'";

    $run = mysqli_query($con, $sel);

    $check = mysqli_num_rows($run);

    if($check==0){
      echo "<script>alert('Password or Email is not correct or registered. Please try again.');</script>";
      exit();
    }
    else {
      $_SESSION['user_email']=$user_email;
      echo "<script>window.open('home.php','_self');</script>"
    }
  }
  ?>
</body>
</html>