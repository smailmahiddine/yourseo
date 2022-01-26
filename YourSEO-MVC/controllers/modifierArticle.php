<!DOCTYPE html>
    <head>
        <title> Page modification articles</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../style.css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" >
        <script src="https://kit.fontawesome.com/c26cd2166c.js"></script>
         <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    </head>
<body>


<?php
include('../navbar.php');
if(isset($_GET['id']) AND !empty($_GET['id']))
    {
        $getid = $_GET['id'];
       
       
        $recupArticle = $bdd->prepare('SELECT * FROM articles WHERE id= ?');
        $recupArticle->execute(array($getid));
        
       

        if($recupArticle->rowCount()>0)
            {
                
              $articleInfos = $recupArticle->fetch();
              $titre = $articleInfos['titre'];  
              $contenu = $articleInfos['contenu']; 
              if(isset($_POST['PublierArticle']))
                {
              $titre_modifie = htmlspecialchars($_POST['titreArticle']);
              $contenu_modifie = htmlspecialchars($_POST['contenuArticle']);
              
              $updateArticle= $bdd->prepare('UPDATE articles SET titre= ?, contenu= ? WHERE id = ?');
              $updateArticle->execute(array($titre_modifie, $contenu_modifie, $getid));
              header('location: /articles.php');
                }
                
            }
    }
else
    {
        echo " aucun article trouvé";
    }
?>
<body>    
    <main>
        <form method="POST"  >
            <div class="container">
                <div class="row justify-content-md-center ">
                    <div class=" py-5">
                        <h1> Modifier l'article</h1>

                    </div>
                </div>
                <div class="row justify-content-md-center">
                    
                        <div class="form-group  col-lg-8">
                            <label for="titreArticle" class="form-label text-center">Titre de l'article</label>
                            <input type="text" class="form-control" id="titreArticle" name="titreArticle" value="<?=  $titre; ?>">
                        </div>
                    
                </div>
                <div class="row justify-content-md-center">
                   
                        <div class="form-group  col-lg-8">
                            <label for="contenuArticle" class="form-label">Contenu</label>
                            <textarea  class="form-control" id="contenuArticle" name="contenuArticle" > <?= $contenu; ?></textarea>
                        </div>
                    
                </div>
                <div class="row justify-content-md-center">
                    <div class="form-group">
                        <button class="btn btn-primary"  type="submit" name="PublierArticle">Publier l'article</button>
                    </div>              
                </div>
            </div>
        </form>

    </main>
<?php
    include('../footer.php');
?>
