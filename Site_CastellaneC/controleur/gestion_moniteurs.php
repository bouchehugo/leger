<h2> Gestion des Moniteurs </h2>

<?php
// Vérifier si l'utilisateur est un administrateur
if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
    $leMoniteur = null;

    // Gérer les actions (suppression ou modification)
    if (isset($_GET['action']) && isset($_GET['idmoniteur'])) {
        $action = $_GET['action'];
        $idmoniteur = $_GET['idmoniteur'];

        switch ($action) {
            case 'sup':
                // Supprimer un moniteur
                $unControleur->deleteMoniteur($idmoniteur);
                echo "<br> Suppression réussie.";
                break;

            case 'edit':
                // Récupérer les informations du moniteur pour la modification
                $leMoniteur = $unControleur->selectWhereMoniteur($idmoniteur);
                break;
        }
    }

    // Inclure le formulaire d'insertion ou de modification
    require_once("vue/vue_insert_moniteur.php");

    // Traitement du formulaire d'insertion
    if (isset($_POST["Valider"])) {
        // Ajouter le type d'utilisateur (MONITEUR) aux données
        $_POST['Type_user'] = "MONITEUR";
        // Insérer les données dans la base
        $unControleur->insertMoniteur($_POST);
        echo "<br> Insertion réussie.";
    }

    // Traitement du formulaire de modification
    if (isset($_POST["Modifier"])) {
        // Mettre à jour les données dans la base
        $unControleur->updateMoniteur($_POST);
        // Actualiser la page
        header("Location: index.php?page=3");
    }
}

// Récupérer les moniteurs de la base de données
if (isset($_POST['Filtrer'])) {
    $filtre = $_POST['filtre'];
} else {
    $filtre = "";
}
$lesMoniteurs = $unControleur->selectAllMoniteurs($filtre);

// Inclure la vue pour afficher les moniteurs
require_once("vue/vue_select_moniteurs.php");
?>