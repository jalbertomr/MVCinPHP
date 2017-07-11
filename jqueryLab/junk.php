archivo junk.php...
<?php 

if (isset($_REQUEST['age'])){
	echo 'age was requested';
}
echo 1;

?>

<div id="test">
TEST
</div>

<div id="other">
OTHER
<?php echo 'php interpretado en OTHER<br/>'; ?>
metiendo un boton <input type="submit" id="button" />
</div>