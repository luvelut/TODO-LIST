<?php


abstract class Controle
{
    public function accueil() {
        global $chemin, $lesVues;

        $m = new ModeleDonnees();
        $tabPub = $m->getListesPubliques();
        require($chemin . $lesVues['accueil']);
    }
}