<?php

if(isset($_POST['submit'])){
  $file = $_FILES['file'];


  $fileName = $_FILES['file']['name'];
  $filetype = $_FILES['file']['type'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileTmp_name = $_FILES['file']['tmp_name'];

  $fileExt=explode('.',$fileName);
  
  $fileExtens = strtolower(end($fileExt));

  $extensionNames = array('jpg', 'jpeg', 'png');
  if (in_array($fileExtens, $extensionNames)) {
    if ($fileError === 0) {
      if ($fileSize <=20000000) {
        $filenewName = uniqid('',true).".". $fileExtens; //gagawa ng unique name sa file na nakadepende sa date-time format para never magkakaron ng same name

        $fileDestination = 'uploads/'.$filenewName; //gagawa ng destination ng file na mauupload
       

        move_uploaded_file($fileTmp_name, $fileDestination);//imomove ung copy ng file papunta sa destination folder, by using the $file temporary location para manavigate ung file then transfer sa destination folder
        echo "file upload successfully";

      }else{
        echo "image file must be 20mb or below";
      }
      
    }else{
      echo "File upload failed, please try again.";

    }
  }else{
    echo "file must be an image format";
  }
}