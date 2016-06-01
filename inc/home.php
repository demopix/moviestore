<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<style type="text/css">
	HTML, BODY{

	font-family: Verdana, Tahoma, sans-serif;

	}

	.formulaire{
		width=100%;
	}

	ul li{
	display: inline-block;
	}
	

	.affichage1, .affichage2,.affichage3,.affichage4 {
		width:200px;
		height:200px;
		border:1px solid red;
		display: inline-block;
		margin-left:40px;
		margin-right:10px;

	}

	</style>
</head>
	
</html><body>

	<!--


	Accueil La page d’accueil présente brièvement le concept et affiche en premier lieu un grand et gros champ de recherche parmi les films. Une liste non exhaustive de catégories est affichée. Le nombre de films de chaque catégorie (affichée sur l’accueil) est mis entre parenthèses à droite du nom de la catégorie. Les derniers films ajoutés seront aussi affichés avec leur affiche et leur nom.  
	En option Les 5 ou 6 dernières recherches sont affichées sous la barre de recherche en petits caractères. Un clic sur ces anciennes recherches remplit alors la barre de recherche avec ses termes.  
	Recherche La recherche simple s’effectue sur les informations suivantes : ● Titre ● Catégorie ● Synopsis ● Nom du fichier  
	En option La recherche s’effectuera aussi sur : ● Description longue ● Acteur(s)/Actrice(s)  
	Recherche avancée (en option) Dans la recherche avancée, on peut filtrer/rechercher les résultats par : ● titre ● catégorie (liste) ● acteur/actrice ● support ● date d’ajout à la DB  
	Résultats de recherche Les résultats de recherche sont affichés comme une page classique du catalogue. La mention “Résultat(s) pour : le texte de la recherche soumise“ est ajoutée en haut, après le header. 



	-->
	<center>

	<!--Présentation brève du concept-->
	<h1>Concept</h1>

	<p>

	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

	</p>


	<!--Formulaire de recherche du film-->
	<h1>  Rechercher un film</h1>

	<div class="formulaire">
		<form action="" method="post">
		<input type="text" name="rechercheFilm" value="" placeholder="Recherche">
		<input type="submit" value="OK"><br />
		</form>
	</div>


		<select name="mov_title">
				<option value="0">choisissez :</option>
				<?php foreach ($countriesList as $key=>$value) :?>
				<option value="<?= $key ?>"><?= $value ?></option>
				<?php endforeach; ?>
			</select><br />





	<!--Liste des films-->
	<h1>Liste non exhaustive des films par catégorie</h1>

	<ul>
		<li><a href="">Science-Fiction</a></li>
		<li><a href="">Comédie</a></li>
		<li><a href="">Aventure</a></li>
		<li><a href="">Thriller</a></li>
	</ul>

	<div class="affichage1">
	<p>Affiche film</p>
	</div>

	<div class="affichage2">
		<p>Affiche film</p>
	</div>

	<div class="affichage3">
		<p>Affiche film</p>
	</div>

	<div class="affichage4">
		<p>Affiche film</p>
	</div>


	<center>
	<table style="width:70%">
	<center>
		<tr>
			<td><a href="">Titre1</a></td>
			<td><a href="">Titre2</a></td>
			<td><a href="">Titre3</a></td>
			<td>T<a href="">itre4</a></td>
		</tr>
	</center>
	</table>

	<h1>Résultats de la Recherche soumise</h1>

	</center>
	</body>

