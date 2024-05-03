<?php
session_start();
include('../../bdd/cnx.php');
include('../dev/functions.php');

$sqlDisplayUser = "SELECT * FROM `coupart_user`";

$reqDisplayUser = $db->query($sqlDisplayUser);

$displayUser = $reqDisplayUser->fetchAll();

?>

<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Administrateur - afficher clients</title>
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
    <h1 class="title-navbar">Gérer les clients inscrits</h1>
</nav>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
<?php foreach($displayUser as $displayUsers): ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $displayUsers['id']; ?></th>
      <td><?php echo $displayUsers['nom']; ?></td>
      <td><?php echo $displayUsers['prenom']; ?></td>
      <td><?php echo $displayUsers['email']; ?></td>
      <td><button class="btn btn-danger"><a class="text-decoration-none text-white" href="deleteUser.php?id=<?php echo $displayUsers['id'] ?>">Supprimer</a></button></td>
    </tr>
  </tbody>
  <?php endforeach; ?>
</table>

<button class="btn btn-primary"><a class="text-decoration-none text-white" href="../dashboard.php">Retour</a></button>

</body>