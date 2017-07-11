<h1>Usuario</h1>

<form method="post" action="<?php echo URL; ?>user/create">
    <label>login</label><input type="text" name="login" /><br />
    <label>password</label><input type="text" name="password" /><br />
    <label>role</label>
    <select name="role">
        <option value="default">Default</option>
        <option value="admin">Admin</option>
        <optino value="owner">Owner</option>
    </select><br />
    <label>&nbsp;</label><input type="submit" />
</form>
<table>
<?php
  foreach ( $this->userList as $key => $value){
      echo '<tr>';
      echo '<td>' . $value['userid'] . '</td>';
      echo '<td>' . $value['login'] . '</td>';
      echo '<td>' . $value['role'] . '</td>';      
      echo '<td>' . '<a href="'.URL.'user/edit/'.$value['userid'].'"> Editar</a> '
              . '    <a href="'.URL.'user/delete/'.$value['userid'].'"> Borrar</a>' . '</td>';
      echo '</tr>';        
  }
  echo '';
?>
</table>