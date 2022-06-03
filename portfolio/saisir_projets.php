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
<title>Ajouter un nouveau projet</title>

<link href="styles.css" type="text/css" rel="stylesheet">
</head>

<body>
     <b><?php echo $utilisateur ?></b><br/>
     <a href="deconnexion.php">Se déconnecter</a> <hr>
<H1>Ajouter un nouveau projet</H1>
		<form method="POST" action="ajouter_un_projets.php">
		Images : <input type="text" name="images" size="50" value="" maxlength="50"  autofocus="true"><br/><br/>
		<input type="submit" value="Ajouter" name="ajouter">
		</form>

		<button type="cancel" onclick="javascript:window.location='menu_principal.php';">Retour au menu principal</button>	
</body>
</html>
