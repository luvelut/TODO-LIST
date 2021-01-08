<?php


class GatewayTache
{
    public $co;

    /**
     * GatewayTache constructor.
     * @param $co
     */
    public function __construct()
    {
        global $dsn,$user,$mdp;
        $this->co=new Connexion($dsn,$user,$mdp);
    }

    //permet de sélectionner toutes les tâches d'une liste via l'id de la liste
    public function selectTache(int $id) : array
    {
        $tabTache=array();
        $query='SELECT * FROM tache WHERE idliste=:idliste';
        $this->co->executeQuery($query,array(':idliste' => array($id,PDO::PARAM_INT)));
        $resultats=$this->co->getResultats();
        foreach($resultats as $row)
        {
            if($row['effectuee']=='VRAI') {
                $tabTache[]=new Tache($row['idtache'],$row['intitule'],true);
            }
            else {
                $tabTache[]=new Tache($row['idtache'],$row['intitule'],false);
            }
        }
        return $tabTache;
    }

    //permet de sélectionner une tâche à partir de l'id de la tâche
    public function getById(int $id) : Tache
    {
        $tabTache=array();
        $query='SELECT idtache,intitule,effectuee FROM tache WHERE idtache=:id';
        $this->co->executeQuery($query,array(':id' => array($id,PDO::PARAM_INT)));
        $resultats=$this->co->getResultats();
        foreach($resultats as $row)
        {
            if($row['effectuee']=='VRAI') {
                $tabTache[]=new Tache($row['idtache'],$row['intitule'],true);
            }
            else {
                $tabTache[]=new Tache($row['idtache'],$row['intitule'],false);
            }
        }
        return $tabTache[0];
    }

    //crée une nouvelle tâche dans la base de données
    public function ajouterTache(string $intitule, int $idliste) : void
    {
        $query="INSERT INTO tache VALUES(:idtache,:intitule,:bool,:idliste)";
        $this->co->executeQuery($query,array(':idtache' => array('NULL',PDO::PARAM_NULL),
            ':intitule' => array($intitule,PDO::PARAM_STR),
            ':bool' => array('FAUX',PDO::PARAM_STR),
            ':idliste' => array($idliste,PDO::PARAM_INT)));
    }

    //modifie la base de données pour que la tâche soit marquée comme effectuée
    public function cocherTache(int $id) : void
    {
        $query="UPDATE tache SET effectuee='VRAI' WHERE idtache=:id";
        $this->co->executeQuery($query,array(':id' => array($id,PDO::PARAM_INT)));
    }

    //modifie la base de données pour que la tâche soit marquée comme non effectuée
    public function decocherTache(int $id) : void
    {
        $query="UPDATE tache SET effectuee='FAUX' WHERE idtache=:id";
        $this->co->executeQuery($query,array(':id' => array($id,PDO::PARAM_INT)));
    }

    //supprime une tâche de la base de données
    public function supprimerTache(int $id) : void
    {
        $query="DELETE FROM tache WHERE idtache=:id";
        $this->co->executeQuery($query,array(':id' => array($id,PDO::PARAM_INT)));
    }
}