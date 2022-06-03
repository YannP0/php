<html>
<head>
	<meta charset="utf-8">
  <title>Ajouter un contact</title>
</head>

<body >

<?php 
// récupération des champs venant du formulaire

$nom=$_POST['nom'];
$email=$_POST['email'];
$messages=$_POST['messages'];


try
{
	$mysqlClient = new PDO('mysql:host=127.0.0.1;dbname=portfolio;charset=utf8','root','');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

// Ecriture de la requête
$sqlQuery = 'INSERT INTO contact(nom,email,messages) VALUES (:nom,:email,:messages)';

// Préparation
$insertClient = $mysqlClient->prepare($sqlQuery);

// Exécution ! 
$insertClient->execute([
    'nom' => $nom,
    'email' => $email,
    'messages' => $messages
]);

	header("Location:menu_principal.php"); //appel de la page menu_principal.php
    
?> 



</body>
</html>