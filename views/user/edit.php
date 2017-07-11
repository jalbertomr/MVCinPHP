<h1>Usuario: Editar</h1>

<?php
print_r($this->user);
?>

<form method="post" action="<?php echo URL; ?>user/editSave/<?php echo $this->user[0]['userid']; ?>">
    <label>login</label><input type="text" name="login" value="<?php echo $this->user[0]['login']; ?>"/><br />
    <label>password</label><input type="text" name="password" /><br />
    <label>role</label>
    <select name="role">
        <option value="default" <?php if($this->user[0]['role'] == 'default') echo 'selected'; ?>>Default</option>
        <option value="admin" <?php if($this->user[0]['role'] == 'admin') echo 'selected'; ?>>Admin</option>
        <option value="owner" <?php if($this->user[0]['role'] == 'owner') echo 'selected'; ?>>Owner</option>
    </select><br />
    <label>&nbsp;</label><input type="submit" />
        
</form>
