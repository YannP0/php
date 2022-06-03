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
<title>Ajouter un nouveau contact</title>

<link href="styles.css" type="text/css" rel="stylesheet">
</head>

<body>
     <b><?php echo $utilisateur ?></b><br/>
     <a href="deconnexion.php">Se déconnecter</a> <hr>
<H1>Ajouter un contact</H1>
		<form method="POST" action="ajouter_un_contact.php">
		Nom : <input type="text" name="nom" size="50" value="saisir le titre" maxlength="50"  autofocus="true"><br/><br/> 
		Email : <input type="text" name="email" size="50" value="email" maxlength="50" ><br/><br/> 
		Message : <input type="text" name="messages" size="10" value="saisir le texte" maxlength="50" ><br/> <br/>	
		<input type="submit" value="Ajouter" name="ajouter">
		</form>

		<button type="cancel" onclick="javascript:window.location='menu_principal.php';">Retour au menu principal</button>	
</body>
</html>
