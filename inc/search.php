

	<?php  
    if (isset($_GET['q'])) {
   $sql ='SELECT mov_title, mov_image, mov_path, cat_name FROM movie JOIN category ON movie.cat_id = category.cat_id WHERE mov_title LIKE :q AND mov_path LIKE :q ';
   $sth = $pdo->prepare($sql);
  $sth->bindValue(':q','%'.$_GET['q'].'%');
   $sth->execute();
   $movies = $sth->fetchall();
   print_r($movies);


    
    }
    if (isset($_GET['category'])) {
    	# code...
    
$cat_query ='SELECT mov_title, mov_image, cat_name FROM movie JOIN category ON movie.cat_id = category.cat_id where cat_name = :CategoryN ';
 $sttCat = $pdo->prepare($cat_query);
  $sttCat->bindValue(':CategoryN',$_GET['category']);
   $sttCat->execute();
   $category = $sttCat->fetchall();
   echo("<h1>category</h1><br>");
   print_r($movies);	}
   else{header('location : index.php?inc=sch&q');}
	?>
	<main class='container'>

	<!--Présentation brève du concept-->
	<h1>Recherche</h1>

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


		<form action="index.php?inc=sch&">
		<div class="input-group input-group-lg">
		<span class="input-group-btn">
        <button class='btn btn-info' type="submit">Go!</button>
      </span><input class="form-control" type="search" name="q" value="" placeholder="Recherche">
      </div>

	
		</div>
		<br />
		</form>
</div>


		<select name="mov_title">
				<option value="0">choisissez :</option>
				
				<option value="<?= $key ?>"></option>
				
			</select><br />





	<!--Liste des films-->
	<h1>Liste non exhaustive des films par catégorie</h1>

	<ul class="list-inline"><?php foreach ($movies as $value) :?>
		<li><a href="index.php?inc=sch&q&category=<?= $value['cat_name'] ?>"><?= $value['cat_name'] ?> </a></li>
		<?php endforeach; ?>
			</ul>
			

<div class="container-fluid">
<?php  if (isset($_GET['category'])){ 
	foreach ( $category as $value) :?>
	<div class="card col-md-3">
	<img width="200" height="300" src="<?= $value['mov_image'] ?>"><p>
	<a href=""><?= $value['mov_title'] ?></a></p>
	</div>
	<?php endforeach; ?>
	
<?php }else{ 
	foreach ($movies as $value)  :?>
	<div class="card col-md-3">
	<img width="200" height="300" src="<?= $value['mov_image'] ?>"><p>
	<a href=""><?= $value['mov_title'] ?></a></p>
	</div>
	<?php endforeach; }?>
	</div>

	
	
</div>

<ul class="pagination">
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
</ul>
</main>
	

