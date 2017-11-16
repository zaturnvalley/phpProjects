<?php 
session_start();
if(!$_SESSION['user_name']){
  header("location: login.php");
}
else {
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <!-- Latest compiled and minified CSS & JS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
  <br>
  <h1 class="text-center">Welcome</h1>
  <hr>
  <h4 class="text-center"><a href="logout.php" title="Log Out Here" target="_blank">Log out Here</a></h4>  
</body>
</html>
<?php 
}
?>