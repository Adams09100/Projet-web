<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   else {
     include("connexion.php");
    @$name=$_GET['nameet'];
    @$nameb = $_GET['nameetb'];
    if (isset($nameb)) {
    $query= "SELECT * from etudiant where nom like '%$name%'";
    $reponse = $pdo->query($query);
  }
   }
?>
<?php
 if (isset ($_GET['submit'])) {
        $title=$_GET['text'];
          $sql="SELECT FROM etudiant WHERE nom LIKE '$title%'";
          $exe = mysqli_query ($con,$sql)or die("Query Failled !!");
    if (mysqli_num_rows ($exe)> 0){
    $cout = 0;
      while ($row = mysqli_fetch_assoc($exe)){
        $count++;

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Afficher Etudiants</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <!-- Custom styles for this template -->
    <link href="./assets/dist/css/jumbotron.css" rel="stylesheet">

    </head>
<body onload="refresh()">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">SCO-Enicar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.php" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>              <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="affichergroupes.php">Lister tous les groupes</a>
              <a class="dropdown-item" href="afficherEtudiantsParClasse.php">Etudiants par Groupe</a>
                <a class="dropdown-item" href="#">Modifier Groupe</a>
                <a class="dropdown-item" href="#">Supprimer Groupe</a>

              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="afficherEtudiants.php">Lister tous les étudiants</a>
                <a class="dropdown-item" href="#">Chercher Etudiant</a>
                <a class="dropdown-item" href="#">Modifier Etudiant</a>
                <a class="dropdown-item" href="#">Supprimer Etudiant</a>


              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Absences</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="saisirAbsence.php">Saisir Absence</a>
                <a class="dropdown-item" href="etatAbsence.php">État des absences pour un groupe</a>
              </div>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="login.php">Se Déconnecter <span class="sr-only">(current)</span></a>
            </li>

          </ul>


          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Saisir un groupe" aria-label="Chercher un groupe">
            <a href="#" class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher Groupe</a>
          </form>
        </div>
      </nav>

      <main role="main">
              <div class="jumbotron">
                  <div class="container">
                    <h1 class="display-4">Recherche des étudiants</h1>
                  </div>
                </div>
      <h1>Liste des étudiants INFO1</h1>
      <div class="container">
      <form class="form-inline my-2 my-lg-0" method="GET" action="Afficheretudiants.php">
                  Search :<input name="text" class="form-control mr-sm-2" type="text" placeholder="Saisir un étudiant" aria-label="Chercher un étudiant">
                  <button name="submit" class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher Etudiant</button>
                </form>
                <div id='result-search'></div>
      <div class="row">
       <table class="table table-striped table-hover">
       <tr>
       <td>
       <?php echo $count;?>
       </td>
       <td>
       <?php echo $row['cin'];?>
       </td>
       <td>
       <?php echo $row['nom'];?>
       </td>
       <td>
       <?php echo $row['prenom'];?>
       </td>
       <td>
       <?php echo $row['adresse'];?>
       </td>
       <td>
       <?php echo $row['Classe'];?>
       </td>
       </tr>


       </table>
       <br>
      </div>

      </main>
    <?php }}}?>
