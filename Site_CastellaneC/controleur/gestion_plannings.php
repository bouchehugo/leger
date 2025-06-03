<h2> Gestion des Plannings </h2>

<?php
// Vérifier si l'utilisateur est un administrateur
if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
    $lePlanning = null;

    // Gérer les actions (suppression ou modification)
    if (isset($_GET['action']) && isset($_GET['idplanning'])) {
        $action = $_GET['action'];
        $idplanning = $_GET['idplanning'];

        switch ($action) {
            case 'sup':
                // Supprimer un planning
                $unControleur->deletePlanning($idplanning);
                echo "<br> Suppression réussie.";
                break;

            case 'edit':
                // Récupérer les informations du planning pour la modification
                $lePlanning = $unControleur->selectWherePlanning($idplanning);
                break;
        }
    }

    // Inclure le formulaire d'insertion ou de modification
    require_once("vue/vue_insert_planning.php");

    // Traitement du formulaire d'insertion
    if (isset($_POST["Valider"])) {
        // Insérer les données dans la base
        $unControleur->insertPlanning($_POST);
        echo "<br> Insertion réussie.";
    }

    // Traitement du formulaire de modification
    if (isset($_POST["Modifier"])) {
        // Mettre à jour les données dans la base
        $unControleur->updatePlanning($_POST);
        // Actualiser la page
        header("Location: index.php?page=7");
    }
}

// Récupérer les plannings de la base de données
if (isset($_POST['Filtrer'])) {
    $filtre = $_POST['filtre'];
} else {
    $filtre = "";
}
$lesPlannings = $unControleur->selectAllPlannings($filtre);

// Inclure la vue pour afficher les plannings
require_once("vue/vue_select_plannings.php");
?>