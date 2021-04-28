<?php
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=sakila;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo 'erreur';
    die();
}
$sql = "SELECT a.first_name, a.last_name, a.actor_id FROM actor as a  LIMIT 15";
$req = $pdo->query($sql);
$actor = $req->fetchAll(PDO::FETCH_ASSOC);


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
                <li class="active"><a href="listactor.php">Acteurs</a></li>
                <li><a href="mag.php">Nos Magasin</a></li>
                <li><a href="datafinance.php">Finance</a></li>
                <li><a href="categorie.php">Categorie</a></li>
            </ul>
        </div>
    </nav>
    <div class="row center">
        <?php foreach($actor as $act) : ?>

        <div class="col s3">
            <div class="card ">
                <div class="card-image">
                    <img src="persona.jfif">

                </div>
                <div class="card-action">
                    <span class="card-title red-text text-lighten-1 center-align"><?= $act['first_name'] ?>
                        <?= $act['last_name'] ?></span> <br>
                    <a href="movieactor.php?id=<?= $act['actor_id'] ?>">En voir plus sur l'acteur</a>
                </div>
            </div>
        </div>


        <?php endforeach;?>
    </div>
</body>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</html>