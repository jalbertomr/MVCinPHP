<?php

class Model {

   function __construct(){
     //echo 'mvc/libs/Model.php Model construct <br />';
     try{
       $this->db = new Database(DB_TYPE,DB_HOST, DB_NAME, DB_USER, DB_PASS);	
     } catch (PDOException $e) {
         echo 'Error: Model new Database connection: '. $e->getMessage();
     }
   }	
}

?>