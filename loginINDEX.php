
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> 
  <link rel="stylesheet" href="style/login_index.css">
  
  <title>Login</title>
</head>
<body>
  <div class="formcontainer" >
    <navbar class="navig">
      <a href="#" class="navlink">Home <span><i class="fas fa-angle-right" id="icon"></i></span></a>
      
    </navbar>
  <form action="connectionPHP/loginPHP.php" method="post" class="formPart" >
      <?php
        if(isset($_GET['email'])){
          echo '<input type="text" placeholder="Username/Email" name="username" value ="'.$_GET['email'].'" class="input userField">';

        }else if (isset($_GET['username'])){
          echo '<input type="text" placeholder="Username/Email" name="username" value ="'.$_GET['username'].'" class="input userField">';
        }else{
          echo '<input type="text" placeholder="Username/Email" name="username"  class="input userField">';
        }
      ?>
      
      <input type="password" placeholder="Password" name="password" class="input userField">
      
      <?php
      if(isset($_GET['login'])){
        $loginChecker = $_GET['login'];

        if ($loginChecker == "emptyFields") {
          echo ' <p class="errortext">Fill all fields</p>';
        }else if ($loginChecker == "wrongPass"){
          echo ' <p class="errortext">Wrong password</p>';
        }else if ($loginChecker == "emailError"){
          echo ' <p class="errortext">No user found</p>';
        }else{
          echo ' <p class="errortext bluemsge" >Login success</p>';
        }
      }else{
        echo ' <p class="errortext"></p>';
      }
      ?>
      <div class="btnandlinkcontainer">
      <button type="submit" name="submit" class="input loginbtn">Let's Go</button>
      <a href="signupINDEX.php" class="signuplink">Sign up here</a>
      <a href="#" class="forgotpasslink">Forgot password</a>
      </div>
    </form>

    <div class="headingContainer">
      <div class="border"></div>
      <h1 class="headingText">Be Refreshed <span class="textspan">With us.</span> </h1>
    </div>
  </div>
 

</body>
</html>