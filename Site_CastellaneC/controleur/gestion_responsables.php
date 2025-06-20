<h2> Gestion des Responsables </h2>

<?php
// Vérifier si l'utilisateur est un administrateur
if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
    $leResponsable = null;

    // Gérer les actions (suppression ou modification)
    if (isset($_GET['action']) && isset($_GET['idresponsable'])) {
        $action = $_GET['action'];
        $idresponsable = $_GET['idresponsable'];

        switch ($action) {
            case 'sup':
                // Supprimer un responsable
                $unControleur->deleteResponsable($idresponsable);
                echo "<br> Suppression réussie.";
                break;

            case 'edit':
                // Récupérer les informations du responsable pour la modification
                $leResponsable = $unControleur->selectWhereResponsable($idresponsable);
                break;
        }
    }

    // Inclure le formulaire d'insertion ou de modification
    require_once("vue/vue_insert_responsable.php");

    // Traitement du formulaire d'insertion
    if (isset($_POST["Valider"])) {
        // Insérer les données dans la base
        $unControleur->insertResponsable($_POST);
        echo "<br> Insertion réussie.";
    }

    // Traitement du formulaire de modification
    if (isset($_POST["Modifier"])) {
        // Mettre à jour les données dans la base
        $unControleur->updateResponsable($_POST);
        // Actualiser la page
        header("Location: index.php?page=4");
    }
}

// Récupérer les responsables de la base de données
if (isset($_POST['Filtrer'])) {
    $filtre = $_POST['filtre'];
} else {
    $filtre = "";
}
$lesResponsables = $unControleur->selectAllResponsables($filtre);

// Inclure la vue pour afficher les responsables
require_once("vue/vue_select_responsables.php");
?>