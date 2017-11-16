<!DOCTYPE html>
<?php 
session_start();
$con = mysqli_connect("localhost", "root", "", "php");
?>
<html>
<head>
  <title>View Users - Admin Panel</title>
  <!-- Latest compiled and minified CSS & JS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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
</head>
<body>
  <br>
  <h2 class="text-center">Basic PHP Registration Forms</h2>
  <hr>
  <div class="container text-center" style="width: 60%;">
    <div class="row">
      <div class="col-md-12">
        <h3>View All Users</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table style="width: 100%;">
          <tr>
            <th>S.N.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Edit</th>               
            <th>Delete</th>                    
          </tr>
          <?php
          $sel =  "select * from register_user";

          $run = mysqli_query($con, $sel); 
          $i=0;

          while($row=mysqli_fetch_array($run)){
            $name = $row['user_name'];
            $email = $row['user_email'];
            $date = $row['user_date'];             
            $i++;        
          ?>
          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $name;?></td>
            <td><?php echo $email;?></td>
            <td><?php echo $date;?></td>       
            <td><a href="view_users.php" title="Edit">Edit</a></td> 
            <td><a href="view_users.php" title="Delete">Delete</a></td>                  
          </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>
</body>
</html>