<html>
<head>
	<meta charset="utf-8">
  <title>Modifier client</title>
</head>

<body >

<?php 
// récupération des champs venant du formulaire
$code=intval($_POST['code_client']);
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$adresse=$_POST['adresse'];
$cp=$_POST['cp'];
$ville=$_POST['ville'];
$courriel=$_POST['courriel'];
$telephone=$_POST['telephone'];

try
{
	$mysqlClient = new PDO('mysql:host=127.0.0.1; dbname=gestionco;charset=utf8','root','');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

// Ecriture de la requête
$sqlQuery = "UPDATE clients SET nom=:nom,prenom=:prenom,adresse=:adresse,cp=:cp,ville=:ville,telephone=:telephone,courriel=:courriel WHERE code_client=$code";

// Préparation
$insertclient = $mysqlClient->prepare($sqlQuery);

// Exécution ! 
$insertclient->execute([
    'nom' => $nom,
    'prenom' => $prenom,
    'adresse' => $adresse,
    'cp' => $cp,
	'ville' => $ville,
	'telephone' => $telephone,
	'courriel' => $courriel
]);

	header("Location:menu_principal.php"); //appel de la page menu_principal.php
    
?> 



</body>
</html>