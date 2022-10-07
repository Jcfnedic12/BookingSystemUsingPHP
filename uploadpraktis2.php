<?php

if (isset($_POST['submit'])) {
  $file = $_FILES['file'];

$file_name = $file['name'];
$file_tmp_name = $file['tmp_name'];
$file_size = $file['size'];
$file_error = $file['error'];

if ($file_error === 0) {
  if ($file_size <=20000000) {
    $fileexplode = explode(".",$file_name);
    $file_extension = strtolower(end($fileexplode));
    $filetypArr = array('jpg', 'jpeg','png');
    if (in_array($file_extension,$filetypArr)) {  
      $filenewName = uniqid('',true).".".$file_extension;
      $fileDestination = "uploads/".$filenewName;

      move_uploaded_file($file_tmp_name, $fileDestination);
    }else{
      echo "file should be image.";
    }
  }else{
    echo "file must be 20Mb or less.";
  }
}else{
  echo "file upload error, please try again.";
}

}else{
  header("Location:uploadfileARAL.php");
}
