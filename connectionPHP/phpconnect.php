<?php



$dbconnect = new mysqli('localhost','root','','logindani');
if ($dbconnect -> connect_errno !=0) {
  echo "Failed to connect to MySQL: " . $dbconnect -> connect_error;
  exit();
}