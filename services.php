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

<!-- Barre de navigation -->
<?php include('includes/navMenu/services.php') ?>

<!-- Jumbotron de la page d'accueil -->

<div class="jumbotron jumbotron-fluid jumbotron-home">
  <div class="container">
    <h1 class="display-4">Mes services</h1>
    <p class="lead">Tout les services proposés par Sandrine Coupart ci-dessous</p>
  </div>
</div>

<div class="container">
    <div class="card-services">
        <div class="card" style="width: 18rem">
            <h5 class="text-center">Évaluation nutritionnelle personnalisée</h5>
            <div class="text-center">
              <i class="bi bi-file-earmark-text"></i>
            </div>
            <p class="card-text">Une évaluation nutritionelle personnalisée en foction de vos envies et besoins !</p>
        </div>
        <div class="card" style="width: 18rem">
            <h5 class="text-center">Éducation nutritionnelle</h5>
            <div class="text-center">
              <i class="bi bi-file-medical"></i>
            </div>
            <p class="card-text">
              Fournir des conseils et des informations éducatives sur la nutrition, 
              y compris les groupes alimentaires, les portions recommandées, la lecture des étiquettes nutritionnelles, 
              et la compréhension des besoins nutritionnels spécifiques.
            </p>
        </div>
        <div class="card" style="width: 18rem">
            <h5 class="text-center">Gestion du poids</h5>
            <div class="text-center">
              <i class="bi bi-file-earmark-bar-graph"></i>
            </div>
            <p class="card-text">
              Aider les clients à perdre, à maintenir ou à prendre du poids de manière saine 
              et durable en développant des stratégies alimentaires adaptées à leurs besoins individuels.
            </p>
        </div>
        <div class="card" style="width: 18rem">
            <h5 class="text-center">Collaboration interprofessionnelle</h5>
            <div class="text-center">
              <i class="bi bi-person-walking"></i>
            </div>
            <p class="card-text">
              Travailler en collaboration avec d'autres professionnels de la santé, tels que des médecins, 
              des psychologues, des physiothérapeutes, etc., pour offrir des soins holistiques et intégrés.
            </p>
        </div>
    </div>
</div>

<!-- Partie footer -->
<?php include('includes/footer/footerHome.php'); ?>

</main>
  
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>