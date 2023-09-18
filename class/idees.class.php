<?php


class idees{

    private $id;
    private $categorie_idee; //id categorie
    private $contenu_idee;
    private $user_name;
    private $titre_idee;
    private $creation_date;

    public function __construct($id){
        $this->id = $id;

        $this->load();
    }

    public function load(){
        global $mysql;

        $req_sel = "
        SELECT `id_idee`,
               `nom_utilisateur`, 
               `contenue_idee`, 
               `id_categorie`,
               `titre_idee`,
               `date_creation`
        FROM `idees`
        ";
        if(isset($this->id)){
            $req_sel .= " WHERE id_idee =".$this->id;
        }

        $result = $mysql->query($req_sel);

        $array_result = $result->fetch_assoc();
        
        return $array_result;
    }

    public function add($user_name, $idea_content, $id_categorie){
        global  $mysql;

        $req_insert = "
        INSERT INTO `idees`(
                `nom_utilisateur`, 
                `contenue_idee`, 
                `id_categorie`,
                `id_categorie`,
                `id_categorie`,
                ) 
        VALUES ('".$user_name."',
                '".$idea_content."',
                '".$id_categorie."',
                '".$id_categorie."',
                'CURDATE')"
        ;

        $result = $mysql->query($req_insert);

    
    }
}
