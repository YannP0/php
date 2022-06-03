<html>
<head>
	<meta charset="utf-8">
  <title>Modifier contact</title>
</head>

<body >

<?php 
// récupération des champs venant du formulaire
$code=intval($_POST['code_contact']);
$nom=$_POST['nom'];
$email= isset($_POST['email']);
$messages=$_POST['messages'];

try
{
	$mysqlClient = new PDO('mysql:host=127.0.0.1; dbname=portfolio;charset=utf8','root','');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

// Ecriture de la requête
$sqlQuery = "UPDATE contact SET nom=:nom,email=:email,messages=:messages WHERE code_contact=$code";

// Préparation
$insertclient = $mysqlClient->prepare($sqlQuery);

// Exécution ! 
$insertclient->execute([
    'nom' => $nom,
    'email' => $email,
    'messages' => $messages
]);

	header("Location:menu_principal.php"); //appel de la page menu_principal.php
    
?> 



</body>
</html>