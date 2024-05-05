<?php
session_start();
include('../../bdd/cnx.php');

if(isset($_POST['envoyer']))
{
    $url = $_POST['url-img'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $etapes = $_POST['etapes'];

    if(!empty($url) && !empty($nom) && !empty($description) && !empty($etapes))
    {
        $sql = "INSERT INTO `coupart_recettes`(`nom`, `desc_recette`, `etapes`, `img`) 
                VALUES (:nom, :description, :etapes, :url)";

        $req = $db->prepare($sql);

        $req->bindvalue(':nom', $nom);
        $req->bindvalue(':description', $description);
        $req->bindvalue(':etapes', $etapes);
        $req->bindvalue(':url', $url);

        $envoi = $req->execute();

        if($envoi)
        {
            ?>
                <div class="alert alert-success" role="alert">
                    <h1 class="text-center">Succès</h1>
                    <p class="lead">La recette de <?php echo $nom ?> a bien été ajoutée dans la BDD !</p>
                </div>
            <?php
        }
        else
        {
            ?>
                <div class="alert alert-danger" role="alert">
                    <h1 class="text-center">ALERTE !</h1>
                    <p class="lead">Recette non ajoutée... Veuillez réesayez !</p>
                </div>
            <?php
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recette envoyé</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>
<body>
</body>
</html>