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
      include("sidebar4.php");
?>

    <!-- RETOUR -->
    <a class="titreVille" href="javascript:void(0)" onclick="history.go(-1)"><img class="retourbtn" src="../boutons/retour.png"></a>
    <div class="titreVille">
    <h1>Rubans et Insignes en Belgique</h1></div>
    <!-- <div class="infoFrance"><img class="france" src="../Logos/<?php echo $id; ?>.png"><a>Les folklores en <?php echo $id; ?></a><div class="avanceN"></div></div><br> -->




<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.12.4.js'></script>  

    <form name="form" method="GET" id="form">
      <input type="text" name="s" placeholder="Recherche" id="searchInputPins" autocomplete="off"></div><br>
    </form>
    <div id="result-search"></div>


<script>
  $(document).ready(function(){
    $('#searchInputPins').keyup(function(){
      $('#result-search').html('');


      var utilisateur = $(this).val();

          $.ajax({
              type: 'GET',
              url: 'recherche_pins.php?id=<?php echo $id; ?>',
              data: 'user=' + encodeURIComponent(utilisateur),
              success: function(data){
                if(data != ""){
                    $('#result-search').append(data);
                    console.log(utilisateur)
                    $( "#toutInsigne1" ).hide();
                    $( "#toutInsigne2" ).hide();
                    $( "#toutInsigne3" ).hide();
                    $( "#toutInsigne4" ).hide();
                    $( "#toutInsigne5" ).hide();
                    $( "#toutInsigne6" ).hide();
                    $( "#toutInsigne7" ).hide();
                    $( "#toutInsigne8" ).hide();
                    $( "#toutInsigne9" ).hide();
              }
              else{
                    document.getElementById('result-search').innerHTML = "<div>Aucun résultat</div>"
              }
              }

          })
    });
  });
  </script>
	


<?php 
if(empty($_GET['user']) )
 {
$all = $pdo->query('SELECT DISTINCT matiere, couleur, discipline FROM couleur_etude WHERE pays = "Belgique" ORDER BY discipline');
?>



<div class="touteVille" id="toutInsigne1">
<br><h1 class="titrePartie">Couleur des disciplines</h1>
<?php 
    echo '<table class="tablePins">';?>
    <?php

            if($all->rowCount() > 0){
            
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>
            <div class="unPins">
            <!-- <a href="filiere.php?id=<?= $prenom['ville']?>">  -->
              <?php echo '<tr> <td> '.$prenom['discipline'].'</td><td> '.$prenom['matiere'].' '.$prenom['couleur'].'</td></tr> '?>
              </div><?php } echo '</table></div>';}

              else{
                  ?>
                  <div class="aucunResultat"> Aucun résultat </div>
              <php } ?>
          
    <?php   }  }
    else{
      echo "";
    }   ?>




<?php 
if(empty($_GET['user']) )
 {
$all = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "Belgique" AND type ="humanite" ORDER BY nom');
?>

<div class="touteVille" id="toutInsigne2">
<br><h1 class="titrePartie">Humanités</h1>
<?php 

    echo '<table class="tablePins">';?>
    <?php

            if($all->rowCount() > 0){
            
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>
            <div class="unPins">
            <!-- <a href="filiere.php?id=<?= $prenom['ville']?>">  -->
              <?php echo '<tr> <td> '.$prenom['signification'].'</td><td> '.$prenom['nom'].'</td></tr> '?>
              </div><?php } echo '</table>';}

              else{
                  ?>
                  <div class="aucunResultat"> Aucun résultat </div>
              <php } ?>
          
    <?php   }  }
    else{
      echo "";
    }   ?>
</div>



<?php 
if(empty($_GET['user']) )
 {
$all = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "Belgique" AND type ="discipline" ORDER BY nom');
?>

<div class="touteVille" id="toutInsigne3">
<br><h1 class="titrePartie">Emblème de la discipline </h1>
<?php 

    echo '<table class="tablePins">';?>
    <?php

            if($all->rowCount() > 0){
            
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>
            <div class="unPins">
            <!-- <a href="filiere.php?id=<?= $prenom['ville']?>">  -->
              <?php echo '<tr> <td> '.$prenom['signification'].'</td><td> '.$prenom['nom'].'</td></tr> '?>
              </div><?php } echo '</table>';}

              else{
                  ?>
                  <div class="aucunResultat"> Aucun résultat </div>
              <php } ?>
          
    <?php   }  }
    else{
      echo "";
    }   ?>
</div>



<?php 
if(empty($_GET['user']) )
 {
$all = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "Belgique" AND type ="cursus" ORDER BY nom');
?>

<div class="touteVille" id="toutInsigne4">
<br><h1 class="titrePartie">Cursus </h1>
<?php 

    echo '<table class="tablePins">';?>
    <?php

            if($all->rowCount() > 0){
            
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>
            <div class="unPins">
            <!-- <a href="filiere.php?id=<?= $prenom['ville']?>">  -->
              <?php echo '<tr> <td> '.$prenom['signification'].'</td><td> '.$prenom['nom'].'</td></tr> '?>
              </div><?php } echo '</table>';}

              else{
                  ?>
                  <div class="aucunResultat"> Aucun résultat </div>
              <php } ?>
          
    <?php   }  }
    else{
      echo "";
    }   ?>
</div>



<?php 
if(empty($_GET['user']) )
 {
$all = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "Belgique" AND type ="symbole" ORDER BY nom');
?>

<div class="touteVille" id="toutInsigne5">
<br><h1 class="titrePartie">Les symboles </h1>
<?php 

    echo '<table class="tablePins">';?>
    <?php

            if($all->rowCount() > 0){
            
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>
            <div class="unPins">
            <!-- <a href="filiere.php?id=<?= $prenom['ville']?>">  -->
              <?php echo '<tr> <td> '.$prenom['signification'].'</td><td> '.$prenom['nom'].'</td></tr> '?>
              </div><?php } echo '</table>';}

              else{
                  ?>
                  <div class="aucunResultat"> Aucun résultat </div>
              <php } ?>
          
    <?php   }  }
    else{
      echo "";
    }   ?>
</div>



<?php 
if(empty($_GET['user']) )
 {
$all = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "Belgique" AND type ="decerne_partenaire" ORDER BY nom');
?>

<div class="touteVille" id="toutInsigne6">
<br><h1 class="titrePartie">Insignes décernés par le ou la partenaire </h1>
<?php 

    echo '<table class="tablePins">';?>
    <?php

            if($all->rowCount() > 0){
            
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>
            <div class="unPins">
            <!-- <a href="filiere.php?id=<?= $prenom['ville']?>">  -->
              <?php echo '<tr> <td> '.$prenom['signification'].'</td><td> '.$prenom['nom'].'</td></tr> '?>
              </div><?php } echo '</table>';}

              else{
                  ?>
                  <div class="aucunResultat"> Aucun résultat </div>
              <php } ?>
          
    <?php   }  }
    else{
      echo "";
    }   ?>
</div>



<?php 
if(empty($_GET['user']) )
 {
$all = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "Belgique" AND type ="decerne" ORDER BY nom');
?>

<div class="touteVille" id="toutInsigne7">
<br><h1 class="titrePartie">Insignes décernés</h1>
<?php 

    echo '<table class="tablePins">';?>
    <?php

            if($all->rowCount() > 0){
            
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>
            <div class="unPins">
            <!-- <a href="filiere.php?id=<?= $prenom['ville']?>">  -->
              <?php echo '<tr> <td> '.$prenom['signification'].'</td><td> '.$prenom['nom'].'</td></tr> '?>
              </div><?php } echo '</table>';}

              else{
                  ?>
                  <div class="aucunResultat"> Aucun résultat </div>
              <php } ?>
          
    <?php   }  }
    else{
      echo "";
    }   ?>
</div>




<?php 
if(empty($_GET['user']) )
 {
$all = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "Belgique" AND type ="potager" ORDER BY nom');
?>

<div class="touteVille" id="toutInsigne9">
<br><h1 class="titrePartie">Potager </h1>
<?php 

    echo '<table class="tablePins">';?>
    <?php

            if($all->rowCount() > 0){
            
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>
            <div class="unPins">
            <!-- <a href="filiere.php?id=<?= $prenom['ville']?>">  -->
              <?php echo '<tr> <td> '.$prenom['signification'].'</td><td> '.$prenom['nom'].'</td></tr> '?>
              </div><?php } echo '</table>';}

              else{
                  ?>
                  <div class="aucunResultat"> Aucun résultat </div>
              <php } ?>
          
    <?php   }  }
    else{
      echo "";
    }   ?>
</div>








    </main>


</body>
</html>