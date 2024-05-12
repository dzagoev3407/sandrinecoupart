<?php
session_start();
include('../bdd/cnx.php');
include('dev/functions.php');
$panel = 'dashboard.php'; // Panneau d'administrateur

if(isset($_POST['btn-cnx']))
{
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];

    $sqlCnxAdmin = "SELECT * FROM `coupart_admin` WHERE `pseudo` = '$pseudo'";

    $result = $db->prepare($sqlCnxAdmin);

    $result->execute();

    if($result->rowCount() > 0)
    {
        $data = $result->fetchAll();
        if(password_verify($mdp, $data[0]['mdp']))
        {
            $_SESSION['pseudo'] = $pseudo;
            $successMessage = 'Connexion réussie !';
            $redirectUrl = 'dashboard.php';
        }
        else
        {
            $errorMessage = 'Pseudo ou mot de passe incorrect !';
            $redirectUrl = 'cnx.php';
        }
    }
    else
    {
        $errorMessage = 'Pseudo ou mot de passe incorrect !';
        $redirectUrl = 'cnx.php';
    }
}
else
{
    echo 'Erreur !';
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Sandrine Coupart - Connexion utilisateur</title>
    <!-- Styles CSS-->
    <link rel="stylesheet" href="../css/styles.css">
    <!-- Responsive -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Sweet alert JS -->
    <script src="../js/sweetAlert.js"></script>
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
<?php
exit();
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>