<?php
session_start();
include('../../bdd/cnx.php');

/* Générer un mot de passe qui sera attribué au nouveau utilisateur */

$passwordAuto = ['n0PDwN3o8yXUx', 'm5=q-jy%gnA7n', 
                'Z0;ZY488$!n+N', 'y2?lfYp;d,qAw', 'p3%u4C&dfyF,:', 
                'M1.M<G(x5%d0)', 'Z4?+C$h4aerP;', 'q3#hMdt5=SKfZ', 'c4!2m%SWe=Dxy', 'v0>mA4tlYDHz)'];

function generateRandomPassword($passwordArray)
{
    return $passwordArray[array_rand($passwordArray)];
}

$generatePassword = generateRandomPassword($passwordAuto);

if(isset($_POST['add-btn']))
{
    $nom = $_POST['name'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['mdp'];

    $to = $email;
    $subject = "Inscription sur le site de Sandrine COUPART";
    $message = "Bonjour, nous confirmons votre inscription au site de madame COUPART, diététicienne professionnelle, 
                votre mot de passe pour vous connecter à votre espace client : ".$password." dès votre première connexion veuillez le changer directement pour assurer une meilleure sécurité !";

    if(mail($to, $subject, $message))
    {
        ?>
            <div class="alert alert-success" role="alert">
                <p class="lead">Mail de confirmation envoyé !</p>
            </div>
                <?php
    }
    else
    {
        ?>
            <div class="alert alert-danger" role="alert">
                <p class="lead">Erreur lors de l'envoi du mail de confirmation.</p>
            </div>
        <?php
    }

    $password = password_hash($password, PASSWORD_DEFAULT); // On hash le mot de passe avant de l'envoyer en BDD pour question de sécurité !

    if(!empty($nom) && !empty($prenom) && !empty($email) && $password)
    {
        $sql = "INSERT INTO `coupart_user`(`nom`, `prenom`, `email`, `mdp`) 
                VALUES (:nom, :prenom, :email, :mdp)";

        $req = $db->prepare($sql);

        $req->bindvalue(':nom', $nom);
        $req->bindvalue(':prenom', $prenom);
        $req->bindvalue(':email', $email);
        $req->bindvalue(':mdp', $password);

        $ajout = $req->execute();

        if($ajout)
        {
        ?>
            <div class="alert alert-success" role="alert">
                <h1 class="text-center">SUCCÈS !</h1>
                <p class="lead">Nouveau client ajouté ! Il peut désormais se connecter à son espace client.</p>
            </div>
        <?php

        }
        else
        {
            echo 'Erreur lors de l\'ajout du client.';
        }
    }
}

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Sandrine Coupart - Ajouter un nouveau cient</title>
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
    <h1 class="title-navbar">Sandrine Coupart - Espace Client</h1>
</nav>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../dashboard.php">Panel</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ajouter un nouveau client</li>
</ol>

<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <form class="rounded-form bg-light p-4 mt-5" method="POST">
          <h2 class="text-center mb-4">Ajouter un nouveau client</h2>
          <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="DUPONT" required>
          </div>
          <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Jean" required>
          </div>
          <div class="form-group">
            <label for="email">Adresse Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="jeandupont@gmail.com" required>
          </div>
          <div class="form-group">
            <label for="mdp">Mot de passe ( générer automatiquement )</label>
            <input type="password" class="form-control" id="mdp" name="mdp" value="<?php echo $generatePassword; ?>" placeholder="Entrez le sujet de votre message">
            <button class="btn btn-primary" type="button" id="togglePassword" onclick="togglePasswordVisibility()">Afficher</button>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name="add-btn">Ajouter</button>
        </form>
      </div>
    </div>
  </div>
</body>
<script src="../../js/script.js"></script>
</html>