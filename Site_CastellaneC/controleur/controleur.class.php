<?php
require_once("modele/modele.class.php");

class Controleur {
    private $unModele;

    public function __construct() {
        // Instancier la classe Modele
        $this->unModele = new Modele();
    }

    /****************** Gestion des candidats ******************/
    public function insertCandidat($tab) {
        // Contrôler les données avant leur insertion dans la BDD
        $this->unModele->insertCandidat($tab);
    }

    public function selectAllCandidats($filtre) {
        $lesCandidats = $this->unModele->selectAllCandidats($filtre);
        // Contrôler les données
        return $lesCandidats;
    }

    public function deleteCandidat($idCandidat) {
        // Vérifier que le candidat existe dans la table
        $this->unModele->deleteCandidat($idCandidat);
    }

    public function updateCandidat($tab) {
        $this->unModele->updateCandidat($tab);
    }

    public function selectWhereCandidat($idCandidat) {
        return $this->unModele->selectWhereCandidat($idCandidat);
    }

    /****************** Gestion des moniteurs ******************/
    public function insertMoniteur($tab) {
        $this->unModele->insertMoniteur($tab);
    }

    public function selectAllMoniteurs($filtre) {
        $lesMoniteurs = $this->unModele->selectAllMoniteurs($filtre);
        return $lesMoniteurs;
    }

    public function deleteMoniteur($idMoniteur) {
        $this->unModele->deleteMoniteur($idMoniteur);
    }

    public function updateMoniteur($tab) {
        $this->unModele->updateMoniteur($tab);
    }

    public function selectWhereMoniteur($idMoniteur) {
        return $this->unModele->selectWhereMoniteur($idMoniteur);
    }

    /****************** Gestion des examens ******************/
    public function insertExamen($tab) {
        $this->unModele->insertExamen($tab);
    }

    public function selectAllExamens($filtre) {
        $lesExamens = $this->unModele->selectAllExamens($filtre);
        return $lesExamens;
    }

    public function deleteExamen($idExamen) {
        $this->unModele->deleteExamen($idExamen);
    }

    public function updateExamen($tab) {
        $this->unModele->updateExamen($tab);
    }

    public function selectWhereExamen($idExamen) {
        return $this->unModele->selectWhereExamen($idExamen);
    }

    /****************** Gestion des véhicules ******************/
    public function insertVehicule($tab) {
        $this->unModele->insertVehicule($tab);
    }

    public function selectAllVehicules($filtre) {
        $lesVehicules = $this->unModele->selectAllVehicules($filtre);
        return $lesVehicules;
    }

    public function deleteVehicule($idVehicule) {
        $this->unModele->deleteVehicule($idVehicule);
    }

    public function updateVehicule($tab) {
        $this->unModele->updateVehicule($tab);
    }

    public function selectWhereVehicule($idVehicule) {
        return $this->unModele->selectWhereVehicule($idVehicule);
    }

    /****************** Gestion des leçons ******************/
    public function insertLecon($tab) {
        $this->unModele->insertLecon($tab);
    }

    public function selectAllLecons($filtre) {
        $lesLecons = $this->unModele->selectAllLecons($filtre);
        return $lesLecons;
    }

    public function deleteLecon($idLecon) {
        $this->unModele->deleteLecon($idLecon);
    }

    public function updateLecon($tab) {
        $this->unModele->updateLecon($tab);
    }

    public function selectWhereLecon($idLecon) {
        return $this->unModele->selectWhereLecon($idLecon);
    }

    /****************** Gestion des plannings ******************/
    public function insertPlanning($tab) {
        $this->unModele->insertPlanning($tab);
    }

    public function selectAllPlannings($filtre) {
        $lesPlannings = $this->unModele->selectAllPlannings($filtre);
        return $lesPlannings;
    }

    public function deletePlanning($idPlanning) {
        $this->unModele->deletePlanning($idPlanning);
    }

    public function updatePlanning($tab) {
        $this->unModele->updatePlanning($tab);
    }

    public function selectWherePlanning($idPlanning) {
        return $this->unModele->selectWherePlanning($idPlanning);
    }

    /****************** Gestion des responsables ******************/
    public function insertResponsable($tab) {
        $this->unModele->insertResponsable($tab);
    }

    public function selectAllResponsables($filtre) {
        $lesResponsables = $this->unModele->selectAllResponsables($filtre);
        return $lesResponsables;
    }

    public function deleteResponsable($idResponsable) {
        $this->unModele->deleteResponsable($idResponsable);
    }

    public function updateResponsable($tab) {
        $this->unModele->updateResponsable($tab);
    }

    public function selectWhereResponsable($idResponsable) {
        return $this->unModele->selectWhereResponsable($idResponsable);
    }

    /****************** Gestion de la connexion ******************/
    public function verifConnexion($email, $mdp) {
        // Contrôler les données email et mdp
        return $this->unModele->verifConnexion($email, $mdp);
    }
}
?>