<?php
require '../config.php';
require '../libs/Form.php';
require '../libs/Database.php';

if (isset($_REQUEST['run'])){
    try{
        
      $form = new Form();

      $form->post('name');
//      $form->val('minlength', 2);
      $form->post('age');
//      $form->val('digit');
      $form->post('gender');
      $form->post('fileExist');
      $form->val('exist');
      
      $form->submit();
      
      echo 'The form passed!';
      $data = $form->fetch();
      echo '<pre>';
      print_r($data);
      echo '</pre>';
      
      $db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
      $db->insert('person', $data);
      
    } catch (Exception $e){
        echo $e->getMessage();
    }
}
?>

<form method="post" action="?run">
    Name<input type="text" name="name" />
    Age<input type="text" name="age" />
    Gender<select name="gender">
        <option value="m">Male</option>
        <option value="f">Female</option>
    </select>
    <br/>
    FileExist<input type="text" name="fileExist" />
    
    <input type="submit" />
</form>