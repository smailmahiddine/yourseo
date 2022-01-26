<!DOCTYPE html>
    <head>
        <title> Page modification articles</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="style.css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" >
        <script src="https://kit.fontawesome.com/c26cd2166c.js"></script>
         <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    </head>
<body>

<main>
<?php

include('navbar.php');
if(isset($_GET['id']) AND !empty($_GET['id']))
    {
        $getid = $_GET['id'];
        $recupArticle = $bdd->prepare('SELECT * FROM articles WHERE id=?');
        $recupArticle->execute(array($getid));
        if($recupArticle->rowCount()>0)
            {
                $deleteArticle = $bdd->prepare('DELETE FROM articles where id=?');
                $deleteArticle->execute(array($getid));
                header("location: /Admin.php");

            }
    }
else
    {
        echo " aucun article trouvé";
    }
 

?>
</main>
<?php
include('footer.php');
?>
</body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdeliver.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
    <script src="script.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>AOS.init();</script>
</html>
