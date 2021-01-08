<?php


class GatewayListe
{
    public $co;

    /**
     * GatewayListe constructor.
     * @param $co
     */
    public function __construct()
    {
        global $dsn,$user,$mdp;
        $this->co=new Connexion($dsn,$user,$mdp);
    }

    //sélectionne les listes publiques à afficher sur une page
    public function selectListesPubliques(int $premiereListe, int $nbListes): array
    {
        $tabPub= array();
        $query="SELECT * FROM liste WHERE privee=:priv ORDER BY idliste DESC LIMIT :premiere,:nbListes";
        $this->co->executeQuery($query,array(':priv' => array('NON',PDO::PARAM_STR),
            ':premiere' => array($premiereListe,PDO::PARAM_INT),
            ':nbListes' => array($nbListes,PDO::PARAM_INT)));
        $resultats=$this->co->getResultats();
        foreach($resultats as $row)
        {
            $tabPub[]=new Liste($row['idliste'],$row['titre'],false);
        }
        return $tabPub;
    }

    //sélectionne les listes privées à afficher sur une page
    public function selectListesPrivees(int $id,int $premiereListe, int $nbListes): array
    {
        $tabPriv = array();
        $query="SELECT * FROM liste WHERE privee=:priv AND idauteur=:idauteur ORDER BY idliste DESC LIMIT :premiere,:nbListes";
        $this->co->executeQuery($query,array(':idauteur' => array($id,PDO::PARAM_INT),
            ':priv' => array('OUI',PDO::PARAM_STR),
            ':premiere' => array($premiereListe,PDO::PARAM_INT),
            ':nbListes' => array($nbListes,PDO::PARAM_INT)));
        $resultats=$this->co->getResultats();
        foreach($resultats as $row)
        {
            $tabPriv[]=new Liste($row['idliste'],$row['titre'],true);
        }
        return $tabPriv;
    }

    //renvoie le nombre total de listes publiques
    public function nbListesPub() : int
    {
        $query='SELECT COUNT(*) FROM liste WHERE privee=:priv';
        $this->co->executeQuery($query,array(':priv' => array('NON',PDO::PARAM_STR)));
        $resultats=$this->co->getResultats();
        return $resultats[0]['COUNT(*)'];
    }

    //renvoie le nombre total de listes privées
    public function nbListesPriv(int $id) : int
    {
        $query='SELECT COUNT(*) FROM liste WHERE idauteur=:id';
        $this->co->executeQuery($query,array(':id' => array($id,PDO::PARAM_INT)));
        $resultats=$this->co->getResultats();
        return $resultats[0]['COUNT(*)'];
    }

    //permet l'ajout dans la base de données d'une nouvelle liste publique
    public function ajouterListePublique(string $titre) : void
    {
        $query="INSERT INTO liste VALUES(:id,:titre,:priv,:idauteur)";
        $this->co->executeQuery($query,array(':id' => array('NULL', PDO::PARAM_NULL),
            ':titre' => array($titre,PDO::PARAM_STR),
            ':priv' => array('NON',PDO::PARAM_STR),
            ':idauteur' => array('NULL',PDO::PARAM_NULL)));
    }

    //permet l'ajout dans la base de données d'une nouvelle liste privée
    public function ajouterListePrivee(string $titre, int $id) : void
    {
        $query="INSERT INTO liste VALUES(:id,:titre,:priv,:idauteur)";
        $this->co->executeQuery($query,array(':id' => array('NULL', PDO::PARAM_NULL),
            ':titre' => array($titre,PDO::PARAM_STR),
            ':priv' => array('OUI',PDO::PARAM_STR),
            ':idauteur' => array($id,PDO::PARAM_INT)));
    }

    //permet la suppression d'une liste dans la base de données
    public function supprimerListe(int $id) : void
    {
        $query='DELETE FROM liste WHERE idliste=:id';
        $this->co->executeQuery($query,array(':id' => array($id, PDO::PARAM_INT)));
    }

    //permet de récupérer le titre d'une liste à partir de son id
    public function getTitre(int $id) : string
    {
        $query='SELECT titre FROM liste WHERE idliste=:id';
        $this->co->executeQuery($query,array(':id' => array($id, PDO::PARAM_INT)));
        $resultats=$this->co->getResultats();
        return $resultats[0]['titre'];
    }
}