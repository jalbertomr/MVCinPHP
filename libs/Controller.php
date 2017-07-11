<?php

class Controller {

   function __construct() {
		$this->view = new View();
  	}	
  
   public function loadModel($name, $modelPath = 'models/') {
     
     $path = $modelPath . $name .'_model.php';
     //echo("<script>console.log('PHP: Controller.loadModel ".$path."');</script>");//debug
     
     if (file_exists($path)) {
       require $modelPath . $name . '_model.php';
       
       $modelName = $name.'_Model';
       //echo 'controller loadModel require: ' . $modelPath . $name . '_model.php ' . $modelName; 
       $conData = 'controller loadModel require: ' . $modelPath . $name . '_model.php ' . $modelName;
       //echo("<script>console.log('PHP: ".$conData."');</script>");
       
       $this->model = new $modelName();		
     } 	
   }  
}

?>