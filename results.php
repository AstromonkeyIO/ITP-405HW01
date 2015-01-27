<html>
    <head>
        <title>results</title>
	<link rel="stylesheet" href="main.css">                
    </head>
    
    <?php

    if(!isset($_GET['dvdTitle']))
    {
        header('Location:index.php');
    }

    $dvdTitle = $_GET['dvdTitle'];

    $host ='itp460.usc.edu';
    $dbname = 'dvd';
    $user = 'student';
    $password = 'ttrojan';

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

    $sql = "SELECT title, genre_name, format_name, rating_name FROM dvds INNER JOIN genres ON dvds.genre_id = genres.id INNER JOIN formats ON dvds.format_id = formats.id INNER JOIN ratings ON dvds.rating_id = ratings.id WHERE title LIKE ?";

    $statement = $pdo->prepare($sql);
    $like = '%' . $dvdTitle . '%';
    $statement->bindParam(1, $like);
    $statement->execute();
    $dvds = $statement->fetchAll(PDO::FETCH_OBJ);

    ?>
    <body>
        <center>
        <div style="margin:30px;">
        <?php foreach($dvds as $dvd) : ?>
        <div class="mainFont">
            <?php echo $dvd->title ?>
            <?php echo $dvd->genre_name ?>
            <a href="ratings.php?rating_name=<?php echo $dvd->rating_name ?>" class="searchButton"><?php echo $dvd->rating_name ?></a>
        </div>
        <?php endforeach ?>
        </div>
        </center>
    </body>
</html>


