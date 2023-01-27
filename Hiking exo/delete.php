<?php
include 'db.php';
/**** Supprimer une randonnée ****/
$id = intval($_GET["id"]);
$sql = "DELETE FROM hiking WHERE id = $id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
header("Location: http://parcourssql/Hiking%20exo/read.php");
