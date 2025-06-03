<h2> Gestion des Leçons </h2>

<?php
// Vérifier si l'utilisateur est un administrateur
if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
    $laLecon = null;

    // Gérer les actions (suppression ou modification)
    if (isset($_GET['action']) && isset($_GET['idlecon'])) {
        $action = $_GET['action'];
        $idlecon = $_GET['idlecon'];

        switch ($action) {
            case 'sup':
                // Supprimer une leçon
                $unControleur->deleteLecon($idlecon);
                echo "<br> Suppression réussie.";
                break;

            case 'edit':
                // Récupérer les informations de la leçon pour la modification
                $laLecon = $unControleur->selectWhereLecon($idlecon);
                break;
        }
    }

    // Inclure le formulaire d'insertion ou de modification
    require_once("vue/vue_insert_lecon.php");

    // Traitement du formulaire d'insertion
    if (isset($_POST["Valider"])) {
        // Insérer les données dans la base
        $unControleur->insertLecon($_POST);
        echo "<br> Insertion réussie.";
    }

    // Traitement du formulaire de modification
    if (isset($_POST["Modifier"])) {
        // Mettre à jour les données dans la base
        $unControleur->updateLecon($_POST);
        // Actualiser la page
        header("Location: index.php?page=6");
    }
}

// Récupérer les leçons de la base de données
if (isset($_POST['Filtrer'])) {
    $filtre = $_POST['filtre'];
} else {
    $filtre = "";
}
$lesLecons = $unControleur->selectAllLecons($filtre);

// Inclure la vue pour afficher les leçons
require_once("vue/vue_select_lecons.php");
?>