
   <?php
   include_once 'connectionPHP/loginPHP.php';
   

   ?>
  


<!DOCTYPE html>
<html lang="en">
<head></head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="resourceFolder/index.css">
</head>
<body>
  <div class="container">
    <form method="POST" action="connectionPHP/loginPHP.php">
        <input type="text" placeholder="Enter Username" name="username">
        <input type="password" placeholder="Enter Password" name="password">
        <button type="submit" name="submit" value="submit">Log-in</button>
      
    </form>
    
  </div>


  <?php
    echo "the username is" .$_SESSION['username']. "and the password is". $_SESSION['password'];
   

    ?>

    <div class="links">
      <a href="Homepage.php">homepage</a>
    </div>

    <div class="testinglngsadatabase">
      <?php
     if (empty($_SESSION['username'])){
      return;
     }else{

       echo "<br>". $_SESSION['username']." unable to found in database";
     }

      ?>
    </div>
</body>

</html>



