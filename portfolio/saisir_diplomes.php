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
<title>Ajouter un nouveau diplôme</title>

<link href="styles.css" type="text/css" rel="stylesheet">
</head>

<body>
     <b><?php echo $utilisateur ?></b><br/>
     <a href="deconnexion.php">Se déconnecter</a> <hr>
<H1>Ajouter une nouveau diplôme</H1>
		<form method="POST" action="ajouter_un_diplomes.php">
		Intitulé : <input type="text" name="intitule" size="50" value="saisir l'intitulé" maxlength="50"  autofocus="true"><br/><br/> 
		Spécialité : <input type="text" name="specialite" size="50" value="specialité" maxlength="50" ><br/><br/> 
		Année : <input type="text" name="annee" size="10" value="saisir l'année" maxlength="50" ><br/> <br/>
      Lieu : <input type="text" name="lieu" size="10" value="saisir le lieu" maxlength="50" ><br/> <br/>	
      Mention : <input type="text" name="mention" size="10" value="saisir Mention" maxlength="50" ><br/> <br/>	
      Image : <input type="text" name="image" size="10" value="" maxlength="50" ><br/> <br/>		
		<input type="submit" value="Ajouter" name="ajouter">
		</form>

		<button type="cancel" onclick="javascript:window.location='menu_principal.php';">Retour au menu principal</button>	
</body>
</html>
