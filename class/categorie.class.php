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

        while ($array_result = $result->fetch_assoc()) {
            $categorie_liste[$count]['id_categorie'] = $array_result['id_categorie'];
            $categorie_liste[$count]['nom_categorie'] = $array_result['nom_categorie'];

        }
        return $categorie_liste;
    }

    public function load_nom($id){
        global $mysql;
        $count = 0;

        $req_sel = "
        SELECT  `nom_categorie`
        FROM `categorie`
        WHERE id_categorie =".$id
        ;

        $result = $mysql->query($req_sel);

        $array_result = $result->fetch_assoc();

        $nom_categorie = $array_result['nom_categorie'];

        return $nom_categorie;
    }

}
