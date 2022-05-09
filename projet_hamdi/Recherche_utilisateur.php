<?php

  session_start();
  require_once('connexion.php');
  is(isset($_GET['user']){
    $user = (String) trim($_GET['user']);
    $req =DB->query("SELECT *
      FROM etudiant
      WHERE nom LIKE ?
      LIMIT 10",array("$user%"));
      $req= $req->fetchAll();
      foreach($req as $r){
        ?>
        <div>
          <?=$r['nom']." ".$r['prenom'] ?>
        </div>
        <?php>

      }
  }

?>

/* <script>

  $(document). ready(function(){
     $('#search-Student').keyup(function(){
         $('#result-search').html();
         var utilisateur = $(this).val();
         if (utilisateur!=""){
            $.ajax({
                type: 'GET',
                url: 'Recherche_utilisateur.php',
                data: 'user=' + encodeURIComponent (utilisateur),
                success: function(data){
                    if (data!="") {
                        $('#result-search').append(data);
                    }else{
                       document.getElementById('result-search').innerHTML- "<div style='font-size: 20px; text-align: center; margin-top: 10px'>Aucun
  Etudiant</div>"
  }
  }
  });
  }
  });
  })
  </script>*/
