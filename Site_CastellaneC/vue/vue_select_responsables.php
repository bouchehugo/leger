<h3> Liste des Responsables ( <?= (isset($lesResponsables)) ? count($lesResponsables) : '0' ?> )</h3>

<form method="post">
    Filtrer par : <input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>

<table class="table table-dark" border="1">
    <thead class="thead-dark">
        <tr>
            <td>ID Responsable</td>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Email</td>
            <td>Téléphone</td>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") { echo "<td>Opérations</td>"; } ?>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($lesResponsables)) {
            foreach ($lesResponsables as $unResponsable) {
                echo "<tr>";
                echo "<td>" . $unResponsable['idresponsable'] . "</td>";
                echo "<td>" . $unResponsable['nom'] . "</td>";
                echo "<td>" . $unResponsable['prenom'] . "</td>";
                echo "<td>" . $unResponsable['email'] . "</td>";
                echo "<td>" . $unResponsable['numero_telephone'] . "</td>";
                if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
                    echo "<td>";
                    echo "<a href='index.php?page=4&action=sup&idresponsable=" . $unResponsable['idresponsable'] . "'><img src='images/supprimer.png' height='30' width='30'></a>";
                    echo "<a href='index.php?page=4&action=edit&idresponsable=" . $unResponsable['idresponsable'] . "'><img src='images/editer.png' height='30' width='30'></a>";
                    echo "</td>";
                }
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
<br><br><br>