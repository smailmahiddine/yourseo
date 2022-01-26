<?php

$bdd = new pdo('mysql:host=localhost;dbname=checkhotelprices', 'root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    if(!$bdd){
        echo "echec de connexion à la base de données";
        exit();
    }


?>

