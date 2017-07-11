<!doctype html>
<html>
<head>
  <title><?=(isset($this->title)) ? $this->title : 'MVC';  ?></title>
  <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css" />
  <link rel="stylesheet" href="<?php echo URL; ?>public/css/jquery-ui.css" />
<!--  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>-->
  
  <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-1.12.0.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-ui.min.js"></script>
    
  <script>
   $(function() {
     $("#test2").datepicker();
   });    
  </script>
  <?php
    if (isset($this->js)){
        foreach ($this->js as $js){
           echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
        }
    }
  ?>
</head>
<body>
  <input id="test2"/>
  
  <?php Session::init(); ?>
<div id="header">
  <?php if (Session::get('loggedIn') == false):?>  
    <a href="<?php echo URL; ?>index.php" >Index</a>
    <a href="<?php echo URL; ?>help" >Help</a>
  <?php endif; ?>  
  <?php if (Session::get('loggedIn') == true):?>
    <a href="<?php echo URL; ?>dashboard">Panel de Control</a>
    <a href="<?php echo URL; ?>note">Notas</a>
    
    <?php if (Session::get('role') == 'owner'):?>
      <a href="<?php echo URL; ?>user">Usuarios</a>
    <?php endif ?>
      
    <a href="<?php echo URL; ?>dashboard/logout">Logout</a>
  <?php else: ?>  
    <a href="<?php echo URL; ?>login" >Login</a>
  <?php endif ?>

</div>
<div id="content">