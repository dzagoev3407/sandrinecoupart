<?php
include('bdd/cnx.php');

/* Afficher commentaires issu de la bdd */

$sqlDisplayComment = "SELECT * FROM `coupart_comment` WHERE `etat` = 1";

$reqDisplayCommentApprouved = $db->query($sqlDisplayComment);

$comments = $reqDisplayCommentApprouved->fetchAll();

/* Afficher les recettes à la une */

?>


<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="description" content="Sandrine Coupart diététicienne-nutritionniste">
<meta name="keywords" content="Sandrine Coupart, Caen, site diététicienne-nutritionniste, diététicienne à caen, kevinbonnefoy.fr">
<meta name="author" content="Bonnefoy Kévin">
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
<?php include('includes/navMenu/home.php') ?>

<!-- Jumbotron de la page d'accueil -->

<!-- Jumbotron -->
<div class="p-5 text-center bg-image rounded-3 jumbotron-home">
  <div class="mask-jumbotron" style="background-color: rgba(0, 0, 0, 0.6);">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="text-white">
        <h1 class="mb-3">Accueil</h1>
        <p class="lead">Bienvenue sur le site de la diététicienne-nutritionniste Sandrine Coupart basée à Caen.</p>
        <a class="text-decoration-none text-white" href="espace_client/cnx-client.php"><button class="btn btn-primary btn-rdv">Prendre rdv</button></a>
      </div>
    </div>
  </div>
</div>
<!-- Jumbotron -->

<!-- Partie Recettes mis en ligne récemment -->
<div class="container">
  <div class="recipe">
  <h3>Plat à la UNE actuellement :</h3>
  <div class="row">
    <div class="col-lg-6">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="https://kevinbonnefoy.fr/sandrine_coupart/admin/add/adminImg/gratin_de_ravioles_aux_courgettes.jpg" class="img-fluid rounded-start" alt="img-plat">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Ravioles aux courgettes</h5>
              <p class="card-text">Un très bon plat diététique, et très facile à préparer</p>
              <button class="btn btn-primary">Voir +</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="https://kevinbonnefoy.fr/sandrine_coupart/admin/add/adminImg/gratin_de_ravioles_aux_courgettes.jpg" class="img-fluid rounded-start" alt="img-plat">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Ravioles aux courgettes</h5>
              <p class="card-text">Un très bon plat diététique, et très facile à préparer</p>
              <button class="btn btn-primary">Voir +</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="btn-slide">
    <div class="text-center">
      <button class="btn btn-primary" id="scrollLeft"><</button>
      <button class="btn btn-primary" id="scrollRight">></button>
    </div>
  </div>
</div>
  </div>

  <div class="comment-user">
  <?php foreach($comments as $comment): ?>

      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="img/1024px-OOjs_UI_icon_userAvatar-progressive.svg.png" class="img-fluid rounded-start" alt="img-user">
          </div>
        <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?php echo $comment['nom'] ?></h5>
              <p class="card-text">
                <?php echo $comment['message'] ?>
              </p>
            </div>
          </div>
        </div>
      </div>

  <?php endforeach; ?>
  <div class="text-center">
    <button class="btn btn-primary btn-add-comment" onclick="addComment()">Ajouter un commentaire</button>
  </div>
      <div id="popup-comment" class="popup-comment">
        <h2 class="text-center">Ajouter un nouveau commentaire</h2>
        <form method="POST" action="admin/add/traitementComment.php">
          <div class="form-group">
            <label for="nom-comment">Nom :</label>
            <input type="text" class="form-control" id="nom-comment" name="nom-comment" placeholder="Jean DUPONT">
          </div>
          
          <div class="form-group">
            <label for="email-comment">Adresse email :</label>
            <input type="email" class="form-control" id="email-comment" name="email-comment" placeholder="jeandupont@gmail.com">
          </div>

          <div class="form-group">
            <label for="message-comment">Votre message :</label>
            <textarea class="form-control" id="message-comment" name="message-comment" rows="6" placeholder="Je pense que les services de mme Coupart sont..."></textarea>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary" onclick="confirm('Êtes-vous sur d\'envoyer ce commentaire ?')" name="envoi-comment">Envoyer</button>
          </div>
        </form>
        <button class="btn btn-primary" onclick="closeComment()">Fermer</button>
      </div>
      <div class="btn-slide">
          <div class="text-center">
            <button class="btn btn-primary" id="scrollLeft"><</button>
            <button class="btn btn-primary" id="scrollRight">></button>
        </div>
      </div>
  </div>

<div class="contact bg-grey-coupart">
  <h3>Contact :</h3>
  <form action="admin/add/traitementMessage.php" method="POST" id="contactForm">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="name">Nom :</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Jean DUPONT" required>
        </div>
        <div class="form-group">
          <label for="email">Adresse email :</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="jeandupont@gmail.com" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="subject">Sujet de votre message :</label>
          <select class="form-select" aria-label="Default select example" name="subject" required>
            <option selected>Veuillez choisir un sujet pour votre message svp</option>
            <option value="collaboration">Collaboration</option>
            <option value="panne sur le site">Panne sur le site</option>
            <option value="autres">Autres</option>
          </select>
        </div>
        <div class="form-group">
          <label for="message">Votre message :</label>
          <textarea class="form-control" id="message" name="message" rows="6" placeholder="Bonjour, je vous écris car..." required></textarea>
        </div>
      </div>
    </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary" name="envoyer">Envoyer</button>
  </div>
  </form>
</div>

<!-- Partie footer -->
<?php include('includes/footer/footerHome.php'); ?>

</main>

<!-- Fenêtre modale pour afficher les détails de la carte -->
<div class="modal" id="cardDetailsModal">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Titre de la recette</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>Texte de la recette</p>
    </div>
  </div>
</div>
</div>
</div>
</body>
<script src="js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>