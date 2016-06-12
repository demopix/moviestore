<?php

$jsondata = file_get_contents("http://www.omdbapi.com/?t='".$_GET['mov_t']."'&y=&plot=short&r=json");
//var_dump(json_decode($file)
$data = json_decode($jsondata, true);
//var_dump($data);
//parse the JSON into variables
$movTitle= $data ['Title'];
$movCast= $data ['Actors'];
$movSynopsis = $data ['Plot'];
$Nationality = $data ['Country'];
$year = $data ['Year'];
$img= $data ['Poster'];

?>




<div class="container-fluid">


	<form>
	<div class="col-lg-8">

	<input type="hidden" name="inc" value="add" placeholder="Titre original" /><br />
 	<input type="search" class="form-control" name="mov_t" value="" placeholder="Titre original" /> 	
 	<button class="btn btn-warning" type="submit">Lancer la recherche!</button>
 	</div></form>

 	<?php
 	if (isset($_GET['mov_t'])) {
 		# code...
 	
 	?>

 	<br>
 	<form action="" method="post">
<div class="col-lg-8">
      <div class="form-group">		
		<input type="text" name="mov_title" class="form-control" value="<?php echo $movTitle; ?>" placeholder="<?php echo $movTitle; ?>Le titre du film"/><br />
	  </div>
      <div class="form-group">
		<select name="cat_id">
		  <option value="0">Choisissez un genre :</option>
		  <option value="1">Science-Fiction</option>
		  <option value="2">Comedie</option>
		  <option value="3">Aventure</option>
		  <option value="4">Thriller</option>
        </select>
		<select name="nat_id">
		  <option value="0">Choisissez un Pays :</option>
		  <option value="1">FR</option>
		  <option value="2">BE</option>
		  <option value="3">DE</option>
		  <option value="4">PT</option>
		  <option value="5">UK</option>
		</select><br>
</div></div>
 <div class="col-lg-8">

                            <div class="form-group">
		<input type="text" class="form-control" cols="61" value="<?php echo $movCast;?>" placeholder="Casting" /> </div>
		 </div>
		 <div class="col-lg-8">
                            <div class="form-group">
		<textarea rows="3" class="form-control" cols="61" value= "<?php echo $movSynopsis;?>" name="comment" placeholder="Le Synopsis" form=""><?php echo $movSynopsis;?></textarea><br />
		 </div>
		 </div><br>
		 <div class="col-lg-8">
		 <div class="col-lg-5 ">
          
		<input type="text" class="form-control " value="<?php echo $Nationality;?>" placeholder="Nationalité" /></div>
		<div class="col-lg-5 ">
		<input type="text"  class="form-control"  value="<?php echo $year;?>" placeholder="Année de production" /><br />
				<input type="hidden" value="<?php echo $img;?>" placeholder="Lien de limage"/>
				</div>
		
		
		<button class="btn btn-success" type="submit">Valider</button>
		</div>
</form>
		<img width="300" src="<?php echo $img;?>"/><br/><br/>

		<?php
}

		if (isset($_POST['nat_id'])) {
					

$sqlCheck = '
	SELECT mov_title
	FROM movie
	WHERE mov_title = :filme';
// I'm getting the prepared query
$pdoStatementCheck = $pdo->prepare($sqlCheck);
$pdoStatementCheck->bindValue(':filme', $movTitle);
	// I'm sending the request to MySQL
	// If query went wrong
	
if ($pdoStatementCheck->execute() === false) {
	echo 'Erro 93';		print_r($pdo->errorInfo());
	}
	
	// If ok
	else {
		$movieExist = $pdoStatementCheck->fetch();
		echo $movTitle;

		


		if ($pdoStatementCheck->rowCount() > 0) {
			echo 'movie already exists<br>';
		}
		else {

		$path = htmlspecialchars($_POST['path']);	

			$sqlInsert = '
INSERT INTO movie (mov_title, mov_cast, mov_synopsis, mov_path,cat_id, mov_original_title, mov_year, nat_id,mov_image)
	               VALUES (:filme, :acteurs, :synopsise, :lien, :cat_id,:titreOriginal,:year,:mov_nat ,:mov_img )';
// I'm getting the prepared query
        $pdoStatement = $pdo->prepare($sqlInsert);
// I'm binding every needed values
		$pdoStatement->bindValue(':filme', $movTitle);
		$pdoStatement->bindValue(':acteurs', $movCast);
		$pdoStatement->bindValue(':synopsise', $mov_synopsis);
		$pdoStatement->bindValue(':lien', $path);
		$pdoStatement->bindValue(':cat_id', $_POST['cat_id']);
		$pdoStatement->bindValue(':titreOriginal', $movTitle);
		$pdoStatement->bindValue(':year', $year);
		$pdoStatement->bindValue(':mov_img', $img);
		$pdoStatement->bindValue(':mov_nat', $_POST['nat_id']);
// I'm sending the request to MySQL
		
			if ($pdoStatement->execute() === false) {
				print_r($pdo->errorInfo());
			}
			// If ok
			else {
				echo 'data inserted<br>';
			}
		}
	}
}else{

	echo '<br><p>insert a movie</p>';
}

?>
</div>
