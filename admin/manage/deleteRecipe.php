<?php
include('../../bdd/cnx.php');

$id = $_GET['id'];

if(isset($id))
{
    $sql = "DELETE FROM `coupart_recettes` WHERE `id` = :id";

    $req = $db->prepare($sql);

    $req->bindvalue(':id', $id);

    $delete = $req->execute();

    if($delete)
    {
        echo "Cette recette a bien été supprimée !";
    }
    else
    {
        echo "Erreur lors de la suppression de la recette !";
    }
}