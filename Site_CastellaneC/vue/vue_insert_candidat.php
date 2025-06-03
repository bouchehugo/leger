<br>
<h3>Ajout d'un candidat</h3>
<form method="post">
    <table>
        <tr>
            <td> Nom du candidat : </td>
            <td> <input type="text" name="nom" 
                value="<?= ($leCandidat==null)?'':$leCandidat['nom'] ?>"></td>
        </tr>

        <tr>
            <td> Prénom du Candidat : </td>
            <td> <input type="text" name="prenom"
                value="<?= ($leCandidat==null)?'':$leCandidat['prenom'] ?>"></td>
        </tr>

        <tr>
            <td> Age Candidat : </td>
            <td> <input type="text" name="age"
                value="<?= ($leCandidat==null)?'':$leCandidat['age'] ?>"></td>
        </tr>

        <tr>
            <td> Email Candidat : </td>
            <td> <input type="text" name="email"
                value="<?= ($leCandidat==null)?'':$leCandidat['email'] ?>"></td>
        </tr>

        <tr>
            <td> Mot de passe : </td>
            <td> <input type="text" name="mdp"
                value="<?= ($leCandidat==null)?'':$leCandidat['mdp'] ?>"></td>
        </tr>

        <tr>
            <td> Tel Candidat : </td>
            <td> <input type="text" name="telephone"
                value="<?= ($leCandidat==null)?'':$leCandidat['numero_telephone'] ?>"></td>
        </tr>
        <tr>
            <td> Role : </td>
            <td> 
            <select name ="type_user">
                <option value="Candidat">Candidat</option>
            </select>
            </td>
        </tr>

        <tr>
            <td> <input type="reset" name="Annuler" value="Annuler"> </td>
            <td> <input type="submit" 

                <?= ($leCandidat==null)? ' name="Valider" value="Valider" ' : 
                ' name ="Modifier" value ="Modifier" ' ?>

                ></td>
        </tr>
        <?= ($leCandidat==null)? '' : '<input type="hidden" name ="idcandidat" 
        value="'.$leCandidat['idcandidat'].'" >' ?>

    </table>
</form>








