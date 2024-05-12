<?php
session_start();
include('../../bdd/cnx.php');
include('../dev/functions.php');

$id = $_GET['id'];

if(isset($id))
{
    $sql = "DELETE FROM `coupart_user` WHERE `id` = :id";

    $req = $db->prepare($sql);

    $req->bindvalue(':id', $id);

    $delete = $req->execute();

    if($delete)
    {
        $successMessage = "Le client a bien été supprimé !";
        $redirectUrl = "client.php";
    }
    else
    {
        $errorMessage = "Erreur lors de la suppression du client";
        $redirectUrl = "client.php";
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Sandrine Coupart - Supprimer un client</title>
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
<?php
exit();
?>
</html>