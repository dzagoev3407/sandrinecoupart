<?php
session_start();
include('../bdd/cnx.php');

/* Fonctions qui vont nous servir à simplifier le code */

function confirmRegister()
{
    echo 'Inscription réussie !';
    echo '<br>';
    echo 'Veuillez cliquer sur le bouton pour vous connecter à votre espace client dès maintenant !';
}

if(isset($_POST['btn-cnx']))
{
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['mdp']);

    $mdp = password_hash($mdp, PASSWORD_DEFAULT); // On hash le mot de passe par précaution de sécurité

    if(!empty($nom) && !empty($prenom) && !empty($email) && !empty($mdp))
    {
        $sqlRegisterUser = "INSERT INTO `coupart_user`(`nom`, `prenom`, `email`, `mdp`) 
                            VALUES ('$nom','$prenom','$email','$mdp')";

        $reqRegisterUser = $db->prepare($sqlRegisterUser);

        $ajout = $reqRegisterUser->execute();

        if($ajout)
        {
            confirmRegister();
            
            ?>
                <a href="cnx-client.php"><button>Se connecter</button>
            <?php
        }
        else
        {
            echo 'Inscription échouée !';
        }


    }
    else
    {
        echo 'Inscription échouée !';
    }
}
?>

<script src="../js/script.js"></script>