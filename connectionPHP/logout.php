<?php
if ($_POST['logoout']) {
  session_start();
session_unset();
session_destroy();
header('Location:../loginINDEX.php');
}else{
  header('Location:../loginINDEX.php');
}
