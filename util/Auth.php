<?php

class Auth
{
   public static function handleLogin()
   {
      @session_start();
      if ( @defined($_SESSION['loggedIn']) == false and
         (@$_SESSION['loggedIn'] == false) 
         ){
        Session::destroy();
        header('Location:/mvc/login');
        exit;
      }
   }
    
}
?>