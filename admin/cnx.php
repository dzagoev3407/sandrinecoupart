<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Sandrine Coupart - Connexion admnistrateur</title>
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
<nav class="navbar navbar-light">
  <h1 class="title-navbar">Sandrine Coupart - Administrateur</h1>
</nav>
<?php include('../includes/navMenu/admin.php'); ?>

<!-- Jumbotron -->
<div class="p-5 text-center bg-image rounded-3 jumbotron-home">
  <div class="mask-jumbotron" style="background-color: rgba(0, 0, 0, 0.6);">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="text-white">
        <h1 class="mb-3">Connexion administrateur</h1>
      </div>
    </div>
  </div>
</div>
<!-- Jumbotron -->

<div class="container cnx-admin-form">
  <h2 class="text-center mb-4">Connexion Administrateur</h2>
  <div class="text-center">
    <i class="bi bi-person-fill-gear"></i>
  </div>
  <form class="cnx-admin" action="cnxTraitement.php" method="POST">
    <div class="form-group">
      <label for="username">Nom d'utilisateur :</label>
      <input type="text" class="form-control" id="username" placeholder="Entrez votre nom d'utilisateur" name="pseudo" required>
    </div>
    <div class="form-group">
      <label for="password">Mot de passe :</label>
      <input type="password" class="form-control" id="password" name="mdp" placeholder="Entrez votre mot de passe" required>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-block" name="btn-cnx">Se connecter</button>
    </div>
  </form>
</div>

<?php include('../includes/footer/footerAdminCnx.php'); ?>
</body>
<script src="js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>