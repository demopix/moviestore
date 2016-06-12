

	<?php  
    if (isset($_GET['q'])) {

   $sql ='SELECT mov_id, mov_title, mov_image, mov_path, cat_name FROM movie JOIN category ON movie.cat_id = category.cat_id WHERE mov_title LIKE :q  OR mov_path LIKE :q ORDER BY mov_title '.$_GET['sort_result'];
   $sth = $pdo->prepare($sql);
  $sth->bindValue(':q','%'.$_GET['q'].'%');
  //$sth->bindValue(':sort_result',);   :sort_result
   $sth->execute();
   $movies = $sth->fetchall();
  
    }
    if (isset($_GET['category'])) {

    
$cat_query ='SELECT  mov_id, mov_title, mov_image, cat_name FROM movie inner JOIN category ON movie.cat_id = category.cat_id where cat_name = :CategoryN ';
 $sttCat = $pdo->prepare($cat_query);
  $sttCat->bindValue(':CategoryN',$_GET['category']);
   $sttCat->execute();
   $category = $sttCat->fetchall();
  }
   else{header('location : index.php?inc=sch&q');}
	?>
	<main class='container'>

	


	<!--Formulaire de recherche du film-->
	
<div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Trier par</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <ul class="list-group">
          <li class="list-group-item"><a href="index.php?inc=sch&q=<?= $_GET['q']?>&sort_result=ASC">Tilte croissant </a></li>
          <li class="list-group-item"><a href="index.php?inc=sch&q=<?= $_GET['q']?>&sort_result=DESC">Title décroissant </a></li>
         </ul>
        <div class="panel-footer">Footer</div>
      </div>
    </div>
  </div>

		




	<!--Liste des films-->
	<h1>Liste non exhaustive des films par catégorie</h1>

	<ul class="list-inline"><?php foreach ($movies as $value) :?>
		<li><a href="index.php?inc=sch&q=<?= $_GET['q']?>&category=<?= $value['cat_name'] ?>"><?= $value['cat_name'] ?></a></li>
		<?php endforeach; ?>
			</ul>
			

<div class="container-fluid">
<?php  if (isset($_GET['category'])){ 
	foreach ( $category as $value) :?>
	<div class="card col-md-3">
	<a href="index.php?inc=dtl&movie=<?php echo $value['mov_id'] ?>">
  <img width="200" height="300" src="<?= $value['mov_image'] ?>"></a><p>
	<a href=""><?= $value['mov_title'] ?></a></p>
	</div>
	<?php endforeach; ?>
	
<?php }else{ 
	foreach ($movies as $value)  :?>
	<div class="card col-md-3">
	<a href="index.php?inc=dtl&movie=<?= $value['mov_id'] ?>">
<img width="200" height="300" src="<?= $value['mov_image'] ?>"></a><p>
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
	

