<?php
class Modele {
	private $unPdo ; 
	//connexion via la classe PDO : PHP DATA Object 

	public function __construct(){
		$serveur = "localhost"; 
		$bdd = "auto_ecole_251"; 
		$user = "root";
		$mdp = ""; 
		try{
		$this->unPdo = new PDO("mysql:host=".$serveur.";dbname=".$bdd,$user, $mdp);
		}
		catch(PDOException $exp){
			echo "Erreur de connexion à la BDD";
		}
	}
/**************** Gestion des candidats ************/

    public function insertCandidat($tab) {
        $requete = "INSERT INTO candidat (NOM, PRENOM, AGE, EMAIL, MDP, NUMERO_TELEPHONE) VALUES (:nom, :prenom, :age, :email, :mdp, :tel);";
        $donnees = array(
            ':nom' => $tab['nom'],
            ':prenom' => $tab['prenom'],
            ':age' => $tab['age'],
            ':email' => $tab['email'],
            ':mdp' => $tab['mdp'],
            ':tel' => $tab['telephone']
        );
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }

    public function selectAllCandidats($filtre = "") {
        if ($filtre == "") {
            $requete = "SELECT * FROM candidat;";
            $exec = $this->unPdo->prepare($requete);
            $exec->execute();
        } else {
            $requete = " SELECT * FROM candidat WHERE nom LIKE :filtre OR prenom LIKE :filtre OR age LIKE :filtre OR email LIKE :filtre OR mdp LIKE :filtre OR numero_telephone LIKE :filtre ;" ;
            $donnees = array(":filtre" => "%" . $filtre . "%");
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
        }
        return $exec->fetchAll();
    }

    public function deleteCandidat($idCandidat) {
        $requete = "DELETE FROM candidat WHERE idcandidat = :idcandidat;";
        $donnees = array(":idcandidat" => $idCandidat);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }

    public function updateCandidat($tab) {
        $requete = "UPDATE candidat SET nom = :nom, prenom = :prenom, age = :age, email = :email, mdp = :mdp, numero_telephone = :tel WHERE idcandidat = :idcandidat;";
        $donnees = array(
            ':idcandidat' => $tab['idcandidat'],
            ':nom' => $tab['nom'],
            ':prenom' => $tab['prenom'],
            ':age' => $tab['age'],
            ':email' => $tab['email'],
            ':mdp' => $tab['mdp'],
            ':tel' => $tab['telephone']
        );
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }

    public function selectWhereCandidat($idCandidat) {
        $requete = "SELECT * FROM candidat WHERE idcandidat = :idcandidat;";
        $donnees = array(":idcandidat" => $idCandidat);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        return $exec->fetch();
    }

    /**************** Gestion des moniteurs ************/

    /**
     * Insère un nouveau moniteur dans la base de données.
     * @param array $tab Les données du moniteur (nom, prenom, email, mdp, numero_telephone, idresponsable).
     */
    public function insertMoniteur($tab) {
        $requete = "INSERT INTO moniteur (NOM, PRENOM, EMAIL, MDP, NUMERO_TELEPHONE, Type_user, IDRESPONSABLE) 
                    VALUES (:nom, :prenom, :email, :mdp, :numero_telephone, :type_user, :idresponsable);";
        $donnees = array(
            ':nom' => $tab['nom'],
            ':prenom' => $tab['prenom'],
            ':email' => $tab['email'],
            ':mdp' => $tab['mdp'],
            ':numero_telephone' => $tab['numero_telephone'],
            ':type_user' => "MONITEUR", // Type_user est toujours "MONITEUR"
            ':idresponsable' => $tab['idresponsable']
        );
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }

    /**
     * Récupère tous les moniteurs de la base de données.
     * @param string $filtre Le filtre à appliquer sur les résultats.
     * @return array La liste des moniteurs.
     */
    public function selectAllMoniteurs($filtre = "") {
        if ($filtre == "") {
            $requete = "SELECT * FROM moniteur;";
            $exec = $this->unPdo->prepare($requete);
            $exec->execute();
        } else {
            $requete = "SELECT * FROM moniteur 
                        WHERE NOM LIKE :filtre OR PRENOM LIKE :filtre OR EMAIL LIKE :filtre OR NUMERO_TELEPHONE LIKE :filtre;";
            $donnees = array(":filtre" => "%" . $filtre . "%");
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
        }
        return $exec->fetchAll();
    }

    /**
     * Supprime un moniteur de la base de données.
     * @param int $idMoniteur L'ID du moniteur à supprimer.
     */
    public function deleteMoniteur($idMoniteur) {
        $requete = "DELETE FROM moniteur WHERE IDmoniteur = :idmoniteur;";
        $donnees = array(":idmoniteur" => $idMoniteur);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }

    /**
     * Met à jour les informations d'un moniteur dans la base de données.
     * @param array $tab Les nouvelles données du moniteur.
     */
    public function updateMoniteur($tab) {
        $requete = "UPDATE moniteur 
                    SET NOM = :nom, PRENOM = :prenom, EMAIL = :email, MDP = :mdp, 
                        NUMERO_TELEPHONE = :numero_telephone, IDRESPONSABLE = :idresponsable 
                    WHERE IDmoniteur = :idmoniteur;";
        $donnees = array(
            ':idmoniteur' => $tab['idmoniteur'],
            ':nom' => $tab['nom'],
            ':prenom' => $tab['prenom'],
            ':email' => $tab['email'],
            ':mdp' => $tab['mdp'],
            ':numero_telephone' => $tab['numero_telephone'],
            ':idresponsable' => $tab['idresponsable']
        );
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }

    /**
     * Récupère les informations d'un moniteur spécifique.
     * @param int $idMoniteur L'ID du moniteur à récupérer.
     * @return array Les informations du moniteur.
     */
    public function selectWhereMoniteur($idMoniteur) {
        $requete = "SELECT * FROM moniteur WHERE IDmoniteur = :idmoniteur;";
        $donnees = array(":idmoniteur" => $idMoniteur);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        return $exec->fetch();
    }


/**************** Gestion des véhicules ************/

    public function insertVehicule($tab) {
        $requete = "INSERT INTO vehicule (MARQUE, MODELE, IMMATRICULATION) VALUES (:marque, :modele, :immatriculation);";
        $donnees = array(
            ':marque' => $tab['marque'],
            ':modele' => $tab['modele'],
            ':immatriculation' => $tab['immatriculation']
        );
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }

    public function selectAllVehicules($filtre = "") {
        if ($filtre == "") {
            $requete = "SELECT * FROM vehicule;";
            $exec = $this->unPdo->prepare($requete);
            $exec->execute();
        } else {
            $requete = "SELECT * FROM vehicule WHERE MARQUE LIKE :filtre OR MODELE LIKE :filtre OR IMMATRICULATION LIKE :filtre;";
            $donnees = array(":filtre" => "%" . $filtre . "%");
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
        }
        return $exec->fetchAll();
    }

    public function deleteVehicule($idVehicule) {
        $requete = "DELETE FROM vehicule WHERE IDvehicule = :idvehicule;";
        $donnees = array(":idvehicule" => $idVehicule);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }

    public function updateVehicule($tab) {
        $requete = "UPDATE vehicule SET MARQUE = :marque, MODELE = :modele, IMMATRICULATION = :immatriculation WHERE IDvehicule = :idvehicule;";
        $donnees = array(
            ':idvehicule' => $tab['idvehicule'],
            ':marque' => $tab['marque'],
            ':modele' => $tab['modele'],
            ':immatriculation' => $tab['immatriculation']
        );
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }

    public function selectWhereVehicule($idVehicule) {
        $requete = "SELECT * FROM vehicule WHERE IDvehicule = :idvehicule;";
        $donnees = array(":idvehicule" => $idVehicule);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        return $exec->fetch();
    }

/**************** Gestion des leçons ************/

    public function insertLecon($tab) {
        $requete = "INSERT INTO lecon (TYPE_DE_LECON, DESCRIPTION, TITRE) VALUES (:type_lecon, :description, :titre);";
        $donnees = array(
            ':type_lecon' => $tab['type_lecon'],
            ':description' => $tab['description'],
            ':titre' => $tab['titre']
        );
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }

    public function selectAllLecons($filtre = "") {
        if ($filtre == "") {
            $requete = "SELECT * FROM lecon;";
            $exec = $this->unPdo->prepare($requete);
            $exec->execute();
        } else {
            $requete = "SELECT * FROM lecon WHERE TYPE_DE_LECON LIKE :filtre OR DESCRIPTION LIKE :filtre OR TITRE LIKE :filtre;";
            $donnees = array(":filtre" => "%" . $filtre . "%");
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
        }
        return $exec->fetchAll();
    }

    public function deleteLecon($idLecon) {
        $requete = "DELETE FROM lecon WHERE IDlecon = :idlecon;";
        $donnees = array(":idlecon" => $idLecon);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }

    public function updateLecon($tab) {
        $requete = "UPDATE lecon SET TYPE_DE_LECON = :type_lecon, DESCRIPTION = :description, TITRE = :titre WHERE IDlecon = :idlecon;";
        $donnees = array(
            ':idlecon' => $tab['idlecon'],
            ':type_lecon' => $tab['type_lecon'],
            ':description' => $tab['description'],
            ':titre' => $tab['titre']
        );
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }

    public function selectWhereLecon($idLecon) {
        $requete = "SELECT * FROM lecon WHERE IDlecon = :idlecon;";
        $donnees = array(":idlecon" => $idLecon);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        return $exec->fetch();
    }

    /**************** Gestion des examens ************/

    /**
     * Insère un nouvel examen dans la base de données.
     */
    public function insertExamen($tab) {
        $requete = "INSERT INTO examen (date_et_heure_examen, vehicule, type_de_permis) 
                    VALUES (:date_et_heure_examen, :vehicule, :type_de_permis);";
        $donnees = array(
            ':date_et_heure_examen' => $tab['date_et_heure_examen'],
            ':vehicule' => $tab['idvehicule'],
            ':type_de_permis' => $tab['type_de_permis']
        );
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }

    /**
	 Récupère tous les examens de la base de données.
     */
    public function selectAllExamens($filtre = "") {
        if ($filtre == "") {
            $requete = "SELECT * FROM examen;";
            $exec = $this->unPdo->prepare($requete);
            $exec->execute();
        } else {
            $requete = "SELECT * FROM examen 
                        WHERE date_et_heure_examen LIKE :filtre OR vehicule LIKE :filtre OR type_de_permis LIKE :filtre;";
            $donnees = array(":filtre" => "%" . $filtre . "%");
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
        }
        return $exec->fetchAll();
    }

    /**
     * Supprime un examen de la base de données.
     */
    public function deleteExamen($idexamen) {
        $requete = "DELETE FROM examen WHERE idexamen = :idexamen;";
        $donnees = array(":idexamen" => $idexamen);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }

    /**
     * Met à jour les informations d'un examen dans la base de données.
     */
    public function updateExamen($tab) {
        $requete = "UPDATE examen 
                    SET date_et_heure_examen = :date_et_heure_examen, vehicule = :vehicule, type_de_permis = :type_de_permis 
                    WHERE idexamen = :idexamen;";
        $donnees = array(
            ':idexamen' => $tab['idexamen'],
            ':date_et_heure_examen' => $tab['date_et_heure_examen'],
            ':vehicule' => $tab['idvehicule'],
            ':type_de_permis' => $tab['type_de_permis']
        );
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }

    /**
     * Récupère les informations d'un examen spécifique.
     */
    public function selectWhereExamen($idexamen) {
        $requete = "SELECT * FROM examen WHERE idexamen = :idexamen;";
        $donnees = array(":idexamen" => $idexamen);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        return $exec->fetch();
    }


/**************** Gestion des plannings ************/

    public function insertPlanning($tab) {
        $requete = "INSERT INTO plannings (idlecon, idcandidat, dateheuredebut, idmoniteur, dateheuref, etat) VALUES (:idlecon, :idcandidat, :dateheuredebut, :idmoniteur, :dateheuref, :etat);";
        $donnees = array(
            ':idlecon' => $tab['idlecon'],
            ':idcandidat' => $tab['idcandidat'],
            ':dateheuredebut' => $tab['dateheuredebut'],
            ':idmoniteur' => $tab['idmoniteur'],
            ':dateheuref' => $tab['dateheuref'],
            ':etat' => $tab['etat']
        );
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }

    public function selectAllPlannings($filtre = "") {
    if ($filtre == "") {
        $requete = "SELECT p.*, l.titre AS titre_lecon 
                   FROM plannings p
                   JOIN lecon l ON p.idlecon = l.idlecon";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute();
    } else {
        $requete = "SELECT p.*, l.titre AS titre_lecon 
                   FROM plannings p
                   JOIN lecon l ON p.idlecon = l.idlecon
                   WHERE l.titre LIKE :filtre_titre
                   OR p.idcandidat LIKE :filtre
                   OR p.dateheuredebut LIKE :filtre
                   OR p.idmoniteur LIKE :filtre
                   OR p.etat LIKE :filtre";
        
        $donnees = [
            ":filtre_titre" => "%" . $filtre . "%",
            ":filtre" => "%" . $filtre . "%"
        ];
        
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }
    return $exec->fetchAll();
}

    public function deletePlanning($idPlanning) {
        $requete = "DELETE FROM plannings WHERE idplanning = :idplanning;";
        $donnees = array(":idplanning" => $idPlanning);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }

    public function updatePlanning($tab) {
        $requete = "UPDATE plannings SET idlecon = :idlecon, idcandidat = :idcandidat, dateheuredebut = :dateheuredebut, idmoniteur = :idmoniteur, dateheuref = :dateheuref, etat = :etat WHERE idplanning = :idplanning;";
        $donnees = array(
            ':idplanning' => $tab['idplanning'],
            ':idlecon' => $tab['idlecon'],
            ':idcandidat' => $tab['idcandidat'],
            ':dateheuredebut' => $tab['dateheuredebut'],
            ':idmoniteur' => $tab['idmoniteur'],
            ':dateheuref' => $tab['dateheuref'],
            ':etat' => $tab['etat']
        );
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }

    public function selectWherePlanning($idPlanning) {
        $requete = "SELECT * FROM plannings WHERE IDplanning = :idplanning;";
        $donnees = array(":idplanning" => $idPlanning);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        return $exec->fetch();
    }

/**************** Gestion des responsables ************/

    public function insertResponsable($tab) {
        $requete = "INSERT INTO responsable (NOM, PRENOM, EMAIL, MDP, NUMERO_TELEPHONE) VALUES (:nom, :prenom, :email, :mdp, :tel);";
        $donnees = array(
            ':nom' => $tab['nom'],
            ':prenom' => $tab['prenom'],
            ':email' => $tab['email'],
            ':mdp' => $tab['mdp'],
            ':tel' => $tab['telephone']
        );
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }

    public function selectAllResponsables($filtre = "") {
        if ($filtre == "") {
            $requete = "SELECT * FROM responsable;";
            $exec = $this->unPdo->prepare($requete);
            $exec->execute();
        } else {
            $requete = "SELECT * FROM responsable WHERE NOM LIKE :filtre OR PRENOM LIKE :filtre OR EMAIL LIKE :filtre OR NUMERO_TELEPHONE LIKE :filtre;";
            $donnees = array(":filtre" => "%" . $filtre . "%");
            $exec = $this->unPdo->prepare($requete);
            $exec->execute($donnees);
        }
        return $exec->fetchAll();
    }

    public function deleteResponsable($idResponsable) {
        $requete = "DELETE FROM responsable WHERE IDresponsable = :idresponsable;";
        $donnees = array(":idresponsable" => $idResponsable);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }

    public function updateResponsable($tab) {
        $requete = "UPDATE responsable SET nom = :nom, prenom = :prenom, email = :email, mdp = :mdp, numero_telephone = :tel WHERE idresponsable = :idresponsable;";
        $donnees = array(
            ':idresponsable' => $tab['idresponsable'],
            ':nom' => $tab['nom'],
            ':prenom' => $tab['prenom'],
            ':email' => $tab['email'],
            ':mdp' => $tab['mdp'],
            ':tel' => $tab['telephone']
        );
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
    }

    public function selectWhereResponsable($idResponsable) {
        $requete = "SELECT * FROM responsable WHERE IDresponsable = :idresponsable;";
        $donnees = array(":idresponsable" => $idResponsable);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        return $exec->fetch();
    }

	/********* Gestion des users ****************/
	public function verifConnexion ($email, $mdp){
		$requete = "select * from user where email =:email and mdp =:mdp ;"; 
		$exec = $this->unPdo->prepare ($requete);
		$donnees = array(":email"=>$email, ":mdp"=>$mdp);
		$exec->execute ($donnees);
		return $exec->fetch(); 
	}
} 
?>






















