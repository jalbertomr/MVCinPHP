<?php

//include("mysqli.class.php");

//$config = array();
//$config['host']     = 'localhost';
//$config['database'] = 'publications';
//$config['user']     = 'Beto';
//$config['password'] = 'betopass';

//$DB = new DB($config);

//$DB->Query('SELECT * FROM pages');
//echo json_encode($DB->Get());

require '../libs/Database.php';

require '../config/paths.php';
require '../config/database.php';

$db = new Database();
//$sth = $db->prepare("SELECT id FROM user WHERE
//             login = :login AND 
//             password = MD5(:password)");
//$sth->execute( array(
//      ':login' => 'jesse',
//      ':password' => MD5('jesse')
//      ));
$sth = $db->prepare("SELECT * FROM cats");
$sth->execute();
$data = $sth->fetchAll();
//echo print_r($data);

echo json_encode($data);
?>

