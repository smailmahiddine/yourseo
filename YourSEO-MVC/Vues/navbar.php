<?php
include_once ('config/db.php');
session_start();

?>

<!-- navabar -->
<nav class="navbar navbar-expand-md ">
            <a href="../controller/home.php"><img src='../images/logofinal.jpeg' class="seo px-0"></img></a>
            <!-- button collapse -->
            <button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav"> <span><i class="fa fa-align-justify" title="Align Justify"></i></span></button>

        <div class="collapse navbar-collapse justify-content-between" id="nav" >
             <!-- collapse faire disparaitre les elements dans tous les cas --> 
             <!-- justify-content-between  occuper tout lespace avec espace entre les deux div -->
            <ul class="navbar-nav pl-3">
                <li class="nav-item"><a class="nav-link text-uppercase " href="#">Presentation</a></li>
                <li class="nav-item"><a class="nav-link text-uppercase" href="../Vue/articles.php">Articles</a></li>
                <li class="nav-item"><a class="nav-link text-uppercase" href="#contact_section">Nous contacter</a></li>               
            </ul>
            
        <div >
                <?php 
                if(isset($_SESSION['id']) AND $_SESSION['id']>0)
                {
                    if($_SESSION['role'] === '1')
                        {
                            ?>
                            <Button type ="button" class="btn1 btn-sm btn-success "  > Bienvenue  <?php echo $_SESSION['nom']; ?></button>
                            <button type="button" onclick="myFunction7()" class="btn1 btn-sm btn-secondary"> Accéder à votre espace</button>
                            <button type="button"  onclick="myFunction5()"  class="btn1    btn-sm btn-danger  text-uppercase ">Deconnexion</button>
                        <?php
                        }
                    else{
                    
                        ?>
                            <Button type ="button" class="btn1 btn-sm btn-success "  > Bienvenue dans votre espace <?php echo $_SESSION['nom']; ?></button>
                            <button type="button"  onclick="myFunction5()"  class="btn1    btn-sm btn-danger  text-uppercase ">Deconnexion</button>
                        <?php
                        }
                }
                else
                {
                    ?>
                <button type="button"  onclick="myFunction1()"  class="btn1    btn-sm text-uppercase" id="mdpusers">Mon Compte</button>
                <button type="button"  onclick="myFunction2()"  class="btn1    btn-sm text-uppercase ">Inscription</button>
                <?php
                }
                ?>

            </div>
        </div>
</nav>