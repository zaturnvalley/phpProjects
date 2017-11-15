<!DOCTYPE html>
<html>
  <head>
    <title>Currency Converter</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>    
  </head>
<body>
  <br>
  <h2 class="text-center">Basic PHP Currency Converter</h2>
  <hr>
  <div class="container text-center" style="width: 90%'">
    <form method="post" action="converter.php">
      <div class="form-group" style="width: 90%;">
      <b>Enter Amount: </b>
      <input class="form-control" type="text" name="amount" size="12" placeholder="Enter amount">&nbsp;

      <b>From: </b>&nbsp;
      <select class="form-control" name="from">
        <option>USD</option>
      </select>&nbsp;
      <b>To: </b>&nbsp;
      <select class="form-control" name="to">
        <option>CAD</option>      
        <option>GBP</option>
        <option>EURO</option>
        <option>JPY</option>
      </select>&nbsp; 
      <br>   
      <input type="submit" class="btn btn-primary" name="convert" value="Convert Now">   
      </div>    
    </form>
  </div>
  <?php

  if(isset($_POST['convert'])){
    $amount = $_POST['amount'];
    $from = $_POST['from'];
    $to = $_POST['to'];

    if($from=='USD' AND $to=='CAD'){
      echo "<center><h2>&dollar; <b style='color:red;'>";
      echo $amount * 1.27;
      echo " CAD</b></h2></center>";
    }
    if($from=='USD' AND $to=='GBP'){
      echo "<center><h2>&pound; <b style='color:red;'>";
      echo $amount * .76;
      echo " GBP</b></h2></center>";
    }
    if($from=='USD' AND $to=='EURO'){
      echo "<center><h2>&euro; <b style='color:red;'>";
      echo $amount * .86;
      echo " EURO</b></h2></center>";
    }
    if($from=='USD' AND $to=='JPY'){
      echo "<center><h2>&yen; <b style='color:red;'>";
      echo $amount * 113.59;
      echo " JPY</b></h2></center>";
    }            
  }
  ?>
</body>
</html>