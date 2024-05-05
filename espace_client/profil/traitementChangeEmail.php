<?php
session_start();
include('../../bdd/cnx.php'); // On inclus la base de données

if(isset($_GET['id']))
{
    $user_id = $_GET['id'];

    if(isset($_POST['btn_email_reset']))
    {
        $email = $_POST['confirm_email'];

        if(!empty($email))
        {
            $sqlUpdate = "UPDATE `coupart_user` SET `email` = :email WHERE `id` = :user_id";

            $req = $db->prepare($sqlUpdate);

            $req->bindvalue(':user_id', $user_id);
            $req->bindvalue(':email', $email);

            $update = $req->execute();

            if($update) // Si la mise à jour s'est bien passé alors on détruit la session et on oblige la personne à se reconnecter.
            {
                echo 'Email mis à jour !';
                session_destroy();
                echo '<a href="https://kevinbonnefoy.fr/sandrine_coupart/espace_client/cnx-client.php">Se connecter</a>';
                exit();
            }
            else
            {
                echo 'Erreur lors de la mise à jour de l\'email !';
            }
        }
    }
}