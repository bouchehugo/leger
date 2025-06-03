<h3>Ajout d'un Véhicule</h3>
<form method="post">
    <table>
        <tr>
            <td>Marque :</td>
            <td><input type="text" name="marque" value="<?= ($leVehicule == null) ? '' : $leVehicule['marque'] ?>"></td>
        </tr>
        <tr>
            <td>Modèle :</td>
            <td><input type="text" name="modele" value="<?= ($leVehicule == null) ? '' : $leVehicule['modele'] ?>"></td>
        </tr>
        <tr>
            <td>Immatriculation :</td>
            <td><input type="text" name="immatriculation" value="<?= ($leVehicule == null) ? '' : $leVehicule['immatriculation'] ?>"></td>
        </tr>
        
        <tr>
            <td><input type="reset" name="Annuler" value="Annuler"></td>
            <td><input type="submit" <?= ($leVehicule == null) ? 'name="Valider" value="Valider"' : 'name="Modifier" value="Modifier"' ?>></td>
        </tr>
        <?= ($leVehicule == null) ? '' : '<input type="hidden" name="idvehicule" value="' . $leVehicule['idvehicule'] . '">' ?>
    </table>
</form>