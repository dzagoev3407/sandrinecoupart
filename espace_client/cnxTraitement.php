<?php
session_start();
include('../bdd/cnx.php');
$panel = 'dashboard.php'; // Page d'accueil de l'espace client

if(isset($_POST['btn-cnx']))
{
    $email = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['mdp']);

    $sqlCnxUser = "SELECT * FROM `coupart_user` WHERE `email` = :email";

    $result = $db->prepare($sqlCnxUser);

    $result->bindvalue(':email', $email);

    $result->execute();

    if($result->rowCount() > 0)
    {
        $data = $result->fetchAll();

        if(password_verify($mdp, $data[0]['mdp']))
        {
            // Redirection après la connexion réussie
            $_SESSION['email'] = $email;
            $successMessage = 'Connexion réussie !';
            $redirectUrl = $panel;
        }
        else
        {
            $errorMessage = 'Email ou mot de passe incorrect !';
            $redirectUrl = 'cnx-client.php';
        }
    }
    else
    {
        $errorMessage = 'Email ou mot de passe incorrect !';
        $redirectUrl = 'cnx-client.php';
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
}
else
{
    echo 'Erreur !';
}
?>
