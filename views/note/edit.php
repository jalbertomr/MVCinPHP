<h1>Nota: Editar</h1>

<form method="post" action="<?php echo URL; ?>note/editSave/<?php echo $this->note[0]['noteid']; ?>">
    <label>Titulo</label><input type="text" name="title" value="<?php echo $this->note[0]['title']; ?>"/><br />
    <label>Contenido</label><textarea name="content"><?php echo $this->note[0]['content'];?></textarea><br />
    <label>&nbsp;</label><input type="submit" />
</form>
