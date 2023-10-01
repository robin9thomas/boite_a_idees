<?php
class categorie{

    public function load(){
        global $mysql;
        $count = 0;

        $req_sel = "
        SELECT `id_categorie`,
               `nom_categorie`
        FROM `categorie`
        ";

        $result = $mysql->query($req_sel);

        while ($array_result = $result->fetch()) {
             $categorie_liste[$count]['id_categorie'] = $array_result['id_categorie'];
             $categorie_liste[$count]['nom_categorie'] = $array_result['nom_categorie'];
        }
        return $categorie_liste;
    }
}
