<?php

class dashboard extends Controller {

  function __construct() {
  	  parent::__construct();
          Auth::handleLogin();          
          $this->view->js = array('dashboard/js/default.js');
  }

  function index() {
     $this->view->title = 'Panel de Control';
     $this->view->render('header');	
     $this->view->render('dashboard/index');	
     $this->view->render('footer');	
  }
  
  function logout() {
    Session::destroy();
    header('location: '. URL . 'login');	
    exit;
  }
  
  function xhrInsert() {
    $this->model->xhrInsert();   
  }
  
  function xhrGetListing(){
    $this->model->xhrGetListing();
  }
  
  function xhrDeleteListing(){
    $this->model->xhrDeleteListing();  
  }
}
?>