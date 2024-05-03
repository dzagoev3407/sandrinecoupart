<?php
session_start();
include('../bdd/cnx.php');

$logout = session_destroy();
$cnx = 'cnx-client.php'; // Page de connexion

if($logout)
{
    header("Location: $cnx");
}
else
{
    echo 'Erreur lors de la déconnexion !';
}