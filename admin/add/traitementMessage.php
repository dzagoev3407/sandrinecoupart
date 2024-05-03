<?php
include('../../bdd/cnx.php');

if(isset($_POST['envoyer']))
{
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    if(!empty($name) && !empty($email) && !empty($subject) && !empty($message))
    {
        $sql = "INSERT INTO `coupart_contact`(`nom`, `email`, `sujet`, `message`) 
                VALUES (:nom,:email,:sujet,:message)";

        $req = $db->prepare($sql);

        $req->bindvalue(':nom', $name);
        $req->bindvalue(':email', $email);
        $req->bindvalue(':sujet', $subject);
        $req->bindvalue(':message', $message);

        $envoi = $req->execute();

        $messageConfirm = 'Message envoyé ! Nous vous répondrons dans les plus brefs délai !';
        $home = '../../index.php';

        if($envoi)
        {
            ?>
                <div class="alert alert-success" role="alert">
                    <p><?php echo $messageConfirm; ?></p>
                </div>
                <a href="<?php echo $home; ?>"><button class="btn btn-primary">Retour</button></a>
            <?php
        }
        else
        {
            echo 'Erreur lors de l\'envoi !';
        }
    }
    else
    {
        echo 'Erreur lors de l\'envoi du message !';
    }
}

?>
<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Sandrine Coupart - Traitement Message</title>
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
</body>
<script src="../../js/script.js"></script>
</html>