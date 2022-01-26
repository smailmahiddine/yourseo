<!DOCTYPE html>
    <head>
        <title> Importer Image</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../style.css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" >
        <script src="https://kit.fontawesome.com/c26cd2166c.js"></script>
         <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    </head>
<body>

<?php
include('navbar.php');
if(isset($_POST['upload']))
{
    $images = $_FILES['image'];
    $image= file_get_contents($_FILES['image']['tmp_name']);
    $nom = $_FILES['image']['name'];
    $taille = $_FILES['image']['size'];
    $type = $_FILES['image']['type'];
    $descriptionImage = $_POST['descriptionImage'];
    $temporaire=$_FILES['image']['tmp_name'];
   
        if($taille>5000000)
        {
            $msg="désolé, votre image est trop volumineuse";
        }
        else
        {
            $formatAutorise = array("jpg", "jpeg", "png");
            $imgExtension = pathinfo($nom, PATHINFO_EXTENSION);
			$imagextension = strtolower($imgExtension);

            if(in_array($imagextension, $formatAutorise))
            {   
                $dossierImage='./images/'.$nom;
                move_uploaded_file($temporaire, $dossierImage);

                $importImage = $bdd->prepare('INSERT INTO  images( nom, taille, type, descriptionImage, bin) VALUES(?, ?, ?, ?, ?)');
                $importImage->execute(array($nom, $taille, $type, $descriptionImage, $image,));
                $msg=" image ajoutée à votre base de données!!";
            }
            else
            {
                $msg = "ce format n'est pas autorisé";
            }
        }
}
    

?>
<main>
    <form method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="row justify-content-md-center ">
                    <div class=" py-5">
                        <h1> Ajouter Image</h1>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                        <div class="form-group  col-lg-8">
                            <textarea type="text" class="form-control"   name="descriptionImage" placeholder="Merci d'ajouter une déscription de l'image" ></textarea>
                        </div>
                </div>
                <div class="row justify-content-md-center">
                        <div class="form-group  col-lg-8">
                            <input type="file" class="form-control"  name="image" required>
                        </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="form-group">
                        <button class="btn btn-primary"  type="submit" name="upload" >insérer Image dans la base de données </button>
                    </div>              
                </div>
            </div>
                <?php
                    if(isset($msg))
                    { 
                        echo "<font color=red>".$msg."</font>";
                    }
                ?>
            <div>

        </form>
      </main>
      <?php
        include('footer.php');
        ?>