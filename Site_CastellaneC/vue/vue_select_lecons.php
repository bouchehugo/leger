 <h3> Liste des Leçons ( <?= (isset($lesLecons)) ? count($lesLecons) : '0' ?> )</h3>

<form method="post">
    Filtrer par : <input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>

<table class="table table-dark" border="1">
    <thead class="thead-dark">
        <tr>
            <td>ID Leçon</td>
            <td>Type de Leçon</td>
            <td>Description</td>
            <td>Titre</td>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") { echo "<td>Opérations</td>"; } ?>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($lesLecons)) {
            foreach ($lesLecons as $uneLecon) {
                echo "<tr>";
                echo "<td>" . $uneLecon['idlecon'] . "</td>";
                echo "<td>" . $uneLecon['type_de_lecon'] . "</td>";
                echo "<td>" . $uneLecon['description'] . "</td>";
                echo "<td>" . $uneLecon['titre'] . "</td>";
                if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
                    echo "<td>";
                    echo "<a href='index.php?page=6&action=sup&idlecon=" . $uneLecon['idlecon'] . "'><img src='images/supprimer.png' height='30' width='30'></a>";
                    echo "<a href='index.php?page=6&action=edit&idlecon=" . $uneLecon['idlecon'] . "'><img src='images/editer.png' height='30' width='30'></a>";
                    echo "</td>";
                }
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
<br><br><br>