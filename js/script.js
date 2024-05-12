console.log('Espace réservé au développeur de ce site !');

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