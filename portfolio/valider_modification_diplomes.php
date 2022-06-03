<html>
<head>
	<meta charset="utf-8">
  <title>Modifier diplomes</title>
</head>

<body >

<?php 
// récupération des champs venant du formulaire
$code=intval($_POST['code_diplome']);
$intitule=$_POST['intitule'];
$specialite=isset($_POST['specialite']);
$annee=$_POST['annee'];
$lieu=$_POST['lieu'];
$mention=$_POST['mention'];
$image=$_POST['image'];
try
{
	$mysqlClient = new PDO('mysql:host=127.0.0.1; dbname=portfolio;charset=utf8','root','');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

// Ecriture de la requête
$sqlQuery = "UPDATE diplomes SET intitule=:intitule,specialite=:specialite,annee=:annee,lieu=:lieu, mention=:mention, image=:image WHERE code_diplome=$code";

// Préparation
$insertclient = $mysqlClient->prepare($sqlQuery);

// Exécution ! 
$insertclient->execute([
    'intitule' => $intitule,
    'specialite' => $specialite,
    'annee' => $annee,
    'lieu' => $lieu,
    'mention' => $mention,
    'image' => $image

]);

	header("Location:menu_principal.php"); //appel de la page menu_principal.php
    
?> 



</body>
</html>