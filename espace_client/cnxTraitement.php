<?php
session_start();
include('../bdd/cnx.php');
$panel = 'dashboard.php'; // Page d'accueil de l'espace client

if(isset($_POST['btn-cnx']))
{
    $email = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['mdp']);

    $sqlCnxUser = "SELECT * FROM `coupart_user` WHERE `email` = '$email'";

    $result = $db->prepare($sqlCnxUser);

    $result->execute();

    if($result->rowCount() > 0)
    {
        $data = $result->fetchAll();
        if(password_verify($mdp, $data[0]['mdp']))
        {
            header("Location: $panel");
            $_SESSION['email'] = $email;
            exit();
        }
        else
        {
            echo 'Mot de passe incorrect !';
        }
    }
    else
    {
        echo 'Aucune de ces informations correspondent à un administrateur de ce site !';
    }
}
else
{
    echo 'Erreur !';
}

?>