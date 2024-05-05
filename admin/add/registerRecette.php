<?php
session_start();
include('../../bdd/cnx.php');

$home = '../dashboard.php'; // Panneau d'administration

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une recette</title>
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
    <li class="breadcrumb-item active" aria-current="page">Ajouter une recette</li>
</ol>

<div class="jumbotron jumbotron-fluid jumbotron-home">
  <div class="container">
    <h1 class="display-4">Ajouter une nouvelle recette</h1>
    <p class="lead">Ajout d'une nouvelle recette en tant que <?php echo $_SESSION['pseudo']; ?></p>
  </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajouter une Recette</div>
                <div class="card-body">
                    <form action="traitementRecette.php" method="POST">
                        <div class="form-group">
                            <label for="nom">Nom de la Recette :</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description de la Recette :</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="etapes">Étapes de la Recette :</label>
                            <textarea class="form-control" id="etapes" name="etapes" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="url-img">URL de l'image de la recette :</label>
                            <input type="text" class="form-control" id="url-img" name="url-img" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="envoyer">Ajouter la Recette</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../../includes/footer/footerAdminCnx.php'); ?>
</body>
</html>