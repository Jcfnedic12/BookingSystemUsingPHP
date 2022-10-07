<?php
spl_autoload_register('autoloader');

function autoloader($class){
  $path = "classes/".$class.".php";

  if(!file_exists($path)){
    return false;
  }
  include_once $path;
}