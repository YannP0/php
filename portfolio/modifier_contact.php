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
<title>Modifier contact</title>

<link href="styles.css" type="text/css" rel="stylesheet">
</head>

<body>
     <b><?php echo $utilisateur ?></b><br/>
     <a href="deconnexion.php">Se déconnecter</a> <hr>
<H1>Visualiser-Modifier un contact</H1>
<br/><br/>

<?php
	
	// récupération du code client à modifier et conversion en un nombre entier

	$code=intval($_POST['code_contact']);

	try
	{
		$mysqlClient = new PDO('mysql:host=127.0.0.1;dbname=portfolio;charset=utf8','root','');
	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}
	
	// On récupère tout le contenu de la table clients
	$sqlQuery = 'SELECT * FROM contact WHERE code_contact=:code';
	$listeclients = $mysqlClient->prepare($sqlQuery);
	$listeclients->execute(['code'=>$code]);
	$liste = $listeclients->fetchAll();
	
	//gestion d'un code inconnu
	if ($liste==null) {echo 'Ce code ID n\'existe pas ! <br/><br/>';}
							

	// On affiche le formulaire de modification prérempli avec les données du client
	foreach ($liste as $data) {
	

		echo '<form method="POST" action="valider_modification_contact.php">';
		echo 'Code ID : <input type="text" name="code_contact" size="5" value="'.$data['code_contact'].'" maxlength="10" readonly><br/><br/>';
		echo 'nom : <input type="text" name="nom" size="50" autofocus="true" value="'.$data['nom'].'" maxlength="50" ><br/><br/>';
		echo 'email : <input type="text" name="about" size="50" value="'.$data['email'].'" maxlength="50" ><br/><br/> ';
		echo 'messages : <input type="text" name="messages" size="50" value="'.$data['messages'].'" maxlength="50" ><br/> <br/>';
		echo '<input type="submit" value="Modifier" name="modifier">';
		echo '</form>';	
	}
?>
		

	<button type="cancel" onclick="javascript:window.location='menu_principal.php';">Retour au menu principal</button>	
</body>
</html>
