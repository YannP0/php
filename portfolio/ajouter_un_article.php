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
  <title>Ajouter un article</title>
</head>

<body >
<b><?php echo $utilisateur ?></b><br/>
<?php 
// récupération des champs venant du formulaire

$prix_vente_ht=0;
$stock=0;

$designation=$_POST['designation'];
$description=$_POST['description'];
$prix_vente_ht=(float)$_POST['prix_vente_ht'];
$stock=intval($_POST['stock']);
$code_barre=$_POST['code_barre'];
$code_photo=$_POST['code_photo'];


try
{
	$mysqlClient = new PDO('mysql:host=127.0.0.1;dbname=gestionco;charset=utf8','root','');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

// Ecriture de la requête
$sqlQuery = 'INSERT INTO articles (designation,description,prix_vente_ht,stock,code_barre_ean,code_photo) VALUES ($designation,$description,$prix_vente_ht,$stock,$code_barre_ean,$code_photo)';

// Préparation
$insertArticle = $mysqlClient->prepare($sqlQuery);

// Exécution 
$insertArticle->execute(); 

	header("Location:menu_principal.php"); //appel de la page menu_principal.php
    
?> 

[
    'designation' => $designation,
    'description' => $description,
    'prixventeht' => $prix_vente_ht,
    'stock' => $stock,
	'codebarre' => $code_barre,
	'codephoto' => $code_photo]

</body>
</html>