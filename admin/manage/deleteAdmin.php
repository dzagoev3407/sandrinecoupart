<?php
include('../../bdd/cnx.php');

$id = $_GET['id']; // On récupere l'ID de l'administrateur

if(isset($id))
{
    $sqlDeleteAdmin = "DELETE FROM `coupart_admin` WHERE `id` = :id";

    $reqDeleteAdmin = $db->prepare($sqlDeleteAdmin);

    $reqDeleteAdmin->bindvalue(':id', $id);

    $delete = $reqDeleteAdmin->execute();

    if($delete)
    {
        echo 'Cet administrateur a bien été supprimé de notre base de données !';

        ?>
        <a href="admin.php">Retour</a>
        <?php
    }
    else
    {
        echo 'Erreur lors de la suppression de l\'administrateur';
    }
}