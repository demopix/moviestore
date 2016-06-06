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
<body><?php

// Connexion DB
$dsn = 'mysql:host=192.168.210.84;dbname=afdg_sql1;charset=utf8';

try {
	$pdo = new PDO($dsn,'afdg','webforce3');
}
catch(Exception $e) {
	echo 'connexion impossible';
	exit;
}

if (!empty($_GET)) {
//JSON GET a partir du site ombd api
$jsondata = file_get_contents("http://www.omdbapi.com/?t='".$_GET['mov_t']."'&y=&plot=short&r=json");
//var_dump(json_decode($jsondata)

$data = json_decode($jsondata, true);
//var_dump($data);

//parse the JSON into variables
$movTitle= $data ['Title'];
$movCast= $data ['Actors'];
$movSynopsis = $data ['Plot'];
$Nationality = $data ['Country'];
$year = $data ['Year'];
$img= $data ['Poster'];


// Si le formulaire est soumis
if (!empty($_POST)) {
	//print_pre($_POST);
	// Je récupère mes données en POST
	$movTitle = isset($_POST['Title']) ? trim($_POST['Title']) : '';
	$movCast = isset($_POST['Actors']) ? trim($_POST['Actors']) : '';
	$movSynopsis = isset($_POST['Plot']) ? trim($_POST['Plot']) : '';
	//$Nationality = isset($_POST['Country']) ? trim($_POST['Country']) : '';
	$year = isset($_POST['Year']) ? trim($_POST['Year']) : '';
	$img = isset($_POST['Poster']) ? trim($_POST['Poster']) : '';
	}

//insert into mysql table
$sqlInsert = '
	INSERT INTO movie (mov_title, mov_cast, mov_synopsis, mov_year)
	VALUES (:Title, :Actors, :Plot, :Year)
';

// Je récupère ma requête préparée
$pdoStatement = $pdo->prepare($sqlInsert);

//Bindvalue
$pdoStatement->bindValue(':Title', $movTitle);
$pdoStatement->bindValue(':Actors', $movCast);
$pdoStatement->bindValue(':Plot', $movSynopsis);
$pdoStatement->bindValue(':Year', $year);

// J'exécute ma requête
if ($pdoStatement->execute() === false) {
		print_r($pdo->errorInfo());
	}
	// If ok
	
	else {
		echo "film ajoutee a la base de donnee";
		
	}
	
	
?>

<form action="" method="post">		
		<input type="text" name="key" value="<?php echo $movTitle; ?>" placeholder="<?php echo $movTitle; ?>Le titre du film"/><br />
		<input type="text" name="key" value="<?php echo $movCast;?>" placeholder="Casting" /><br />
		<textarea rows="3" cols="61" value= "<?php echo $movSynopsis;?>" name="comment" placeholder="Le Synopsis" form=""><?php echo $movSynopsis;?></textarea><br />
		<input type="text" name="key" value="<?php echo $Nationality;?>" placeholder="Nationalité" /><br />
		<input type="text" name="key" value="<?php echo $year;?>" placeholder="Année de production" /><br />
		<input type="hidden" name="key" value="<?php echo $img;?>" placeholder="Lien de limage" /><br />
		<img width="150" src="<?php echo $img;?>"/><br /><br />
	
		<button type="submit" value="send">Ajouter la séléction</button>
	</form>
 		
<?php
}
?>
 	
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
</body>
</html>
