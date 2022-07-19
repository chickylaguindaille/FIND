<?php

 include("fonctions/connexionbdd.php");

?>

<?php $id = /*(int)*/ $_GET['id']; 
// echo $id;
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIND</title>
    <link rel="shortcut icon" href="../Logos/Logo128.png">
    <link rel="stylesheet" media="screen" href="../style.css">
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
        <img src="../Logos/Logo512.png" alt="logo512" id="logo" onclick="self.location.href='../index.php'">        <img src="../boutons/recherche.png" alt="recherche" id="recherche" class="openbtn" onclick="myFunction(), closeNav()">
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
              url: '../localisation_folklore/fonctions/recherche_globale.php',
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

    </header>
    
    <main>


    <?php
      include("sidebar2.php");
      ?>


        






        <?php 
$all = $pdo->query('SELECT photo_ville, avance FROM villes WHERE ville = "'.$id.'"');
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {
              ?>

    <!-- RETOUR -->
    <a class="titreVille" href="javascript:void(0)" onclick="history.go(-1)"><img class="retourbtn" src="../boutons/retour.png"></a>
    <div class="titreVille">
    <h1><?php echo $id; ?></h1></div>
    <div class="infoFrance"><img class="france" src="../Photos/posts_images_profil_ville/<?php echo $prenom['photo_ville'];?>"><a>Le folklore à <?php echo $id.'</a> <span class="'.$prenom['avance'].'"></span></div></div><br>';?>
  <?php } ?>



<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.12.4.js'></script>  

    <form name="form" method="GET" id="form">
      <input type="text" name="s" placeholder="Recherche" id="searchInputVille" autocomplete="off"></div><br>
    </form><br>


    <div id="result-search"></div>


<script>
  $(document).ready(function(){
    $('#searchInputVille').keyup(function(){
      $('#result-search').html('');

      var utilisateur = $(this).val();

          $.ajax({
              type: 'GET',
              url: 'fonctions/recherche_corpo.php?id=<?php echo $id; ?>',
              data: 'user=' + encodeURIComponent(utilisateur),
              success: function(data){
                if(data != ""){
                    $('#result-search').append(data);
                    console.log(utilisateur)
                    $( "#touteVille1" ).hide();
                    $( "#touteVille2" ).hide();
                    $( "#touteVille3" ).hide();
                    $( "#touteVille4" ).hide();
                    $( "#touteVille5" ).hide();
                    $( "#touteVille6" ).hide();
                    $( "#touteVille7" ).hide();
                    $( "#touteVille8" ).hide();
                    $( "#touteVille9" ).hide();
                    $( "#touteVille10" ).hide();
                    $( "#touteVille11" ).hide();
              }
              else{
                    document.getElementById('result-search').innerHTML = "<div>Aucun résultat</div>"
              }
              }

          })
    });
  });
  </script>


  <!-- CERCLE CALOTTE-->
  <?php 
if(empty($_GET['user']) )
 {
$all = $pdo->query('SELECT DISTINCT nom, photo_profil_corpo, avance FROM corporations WHERE type_corporation= "cercle_calotte" AND ville = "'.$id.'" ORDER BY nom');
?>


<div class="touteVille" id="touteVille4">
    <?php
    $allall = $all->rowCount();
            if($all->rowCount() > 0){
              echo '<div class="enTeteCorpo">Cercles Calotte</div>';
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>

            <div class="uneCorpo">
            <a href="../localisation_folklore/corporation.php?id=<?= $prenom['nom']?>"> 
              <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil/' .$prenom['photo_profil_corpo'].'">'. '<div>' .$prenom['nom'].  '</div><span class="'.$prenom['avance'].'"></span>' ?>
              </a></div><?php } }
                  ?>
    <?php   }  
    else{
      echo "";
    }   ?>
</div>

  <!-- RÉGIONALES CALOTTE-->
  <?php 
if(empty($_GET['user']) )
 {
$all = $pdo->query('SELECT DISTINCT nom, photo_profil_corpo, avance FROM corporations WHERE type_corporation= "regionale_calotte" AND ville = "'.$id.'" ORDER BY nom');
?>


<div class="touteVille" id="touteVille3">
    <?php
    $allall = $allall + $all->rowCount();
            if($all->rowCount() > 0){
              echo '<div class="enTeteCorpo">Régionales Calotte</div>';
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>

            <div class="uneCorpo">
            <a href="../localisation_folklore/corporation.php?id=<?= $prenom['nom']?>"> 
              <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil/' .$prenom['photo_profil_corpo'].'">'. '<div>' .$prenom['nom'].  '</div><span class="'.$prenom['avance'].'"></span>' ?>
              </a></div><?php } }
                  ?>
    <?php   }  
    else{
      echo "";
    }   ?>
</div>

  <!-- ASSOCIATIONS -->
<?php 
if(empty($_GET['user']) )
 {
$all = $pdo->query('SELECT DISTINCT nom, photo_profil_corpo, avance FROM corporations WHERE type_corporation= "association_falucharde" AND ville = "'.$id.'" ORDER BY nom');
?>


<div class="touteVille" id="touteVille1">
    <?php
    $allall = $allall + $all->rowCount();
            if($all->rowCount() > 0){
              echo '<div class="enTeteCorpo">Associations</div>';
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>

            <div class="uneCorpo">
            <a href="../localisation_folklore/corporation.php?id=<?= $prenom['nom']?>"> 
              <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil/' .$prenom['photo_profil_corpo'].'">'. '<div>' .$prenom['nom'].  '</div><span class="'.$prenom['avance'].'"></span>' ?>
              </a></div><?php } }
                  ?>
    <?php   }  
    else{
      echo "";
    }   ?>
</div>


<!-- FILIERES FALUCHARDES -->

<?php 
if(empty($_GET['user']) )
 {
$all = $pdo->query('SELECT DISTINCT nom, photo_profil_corpo, avance FROM corporations WHERE type_corporation= "filiere_falucharde" AND ville = "'.$id.'" ORDER BY nom');
?>


<div class="touteVille" id="touteVille2">
    <?php
    $allall = $allall + $all->rowCount();
            if($all->rowCount() > 0){
              echo '<div class="enTeteCorpo">Filières Faluchardes</div>';
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>

            <div class="uneCorpo">
            <a href="../localisation_folklore/corporation.php?id=<?= $prenom['nom']?>"> 
              <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil/' .$prenom['photo_profil_corpo'].'">'. '<div>' .$prenom['nom'].  '</div><span class="'.$prenom['avance'].'"></span>' ?>
              </a></div><?php } }
                  ?>
    <?php   }  
    else{
      echo "";
    }   ?>
</div>


<!-- CORPORATION -->

<?php 
if(empty($_GET['user']) )
 {
$all = $pdo->query('SELECT DISTINCT nom, photo_profil_corpo, avance FROM corporations WHERE type_corporation= "corporation" AND ville = "'.$id.'" ORDER BY nom');
?>


<div class="touteVille" id="touteVille6">
    <?php
    $allall = $allall + $all->rowCount();
            if($all->rowCount() > 0){
              echo '<div class="enTeteCorpo">Corporations</div>';
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>

            <div class="uneCorpo">
            <a href="../localisation_folklore/corporation.php?id=<?= $prenom['nom']?>"> 
              <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil/' .$prenom['photo_profil_corpo'].'">'. '<div>' .$prenom['nom'].  '</div><span class="'.$prenom['avance'].'"></span>' ?>
              </a></div><?php } }
                  ?>
    <?php   }  
    else{
      echo "";
    }   ?>
</div>

<!-- CERCLE PENNE -->

<?php 
if(empty($_GET['user']) )
 {
$all = $pdo->query('SELECT DISTINCT nom, photo_profil_corpo, avance FROM corporations WHERE type_corporation= "cercle_penne" AND ville = "'.$id.'" ORDER BY nom');
?>


<div class="touteVille" id="touteVille7">
    <?php
    $allall = $allall + $all->rowCount();
            if($all->rowCount() > 0){
              echo '<div class="enTeteCorpo">Cercles Penné</div>';
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>

            <div class="uneCorpo">
            <a href="../localisation_folklore/corporation.php?id=<?= $prenom['nom']?>"> 
              <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil/' .$prenom['photo_profil_corpo'].'">'. '<div>' .$prenom['nom'].  '</div><span class="'.$prenom['avance'].'"></span>' ?>
              </a></div><?php } }
                  ?>
    <?php   }  
    else{
      echo "";
    }   ?>
</div>

<!-- REGIO PENNE -->

<?php 
if(empty($_GET['user']) )
 {
$all = $pdo->query('SELECT DISTINCT nom, photo_profil_corpo, avance FROM corporations WHERE type_corporation= "regionale_penne" AND ville = "'.$id.'" ORDER BY nom');
?>


<div class="touteVille" id="touteVille8">
    <?php
    $allall = $allall + $all->rowCount();
            if($all->rowCount() > 0){
              echo '<div class="enTeteCorpo">Regionales Penné</div>';
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>

            <div class="uneCorpo">
            <a href="../localisation_folklore/corporation.php?id=<?= $prenom['nom']?>"> 
              <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil/' .$prenom['photo_profil_corpo'].'">'. '<div>' .$prenom['nom'].  '</div><span class="'.$prenom['avance'].'"></span>' ?>
              </a></div><?php } }
                  ?>
    <?php   }  
    else{
      echo "";
    }   ?>
</div>

<!-- CERCLE -->

<?php 
if(empty($_GET['user']) )
 {
$all = $pdo->query('SELECT DISTINCT nom, photo_profil_corpo, avance FROM corporations WHERE type_corporation= "cercle" AND ville = "'.$id.'" ORDER BY nom');
?>


<div class="touteVille" id="touteVille9">
    <?php
    $allall = $allall + $all->rowCount();
            if($all->rowCount() > 0){
              echo '<div class="enTeteCorpo">Cercles</div>';
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>

            <div class="uneCorpo">
            <a href="../localisation_folklore/corporation.php?id=<?= $prenom['nom']?>"> 
              <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil/' .$prenom['photo_profil_corpo'].'">'. '<div>' .$prenom['nom'].  '</div><span class="'.$prenom['avance'].'"></span>' ?>
              </a></div><?php } }
                  ?>
    <?php   }  
    else{
      echo "";
    }   ?>
</div>

<!-- REGIONALE -->

<?php 
if(empty($_GET['user']) )
 {
$all = $pdo->query('SELECT DISTINCT nom, photo_profil_corpo, avance FROM corporations WHERE type_corporation= "regionale" AND ville = "'.$id.'" ORDER BY nom');
?>


<div class="touteVille" id="touteVille10">
    <?php
    $allall = $allall + $all->rowCount();
            if($all->rowCount() > 0){
              echo '<div class="enTeteCorpo">Régionales</div>';
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>

            <div class="uneCorpo">
            <a href="../localisation_folklore/corporation.php?id=<?= $prenom['nom']?>"> 
              <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil/' .$prenom['photo_profil_corpo'].'">'. '<div>' .$prenom['nom'].  '</div><span class="'.$prenom['avance'].'"></span>' ?>
              </a></div><?php } }
                  ?>
    <?php   }  
    else{
      echo "";
    }   ?>
</div>

<!-- ORDRE -->

<?php 
if(empty($_GET['user']) )
 {
$all = $pdo->query('SELECT DISTINCT nom, photo_profil_corpo, avance FROM corporations WHERE type_corporation= "ordre" AND ville = "'.$id.'" ORDER BY nom');
?>


<div class="touteVille" id="touteVille11">
    <?php
    $allall = $allall + $all->rowCount();
            if($all->rowCount() > 0){
              echo '<div class="enTeteCorpo">Ordres</div>';
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>

            <div class="uneCorpo">
            <a href="../localisation_folklore/corporation.php?id=<?= $prenom['nom']?>"> 
              <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil/' .$prenom['photo_profil_corpo'].'">'. '<div>' .$prenom['nom'].  '</div><span class="'.$prenom['avance'].'"></span>' ?>
              </a></div><?php } }
                  ?>
    <?php   }  
    else{
      echo "";
    }   ?>
</div>



<!-- GUILDE -->
<?php 
if(empty($_GET['user']) )
 {
$all = $pdo->query('SELECT DISTINCT nom, photo_profil_corpo, avance FROM corporations WHERE type_corporation= "guilde" AND ville = "'.$id.'" ORDER BY nom');
?>


<div class="touteVille" id="touteVille5">
    <?php
    $allall = $allall + $all->rowCount();
            if($all->rowCount() > 0){
              echo '<div class="enTeteCorpo"><a>Guildes</a></div>';
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>


            <div class="uneCorpo">
            <a href="../localisation_folklore/corporation.php?id=<?= $prenom['nom']?>"> 
              <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil/' .$prenom['photo_profil_corpo'].'">'. '<div>' .$prenom['nom'].  '</div><span class="'.$prenom['avance'].'"></span>' ?>
              </a></div><?php } }
              else if($allall < 1){
                  ?>
                  <p class="aucunResultat"> Aucun resultat </p>

          
    <?php   }  }
    else{
      echo "";
    }   ?>
</div>
























    </main>



</body>
</html>