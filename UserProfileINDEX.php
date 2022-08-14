

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>USerProfile</title>
</head>
<body>
  <?php
  
  session_start();
  
  if (!empty($_SESSION['first'])) {
    if(isset($_SESSION['first'])){
      echo "<div> <h1>Firstname: ".$_SESSION['first']."</h1></div>";
    }else{
      echo "<div> <h1>Firstname not found</h1></div>";
    }
    if(isset($_SESSION['last'])){
      echo "<div> <h1>Lastname: ".$_SESSION['last']."</h1></div>";
    }else{
      echo "<div> <h1>Lastname not found</h1></div>";
    }
    if(isset($_SESSION['email'])){
      echo "<div> <h1>Email: ".$_SESSION['email']."</h1></div>";
    }else{
      echo "<div> <h1>Email not found</h1></div>";
    }
    if(isset($_SESSION['UID'])){
      echo "<div> <h1>User ID: ".$_SESSION['UID']."</h1></div>";
    }else{
      echo "<div> <h1>User ID not found</h1></div>";
    }
  }else{
    header("Location:loginINDEX.php");
  }
  ?>
</body>
</html>