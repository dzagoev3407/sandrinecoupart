<?php
include('../../bdd/cnx.php');

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    if(isset($_POST['btn_password_reset']))
    {
        $mdp = $_POST['confirm_mdp'];

        $password = password_hash($mdp, PASSWORD_DEFAULT);

        if(!empty($password))
        {

            $sql = "UPDATE `coupart_user` SET `mdp` = :mdp WHERE id = :user_id";

            $req = $db->prepare($sql);

            $req->bindvalue(':mdp', $password);
            $req->bindvalue(':user_id', $id);

            $updateMdp = $req->execute();

            if($updateMdp)
            {
                echo 'Mot de passe mis à jour ! Vous pouvez désormais vous connecter !';
            }
            else
            {
                echo 'Erreur lors de la mise à jour du mot de passe !';
            }
        }
    }
}