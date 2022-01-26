<!DOCTYPE html>
    <head>
        <title> Ajouter Article</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="style.css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" >
        <script src="https://kit.fontawesome.com/c26cd2166c.js"></script>
         <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    </head>
<body>

<?php
include('navbar.php');
    if(isset($_POST['titreArticle'], $_POST['contenuArticle']))
        {
            if(!empty($_POST['titreArticle']) AND !empty($_POST['contenuArticle']))
            {
                $titreArticle= htmlspecialchars($_POST['titreArticle']);
                $contenuArticle= htmlspecialchars($_POST['contenuArticle']);

                $ajout = $bdd->prepare('INSERT INTO articles (titre,contenu, date_time_publication) VALUES(?,?, NOW())');
                $ajout->execute(array($titreArticle, $contenuArticle));
                $message=" votre article a bien été publié";
            }

        }
    else
        {
            $message= " Veuillez remplir tous les champs";
        }
?>
<main>
    <form method="post">
            <div class="container">
                <div class="row justify-content-md-center ">
                    <div class=" py-5">
                        <h1> Ajouter un article</h1>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    
                        <div class="form-group  col-lg-8">
                            <label for="titreArticle" class="form-label text-center">Titre de l'article</label>
                            <input type="text" class="form-control" id="titreArticle" name="titreArticle" required>
                        </div>
                    
                </div>
                <div class="row justify-content-md-center">
                   
                        <div class="form-group  col-lg-8">
                            <label for="contenuArticle" class="form-label">Contenu</label>
                            <textarea  class="form-control" id="contenuArticle" name="contenuArticle" required></textarea>
                        </div>
                    
                </div>                

                <div class="row justify-content-md-center">
                    <div class="form-group">
                        <button class="btn btn-primary"  type="submit" name="PublierArticle">Publier l'article</button>
                    </div>              
                </div>
            </div>
        </form>
  
        <?php if(isset($message)) { echo $message;} ?>
      </main>
      <?php
        include('footer.php');
        ?>
    
