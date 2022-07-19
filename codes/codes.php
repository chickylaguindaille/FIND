<?php

 include("../localisation_folklore/fonctions/connexionbdd.php");

?>
<?php $id = /*(int)*/ $_GET['id'];?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIND</title>
    <link rel="shortcut icon" href="../Logos/Logo128.png">
    <link rel="stylesheet" media="screen" href="../style.css">
    <!-- PWA -->
    <link rel="manifest" href="../manifest.json">
    <link rel="apple-touch-icon" href="../Logos/Logo96.png">
    <link rel="apple-touch-startup-image" href="../Logos/Logo96.png">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="black">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="viewport" content="width=device-width, user-scalable=no">

</head>
<body>

<header>
<section id="headerBase">
        <img src="../boutons/menu-lateral.png" class="openbtn" onclick="openNav()" alt="menu" id="menu">
        <img src="../Logos/Logo512.png" alt="logo512" id="logo" onclick="self.location.href='../index.php'">
        <img src="../boutons/recherche.png" alt="recherche" id="recherche" class="openbtn" onclick="myFunction(), closeNav()">
      </section>



      















      <script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.12.4.js'></script>  
      <!-- RECHERCHE -->
      <form id="searchForm" class="searchForm" method="GET">
        <div class="container-1">
            <span class="icon"><i class="fa fa-search"></i></span>
            <div class="searchInput"><input type="text" name="s" placeholder="Chercher folklore" id="searchInput" autocomplete="off"></div>
        </div>
        <div class="closebtnSearchForm"><img onclick="myFunction()" name="closebtnSearchForm" id="closebtnSearchForm" class="closebtnImg" src="../Logos/closeBtnSearchForm.png"></div>
    </form>

    </header>
    
    <main>
      <!-- RECHERCHE RESULTATS -->
    <div id="result-search-global"></div>



    <script>
  $(document).ready(function(){
    $('#searchInput').keyup(function(){
      $('#result-search-global').html('');

      var utilisateur = $(this).val();

          $.ajax({
              type: 'GET',
              url: 'fonctions/recherche_globale.php',
              data: 'user=' + encodeURIComponent(utilisateur),
              success: function(data){
                if(data != ""){
                    $('#result-search-global').append(data);
                    console.log(utilisateur)
              }
              else{
                    document.getElementById('result-search-global').innerHTML = "<div>Aucun résultat</div>"
              }
              }

          })
    });
  });
  </script>

<script>
  $(document).ready(function(){
    $('#closebtnSearchForm').click(function(){
      $('#result-search-global').html('');
    });
  });
  </script>
























<?php
      include("sidebar5.php");
?>


        <?php 
$all = $pdo->query('SELECT photo_ville, avance FROM villes WHERE ville = "'.$id.'"');
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {
              ?>
    <!-- RETOUR -->
    <a class="titreVille" href="javascript:void(0)" onclick="history.go(-1)"><img class="retourbtn" src="../boutons/retour.png"></a>
    <div class="titreVille">
    <h1>Les codes à <?php echo $id; ?></h1></div>
    <div class="infoFrance"><img class="france" src="../Photos/posts_images_profil_ville/<?php echo $prenom['photo_ville']; ?>"><a>Le folklore à <?php echo $id; ?></a><div class="avanceN"></div></div><br>
<?php } ?>


<?php
$all = $pdo->query(
  ' SELECT cor.nom, cor.photo_profil_corpo, cod.nom_fichier, cod.annee, cod.chemin_fichier
    FROM corporations cor, codes cod 
    WHERE cor.id_corporation = cod.id_corporation
    AND ville = "'.$id.'" 
    ORDER BY cor.nom');
?>


<div class="touteVille" id="touteVille4">
    <?php
            if($all->rowCount() > 0){
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>

            <div class="uneCorpo">
            <a href="../Fichiers/<?php echo $prenom['chemin_fichier'];?>"> 
              <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil/' .$prenom['photo_profil_corpo'].'">'. '<div>' .$prenom['nom'].' '.$prenom['nom_fichier'].' '.$prenom['annee'].'</div></a>' ?>
              </a></div><?php } }else{
                  ?>

              <div class="pasEncore">Pas encore de codes de cette ville</div>
              <style>.pasEncore{text-align: center ; font-family: "Superclarendon"} </style>
            

            <?php } ?>










    </main>



</body>
</html>