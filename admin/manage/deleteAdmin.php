<?php
include('../../bdd/cnx.php');

$id = $_GET['id']; // On récupere l'ID de l'administrateur

if(isset($id))
{
    $sqlDeleteAdmin = "DELETE FROM `coupart_admin` WHERE `id` = :id";

    $reqDeleteAdmin = $db->prepare($sqlDeleteAdmin);

    $reqDeleteAdmin->bindvalue(':id', $id);

    $delete = $reqDeleteAdmin->execute();

    if($delete)
    {
        $successMessage = "Cet administrateur a bien été supprimé de notre base de données !";
        $redirectUrl = "admin.php";
    }
    else
    {
        $errorMessage = "Erreur lors de la suppression de l'administrateur";
        $redirectUrl = "admin.php";
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Sandrine Coupart - Supprimer un administrateur</title>
<!-- Styles CSS-->
<link rel="stylesheet" href="../../css/styles.css">
<!-- Responsive -->
<link rel="stylesheet" href="../../css/responsive.css">
<!-- Bootstrap -->
<link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
<!-- Sweet alert JS -->
<script src="../../js/sweetAlert.js"></script>
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
</html>