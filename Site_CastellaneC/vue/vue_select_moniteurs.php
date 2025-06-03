<h3> Liste des Moniteurs ( <?= (isset($lesMoniteurs)) ? count($lesMoniteurs) : '0' ?> )</h3>

<form method="post">
    Filtrer par : <input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>

<table class="table table-dark" border="1">
    <thead class="thead-dark">
        <tr>
            <td>ID Moniteur</td>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Email</td>
            <td>Téléphone</td>
            <td>Responsable</td>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") { echo "<td>Opérations</td>"; } ?>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($lesMoniteurs)) {
            foreach ($lesMoniteurs as $unMoniteur) {
                echo "<tr>";
                echo "<td>" . $unMoniteur['idmoniteur'] . "</td>";
                echo "<td>" . $unMoniteur['nom'] . "</td>";
                echo "<td>" . $unMoniteur['prenom'] . "</td>";
                echo "<td>" . $unMoniteur['email'] . "</td>";
                echo "<td>" . $unMoniteur['numero_telephone'] . "</td>";
                echo "<td>" . $unMoniteur['idresponsable'] . "</td>";
                if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
                    echo "<td>";
                    echo "<a href='index.php?page=3&action=sup&idmoniteur=" . $unMoniteur['idmoniteur'] . "'><img src='images/supprimer.png' height='30' width='30'></a>";
                    echo "<a href='index.php?page=3&action=edit&idmoniteur=" . $unMoniteur['idmoniteur'] . "'><img src='images/editer.png' height='30' width='30'></a>";
                    echo "</td>";
                }
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
<br><br><br>