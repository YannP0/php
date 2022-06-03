<html>
<head>
	<meta charset="utf-8">
  <title>Modifier ID</title>
</head>

<body >

<?php 
// récupération des champs venant du formulaire
$code=intval($_POST['code_id']);
$titre_about=$_POST['titre_about'];
$photo= isset($_POST['photo']);
$text_about=$_POST['text_about'];

try
{
	$mysqlClient = new PDO('mysql:host=127.0.0.1; dbname=portfolio;charset=utf8','root','');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

// Ecriture de la requête
$sqlQuery = "UPDATE id SET titre_about=:titre_about,photo=:photo,text_about=:text_about WHERE code_id=$code";

// Préparation
$insertclient = $mysqlClient->prepare($sqlQuery);

// Exécution ! 
$insertclient->execute([
    'titre_about' => $titre_about,
    'photo' => $photo,
    'text_about' => $text_about
]);

	header("Location:menu_principal.php"); //appel de la page menu_principal.php
    
?> 



</body>
</html>