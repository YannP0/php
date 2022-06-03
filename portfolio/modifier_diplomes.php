<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   
      $utilisateur="Utilisateur : ".$_SESSION["prenomNom"];
?>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Modifier un diplôme</title>

<link href="styles.css" type="text/css" rel="stylesheet">
</head>

<body>
     <b><?php echo $utilisateur ?></b><br/>
     <a href="deconnexion.php">Se déconnecter</a> <hr>
<H1>Visualiser-Modifier un diplôme</H1>
<br/><br/>

<?php
	
	// récupération du code client à modifier et conversion en un nombre entier

	$code=intval($_POST['code_diplome']);

	try
	{
		$mysqlClient = new PDO('mysql:host=127.0.0.1;dbname=portfolio;charset=utf8','root','');
	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}
	
	// On récupère tout le contenu de la table clients
	$sqlQuery = 'SELECT * FROM diplomes WHERE code_diplome=:code';
	$listeclients = $mysqlClient->prepare($sqlQuery);
	$listeclients->execute(['code'=>$code]);
	$liste = $listeclients->fetchAll();
	
	//gestion d'un code inconnu
	if ($liste==null) {echo 'Ce code ID n\'existe pas ! <br/><br/>';}
							

	// On affiche le formulaire de modification prérempli avec les données du client
	foreach ($liste as $data) {
	

		echo '<form method="POST" action="valider_modification_diplomes.php">';
		echo 'Code Diplome : <input type="text" name="code_diplome" size="5" value="'.$data['code_diplome'].'" maxlength="10" readonly><br/><br/>';
		echo 'Intitulé : <input type="text" name="intitule" size="50" autofocus="true" value="'.$data['intitule'].'" maxlength="50" ><br/><br/>';
		echo 'specialite : <input type="text" name="about" size="50" value="'.$data['specialite'].'" maxlength="50" ><br/><br/> ';
		echo 'annee : <input type="text" name="annee" size="50" value="'.$data['annee'].'" maxlength="50" ><br/> <br/>';
		echo 'lieu: <input type="text" name="lieu" size="50" value="'.$data['lieu'].'" maxlength="50" ><br/> <br/>';
		echo 'mention : <input type="text" name="mention" size="50" value="'.$data['mention'].'" maxlength="50" ><br/> <br/>';
		echo 'image : <input type="text" name="image" size="50" value="'.$data['image'].'" maxlength="50" ><br/> <br/>';
		echo '<input type="submit" value="Modifier" name="modifier">';
		echo '</form>';	
	}
?>
		

	<button type="cancel" onclick="javascript:window.location='menu_principal.php';">Retour au menu principal</button>	
</body>
</html>
