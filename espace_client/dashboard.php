<?php
session_start();
include('../bdd/cnx.php');


function alertUser()
{
    ?>
        <div class="alert alert-danger">
            <h1 class="text-center">ALERTE !</h1>
            <p>Vous n'êtes pas autorisé à entrer sur cette page veuillez vous connecter !</p>
        </div>
    <?php
}


/* Récupération de l'id de l'utilisateur */

$email = $_SESSION['email'];

$sqlRecupId = "SELECT `id` FROM `coupart_user` WHERE `email` = :email";

$recupId = $db->prepare($sqlRecupId);

$recupId->bindvalue(':email', $email);

$recupId->execute();

$resultatId = $recupId->fetch();

$idClient = $resultatId['id'];

/* Récupération des rdv du client */

$sqlRecupRdv = "SELECT * FROM `coupart_rdv` WHERE `user_id` = :client_id";

$reqRecupRdv = $db->prepare($sqlRecupRdv);

$reqRecupRdv->bindvalue(':client_id', $idClient);

$reqRecupRdv->execute();

/* Fin de la récupération des rdv */

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Sandrine Coupart - Espace client Accueil</title>
  <!-- Styles CSS-->
  <link rel="stylesheet" href="../css/styles.css">
  <!-- Responsive -->
  <link rel="stylesheet" href="../css/responsive.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
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

            <div class="jumbotron jumbotron-fluid jumbotron-home">
                <div class="container">
                <h1 class="display-4">Bienvenue <?php echo $_SESSION['email']; ?></h1>
                <p class="lead">Voici votre espace client.</p>
            </div>
        </div>

        <h2>Mes rendez-vous :</h2>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center">À venir</h5>
                <?php

                if($reqRecupRdv->rowCount() > 0)
                {
                    while($rowRdv = $reqRecupRdv->fetch(PDO::FETCH_ASSOC))
                    {
                        ?>

                    <p class="card-text"><i class="bi bi-calendar3"></i><?= $rowRdv['date'] ?></p>
                    <p class="card-text"><i class="bi bi-clock"></i><?= $rowRdv['heure'] ?></p>
                    <a href="#" class="text-decoration-none"><button class="btn btn-success">Déplacer</button></a>
                    <a href="deleteRdv.php?id=<?=$rowRdv['id'] ?>" class="text-decoration-none"><button class="btn btn-danger">Annuler</button></a>

                    <?php
                    }
                }
                else
                {
                    echo 'Aucun rdv pour le moment.';
                }

                ?>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Passé</h5>
            </div>
        </div>

        <?php include('../includes/footer/footerAdminCnx.php'); ?>

<!-- Modal pour prendre un rdv -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Prendre un nouveau rdv</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="traitementRdv.php" method="POST">
                <table id="calendrierModal">
                    <thead>
                        <tr>
                            <input type="text" name="id_client" value="<?php echo $idClient; ?>" readonly>
                            <input type="date" name="date">
                            <input type="time" name="heure">
                            <textarea id="motif" name="motif"></textarea>
                            <button class="btn btn-primary" name="submit">Prendre rdv</button>
                        </tr>
                        </thead>
                        <tbody>
                    </tbody>
                    </form>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour voir les rdv -->

<div class="modal fade" id="modalAllRdv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tout les rdv avec Madame Coupart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php

                if($reqRecupRdv->rowCount() > 0)
                {
                    while($rowRdv = $reqRecupRdv->fetch(PDO::FETCH_ASSOC))
                {
                ?>

                    <p class="card-text"><i class="bi bi-calendar3"></i><?= $rowRdv['date'] ?></p>
                    <p class="card-text"><i class="bi bi-clock"></i><?= $rowRdv['heure'] ?></p>
                    
                <?php
                }
                }
                else
                {
                    echo 'Aucun rdv pour le moment.';
                }

                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>


        <?php
    }
    else
    {
        alertUser();
    }

    ?>

    
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../js/script.js"></script>
</html>