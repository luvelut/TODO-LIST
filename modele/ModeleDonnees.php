<?php


class ModeleDonnees
{
    private GatewayListe $gwL;
    private GatewayTache $gwT;
    private int $nbListesParPage=5;

    public function __construct()
    {
        $this->gwL = new GatewayListe();
        $this->gwT = new GatewayTache();
    }

    //renvoie le nombre de pages nécessaires à l'affichage des listes publiques
    public function getNbPagesPub()
    {
        $totalListes = $this->gwL->nbListesPub();
        $nbPages = ceil($totalListes/$this->nbListesParPage);
        return $nbPages;
    }

    //renvoie le nombre de pages nécessaires à l'affichage des listes privées
    public function getNbPagesPriv(int $id)
    {
        $totalListes = $this->gwL->nbListesPriv($id);
        $nbPages = ceil($totalListes/$this->nbListesParPage);
        return $nbPages;
    }

    //renvoie les listes publiques à afficher sur une page
    public function getListesPubliques(int $page)
    {
        $premiereListe = ($page - 1) * $this->nbListesParPage;

        return $this->gwL->selectListesPubliques($premiereListe,$this->nbListesParPage);
    }

    //renvoie les listes privées à afficher sur une page
    public function getListesPrivees(int $id, int $page)
    {
        $premiereListe = ($page - 1) * $this->nbListesParPage;

        return $this->gwL->selectListesPrivees($id,$premiereListe,$this->nbListesParPage);
    }

    //permet l'ajout d'une nouvelle liste publique
    public function addPublique(String $titre)
    {
        $this->gwL->ajouterListePublique($titre);
    }

    //permet l'ajout d'une nouvelle liste privée
    public function addPrivee(String $titre, int $id)
    {
        $this->gwL->ajouterListePrivee($titre,$id);
    }

    //permet la suppression d'une liste à partir de son id
    public function deleteListe(int $id)
    {
        $this->gwL->supprimerListe($id);
    }

    //renvoie le titre d'une liste à partir de son id
    public function getTitre(int $id)
    {
        return $this->gwL->getTitre($id);
    }

    //renvoie les tâches associée à une liste via l'id de la liste
    public function getTache(int $id)
    {
        return $this->gwT->selectTache($id);
    }

    //ajoute une nouvelle tâche à la liste
    public function addTache(String $titre, int $id)
    {
        $this->gwT->ajouterTache($titre,$id);
    }

    //supprime la tâche précisée par l'id
    public function deleteTache(int $id)
    {
        $this->gwT->supprimerTache($id);
    }

    //renvoie une tâche grâce à son id
    public function getById(int $id) : Tache
    {
        return $this->gwT->getById($id);
    }

    //permet de cocher une tâche
    public function checkTache(int $id)
    {
        $this->gwT->cocherTache($id);
    }

    //permet de décocher une tâche
    public function uncheckTache(int $id)
    {
        $this->gwT->decocherTache($id);
    }

}