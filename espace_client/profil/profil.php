<?php
session_start();
include('../../bdd/cnx.php');

/* Récupération de l'id de l'utilisateur */

$email = $_SESSION['email'];

$sqlRecupId = "SELECT `id` FROM `coupart_user` WHERE `email` = :email";

$recupId = $db->prepare($sqlRecupId);

$recupId->bindvalue(':email', $email);

$recupId->execute();

$resultatId = $recupId->fetch();

$idClient = $resultatId['id'];

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Sandrine Coupart - Mon profil</title>
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
    <?php

    if($_SESSION['email'])
    {
        ?>
        <nav class="navbar navbar-light">
            <h1 class="title-navbar">Sandrine Coupart - Espace Client</h1>
        </nav>

        <?php include('../includes/navMenu/homeClient.php'); ?>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard.php">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mon profil</li>
            </ol>
        </nav>

        <h3 class="text-center">Changer vos informations :</h3>


        <div class="jumbotron jumbotron-fluid jumbotron-home">
            <div class="container">
            <h1 class="display-4">Connecté en tant que : <?php echo $_SESSION['email']; ?></h1>
            <p class="lead">Voici votre espace client.</p>
        </div>
    </div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Changer votre adresse email</h5>
                    <form action="traitementChangeEmail.php?id=<?php echo $idClient ?>" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Nouvel adresse email :</label>
                            <input type="email" class="form-control" id="email" name="email" required />
                        </div>
                        <div class="mb-3">
                            <label for="confirm_email" class="form-label">Confirmer l'adresse email</label>
                            <input type="email" class="form-control" id="confirm_email" name="confirm_email" required />
                        </div>
                        <button type="submit" class="btn btn-primary" name="btn_email_reset">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Changer votre mot de passe</h5>
                    <form action="../../admin/add/passwordUserTraitement.php?id=<?php echo $idClient ?>" method="post">
                        <div class="mb-3">
                            <label for="password" class="form-label">Nouveau mot de passe</label>
                            <input type="password" class="form-control" id="mdp" name="mdp" required />
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirmer le mot de passe</label>
                            <input type="password" class="form-control" id="confirm_mdp" name="confirm_mdp" required />
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

    ?>
</body>
</html>