<?php

 include("fonctions/connexionbdd.php");

?>

<?php $id = /*(int)*/ $_GET['id']; ?>


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
        <img src="../Logos/Logo512.png" alt="logo512" id="logo">
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
        <div class="closebtnSearchForm"><img onclick="myFunction(), closeNav()" name="closebtnSearchForm" id="closebtnSearchForm" class="closebtnImg" src="../Logos/closeBtnSearchForm.png"></div>
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


      <!-- SIDEBAR -->
        <div id="sideBar" class="sideBar">
            <div href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img class="closebtnImg" src="../Logos/closebtn.png"></div><br><br><br>

            <button class="FIND" onclick="self.location.href='../index.php'"><img src="../Logos/Logo512-nobackground.png"><a>FIND</a></button>

            <button class="localisation-btn"><img src="../Logos/localisation.png"><a>Localisation</a></button>
              <div class="localisation-container">
                <button class="france" onclick="self.location.href='../localisation_folklore/ville.php?id=France'"><img src="../Logos/France.png"><a>France</a></button>
                <button class="belgique" onclick="self.location.href='../localisation_folklore/ville.php?id=Belgique'"><img src="../Logos/Belgique.png"><a>Belgique</a></button>
              </div>

              <button class="folklore-btn"><img src="../Logos/folklore.png"><a>Folklore</a></button>
              <div class="folklore-container">
              <button class="faluche" onclick="self.location.href='../localisation_folklore/couvre_chef.php?id=Faluche'"><img src="../Logos/Faluche.png"><a>Faluche</a></button>
                <button class="calotte" onclick="self.location.href='../localisation_folklore/couvre_chef.php?id=Calotte'"><img src="../Logos/Calotte.png"><a>Calotte</a></button>
                <button class="penne" onclick="self.location.href='../localisation_folklore/couvre_chef.php?id=Penne'"><img src="../Logos/Penne.png"><a>Penne</a></button>
              </div>

              <button class="calendrier"><img src="../Logos/calendrier.png"><a>Evenements</a></button>
              <button class="pwa"><img src="../Logos/pwa.png"><a>Ajouter à l'accueil</a></button>
              <button class="soumettre"><img src="../Logos/soumettre.png"><a>Soumettre Folklore</a></button>
        </div>
    
    <!-- RETOUR -->
    <a href="javascript:void(0)" onclick="history.go(-1)"><img class="retourbtn" src="../boutons/retour.png"></a>

    <!-- MAIN -->

    <!-- NOM CORPO -->
    <?php   
      $pc = $pdo->query('SELECT nom, photo_profil_corpo FROM corporations WHERE nom="'.$id.'"');
      while($prenom = $pc->fetch(PDO::FETCH_ASSOC)) {
        echo ' <div class="head"><h1 class="titreCorporation">'.$prenom['nom'].'</h1>';
        echo '<img src="../Photos/posts_images_profil/' . ($prenom['photo_profil_corpo']) . '"></div>';
    }    ?>

    <!-- RESUME -->
        <p class="resumeCorporation"><h2>Résumé</h2>
        <?php   
      $pc = $pdo->query('SELECT resume_corporation FROM corporations WHERE nom="'.$id.'"');
      while($prenom = $pc->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="resume">'.$prenom['resume_corporation'].'</div></p>';
    }    ?>

    <!-- TABLE -->
        <div class="premierTableau"><table class="tableCorporation">
          <tr>
            <td class="tableauGauche">Dénomination</td>
            <td>
            <?php   
      $pc = $pdo->query('SELECT nom, abreviation FROM corporations WHERE nom="'.$id.'"');
      while($prenom = $pc->fetch(PDO::FETCH_ASSOC)) {
        echo $prenom['nom'].' ('.$prenom['abreviation'].')';
    }    ?>
            </td>
          </tr>
          <tr>
            <td>Fondation</td>
            <td>
            <?php   
      $pc = $pdo->query('SELECT date_creation FROM corporations WHERE nom="'.$id.'"');
      while($prenom = $pc->fetch(PDO::FETCH_ASSOC)) {
        echo $prenom['date_creation'];
    }    ?>
            </td>
          </tr>
          <tr>
            <td>Particularités</td>
            <th><ul>
            <?php   
      $pc = $pdo->query('SELECT titre_information, text_info FROM infos_corporations WHERE type_info="particularite" AND id_corporation = (SELECT id_corporation FROM corporations WHERE nom="'.$id.'")');
      while($prenom = $pc->fetch(PDO::FETCH_ASSOC)) {
        echo '<li>'.$prenom['titre_information'].'- '.$prenom['text_info'].'</li>';
    }    ?>
            </ul></th>
          </tr>
        </table></div>


       <!-- DECORUM -->
        <div class="decorumCorporation">
          <h2>Décorum</h2>
            <table>
              <tr>
                            <?php   
                    $pc = $pdo->query('SELECT chemin_fichier FROM photos_corporations WHERE type_photo="decorum" AND id_corporation = (SELECT id_corporation FROM corporations WHERE nom="'.$id.'")');
                    while($prenom = $pc->fetch(PDO::FETCH_ASSOC)) {
                      echo '<td><img class="photoDecorum" src="../Photos/posts_images/' . ($prenom['chemin_fichier']) . '"></td>';
                  }   ?>
              </tr>
              <tr>
              <?php   
                    $pc = $pdo->query('SELECT nom_photo, date_photo FROM photos_corporations WHERE type_photo="decorum" AND id_corporation = (SELECT id_corporation FROM corporations WHERE nom="'.$id.'")');
                    while($prenom = $pc->fetch(PDO::FETCH_ASSOC)) {
                      echo '<td class="infoDecorum">'.$prenom['nom_photo'] .' '. $prenom['date_photo'].'</td>';
                  }   ?>
              </tr>
            </table>
        </div>


        <!-- ANECDOTE -->
        <div class="anecdotesCorporation">
          <h2>Anecdotes</h2>

          <?php   
      $pc = $pdo->query('SELECT titre_information, text_info FROM infos_corporations WHERE type_info="anecdote" AND id_corporation = (SELECT id_corporation FROM corporations WHERE nom="'.$id.'")');
      while($prenom = $pc->fetch(PDO::FETCH_ASSOC)) {
        echo '<a class="titreAnecdote">'.$prenom['titre_information'].'</a><br><a>'.$prenom['text_info'].'</a>';
    }    ?>

        </div>

        <div  class="chantCorporation">
          <h2>Chant</h2>

    <!-- CHANT CORPO -->
    <?php   
      $pc = $pdo->query('SELECT texte_chant FROM chants_corporations WHERE id_corporation = (SELECT id_corporation FROM corporations WHERE nom="'.$id.'")');
      while($prenom = $pc->fetch(PDO::FETCH_ASSOC)) {
        echo $prenom['texte_chant'];
    }    ?>

        </div>


    <!-- HISTORIQUE CROIX -->
        <div class="historiqueCroixCorporation">
          <h2>Historique croix</h2>
          <table>
            
            <?php  

      $pc = $pdo->query('SELECT date_debut, date_fin, surnom FROM historique_comite WHERE id_corporation = (SELECT id_corporation FROM corporations WHERE nom="'.$id.'") AND fonction="GM" ORDER BY date_debut');
      
      while($prenom = $pc->fetch(PDO::FETCH_ASSOC)) {
        $date_debut = $prenom['date_debut'];
        $GM = $prenom['surnom'];
        echo '<tr><td>'.$date_debut.'</td>';
        echo '<td>GM : '.$GM.'</td>';

        $pcd = $pdo->query('SELECT date_debut, date_fin, surnom FROM historique_comite WHERE date_debut='.$date_debut.' AND fonction="GC" AND id_corporation = (SELECT id_corporation FROM corporations WHERE nom="'.$id.'")');
        while($surnom = $pcd->fetch(PDO::FETCH_ASSOC)) {
          $GC = $surnom['surnom'];
        echo '<td>GC : '.$GC.'</td>';
      }
      }
        ?>
          </table>
        </div>



        <!-- PINS -->
        <div class="pinsCorporation">
          <h2>Pin's</h2>
            <table>
              <tr>
                            <?php   
                    $pc = $pdo->query('SELECT chemin_fichier FROM photos_corporations WHERE type_photo="pins" AND id_corporation = (SELECT id_corporation FROM corporations WHERE nom="'.$id.'")');
                    while($prenom = $pc->fetch(PDO::FETCH_ASSOC)) {
                      echo '<td><img src="../Photos/posts_images/' . ($prenom['chemin_fichier']) . '"></td>';
                  }   ?>
              </tr>
              <tr>
              <?php   
                    $pc = $pdo->query('SELECT nom_photo, date_photo FROM photos_corporations WHERE type_photo="pins" AND id_corporation = (SELECT id_corporation FROM corporations WHERE nom="'.$id.'")');
                    while($prenom = $pc->fetch(PDO::FETCH_ASSOC)) {
                      echo '<td>'.$prenom['nom_photo'] .' '. $prenom['date_photo'].'</td>';
                  }   ?>
              </tr>
            </table>

        </div>



    </main>

    <script>

let accueil = document.getElementById("logo");
accueil.addEventListener("click", () => {
    document.location.href="../index.php";
})

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
            } else {
                x.style.display = "flex";
                y.style.display = "none";
            }
        }

        var dropdown = document.getElementsByClassName("localisation-btn");
var i;
for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}

var dropdownFol = document.getElementsByClassName("folklore-btn");
var i;
for (i = 0; i < dropdownFol.length; i++) {
  dropdownFol[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownFolContent = this.nextElementSibling;
    if (dropdownFolContent.style.display === "block") {
      dropdownFolContent.style.display = "none";
    } else {
      dropdownFolContent.style.display = "block";
    }
  });
}

    </script>

</body>
</html>