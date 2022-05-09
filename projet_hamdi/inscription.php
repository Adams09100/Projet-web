<?php
   session_start();
   @$nom=$_POST["nom"];
   @$prenom=$_POST["prenom"];
   @$login=$_POST["login"];
   @$pass=$_POST["pass"];
   @$repass=$_POST["repass"];
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      if(empty($nom)) $erreur="Verifiez votre nom!";
      elseif(empty($prenom)) $erreur="Verifiez votre prénom!";
      elseif(empty($login)) $erreur="Verifiez votre adresse E-mail!";
      elseif(empty($pass)) $erreur="Verifiez votre mot de pass!";
      elseif($pass!=$repass) $erreur="Mots de passe non identiques!";
      else{
         include("connexion.php");
         $sel=$pdo->prepare("select id from enseignant where login=? limit 1");
         $sel->execute(array($login));
         $tab=$sel->fetchAll();
         if(count($tab)>0)
            $erreur="Votre adresse E-mail existe déjà!";
         else{
            $ins=$pdo->prepare("insert into enseignant(nom,prenom,login,pass) values(?,?,?,?)");
            if($ins->execute(array($nom,$prenom,$login,md5($pass))))
               header("location:login.php");
         }   
      }
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/dist/css/login.css"> 
      <!-- <style>
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
      </style> -->
   </head>
<body>
    <div class="registration-form">
        <form name="fo" method="post" action="inscription.php">
            <h1 class="icon icon-user" style="text-align:center; color:blue;">Inscription</h1>
            <div class="erreur" style="color:red; margin-bottom: 20px" ><?php echo $erreur ?></div>
            <div class="form-group">
                <input type="text" name="nom" class="form-control item" id="nom" placeholder="Nom" value="<?php echo $nom?>">
            </div>
            <div class="form-group">
                <input type="text" name="prenom" class="form-control item" id="prenom" placeholder="Prénom" value="<?php echo $prenom?>">
            </div>
            <div class="form-group">
                <input type="text" name="login" class="form-control item" id="login" placeholder="Adresse E-mail"  value="<?php echo $login?>">
               </div>
            <div class="form-group">
            <input type="password" name="pass" class="form-control item" id="pass" placeholder="Mot de passe">
         </div>
         <div class="form-group">
            <input type="password" name="repass" class="form-control item" id="repass" placeholder="Confirmer mot de passe">
         </div>
            <div class="form-group">
                <button type="submit" name="valider" class="btn btn-block create-account">S'inscrire</button>
            </div>
        </form>
        <p class="social-media">&copy; SOC-Enicar 2021-2022</p>
    </div>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/dist/css/login.css">
   <!-- <body>
      <h1>Inscription</h1>
      <div class="erreur"><?php echo $erreur ?></div>
      <form name="fo" method="post" action="inscription.php">
         <input type="text" name="nom" placeholder="Nom" value="<?php echo $nom?>" /><br />
         <input type="text" name="prenom" placeholder="Prénom" value="<?php echo $prenom?>" /><br />
         <input type="text" name="login" placeholder="Adresse E-mail" value="<?php echo $login?>" /><br />
         <input type="password" name="pass" placeholder="Mot de passe" /><br />
         <input type="password" name="repass" placeholder="Confirmer Mot de passe" /><br />
         <input type="submit" name="valider" value="S'inscrire" />
      </form>
   </body> -->
</html>