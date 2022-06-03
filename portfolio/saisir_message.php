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
<title>Contact</title>

<link href="styles.css" type="text/css" rel="stylesheet">
</head>

<body>
     <b><?php echo $utilisateur ?></b><br/>
     <a href="deconnexion.php">Se déconnecter</a> <hr>
	 
<H1>Ajouter un client</H1>
		<form method="POST" action="ajouter_un_message.php">
		NOM : <input type="text" name="nom" size="50" value="NOM" maxlength="50"  autofocus="true"><br/><br/> 
		Prénom : <input type="text" name="prenom" size="50" value="Prenom" maxlength="50" ><br/><br/> 
		Votre Mail : <input type="email" name="email" size="50" value="aa@bb.com" maxlength="50" ><br/><br/> 
		Méssage : <input type="text" name="messages" size="50" value="messages" maxlength="500" ><br/><br/> 	
		<input type="submit" value="Ajouter" name="ajouter">
		</form>

		<button type="cancel" onclick="javascript:window.location='menu_principal.php';">Retour au menu principal</button>	
</body>
</html>
