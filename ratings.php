<html>
    <head>
        <title>ratings</title>        
        <link rel="stylesheet" href="main.css"> 
    </head>
    
    <?php

    if(!isset($_GET['rating_name']))
    {
        header('Location:index.php');
    }

    $rating_name = $_GET['rating_name'];


    $host ='itp460.usc.edu';
    $dbname = 'dvd';
    $user = 'student';
    $password = 'ttrojan';

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

    $sql = "SELECT title, genre_name, format_name, rating_name FROM dvds INNER JOIN genres ON dvds.genre_id = genres.id INNER JOIN formats ON dvds.format_id = formats.id INNER JOIN ratings ON dvds.rating_id = ratings.id WHERE rating_name='$rating_name'";

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $dvds = $statement->fetchAll(PDO::FETCH_OBJ);

    ?>

    <center>
    <div style="margin:15px;" class="mainFont">
        Results for Rating <?php echo $rating_name?>
    <?php foreach($dvds as $dvd) : ?>
    <div class="mainFont">
        <?php echo $dvd->title ?>
        <?php echo $dvd->genre_name ?>
        <a href="ratings.php?rating_name=<?php echo $dvd->rating_name ?>" class="searchButton"><?php echo $dvd->rating_name ?></a>
    </div>
    <?php endforeach ?>
    </div>
    </center>
    
</html>