<?php

class Index extends Controller {

  function __construct() {
  	  parent::__construct();
  }

  function index() {
     $this->view->title = 'Home';      
     //echo Hash::create('MD5','jesse', HASH_PASSWORD_KEY);
     //echo Hash::create('sha256','jesse', HASH_PASSWORD_KEY);
     $this->view->render('header');  	     
     $this->view->render('index/index');  	
     $this->view->render('footer');
  }

}
?>