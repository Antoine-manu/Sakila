<?php
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=sakila;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo 'erreur';
    die();
}

$sql = 
"SELECT
sf.first_name,
sf.last_name,
a.address,
city.city,
cs.email
FROM
store AS s
JOIN address AS a
ON
s.address_id = a.address_id
JOIN city ON city.city_id = a.city_id
JOIN staff AS sf
ON
sf.store_id = s.store_id
JOIN customer AS cs
ON
cs.store_id = s.store_id
LIMIT 15";

$req = $pdo->query($sql);
$magasinfino = $req->fetchAll(PDO::FETCH_ASSOC);

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

    <style>
    .center{
        width: 80%;
        margin: auto;
    }
    </style>

</head>

<body>
    <nav>
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="index.php">Acceuil</a></li>
                <li><a href="listfilm.php?id=0">Films</a></li>
                <li><a href="listactor.php">Acteurs</a></li>
                <li class="active"><a href="mag.php">Nos Magasin</a></li>
                <li><a href="datafinance.php">Finance</a></li>
                <li><a href="categorie.php">Categorie</a></li>
            </ul>
        </div>
    </nav>

    <div class="row center">
        <?php foreach($magasinfino as $mf) : ?>
        <div class="col s4">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title"><?= $mf['city'] ?></span>
                    <ul class="collection blue-grey darken-1">
                        <li class="collection-item blue-grey darken-1"><?= $mf['email'] ?></li>
                        <li class="collection-item blue-grey darken-1"><?= $mf['address'] ?></li>
                        <li class="collection-item avatar blue-grey darken-1">
                            <img src="persona.jfif" alt="" class="circle">
                            <span class="title"><?= $mf['first_name'] ?> <?= $mf['last_name'] ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>

</body>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</html>