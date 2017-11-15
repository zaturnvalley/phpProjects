<!DOCTYPE html>
<html>
  <head>
    <title>Calculator</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>    
  </head>
<body>
  <br>
  <h2 class="text-center">Basic PHP Calculator</h2>
  <hr>
  <div class="container text-center" style="width: 90%;">
    <form method="post" action="calculator.php">
      <div class="form-group" style="width: 90%;">
      <b>Value 1:</b>&nbsp;
      <input class="form-control" type="text" name="value1" size="15" placeholder="Enter a value">&nbsp;

      <b>Value 2:</b>&nbsp;
      <input class="form-control" type="text" name="value2" size="15" placeholder="Enter a value">&nbsp;

      <b>Select Operator:</b>&nbsp;
      <select class="form-control" name="operator">
        <option>+</option>
        <option>-</option>
        <option>*</option>
        <option>/</option>
      </select>&nbsp;
      <hr>
      <input type="submit" class="btn btn-primary" name="cal" value="Calculate"></div>     
    </form>
  </div>
  <?php

  if(isset($_POST['cal'])){

    $value1 = $_POST['value1'];
    $value2 = $_POST['value2'];
    $opt = $_POST['operator'];  

    if($opt =='+'){
      echo "<center><h2>Your Answer is: <b style='color:skyblue;'>";
      echo $value1 + $value2;
      echo "</b></h2></center>";
    } 
    if($opt =='-'){
      echo "<center><h2>Your Answer is: <b style='color:skyblue;'>";
      echo $value1 - $value2;
      echo "</b></h2></center>";
    } 
    if($opt =='*'){
      echo "<center><h2>Your Answer is: <b style='color:skyblue;'>";
      echo $value1 * $value2;
      echo "</b></h2></center>";
    } 
    if($opt =='/'){
      echo "<center><h2>Your Answer is: <b style='color:skyblue;'>";
      echo $value1 / $value2;
      echo "</b></h2></center>";
    }             
  }
  ?>
</body>
</html>