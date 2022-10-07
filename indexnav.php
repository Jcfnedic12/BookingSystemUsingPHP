<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="jsfiles/navbar.js" defer></script>
 
  <title>Document</title>
</head>
<body class="userprofilebody">
<div class="sidebar">
      <div class="userimg">

         <?php 
         include_once "connectionPHP/proflleimgdbconnect.php";
         $navprof = $profileconnect->prepare("SELECT * FROM userprofiledata where dataacross = ?");
         $navprof->bind_param("s",$_SESSION["UID"]);
         $navprof->execute();
         $navResult = $navprof->get_result()->fetch_assoc();

         if ($navResult['status']== "false") {
          echo '<img src="uploads/defaultuserprofilepic.jpg" alt="profile picture" class="profileimage">
          <h2 class="profilenamecontainer visib">';
         }else{
          $navpathjpg = "uploads/".$_SESSION['UID'].".jpg";
          $navpathpng = "uploads/".$_SESSION['UID'].".png";
          $navpathjpeg = "uploads/".$_SESSION['UID'].".jpeg";
          if (file_exists($navpathjpg)||file_exists($navpathpng)||file_exists($navpathpjpeg)) {
              echo '<img src="'.$navpathjpg.'" alt="profile picture" class="profileimage">
              <h2 class="profilenamecontainer visib">';
          }else{
           echo $navpath;
          }
         }
        if (!empty($_SESSION['username'])) {
          echo $_SESSION['firstname']." ".$_SESSION['lastname'];
        }else{
          echo "USername container";
        }
        ?></h2>
        
      </div>
      <div class="useroptions">
          <ul>
            <li class="optionlist navselection setbooking"><a href="" class="listhref"> <i class="fas fa-calendar-plus fa-2x"></i> <p class="hrefpara">Book reservation</p></a></li>
            <li class="optionlist navselection chckbooking"> <a href="" class="listhref"><i class="fas fa-calendar-check fa-2x"></i> <p class="hrefpara">Check Reservation</p></a></li>
            <li class="optionlist navselection delbooking"> <a href="" class="listhref"><i class="fas fa-calendar-xmark fa-2x"></i><p class="hrefpara">Delete Reservation</p></a></li>
          </ul>
      </div>
      <div class="userlogout">
        <form action="connectionPHP/logout.php" method="POST">
          <button type="submit" name="logut" class="btncontainer"><i class="fas fa-right-to-bracket" id="logoutlogo"></i> <p class="visible">Sign-out</p></button>
        </form>
      </div>
    </div>
</body>
</html>