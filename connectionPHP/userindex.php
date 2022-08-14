<?php
session_start();

if(empty($_SESSION['username'])){
  header("Location:../testing.php?session=empty");
  // echo $_SESSION['username'];
  exit();

}else{
  include_once "phpconnect.php";
  $usernameProfile = $_SESSION['username'];
  $userID = $_SESSION['userID'];

  $getprofile = $dbconnect->prepare("SELECT * from users where user_id =?;"); 
  $getprofile->bind_param("d",$userID);
  $getprofile->execute();
  $getprofileResult= $getprofile->get_result()->fetch_assoc();
  if($dbconnect->affected_rows == 0){
    header("Location:../testing.php?connection=empty");
    exit();
    
  }else{
    $userFirst = $getprofileResult['user_first'];
    $userLast = $getprofileResult['user_last'];
    $userEmail = $getprofileResult['user_email'];
    $userUID = $getprofileResult['user_uid'];
    
  
    header("Location:../testing.php?xfirst=$userFirst&xlast=$userLast&xmail=$userEmail&xuid=$userUID");
    
  }
}

?>
