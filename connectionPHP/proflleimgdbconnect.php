<?php

$profileconnect = new mysqli('localhost','root','','logindani');

if ($profileconnect->connect_errno != 0) {
  echo " Failed to connect to MySQL:". $profileconnect->connect_errno;
  exit();
}