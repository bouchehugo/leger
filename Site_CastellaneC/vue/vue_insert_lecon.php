<h3>Ajout d'une Leçon</h3>
<form method="post">
    <table>
        <tr>
            <td>Type de Leçon :</td>
            <td><input type="text" name="type_lecon" value="<?= ($laLecon == null) ? '' : $laLecon['type_de_lecon'] ?>"></td>
        </tr>
        <tr>
            <td>Description :</td>
            <td><input type="text" name="description" value="<?= ($laLecon == null) ? '' : $laLecon['description'] ?>"></td>
        </tr>
        <tr>
            <td>Titre :</td>
            <td><input type="text" name="titre" value="<?= ($laLecon == null) ? '' : $laLecon['titre'] ?>"></td>
        </tr>
        <tr>
            <td><input type="reset" name="Annuler" value="Annuler"></td>
            <td><input type="submit" <?= ($laLecon == null) ? 'name="Valider" value="Valider"' : 'name="Modifier" value="Modifier"' ?>></td>
        </tr>
        <?= ($laLecon == null) ? '' : '<input type="hidden" name="idlecon" value="' . $laLecon['idlecon'] . '">' ?>
    </table>
</form>