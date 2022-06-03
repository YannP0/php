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
  <title>Modifier article</title>
</head>

<body >
<b><?php echo $utilisateur ?></b><br/>

<?php 
// récupération des champs venant du formulaire
$code=intval($_POST['code_article']);
$designation=$_POST['designation'];
$description=$_POST['description'];
$prix_vente_ht=$_POST['prix_vente_ht'];
$stock=$_POST['stock'];
$code_barre_ean=$_POST['code_barre_ean'];
$code_photo=$_POST['code_photo'];

try
{
	$mysqlClient = new PDO('mysql:host=127.0.0.1; dbname=gestionco;charset=utf8','root','');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

// Ecriture de la requête
$sqlQuery = "UPDATE articles SET designation=:designation,description=:description,prix_vente_ht=:prix_vente_ht,stock=:stock,code_barre_ean=:code_barre_ean,code_photo=:code_photo WHERE code_article=$code";

// Préparation
$insertclient = $mysqlClient->prepare($sqlQuery);

// Exécution ! 
$insertclient->execute([
    'designation' => $designation,
    'description' => $description,
    'prix_vente_ht' => $prix_vente_ht,
    'stock' => $stock,
	'code_barre_ean' => $code_barre_ean,
	'code_photo' => $code_photo
]);

	header("Location:menu_principal.php"); //appel de la page menu_principal.php
    
?> 



</body>
</html>