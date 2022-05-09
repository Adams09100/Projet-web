<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
 else {
     include ("connexion.php");
     @$code = $_POST['id'];
    $name = $_POST['nom'];
    $nb= $_POST['nb'];
    if (isset($_POST['modifier'])) {
    $req3 ="UPDATE classe SET nomc='$name', nombre='$nb'  WHERE classeid = '$code'";
    $reponse = $pdo->query($req3);
    $msg= "La modification a été effectuée!";
    echo $msg;
    }
    else{ echo 'Erreur';
    }
    header('location:Affichergroupes.php');
    }
 ?>