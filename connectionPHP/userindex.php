<?php
session_start();

if(empty($_SESSION['username'])){
  header("Location:userProfileINDEX.php?session=empty");
  // echo $_SESSION['username'];
  exit();

}else{
  include_once "phpconnect.php";
  $usernameProfile = $_SESSION['username'];
  $useruniqid = $_SESSION['uniqid'];

  $getprofile = $dbconnect->prepare("SELECT * from usermaindata where userdataacross =?;");   
  $getprofile->bind_param("s",$useruniqid);
  $getprofile->execute();
  $getprofileResult= $getprofile->get_result()->fetch_assoc();
  if($dbconnect->affected_rows == 0){
    header("Location:userProfileINDEX.php?connection=empty");
    exit();
    
  }else{
    session_start();
    $_SESSION['first'] = $getprofileResult['userfirstname'];
    $_SESSION['last']  = $getprofileResult['userlastname'];
    $_SESSION['email']  = $getprofileResult['useremail'];
    $_SESSION['UID']  = $getprofileResult['userdataacross'];
    
    $userFirst = $_SESSION['first'];
    $userLast = $_SESSION['last'];
    $userEmail = $_SESSION['email'];
    $userUID = $_SESSION['UID'];
  
    header("Location:userProfileINDEX.php?xfirst=$userFirst&xlast=$userLast&xmail=$userEmail&xuid=$userUID");
    
  }
}

?>
