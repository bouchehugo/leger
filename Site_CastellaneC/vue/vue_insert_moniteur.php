<h3>Ajout d'un Moniteur</h3>
<form method="post">
    <table>
        <tr>
            <td>Nom :</td>
            <td><input type="text" name="nom" value="<?= ($leMoniteur == null) ? '' : $leMoniteur['nom'] ?>"></td>
        </tr>
        <tr>
            <td>Prénom :</td>
            <td><input type="text" name="prenom" value="<?= ($leMoniteur == null) ? '' : $leMoniteur['prenom'] ?>"></td>
        </tr>
        <tr>
            <td>Email :</td>
            <td><input type="text" name="email" value="<?= ($leMoniteur == null) ? '' : $leMoniteur['email'] ?>"></td>
        </tr>
        <tr>
            <td>Mot de passe :</td>
            <td><input type="text" name="mdp" value="<?= ($leMoniteur == null) ? '' : $leMoniteur['mdp'] ?>"></td>
        </tr>
        <tr>
            <td>Téléphone :</td>
            <td><input type="text" name="numero_telephone" value="<?= ($leMoniteur == null) ? '' : $leMoniteur['numero_telephone'] ?>"></td>
        </tr>
        <tr>
            <td> Role : </td>
            <td> 
            <select name ="type_user">
                <option value="Moniteur">Moniteur</option>
            </select>
            </td>
        </tr>
        <tr>
            <td>Responsable :</td>
            <td>
                <select name="idresponsable">
                    <?php
                    // Récupérer la liste des responsables
                    $lesResponsables = $unControleur->selectAllResponsables("");
                    foreach ($lesResponsables as $unResponsable) {
                        $selected = ($leMoniteur != null && $leMoniteur['idresponsable'] == $unResponsable['idresponsable']) ? 'selected' : '';
                        echo "<option value='" . $unResponsable['idresponsable'] . "' $selected>" . $unResponsable['nom'] . " " . $unResponsable['prenom'] . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="reset" name="Annuler" value="Annuler"></td>
            <td><input type="submit" <?= ($leMoniteur == null) ? 'name="Valider" value="Valider"' : 'name="Modifier" value="Modifier"' ?>></td>
        </tr>
        <?= ($leMoniteur == null) ? '' : '<input type="hidden" name="idmoniteur" value="' . $leMoniteur['idmoniteur'] . '">' ?>
    </table>
</form>