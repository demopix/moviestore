<?php include 'inc/connexion.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Movie Store</title>
</head>
<body>
<nav>
	<ul><li><a href="acc">accueil</a></li><li><a href="acc">Accueil</a></li><a href="add">Catégories</a></li></ul>
</nav>

<?php if(isset($_GET['add']))
{
	include_once'insert_movie.php';
	} 
	if(isset($_GET['acc']))
{
	include_once'accueil.php';
	} 




	?>

<footer>
	<div style="    bottom: -2%;
    position: absolute;
}">
		<p>developres <strong>Gabriela<a href=""></a></strong> <strong>Florian<a href=""></a></strong> <strong>Anne-Marie<a href=""></a></strong> <strong>Demétrio<a href=""></a></strong></p>
	</div>
</footer>

</body>
</html>