<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Saisir Absence</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/dist/css/jumbotron.css" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">SCO-Enicar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
        
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.html" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="afficherEtudiants.html">Lister tous les étudiants</a>
                <a class="dropdown-item" href="afficherEtudiantsParClasse.html">Etudiants par Groupe</a>
                <a class="dropdown-item" href="#">Ajouter Groupe</a>
                <a class="dropdown-item" href="#">Modifier Groupe</a>
                <a class="dropdown-item" href="#">Supprimer Groupe</a>
      
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="ajouterEtudiant.html">Ajouter Etudiant</a>
                <a class="dropdown-item" href="#">Chercher Etudiant</a>
                <a class="dropdown-item" href="#">Modifier Etudiant</a>
                <a class="dropdown-item" href="#">Supprimer Etudiant</a>
      
      
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Absences</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="saisirAbsence.html">Saisir Absence</a>
                <a class="dropdown-item" href="etatAbsence.html">État des absences pour un groupe</a>
              </div>
            </li>
      
            <li class="nav-item active">
              <a class="nav-link" href="#">Se Déconnecter <span class="sr-only">(current)</span></a>
            </li>
      
          </ul>
        
      
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Saisir un groupe" aria-label="Chercher un groupe">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher Groupe</button>
          </form>
        </div>
      </nav>
      
<main role="main">
        <div class="jumbotron">
            <div class="container">
              <h1 class="display-4">Signaler l'absence pour tout un groupe</h1>
              <p>Pour signaler, annuler ou justifier une absence, choisissez d'abord le groupe, le module puis l'étudiant concerné!</p>
            </div>
          </div>

<div class="container">
<button  id="butclass">AfficherListeDeClasse</button>
<button  id="butmatiere">AfficherListeDeMatiere</button>
<button  id="butvalider">AfficherTableau</button>
  <form id="Postform" method="POST" action="ajouterAbsence.php">
    <div class="form-group">
      <label for="semaine">Choisir une semaine:</label><br>
      <input id="semaine" type="week" name="debut" size="10" class="datepicker"/>
    </div>
  <div class="form-group" id="formClasse">
  
    <label for="classe">Choisir un groupe:</label><br>
  </div>

  <div class="form-group" id="formMatiere">
    <label for="matiere">Choisir un module:</label><br>
  </div>
  <div id="tab"></div>
 <!--Bouton Valider-->
  <button type="submit" class="btn btn-primary btn-block">Valider</button>
  </form>
</div>
<div id="result"></div>  
<script>
  document.getElementById('butvalider').addEventListener('click',affichertableau);
  function affichertableau(){
      var debut =document.getElementById('semaine').value;
      var classe =document.getElementById('classe').value;
      var  xhr=new XMLHttpRequest();
      xhr.open('GET','http://localhost/projet_hamdi/afficherAbsence.php?debut='+debut+'&classe='+classe,true);
      xhr.send();
      xhr.onreadystatechange=function(){  
      if(this.readyState==4 && this.status==200){
        myFunction(this.responseText);
       }
      }
    
    function myFunction(response){
		    var obj=JSON.parse(response);       
        //alert(obj.success);
          if (obj.success==1){
		    var arr=obj.etudiants;
            let arrName=[];
            let l=arr.length*12;
          for(let i=0;i<l;i++){
            checkBoxName=`${i}`;
            arrName.push(checkBoxName);
          }
            var arr2=obj.dates;
            var arr3=obj.days;
            let out=[];
            out.push('<table rules="cols" frame="box"><tr><th>'+arr.length.toString()+'&nbsp'+'étudiants'+'</th>');
            for(let i=0;i<6;i++){
              out.push('<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">'+arr3[i]+'</th>');
            }
            out.push('</tr><tr><td>&nbsp;</td>');
            for(let i=0;i<6;i++){
              out.push('<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">'+arr2[i]+'</th>');
            }
            out.push('</tr><tr><td>&nbsp</td>');
            for(let i=0;i<6;i++){
              out.push('<th>AM</th><th>PM</th>')
            }
            out.push('</tr>');
            let lastPositionInRow=12;
            let firstPositionInRow=0;
            for (let i = 0; i < arr.length; i++) {
              out.push('<tr class="row_3"><td><b>'+arr[i].nom+'&nbsp'+arr[i].prenom+'</b></td>');
              for(let j=firstPositionInRow;j<lastPositionInRow;j++){
                out.push('<td><input type="checkbox" name='+arrName[j].toString()+'value='+arrName[j]+'</td>');
              }
              out.push('</tr>');
              lastPositionInRow+=12;
              firstPositionInRow+=12;
            }  
		        out.push('</table><br>');

		        document.getElementById("tab").innerHTML=out.join("");
       }
       else{
          document.getElementById("tab").innerHTML="Not found!";
       }
    }
  }
  document.getElementById('butclass').addEventListener('click',afficherClasse);
  function afficherClasse(e){
      e.preventDefault();
      var  xhr=new XMLHttpRequest();
      url='http://localhost/mini-projet-info1/afficherClasse.php';
      xhr.open('GET',url,true);
      xhr.send();
      xhr.onreadystatechange=function(){  
      if(this.readyState==4 && this.status==200){
        newFunction(this.responseText);
       }
      }
     function newFunction(response){
 
        var obj=JSON.parse(response);
        //alert(obj.success);

        if (obj.success==1){
          var arr=obj.nomClasse;
          var out;
         var myParent = document.getElementById("formClasse");
        //Create and append select list
            var selectList = document.createElement("select");
            selectList.id = "classe";
selectList.name="classe"
myParent.appendChild(selectList);

//Create and append the options
for (var i = 0; i < arr.length; i++) {
    var option = document.createElement("option");
    option.value = arr[i];
    option.text = arr[i];
    selectList.appendChild(option);
        }
    }
        else {
          document.getElementById("classe").innerHTML="Aucune Classe!";
        }
      
    }
}


document.getElementById('butmatiere').addEventListener('click',afficherMatiere);
  function afficherMatiere(e){
      e.preventDefault();
      var  xhr=new XMLHttpRequest();
      url='http://localhost/mini-projet-info1/afficherMatiere.php';
      xhr.open('GET',url,true);
      xhr.send();
      xhr.onreadystatechange=function(){  
      if(this.readyState==4 && this.status==200){
        newFunction2(this.responseText);
       }
      }
     function newFunction2(response){
 
        var obj=JSON.parse(response);
        //alert(obj.success);

        if (obj.success==1){
          var arr=obj.nomMatiere;
         var myParent = document.getElementById("formMatiere");
        //Create and append select list
            var selectList = document.createElement("select");
            selectList.id = "matiere";
selectList.name="matiere"
myParent.appendChild(selectList);

//Create and append the options
for (var i = 0; i < arr.length; i++) {
    var option = document.createElement("option");
    option.value = arr[i];
    option.text = arr[i];
    selectList.appendChild(option);
        }
    }
        else {
          document.getElementById("matiere").innerHTML="Aucune Classe!";
        }
      
    }
}
</script>
  
<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</main>
</body>
</html>
