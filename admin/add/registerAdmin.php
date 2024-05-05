<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Sandrine Coupart - Enregistrement admnistrateur</title>
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
<nav class="navbar navbar-light">
  <h1 class="title-navbar">Sandrine Coupart - Enregistrement administrateur</h1>
</nav>

<div class="container cnx-admin-form">
  <h2 class="text-center mb-4">Enregistrer un nouvel Administrateur</h2>
  <div class="text-center">
    <i class="bi bi-person-fill-gear"></i>
  </div>
  <form class="cnx-admin" action="traitementRegister.php" method="POST">
    <div class="form-group">
      <label for="username">Nom d'utilisateur :</label>
      <input type="text" class="form-control" id="pseudo" placeholder="Entrez votre nom d'utilisateur" name="pseudo" required>
    </div>
    <div class="form-group">
      <label for="username">Adresse email :</label>
      <input type="text" class="form-control" id="email" placeholder="exemple@exemple.fr" name="email" required>
    </div>
    <div class="text-center">
        <a class="text-decoration-none text-white" href="../dashboard.php"><button type="submit" class="btn btn-primary btn-block">Retour</a></button>
        <button type="submit" class="btn btn-primary btn-block" name="btn-register">Ajouter</button>
    </div>
  </form>
</div>

<?php include('../../includes/footer/footerAdminCnx.php'); ?>
</body>
<script src="../../js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>