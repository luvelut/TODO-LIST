<?php


class ModeleTache
{
    private GatewayTache $gw;

    public function __construct()
    {
        $this->gw = new GatewayTache();
    }

    public function getTache(int $id)
    {
        return $this->gw->selectTache($id);
    }

    public function addTache(String $titre, int $id)
    {
        $this->gw->ajouterTache($titre,$id);
    }

    public function deleteTache(int $id)
    {
        $this->gw->supprimerTache($id);
    }

    public function getById(int $id) : Tache
    {
        return $this->gw->getById($id);
    }

    public function checkTache(int $id)
    {
        $this->gw->cocherTache($id);
    }

    public function uncheckTache(int $id)
    {
        $this->gw->decocherTache($id);
    }
}