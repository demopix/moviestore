<?php

//je me conect à la base de données
$dsn = 'mysql:host=192.168.210.84;dbname=afdg_sql1;charset=utf8';

try{
	$pdo = new PDO($dsn, 'afdg', 'webforce3');
}
catch(Exception $error){
	echo 'error';
	exit;
}
