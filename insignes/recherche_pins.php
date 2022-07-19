<?php

 include("../localisation_folklore/fonctions/connexionbdd.php");

?>
<?php $id = /*(int)*/ $_GET['id']; ?>





<?php
if(isset($_GET['user'])){;

$user = (String) trim($_GET['user']);






$all = $pdo->query('SELECT DISTINCT discipline, matiere, couleur FROM couleur_etude WHERE pays = "'.$id.'" ORDER BY discipline');
$allbac = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "'.$id.'" AND type = "bac" ORDER BY nom');
$allhumanite = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "'.$id.'" AND type = "humanite" ORDER BY nom');
$alldiscipline = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "'.$id.'" AND type = "discipline" ORDER BY nom');
$allcursus = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "'.$id.'" AND type = "cursus" ORDER BY nom');
$allsymbole = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "'.$id.'" AND type = "symbole" ORDER BY nom');
$allinsignepartenaire = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "'.$id.'" AND type = "decerne_partenaire" ORDER BY nom');
$allinsignecroix = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "'.$id.'" AND type = "decerne_croix" ORDER BY nom');
$alldecerne = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "'.$id.'" AND type = "decerne" ORDER BY nom');
$allasso = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "'.$id.'" AND type = "asso" ORDER BY nom');
$allpotager = $pdo->query('SELECT DISTINCT nom, signification FROM pins WHERE pays = "'.$id.'" AND type = "potager" ORDER BY nom');

if(isset($_GET['user']) AND !empty($_GET['user']))
 {
    $recherche = htmlspecialchars($_GET['s']);
    $all = $pdo->query('SELECT DISTINCT discipline, matiere, couleur  FROM couleur_etude WHERE discipline LIKE "%'. $user .'%" AND pays = "'.$id.'" ORDER BY discipline ');
    $allbac = $pdo->query('SELECT DISTINCT nom, signification  FROM pins WHERE type="bac" AND nom  LIKE "%'. $user .'%" AND pays = "'.$id.'" ORDER BY nom ');
    $allhumanite = $pdo->query('SELECT DISTINCT nom, signification  FROM pins WHERE type="humanite" AND nom  LIKE "%'. $user .'%" AND pays = "'.$id.'" ORDER BY nom ');
    $alldiscipline = $pdo->query('SELECT DISTINCT nom, signification  FROM pins WHERE type="discipline" AND nom  LIKE "%'. $user .'%" AND pays = "'.$id.'" ORDER BY nom ');
    $allcursus = $pdo->query('SELECT DISTINCT nom, signification  FROM pins WHERE type="cursus" AND nom  LIKE "%'. $user .'%" AND pays = "'.$id.'" ORDER BY nom ');
    $allsymbole = $pdo->query('SELECT DISTINCT nom, signification  FROM pins WHERE type="symbole" AND nom  LIKE "%'. $user .'%" AND pays = "'.$id.'" ORDER BY nom ');
    $allinsignepartenaire = $pdo->query('SELECT DISTINCT nom, signification  FROM pins WHERE type="decerne_partenaire" AND nom  LIKE "%'. $user .'%" AND pays = "'.$id.'" ORDER BY nom ');
    $allinsignecroix = $pdo->query('SELECT DISTINCT nom, signification  FROM pins WHERE type="decerne_croix" AND nom  LIKE "%'. $user .'%" AND pays = "'.$id.'" ORDER BY nom ');
    $alldecerne = $pdo->query('SELECT DISTINCT nom, signification  FROM pins WHERE type="decerne" AND nom  LIKE "%'. $user .'%" AND pays = "'.$id.'" ORDER BY nom ');
    $allasso = $pdo->query('SELECT DISTINCT nom, signification  FROM pins WHERE type="asso" AND nom  LIKE "%'. $user .'%" AND pays = "'.$id.'" ORDER BY nom ');
    $allpotager = $pdo->query('SELECT DISTINCT nom, signification  FROM pins WHERE type="potager" AND nom  LIKE "%'. $user .'%" AND pays = "'.$id.'" ORDER BY nom ');
}
?>



<?php 

    echo '<table class="tablePins">';?>
<div class="touteVille" id="touteVille1">

    <?php

            if($all->rowCount() > 0){
                ?><br><h1 class="titrePartie">Couleur des disciplines</h1>
                  <?php  while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>
            <div class="unPins">
            <!-- <a href="filiere.php?id=<?= $prenom['ville']?>">  -->
              <?php echo '<tr> <td> '.$prenom['discipline'].'</td><td> '.$prenom['matiere'].' '.$prenom['couleur'].'</td></tr> '?>
              </div><?php } echo '</table>';}

              else{
                  ?>
                  <!-- <div class="aucunResultat"> Aucun résultat </div> -->
              <php } ?>
          
    <?php   }  }
    else{
      echo "test";
    }   ?>
</div>






<?php 
    echo '<table class="tablePins">';?>
<div class="touteVille" id="touteVille1">

    <?php

            if($allbac->rowCount() > 0){
                ?><br><h1 class="titrePartie">Baccalauréat</h1>
                  <?php  while($prenom = $allbac->fetch(PDO::FETCH_ASSOC))  {?>
            <div class="unPins">
            <!-- <a href="filiere.php?id=<?= $prenom['ville']?>">  -->
              <?php echo '<tr> <td> '.$prenom['nom'].'</td><td> '.$prenom['signification'].'</td></tr> '?>
              </div><?php } echo '</table>';}

              else{
                  ?>
                  <!-- <div class="aucunResultat"> Aucun résultat </div> -->
              <php } ?>
          
    <?php   }  ?>

    <?php 
    echo '<table class="tablePins">';?>
<div class="touteVille" id="touteVille1">

    <?php

            if($allhumanite->rowCount() > 0){
                ?><br><h1 class="titrePartie">Humanités</h1>
                  <?php  while($prenom = $allhumanite->fetch(PDO::FETCH_ASSOC))  {?>
            <div class="unPins">
            <!-- <a href="filiere.php?id=<?= $prenom['ville']?>">  -->
              <?php echo '<tr> <td> '.$prenom['nom'].'</td><td> '.$prenom['signification'].'</td></tr> '?>
              </div><?php } echo '</table>';}

              else{
                  ?>
                  <!-- <div class="aucunResultat"> Aucun résultat </div> -->
              <php } ?>
          
    <?php   }  ?>

    <?php 
    echo '<table class="tablePins">';?>
<div class="touteVille" id="touteVille1">

    <?php

            if($alldiscipline->rowCount() > 0){
                ?><br><h1 class="titrePartie">Emblèmes de la discipline</h1>
                  <?php  while($prenom = $alldiscipline->fetch(PDO::FETCH_ASSOC))  {?>
            <div class="unPins">
            <!-- <a href="filiere.php?id=<?= $prenom['ville']?>">  -->
              <?php echo '<tr> <td> '.$prenom['nom'].'</td><td> '.$prenom['signification'].'</td></tr> '?>
              </div><?php } echo '</table>';}

              else{
                  ?>
                  <!-- <div class="aucunResultat"> Aucun résultat </div> -->
              <php } ?>
          
    <?php   }  ?>

    


    <?php 
    echo '<table class="tablePins">';?>
<div class="touteVille" id="touteVille1">

    <?php

            if($allcursus->rowCount() > 0){
                ?><br><h1 class="titrePartie">Cursus</h1>
                  <?php  while($prenom = $allcursus->fetch(PDO::FETCH_ASSOC))  {?>
            <div class="unPins">
            <!-- <a href="filiere.php?id=<?= $prenom['ville']?>">  -->
              <?php echo '<tr> <td> '.$prenom['nom'].'</td><td> '.$prenom['signification'].'</td></tr> '?>
              </div><?php } echo '</table>';}

              else{
                  ?>
                  <!-- <div class="aucunResultat"> Aucun résultat </div> -->
              <php } ?>
          
    <?php   }  ?>





    <?php 
    echo '<table class="tablePins">';?>
<div class="touteVille" id="touteVille1">

    <?php

            if($allsymbole->rowCount() > 0){
                ?><br><h1 class="titrePartie">Les symboles</h1>
                  <?php  while($prenom = $allsymbole->fetch(PDO::FETCH_ASSOC))  {?>
            <div class="unPins">
            <!-- <a href="filiere.php?id=<?= $prenom['ville']?>">  -->
              <?php echo '<tr> <td> '.$prenom['nom'].'</td><td> '.$prenom['signification'].'</td></tr> '?>
              </div><?php } echo '</table>';}

              else{
                  ?>
                  <!-- <div class="aucunResultat"> Aucun résultat </div> -->
              <php } ?>
          
    <?php   }  ?>










    <?php 
    echo '<table class="tablePins">';?>
<div class="touteVille" id="touteVille1">

    <?php

            if($allinsignepartenaire->rowCount() > 0){
                ?><br><h1 class="titrePartie">Insignes décernés par le ou la partenaires</h1>
                  <?php  while($prenom = $allinsignepartenaire->fetch(PDO::FETCH_ASSOC))  {?>
            <div class="unPins">
            <!-- <a href="filiere.php?id=<?= $prenom['ville']?>">  -->
              <?php echo '<tr> <td> '.$prenom['nom'].'</td><td> '.$prenom['signification'].'</td></tr> '?>
              </div><?php } echo '</table>';}

              else{
                  ?>
                  <!-- <div class="aucunResultat"> Aucun résultat </div> -->
              <php } ?>
          
    <?php   }  ?>






    <?php 
    echo '<table class="tablePins">';?>
<div class="touteVille" id="touteVille1">

    <?php

            if($allinsignecroix->rowCount() > 0){
                ?><br><h1 class="titrePartie">Insignes décernés par un Grand Maître</h1>
                  <?php  while($prenom = $allinsignecroix->fetch(PDO::FETCH_ASSOC))  {?>
            <div class="unPins">
            <!-- <a href="filiere.php?id=<?= $prenom['ville']?>">  -->
              <?php echo '<tr> <td> '.$prenom['nom'].'</td><td> '.$prenom['signification'].'</td></tr> '?>
              </div><?php } echo '</table>';}

              else{
                  ?>
                  <!-- <div class="aucunResultat"> Aucun résultat </div> -->
              <php } ?>
          
    <?php   }  ?>


    <?php 
    echo '<table class="tablePins">';?>
<div class="touteVille" id="touteVille1">

    <?php

            if($alldecerne->rowCount() > 0){
                ?><br><h1 class="titrePartie">Insignes décernés</h1>
                  <?php  while($prenom = $alldecerne->fetch(PDO::FETCH_ASSOC))  {?>
            <div class="unPins">
            <!-- <a href="filiere.php?id=<?= $prenom['ville']?>">  -->
              <?php echo '<tr> <td> '.$prenom['nom'].'</td><td> '.$prenom['signification'].'</td></tr> '?>
              </div><?php } echo '</table>';}

              else{
                  ?>
                  <!-- <div class="aucunResultat"> Aucun résultat </div> -->
              <php } ?>
          
    <?php   }  ?>







    <?php 
    echo '<table class="tablePins">';?>
<div class="touteVille" id="touteVille1">

    <?php

            if($allasso->rowCount() > 0){
                ?><br><h1 class="titrePartie">Associatif</h1>
                  <?php  while($prenom = $allasso->fetch(PDO::FETCH_ASSOC))  {?>
            <div class="unPins">
            <!-- <a href="filiere.php?id=<?= $prenom['ville']?>">  -->
              <?php echo '<tr> <td> '.$prenom['nom'].'</td><td> '.$prenom['signification'].'</td></tr> '?>
              </div><?php } echo '</table>';}

              else{
                  ?>
                  <!-- <div class="aucunResultat"> Aucun résultat </div> -->
              <php } ?>
          
    <?php   }  ?>






    <?php 
    echo '<table class="tablePins">';?>
<div class="touteVille" id="touteVille1">

    <?php

            if($allpotager->rowCount() > 0){
                ?><br><h1 class="titrePartie">Potager</h1>
                  <?php  while($prenom = $allpotager->fetch(PDO::FETCH_ASSOC))  {?>
            <div class="unPins">
            <!-- <a href="filiere.php?id=<?= $prenom['ville']?>">  -->
              <?php echo '<tr> <td> '.$prenom['nom'].'</td><td> '.$prenom['signification'].'</td></tr> '?>
              </div><?php } echo '</table>';}

              else{
                  ?>
                  <!-- <div class="aucunResultat"> Aucun résultat </div> -->
              <php } ?>
          
    <?php   }  ?>