<?php

class Val
{
   public function __construct() {
       
   }   
   
   public function minlength($data, $arg)
   {
       if(strlen($data) < $arg){
           return "El texto minimo puede tener $arg caracteres";
       }
   }
   
   public function maxlength($data, $arg)
   {
       if(strlen($data) > $arg){
           return "El texto máximo puede tener $arg caracteres";
       }
   }
   
   public function digit($data)
   {
       if (ctype_digit($data) == false){
           return "El texto debe ser númerico";
       }
           
   }
   
   public function exist($data){
       if(file_exists($data) == false){
           return "el archivo $data no existe";
       }
   }
   
   public function __call($name, $arguments)
   {
      throw new Exception("$name no existe dentro de:" . __CLASS__);  
   }
}

?>