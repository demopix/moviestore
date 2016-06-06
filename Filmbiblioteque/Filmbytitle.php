<?php

// Connexion DB
		$dsn = 'mysql:host=192.168.210.84;dbname=afdg_sql1;charset=utf8';

		try {
			$pdo = new PDO($dsn, 'afdg', 'webforce3');
		}
		catch(Exception $e) {
			echo 'connexion impossible';
			exit;
		}

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

/*$movCast = htmlspecialchars($_POST['comment']);*/

/*
//insert into mysql table
$sqlInsert = '
	INSERT INTO movie (mov_id, mov_title, mov_cast, mov_synopsis)
	VALUES ("'.$movTitle.'", "'.$movCast.'", "'.$movSynopsis.'")
';

//prepare
$pdoStatement = $pdo->prepare($sqlInsert);
*/

?>

<!DOCTYPE html>
<html>
<head>
<style type="text/css">
		input, button{
	    width: 450px;
	    padding: 12px 20px;
	    margin: 8px 0;
	    box-sizing: border-box;
		}
		input:focus {
	    background-color: lightblue;
		}
</style>
	<title>	
	Formulaire
	</title>
</head>
<body>
<select name="dropDown" form="form">
  <option value="0">Choisissez un genre :</option>
  <option value="1">Science-Fiction</option>
  <option value="2">Comedie</option>
  <option value="3">Aventure</option>
  <option value="4">Thriller</option>
</select>
	<form>
 	<input type="search" name="mov_t" value="" placeholder="Titre original" /><br />
 	
 	<button type="submit">Lancer la recherche!</button></form>
 	
 	<form action="" method="post" enctype="multipart/form-data">		
		<input type="text" name="key" value="<?php echo $movTitle; ?>" placeholder="<?php echo $movTitle; ?>Le titre du film"/><br />
		<input type="text" name="key" value="<?php echo $movCast;?>" placeholder="Casting" /><br />
		<textarea rows="3" cols="61" value= "<?php echo $movSynopsis;?>" name="comment" placeholder="Le Synopsis" form=""><?php echo $movSynopsis;?></textarea><br />
		<input type="text" name="key" value="<?php echo $Nationality;?>" placeholder="Nationalité" /><br />
		<input type="text" name="key" value="<?php echo $year;?>" placeholder="Année de production" /><br />
		<input type="hidden" name="key" value="<?php echo $img;?>" placeholder="Lien de limage" /><br />
		<img width="100" src="<?php echo $img;?>"/><br /><br />
		
		
		<button type="submit">Valider</button>
	</form>	
</body>
</html>

<!--
// I'm writing the query
$sqlInsert = '
	INSERT INTO movie (mov_title, mov_cast, mov_synopsis, mov_path, mov_original_title)
	VALUES (:filme, :acteurs, :synopsise, :lien, :titreOriginal)
';

// I'm getting the prepared query
$pdoStatement = $pdo->prepare($sqlInsert);

// I'm writing the query
$sqlCheck = '
	SELECT mov_title
	FROM movie
	WHERE mov_title = :movie
';
// I'm getting the prepared query
$pdoStatementCheck = $pdo->prepare($sqlCheck);

// I'm looping on contactList
foreach ($contactList as $key=>$contactInfo) {

	// I'm taking a contact (for testing)
	$movTitle = $contactList[$key]['filme'];
	$movCast = $contactList[$key]['acteurs'];
	$movSynopsis = $contactInfo['synopsise'];
	$movPath = $contactInfo['lien'];
	$movOriginalTitle = $contactList[$key]['titreOriginal'];


	// I'm checking if email already exists in my table
	$pdoStatementCheck->bindValue(':filme', $movTitle);

	// I'm sending the request to MySQL
	// If query went wrong
	if ($pdoStatementCheck->execute() === false) {
		print_r($pdo->errorInfo());
	}
	// If ok
	else {
		if ($pdoStatementCheck->rowCount() > 0) {
			echo 'movie already exists<br>';
		}
		else {
			// I'm binding every needed values
			$pdoStatement->bindValue(':lastname', $lastname);
			$pdoStatement->bindValue(':firstname', $firstname);
			$pdoStatement->bindValue(':email', $email);
			$pdoStatement->bindValue(':birthdate', $birthdate);
			$pdoStatement->bindValue(':address', $address);
			$pdoStatement->bindValue(':postal_code', $postalCode);
			$pdoStatement->bindValue(':city', $city);

			// I'm sending the request to MySQL
			// If query went wrong
			if ($pdoStatement->execute() === false) {
				print_r($pdo->errorInfo());
			}
			// If ok
			else {
				echo 'data inserted<br>';
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
 	<form action="" method="get">
		<input type="name" name="">
	</form>
	<button>Valider</button>
</body>
</html>
-->