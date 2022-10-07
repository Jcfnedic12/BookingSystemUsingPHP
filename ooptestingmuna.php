<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="classes/queryDB.php" method="POST">
    <input type="number" name="num1" id="num1" placeholder="Enter first number">
    <select name="arithmetic" id="arithmetic">
      <option value="add">+</option>
      <option value="subtract">-</option>
      <option value="divide">/</option>
      <option value="multiply">*</option>
    </select>
    <input type="number" name="num2" id="num2" placeholder="Enter second number">
    <button name="submit" value="Submit">Check Result</button>
  </form>
  


</body>
</html>