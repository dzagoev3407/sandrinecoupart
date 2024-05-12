<?php
include('../../bdd/cnx.php'); // On inclus la connexion à la base de données

if(isset($_POST['btn-register']))
{
    function generateToken() {
        return bin2hex(random_bytes(32)); // Je genère un Token qui me servira à choisir le password à mon utilisateur
    }

    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $token = generateToken();

    $sqlRegister = "INSERT INTO `coupart_admin`(`pseudo`,`email`, `token_password`) VALUES (:pseudo, :email, :token)";
    $reqRegister = $db->prepare($sqlRegister);
    
    $reqRegister->bindvalue(':pseudo', $pseudo);
    $reqRegister->bindvalue(':email', $email);
    $reqRegister->bindvalue(':token', $token);

    /* On vérifie si le mail est déjà en BDD si oui on alerte l'utilisateur SINON on ajoute le nouvel admin */

    $sqlVerifMail = "SELECT `email` FROM `coupart_admin` WHERE `email` = :email";
    $reqVerifMail = $db->prepare($sqlVerifMail);

    $reqVerifMail->bindvalue(':email', $email);
    $reqVerifMail->execute();
    $resultVerifMail = $reqVerifMail->fetch(PDO::FETCH_ASSOC);

    if($resultVerifMail) // Si l'email existe déjà dans notre base de données on affiche le message d'erreur et on retourne le message d'erreur */
    {
        $errorMessage = "Email déjà enregistré dans la base de données.";
        $redirectUrl = "registerAdmin.php";
    }
    else
    {
        $ajout = $reqRegister->execute();

    if($ajout)
    {
        $successMessage = "Administrateur ajouté !";
        $redirectUrl = "registerAdmin.php";

        $generateMdp = 'generateMdpAdmin.php';

        $to = $email;
        $subject = "Nouvel admin !";
        $message = "Bonjour vous recevez ce mail car vous avez été ajouté en tant qu'admin sur le site de madame Coupart, vous pouvez dès à présent vous connecter à l'adresse suivante : 
                    https://kevinbonnefoy.fr/sandrine_coupart/admin/cnx.php vos données de connexion nom d'utilisateur : nom d'utilisateur : $pseudo, à partir de ce lien : https://kevinbonnefoy.fr/sandrine_coupart/admin/add/generateMdpAdmin.php?token=$token veuillez choisir votre mot de passe bientôt !";
        $headers = "array(
                    'From' => 'webmaster@example.com',
                    'Reply-To' => 'webmaster@example.com',
                    'X-Mailer' => 'PHP/' . phpversion()";

        $mail = mail($to, $subject, $message, $headers);

        if($mail)
        {
            echo "Administrateur ajouté !";
        }

    }
    else
    {
        $errorMessage = "Erreur lors de l'ajout du nouvel administrateur !";
        $redirectUrl = "registerAdmin.php";
    }
    }

}

?>
<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Sandrine Coupart - Enregistrement administrateur</title>
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