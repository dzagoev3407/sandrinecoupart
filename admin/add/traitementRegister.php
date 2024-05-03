<?php
include('../../bdd/cnx.php'); // On inclus la connexion à la base de données

if(isset($_POST['btn-register']))
{
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $mdp = password_hash($mdp, PASSWORD_DEFAULT); // On hash le mot de passe par précaution de sécurité
    $sqlRegister = "INSERT INTO `coupart_admin`(`pseudo`,`email`, `mdp`) VALUES (:pseudo, :email, :mdp)";
    $reqRegister = $db->prepare($sqlRegister);
    
    $reqRegister->bindvalue(':pseudo', $pseudo);
    $reqRegister->bindvalue(':email', $email);
    $reqRegister->bindvalue(':mdp', $mdp);

    $ajout = $reqRegister->execute();

    if($ajout)
    {
        echo 'Enregistrement effectué !';
    }
    else
    {
        echo 'Erreur lors de l\'ajout du nouvel administrateur !';
    }

}