<?php

if(isset($_POST['form_inscription'])) 
        {
                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $mail = htmlspecialchars($_POST['mail']);
                $statut = htmlspecialchars($_POST['statut']);
                $organisme = htmlspecialchars($_POST['organisme']);
                $telephone = htmlspecialchars($_POST['telephone']);
                $mdp = sha1($_POST['pswd_inscription']);
                $mdp2 = sha1($_POST['pswd_inscriptionconfirm']);
               

               

                if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail'])  AND !empty($_POST['pswd_inscription']) AND !empty($_POST['pswd_inscriptionconfirm'])) 
                        {
            
                                if(filter_var($mail, FILTER_VALIDATE_EMAIL)) 
                                {
                                        $reqmail = $bdd->prepare("SELECT * FROM users WHERE mail = ?");
                                        $reqmail->execute(array($mail));
                                        $mailexist = $reqmail->rowCount();

                                                if($mailexist == 0) 
                                                {                                     
                                                                if ($mdp == $mdp2)
                                                                {
                                                                        $insertmbr = $bdd->prepare("INSERT INTO users(nom, prenom, statut, organisme, mail, motdepasse) VALUES(?, ?, ?, ?, ?, ?)");
                                                                        $insertmbr->execute(array($nom, $prenom, $statut, $organisme, $mail, $mdp));
                                                                        $erreur = "Votre compte a bien été créé !";
                                                                        
                                                                }
                                                                else
                                                                {
                                                                        $erreur="les deux mots de passe ne sont pas identiques";
                                                                }          
                                                } 
                                                else 
                                                {
                                                        $erreur = "Adresse mail déjà utilisée !";
                                                }
                                } 
                                else 
                                {
                                        $erreur = "Votre adresse mail n'est pas valide !";
                                }
                        }
                
        } 
        else 
        {
            $erreur = "Tous les champs doivent être complétés !";
        }
?>