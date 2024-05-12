<?php
session_start();
include('../bdd/cnx.php');

$logout = session_destroy();
$cnx = 'cnx.php'; // Page de connexion
$return = 'dashboard.php'; // Page pour retourner dans le tableau de bord d'administrateur

if($logout)
{
    $successMessage = "Déconnexion effectuée avec succès !";
    $redirectUrl = $cnx;
}
else
{
    $errorMessage = "Déconnexion non effectuée ! Veuillez réesayez.";
    $redirectUrl = $return;
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Sandrine Coupart - Déconnexion</title>
  <!-- Styles CSS-->
  <link rel="stylesheet" href="../css/styles.css">
  <!-- Responsive -->
  <link rel="stylesheet" href="../css/responsive.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
  <!-- Sweet alert JS -->
  <script src=".../js/sweetAlert.js"></script>
</head>
<body>
    <script>
        <?php if(isset($successMessage)): ?>
            Swal.fire({
                title: 'Succès !',
                text: '<?php echo $successMessage; ?>',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '<?php echo $redirectUrl; ?>';
            });
        <?php elseif(isset($errorMessage)): ?>
            Swal.fire({
                title: 'Erreur !',
                text: '<?php echo $errorMessage; ?>',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '<?php echo $redirectUrl; ?>';
            });
        <?php endif; ?>
    </script>
</body>
<?php

exit();

?>
</html>