<?php
session_start();
include('../../bdd/cnx.php');
include('../dev/functions.php');

$id = $_GET['id'];

if(isset($id))
{
    $sql = "DELETE FROM `coupart_user` WHERE `id` = :id";

    $req = $db->prepare($sql);

    $req->bindvalue(':id', $id);

    $delete = $req->execute();

    if($delete)
    {
        echo "L'utilisateur a bien été supprimé !";
        ?>
        <button class="btn btn-primary"><a class="text-decoration-none text-white" href="client.php">Retour</a></button>
        <?php
    }
    else
    {
        echo "Erreur lors de la suppression de l'utilisateur";
    }
}