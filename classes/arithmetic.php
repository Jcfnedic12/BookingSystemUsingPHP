<?php
class math{
  protected $num1;
  protected $num2;
  protected $arith;
    public function __construct($number1, $number2, $arithmetic){
      $this->num1 = $number1;
      $this->num2 = $number2;
      $this->arith = $arithmetic;
    }

    public function arithcheck(){
      if ($this->arith == "add") {
       echo $this->addmath();
      }else if ($this->arith == "subtract") {
         echo $this->submath();
      }else if ($this->arith == "divide"){
        echo  $this->divmath();
      }else if ($this->arith == "multiply"){
        echo $this->multimath();

      }else{
        echo "invalid input";
        echo $this->arith;
      }
    }

    private function addmath(){
      return $this->num1 + $this->num2;
    }
    private function submath(){
      return $this->num1 - $this->num2;
    }
    private function divmath(){
      return $this->num1 / $this->num2;
    }
    private function multimath(){
      return $this->num1 * $this->num2;
    }
}