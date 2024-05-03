<?php
session_start();
include('../../bdd/cnx.php');
include('functions.php');
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Sandrine Coupart - Administrateur page de test</title>
  <!-- Styles CSS-->
  <link rel="stylesheet" href="../../css/styles.css">
  <!-- Responsive -->
  <link rel="stylesheet" href="../../css/responsive.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
  <!-- Bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

    <?php

    if($_SESSION['pseudo'])
    {
        ?>
            <nav class="navbar navbar-light">
                <h1 class="title-navbar">Sandrine Coupart - Espace Client</h1>
            </nav>

            <ol class="breadcrumb">
                <a href="../dashboard.php"><li class="breadcrumb-item" aria-current="page">Panel</li></a>
                <li class="breadcrumb-item active" aria-current="page">Page de test</li>
            </ol>
        
        <?php

        $sqlDisplayComment = "SELECT * FROM `coupart_comment` WHERE `etat` = 1";

        $reqDisplayCommentApprouved = $db->query($sqlDisplayComment);

        $displayComment = $stmt->fetchAll();

        foreach($displayComment as $displayComments)
        {
            echo $displayComments['id'];
            echo $displayComments['nom'];
            echo $displayComments['email'];
            echo $displayComments['message'];
        }

        
    }
    else
    {
        noAdmin(); 
    }

    ?>

    <?php

cnxSuccessAdmin();

?>

</body>
<script src="../../js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>