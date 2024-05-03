<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Sandrine Coupart - Accueil</title>
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
<main>
<nav class="navbar navbar-light">
  <h1 class="title-navbar">Sandrine Coupart</h1>
</nav>

<?php include('includes/navMenu/apropos.php') ?>

<!-- Jumbotron -->
<div class="p-5 text-center bg-image rounded-3 jumbotron-home">
  <div class="mask-jumbotron" style="background-color: rgba(0, 0, 0, 0.6);">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="text-white">
        <h1 class="mb-3">A propos</h1>
        <p class="lead">Cette page est destinée à montrer toutes les informations sur Sandrine Coupart</p>
      </div>
    </div>
  </div>
</div>
<!-- Jumbotron -->
<div class="intro-biography">
    <h1 class="text-center">COUPART Sandrine</h1>
    <p class="text-center font-italic">diététicienne-nutritionniste</p>
</div>

<div class="biography-coupart">
  <h2>Qui suis-je ?</h2>
  <p class="lead">Je m'appelle COUPART Sandrine, je suis actuellement diététicienne-nutritionniste, mon cabinet est basé à Caen, je fais de différents services.
    <br>
    Voici mes différents services :
      <ul class="list-group">
        <li class="list-group-item">Évaluation nutritionnelle personnalisée</li>
        <li class="list-group-item">Éducation nutritionnelle</li>
        <li class="list-group-item">Gestion du poids</li>
        <li class="list-group-item">Collaboration interprofessionnelle</li>
      </ul>
  </p>
<h2>Mes diplômes :</h2>
<div class="row">
  <div class="col-md-4">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <div class="text-center">
          <i class="bi bi-award-fill"></i>
          <h5 class="card-title">Diplôme 1</h5>
          <h6 class="card-subtitle mb-2 text-muted">1995</h6>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <div class="text-center">
          <i class="bi bi-award-fill"></i>
          <h5 class="card-title">Diplôme 2</h5>
          <h6 class="card-subtitle mb-2 text-muted">1998</h6>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <div class="text-center">
          <i class="bi bi-award-fill"></i>
          <h5 class="card-title">Diplôme 3</h5>
          <h6 class="card-subtitle mb-2 text-muted">2002</h6>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<?php include('includes/footer/footerHome.php') ?>
</main>
</body>
<script src="js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>