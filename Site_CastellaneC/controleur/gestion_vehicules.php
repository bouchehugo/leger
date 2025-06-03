<h2> Gestion des Véhicules </h2>

<?php
// Vérifier si l'utilisateur est un administrateur
if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
    $leVehicule = null;

    // Gérer les actions (suppression ou modification)
    if (isset($_GET['action']) && isset($_GET['idvehicule'])) {
        $action = $_GET['action'];
        $idvehicule = $_GET['idvehicule'];

        switch ($action) {
            case 'sup':
                // Supprimer un véhicule
                $unControleur->deleteVehicule($idvehicule);
                echo "<br> Suppression réussie.";
                break;

            case 'edit':
                // Récupérer les informations du véhicule pour la modification
                $leVehicule = $unControleur->selectWhereVehicule($idvehicule);
                break;
        }
    }

    // Inclure le formulaire d'insertion ou de modification
    require_once("vue/vue_insert_vehicule.php");

    // Traitement du formulaire d'insertion
    if (isset($_POST["Valider"])) {
        // Insérer les données dans la base
        $unControleur->insertVehicule($_POST);
        echo "<br> Insertion réussie.";
    }

    // Traitement du formulaire de modification
    if (isset($_POST["Modifier"])) {
        // Mettre à jour les données dans la base
        $unControleur->updateVehicule($_POST);
        // Actualiser la page
        header("Location: index.php?page=5");
    }
}

// Récupérer les véhicules de la base de données
if (isset($_POST['Filtrer'])) {
    $filtre = $_POST['filtre'];
} else {
    $filtre = "";
}
$lesVehicules = $unControleur->selectAllVehicules($filtre);

// Inclure la vue pour afficher les véhicules
require_once("vue/vue_select_vehicules.php");
?>