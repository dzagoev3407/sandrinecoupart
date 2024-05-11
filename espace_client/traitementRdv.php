<?php
session_start();
include('../bdd/cnx.php');

if(isset($_POST['submit']))
{
    $id_client = $_POST['id_client'];
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $motif = $_POST['motif'];

    if(!empty($id_client) && !empty($date) && !empty($heure) && !empty($motif))
    {
        /* Requête d'envoi du rdv */

        $sql = "INSERT INTO `coupart_rdv`(`date`, `heure`, `motif_rdv`, `client_id`) 
                VALUES (:date, :heure, :motif_rdv, :user_id)";

        $req = $db->prepare($sql);

        $req->bindvalue(':date', $date);
        $req->bindvalue(':heure', $heure);
        $req->bindvalue(':motif_rdv', $motif);
        $req->bindvalue(':user_id', $id_client);

        $envoi = $req->execute();

        if($envoi)
        {
            echo "RDV confirmé le : $date à $heure avec Madame Coupart";
        }
        else
        {
            echo "Erreur lors de la confirmation du RDV.";
        }
    }
    else
    {
        echo 'erreur lors de la recup des infos.';
    }
}