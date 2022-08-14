
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

  if(isset($_GET['firstLoop'])){  
    include_once "connectionPHP/userindex.php";
  }
  
  
  
  if(isset($_GET['xfirst'])){
    echo "<div> <h1>Firstname: ".$_GET['xfirst']."</h1></div>";
  }else{
    echo "<div> <h1>Firstname not found</h1></div>";
  }
  if(isset($_GET['xlast'])){
    echo "<div> <h1>Lastname: ".$_GET['xlast']."</h1></div>";
  }else{
    echo "<div> <h1>Lastname not found</h1></div>";
  }
  if(isset($_GET['xmail'])){
    echo "<div> <h1>Email: ".$_GET['xmail']."</h1></div>";
  }else{
    echo "<div> <h1>Email not found</h1></div>";
  }
  if(isset($_GET['xuid'])){
    echo "<div> <h1>User ID: ".$_GET['xuid']."</h1></div>";
  }else{
    echo "<div> <h1>User ID not found</h1></div>";
  }

  ?>
</body>
</html>