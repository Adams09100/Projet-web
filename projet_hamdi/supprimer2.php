<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   else  {
        include("connexion.php");
        /*$sql = 'DELETE FROM etudiant WHERE cin=:num';
        $reponse= $pdo->prepare($sql);
        $reponse->bindValue('num', $_GET['supp']);
        $res=$reponse->execute();*/
      $id=$_GET['supp'];
        $query= $pdo->prepare('delete from classe where classeid = :id');
        $query->execute(['id'=>$id]);
        
        header("location:AfficherGroupes.php");
 }
?>