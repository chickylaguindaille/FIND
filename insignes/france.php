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



      




      <?php
      include("sidebar4.php");
?>










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
























      <!-- SIDEBAR -->
      <div id="sideBar" class="sideBar">
            <div href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img class="closebtnImg" src="../Logos/closebtn.png"></div><br><br><br>

            <button class="FIND" onclick="myFunctionSideBar()"><img src="../Logos/find.png"><a>FIND</a></button>
            
            <div id="deroulant">
            <button class="localisation-btn" id="localisation-btn" onclick="myFunctionSideBar2()"><img src="../Logos/localisation.png"><a>Localisation</a></button>
              <div class="localisation-container" id="localisation-container">
                <button class="france" id="btnFrance" onclick="self.location.href='ville.php?id=France'"><img src="../Logos/France.png"><a>France</a></button>
                <button class="belgique" id="btnBelgique" onclick="self.location.href='ville.php?id=Belgique'"><img src="../Logos/Belgique.png"><a>Belgique</a></button>
              </div>
              

              <button class="folklore-btn" id="folklore-btn" onclick="myFunctionSideBar3()"><img src="../Logos/folklore.png"><a>Folklore</a></button>
              <div class="folklore-container" id="folklore-container">
                <button class="faluche" id="btnFaluche" onclick="self.location.href='couvre_chef.php?id=Faluche'"><img src="../Logos/Faluche.png"><a>Faluche</a></button>
                <button class="calotte" id="btnCalotte" onclick="self.location.href='couvre_chef.php?id=Calotte'"><img src="../Logos/Calotte.png"><a>Calotte</a></button>
                <button class="penne" id="btnPenne" onclick="self.location.href='couvre_chef.php?id=Penne'"><img src="../Logos/Penne.png"><a>Penne</a></button>
              </div>
            </div>

            <div class="separateur" id="s1"></div>

              <button class="calendrier-btn" id="calendrier-btn" onclick="myFunctionSideBar4()"><img src="../Logos/calendrier.png"><a>Calendrier</a></button>
              <div class="calendrier-container" id="calendrier-container">
                <button class="congres" id="btnCongres" onclick="self.location.href='../calendrier/congres.html?id=Congrès'"><img src="../Logos/France.png"><a>Congrès</a></button>
                <button class="ordinesque" id="btnOrdre" onclick="self.location.href='../calendrier/ordinesque.html?id=Ordinesque'"><img src="../Logos/Belgique.png"><a>Ordinesque</a></button>
              </div>

              <div class="separateur" id="s2"></div>

              <button class="insignes-btn" id="insignes-btn" onclick="myFunctionSideBar5()"><img src="../Logos/insignes.png"><a>Insignes</a></button>
              <div class="insignes-container" id="insignes-container">
              <button class="congres" id="btnCongres" onclick="self.location.href='france.php?id=France'"><img src="../Logos/France.png"><a>Code National Faluche</a></button>
                <button class="ordinesque" id="btnOrdre" onclick="self.location.href='belgique.php?id=Belgique'"><img src="../Logos/Belgique.png"><a>Usage en Belgique</a></button>
              </div>

              <div class="separateur" id="s3"></div>

              <button class="codes-btn" id="codes-btn" onclick="myFunctionSideBar6()"><img src="../Logos/codes.png"><a>Codes</a></button>
              <div class="codes-container" id="codes-container">
                <button class="congres" id="btnCongres" onclick="self.location.href='ville.php?id=Congrès'"><img src="../Logos/France.png"><a>Français</a></button>
                <button class="ordinesque" id="btnOrdre" onclick="self.location.href='ville.php?id=Ordinesque'"><img src="../Logos/Belgique.png"><a>Belge</a></button>
              </div>

              <div class="separateur" id="s4"></div>

              <button class="revisions-btn" id="revisions-btn" onclick="myFunctionSideBar7()"><img src="../Logos/revisions.png"><a>Révisions</a></button>
              <div class="revisions-container" id="revisions-container">
                <button class="congres" id="btnCongres" onclick="self.location.href='ville.php?id=Congrès'"><img src="../Logos/France.png"><a>Révision code</a></button>
                <button class="ordinesque" id="btnOrdre" onclick="self.location.href='ville.php?id=Ordinesque'"><img src="../Logos/Belgique.png"><a>Lecture de Calotte</a></button>
              </div>

              <button class="pwa"><img src="../Logos/pwa.png"><a>Ajouter à l'accueil</a></button>
              <button class="soumettre"><img src="../Logos/soumettre.png"><a>Soumettre Folklore</a></button>

              <img class="photoFindSideBar" src="../Logos/Logo512-nobackground.png">
        </div>

    <!-- RETOUR -->
    <a class="titreVille" href="javascript:void(0)" onclick="history.go(-1)"><img class="retourbtn" src="../boutons/retour.png"></a>
    <div class="titreVille">
    <h1>Rubans et Insignes en Faluche</h1></div>
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
$all = $pdo->query('SELECT DISTINCT matiere, couleur, discipline FROM couleur_etude WHERE pays = "France" ORDER BY discipline');
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
$all = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "France" AND type ="bac" ORDER BY nom');
?>

<div class="touteVille" id="toutInsigne2">
<br><h1 class="titrePartie">Baccalauréat</h1>
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
$all = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "France" AND type ="discipline" ORDER BY nom');
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
$all = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "France" AND type ="cursus" ORDER BY nom');
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
$all = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "France" AND type ="symbole" ORDER BY nom');
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
$all = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "France" AND type ="decerne_partenaire" ORDER BY nom');
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
$all = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "France" AND type ="decerne_croix" ORDER BY nom');
?>

<div class="touteVille" id="toutInsigne7">
<br><h1 class="titrePartie">Insignes décernés par un Grand Maître </h1>
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
$all = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "France" AND type ="asso" ORDER BY nom');
?>

<div class="touteVille" id="toutInsigne8">
<br><h1 class="titrePartie">Associatif </h1>
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
$all = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "France" AND type ="potager" ORDER BY nom');
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

    <script>

function myFunctionSideBar() {
            var x = document.getElementById("deroulant");
            var y = document.getElementById("localisation-container");
            var z = document.getElementById("folklore-container");
            var c = document.getElementById("calendrier-container");
            var i = document.getElementById("insignes-container");
            var co = document.getElementById("codes-container");
            var r = document.getElementById("revisions-container");

            if (x.style.display === "block") {
                x.style.display = "none";
                s1.style.display ="block";
                // x.reset();
            } else {
                x.style.display = "block";
                c.style.display ="none";
                i.style.display ="none";
                co.style.display ="none";
                r.style.display ="none";
                s1.style.display ="none";
                s2.style.display ="block";
                s3.style.display ="block";
                s4.style.display ="block";
            }


        }

function myFunctionSideBar2() {
        var x = document.getElementById("deroulant");
        var y = document.getElementById("localisation-container");
        var z = document.getElementById("folklore-container");
        var c = document.getElementById("calendrier-container");
        var i = document.getElementById("insignes-container");
        var co = document.getElementById("codes-container");
        var r = document.getElementById("revisions-container");

        if (y.style.display === "block") {
                y.style.display = "none";
                document.getElementById("deroulant").style.height="16%";
                document.getElementById("localisation-btn").style.height="50%";
                document.getElementById("folklore-btn").style.height="50%";

                // y.reset();
                
                
            } else {
                y.style.display = "block";
                document.getElementById("deroulant").style.height="32%";
                document.getElementById("localisation-btn").style.height="25%";
                document.getElementById("btnFrance").style.height="50%";
                document.getElementById("btnBelgique").style.height="50%";
                document.getElementById("folklore-btn").style.height="25%";
                y.style.height="50%";
                if (z.style.display === "block") {
                  z.style.display = "none";
                }
            }
          }

function myFunctionSideBar3() {
        var x = document.getElementById("deroulant");
        var y = document.getElementById("localisation-container");
        var z = document.getElementById("folklore-container");
        var c = document.getElementById("calendrier-container");
        var i = document.getElementById("insignes-container");
        var co = document.getElementById("codes-container");
        var r = document.getElementById("revisions-container");

        if (z.style.display === "block") {
                z.style.display = "none";
                document.getElementById("deroulant").style.height="16%";
                document.getElementById("localisation-btn").style.height="50%";
                document.getElementById("folklore-btn").style.height="50%";
                // z.reset();
                
                
            } else {
                z.style.display = "block";
                document.getElementById("deroulant").style.height="40%";
                document.getElementById("localisation-btn").style.height="20%";
                document.getElementById("btnFaluche").style.height="33.33%";
                document.getElementById("btnCalotte").style.height="33.33%";
                document.getElementById("btnPenne").style.height="33.33%";
                document.getElementById("folklore-btn").style.height="20%";
                z.style.height="60%";
                if (y.style.display === "block") {
                  y.style.display = "none";
                }
            }
          }

function myFunctionSideBar4() {
        var x = document.getElementById("deroulant");
        var y = document.getElementById("localisation-container");
        var z = document.getElementById("folklore-container");
        var c = document.getElementById("calendrier-container");
        var i = document.getElementById("insignes-container");
        var co = document.getElementById("codes-container");
        var r = document.getElementById("revisions-container");

        if (c.style.display === "block") {
                c.style.display = "none";
                c.style.height="16%";
                s2.style.display ="block";
                // y.reset();     
            } else {
                c.style.display = "block";
                c.style.height="16%";
                x.style.display = "none";
                i.style.display ="none";
                co.style.display ="none";
                r.style.display ="none";

                s1.style.display ="block";
                s2.style.display ="none";
                s3.style.display ="block";
                s4.style.display ="block";
            }
          }

function myFunctionSideBar5() {
        var x = document.getElementById("deroulant");
        var y = document.getElementById("localisation-container");
        var z = document.getElementById("folklore-container");
        var c = document.getElementById("calendrier-container");
        var i = document.getElementById("insignes-container");
        var co = document.getElementById("codes-container");
        var r = document.getElementById("revisions-container");

        if (i.style.display === "block") {
                i.style.display = "none";
                i.style.height="16%";
                s3.style.display ="block";
                // y.reset();     
            } else {
                i.style.display = "block";
                i.style.height="16%";
                x.style.display = "none";
                c.style.display ="none";
                co.style.display ="none";
                r.style.display ="none";

                s1.style.display ="block";
                s2.style.display ="block";
                s3.style.display ="none";
                s4.style.display ="block";
            }
          }

function myFunctionSideBar6() {
        var x = document.getElementById("deroulant");
        var y = document.getElementById("localisation-container");
        var z = document.getElementById("folklore-container");
        var c = document.getElementById("calendrier-container");
        var i = document.getElementById("insignes-container");
        var co = document.getElementById("codes-container");
        var r = document.getElementById("revisions-container");

        if (co.style.display === "block") {
                co.style.display = "none";
                co.style.height="16%";
                s4.style.display ="block";
                // y.reset();     
            } else {
                co.style.display = "block";
                co.style.height="16%";
                x.style.display = "none";
                c.style.display ="none";
                i.style.display ="none";
                r.style.display ="none";

                s1.style.display ="block";
                s2.style.display ="block";
                s3.style.display ="block";
                s4.style.display ="none";
            }
          }

function myFunctionSideBar7() {
        var x = document.getElementById("deroulant");
        var y = document.getElementById("localisation-container");
        var z = document.getElementById("folklore-container");
        var c = document.getElementById("calendrier-container");
        var i = document.getElementById("insignes-container");
        var co = document.getElementById("codes-container");
        var r = document.getElementById("revisions-container");

        if (r.style.display === "block") {
                r.style.display = "none";
                r.style.height="16%";
                // y.reset();     
            } else {
                r.style.display = "block";
                r.style.height="16%";
                x.style.display = "none";
                c.style.display ="none";
                i.style.display ="none";
                co.style.display ="none";
            }
          }






        function openNav() {
          document.getElementById("sideBar").style.width = "250px";
        }
        
        function closeNav() {
          document.getElementById("sideBar").style.width = "0";
        }

        function myFunction() {
            var x = document.getElementById("searchForm");
            var y = document.getElementById("headerBase")
            if (x.style.display === "flex") {
                x.style.display = "none";
                y.style.display = "flex";
                x.reset();
                
            } else {
                x.style.display = "flex";
                y.style.display = "none";
            }
        }

        var dropdown = document.getElementsByClassName("localisation-btn");



var dropdownFol = document.getElementsByClassName("folklore-btn");


    </script>

</body>
</html>