<!DOCTYPE html>
<html>
  <head>
    <title>Calculator</title>
  </head>
<body bgcolor="skyblue">
  <form method="post" action="calculator.php" align="center">

    <b>Value 1:</b>
    <input type="text" name="value1" size="10">

    <b>Value 2:</b>
    <input type="text" name="value2" size="10">

    <b>Select Operator:</b>
    <select name="operator">
      <option>+</option>
      <option>-</option>
      <option>*</option>
      <option>/</option>
    </select>
    <input type="submit" name="cal" value="Calculate">       
  </form>
  <hr>
</body>
</html>