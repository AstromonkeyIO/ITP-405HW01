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

    //return json_encode($dvds);
    
    /*
    $bar = array();
    foreach ($dvds as $dvd) 
    {
        foreach ($dvd as $k => $v) 
        {
            
            $bar[$k] = $v;
            
        }
    }
     * */
 
    return json_encode($bar, 'JSON_PRETTY_PRINT');
