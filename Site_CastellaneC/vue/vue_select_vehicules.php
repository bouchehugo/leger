<h3> Liste des Véhicules ( <?= (isset($lesVehicules)) ? count($lesVehicules) : '0' ?> )</h3>

<form method="post">
    Filtrer par : <input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>

<table class="table table-dark" border="1">
    <thead class="thead-dark">
        <tr>
            <td>ID Véhicule</td>
            <td>Marque</td>
            <td>Modèle</td>
            <td>Immatriculation</td>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") { echo "<td>Opérations</td>"; } ?>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($lesVehicules)) {
            foreach ($lesVehicules as $unVehicule) {
                echo "<tr>";
                echo "<td>" . $unVehicule['idvehicule'] . "</td>";
                echo "<td>" . $unVehicule['marque'] . "</td>";
                echo "<td>" . $unVehicule['modele'] . "</td>";
                echo "<td>" . $unVehicule['immatriculation'] . "</td>";
                if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
                    echo "<td>";
                    echo "<a href='index.php?page=5&action=sup&idvehicule=" . $unVehicule['idvehicule'] . "'><img src='images/supprimer.png' height='30' width='30'></a>";
                    echo "<a href='index.php?page=5&action=edit&idvehicule=" . $unVehicule['idvehicule'] . "'><img src='images/editer.png' height='30' width='30'></a>";
                    echo "</td>";
                }
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
<br><br><br>