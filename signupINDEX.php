<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="jsfiles/signupINDEX.js" defer></script>
  <link rel="stylesheet" href="style/signup_index.css">
  <title>Signup</title>
</head>
<body>  
  <div class="formcontainer">
    <h1 class="formheader">Feel the relaxation with <span class="formheaderspan">us</span></h1>
    <form action="connectionPHP/signupphp.php" method="post" class="formSignup">
    <?php
      if(isset($_GET['first'])){
        echo '<input type="text" placeholder="Enter Firstname" name="firstname" class="formInputs" value="'.$_GET['first'].'">';
      }else{
        echo '<input type="text" placeholder="Enter Firstname" name="firstname" class="formInputs">';
      }

      if(isset($_GET['last'])){
        echo '<input type="text" placeholder="Enter Lastname" name="lastname" class="formInputs" value="'.$_GET['last'].'">';
      }else{
        echo '<input type="text" placeholder="Enter Lastname" name="lastname" class="formInputs">';
      }
  ?>
      <input type="email" placeholder="Enter Email" name="email" class="formInputs ">
      <?php
        if(isset($_GET['username'])){
          echo '<input type="text" placeholder="Enter Username" name="username" class="formInputs" value="'.$_GET['username'].'">';
        }else{
          echo '<input type="text" placeholder="Enter Username" name="username" class="formInputs">';
        }
      ?>
      
      <input type="password" placeholder="Enter Password" name="password" class="formInputs ">
      <div class="checkcontainer">
      <div class="checkboxdiv">
      <input type="radio" placeholder="Admin" name="usertype" value="admin">Admin
      </div>
      <div class="checkboxdiv">
      <input type="radio" placeholder="user" name="usertype" value="user">User
      </div>
      </div>
      
      <?php
        if (isset($_GET['signup'])) {
          $singup=$_GET['signup'];
          if($singup == "empty"){
            echo '<p class="formMsge"> please fillout empty fields </p>';
          }else if($singup == 'charInvalid'){
            echo '<p class="formMsge">please input a valid name</p>';
          }else if($singup == 'userExist'){
            echo '<p class="formMsge">User has already registered</p>';
          }else if($singup == 'emailExist'){
            echo '<p class="formMsge">Email taken</p>';
          }else if($singup == 'usernameTaken'){
            echo '<p class="formMsge">Username taken</p>';
          }else if($singup == 'success'){
            echo '<p class="formMsge bluemsge">Sign-up successful</p>';
          }
        }else{
          echo '<p class="formMsge"></p>';
        }
      ?>
      <div class="btnlinkcontainer">
        <button name="submit" value="submit" class="formInputs btn">I'm in</button>
        <a href="loginINDEX.php" class="loginlink">have an account? sign in here</a>
      </div>
    </form>
  </div>

  

</body>
</html>