<?php 
include ('db.php');
// traitement données formulaire 
    
    if(isset($_POST['contactForm'])) 
        {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $mail = htmlspecialchars($_POST['mail']);
            $contenu = htmlspecialchars($_POST['contenu']);
              
                $insertmessage = $bdd->prepare("INSERT INTO messages_recus(nom, prenom, mail, contenu) VALUES(?, ?, ?, ?)");
                $insertmessage->execute(array($nom, $prenom,  $mail, $contenu));
        }
?>
<!DOCTYPE html>
    <head>
        <title> Seo For You </title>
        <meta charset="utf-4">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="style.css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" >
        <script src="https://kit.fontawesome.com/c26cd2166c.js"></script>
         <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    </head>
    <body>
    

<!-- navabar -->
        <?php
      
        include ("navbar.php");
        ?>
        <main>
            <div class="text-center py-5 text-success">
                     
                       <h4>  "Merci de nous avoir contacté, nous nous éfforcerons de vous répondre dans les plus brefs délais  !";</h4>
                        <button type="button"  onclick="myFunction6()"  class="btn1">Revenir à a page d'accueil</button>
            </div>
            
        </main>
                    

<!-- footer -->
    <?php
    include('footer.php');
    ?>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdeliver.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
        <script src="script.js"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</html>