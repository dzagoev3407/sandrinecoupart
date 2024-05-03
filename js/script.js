console.log('Espace réservé au développeur de ce site !');

/* Partie carte des recettes à l'accueil */

let btnDetails = document.getElementById('btnCardRecipe');
let modalRecipe = document.getElementById('cardDetailsModal');
let closeModal = document.querySelector('.close');

btnDetails.addEventListener('click', function(){
    modalRecipe.style.display = 'block';
});

// Ajout d'un écouteur d'événements sur le bouton de fermeture
closeModal.addEventListener('click', function(){
    modalRecipe.style.display = 'none';
});

// Ajout d'un écouteur d'événements sur la fenêtre pour fermer si on clique en dehors
window.addEventListener('click', function(event){
    if(event.target == modalRecipe){
        modalRecipe.style.display = 'none';
    }
});

function addComment() 
{
    document.getElementById('popup-comment').style.display = 'block';
}

function closeComment()
{
    document.getElementById('popup-comment').style.display = 'none';
}

function togglePasswordVisibility() 
{
    var passwordInput = document.getElementById("mdp");
    var toggleButton = document.getElementById("togglePassword");

    if (passwordInput.type === "password") 
    {
      passwordInput.type = "text";
      toggleButton.textContent = "Masquer";
    } 
    else 
    {
      passwordInput.type = "password";
      toggleButton.textContent = "Afficher";
    }
}

/* Connexion réussie administrateur */

$(document).ready(function(){
    $('#successModal').modal('show');
}); 
