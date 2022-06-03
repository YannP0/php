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
<title>Visualiser contact</title>
<link href="styles.css" type="text/css" rel="stylesheet">
</head>

<body>
     <b><?php echo $utilisateur ?></b><br/>
     <a href="deconnexion.php">Se déconnecter</a> <hr>
	   
<H1>Visualiser la liste des contact :</H1>
	
<button type="cancel" onclick="javascript:window.location='menu_principal.php';">Retour au menu principal</button>
<br/>
<br/>
	<?php
	try
	{
		$mysqlClient = new PDO('mysql:host=127.0.0.1;dbname=portfolio;charset=utf8','root','');
	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}
	
	// On récupère tout le contenu de la table clients
	$sqlQuery = 'SELECT * FROM contact';
	$listeclients = $mysqlClient->prepare($sqlQuery);
	$listeclients->execute();
	$liste = $listeclients->fetchAll();

	// On affiche chaque article un à un
	foreach ($liste as $data) {
	echo $data['code_contact'].' '.$data['nom'].' '.$data['email'].' '.$data['messages'].'<br/>';
	}
	?>

	

</body>
</html>
