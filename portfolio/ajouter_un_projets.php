<html>
<head>
	<meta charset="utf-8">
  <title>Ajouter un projet</title>
</head>

<body >

<?php 
// récupération des champs venant du formulaire

$images=$_POST['images'];


try
{
	$mysqlClient = new PDO('mysql:host=127.0.0.1;dbname=portfolio;charset=utf8','root','');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

// Ecriture de la requête
$sqlQuery = 'INSERT INTO projets (images) VALUES (:images)';

// Préparation
$insertClient = $mysqlClient->prepare($sqlQuery);

// Exécution ! 
$insertClient->execute([
    'images' => $images
]);

	header("Location:menu_principal.php"); //appel de la page menu_principal.php
    
?> 



</body>
</html>