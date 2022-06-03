<?php
   session_start();
   session_destroy();  //destruction de la session
   header("location:index.php"); //retour à la page index.html
?> 