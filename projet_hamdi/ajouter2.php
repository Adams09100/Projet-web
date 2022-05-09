<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$nom=$_REQUEST['nom'];
$nb= $_REQUEST['nb'];
include("connexion.php");
         $sel=$pdo->prepare("select nomc from classe where nomc=? limit 1");  
         $sel->execute(array($nom));
         $tab=$sel->fetchAll();
         if(count($tab)>0) {
            $erreur="NOT OK";}// Groupe existe déja
         else{
            $req="insert into classe values (0, '$nom', '$nb')";
            $reponse = $pdo->exec($req) or die("error");
            $erreur ="OK";
         }
         header("location: AjouterGroupe.php"); 
         echo $erreur;
      }
?>