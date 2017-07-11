<?php

//siempre poner un (/) despues del path
define('URL', 'http://localhost/mvc/');
define('LIBS', 'libs/');

//database.php 

define('DB_TYPE', 'mysql');
define('DB_HOST','localhost');
define('DB_NAME','mvc');
define('DB_USER','Beto');
define('DB_PASS','betopass');

//la hashkey del sitio, no debe cambiarse ya que con ella se generan los passwords
// para uso general ...
define('HASH_KEY','$qualquiercosa10202');
//es solo para la table de password
define('HASH_PASSWORD_KEY','$LaFuerzaEstaEnTodosLados12345');

?>