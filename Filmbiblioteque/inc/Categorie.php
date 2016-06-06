<?php
require 'db.php';

$sql = '
	SELECT cat_name 
	FROM category
';

$pdoStatement = $pdo->query($sql);

// Si erreur
if ($pdoStatement == false) {
	print_r($pdo->errorInfo());
}
else if ($pdoStatement->rowCount() > 0) {
	$categorieList = $pdoStatement->fetchAll();
	//print_r($categorieList);
}

//pour l'insertion de nouveaux categorie
$catInsert = '
	INSERT INTO `category` 
	(cat_id, cat_name, cat_date_creation, cat_date_update) 
	VALUES (NULL, :catName, Now(), NULL)
	';

require 'categorieview.php';