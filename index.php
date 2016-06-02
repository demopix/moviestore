<?php include 'inc/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Movie Store</title>
</head>
<body>
<nav>
	<ul><li><a href="index.php?inc=acc">Accueil</a></li><li><a href="index.php?inc=add">Ajouter un Film</a></li><a href="index.php?inc=ctg">Catégories</a></li></ul>
</nav>

<?php

if(isset($_GET['inc'])){
//$add =  ;
if($_GET['inc'] == 'acc')
{
	echo '<h1>Accueil</h1>';
	//include_once'inc/ajouter.php';
	} 
	if($_GET['inc'] == 'add')
{
	echo '<h1>Ajouter</h1>';
	//include_once'inc/home.php';
	} 
	if($_GET['inc'] == 'ctg')
{   echo '<h1>Catégories</h1>';
	//include_once'inc/categorie.php';
	}



}
	?>

<footer>
	<div style="bottom: -2%;
    position: absolute;
}">
		<p>developres <strong>Gabriela<a href=""></a></strong> <strong>Florian<a href=""></a></strong> <strong>Anne-Marie<a href=""></a></strong> <strong>Demétrio<a href=""></a></strong></p>
	</div>
</footer>

</body>
</html>