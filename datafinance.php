<?php
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=sakila;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo 'erreur';
    die();
}


$sql = "SELECT COUNT(fc.film_id), c.name FROM category as c JOIN film_category as fc ON fc.category_id=c.category_id ORDER BY LIMIT 15";
$req = $pdo->query($sql);
$film = $req->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


  <title>Document</title>
</head>

<body>
  <nav>
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="index.php">Acceuil</a></li>
        <li><a href="listfilm.php?id=0">Films</a></li>
        <li><a href="listactor.php">Acteurs</a></li>
        <li><a href="mag.php">Nos Magasin</a></li>
        <li class="active"><a href="datafinance.php">Finance</a></li>
        <li><a href="categorie.php">Categorie</a></li>
      </ul>
    </div>
  </nav>

</body>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</html>