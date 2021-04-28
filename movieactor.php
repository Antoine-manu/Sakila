<?php
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=sakila;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo 'erreur';
    die();
}
$id = $_GET['id'];

$sql = 
"SELECT
fi.title,
fi.description,
fi.release_year,
fi.rental_duration,
fi.rental_rate,
a.first_name,
a.last_name
FROM
film AS fi,
film_actor AS fa,
actor AS a
WHERE
fi.film_id = fa.film_id AND fa.actor_id = a.actor_id AND fa.actor_id = $id
LIMIT 15";

$req = $pdo->query($sql);
$actorinfo = $req->fetchAll(PDO::FETCH_ASSOC);

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
        table{
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
                <li><a href="mag.php">Nos Magasin</a></li>
                <li><a href="datafinance.php">Finance</a></li>
                <li><a href="categorie.php">Categorie</a></li>
                <li class="active"><a href="##"><?= $actorinfo[0]['first_name'] ?> <?= $actorinfo[0]['last_name'] ?></a></li>
            </ul>
            
        </div>
    </nav>


    <div class="row">
        <div class="col s3 offset-s4 ">
            <h2 class="header center-align"><?= $actorinfo[0]['first_name'] ?> <?= $actorinfo[0]['last_name'] ?></h2>
            <div class="card ">
                <div class="card-image ">
                    <img src="persona.jfif" class="">
                </div>
            </div>
        </div>
    </div>

    <table>
        <thead>
          <tr>
              <th>Titre</th>
              <th>Description</th>
              <th>Date de sortie</th>
              <th>Note</th>
          </tr>
        </thead>

        <tbody>
            <?php foreach($actorinfo as $ac): ?>
          <tr>
            <td><?= $ac['title'] ?></td>
            <td><?= $ac['description'] ?></td>
            <td><?= $ac['release_year'] ?></td>
            <td><?= $ac['rental_duration'] ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

</body>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</html>