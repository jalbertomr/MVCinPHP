<?php

class login extends Controller {

  function __construct() {
  	  parent::__construct();
  }

  function index() {
     $this->view->title = 'Login';    
     $this->view->render('header');
     $this->view->render('login/index');	
     $this->view->render('footer');
  }
  
  function run() {
  	  if ($this->model->run() == true ){
            header('Location:../dashboard');
          } else {
            $this->_error();  
          }
  }

  private function _error() {
     $this->view->title = 'Login Error';
     $this->view->msg = $this->model->msg;
     $this->view->render('header');
     $this->view->render('error/index');	
     $this->view->render('footer');
     exit;
  }
  
}
?>