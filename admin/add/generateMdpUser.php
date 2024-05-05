<?php
include('../../bdd/cnx.php');

if(isset($_GET['token']))
{
    $token = $_GET['token'];

    /* Une fois le token récupéré on va vérifier si c'est le bon token dans la BDD */

    $sql = "SELECT `id`, `token_password` FROM `coupart_user` WHERE `token_password` = :token";

    $req = $db->prepare($sql);

    $req->bindvalue(':token', $token);

    $displayToken = $req->execute();

    /* On récupère l'id du client */

    $rowAdmin = $req->fetch(PDO::FETCH_ASSOC);

    $user_id = $rowAdmin['id'];

}
else
{
    echo 'non';
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Espace administrateur - Choisir votre mot de passe</title>
  <!---Styles CSS--->
  <link href="../../css/styles.css" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="../../css/bootstrap/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-light">
    <h1 class="title-navbar">Sandrine Coupart - Espace Client</h1>
</nav>

<?php

if($req->rowCount() > 0)
    {
        ?>
            <div class="container mt-5">
                <div class="row justify-content-center">
                 <div class="col-md-6">
                     <div class="card">
                         <div class="card-body">
                            <h5 class="card-title">Choisissez votre mot de passe</h5>
                             <form action="passwordUserTraitement.php?id=<?php echo $user_id ?>" method="post">
                            <div class="mb-3">
                                <label for="password" class="form-label">Nouveau mot de passe</label>
                                <input type="password" class="form-control" id="mdp" name="mdp" required>
                            </div>
                        <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirmer le mot de passe</label>
                         <input type="password" class="form-control" id="confirm_mdp" name="confirm_mdp" required>
                        </div>
                    <button type="submit" class="btn btn-primary" name="btn_password_reset">Valider</button>
                    </form>
                </div>
            </div>
          </div>
        </div>
    </div>
  <?php
    }
    else
    {
        echo 'Token inconnu !';
    }

?>

</body>