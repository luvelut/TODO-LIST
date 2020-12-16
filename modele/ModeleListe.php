<?php


class ModeleListe
{
    private GatewayListe $gw;

    public function __construct()
    {
        $this->gw = new GatewayListe();
    }

    public function getListesPubliques()
    {
        return $this->gw->selectListesPubliques();
    }

    public function getListesPrivees(Utilisateur $u)
    {
        return $this->gw->selectListesPrivees($u);
    }

    public function addPublique(String $titre)
    {
        $this->gw->ajouterListePublique($titre);
    }

    public function addPrivee(String $titre, Utilisateur $u)
    {
        $this->gw->ajouterListePrivee($titre,$u);
    }

    public function deleteListe(int $id)
    {
        $this->gw->supprimerListe($id);
    }

    public function getTitre(int $id)
    {
        return $this->gw->getTitre($id);
    }


}