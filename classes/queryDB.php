<?php
include_once 'arithmetic.php';
if (isset($_POST['submit'])) {
  $number1 = $_POST['num1'];
  $number2 = $_POST['num2'];
  $arithmetic = $_POST['arithmetic'];

  $math = new math($number1, $number2, $arithmetic);

  $math->arithcheck();

}