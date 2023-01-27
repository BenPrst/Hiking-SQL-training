<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Randonnées</title>
  <link rel="stylesheet" href="assets/css/style.css" media="screen" title="no title" charset="utf-8">
</head>

<body>
  <header>
    <h1 class="title">LISTE DES RANDONNÉES</h1>
    <a href="http://parcourssql/Hiking%20exo/login.php">Login</a>
    <a href="http://parcourssql/Hiking%20exo/logout.php">Logout</a>

  </header>
  <div class="list">
    <table>
      <tr>
        <th>Name</th>
        <th>Difficulty</th>
        <th>Distance</th>
        <th>Duration</th>
        <th>Height Difference</th>
      </tr>
      <?php
      include 'db.php';
      $stm = $pdo->query("SELECT * FROM hiking");
      $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
      foreach ($rows as $row) {
        echo "<tr><td class='td_name'>" . $row['name'] . "</td><td>" . $row['difficulty'] . "</td><td>" . $row['distance'] . "</td><td>" . $row['duration'] . "</td><td>" . $row['height_difference'] . "</td><td>" . "<a href='http://parcourssql/Hiking%20exo/update.php?id=" . $row["id"] . "'><img width='20px' src='assets/images/edit.png'></a>" . "</td><td>" . "<a href='http://parcourssql/Hiking%20exo/delete.php?id=" . $row["id"] . "'><img width='20px' src='assets/images/trash.png'></a>" . "</td></tr>";
      } ?>
    </table>
  </div>
  <a href="http://parcourssql/Hiking%20exo/create.php"><img class="add" width='30px' src='assets/images/add.png'></a>
</body>

</html>