<?php

class test1{
 

  public function setName($nume){
    

   
      if ($nume==2||$nume==3||$nume==5 ) {   
        echo $nume."  is a prime number<br>";
      }
      else if($nume%2==0 || $nume%3==0 ||$nume%5==0 ){
        echo $nume."  is not a prime number<br>";
        
      }else{
        echo $nume."  is a prime number<br>";
        
      }
    }


    
 
}