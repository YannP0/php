<?php
   try{
      $pdo=new PDO("mysql:host=localhost;dbname=portfolio","root","");
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?> 