<?php 
include "config.php";

    if(isset($_POST['Envoyer'])){
        $nom_utilisateur = strip_tags($_POST['nom_user']);
        $titre_idee = strip_tags($_POST['titre_idee']);
        $contenu_idee= strip_tags($_POST['contenu_idee']);
        $id_categorie= $_POST['select_categorie'];

        $idee = new idees();
        $idee->add($nom_utilisateur, $contenu_idee, $id_categorie, $titre_idee);
        unset($idee);
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Boite à idées</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link id="css-link" rel="stylesheet" type="text/css" href="light.css">
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/22a694dfe1.js" crossorigin="anonymous"></script>
</head>
<body>
<?php 


$idees = new idees();
$liste_idees = $idees->load();
unset($idees);

$categorie = new categorie();
$liste_categorie = $categorie->load();
unset($categorie);

$header = "

<header>
    <div class=\"header_inner_left\">
        <h1>Ma boite à idées</h1>
    </div>
    <div class=\"header_inner_right\">
        <i class=\"fa-solid fa-circle-half-stroke\" style='font-size: larger;' onclick=\"changer_theme()\"></i>
    </div>
</header>
    <main>";

$idea_form = "<div class='button_wrapper'>
<button id='toggle_button' onclick='manage_form()'>J'ai une idée!</button>
</div>

<form action='index.php' method='post'>
<div class='hidden' id='champ_nouvelle_idee' >
    <h2>Dis nous en plus !</h2>

    <div class='input_wrapper'>
        <input type='text' name='titre_idee' id='titre_idee' placeholder='Donne un titre à ton idée' required pattern=\"[a-zA-ZÀ-ÖØ-öø-ÿ-' ]\">
    </div>
    <div class='input_wrapper'>
        <input type='text' name='nom_user' id='nom_user' placeholder='Ton nom complet' required pattern=\"[a-zA-ZÀ-ÖØ-öø-ÿ-' ]\">
    </div>
    <div class='input_wrapper'>
        <select name='select_categorie' id='select_categorie'>
            <option value='default' selected>Selectionne la catégorie</option>";

foreach($liste_categorie as $element_categorie){
   
    $idea_form .=  "<option value='".$element_categorie['id_categorie']."'>".$element_categorie['nom_categorie']."</option>";
}

$idea_form .=  "
        </select>
    </div>
    <div class='input_wrapper'>
        <textarea name='contenu_idee' id='contenu_idee' cols='30' rows='10' placeholder='Parle nous de ton idée !'></textarea required pattern=\"[a-zA-ZÀ-ÖØ-öø-ÿ-' ]\">
    </div>
    <div class='button_wrapper'>
        <button type='submit' name='Envoyer'>Envoyer mon idée.</button>
    </div>
</div>
</form>";

$ideas = "
        <div class='ideas_wrapper'>
";       
        
 foreach($liste_idees as $element_idee){        
        $ideas .= "
            <div class='idea'>
                <div class='en-tete_idee'>
                    <h3>".$element_idee['nom_utilisateur']."</h3>
                    <span>".$element_idee['date_creation']."</span>
                </div>        
                <div class='corps_idee'>
                    <h4 class=\"titre_idee\">Titre: ".$element_idee['titre_idee']."</h4>
                    <h5 class=\"categorie_idee\">Catégorie: ".$element_idee['nom_categorie']."</h5>
                    
                    <div class=\"contenu_idee\">
                        <h5>L'idée:</h5>
                        <span>
                            ".$element_idee['contenue_idee']."
                        </span>
                    </div> 
                </div>
            </div>
                 ";
 }

 $ideas .= "
        </div>
 ";
            
echo $header.$idea_form.$ideas;
?>     
        </main>
    </body>
</html>
