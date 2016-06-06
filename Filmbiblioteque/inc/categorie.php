<?php
require 'db.php';

$sql = '
	SELECT cat_id, cat_name 
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

//pour l'insertion ou modification de une categorie

// on fait la du POST
$errorList = array();
// Si le formulaire a été soumis
if (!empty($_GET['catOption'])) {
	// Je récupère tous le get du select	
	$cat = ($_GET['catOption']);
	echo $cat;
	print_r($_POST);
	//si on choisi de crier une nouvelle categorie
	if ($cat == 'insert') {
		if (!empty($_POST['catName'])) {
					
			//on atribue une variable que assume le valeur du post
			$nameCat = ($_POST['catName']);
			//print_r($nameCat) ;			

			//on fait la requete
				$catInsert = '
					INSERT INTO category 
					(cat_id, cat_name, cat_date_creation, cat_date_update) 
					VALUES (NULL, :catName, Now(), NULL)
					';

					//on prepare la requete
					$pdoCategorie = $pdo->prepare($catInsert);

					$pdoCategorie->bindValue(':catName',$nameCat);

					//on execute le insert dans la base de donnés
					$pdoCategorie->execute();
		}
	}
	else{
	if (!empty($_POST['catName'])) {
		//on atribue une variable que assume le valeur du post
		$nameCat = ($_POST['catName']);

		//on fait la requete de update
		$catUpdate = '
				UPDATE category
				SET ( cat_name, cat_date_update) 
				VALUES ( :catName, Now())
				';

			//on prepare la requete
				$pdoUpdate = $pdo->prepare($catUpdate);

				$pdoUpdate->bindValue(':catName',$nameCat);

				//on execute le insert dans la base de donnés
				$pdoUpdate->execute();
	}

	
} 
}
else {
		$errorList[] = 'vous avais pas fait une option';
	}





require 'categorieview.php';