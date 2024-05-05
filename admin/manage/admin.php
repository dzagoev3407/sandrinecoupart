<?php
session_start();
include('../../bdd/cnx.php');
include('../dev/functions.php');

if($_SESSION['pseudo'])
{
    $sqlDisplayAdmin = "SELECT * FROM `coupart_admin`";

    $reqDisplayAdmin = $db->query($sqlDisplayAdmin);

    $displayAdmin = $reqDisplayAdmin->fetchAll();
}
else
{
    noAdmin();
    die();
}

?>

<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Administrateur - afficher administrateur</title>
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

<?php

if($_SESSION['pseudo'])
{
?>

<nav class="navbar navbar-light">
    <h1 class="title-navbar">Gérer les administrateurs</h1>
</nav>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Pseudo</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
<?php foreach($displayAdmin as $displayAdmins): ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $displayAdmins['id']; ?></th>
      <td><?php echo $displayAdmins['pseudo']; ?></td>
      <td><?php echo $displayAdmins['email']; ?></td>
      <td><button class="btn btn-danger"><a class="text-decoration-none text-white" href="deleteAdmin.php?id=<?php echo $displayAdmins['id'] ?>">Supprimer</a></button></td>
    </tr>
  </tbody>
  <?php endforeach; ?>
</table>

<button class="btn btn-primary"><a class="text-decoration-none text-white" href="../dashboard.php">Retour</a></button>

<?php

}
else
{
    noAdmin();
}

?>
</body>
</html>