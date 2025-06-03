<h3> Liste des Plannings ( <?= (isset($lesPlannings)) ? count($lesPlannings) : '0' ?> )</h3>

<?php
$lesLecons = $unControleur->selectAllLecons("");
$titresLecons = array_column($lesLecons, 'titre', 'idlecon');
?>

<form method="post">
    Filtrer par : <input type="text" name="filtre" value="<?= htmlspecialchars($_POST['filtre'] ?? '') ?>">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>

<table class="table table-dark" border="1">
    <thead class="thead-dark">
        <tr>
            <td>ID Planning</td>
            <td>Leçon</td>
            <td>Candidat</td>
            <td>Moniteur</td>
            <td>Date et Heure de Début</td>
            <td>Date et Heure de Fin</td>
            <td>État</td>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") { echo "<td>Opérations</td>"; } ?>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($lesPlannings)) {
            foreach ($lesPlannings as $unPlanning) {
                echo "<tr>";
                echo "<td>" . $unPlanning['idplanning'] . "</td>";
                echo "<td>" . htmlspecialchars($unPlanning['titre_lecon'] ?? 'Inconnu') . "</td>";
                echo "<td>" . $unPlanning['idcandidat'] . "</td>";
                echo "<td>" . $unPlanning['idmoniteur'] . "</td>";
                echo "<td>" . $unPlanning['dateheuredebut'] . "</td>";
                echo "<td>" . $unPlanning['dateheuref'] . "</td>";
                echo "<td>" . $unPlanning['etat'] . "</td>";
                if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
                    echo "<td>";
                    echo "<a href='index.php?page=7&action=sup&idplanning=" . $unPlanning['idplanning'] . "'><img src='images/supprimer.png' height='30' width='30'></a>";
                    echo "<a href='index.php?page=7&action=edit&idplanning=" . $unPlanning['idplanning'] . "'><img src='images/editer.png' height='30' width='30'></a>";
                    echo "</td>";
                }
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
<br><br><br>