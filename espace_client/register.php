<?php
include('../bdd/cnx.php');

?>

<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Sandrine Coupart - Inscription à l'espace client</title>
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
    <h1 class="title-navbar">Sandrine Coupart - Espace Client</h1>
</nav>

<?php include('../includes/navMenu/client.php'); ?>

<div class="container cnx-admin-form">
  <h2 class="text-center mb-4">Inscription à l'espace client de Sandrine Coupart</h2>
  <div class="text-center">
    <i class="bi bi-person-fill-gear"></i>
  </div>
  <form class="cnx-admin" action="traitementRegister.php" method="POST">
    <div class="form-group">
      <label for="nom">Nom :</label>
      <input type="text" class="form-control" id="nom" placeholder="Doe" name="nom" required>
    </div>
    <div class="form-group">
      <label for="prenom">Prénom :</label>
      <input type="prenom" class="form-control" id="prenom" placeholder="John" name="prenom" required>
    </div>
    <div class="form-group">
      <label for="email">Adresse email :</label>
      <input type="email" class="form-control" id="email" placeholder="exemple@exemple.fr" name="email" required>
    </div>
    <div class="form-group">
      <label for="mdp">Mot de passe :</label>
      <input type="password" class="form-control" id="password" name="mdp" placeholder="Entrez votre mot de passe" required>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-block" name="btn-cnx">S'inscrire</button>
    </div>
  </form>
</div>
</body>
</html>