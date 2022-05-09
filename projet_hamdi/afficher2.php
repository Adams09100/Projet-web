<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
include("connexion.php");
$req="SELECT * FROM Classe";
$reponse = $pdo->query($req);
if($reponse->rowCount()>0) {
	$outputs["classe"]=array();
while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)) {
        $classe = array();
        $classe["nomc"] = $row["nomc"];
        $classe["classeid"] = $row["classeid"];
        $classe["nombre"] = $row["nombre"];
         array_push($outputs["classe"], $classe);
    }
    // success
    $outputs["success"] = 1;
     echo json_encode($outputs);
} else {
    $outputs["success"] = 0;
    $outputs["message"] = "Pas de groupes!";
    // echo no users JSON
    echo json_encode($outputs);
}
}
?>