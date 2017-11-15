<!DOCTYPE html>
<?php 
session_start();
$con = mysqli_connect("localhost", "root", "", "php");
?>
<html>
  <head>
    <title>Registration</title>
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
        <h2 class="text-center">New User? Register Here</h2>
      </div>
    </div>
    <form action="registration.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <div class="row">
          <div class="col-md-2">
            <strong>Name:</strong>
          </div>
          <div class="col-md-10">
            <input class="form-control" type="text" name="user_name" placeholder="Enter your Name" required="required" />
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
          <div class="col-md-2">
            <strong>Email:</strong>
          </div>
          <div class="col-md-10">
            <input class="form-control" type="text" name="user_email" placeholder="Enter your Email" required="required"/>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <strong>Country:</strong>
          </div>
          <div class="col-md-10">
            <select class="form-control" name="user_country" required="required">
              <option>Select a Country</option>
              <option>USA</option>
              <option>Canada</option> 
              <option>Mexico</option>
              <option>United Kingdom</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <strong>Phone Number:</strong>
          </div>
          <div class="col-md-10">
            <input class="form-control" type="text" name="user_no" placeholder="Enter your Phone Number" required="required"/>
          </div>
        </div>  
        <div class="row">
          <div class="col-md-2">
            <strong>Address:</strong>
          </div>
          <div class="col-md-10">
            <textarea class="form-control" name="user_address" cols="20" rows="5"></textarea>
          </div>
        </div>  
        <div class="row">
          <div class="col-md-2">
            <strong>Gender:</strong>
          </div>
          <div class="col-md-10">
            Male:&nbsp;<input class="form-check-label" type="radio" name="user_gender" value="Male" />
            Female:&nbsp;<input class="form-check-label" type="radio" name="user_gender" value="Female" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <strong>Birthday:</strong>
          </div>
          <div class="col-md-10">
            <input class="form-control" type="date" name="user_b_day" required="required"/>
          </div>
        </div>       
        <div class="row">
          <div class="col-md-2">
            <strong>Image:</strong>
          </div>
          <div class="col-md-10">
            <input class="form-control-file" type="file" name="user_image" required="required"/>
          </div>
        <div class="row">
          <div class="col-md-10">&nbsp;
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <input align="right" type="submit" class="btn btn-primary" name="register" value="Register Now">
            </div>
          </div>
        </div>                                   
    </div>
    </form>
  </div>
  <h4 class="text-center">Already Registered? <a href="login.php" title="Login Here" target="_blank">Login Here</a></h4>
  <?php
  if(isset($_POST['register'])){
    // getting text info and save into local variable
    $user_name = mysqli_real_escape_string($con, $_POST['user_name']);
    $user_pass = mysqli_real_escape_string($con, $_POST['user_pass']);
    $user_email = mysqli_real_escape_string($con, $_POST['user_email']);
    $user_country = mysqli_real_escape_string($con, $_POST['user_country']);
    $user_gender = mysqli_real_escape_string($con, $_POST['user_gender']);
    $user_no = mysqli_real_escape_string($con, $_POST['user_no']);
    $user_address = mysqli_real_escape_string($con, $_POST['user_address']);
    $user_b_day = mysqli_real_escape_string($con, $_POST['user_b_day']);

    // getting the image & saving into local variables
    $user_image = $_FILES['user_image']['name'];
    $user_tmp = $_FILES['user_image']['tmp_name'];

    // If forms are blank, alert
     if($user_address == '' OR $user_country == '' OR $user_image == '' OR $user_gender == ''){
        echo "<script>alert('Please fill out all of the fields.');</script>";
        exit();
     }

     // email validation, alert
     if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){

        echo "<script>alert('Your email is not valid.');</script>";
        exit();
     }

     // password length check
     if(strlen($user_pass < 8)){
        echo "<script>alert('Please make your password 8 characters or longer.');</script>";
        exit();      
     }

     $sel_email = "select * from register_user where user_email ='$user_email'" ;
     $run_email = mysqli_query($con,$sel_email);

     $check_email = mysqli_num_rows($run_email);

     if($check_email==1){
        echo "<script>alert('This email is already registered. Try another email, please.');</script>";
        exit(); 
     }
     else {
      $_SESSION['user_email']=$user_email;

      move_uploaded_file($user_tmp, "images/$user_image");

      $insert = "insert into register_user (user_name,user_pass,user_pass,user_email,user_country,user_no,user_address,user_gender,user_b_day,user_image,register_date) values ('$user_name','$user_pass','$user_email','$user_country','$user_no','$user_address','$user_gender','$user_b_date','$user_image','$register_date', NOW())";
      $run_insert = mysqli_query($con, $insert);
        if($run_insert){
          echo "<script>alert('Registration was successful. Welcome');</script>";
          echo "<script>Window.open('home.php','_self')</script>";
        }
     }
  }
  ?>
</body>
</html>