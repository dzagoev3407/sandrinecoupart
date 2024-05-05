<?php
include('../../bdd/cnx.php');

if(isset($_POST['envoi-comment']))
{
    $name = htmlspecialchars($_POST['nom-comment']);
    $email = htmlspecialchars($_POST['email-comment']);
    $message = htmlspecialchars($_POST['message-comment']);
    $etat = 0;

    if(!empty($name) && !empty($email) && !empty($message))
    {
        $sql = "INSERT INTO `coupart_comment`(`nom`, `email`, `message`, `etat`) 
                VALUES (:nom, :email, :message, :etat)";

        $req = $db->prepare($sql);

        $req->bindvalue(':nom', $name);
        $req->bindvalue(':email', $email);
        $req->bindvalue(':message', $message);
        $req->bindvalue(':etat', $etat);

        $envoi = $req->execute();

        if($envoi == true)
        {
            ?>
                <div class="alert alert-success" role="alert">
                    <p class="lead">Commentaire au nom de <?php echo $name ?> a bien été envoyé ! Merci ! :)</p>
                </div>
                <div class="text-center">
                    <a class="text-decoration-none text-white" href="../../index.php"><button class="btn btn-primary">Retour</button>
                </div>
            <?php
        }
        else
        {
            ?>
                <div class="alert alert-danger" role="alert">
                    <p class="lead">Commentaire non ajouté !</p>
                </div>
            <?php
        }
    }
    else
    {
        echo 'Erreur lors de la saisie de vos données !';
    }
}

?>

<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Sandrine Coupart - Commentaire ajouté !</title>
<!-- Styles CSS-->
<link rel="stylesheet" href="../../css/styles.css">
<!-- Responsive -->
<link rel="stylesheet" href="../../css/responsive.css">
<!-- Bootstrap -->
<link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
<!-- Bootstrap icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
</body>
</html>