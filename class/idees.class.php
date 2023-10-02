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
        SELECT  idees.id_idee,
                idees.id_categorie,
                idees.nom_utilisateur,
                idees.contenue_idee,
                idees.titre_idee,
                DATE_FORMAT(idees.date_creation, \"%d/%m/%Y\") AS date_creation,
                categorie.nom_categorie
        FROM idees
        INNER JOIN categorie ON idees.id_categorie = categorie.id_categorie
        GROUP BY idees.id_idee;
        ";

        $result = $mysql->query($req_sel);

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $idee_liste[$count]['id_idee'] = $row['id_idee'];
            $idee_liste[$count]['nom_utilisateur'] = $row['nom_utilisateur'];
            $idee_liste[$count]['contenue_idee'] = $row['contenue_idee'];
            $idee_liste[$count]['id_categorie'] = $row['id_categorie'];
            $idee_liste[$count]['nom_categorie'] = $row['nom_categorie'];
            $idee_liste[$count]['titre_idee'] = $row['titre_idee'];
            $idee_liste[$count]['date_creation'] = $row['date_creation']; 
            
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

        $result = $mysql->query($req_insert);

        if ($result->rowCount() > 0) {
            echo "<div class=\"succes\">
                    L'idée à bien été ajoutée, merci pour ton aide!
                  </div>";
        } else {
            echo "<div class=\"erreur\">
                     L'ajout de l'idée à échoué...
                  </div>";;
        }
    }
}
