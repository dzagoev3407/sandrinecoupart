<?php

function noAdmin()
{
    ?>
        <div class="alert alert-danger" role="alert">
            <h1 class="text-center">ALERTE</h1>
            <p class="lead">Espace réservé aux administrateurs du site !</p>
        </div>
    <div class="text-center">
        <a class="text-decoration-none text-white" href="../cnx.php"><button class="btn btn-danger">Retour</button></a>
    </div>
    <?php
}

function cnxSuccessAdmin()
{
    ?>
<div class="modal" id="successModal">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Contenu de la Popup -->
      <div class="modal-body">
        <h4 class="modal-title">Connexion réussie</h4>
        <p>Vous êtes maintenant connecté à votre espace administrateur.</p>
      </div>
      
      <!-- Pied de page de la Popup -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<?php

function successContact()
{
  ?>
    <div class="alert alert-success" role="alert">
      <h1 class="text-center">SUCCÈS !</h1>
      <p class="lead">Message envoyé avec succès ! Nous vous répondrons dans les plus brefs délais !</p>
  <?php

  header('Location: https://kevinbonnefoy.fr/sandrine_coupart');
}

function noSuccessContact()
{
  ?>
    <div class="alert alert-success" role="alert">
      <h1 class="text-center">ALERTE !</h1>
      <p class="lead">Message non envoyé ! Veuillez réessayez !</p>
  <?php
}

}