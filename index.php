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
<style type="text/css">

.footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 60px;
    line-height: 60px;
    background-color: rgba(138, 238, 234, 0.72);
}

	.input-group.input-group-md.navfix {
    margin-top: 4px;
    position: fixed;
    width: 80% ;
}
</style>
	<title>Movie Store</title>
</head>
<body>
<nav>
	<ul class="nav nav-tabs"">
	<li role="presentation" ><a href="index.php?inc=acc">Accueil</a></li>
	<li role="presentation" ><a href="index.php?inc=add">Ajouter un Film</a></li>
	<li role="presentation" ><a href="index.php?inc=ctg">Catégories</a></li>
	
	<li role="presentation">
	<div class="col-md-6"><form action="index.php">
		<input type="hidden" name="inc" value="sch">
		<div class="input-group input-group-md navfix">
		<span class="input-group-btn">
        <button class='btn btn-info' type="submit">Go!</button>
      </span><input class="form-control" type="search" name="q" value="" placeholder="Recherche"/>
      <input type="hidden" name="sort_result" value="ASC">
      </div>

	</form></li>
	</div></ul> 
	

</nav> 
<main class="container">


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
	
	include_once'inc/insert.php';
	} 
	if($_GET['inc'] == 'ctg')
{   echo '<h1>Gestion des Catégories</h1>';

	include_once'inc/category.php';
	}
	if($_GET['inc'] == 'sch')
{
	echo '<h1>Recherche</h1>';
	include_once'inc/search.php';
	} 
	if($_GET['inc'] == 'dtl')
{
	echo '<h1>Details</h1>';
	include_once'inc/details.php';
	} 



}
	?>
</main>
	

<footer>
	<div class="footer" >
		<p>&nbsp;&nbsp;developres <strong><a href="">Gabriela</a></strong> <strong><a href="">Florian</a></strong> <strong><a href="">Anne-Marie</a></strong> <strong><a href="">Demétrio</a></strong></p>
	</div>
</footer>
</body>
</html>