<?php
	session_start(); 
	require_once("controleur/controleur.class.php"); 
	//instancier la classe controleur : 
	$unControleur = new Controleur();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Site Internet Auto-Ecole Castellane</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.5/dist/bootstrap-table.min.css">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<center>
<h1> Auto Ecole Castellane </h1> 
<br>

<?php
	if ( ! isset($_SESSION["email"])){ 
			require_once("vue/vue_connexion.php");
	}

	if(isset($_POST["Connexion"])){
		$email = $_POST["email"];
		$mdp = $_POST["mdp"];

		//on vérifie dans la BDD - User 
		$unUser = $unControleur->verifConnexion($email, $mdp);
		if ($unUser){
			//enregistrement de la session 
			$_SESSION["nom"] = $unUser["nom"]; 
			$_SESSION["prenom"] = $unUser["prenom"]; 
			$_SESSION["email"] = $unUser["email"];
			$_SESSION["role"] = $unUser["role"]; 
			//actualisation de la page 
			header("Location: index.php?page=1"); 
		}
		else {
			echo "<br> Veuillez Vérifier vos identifiants."; 
		}
	}

if (isset($_SESSION["email"])){
echo ' <div id="navbar" style="background-color : #f0f0f0 ;">
<a href="index.php?page=1"> 
	<img src="images/logor.png" height="50" width="50">
</a>

<a href="index.php?page=2"> 
	<img src="images/candidat.png" height="50" width="50">
</a>

<a href="index.php?page=3"> 
	<img src="images/moniteur.png" height="50" width="50">
</a>

<a href="index.php?page=4"> 
	<img src="images/tr_responsable.png" height="50" width="50">
</a>

<a href="index.php?page=5"> 
	<img src="images/tr_vehicule.png" height="50" width="50">
</a>

<a href="index.php?page=6"> 
	<img src="images/lecon4.png" height="50" width="50">
</a>

<a href="index.php?page=7"> 
	<img src="images/planning2.png" height="50" width="50">
</a>

<a href="index.php?page=8"> 
	<img src="images/examen2.png" height="50" width="50">
</a>

<a href="index.php?page=9"> 
	<img src="images/deconnexion_tr.png" height="50" width="50">
</a>
</div>
';

	if (isset($_GET['page'])){
		$page = $_GET['page'];
	}else {
		$page = 1 ;
	}
	switch ($page) {
		case 1 : require_once ("controleur/home.php"); break;
		case 2 : require_once ("controleur/gestion_candidats.php"); break;
		case 3 : require_once ("controleur/gestion_moniteurs.php"); break;
		case 4 : require_once ("controleur/gestion_responsables.php"); break;
		case 5 : require_once ("controleur/gestion_vehicules.php"); break;
		case 6 : require_once ("controleur/gestion_lecons.php"); break;
		case 7 : require_once ("controleur/gestion_plannings.php"); break;
		case 8 : require_once ("controleur/gestion_examens.php"); break;
		case 9 : session_destroy(); unset($_SESSION['email']);
		header("Location: index.php");
		exit ;
		break ;
		case 10:
    	if (!isset($_SESSION["email"])) {
        	require_once("controleur/gestion_inscriptions.php");
        	$controleur = new ControleurInscription();
        	$controleur->afficherFormulaire();
    	} else {
        	header("Location: index.php?page=1");
    	}
    break;
		default: 
        require_once("controleur/home.php");
	}
} //fin du if session 
?>

</center>

<?php if (isset($_SESSION["email"])): ?>
    <link rel="stylesheet" href="css/footer.css">
    <?php require_once("vue/vue_footer.php"); ?>
<?php endif; ?>

</body>
</html>








