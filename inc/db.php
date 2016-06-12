<?php

//je me conect a la base de donnes
$dsn = 'mysql:host=localhost;dbname=afdg_sql1;charset=utf8';

//on teste si la connexion funcione avec un try
try{
	$pdo = new PDO($dsn, 'root', 'root'); //on appelle le dsn, et indique le user et la password correspondent
}
catch(Exception $error){ //si la conexion marche pas on auras un erreur
	echo 'error';
	exit;
}
