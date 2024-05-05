<?php
session_start();
include('../../bdd/cnx.php');

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Sandrine Coupart - Accueil</title>
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

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="mb-4">Ajouter des images</h2>
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="image">Sélectionnez une image :</label>
          <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
    </div>
  </div>
</div>

</body>
</html>