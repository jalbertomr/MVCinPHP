<?php

class Error extends Controller {
   
  function __construct() {
     parent::__construct();
  }	
   
  function index() {
      $this->view->title = '404 Error';
      //$this->view->msg = 'Esta direccion no existe';

      $this->view->render('error/inc/header');
      $this->view->render('error/index');  	
      $this->view->render('error/inc/footer');
  }

}

?>
