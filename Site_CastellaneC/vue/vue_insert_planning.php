<h3>Ajout d'un Planning</h3>
<form method="post">
    <table>
        <tr>
            <td>Lecon :</td>
            <td>
                <select name="idlecon">
                    <?php
                    // Récupérer la liste des responsables
                    $lesLecons = $unControleur->selectAllLecons("");
                    foreach ($lesLecons as $uneLecon) {
                        $selected = ($lePlanning != null && $lePlanning['idlecon'] == $uneLecon['idlecon']) ? 'selected' : '';
                        echo "<option value='" . $uneLecon['idlecon'] . "' $selected>" . $uneLecon['titre'] . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Candidat :</td>
            <td>
                <select name="idcandidat">
                    <?php
                    // Récupérer la liste des responsables
                    $lesCandidats = $unControleur->selectAllCandidats("");
                    foreach ($lesCandidats as $unCandidat) {
                        $selected = ($lePlanning != null && $lePlanning['idcandidat'] == $unCandidat['idcandidat']) ? 'selected' : '';
                        echo "<option value='" . $unCandidat['idcandidat'] . "'>" . $unCandidat['nom'] . " " . $unCandidat['prenom'] . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Moniteur :</td>
            <td>
                <select name="idmoniteur">
                    <?php
                    // Récupérer la liste des responsables
                    $lesMoniteurs = $unControleur->selectAllMoniteurs("");
                    foreach ($lesMoniteurs as $unMoniteur) {
                        $selected = ($lePlanning != null && $lePlanning['idmoniteur'] == $unMoniteur['idmoniteur']) ? 'selected' : '';
                        echo "<option value='" . $unMoniteur['idmoniteur'] . "'>" . $unMoniteur['nom'] . " " . $unMoniteur['prenom'] . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Date et Heure de Début :</td>
            <td><input type="datetime-local" name="dateheuredebut" value="<?= ($lePlanning == null) ? '' : $lePlanning['dateheuredebut'] ?>"></td>
        </tr>
        <tr>
            <td>Date et Heure de Fin :</td>
            <td><input type="datetime-local" name="dateheuref" value="<?= ($lePlanning == null) ? '' : $lePlanning['dateheuref'] ?>"></td>
        </tr>
        <tr>
            <td>État :</td>
            <td>
                <select name="etat">
                    <option value="annule" <?= ($lePlanning != null && $lePlanning['etat'] == 'annule') ? 'selected' : '' ?>>Annulé</option>
                    <option value="valide" <?= ($lePlanning != null && $lePlanning['etat'] == 'valide') ? 'selected' : '' ?>>Validé</option>
                    <option value="en attente" <?= ($lePlanning != null && $lePlanning['etat'] == 'en attente') ? 'selected' : '' ?>>En attente</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="reset" name="Annuler" value="Annuler"></td>
            <td><input type="submit" <?= ($lePlanning == null) ? 'name="Valider" value="Valider"' : 'name="Modifier" value="Modifier"' ?>></td>
        </tr>
        <?= ($lePlanning == null) ? '' : '<input type="hidden" name="idplanning" value="' . $lePlanning['idplanning'] . '">' ?>
    </table>
</form>