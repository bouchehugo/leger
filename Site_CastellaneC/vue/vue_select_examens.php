<h3> Liste des Examens ( <?= (isset($lesExamens)) ? count($lesExamens) : '0' ?> )</h3>

<form method="post">
    Filtrer par : <input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>

<table class="table table-dark" border="1">
    <thead class="thead-dark">
        <tr>
            <td>ID Examen</td>
            <td>Date et Heure</td>
            <td>Véhicule</td>
            <td>Type de Permis</td>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") { echo "<td>Opérations</td>"; } ?>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($lesExamens)) {
            foreach ($lesExamens as $unExamen) {
                echo "<tr>";
                echo "<td>" . $unExamen['idexamen'] . "</td>";
                echo "<td>" . $unExamen['date_et_heure_examen'] . "</td>";
                echo "<td>" . $unExamen['vehicule'] . "</td>";
                echo "<td>" . $unExamen['type_de_permis'] . "</td>";
                if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
                    echo "<td>";
                    echo "<a href='index.php?page=8&action=sup&idexamen=" . $unExamen['idexamen'] . "'><img src='images/supprimer.png' height='30' width='30'></a>";
                    echo "<a href='index.php?page=8&action=edit&idexamen=" . $unExamen['idexamen'] . "'><img src='images/editer.png' height='30' width='30'></a>";
                    echo "</td>";
                }
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
<br><br><br>