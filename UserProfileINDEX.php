
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> 
  <link rel="stylesheet" href="style/userindex.css">

  <title>UserProfile</title>
</head>
<body>
<div class="bodycontainer">
   
  <div class="userinfogrid">
  <?php 
  include_once"indexnav.php";
   
  if(isset($_GET['firstLoop'])){  
    include_once "connectionPHP/userindex.php";
  }
 
  if (empty($_SESSION['first'])) {
   header("Location:loginINDEX.php");
  }else{

    include_once 'connectionPHP/proflleimgdbconnect.php';

    $checkprofimg = $profileconnect->prepare("SELECT * FROM userprofiledata where dataacross=?");
    $checkprofimg->bind_param("s",$_SESSION['UID']);
    $checkprofimg->execute();

    $profimgcheckedResult = $checkprofimg->get_result()->fetch_assoc();

    if($profileconnect->affected_rows == 0) {
      echo "Error data";
    }else{
      if($profimgcheckedResult['status'] == 'false'){
        echo '<img src="uploads/defaultuserprofilepic.jpg" alt="profile picture" style="width:150px;heigth:150px;border-radius:5%;" class="userprofpic">';
      }else{
        $profpath = "uploads/".$_SESSION['UID'].".jpg";
       
        if (file_exists($profpath)) {   
          echo '<img src="uploads/'.$_SESSION['UID'].'.jpg" alt="profile picture" style="width:150px;heigth:150px;border-radius:5%;" class="userprofpic">';
        }else{
          echo '<img src="uploads/defaultuserprofilepic.jpg" alt="profile picture" style="width:150px;heigth:150px;border-radius:5%;" class="userprofpic">';
        }
        
      }
    }
    if(isset($_GET['xfirst'])){
      echo "<div> <h1 class='firstnameprofile userinfoh1'>Firstname: <span>".ucwords($_SESSION['first'])."</span></h1></div>";
    }else{
      echo "<div> <h1 class='firstnameprofile userinfoh1'>Firstname not found</h1></div>";
   
    }
    if(isset($_GET['xlast'])){
      echo "<div> <h1 class='lastname userinfoh1'>Lastname:<span> ".ucwords($_SESSION['last'])."</span></h1></div>";
     
    }else{
      echo "<div> <h1 class='lastname userinfoh1'>Lastname not found</h1></div>";
    }
    if(isset($_GET['xmail'])){
      echo "<div> <h1 class='emailprofile userinfoh1'>Email: <span>".$_SESSION['email']."</span></h1></div>";
    }else{
      echo "<div> <h1 class='emailprofile userinfoh1'>Email not found</h1></div>";
    }
    if(isset($_GET['xuid'])){
      echo "<div> <h1 class='useridprofile userinfoh1'>User ID: <span>".$_SESSION['UID']."</span></h1></div>";
    }else{
      echo "<div> <h1 class='useridprofile userinfoh1'>User ID not found</h1></div>";
    }
  }
  ?>
  </div>
  <div class="userpanes">
  <div class="iconlayout">
      ddasdsad
    </div>


    <div class="formlayout">
    <div class="userFullInfo">

    <form action="$_POST">
    <?php
      include_once 'connectionPHP/phpconnect.php';


        $userfirstname = $_SESSION['first'];
        $userlasttname = $_SESSION['last'];
        $useremail = $_SESSION['email'];
       

        if(empty($userfirstname)){
          echo '<input type="text" name="userfirstname" id="userfirstname" placeholder="Enter Firstname" class="forminputcss">';
        }else{
          echo '<input type="text" name="userfirstname" id="userfirstname" placeholder="'.$userfirstname.'" class="forminputcss">';
        }
        if(empty($userlasttname)){
          echo '<input type="text" name="userlasttname" id="userlasttname" placeholder="Enter Firstname" class="forminputcss">';
        }else{
          echo '<input type="text" name="userlasttname" id="userlasttname" placeholder="'.$userlasttname.'" class="forminputcss">';
        }
      ?>
      
    </form>
      
    </div>
    <div class="userUploadDelProfile">
        asdsad
    </div>
    <div class="userBooks">
        dsdsadzxcz
    </div>
    </div>
    
  </div>

  </div>
 
</body>
</html>