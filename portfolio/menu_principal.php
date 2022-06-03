<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   
      $utilisateur="Utilisateur : ".$_SESSION["prenomNom"];
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
	  <link href="styles.css" type="text/css" rel="stylesheet">
      </head>
   <body>
      <h2><?php echo $utilisateur ?></h2>
       <a href="deconnexion.php">Se déconnecter</a> 	  
	  
	  <div id="menu">
		<hr><H1>Gestion du Portfolio</H1><hr>

		<br/>
		<hr>
		<H2>IDENTITÉE</H2>
			<a href="visu_id.php">Visualiser l'identitée</a><br/>
			<a href="saisir_id.php">Ajouter une identitée</a>	<br/>
			<form method="POST" action="modifier_id.php">
				Visualiser/Modifier l'identitée n°
				<input type="text" name="code_id" size="5" value="1" maxlength="10" >
				<input type="submit" value="Ouvrir" name="ouvrir">	

			</form>
			<br/>	
			
		<hr>	
		<H2>DIPLÔMES</H2>
		<a href="visu_diplomes.php">Visualiser tous les diplômes</a><br/>
			<a href="saisir_diplomes.php">Ajouter un diplômes</a><br/>
			<form method="POST" action="modifier_diplomes.php">
				Visualiser/Modifier le diplôme n°
				<input type="text" name="code_diplome" size="5" value="1" maxlength="10" >
				<input type="submit" value="Ouvrir" name="ouvrir">		
			</form>	
			<br/>

		<hr>	
		<H2>PROJETS</H2>
		<a href="visu_projets.php">Visualiser tous les Projets</a><br/>
			<a href="saisir_projets.php">Ajouter un Projets</a><br/>
			<form method="POST" action="modifier_projets.php">
				Visualiser/Modifier les Projets n°
				<input type="text" name="code_projets" size="5" value="1" maxlength="10" >
				<input type="submit" value="Ouvrir" name="ouvrir">		
			</form>	
			<br/>
   		<hr>
			<H2>CONTACT</H2>
		<a href="visu_contact.php">Visualiser tous les Messages</a><br/>
			<a href="saisir_contact.php">Ajouter un Messages</a><br/>
			<form method="POST" action="modifier_contact.php">
				Visualiser/Modifier les Messages n°
				<input type="text" name="code_contact" size="5" value="1" maxlength="10" >
				<input type="submit" value="Ouvrir" name="ouvrir">		
			</form>	
			<br/><hr>
		</div>

   </body>
</html> 