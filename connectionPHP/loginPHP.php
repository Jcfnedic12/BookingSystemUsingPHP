<?php
// include_once 'phpconnect.php';
// session_start();
// if (isset($_POST['submit'])) {
//   if($_POST['username'] != ""){
//     $username = $_POST['username'];
    
//   }else{
//     echo "Username field is empty";
//   }
//   if($_POST['password'] != ""){
//     $password = $_POST['password'];
//   }else{
//     echo " Password field is empty";
//     return;
//   }

//   $sessionUsername = $username;
//   $sessionPassword = $password;

  
//   $sql = "SELECT * FROM users where user_first='".$sessionUsername."'and user_pwd='".$sessionPassword."';";

//   $result = mysqli_query($dbconnect, $sql);
//   $resultCheck = mysqli_num_rows($result);
//   if($resultCheck !=0){
//     $_SESSION['username'] = $username;
//   $_SESSION['password'] = $password;

//   header("Location:../Homepage.php?signup=success");
//   }else{
//     $_SESSION['username'] = $username;
//    header("Location:../index.php?signup=unsuccessful");
//   }
// }



if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  if (empty($username) || empty($password)) {
   header("Location:../loginINDEX.php?login=emptyFields");
  }else if (preg_match("/[@.]/", $username)) {
      if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
        include_once "phpconnect.php";
        $emailcheck = $dbconnect->prepare("SELECT * from users WHERE user_email=?;");
        $emailcheck->bind_param("s", $username);
        $emailcheck->execute();
        $emailResult = $emailcheck->get_result()->fetch_assoc();
        $emailpass = $emailResult['user_pwd'];
        if($dbconnect->affected_rows != 1){
          header("Location:../loginINDEX.php?login=emailError");
        exit();
        }else{
          if (password_verify($password, $emailpass)==1) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['userID'] = $emailResult['user_id'];
            echo "login successful";
          }else{
            $emailAdd = $emailResult['user_email'];
            header("Location:../loginINDEX.php?login=wrongPass&email=$emailAdd");
            exit();
          }
        }
       
      }else{
        header("Location:../loginINDEX.php?login=emailError");
        exit();
      }
  }else{
    include_once("phpconnect.php");
    $usernamechecker = $dbconnect->prepare("SELECT * from users where user_first =?");
    $usernamechecker->bind_param("s",$username);
    $usernamechecker->execute();
    $usernameResult= $usernamechecker->get_result()->fetch_assoc();

    $passwordchecker = $usernameResult['user_pwd'];
      
    if (!password_verify($password,$passwordchecker)==1) {
      header("Location:../loginINDEX.php?login=wrongPass&username=$username");
      exit();
    }else {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['userID'] = $usernameResult['user_id'];
        // $_SESSION['first'] = $usernameResult['user_first'];
        // $_SESSION['last'] = $usernameResult['user_last'];
        // $_SESSION['email'] = $usernameResult['user_email'];
        // $_SESSION['UID'] = $usernameResult['user_uid'];
      // header("Location:../UserProfileINDEX.php");
      
      header("Location:../testing.php?firstLoop=looping");
    }

    // eto ung pang username nmn. INSERT THE CODE HERE

  }
}else{
  header("Location:../loginINDEX.php");
  exit();
}

