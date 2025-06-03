<?php
require_once("../modele/modele.class.php");

class ControleurInscription {
    private $unModele;

    public function __construct() {
        $this->unModele = new Modele();
    }

    public function afficherFormulaire() {
        require_once("../vue/vue_inscription.php");
    }

    public function traiterInscription($donnees) {
        try {
            // Insertion dans candidat
            $this->unModele->insertCandidat($donnees);
            
            // Insertion dans user avec mot de passe hashé
            $mdpHash = password_hash($donnees['mdp'], PASSWORD_DEFAULT);
            $req = $this->unModele->unPdo->prepare("INSERT INTO user (nom, prenom, email, mdp, role) 
                                                 VALUES (:nom, :prenom, :email, :mdp, 'candidat')");
            $req->execute([
                ':nom' => $donnees['nom'],
                ':prenom' => $donnees['prenom'],
                ':email' => $donnees['email'],
                ':mdp' => $mdpHash
            ]);
            
            header("Location: ../index.php?page=1&inscription=success");
            exit();
        } catch (PDOException $e) {
            header("Location: ../index.php?page=10&error=".urlencode($e->getMessage()));
            exit();
        }
    }
}

// Traitement des données POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $donnees = [
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'age' => $_POST['age'],
        'email' => $_POST['email'],
        'mdp' => $_POST['mdp'],
        'telephone' => $_POST['telephone']
    ];
    
    $controleur = new ControleurInscription();
    $controleur->traiterInscription($donnees);
}
?>