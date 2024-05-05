<?php
include('../../bdd/cnx.php');

$id = $_GET['id']; // On récupere l'ID du commentaire

if(isset($id))
{
    $sqlApprouvComment = "SELECT * FROM `coupart_comment` WHERE `id` = $id";

    $reqApprouvComment = $db->prepare($sqlApprouvComment);

    $reqApprouvComment->bindvalue(':id', $id);

    if($reqApprouvComment)
    {
        $approuv = 1;
        $updateEtat = "UPDATE `coupart_comment` SET `etat`= :approuv";

        $reqUpdateEtat = $db->prepare($updateEtat);

        $reqUpdateEtat->bindvalue(':approuv', $approuv);

        $reqIdComment = $reqUpdateEtat->execute();

        if($reqIdComment)
        {
            echo 'Commentaire approuvé !';
            ?>
            <a class="text-decoration-none text-white" href="comment.php"><button class="btn btn-primary">Retour</button></a>
            <?php
            die();
        }
        else
        {
            echo 'Erreur lors de l\'approbation du commentaire !';
        }
    }
    else
    {
        echo 'Erreur !';
    }
}