<!DOCTYPE html>
<html>
  <head>
      <title>Tutorial</title>
  </head>
<body>
  <form action="global_variables.php" method="get">
    <input type="text" name="email"/>
    <input type="submit" name="sub" value="Submit"/>
  </form>
</body>
</html>

<?php
  if(isset($_GET['sub'])){

    echo "<b>Your email is:</b> " . $_GET['email'];
    // Also works with post
  }

// Global Variables, predefined
  // $_POST
  // $_GET
  // $_FILES
  // $_REQUEST
  // $_COOKIE
  // $_SERVER

?>