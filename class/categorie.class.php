<?php
class categorie{

    public function load(){
        global $mysql;
        $count = 0;

        $req_sel = "
        SELECT `id_categorie`,
               `nom_categorie`,
               `validation`
        FROM `categorie`
        ";

        $result = $mysql->query($req_sel);
        
        while ($array_result = $result->fetch()) {
             $categorie_liste[$count]['id_categorie'] = $array_result['id_categorie'];
             $categorie_liste[$count]['nom_categorie'] = $array_result['nom_categorie'];
             $categorie_liste[$count]['validation'] = $array_result['validation'];

             $count++;
        }
        
        return $categorie_liste;
    }

    public function add($nouvelle_categorie){
        global $mysql;
    
        $req_insert = "
        INSERT INTO `categorie`(
            `nom_categorie`
            ) 
        VALUES ('".addslashes($nouvelle_categorie)."')"
    ;

        $result = $mysql->query($req_insert);

        if ($result->rowCount() > 0) {
            echo "<div class=\"succes\">
                    La categorie à bien été ajoutée
                  </div>";
        } else {
            echo "<div class=\"erreur\">
                     L'ajout de categorie à échoué
                  </div>";;
        }

    }
}
