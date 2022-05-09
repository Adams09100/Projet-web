<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
 else {
     include ("connexion.php");
     $code=$_POST['cin'];
    $name = $_POST['nom'];
    $pre =$_POST['prenom'];
    $email=$_POST['email'];
    $classe=$_POST['classe'];
    if (isset($_POST['modifier'])) {
    $req2 ="UPDATE etudiant SET nom='$name', prenom ='$pre', email= '$email', Classe = '$classe'  WHERE cin = '$code'";
    $reponse = $pdo->query($req2);
    $msg= "La modification a été effectuée!";
    echo $msg;
    }
    else{ echo 'Erreur';
    }
    header('location:Afficheretudiants.php');
    }
 ?>
 