<h3>Ajout d'un Responsable</h3>
<form method="post">
    <table>
        <tr>
            <td>Nom :</td>
            <td><input type="text" name="nom" value="<?= ($leResponsable == null) ? '' : $leResponsable['nom'] ?>"></td>
        </tr>
        <tr>
            <td>Prénom :</td>
            <td><input type="text" name="prenom" value="<?= ($leResponsable == null) ? '' : $leResponsable['prenom'] ?>"></td>
        </tr>
        <tr>
            <td>Email :</td>
            <td><input type="text" name="email" value="<?= ($leResponsable == null) ? '' : $leResponsable['email'] ?>"></td>
        </tr>
        <tr>
            <td>Mot de passe :</td>
            <td><input type="text" name="mdp" value="<?= ($leResponsable == null) ? '' : $leResponsable['mdp'] ?>"></td>
        </tr>
        <tr>
            <td>Téléphone :</td>
            <td><input type="text" name="telephone" value="<?= ($leResponsable == null) ? '' : $leResponsable['numero_telephone'] ?>"></td>
        </tr>
        <tr>
            <td><input type="reset" name="Annuler" value="Annuler"></td>
            <td><input type="submit" <?= ($leResponsable == null) ? 'name="Valider" value="Valider"' : 'name="Modifier" value="Modifier"' ?>></td>
        </tr>
        <?= ($leResponsable == null) ? '' : '<input type="hidden" name="idresponsable" value="' . $leResponsable['idresponsable'] . '">' ?>
    </table>
</form>