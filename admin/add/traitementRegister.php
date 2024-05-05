<?php
include('../../bdd/cnx.php'); // On inclus la connexion à la base de données

if(isset($_POST['btn-register']))
{
    function generateToken() {
        return bin2hex(random_bytes(32)); // Je genère un Token qui me servira à choisir le password à mon utilisateur
    }

    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $token = generateToken();

    $sqlRegister = "INSERT INTO `coupart_admin`(`pseudo`,`email`, `token_password`) VALUES (:pseudo, :email, :token)";
    $reqRegister = $db->prepare($sqlRegister);
    
    $reqRegister->bindvalue(':pseudo', $pseudo);
    $reqRegister->bindvalue(':email', $email);
    $reqRegister->bindvalue(':token', $token);

    $ajout = $reqRegister->execute();

    if($ajout)
    {
        echo 'Enregistrement effectué !';

        $generateMdp = 'generateMdpAdmin.php';

        $to = $email;
        $subject = "Nouvel admin !";
        $message = "Bonjour vous recevez ce mail car vous avez été ajouté en tant qu'admin sur le site de madame Coupart, vous pouvez dès à présent vous connecter à l'adresse suivante : 
                    https://kevinbonnefoy.fr/sandrine_coupart/admin/cnx.php vos données de connexion nom d'utilisateur : nom d'utilisateur : $pseudo, à partir de ce lien : https://kevinbonnefoy.fr/sandrine_coupart/admin/add/generateMdpAdmin.php?token=$token veuillez choisir votre mot de passe bientôt !";
        $headers = "array(
                    'From' => 'webmaster@example.com',
                    'Reply-To' => 'webmaster@example.com',
                    'X-Mailer' => 'PHP/' . phpversion()";

        $mail = mail($to, $subject, $message, $headers);

        if($mail)
        {
            echo "Email envoyé !";
        }
        else
        {
            echo "Email non envoyé !";
        }

    }
    else
    {
        echo 'Erreur lors de l\'ajout du nouvel administrateur !';
    }

}