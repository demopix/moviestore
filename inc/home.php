
	
	
	<!--Présentation brève du concept-->
	<h1>BIENVENUE SUR MOVIESTORE!</h1>
	<br/>

	<p >

	Bienvenue sur MovieStore! Cette base de données privée permet d'effectuer une recherche rapide de films par titre, catégorie, synopsis, ou bien encore nom de fichier.<br/>
	Une recherche rapide optionnelle peut être effectuée selon la description longue ou les acteurs/actrices.
	Une recherche avancée peut être également effectuée selon le titre, la catégorie, l'acteur/actrice, le support de stockage ou encore la date d'ajout à la base de donnée.<br/>
	A tout moment, vous pouvez cliquer sur l'onglet <strong>Catégories</strong>, pour effectuer une recherche de films par catégorie, ou bien encore cliquer sur l'onglet <strong>Ajouter un film</strong>, pour rajouter un film à votre base de données.

	</p>

 <div class="row" >
	<!--Formulaire de recherche du film-->
	<br/>
	 <div class="col-md-12"><h1>  Rechercher un film</h1>
	<br/>
   
	<div class=" col-lg-12">
		<form action="index.php">
		<input type="hidden" name="inc" value="sch">
		<div class="input-group input-group-lg">
		<span class="input-group-btn">
        <button class='btn btn-info' type="submit">Go!</button>
      </span><input class="form-control" type="search" name="q" value="" placeholder="Recherche"/>
      <input type="hidden" name="sort_result" value="ASC">
      </div>

	</form>
	</div>

	<!--Liste des films-->
	<br/>
	 
	<h1>Liste des films par catégorie</h1>







<?php

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

	<ul class="list-inline">
	<?php foreach ($nbMovieCat as $nbmovie): ?>
		<li><button><?=$nbmovie['cat_name'].'('.$nbmovie['total'].')'?></button></li>
	<?php endforeach ?>			
</ul>


<?php

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
<div class="container-fluid">

<?php foreach ($movieTitle as $titleListe): ?>
	<div class="card col-md-3">
	<img width="200" height="300" src="<?= $titleListe['mov_image'] ?>"><p>
	<a href=""><?= $titleListe['mov_title'] ?></a></p>
	</div>
<?php endforeach ?>
  </div>
 </div>
</div>
	