<?php
session_start();

if($_SESSION['username']!=0){
  echo $_SESSION['username'];
  echo $_SESSION['password'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>homepage</title>
</head>
<body>
  <div>
    <form method="POST">
      <button name="logout" value="logout">logout</button>
    </form>
    <?php
    if(isset($_POST['logout'])){
      session_destroy();
     
      if(empty($_SESSION['username'])){
        echo $_SESSION['username'].'<br> '.$_SESSION['password'];
      }else{
        echo "you've been logged out";
        header("Location:index.php");
      }
      
    }

    ?>
  </div>
</body>
</html>