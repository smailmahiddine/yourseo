
<!DOCTYPE html>
    <?php
    include('../Vue/head.php');
      include('navbar.php');
      include("db.php");
    
        if(isset($_POST['se_connecter'])) 
        {          
            $mailconnect = htmlspecialchars($_POST['mailUtilisateur']);
            $mdpconnect = sha1($_POST['mdpUtilisateur']);
            
            if(!empty($mailconnect) AND !empty($mdpconnect)) 
                {
                    $requser = $bdd->prepare("SELECT * FROM users WHERE mail = ? AND motdepasse = ?");
                    $requser->execute(array($mailconnect, $mdpconnect));
                    $userexist = $requser->rowCount();
                 
                        if($userexist == 1) 
                            {         
                                        $userinfo = $requser->fetch();                              
                                        $_SESSION['id'] = $userinfo['id'];
                                        $_SESSION['nom'] = $userinfo['nom'];
                                        $_SESSION['mail'] = $userinfo['mail'];
                                        $_SESSION['role'] = $userinfo['role'];
                                        header('LOCATION: index.php');
                            }
                                             
                        else 
                        {
                            $erreur = "Mauvais mail ou mot de passe !";
                        }
                } 
                else                
                {
                    $erreur = "Tous les champs doivent être complétés !";
                }
        }      
?>
       <!-- formulaire connexion -->
<main>
    <div class="container mt-5">
                <h1 class="text-center py-3">Bienvenue sur votre espace</h1>
                <h3 class="text-center py-3">Merci de saisir vos identifiants</h3>    
                <form   method="post" name="form">
                    <div class="row row justify-content-center ">
                        <div class="col-md-6 py-3">
                            <label for="mailUtilisateur" class="form-label">Adresse Mail</label>
                            <input type="email" class="form-control" id="mailUtilisateur" name="mailUtilisateur" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row row justify-content-center ">
                        <div class="col-md-6 py-3">
                            <label for="mdpUtilisateur" class="form-label"> Mot de passe</label>
                            <input type="password" class="form-control" id="mdpUtilisateur" name="mdpUtilisateur" autocomplete="off" required>
                        </div> 
                    </div>
                    <div class="row row justify-content-center ">
                        <div class="col-md-6 py-3">
                        <label for="confmdpUtilisateur" class="form-label">Confirmation Mot de passe</label>
                        <input type="password" class="form-control" id="confmdpUtilisateur" name="confmdpUtilisateur" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row row justify-content-center "> 
                        <div class="col-md-6 py-3  text-center">
                            <button  class="btn4 btn-primary mb-5"  type="submit" name="se_connecter">Soumettre</button>
                        </div>
                    </div>
                </form>
                
                <?php
                    if(isset($erreur))
                    { 
                        echo "<font color=red>".$erreur."</font>";
                    }
                ?>
            </div>
</main>

<?php
include ("../Vue/footer.php");
?>

</body>
</html>