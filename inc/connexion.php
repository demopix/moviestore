<?php 

$dsn = 'mysql:host=192.168.210.84;dbname=afdg_sql1;charset=utf8';

try {
	$pdo = new PDO($dsn, 'afdg', 'webforce3');
}
catch(Exception $e) {
	//emailAlerte($e->getMessage());
	echo 'connexion impossible';
	exit;
}

?>
