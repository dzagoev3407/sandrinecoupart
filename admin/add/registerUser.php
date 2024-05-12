<?php
session_start();
include('../../bdd/cnx.php');

function generateToken() {
    return bin2hex(random_bytes(32)); // Générer un Token pour le mot de passe de l'utilisateur
}

if(isset($_POST['add-btn'])) {
    $nom = $_POST['name'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $token = generateToken();

    if(!empty($nom) && !empty($prenom) && !empty($email)) {
        $sql = "INSERT INTO `coupart_user`(`nom`, `prenom`, `email`, `token_password`) 
                VALUES (:nom, :prenom, :email, :token)";

        $req = $db->prepare($sql);

        $req->bindvalue(':nom', $nom);
        $req->bindvalue(':prenom', $prenom);
        $req->bindvalue(':email', $email); // Ajout de cette ligne pour lier le paramètre :email
        $req->bindvalue(':token', $token);
        
        $ajout = $req->execute();

        if($ajout)
        {
          $successMessage = "Ajout effectué avec succès !";
          $redirectUrl = "registerUser.php";

          $generateMdp = 'generateMdpAdmin.php';

          $to = $email;
          $subject = "Bienvenue !";
          $message = "Bonjour vous recevez ce mail car vous avez été ajouté en tant que client sur le site de madame Coupart, vous pouvez dès à présent vous connecter à l'adresse suivante : 
                      https://kevinbonnefoy.fr/sandrine_coupart/espace_client/cnx-client.php vos données de connexion nom d'utilisateur : nom d'utilisateur : $pseudo, à partir de ce lien : https://kevinbonnefoy.fr/sandrine_coupart/admin/add/generateMdpUser.php?token=$token veuillez choisir votre mot de passe bientôt !";
           $headers = "array(
                    'From' => 'webmaster@example.com',
                    'Reply-To' => 'webmaster@example.com',
                    'X-Mailer' => 'PHP/' . phpversion()";

          $mail = mail($to, $subject, $message, $headers);

          if($mail)
          {
            $successMessage = "Client ajouté et mail envoyé !";
          }
          else
          {
            $errorMessage = "Email non envoyé !";
          }

        }
        else
        {
            $errorMessage = "Erreur lors de l'ajout du nouveau client !";
            $redirectUrl = "registerUser.php";
        }

    }
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Sandrine Coupart - Ajouter un nouveau client</title>
    <!-- Styles CSS-->
    <link rel="stylesheet" href="../../css/styles.css">
    <!-- Responsive -->
    <link rel="stylesheet" href="../../css/responsive.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Sweet alert JS -->
    <script src="../../js/sweetAlert.js"></script>
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
                <button type="submit" class="btn btn-primary btn-block" name="add-btn">Ajouter</button>
            </form>
        </div>
    </div>
</div>

<!-- On affiche le message de confirmation OU d'erreur -->
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
<script src="../../js/script.js"></script>
</html>
