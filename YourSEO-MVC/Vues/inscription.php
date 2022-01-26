<!DOCTYPE html>
<html>
    
    <body>
        <?php
        include('../Vue/head.php');
        include ('../Vue/navbar.php');
        include("testsaisieinscription.php");
        ?>
    <main class="mb-5">
        <div class="container">
            <form method="post">
                <div class="well">
                    <div class="row text-center">
                        <div class="col-md-offset-2 col-md-10 py-5">
                            <h1> Page d'inscription<br/><small> Merci de renseigner vos informations </small></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-offset-2 col-md-6 py-1">
                            <div class="form-group">
                                <label for="Nom" class="form-label">Votre Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>
                        </div>
                        <div class="col-offset-2 col-md-6 py-1" >
                            <div class="form-group">
                                <label for="prenom" class="form-label">Votre Prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-offset-1 col-md-6 py-1">
                            <div class="form-group">
                                <label for="statut" class="form-label">Vous êtes</label>
                                <select name="statut" id="statut" name="statut" class="form-control">
                                    <option value="particulier">Particulier</option>
                                    <option value="Etudiant">Etudiant</option>
                                    <option value="professionnel">Professionnel</option>
                                    <option value="autre"> Autre</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-offset-1 col-md-6 py-1">
                            <div class="form-group">
                                <label for="organisme" class="form-label">Organisme</label>
                                <input type="text" class="form-control" name="organisme" id="organisme" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-offset-1 col-md-6 py-1">                 
                            <label for="mail" class="form-label" >Email</label>
                            <input type="mail" class="form-control" id="mail" name="mail" required>
                            
                                    
                        </div>
                        <div class="col-offset-1 col-md-6 py-1">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="+33 6 XX XX XX XX">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-offset-1 col-md-6 py-1">
                            <label for="pswd_inscription" class="form-label" >Mot de passe</label>
                            <input type="mail" class="form-control" id="pswd_inscription" name="pswd_inscription">
                        </div>
                        <div class="col-offset-1 col-md-6 py-1">
                            <label for="pswd_inscriptionconfirm" class="form-label" >Confirmation Mot de passe</label>
                            <input type="mail" class="form-control" id="pswd_inscriptionconfirm" name="pswd_inscriptionconfirm" required>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6 py-1">
                            <button class="btn btn-primary" onclick="valider()" type="submit" name="form_inscription">Soumettre</button>
                        </div>              
                    </div>
                    </div>
                </div>
                 <?php if(isset($erreur))
                        {
                            echo '<font color="red">'.$erreur."</font>";
                        }
                ?>
            </form>
                
        </div>
    </main>
       </body>


    <!-- footer-->
    <?php
    include("../Vue/footer.php");
    ?>
 
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdeliver.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
        <script src="script.js"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</html>