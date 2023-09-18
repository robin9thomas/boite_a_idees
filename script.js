function show_idea_form(){
    var form_element = document.getElementById("champ_nouvelle_idee");
    var show_button = document.getElementById("affiche_formulaire_idee");
    var hide_button = document.getElementById("masque_formulaire_idee");

    form_element.style.display = "flex";
    show_button.style.display = "none";
    hide_button.style.display = "flex";
}

function hide_idea_form(){
    var form_element = document.getElementById("champ_nouvelle_idee");
    var hide_button = document.getElementById("masque_formulaire_idee");
    var show_button = document.getElementById("affiche_formulaire_idee");

    form_element.style.display = "none";
    show_button.style.display = "flex";
    hide_button.style.display = "none";
}