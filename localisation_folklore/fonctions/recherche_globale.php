<?php
      include("connexionbdd.php");
?>






<?php
if(isset($_GET['user'])){;

$user = (String) trim($_GET['user']);





$all= ' ';
if(isset($_GET['user']) AND !empty($_GET['user']))
 {
    $recherche = htmlspecialchars($_GET['s']);
    $all = $pdo->query('SELECT ville, photo_ville  FROM villes WHERE ville LIKE "%'. $user .'%" ORDER BY ville LIMIT 3');
}






echo '<div class="rechercheGlobaleAll">';
if($all->rowCount() > 0){
  while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>



<div class="rechercheGlobale">
<a href="/FIND/localisation_folklore/filiere.php?id=<?= $prenom['ville']?>"> 
<?php 
echo '<img class="blasonUneVille" src="/FIND/Photos/posts_images_profil_ville/' .$prenom['photo_ville'].'">'. '<div class="nomVilleSearchGlobal">' .$prenom['ville']. '</div>' ?>
</a></div><?php } }  
// echo '</div>';
else{
?>
<p class="rechercheGlobaleAucunResultat"> <a>Aucun resultat</a> </p>
<php } ?>

<?php   } } 
?>



<?php 
if($all->rowCount() < 1){

 }?>