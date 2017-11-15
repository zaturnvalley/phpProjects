<!DOCTYPE html>
<?php 
$con = mysqli_connect("localhost", "root", "", "php");
?>
<html>
  <head>
    <title>Registration</title>
  </head>
  <style>
  body {
    font-family: sans-serif;
    padding: 0;
    margin: 0;
    background: skyblue;
  }
    table {
      color: white;
      padding: 10px;
      width: 400px;
    }
    input {
      padding: 5px;
    }
  </style>
<body>
  <br>
  <form action="registration.php" method="post" enctype="multipart/form-data">
    <table bgcolor="gray" align="center" width="500">
      <tr align="center">
        <td colspan="6">
          <h2>New User? Register Here</h2>
        </td>
      </tr>
      <tr>
        <td align="right"><strong>Name:</strong></td>
        <td>
          <input type="text" name="user_name" placeholder="Enter your Name" required="required" />
        </td>
      </tr>   
      <tr>
        <td align="right"><strong>Password:</strong></td>
        <td>
          <input type="password" name="user_pass" placeholder="Enter your Password" required="required"/>
        </td>
      </tr>  
      <tr>
        <td align="right"><strong>Email:</strong></td>
        <td>
          <input type="text" name="user_email" placeholder="Enter your Email" required="required"/>
        </td>
      </tr>   
      <tr>
        <td align="right"><strong>Country:</strong></td>
        <td>
          <select name="user_country" required="required">
            <option>Select a Country</option>
            <option>USA</option>
            <option>Canada</option> 
            <option>Mexico</option>
            <option>United Kingdom</option>
          </select>
        </td>
      </tr>
      <tr>
        <td align="right"><strong>Phone Number:</strong></td>
        <td>
          <input type="text" name="user_no" placeholder="Enter your Phone Number" required="required"/>
        </td>
      </tr>   
      <tr>
        <td align="right"><strong>Address:</strong></td>
        <td>
          <textarea name="user_address" cols="20" rows="5"></textarea>
        </td>
      </tr>  
      <tr>
        <td align="right"><strong>Gender:</strong></td>
        <td>
          Male:<input type="radio" name="user_gender" value="Male" />
          Female:<input type="radio" name="user_gender" value="Female" />
        </td>
      </tr>  
      <tr>
        <td align="right"><strong>Birthday:</strong></td>
        <td>
          <input type="date" name="user_b_day" required="required"/>
        </td>
      </tr>       
      <tr>
        <td align="right"><strong>Image:</strong></td>
        <td>
          <input type="file" name="user_image" required="required"/>
        </td>
      </tr> 
      <tr align="center">
        <td colspan="6">
          <input type="submit" name="register" value="Register Now">
        </td>
      </tr>                                   
    </table>
  </form>
  <?php
  if(isset($_POST['register'])){
    // getting text info and save into local variable
    $user_name = $_POST['user_name'];
    $user_pass = $_POST['user_pass'];
    $user_email = $_POST['user_email'];
    $user_country = $_POST['user_country'];
    $user_gender = $_POST['user_gender'];
    $user_no = $_POST['user_no'];
    $user_address = $_POST['user_address'];
    $user_b_day = $_POST['user_b_day'];

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

     if($check_email==0){
        echo "<script>alert('This email is already registered. Try another email, please.');</script>";
        exit(); 
     }
  }
  ?>
</body>
</html>