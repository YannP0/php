<html>
<head>
	<meta charset="utf-8">
  <title>Modifier projet</title>
</head>

<body >

<?php 
// récupération des champs venant du formulaire
$code=intval($_POST['code_projets']);
$images=$_POST['images'];
try
{
	$mysqlClient = new PDO('mysql:host=127.0.0.1; dbname=portfolio;charset=utf8','root','');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

// Ecriture de la requête
$sqlQuery = "UPDATE projets SET images=:images WHERE code_projets=$code";

// Préparation
$insertclient = $mysqlClient->prepare($sqlQuery);

// Exécution ! 
$insertclient->execute([
    'images' => $images

]);

	header("Location:menu_principal.php"); //appel de la page menu_principal.php
    
?> 



</body>
</html>