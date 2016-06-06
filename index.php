<?php include 'inc/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<title>Movie Store</title>
</head>
<body>
<nav>
	<ul class="nav nav-tabs"">
	<li role="presentation" ><a href="index.php?inc=acc">Accueil</a></li>
	<li role="presentation" ><a href="index.php?inc=add">Ajouter un Film</a></li>
	<li role="presentation" ><a href="index.php?inc=ctg">Catégories</a></li></ul> 
</nav>

<?php

if(isset($_GET['inc'])){
//$add =  ;
if($_GET['inc'] == 'acc')
{
	echo '<h1>Accueil</h1>';
	include_once'inc/home.php';
	} 
	if($_GET['inc'] == 'add')
{
	echo '<h1>Ajouter</h1>';
	readfile("php://filter/read=string.toupper/resource=http://www.omdbapi.com/?t=all&y=&plot=short&r=json");
	//include_once'inc/home.php';
	} 
	if($_GET['inc'] == 'ctg')
{   echo '<h1>Catégories</h1>';
$homepage = file_get_contents('http://www.omdbapi.com/?t=all&y=&plot=short&r=json');
echo $homepage;
	//include_once'inc/categorie.php';
	}
	if($_GET['inc'] == 'sch')
{
	echo '<h1>Recherche</h1>';
	include_once'inc/search.php';
	} 



}
	?>

<footer>
	<div class="inner" >
		<p>developres <strong>Gabriela<a href=""></a></strong> <strong>Florian<a href=""></a></strong> <strong>Anne-Marie<a href=""></a></strong> <strong>Demétrio<a href=""></a></strong></p>
	</div>
</footer>

</body>
</html>