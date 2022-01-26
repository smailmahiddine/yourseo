<?php
session_start();
include('db.php');
if(isset($_GET['id'])  AND !empty($_GET{'id'}))
    {
        $getid = $_GET['id'];
        $recupUser = $bdd->prepare('SELECT * FROM users WHERE id=?');
        $recupUser->execute(array($getid));
        $bannirUser = $bdd->prepare(' DELETE FROM users WHERE id=?');
        $bannirUser->execute(array($getid));
        header('location: /Admin.php');
    }
else{
    echo " la suppression a echoué";
    }


?>