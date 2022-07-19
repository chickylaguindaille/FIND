<?php
      include("localisation_folklore/fonctions/connexionbdd.php");
?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIND</title>
    <link rel="shortcut icon" href="./Logos/Logo128.png">
    <link rel="stylesheet" media="screen" href="style.css">
    <!-- PWA -->
    <link rel="manifest" href="manifest.json">
    <link rel="apple-touch-icon" href="./Logos/Logo96.png">
    <link rel="apple-touch-startup-image" href="./Logos/Logo96.png">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="black">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="viewport" content="width=device-width, user-scalable=no">

</head>
<body>

    <header>
      <section id="headerBase">
        <img src="./boutons/menu-lateral.png" class="openbtn" onclick="openNav()" alt="menu" id="menu">
        <img src="./Logos/Logo512.png" alt="logo512" id="logo">
        <img src="./boutons/recherche.png" alt="recherche" id="recherche" class="openbtn" onclick="myFunction(), closeNav()">
      </section>








<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.12.4.js'></script>  
      <!-- RECHERCHE -->
      <form id="searchForm" class="searchForm" method="GET">
        <div class="container-1">
            <span class="icon"><i class="fa fa-search"></i></span>
            <div class="searchInput"><input type="text" name="s" placeholder="Chercher folklore" id="searchInput" autocomplete="off"></div>
        </div>
        <div class="closebtnSearchForm"><img onclick="myFunction()" name="closebtnSearchForm" id="closebtnSearchForm" class="closebtnImg" src="Logos/closeBtnSearchForm.png"></div>
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
              url: 'localisation_folklore/fonctions/recherche_globale.php',
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
      include("sidebar1.php");
?>

      
      <!-- HOMEPAGE -->
        <div class="headHomepage">
          <div class="titreHomepage">Folklore <br> Is <br> Not <br> Dead</div>
          <div class="photoHomepage"><img src="Logos/Logo512-nobackground.png"></div>
        </div>

      <!-- INPUT -->
      <div class="inputHomePage">
          <select id ="triInputHomePage" name="tri">
            <option value="trier">Trier</option>
            <option value="nom">Nom</option>
            <option value="ville">Ville</option>
        </div>
          </select>
            <input type="text" name="s" placeholder="Chercher folklore ?" id="searchInputHomePage" autocomplete="off">
        </div>
      </div>
      <div id="result-search-global-hp"></div>
      <br><br>
      <?php echo $tri ; ?>



      <script>
  $(document).ready(function(){
    $('#searchInputHomePage').keyup(function(){
      $('#result-search-global-hp').html('');

      var utilisateur = $(this).val();
      var tri = $("#triInputHomePage").val();
      
          $.ajax({
              type: 'GET',
              url: 'localisation_folklore/fonctions/recherche_globale_hp.php',
              data: {user: encodeURIComponent(utilisateur), tri: encodeURIComponent(tri)},
              success: function(data){
                if(data != ""){
                    $('#result-search-global-hp').append(data);
                    console.log(utilisateur);
                    console.log(tri);
                    
              }
              else{
                    document.getElementById('result-search-global-hp').innerHTML = "<div>Aucun résultat</div>"
              }
              }

          })
    });
  });
  </script>








      <!-- RESUME HOMEPAGE -->
        <div class="resumeHomepage">
          FIND est une initiative ayant pour but la découverte, le partage et la sauvegarde du folklore étudiant?<br><br>
Vous pourrez y retrouver un grand nombre d’associations étudiantes folkloriques avec des informations tel leur fondation, leurs particularités, leurs goodies et bien d’autres choses !
        </div><br><br>

        <div class="collaborations">
          <h1>Collaborations</h1>
          <ul type="circle">
              <li>Estudiantinerie</li>
              <li>Musée Belge des Traditions Estudiantines</li>
          </ul>

          <div class="photosCollab"><img id="ESTU" src="Logos/Estudiantinerie.jpg"><img id="MBTE" src="Logos/MBTE.png"></div>
        </div><br>

        <div class="technologies">
          <h1>Technologies</h1>
          <div class="logoTechnologies">
              <img src="Logos/html.png">
              <img src="Logos/css.png">
              <img src="Logos/js.png">
              <img src="Logos/php.png">
              <img src="Logos/sql.png">
          </div>
          <div class="responsive"><img src="Logos/responsive.png"></div>
        </div><br>

        <div class="contact">
          <h1>Contact</h1>
          <a class="mail" href="mailto:geti.leroy@gmail.com">Envoyer un mail !</a>
        </div><br><br>


    </main>



</body>
</html>