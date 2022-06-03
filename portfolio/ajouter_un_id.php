<html>
<head>
	<meta charset="utf-8">
  <title>Ajouter un nouvelle ID</title>
</head>

<body >

<?php 
// récupération des champs venant du formulaire

$titre_about=$_POST['titre_about'];
$photo=$_POST['photo'];
$text_about=$_POST['text_about'];


try
{
	$mysqlClient = new PDO('mysql:host=127.0.0.1;dbname=portfolio;charset=utf8','root','');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

// Ecriture de la requête
$sqlQuery = 'INSERT INTO id(titre_about,photo,text_about) VALUES (:titre_about,:photo,:text_about)';

// Préparation
$insertClient = $mysqlClient->prepare($sqlQuery);

// Exécution ! 
$insertClient->execute([
    'titre_about' => $titre_about,
    'photo' => $photo,
    'text_about' => $text_about
]);

	header("Location:menu_principal.php"); //appel de la page menu_principal.php
    
?> 



</body>
</html>