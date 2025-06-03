<h3>Ajout d'un Examen</h3>
<form method="post">
    <table>
        <tr>
            <td>Date et Heure :</td>
            <td><input type="datetime-local" name="date_et_heure_examen" value="<?= ($leExamen == null) ? '' : $leExamen['date_et_heure_examen'] ?>"></td>
        </tr>
        <tr>
            <td>Vehicule :</td>
            <td>
                <select name="idvehicule">
                    <?php
                    // Récupérer la liste des vehicules
                    $lesVehicules = $unControleur->selectAllVehicules("");
                    foreach ($lesVehicules as $unVehicule) {
                        $selected = ($leExamen != null && $leExamen['idvehicule'] == $unVehicule['idvehicule']) ? 'selected' : '';
                        echo "<option value='" . $unVehicule['immatriculation'] . "'>" . $unVehicule['immatriculation'] . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Type de Permis :</td>
            <td><input type="text" name="type_de_permis" value="<?= ($leExamen == null) ? '' : $leExamen['type_de_permis'] ?>"></td>
        </tr>
        <tr>
            <td><input type="reset" name="Annuler" value="Annuler"></td>
            <td><input type="submit" <?= ($leExamen == null) ? 'name="Valider" value="Valider"' : 'name="Modifier" value="Modifier"' ?>></td>
        </tr>
        <?= ($leExamen == null) ? '' : '<input type="hidden" name="idexamen" value="' . $leExamen['idexamen'] . '">' ?>
    </table>
</form>