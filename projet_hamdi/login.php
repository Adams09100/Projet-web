<?php
   session_start();
   @$login=$_POST["login"];
   @$pass=md5($_POST["pass"]);
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      include("connexion.php");
      $sel=$pdo->prepare("select * from enseignant where login=? and pass=? limit 1");
      $sel->execute(array($login,$pass));
      $tab=$sel->fetchAll();
      if(count($tab)>0){
         $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"])).
         " ".strtoupper($tab[0]["nom"]);
         $_SESSION["nom"] = ucfirst(strtolower($tab[0]["nom"]));
         $_SESSION["autoriser"]="oui";
         header("location:index.php");
      }
      else
         $erreur="Adresse ou mot de passe invalide!";
   }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/dist/css/login.css">
</head>
<body onLoad="document.fo.login.focus()">
    <div class="registration-form">
        <form name="fo" method="post" action="">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <h1 class="h3 mb-3 font-weight-normal" style="text-align:center";>Veuillez vous connecter</h1>
            <div class="erreur" style="color:red; margin-bottom: 20px" ><?php echo $erreur ?></div>
            <div class="form-group">
                <input type="login" name="login" class="form-control item" id="login" placeholder="Adresse E-mail">
            </div>
            <div class="form-group">
                <input type="password" name="pass" class="form-control item" id="pass" placeholder="Mot de Passe">
            </div>
            <div class="form-group">
                <button type="submit" name="valider" class="btn btn-block create-account">Se Connecter</button>
            </div>
            <div class="form-group">
            <button class="btn btn-block create-account"><a style="color:white" href="inscription.php">Créer un compte</a>
            </button>
        </form>
    </div>
    <p class="social-media">&copy; SOC-Enicar 2021-2022</p>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>


<!-- <!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <style>
         *{
            font-family:arial;
         }
         body{
            margin:20px;
         }
         input{
            border:solid 1px #2222AA;
            margin-bottom:10px;
            padding:16px;
            outline:none;
            border-radius:6px;
         }
         .erreur{
            color:#CC0000;
            margin-bottom:10px;
         }
         a{
            font-size:12pt;
            color:#EE6600;
            text-decoration:none;
            font-weight:normal;
         }
         a:hover{
            text-decoration:underline;
         }
      </style>
   </head>
   <body onLoad="document.fo.login.focus()">
      <h1>Authentification [ <a href="inscription.php">Créer un compte</a> ]</h1>
      <div class="erreur"><?php echo $erreur ?></div>
      <form name="fo" method="post" action="">
         <input type="text" name="login" placeholder="Adresse E-mail" /><br />
         <input type="password" name="pass" placeholder="Mot de passe" /><br />
         <input type="submit" name="valider" value="S'authentifier" />
      </form>
   </body>
</html> -->