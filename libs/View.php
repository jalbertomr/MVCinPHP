<?php

class View {

   public $msg = ''; 
    
   function __construct(){
      //echo 'mvc/libs/View.php View construct <br />';	
   }
   
   public function render($name, $noInclude = false){
        require 'views/'. $name . '.php';
   }
}
?>