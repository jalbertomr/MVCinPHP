<?php

class Note extends Controller {

  public function __construct() {
  	  parent::__construct();
  	  Auth::handleLogin();
  }

  public function index() {
     $this->view->title = 'Nota';      
     $this->view->noteList = $this->model->noteList();
     $this->view->render('header');
     $this->view->render('note/index');
     $this->view->render('footer');
  }
  
  public function create(){
    $data = array(
      'title' => $_POST['title'],
      'content' => $_POST['content']
    );    
    // @TODO: Do your error checking;
    $this->model->create($data);
    header('location:' . URL . 'note');
  }
  
  public function edit($id){
    //fetch individual user
    $this->view->note = $this->model->noteSingleList($id);
    if(empty($this->view->note)){
        die("Esta es una nota invalida");
    }    
    
    $this->view->title = 'Editar Nota';
    
    $this->view->render('header');
    $this->view->render('note/edit');
    $this->view->render('footer');
  }
  
  public function editSave($noteid){
    $data = array(
      'noteid' => $noteid,
      'title' => $_POST['title'],
      'content' => $_POST['content']
    );    
  
    // @TODO: Do your error checking;
    $this->model->editSave($data);
    header('location:' . URL . 'note');
  }
  
  public function delete($id){
    $this->model->delete($id);
    header('location:' . URL . 'note');  
  }
  
}
?>