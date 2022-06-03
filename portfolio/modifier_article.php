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
<title>Modifier article</title>

<link href="styles.css" type="text/css" rel="stylesheet">
</head>

<body>
     <b><?php echo $utilisateur ?></b><br/>
     <a href="deconnexion.php">Se déconnecter</a> <hr>
<H1>Visualiser-Modifier un article</H1>
<br/><br/>

<?php
	
	// récupération du code client à modifier et conversion en un nombre entier

	$code=intval($_POST['code_article']);

	try
	{
		$mysqlClient = new PDO('mysql:host=127.0.0.1;dbname=gestionco;charset=utf8','root','');
	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}
	
	// On récupère tout le contenu de la table clients
	$sqlQuery = 'SELECT * FROM articles WHERE code_article=:code';
	$listeclients = $mysqlClient->prepare($sqlQuery);
	$listeclients->execute(['code'=>$code]);
	$liste = $listeclients->fetchAll();
	
	//gestion d'un code inconnu
	if ($liste==null) {echo 'Ce code article n\'existe pas ! <br/><br/>';}
							

	// On affiche le formulaire de modification prérempli avec les données du client
	foreach ($liste as $data) {
	

		echo '<form method="POST" action="valider_modification_client.php">';
		echo 'Code client : <input type="text" name="code_article" size="5" value="'.$data['code_article'].'" maxlength="10" readonly><br/><br/>';
		echo 'Designation : <input type="text" name="designation" size="50" autofocus="true" value="'.$data['designation'].'" maxlength="50" ><br/><br/>';
		echo 'Déscription : <input type="text" name="description" size="50" value="'.$data['description'].'" maxlength="50" ><br/><br/> ';
		echo 'prix_vente_ht : <input type="text" name="prix_vente_ht" size="50" value="'.$data['prix_vente_ht'].'" maxlength="50" ><br/> <br/>';
		echo 'stock : <input type="text" name="stock" size="10" value="'.$data['stock'].'" maxlength="10" ><br/> <br/>';
		echo 'code_barre_ean :	<input type="text" name="code_barre_ean" size="50" value="'.$data['code_barre_ean'].'" maxlength="50" ><br/> <br/>';
		echo 'code_photo : <input type="email" name="code_photo" size="50" value="'.$data['code_photo'].'" maxlength="50" ><br/><br/> ';
		echo '<input type="submit" value="Modifier" name="modifier">';
		echo '</form>';	
	}
?>
		

	<button type="cancel" onclick="javascript:window.location='menu_principal.php';">Retour au menu principal</button>	
</body>
</html>
