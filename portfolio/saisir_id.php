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
<title>Ajouter une nouvelle identitée</title>

<link href="styles.css" type="text/css" rel="stylesheet">
</head>

<body>
     <b><?php echo $utilisateur ?></b><br/>
     <a href="deconnexion.php">Se déconnecter</a> <hr>
<H1>Ajouter une nouvelle identitée</H1>
		<form method="POST" action="ajouter_un_id.php">
		Titre "à propos" : <input type="text" name="titre_about" size="50" value="saisir le titre" maxlength="50"  autofocus="true"><br/><br/> 
		Photo : <input type="text" name="photo" size="50" value="photo" maxlength="50" ><br/><br/> 
		About me : <input type="text" name="text_about" size="10" value="saisir le texte" maxlength="50" ><br/> <br/>	
		<input type="submit" value="Ajouter" name="ajouter">
		</form>

		<button type="cancel" onclick="javascript:window.location='menu_principal.php';">Retour au menu principal</button>	
</body>
</html>
