<?php
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=sakila;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo 'erreur';
    die();
}

$sql = "SELECT
COUNT(fc.film_id) AS film,
c.name
FROM
category AS c
JOIN film_category AS fc
ON
fc.category_id = c.category_id
GROUP BY c.name
ORDER BY c.name
LIMIT 15";
$req = $pdo->query($sql);
$category = $req->fetchAll(PDO::FETCH_ASSOC);

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
                <li class="active"><a href="categorie.php">Categorie</a></li>
            </ul>
        </div>
    </nav>

    <table>
        <thead>
            <tr>
                <th>Categorie</th>
                <th>Nombre de film dans cette categorie</th>
            </tr>
        </thead>

        <tbody>


            <?php foreach($category as $cat) :?>
            <tr>
                <td><?= $cat['film'] ?></td>
                <td><?= $cat['name'] ?></td>
            </tr>
            <?php endforeach ;?>
        </tbody>
    </table>



</body>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</html>