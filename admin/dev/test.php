<?php
session_start();
include('../../bdd/cnx.php');
include('functions.php');
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Sandrine Coupart - Administrateur page de test</title>
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
                <h1 class="title-navbar">Sandrine Coupart - Espace Client</h1>
            </nav>

            <ol class="breadcrumb">
                <a href="../dashboard.php"><li class="breadcrumb-item" aria-current="page">Panel</li></a>
                <li class="breadcrumb-item active" aria-current="page">Page de test</li>
            </ol>
        
        <?php

        $email = "kbdesign07@outlook.fr";
        $pseudo = "test007";
        $mdp = "test007";

        $to = $email;
        $subject = "Nouvel admin !";
        $message = "Bonjour vous recevez ce mail car vous avez été ajouté en tant qu'admin sur le site de madame Coupart, vous pouvez dès à présent vous connecter à l'adresse suivante : 
                    https://kevinbonnefoy.fr/sandrine_coupart/admin/cnx.php vos données de connexion nom d'utilisateur : nom d'utilisateur : $pseudo & password : $mdp a bientôt !";
        $headers = "array(
                    'From' => 'webmaster@example.com',
                    'Reply-To' => 'webmaster@example.com',
                    'X-Mailer' => 'PHP/' . phpversion()";

        $mail = mail($to, $subject, $message, $headers);

        if($mail)
        {
            echo "Email envoyé !";
        }
        else
        {
            echo "Email non envoyé !";
        }

        
    }
    else
    {
        noAdmin(); 
    }

    ?>

    <?php

cnxSuccessAdmin();

?>

</body>
<script src="../../js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>