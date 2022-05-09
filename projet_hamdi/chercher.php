<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   else {
    include("connexion.php");
    $name=$_POST['nameet'];   
    if isset($name) {
    $query= "SELECT * from etudiant where nom like '%$name%'";
    $reponse = $pdo->query($query);
    }
    }
    ?>
