<?php
spl_autoload_register('loadclash');

function loadclash($class){

  $path = "classes/".$class.".php";

  include_once($path);
  if (!file_exists($path)) {
    return false;
  }
}