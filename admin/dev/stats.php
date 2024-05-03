<?php
session_start();
include('../../bdd/cnx.php'); // On inclus la base de données

/* Statstistiques des administrateurs inscrits sur la bdd */

$sqlCountAdmin = "SELECT COUNT(*) AS id FROM coupart_admin";

$reqCountAdmin = $db->query($sqlCountAdmin);

$countAdmin = $reqCountAdmin->fetch(PDO::FETCH_ASSOC);

/* Statstistiques des clients inscrits sur la bdd */

$sqlCountClients = "SELECT COUNT(*) AS `id` FROM `coupart_user`";

$reqCountClients = $db->query($sqlCountClients);

$countClients = $reqCountClients->fetch(PDO::FETCH_ASSOC);