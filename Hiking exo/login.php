<?php
include 'db.php';

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {

    // Récupération des informations d'identification de l'utilisateur
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = 'SELECT * FROM users WHERE username = :username';
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":username", $username);

    // Exécution de la requête
    $stmt->execute();

    // Stockage des résultats
    $user = $stmt->fetch() ?: null;

    // Vérification des informations d'identification
    if ($user && $password === $user['password']) {

        // Les informations d'identification sont correctes, définir une variable de session pour indiquer que l'utilisateur est connecté
        $_SESSION['id'] = $user['id'];
        header('Location: create.php');
    } else {
        // Les informations d'identification sont incorrectes, affichez un message d'erreur et redirigez l'utilisateur vers la page de connexion
        echo "Nom d'utilisateur ou mot de passe incorrect";
        exit;
    }
}
?>

<form action="" method="post">
    Username:<input type="text" name="username">
    Password:<input type="text" name="password">
    <input type="submit">
</form>