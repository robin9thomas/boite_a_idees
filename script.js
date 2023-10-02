function manage_form(){
    const toggle_button = document.getElementById('toggle_button');
    const champ_nouvelle_idee = document.getElementById('champ_nouvelle_idee');

    champ_nouvelle_idee.classList.toggle('hidden');
    champ_nouvelle_idee.classList.toggle('visible');

    if (champ_nouvelle_idee.classList.contains('hidden')) {
        toggle_button.innerHTML = "J'ai une idée!";
        
    } else {
        toggle_button.innerHTML = "J'ai changé d'avis...";        
    }
}

function valider_Formulaire() {
    var nom = document.getElementById('nom_user').value;
    var titre = document.getElementById('titre_idee').value;
    var idee = document.getElementById('contenu_idee').value;
    var categorie = document.getElementById('select_categorie')

    if (nom === '') {
        alert('Le champ Nom est obligatoire.');
        return false;
    }

    if (titre === '') {
        alert('Le champ titre est obligatoire.');
        return false;
    }

    if (idee === '') {
        alert('Le champ idée est obligatoire.');
        return false;
    }

    if (categorie === 'default') {
        alert('Vous devez séléctionner une catégorie.');
        return false;
    }



    return true;
}

function ajout_categorie(){
    const conteneur_categorie = document.getElementById("nouvelle_categorie_conteneur");
    const fermer_nouvelle_categorie = document.getElementById("fermer_categorie");
    const ouvrir_nouvelle_categorie = document.getElementById("ouvrir_categorie");

    if(conteneur_categorie.style.display ==="none"){
        conteneur_categorie.style.display ="flex" ;
        fermer_nouvelle_categorie.style.display ="block";
        ouvrir_nouvelle_categorie.style.display ="none";
    }else{
        conteneur_categorie.style.display ="none" ;
        fermer_nouvelle_categorie.style.display ="none";
        ouvrir_nouvelle_categorie.style.display ="block";
    }
}

function changer_theme(){
    const fichier_css = document.getElementById("css-link");

    let fichier_actuel = fichier_css.getAttribute("href");

    if (fichier_actuel === "light.css") {
        fichier_css.href = "dark.css";
        fichier_actuel = "dark.css";
    } else {
        fichier_css.href = "light.css"; 
        fichier_actuel = "light.css";
    }
    
};
