<?php
session_start();
include('../bdd/cnx.php');
include('dev/functions.php');
$panel = 'dashboard.php'; // Panneau d'administrateur

if(isset($_POST['btn-cnx']))
{
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];

    $sqlCnxAdmin = "SELECT * FROM `coupart_admin` WHERE `pseudo` = '$pseudo'";

    $result = $db->prepare($sqlCnxAdmin);

    $result->execute();

    if($result->rowCount() > 0)
    {
        $data = $result->fetchAll();
        if(password_verify($mdp, $data[0]['mdp']))
        {
            $_SESSION['pseudo'] = $pseudo;
            if($pseudo)
            {
                header("Location: $panel");
                exit();
            }
        }
        else
        {
            echo 'Mot de passe incorrect !';
        }
    }
    else
    {
        echo 'Aucune de ces informations correspondent à un administrateur de ce site !';
    }
}
else
{
    echo 'Erreur !';
}

?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>