<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<style type="text/css">
	HTML, BODY{
		font-family: Verdana, Tahoma, sans-serif;
		background-color: grey;
		color:white;
		margin: 0px auto;
	}

	ul li{
		display: inline-block;
		text-decoration: none;
	}

	input{
		height: 90px;
	}

	#bouton{
		height: 90px;
		width: 90px;
	}

	.affichage1, .affichage2,.affichage3,.affichage4 {
		width:200px;
		height:200px;
		border:1px solid red;
		display: inline-block;
		margin-left:35px;
		margin-right:30px;

	}
	.alignement{
		display: inline-block;
	}
	a{
		text-decoration: none;
	}
	p {
		text-align: justify;
		margin-left:10px 10px;
	}



	</style>
</head>
	

<body>
	
	<center>

	<!--Présentation brève du concept-->
	<h1>BIENVENUE SUR MOVIESTORE!</h1>
	<br/>

	<p >

	Bienvenue sur MovieStore! Cette base de données privée permet d'effectuer une recherche rapide de films par titre, catégorie, synopsis, ou bien encore nom de fichier.<br/>
	Une recherche rapide optionnelle peut être effectuée selon la description longue ou les acteurs/actrices.
	Une recherche avancée peut être également effectuée selon le titre, la catégorie, l'acteur/actrice, le support de stockage ou encore la date d'ajout à la base de donnée.<br/>
	A tout moment, vous pouvez cliquer sur l'onglet <strong>Catégories</strong>, pour effectuer une recherche de films par catégorie, ou bien encore cliquer sur l'onglet <strong>Ajouter un film</strong>, pour rajouter un film à votre base de données.

	</p>


	<!--Formulaire de recherche du film-->
	<br/>
	<h1>  Rechercher un film</h1>
	<br/>

	<div class="formulaire">
		<form action="catalogue.php" method="get">
		<input type="text" name="q" value="" placeholder="Recherche"   style="font-size:40px; color:black" size="38">
		<input type="submit" value="OK" id="bouton"><br />
		</form>
	</div>

	<!--Liste des films-->
	<br/>
	<h1>Liste des films par catégorie</h1>

<!--CODE RECHERCHE FILM PAR TITRE, NOM, SYNOPSIS et FICHIER-VOIR DEMETRIO ET CATALOGUE.PHP
<?php
/*
require 'db.php';
$resultsSearch=array();//variable à remplir
//Mettre ici le code pour la recherche
print_r($_GET);
if (!empty($_GET['search'])){
	$searchID=$_GET['search'];
	$searchAll='%'.$searchID.'%';
	//echo $searchID;

$sqlSearch='

SELECT mov_id, mov_title, cat_name, mov_synopsis, mov_path
FROM movie
INNER JOIN category ON category.cat_id = movie.cat_id 
WHERE mov_title LIKE :searchKeyWord
OR cat_name LIKE :searchKeyWord 
OR mov_synopsis LIKE :searchKeyWord
OR mov_path LIKE :searchKeyWord 

';

$pdoStatement = $pdo->prepare($sqlSearch);
	$pdoStatement->bindValue(':searchKeyWord', $searchAll, PDO::PARAM_STR);

	// Si erreur
if ($pdoStatement ->execute()===false) {
		print_r($pdo->errorInfo());
	}
	else if ($pdoStatement->rowCount() > 0) {
		$resultsSearch = $pdoStatement->fetchAll();
		print_r($resultsSearch);
	}
}

*/
?>
FIN COMENTAIRE-->











<?php
require 'db.php';
$nbMovieCat=array();
$sql1='
		SELECT COUNT(*) AS total, cat_name
		FROM movie
		LEFT OUTER JOIN category ON category.cat_id = movie.cat_id 
		GROUP BY cat_name
	';

$pdoStatement = $pdo->prepare($sql1);
	
	// Si erreur
if ($pdoStatement ->execute()===false) {
	print_r($pdo->errorInfo());
}
else if ($pdoStatement->rowCount() > 0) {
	$nbMovieCat = $pdoStatement->fetchAll();
		//print_r($nbMovieCat);
}
?>

<ul>
	<?php foreach ($nbMovieCat as $nbmovie): ?>
		<li><button><?=$nbmovie['cat_name'].'('.$nbmovie['total'].')'?></button></li>
	<?php endforeach ?>			
</ul>


<?php
require 'db.php';
$movieTitle=array();
//echo $searchID;
$sql2='
	SELECT * 
	FROM movie
	LIMIT 4
';

$pdoStatement = $pdo->prepare($sql2);
// Si erreur
if ($pdoStatement ->execute()===false) {
	print_r($pdo->errorInfo());
}
else if ($pdoStatement->rowCount() > 0) {
	//print_r($movieTitle);
}
	$movieTitle = $pdoStatement->fetchAll();
?>

<?php foreach ($movieTitle as $titleListe): ?>
	<div class="alignement">
		<img src="<?=$titleListe['mov_image']?>" width="200px" height="300px"><br/><br/>
		<button ><?=$titleListe['mov_original_title']?></button>
	</div>
<?php endforeach ?>
	</center>
	</body>

</html>

