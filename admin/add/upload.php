<?php
// Répertoire où les images seront téléchargées
$target_dir = "adminImg/";

// Chemin complet du fichier téléchargé
$target_file = $target_dir . basename($_FILES["image"]["name"]);

// Variable pour vérifier si le téléchargement est autorisé
$uploadOk = 1;

// Obtient l'extension du fichier
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Vérifie si le fichier image est réel ou faux
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "Le fichier est une image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Le fichier n'est pas une image.";
        $uploadOk = 0;
    }
}

// Vérifie si le fichier existe déjà
if (file_exists($target_file)) {
    echo "Désolé, le fichier existe déjà.";
    $uploadOk = 0;
}

// Vérifie la taille du fichier
if ($_FILES["image"]["size"] > 5000000) {
    echo "Désolé, votre fichier est trop volumineux.";
    $uploadOk = 0;
}

// Autorise certains formats de fichiers
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.";
    $uploadOk = 0;
}

// Vérifie si $uploadOk est défini sur 0 par une erreur
if ($uploadOk == 0) {
    echo "Désolé, votre fichier n'a pas été téléchargé.";

// Tout est ok, essayez de télécharger le fichier
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "Le fichier ". basename( $_FILES["image"]["name"]). " a été téléchargé.";
        $image_url = 'https://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/' . $target_file; // URL de l'image
        echo "Voici le chemin de l'image à mettre en bdd : <bold>".$image_url."</bold>.";
    } else {
        echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
    }
}
?>