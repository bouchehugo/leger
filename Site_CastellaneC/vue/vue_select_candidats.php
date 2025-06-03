<br>
<h3> Liste des candidats ( <?= (isset($lesCandidats))? count($lesCandidats) : '' ?> )</h3>

<form method="post">
	Filtrer par : <input type="text" name="filtre">
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>

<table class="table table-dark" border="1">
  <thead class="thead-dark">
  	<tr>
		<td> Id Candidat</td>
		<td> Nom </td>
		<td> Prénom </td>
		<td> Age</td>
		<td> Email </td>
		<td> Mot de passe</td>
		<td> Téléphone </td>
<?php
if(isset($_SESSION['role']) && $_SESSION['role']=="admin") {
		echo "<td> Opérations </td>"; 
	} ?>
	</tr>
	</thead>
<tbody>
	<?php
	//liste des Candidat de la BDD 
	if(isset($lesCandidats)){
		foreach ($lesCandidats as $unCandidat) {
			echo "<tr>";
			echo "<td>" . $unCandidat["idcandidat"] . "</td>";
			echo "<td>" . $unCandidat["nom"] . "</td>";
			echo "<td>" . $unCandidat["prenom"] . "</td>";
			echo "<td>" . $unCandidat["age"] . "</td>";
			echo "<td>" . $unCandidat["email"] . "</td>";
			echo "<td>" . $unCandidat["mdp"] . "</td>";
			echo "<td>" . $unCandidat["numero_telephone"] . "</td>";

if(isset($_SESSION['role']) && $_SESSION['role']=="admin") {
			echo "<td>" ;

			echo "<a href='index.php?page=2&action=sup&idcandidat=".$unCandidat["idcandidat"]."'> <img src='images/supprimer.png' heigth='30' width='30'> </a>"; 

			echo "<a href='index.php?page=2&action=edit&idcandidat=".$unCandidat["idcandidat"]."'> <img src='images/editer.png' heigth='30' width='30'> </a>"; 

			echo "</td>";
		}

			echo "</tr>";
		}
	}
	?>
	</tbody>
</table>
<br> <br> <br> 









