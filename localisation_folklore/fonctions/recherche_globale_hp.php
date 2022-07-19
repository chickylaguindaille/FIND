<?php
      include("connexionbdd.php");
?>


<?php
$all= ' ';
if(isset($_GET['user']) AND !empty($_GET['user']))
 {
    $recherche = htmlspecialchars($_GET['s']);
    $all = $pdo->query('SELECT ville, photo_ville  FROM villes WHERE ville LIKE "%'. $user .'%" ORDER BY ville LIMIT 3');
}?>







<?php
if(isset($_GET['user'])){;

$user = (String) trim($_GET['user']);
$tri = (String) trim($_GET['tri']);

if($tri == "trier"){
 ?> <p class="rechercheGlobaleAucunResultatHP"> <a>Choisir par quoi trier</a> </p> <?php
  $tri = NULL;








}else if($tri == "nom"){

  $all= ' ';
  if(isset($_GET['user']) AND !empty($_GET['user']))
   {
      $recherche = htmlspecialchars($_GET['s']);
      $all = $pdo->query('SELECT nom, abreviation, photo_profil_corpo  FROM corporations WHERE nom LIKE "%'. $user .'%" OR abreviation LIKE "%'. $user .'%" ORDER BY nom LIMIT 3');
  }

  echo '<div class="rechercheGlobaleAllHP">';
  if($all->rowCount() > 0){
    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>
  
  
  
  <div class="rechercheGlobaleHP">
  <a href="/FIND/localisation_folklore/corporation.php?id=<?= $prenom['nom']?>"> 
  <?php 
  echo '<img class="blasonUneVille" src="/FIND/Photos/posts_images_profil/' .$prenom['photo_profil_corpo'].'">'. '<div class="nomVilleSearchGlobal">' .$prenom['nom']. '</div>' ?>
  </a></div><?php } }  
  // echo '</div>';
  else{
  ?>
  <p class="rechercheGlobaleAucunResultat"> <a>Aucun resultat</a> </p>
  <php } ?>
  
  <?php   } 











}else if($tri == "ville"){

  $all= ' ';
  if(isset($_GET['user']) AND !empty($_GET['user']))
   {
      $recherche = htmlspecialchars($_GET['s']);
      $all = $pdo->query('SELECT ville, photo_ville  FROM villes WHERE ville LIKE "%'. $user .'%" ORDER BY ville LIMIT 3');
  }

  echo '<div class="rechercheGlobaleAllHP">';
  if($all->rowCount() > 0){
    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>
  
  
  
  <div class="rechercheGlobaleHP">
  <a href="/FIND/localisation_folklore/filiere.php?id=<?= $prenom['ville']?>"> 
  <?php 
  echo '<img class="blasonUneVille" src="/FIND/Photos/posts_images_profil_ville/' .$prenom['photo_ville'].'">'. '<div class="nomVilleSearchGlobal">' .$prenom['ville']. '</div>' ?>
  </a></div><?php } }  
  // echo '</div>';
  else{
  ?>
  <p class="rechercheGlobaleAucunResultatHP"> <a>Aucun resultat</a> </p>
  <php } ?>
  
  <?php   } } 
  ?>
  
  
  
  <?php 
  if($all->rowCount() < 1){
  
   }
}?>








