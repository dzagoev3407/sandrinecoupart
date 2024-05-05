<?php
include('../../bdd/cnx.php');

$id = $_GET['id']; // On récupere l'ID du commentaire

if(isset($id))
{
    $sqlDeleteComment = "DELETE FROM `coupart_comment` WHERE `id` = :id";

    $reqDeleteAdmin = $db->prepare($sqlDeleteComment);

    $reqDeleteAdmin->bindvalue(':id', $id);

    $delete = $reqDeleteAdmin->execute();

    if($delete)
    {
        echo 'Ce commentaire a bien été supprimé de notre base de données !';

        ?>
        <a href="comment.php">Retour</a>
        <?php
    }
    else
    {
        echo 'Erreur lors de la suppression de l\'administrateur';
    }
}