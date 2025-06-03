<h2> Gestion des candidats </h2>

<?php
// Vérifier si l'utilisateur est un administrateur
if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
    $leCandidat = null;

    // Gérer les actions (suppression ou modification)
    if (isset($_GET['action']) && isset($_GET['idcandidat'])) {
        $action = $_GET['action'];
        $idcandidat = $_GET['idcandidat'];

        switch ($action) {
            case 'sup':
                // Supprimer un candidat
                $unControleur->deleteCandidat($idcandidat);
                echo "<br> Suppression réussie.";
                break;

            case 'edit':
                // Récupérer les informations du candidat pour la modification
                $leCandidat = $unControleur->selectWhereCandidat($idcandidat);
                break;
        }
    }

    // Inclure le formulaire d'insertion ou de modification
    require_once("vue/vue_insert_candidat.php");

    // Traitement du formulaire d'insertion
    if (isset($_POST["Valider"])) {
        // Insérer les données dans la base
        $unControleur->insertCandidat($_POST);
        echo "<br> Insertion réussie.";
    }

    // Traitement du formulaire de modification
    if (isset($_POST["Modifier"])) {
        // Mettre à jour les données dans la base
        $unControleur->updateCandidat($_POST);
        // Actualiser la page
        header("Location: index.php?page=2");
    }
}

// Récupérer les candidats de la base de données
if (isset($_POST['Filtrer'])) {
    $filtre = $_POST['filtre'];
} else {
    $filtre = "";
}
$lesCandidats = $unControleur->selectAllCandidats($filtre);

// Inclure la vue pour afficher les candidats
require_once("vue/vue_select_candidats.php");
?>