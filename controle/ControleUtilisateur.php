<?php


class ControleUtilisateur extends ControleVisiteur
{
    private array $tableauErreur = array();

    function __construct()
    {
        global $chemin, $lesVues;

        try {
            $action = $_REQUEST['action'];
            if ($action != NULL) {
                $action = Validation::val_action($action);
            }

            switch ($action) {

                case NULL:
                    $this->accueil(); //appeler page d'accueil
                    break;

                case "VOIR_LISTE" : //visualiser une liste avec ses tâches
                    $this->voirListe($_REQUEST['idliste']);
                    break;


                case "ADD_LISTE_PUB": //ajouter une liste publique
                    $this->ajouterListePub();
                    break;

                case "SUP_LISTE": //supprimer une liste
                    $this->supprimerListe($_REQUEST['idliste']);
                    break;

                case "CHECK_TACHE": //changer l'état 'effectuée' d'une tâche

                case "ADD_TACHE": //ajouter une tâche

                case "SUP_TACHE": //supprimer une tâche
                    $this->supprimerTache($_REQUEST['idTache'], $_REQUEST['idliste']);
                    break;

                case "FORM_CO": //accéder au formulaire de connexion

                case "CONNEXION": //valider le formulaire de connexion

                default:
                    $this->tableauErreur[] = "Mauvais appel php";
                    require($chemin . $lesVues['erreur']);
                    break;
            }

        } catch (PDOException $e) {
            $this->tableauErreur[] = "Erreur de base de données";
            require($chemin . $lesVues['erreur']);

        } catch (Exception $e) {
            $this->tableauErreur[] = "Erreur inattendue";
            require($chemin . $lesVues['erreur']);
        }
        exit(0);
    }
}