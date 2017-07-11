<h1>Nota</h1>

<form method="post" action="<?php echo URL; ?>note/create">
    <label>titulo</label><input type="text" name="title" /><br />
    <label>content</label><textarea name="content"></textarea><br />
    <label>&nbsp;</label><input type="submit" />
</form>
<table>
<?php
echo '<hr/>';
  foreach ( $this->noteList as $key => $value){
      echo '<tr>';
      echo '<td>' . $value['title'] . '</td>';
      echo '<td>' . $value['date_added'] . '</td>';
      echo '<td>' . $value['content'] . '</td>';
      echo '<td><a href="'. URL . 'note/edit/'. $value['noteid'].'">Editar</a></td>';
      echo '<td><a class="delete" href="'. URL . 'note/delete/'. $value['noteid'].'">Borrar</a></td>';
      echo '</tr>';        
  }
?>
</table>

<script>
  $(function() {
  $('.delete').click( function(e){
     var c = confirm("Esta seguro de borrar la nota?");
      if (c == false) return false;
  });
  
});  
</script>
