<?php


class idees{

    private $id;
    private $categorie_idee; //id categorie
    private $contenu_idee;
    private $user_name;
    private $titre_idee;
    private $creation_date;

    public function __construct(){
       
    }

    public function load(){
        global $mysql;
        $count = 0;
        $req_sel = "
        SELECT `id_idee`,
               `nom_utilisateur`, 
               `contenue_idee`, 
               `id_categorie`,
               `titre_idee`,
               `date_creation`
        FROM `idees`
        ";

        $result = $mysql->query($req_sel);
        
        while ($array_result = $result->fetch_assoc()) {
            $idee_liste[$count]['id_idee'] = $array_result['id_idee'];
            $idee_liste[$count]['nom_utilisateur'] = $array_result['nom_utilisateur'];
            $idee_liste[$count]['contenue_idee'] = $array_result['contenue_idee'];
            $idee_liste[$count]['id_categorie'] = $array_result['id_categorie'];
            $idee_liste[$count]['titre_idee'] = $array_result['titre_idee'];
            $idee_liste[$count]['date_creation'] = $array_result['date_creation'];

            $count++;
        }

        return $idee_liste;
    } 

    public function add($nom_utilisateur, $contenue_idee, $id_categorie, $titre_idee){
        global  $mysql;

        $req_insert = "
        INSERT INTO `idees`(
                `nom_utilisateur`, 
                `contenue_idee`, 
                `id_categorie`,
                `titre_idee`,
                `date_creation`
                ) 
        VALUES ('".addslashes($nom_utilisateur)."',
                '".addslashes($contenue_idee)."',
                '".$id_categorie."',
                '".addslashes($titre_idee)."',
                CURRENT_DATE)"
        ;

        $mysql->query($req_insert);

    
    }
}
