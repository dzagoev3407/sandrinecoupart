<?php

include('bdd/cnx.php'); // On ajoute la base de données
include('admin/dev/functions.php');

/* Script PHP pour l'envoi du message en bdd */

if(isset($_POST['envoi']))
{
  $nom = htmlspecialchars($_POST['nom']);
  $email = htmlspecialchars($_POST['email']);
  $sujet = htmlspecialchars($_POST['sujet']);
  $message = htmlspecialchars($_POST['message']);

  if(!empty($nom) && !empty($email) && !empty($sujet) && !empty($message))
  {
    $sql = "INSERT INTO `coupart_contact`(`nom`, `email`, `sujet`, `message`) 
            VALUES (:nom,:email,:sujet,:message)";

    $req = $db->prepare($sql);

    $req->bindvalue(':nom', $nom);
    $req->bindvalue(':email', $email);
    $req->bindvalue(':sujet', $sujet);
    $req->bindvalue(':message', $message);

    $envoi = $req->execute();

    if($envoi)
    {
      ?>
      <div class="alert alert-success" role="alert">
        <h1 class="text-center">SUCCÈS !</h1>
        <p class="lead">Message envoyé avec succès ! Nous vous répondrons dans les plus brefs délais !</p>
      </div>
      <?php

      $url = 'https://kevinbonnefoy.fr/sandrine_coupart';

      header("Location: $url");
    }
    else
    {
      ?>
      <div class="alert alert-danger" role="alert">
        <h1 class="text-center">ALERTE !</h1>
        <p class="lead">Message non envoyé ! Veuillez réessayez !</p>
      </div>
      <?php
    }

  }
}

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Sandrine Coupart - Contact</title>
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
<?php include('includes/navMenu/contact.php') ?>

<!-- Jumbotron -->
<div class="p-5 text-center bg-image rounded-3 jumbotron-home">
  <div class="mask-jumbotron" style="background-color: rgba(0, 0, 0, 0.6);">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="text-white">
        <h1 class="mb-3">Contact</h1>
        <p class="lead">Veuillez remplir le formulaire ci dessous pour contacter Sandrine Coupart</p>
      </div>
    </div>
  </div>
</div>
<!-- Jumbotron -->

<div class="container">
<form method="POST">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputName">Nom</label>
            <input type="text" class="form-control" id="inputName" placeholder="Votre Nom" name="nom">
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="Votre Email" name="email">
        </div>
    </div>
        <div class="form-group">
        <label for="inputSubject">Sujet</label>
          <select class="form-select" aria-label="Default select example" name="sujet" required>
            <option selected>Veuillez choisir un sujet pour votre message svp</option>
            <option value="collaboration">Collaboration</option>
            <option value="panne sur le site">Panne sur le site</option>
            <option value="autres">Autres</option>
          </select>
        </div>
        <div class="form-group">
            <label for="inputMessage">Message</label>
            <textarea class="form-control" id="inputMessage" rows="4" placeholder="Votre Message" name="message"></textarea>
        </div>
            <button type="submit" class="btn btn-primary" name="envoi">Envoyer</button>
  </form>
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