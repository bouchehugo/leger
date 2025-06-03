<div class="container">
    <h3>Inscription à l'Auto Ecole Castellane</h3>
    <img src="images/logor.png" height="100" width="100">

    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']) ?></div>
    <?php endif; ?>

    <form method="post" action="controleur/gestion_inscriptions.php">
        <table class="table-form">
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td><input type="text" id="nom" name="nom" required class="form-control"></td>
            </tr>
            <tr>
                <td><label for="prenom">Prénom :</label></td>
                <td><input type="text" id="prenom" name="prenom" required class="form-control"></td>
            </tr>
            <tr>
                <td><label for="age">Âge :</label></td>
                <td><input type="number" id="age" name="age" min="16" required class="form-control"></td>
            </tr>
            <tr>
                <td><label for="email">Email :</label></td>
                <td><input type="email" id="email" name="email" required class="form-control"></td>
            </tr>
            <tr>
                <td><label for="mdp">Mot de passe :</label></td>
                <td><input type="password" id="mdp" name="mdp" required class="form-control"></td>
            </tr>
            <tr>
                <td><label for="telephone">Téléphone :</label></td>
                <td><input type="tel" id="telephone" name="telephone" required class="form-control"></td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <input type="submit" name="Inscription" value="S'inscrire" class="btn btn-primary">
                    <a href="index.php?page=1" class="btn btn-secondary">Retour</a>
                </td>
            </tr>
        </table>
    </form>
</div>