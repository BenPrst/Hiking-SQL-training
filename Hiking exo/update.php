	<?php
	include 'db.php';

	if (isset($_POST["button"]) && isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["difficulty"]) && isset($_POST["distance"]) && isset($_POST["duration"]) && isset($_POST["height_difference"])) {
		$id = intval($_POST["id"]);
		$name = htmlspecialchars($_POST["name"]);
		$difficulty = htmlspecialchars($_POST["difficulty"]);
		$distance = intval($_POST["distance"]);
		$duration = htmlspecialchars($_POST["duration"]);
		$height_difference = intval($_POST["height_difference"]);
		$sql = "UPDATE `hiking` SET `name`=:name,`difficulty`=:difficulty,`distance`=:distance,`duration`=:duration,`height_difference`=:height_difference WHERE id = $id";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':name', $name);
		$stmt->bindValue(':difficulty', $difficulty);
		$stmt->bindValue(':distance', $distance);
		$stmt->bindValue(':duration', $duration);
		$stmt->bindValue(':height_difference', $height_difference);
		$stmt->execute();
		echo '<script>alert("La randonnée a été modifiée avec succès !")</script>';
	} else {
		echo "error";
	}
	?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<title>Modifier une randonnée</title>
		<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
	</head>

	<body>
		<a href="/php-pdo/read.php">Liste des données</a>
		<h1>Modifier</h1>
		<form action="" method="post">
			<div>
				<label for="id">id</label>
				<input type="number" name="id" value="<?php echo $_GET["id"]; ?>">
			</div>

			<div>
				<label for="name">Name</label>
				<input type="text" name="name" value="">
			</div>

			<div>
				<label for="difficulty">Difficulté</label>
				<select name="difficulty">
					<option value="très facile">Très facile</option>
					<option value="facile">Facile</option>
					<option value="moyen">Moyen</option>
					<option value="difficile">Difficile</option>
					<option value="très difficile">Très difficile</option>
				</select>
			</div>

			<div>
				<label for="distance">Distance</label>
				<input type="text" name="distance" value="">
			</div>
			<div>
				<label for="duration">Durée</label>
				<input type="time" name="duration" value="">
			</div>
			<div>
				<label for="height_difference">Dénivelé</label>
				<input type="text" name="height_difference" value="">
			</div>
			<button type="submit" name="button">Envoyer</button>
			<a href="http://parcourssql/Hiking%20exo/read.php">Back</a>
		</form>
	</body>

	</html>