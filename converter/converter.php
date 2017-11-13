<!DOCTYPE html>
<html>
  <head>
    <title>Currency Converter</title>
  </head>
<body bgcolor="black" style="color: white;">
  <form method="post" action="converter.php" align="center">

    <b>Enter Amount: </b>
    <input type="text" name="amount" size="12" placeholder="Enter amount">&nbsp;

    <b>From: </b>&nbsp;
    <select name="from">
      <option>USD</option>
    </select>&nbsp;
    <b>To: </b>&nbsp;
    <select name="to">
      <option>CAD</option>      
      <option>GBP</option>
      <option>EURO</option>
      <option>JPY</option>
    </select>&nbsp;    
    <input type="submit" name="convert" value="Convert Now">       
  </form>
  <hr>
  <?php

  if(isset($_POST['convert'])){
    $amount = $_POST['amount'];
    $from = $_POST['from'];
    $to = $_POST['to'];

    if($from=='USD' AND $to=='CAD'){
      echo "<center><h2>&dollar; <b style='color:red;'>";
      echo $amount * 1.27;
      echo " CAD</b></h2></center>"
    }
    if($from=='USD' AND $to=='GBP'){
      echo "<center><h2>&pound; <b style='color:red;'>";
      echo $amount * .76;
      echo " GBP</b></h2></center>"
    }
    if($from=='USD' AND $to=='EURO'){
      echo "<center><h2>&euro; <b style='color:red;'>";
      echo $amount * .86;
      echo " EURO</b></h2></center>"
    }
    if($from=='USD' AND $to=='JPY'){
      echo "<center><h2>&yen; <b style='color:red;'>";
      echo $amount * 113.59;
      echo " JPY</b></h2></center>"
    }            
  }
  ?>
</body>
</html>