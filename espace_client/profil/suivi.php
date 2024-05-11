<?php
session_start();
include('../../bdd/cnx.php');
include('../../admin/dev/functions.php');

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
  <title>Sandrine Coupart - Mon suivi</title>
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

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="../dashboard.php">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mon suivi</li>
            </ol>
        </nav>

        <h3 class="text-center">Votre page de suivi avec Madame Coupart</h3>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pour mieux vous connaître</h5>
                        <h6 class="card-subtitle">Veuillez entrer vos allergies :</h6>
                        <form action="traitementAddAllergies.php?id=<?php echo $idClient ?>" method="post">
                            <div class="mb-3">
                            <div class="form-check" name="allergie">
                                <input class="form-check-input" type="checkbox" id="arachides" name="arachides">
                                <label class="form-check-label" for="arachides">Arachides</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="noix" name="noix">
                                <label class="form-check-label" for="noix">Noix (ex : amandes, noisettes, noix de cajou)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="oeufs" >
                                <label class="form-check-label" for="oeufs">Œufs</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="poissons" name="poissons">
                                <label class="form-check-label" for="poissons">Poissons</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="porduits_laitiers" name="porduits_laitiers">
                                <label class="form-check-label" for="porduits_laitiers">Produits laitiers (ex : lait, fromage, yaourt)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="ble" name="ble">
                                <label class="form-check-label" for="ble">Blé (gluten)</label>
                            </div>
                            <div class="form-group">
                                Autres ? Si oui présciser
                                <textarea name="autres"></textarea>
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="btn_valid_allergies">Valider</button>
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
        noClient(); // On affiche le message d'erreur si la condition est FAUSSE !
    }

    ?>
</body>