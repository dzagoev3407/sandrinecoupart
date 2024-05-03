<?php
session_start();
include('../../bdd/cnx.php');
$home = '../dashboard.php';

$sql = "SELECT * FROM `coupart_recettes`";

$req = $db->query($sql);

$recettes = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une recette</title>
    <!-- Styles CSS-->
    <link rel="stylesheet" href="../../css/styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-light">
  <h1 class="title-navbar">Sandrine Coupart</h1>
</nav>
<ol class="breadcrumb bg-light">
    <li class="breadcrumb-item"><a class="text-decoration-none" href="<?php echo $home ?>">Panel</a></li>
    <li class="breadcrumb-item active" aria-current="page">Modifier une recette</li>
</ol>

<div class="row">
  <?php foreach($recettes as $recette): ?>
    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="<?php echo $recette['img'] ?>" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?php echo $recette['nom'] ?></h5>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#popup-action_<?php echo $recette['id']; ?>">Action</a>
          <br>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#popup_<?php echo $recette['id']; ?>">
              Plus d'infos
          </button>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<!-- Modals -->
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

<!-- Pop up pour les actions SUPPRIMER MODIFIER ETC... -->
<?php foreach($recettes as $recette): ?>
<div class="modal fade" id="popup-action_<?php echo $recette['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="popupTitle_<?php echo $recette['id']; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="popupTitle_<?php echo $recette['id']; ?>"><?php echo $recette['nom']; ?></h5>
        <button type="button" class="close" data-dismiss="modal-action" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <h6 class="text-danger text-center">Supprimer la recette</h6>
        <div class="text-center">
          <button class="btn btn-danger"><a class="text-decoration-none text-white" href="deleteRecipe.php?id=<?php echo $recette['id']; ?>">Supprimer</a></button>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<?php

/* Affichage des recettes à la une */

$sqlDisplayRecipeUne = "SELECT coupart_recettes.id, coupart_recettes.nom, coupart_recettes.desc_recette, coupart_recettes.img
                        FROM coupart_recettes_alaune
                        INNER JOIN coupart_recettes ON coupart_recettes_alaune.id_recette_principal = coupart_recettes.id";

$aLaUne = $db->query($sqlDisplayRecipeUne);

if ($aLaUne->num_rows > 0) {
    while ($row = $aLaUne->fetch_assoc()) {
        echo "<h2>" . $row["nom"] . "</h2>";
        echo "<p>" . $row["desc_recette"] . "</p>";
        echo '<img src="' . $row["img"] . '" alt="Image de la recette">';
    }
} else {
    echo "Aucune recette à la une trouvée.";
}

?>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>