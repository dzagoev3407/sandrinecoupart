<?php
session_start();
include('../../bdd/cnx.php');

if(isset($_POST['btn_valid_allergies']))
{
    if(isset($_GET['id']))
    {
        $client_id = $_GET['id'];

        $selected_allergies = array();
        
        if(isset($_POST['arachides'])) {
            $selected_allergies[] = "Arachides";
        }
        if(isset($_POST['noix'])) {
            $selected_allergies[] = "Noix";
        }
        if(isset($_POST['oeufs'])) {
            $selected_allergies[] = "Œufs";
        }

        if(isset($_POST['poissons'])) {
            $selected_allergies[] = "Poissons";
        }

        if(isset($_POST['laitiers'])) {
            $selected_allergies[] = "Produits létiers";
        }

        if(isset($_POST['ble'])) {
            $selected_allergies[] = "Blé";
        }

        // Récupérer les allergies autres spécifiées dans le champ texte
        if(!empty($_POST['autres'])) {
            $selected_allergies[] = htmlspecialchars($_POST['autres']); // Échapper les caractères spéciaux pour éviter les attaques XSS
        }
        
        // Insérer les allergies dans la base de données
        foreach($selected_allergies as $allergie) {
            // Préparer la requête SQL d'insertion
            $sql = "INSERT INTO coupart_allergies (patient_id, nom) VALUES (:client_id, :nom_allergie)";
            $stmt = $db->prepare($sql);
            $stmt->bindvalue(':client_id', $client_id);
            $stmt->bindvalue(':nom_allergie', $allergie);
            $stmt->execute();
        }
        
        echo "Allergies ajoutées avec succès.";
    }
    else
    {
        echo 'non';
    }
}
else
{
    echo 'non';
}
?>
