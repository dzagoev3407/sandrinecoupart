<?php
session_start();
include('../bdd/cnx.php');
include('dev/stats.php');

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Sandrine Coupart - Espace administrateur</title>
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

if($_SESSION['pseudo'])
{
?>

<nav class="navbar navbar-light">
  <h1 class="title-navbar">Sandrine Coupart - Espace administrateur</h1>
</nav>

<?php include('../includes/navMenu/homeAdmin.php'); ?>

<div class="jumbotron jumbotron-fluid jumbotron-home">
  <div class="container">
    <h1 class="display-4">Bienvenue <?php echo $_SESSION['pseudo']; ?></h1>
    <p class="lead">C'est ici que vous pouvez tout gérer le contenu du site !</p>
  </div>
</div>

<br>
<div class="container">
  <h2>Statistiques du site actuellement :</h2>

  <div class="stats-dashboard">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <div class="text-center icon-stats-card">
          <i class="bi bi-person-gear"></i>
        </div>
        <h5 class="card-title text-center">Administrateur :</h5>
        <!--Ceci va m'afficher le nombre d'administrateur inscrits dans ma bdd -->
        <p class="font-weigth-bold text-center"><?php echo $countAdmin['id']; ?></p>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <div class="text-center icon-stats-card">
          <i class="bi bi-person-fill"></i>
        </div>
        <h5 class="card-title text-center">Clients inscrits :</h5>
        <p class="font-weigth-bold text-center"><?php echo $countClients['id']; ?></p>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <div class="text-center icon-stats-card">
          <i class="bi bi-person-fill"></i>
        </div>
        <h5 class="card-title text-center">Recettes disponibles sur le site :</h5>
      </div>
    </div>
  </div>
</div>

<?php

include('../includes/footer/footerAdminCnx.php');

}
else
{
    ?>
        <div class="alert alert-danger">
            <h1 class="text-center">ALERTE !</h1>
            <p class="lead">Vous n'êtes actuellement pas connecté en tant qu'administrateur !</p>
        </div>
    <?php
}

?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>