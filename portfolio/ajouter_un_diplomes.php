<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   
      $utilisateur="Utilisateur : ".$_SESSION["prenomNom"];

?>

<html>
<head>
	<meta charset="utf-8">
  <title>Ajouter un diplôme</title>
</head>

<body >

<?php 


// récupération des champs venant du formulaire

$intitule=$_POST['intitule'];
$specialite=$_POST['specialite'];
$annee=$_POST['annee'];
$lieu=$_POST['lieu'];
$mention=$_POST['mention'];
$image=$_POST['image'];


try
{
	$mysqlClient = new PDO('mysql:host=127.0.0.1;dbname=portfolio;charset=utf8','root','');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

// Ecriture de la requête

$sqlQuery = 'INSERT INTO diplomes (intitule,specialite,annee,lieu,mention,image) VALUES (:intitule,:specialite,:annee,:lieu,:mention,:image)';

// Préparation
$insertClient = $mysqlClient->prepare($sqlQuery);


// Exécution ! 
$insertClient->execute([
    'intitule' => $intitule,
    'specialite' => $specialite,
    'annee' => $annee,
    'lieu' => $lieu,
    'mention' => $mention,
    'image' => $image
]);

	// header("Location:menu_principal.php"); //appel de la page menu_principal.php
    
?> 



</body>
</html>