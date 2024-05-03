<?php
include('bdd/cnx.php');

/* Affichage des recettes */

$sql = "SELECT * FROM `coupart_recettes`";

$req = $db->query($sql);

$recettes = $req->fetchAll();

?>

<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="description" content="Sandrine Coupart diététicienne-nutritionniste">
<meta name="keywords" content="Sandrine Coupart, Caen, site diététicienne-nutritionniste, diététicienne à caen, kevinbonnefoy.fr">
<meta name="author" content="Bonnefoy Kévin">
<title>Sandrine Coupart - Mes recettes</title>
<!-- Styles CSS-->
<link rel="stylesheet" href="css/styles.css">
<!-- Responsive -->
<link rel="stylesheet" href="css/responsive.css">
<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
<!-- Bootstrap icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<nav class="navbar navbar-light">
    <h1 class="title-navbar">Sandrine Coupart - Mes recettes</h1>
</nav>

<?php include('includes/navMenu/contact.php'); ?>

<!-- Jumbotron -->
<div class="p-5 text-center bg-image rounded-3 jumbotron-home">
  <div class="mask-jumbotron" style="background-color: rgba(0, 0, 0, 0.6);">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="text-white">
        <h1 class="mb-3">Mes recettes</h1>
        <p class="lead">Voici toutes les recettes proposées par Madame Coupart</p>
      </div>
    </div>
  </div>
</div>
<!-- Jumbotron -->

<div class="container mt-5">
  <div class="row">
    <?php foreach($recettes as $recette): ?>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <img class="img-recipe-card" src="<?php echo $recette['img'] ?>">
          <h3 class="text-center"><?php echo $recette['nom'] ?></h3>
            <div class="text-center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#popup_<?php echo $recette['id']; ?>">
                    Voir +
                </button>
            </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<?php include('includes/footer/footerHome.php'); ?>

<!-- Modals des détails des recettes -->
<?php foreach($recettes as $recette): ?>
<div class="modal fade" id="popup_<?php echo $recette['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="popupTitle_<?php echo $recette['id']; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="popupTitle_<?php echo $recette['id']; ?>"><?php echo $recette['nom']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="desc-recipe">
          <h6>Description de la recette :</h6>
          <p class="lead"><?php echo $recette['desc_recette']; ?></p>
        </div>
        <div class="stage-recipe">
          <h6>Étapes de la recette :</h6>
          <ol class="lead">
            <?php

            $echelon = explode('\n', $recette['etapes']);

            foreach($echelon as $echelons)
            {
              "<li>$echelons</li>";
            }

            ?>
          </ol>
          <p class="lead"><?php echo $recette['etapes']; ?></p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>