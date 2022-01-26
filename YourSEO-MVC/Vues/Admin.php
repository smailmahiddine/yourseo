<?php

                   
        include('navbar.php');
        $membres = $bdd->query('SELECT * FROM users');
        $articles = $bdd->query('SELECT id, titre, date_time_publication FROM articles');
        $messages = $bdd-> query('SELECT id, nom, prenom, mail, date_time, contenu FROM messages_recus');
        $images = $bdd-> query('SELECT id, nom, taille, type,descriptionImage FROM images');
    


?>

<!DOCTYPE html>
    <head>
        <title> Page Administrateur</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../style.css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" >
        <script src="https://kit.fontawesome.com/c26cd2166c.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>

<main>
    <h2 class="titre1 text-center py-5"> Bienvenue dans l'espace administrateur </h2>
        <div class="container">
                <div class="row justify-content-center">
                    <nav class="">
                        <div class="menuadmin">
                            <ul class="navbar">
                                <li class="nav-item p-3">
                                    <button type="button" class="btn1 px-3" onclick="show('adminUsers');">Gérer les Membres</button>
                                </li >
                                <li class=" nav-item p-3 ">
                                    <button type="button" class="btn1 px-3" onclick="show('adminArticles');">Gérer les Articles</button>
                                </li>
                                <li class="nav-item p-3">
                                    <button type="button" class="btn1 px-3" onclick="show('adminMessages');">Gérer les messages</button>
                                </li>
                                <li class="nav-item p-3">
                                   <button type="button" class="btn1 px-3" onclick="show('adminImages');">Gérer les images</button>
                                </li >
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="text-center py-5 my-3 border border-dark" id="adminUsers">
                        <div class="row justify-content-center ">
                            <div class="col-6">
                                <p class="h4"> Tableau des membres</p>
                            </div>
                            
                        </div>  
                        <table class="adminusers" id="adminUsers">
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Mail</th>
                                <th>Statut</th>
                                <th>Organisme</th>
                                <th>Mot de passe</th>
                                <th>Role</th>
                                <th>Bannir</th>

                            </tr>
                            <?php while($member = $membres->fetch(PDO::FETCH_NUM))
                                { echo "<tr>"; 
                                    foreach($member as $valeur)
                                    {
                                        echo "<td>".$valeur."</td>";
                                    }
                                    echo'<td class"><a href=bannir.php/?id='. $member[0]. '> X </a></td>';
                                    echo "</tr>";
                                }
                            ?>
                        </table>
                </div>
                <div class="text-center py-5 my-3 border border-dark" id="adminArticles">
                    <div class="row justify-content-center ">
                        <div class="col-3">
                            <p class="h4"> Gérer vos articles</p>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn1 px-3"><a href="nouvelArticle.php" >Nouvel Article</a></button>
                        </div>
                    </div>  

                    <table class="adminarticles"  >
                            <tr>
                                <th>Id</th>
                                <th>titre</th>
                                <th>date_time_publication</th>
                                <th>Modifier</th>
                                <th> Supprimer</th>
                            </tr>
                            <?php while($article = $articles->fetch(PDO::FETCH_NUM))
                                { echo "<tr>"; 
                                    foreach($article as $publication)
                                    {
                                        
                                        echo "<td>".$publication."</td>";
                                    }
                                                                            
                                    echo'<td><a href=modifierArticle.php/?id='. $article[0]. '> Modifier </a></td>';
                                    echo'<td><a href=supprimerArticle.php/?id='. $article[0]. '> Supprimer </a></td>';
                                    echo "</tr>";
                                    
                                }
                            ?>
                    </table>
                </div>
                <div class="text-center py-5 my-3 border border-dark" id="adminMessages"  >
                        <div class="row justify-content-center ">
                            <div class="col-6">
                                <p class="h4"> Tableau des messages reçus</p>
                            </div>
                        </div>  

                        <table class="messages_recus">
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th> Mail</th>
                                <th>Date  </th>
                                <th> Message</th>
                                <th> Supprimer</th>
                                
                            </tr>
                            <?php while($message = $messages->fetch(PDO::FETCH_NUM))
                                { echo "<tr>"; 
                                    foreach($message as $valeurs)
                                    {
                                        
                                        echo "<td>".$valeurs."</td>";
                                    }
                                                                            
                                    echo'<td class"><a href=supprimer_message.php/?id='. $message[0]. '> X </a></td>';
                                    
                                    echo "</tr>";
                                    
                                }
                            ?>
                        </table>
                </div>
                <div class="text-center py-5 my-3 border border-dark" id="adminImages">
                        <div class="row justify-content-center ">
                        <div class="col-3">
                            <p class="h4"> Gérer vos images</p>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn1 px-3"><a href="importerImage.php" >Ajouter Nouvelle image</a></button>
                        </div>
                    </div>   
                        <table class="adminImages" id="adminImages">
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Taille</th>
                                <th>Type</th>
                               
                                <th>Description de l'image</th>
                                <th>Supprimer</th>
                                
                            </tr>
                            <?php while($image = $images->fetch(PDO::FETCH_NUM))
                                { echo "<tr>"; 
                                    foreach($image as $valeurs)
                                    {
                                        
                                        echo "<td>".$valeurs."</td>";
                                    }
                                                                            
                                    echo'<td><a href=supprimer_Image.php/?id='. $image[0]. '> supprimer </a></td>';
                                    
                                    echo "</tr>";
                                    
                                }
                            ?>
                        </table>
                    
                </div>
        </div>
</main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdeliver.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
    <script src="../script.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>AOS.init();</script>
</html>
