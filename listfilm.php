<?php
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=sakila;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo 'erreur';
    die();
}
$actu = $_GET['id'] ?? 0;
$sql = "SELECT f.title, f.description, f.release_year, f.rental_duration, f.rental_rate, f.special_features FROM film AS f LIMIT $actu, 15";
$req = $pdo->query($sql);
$film = $req->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['search'])){
    $search = $_GET['search'];
    $sql = "SELECT f.title, f.description, f.release_year, f.rental_duration, f.rental_rate, f.special_features FROM film AS f WHERE f.title LIKE '%$search%' LIMIT 15";
    $req = $pdo->query($sql);
    $film = $req->fetchAll(PDO::FETCH_ASSOC);   
};





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Document</title>

    <style>
        .center {
            width: 80%;
            margin: auto;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .card {
            margin: 2%;
            width: 20%;
        }
    </style>
</head>

<body>
    <nav>
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="index.php">Acceuil</a></li>
                <li class="active"><a href="listfilm.php?id=0">Films</a></li>
                <li><a href="listactor.php">Acteurs</a></li>
                <li><a href="mag.php">Nos Magasin</a></li>
                <li><a href="datafinance.php">Finance</a></li>
                <li><a href="categorie.php">Categorie</a></li>
            </ul>

        </div>

    </nav>

    <div class="nav-wrapper">
                        <form>
                            <div class="input-field">
                                <input id="search" type="search" name="search" required placeholder="Rechercher un film">
                                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                <i class="material-icons">close</i>
                            </div>
                        </form>
                    </div>

    <ul class="pagination right-align">
        <?php if($actu>0 ){?>
        <li class="waves-effect <?= $actu==0?'disabled':'' ?>"><a href="listfilm.php?id=<?php echo $actu - 15 ?>"><i
                    class="material-icons">chevron_left</i></a></li>
        <?php } ?>
        <li class="waves-effect"><a href="listfilm.php?id=<?php echo $actu + 15 ?>"><i
                    class="material-icons">chevron_right</i></a></li>
    </ul>

    <div class="center">
        <?php foreach($film as $album) : ?>
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="movie.jpeg">
            </div>
            <div class="card-content">
                <span class="card-title activator red-text text-lighten-1"><?= $album['title'] ?></span>
            </div>
            <div class="card-reveal">
                <span class="card-title red-text text-lighten-1"><?= $album['title'] ?></span>
                <p><?= $album['description'] ?></p>
                <ul class="collection">
                    <li class="collection-item">Date de sortie : <?= $album['release_year'] ?></li>
                    <li class="collection-item">Durée : <?= $album['rental_duration'] ?></li>
                    <li class="collection-item">Note : <?= $album['rental_rate'] ?></li>
                    <li class="collection-item"><?= $album['special_features'] ?></li>
                </ul>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <ul class="pagination right-align">
        <?php if($actu>0 ){?>
        <li class="waves-effect <?= $actu==0?'disabled':'' ?>"><a href="listfilm.php?id=<?php echo $actu - 15 ?>"><i
                    class="material-icons">chevron_left</i></a></li>
        <?php } ?>
        <!-- <li><?php echo $actu/15 ?></li> -->
        <li class="waves-effect"><a href="listfilm.php?id=<?php echo $actu + 15 ?>"><i
                    class="material-icons">chevron_right</i></a></li>
    </ul>

</body>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</html>