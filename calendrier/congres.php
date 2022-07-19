<?php
      include("localisation_folklore/fonctions/connexionbdd.php");
?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIND</title>
    <link rel="shortcut icon" href="../Logos/Logo128.png">
    <link rel="stylesheet" media="screen" href="../style.css">
    <!-- PWA -->
    <link rel="manifest" href="manifest.json">
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
      include("sidebar3.php");
?>









    <div class="responsiveCal">
    <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=2&bgcolor=%23ffffff&ctz=Europe%2FParis&showTabs=0&showPrint=0&showCalendars=0&showTz=0&src=OGlsaHByMmcxNHBlbnFqMzUzY2xxb2hzdW9AZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&color=%23D81B60" style="border:solid 1px #777" class="calendrierCongrès" frameborder="0" scrolling="no"></iframe>
    </div>

<style>
        /* EVENEMENTS */

        .calendrierCongrès{
          width: 90%;
          height: 30em;
          margin-top: 5%;
        }

        main{
          text-align: center;
        }

</style>











      
      

    </main>



</body>
</html>