<?php
session_start();
include('../../bdd/cnx.php');

$home = '../dashboard.php';

?>

<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Sandrine Coupart - Les commentaires</title>
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

<main>
<nav class="navbar navbar-light">
    <h1 class="title-navbar">Sandrine Coupart</h1>
</nav>
<ol class="breadcrumb bg-light">
    <li class="breadcrumb-item"><a class="text-decoration-none" href="<?php echo $home ?>">Panel</a></li>
    <li class="breadcrumb-item active" aria-current="page">Modifier un commenatire</li>
</ol>

    <?php

    $sqlDisplayComment = "SELECT * FROM `coupart_comment`";

    $stmt = $db->query($sqlDisplayComment);

    $displayComment = $stmt->fetchAll();

    ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Email</th>
      <th scope="col">Commentaire</th>
      <th scope="col">État</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
<?php foreach($displayComment as $displayComments): ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $displayComments['id']; ?></th>
      <td><?php echo $displayComments['nom']; ?></td>
      <td><?php echo $displayComments['email']; ?></td>
      <td><?php echo $displayComments['message']; ?></td>
      <td><?php echo $displayComments['etat']; ?></td>
      <td><button class="btn btn-success"><a class="text-decoration-none text-white" href="approuvedComment.php?id=<?php echo $displayComments['id'] ?>">Approuver</a></button></td>
      <td><button class="btn btn-danger"><a class="text-decoration-none text-white" href="deleteComment.php?id=<?php echo $displayComments['id'] ?>">Supprimer</a></button></td>
    </tr>
  </tbody>
  <?php endforeach; ?>
</table>

<?php

    ?>

<?php include('../includes/footer/footerAdminCnx.php'); ?>

</main>
</body>
<script src="../../js/script.js"></script>
</html>