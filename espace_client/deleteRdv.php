<?php
include('../bdd/cnx.php');

$id = $_GET['id'];

if(isset($id))
{
    $sqlDeleteRdv = "DELETE FROM `coupart_rdv` WHERE id = :id";

    $reqDeleteRdv = $db->prepare($sqlDeleteRdv);

    $reqDeleteRdv->bindvalue(':id', $id);

    $deleteRdv = $reqDeleteRdv->execute();

    if($deleteRdv)
    {
        echo "Votre rdv à bien été annulé ! À bientôt !";
        ?>
        <a href="dashboard.php"><button>Retour</button></a>
        <?php
    }
    else
    {
        echo "Erreur lors de l'annulation du rdv !";
    }
}