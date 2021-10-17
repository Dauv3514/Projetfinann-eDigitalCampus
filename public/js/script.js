const toogleButton = document.getElementById('toggle-button');
// let barreNavigation = document.getElementsByClassName('navbar');
const navbar = document.getElementById('barrenavigation');

toogleButton.addEventListener('click', (e) => {
    
    console.log(e, 'camarche');

    navbar.classList.toggle("cache");


});


/* $("#new_edit_utilisateur").on('submit', function(){
    if($("#mon_mp").val() != $("#verifpass").val()) {
        //implémentez votre code
        alert("Les deux mots de passe saisies sont différents");
        alert("Merci de renouveler l'opération");
        return false;
    }
});  */



