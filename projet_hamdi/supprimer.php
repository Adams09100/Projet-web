<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   else  {
        include("connexion.php");
      $id=$_GET['supp'];
        $query= $pdo->prepare('delete from etudiant where cin = :id');
        $query->execute(['id'=>$id]);
        
        header("location:AfficherEtudiants.php");
 }
?>

