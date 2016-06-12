

	<?php  
    if (isset($_GET['movie'])) {

   $sql ='SELECT mov_id, mov_title,mov_synopsis ,mov_image, mov_path, cat_name FROM movie JOIN category ON movie.cat_id = category.cat_id WHERE mov_id ='.$_GET['movie'];
   $sth = $pdo->prepare($sql);
  $sth->bindValue(':q','%'.$_GET['q'].'%');
  //$sth->bindValue(':sort_result',);   :sort_result
   $sth->execute();
   $movies = $sth->fetchall();
  
    }
    if (isset($_GET['category'])) {

    
$cat_query ='SELECT  mov_title, mov_image, cat_name FROM movie inner JOIN category ON movie.cat_id = category.cat_id where cat_name = :CategoryN ';
 $sttCat = $pdo->prepare($cat_query);
  $sttCat->bindValue(':CategoryN',$_GET['category']);
   $sttCat->execute();
   $category = $sttCat->fetch();
  }
   else{header('location : index.php?inc=sch&q');}
	?>
	<main class='container'>
	
<?php foreach ($movies as $value) :?>

<div class="panel-footer">

	<h1><?= $value['mov_title'] ?></h1>
</div>

<div class="container-fluid">

        	<div class="card col-md-4">
        	 <img width="300" height="400" src="<?= $value['mov_image'] ?>">
          </div><div class="col-md-6" ></div>
          <p><?= $value['mov_synopsis'] ?></p>
        	  <div class="panel-footer">
        Catégorie<br><a href="index.php?inc=sch&q=<?= $_GET['q']?>&category=<?= $value['cat_name'] ?>"><?= $value['cat_name'] ?></a>
        </div>
</div>
<?php endforeach; ?>


	

	
	
</div>


</main>