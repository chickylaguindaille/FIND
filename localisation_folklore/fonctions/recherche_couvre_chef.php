<?php
      include("connexionbdd.php");
?>


<?php $id = /*(int)*/ $_GET['id']; ?>



<?php
if(isset($_GET['user'])){;

$user = (String) trim($_GET['user']);






$allcerclecalotte = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE type_corporation= "cercle_calotte" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');
$allregiocalotte = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE type_corporation= "regionale_calotte" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');
$allasso = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE type_corporation= "association_falucharde" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');
$allfiliere = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE type_corporation= "filiere_falucharde" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');
$allcorporation = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE type_corporation= "corporation" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');
$allcercle_penne = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE type_corporation= "cercle_penne" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');
$allregio_penne = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE type_corporation= "regionale_penne" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');
$allcercle = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE type_corporation= "cercle" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');
$allregionale = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE type_corporation= "regionale" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');
$allordre = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE type_corporation= "ordre" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');
$allguilde = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE type_corporation= "guilde" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');

if(isset($_GET['user']) AND !empty($_GET['user']))
 {
    $recherche = htmlspecialchars($_GET['s']);

    $allcerclecalotte = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE ville LIKE "%'. $user .'%" AND  type_corporation= "cercle_calotte" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');
    $allregiocalotte = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE ville LIKE "%'. $user .'%" AND  type_corporation= "regionale_calotte" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');
    $allasso = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE ville LIKE "%'. $user .'%" AND  type_corporation= "association_falucharde" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');
    $allfiliere = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE ville LIKE "%'. $user .'%" AND  type_corporation= "filiere_falucharde" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');
    $allcorporation = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE ville LIKE "%'. $user .'%" AND  type_corporation= "corporation" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');
    $allcercle_penne = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE ville LIKE "%'. $user .'%" AND  type_corporation= "cercle_penne" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');
    $allregio_penne = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE ville LIKE "%'. $user .'%" AND  type_corporation= "regionale_penne" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');
    $allcercle = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE ville LIKE "%'. $user .'%" AND  type_corporation= "cercle" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');
    $allregionale = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE ville LIKE "%'. $user .'%" AND  type_corporation= "regionale" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');
    $allordre = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE ville LIKE "%'. $user .'%" AND  type_corporation= "ordre" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');
    $allguilde = $pdo->query('SELECT DISTINCT nom, ville, photo_profil_corpo,type_corporation, avance FROM corporations WHERE ville LIKE "%'. $user .'%" AND  type_corporation= "guilde" AND id_corporation IN ( SELECT id_corporation FROM couvre_chef WHERE '.$id.' = "oui") ORDER BY nom');


}
}?>








<!-- CERCLE CALOTTE -->
<?php
if($allcerclecalotte->rowCount() > 0){
  echo '<div class="enTeteCorpo">Cercles Calotte</div>';
                    while($prenom = $allcerclecalotte->fetch(PDO::FETCH_ASSOC))  {

                      $allville = $pdo->query('SELECT photo_ville, avance FROM villes WHERE ville IN ( SELECT ville FROM corporations WHERE nom = "'.$prenom['nom'].'")');
                      $nom = $allville->fetch(PDO::FETCH_ASSOC);
                      
                      ?><div class="uneCorpo">
            <a href="../localisation_folklore/ville_couvre_chef.php?id=<?= $prenom['type_corporation']?>&id2=<?= $prenom['ville']?>"> 
                      <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil_ville/' .$nom['photo_ville'].'">'. '<div>' .$prenom['ville'].  '</div><span class="'.$prenom['avance'].'"></span>'        
                      ?></a></div>
                      <?php   } } 
    $allall = $allcerclecalotte ->rowCount();?>

<!-- REGIONALES CALOTTE -->
<?php
if($allregiocalotte->rowCount() > 0){
  echo '<div class="enTeteCorpo">Régionales Calotte</div>';
                    while($prenom = $allregiocalotte->fetch(PDO::FETCH_ASSOC))  {

                      $allville = $pdo->query('SELECT photo_ville, avance FROM villes WHERE ville IN ( SELECT ville FROM corporations WHERE nom = "'.$prenom['nom'].'")');
                      $nom = $allville->fetch(PDO::FETCH_ASSOC);
                      
                      ?><div class="uneCorpo">
            <a href="../localisation_folklore/ville_couvre_chef.php?id=<?= $prenom['type_corporation']?>&id2=<?= $prenom['ville']?>"> 
                      <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil_ville/' .$nom['photo_ville'].'">'. '<div>' .$prenom['ville'].  '</div><span class="'.$prenom['avance'].'"></span>'       
                      ?></a></div>
                      <?php   } } 
    $allall = $allall + $allregiocalotte ->rowCount();?>

<!-- ASSOCIATIONS -->
<?php
if($allasso->rowCount() > 0){
  echo '<div class="enTeteCorpo">Associations</div>';
                    while($prenom = $allasso->fetch(PDO::FETCH_ASSOC))  {

                      $allville = $pdo->query('SELECT photo_ville, avance FROM villes WHERE ville IN ( SELECT ville FROM corporations WHERE nom = "'.$prenom['nom'].'")');
                      $nom = $allville->fetch(PDO::FETCH_ASSOC);
                      
                      ?><div class="uneCorpo">
            <a href="../localisation_folklore/ville_couvre_chef.php?id=<?= $prenom['type_corporation']?>&id2=<?= $prenom['ville']?>"> 
                      <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil_ville/' .$nom['photo_ville'].'">'. '<div>' .$prenom['ville'].  '</div><span class="'.$prenom['avance'].'"></span>'        
                      ?></a></div>
                      <?php   } } 
    $allall = $allall + $allasso->rowCount();?>

<!-- FILIERES FALUCHARDES -->
<?php
if($allfiliere->rowCount() > 0){
  echo '<div class="enTeteCorpo">Filières Faluchardes</div>';
                    while($prenom = $allfiliere->fetch(PDO::FETCH_ASSOC))  {

                      $allville = $pdo->query('SELECT photo_ville, avance FROM villes WHERE ville IN ( SELECT ville FROM corporations WHERE nom = "'.$prenom['nom'].'")');
                      $nom = $allville->fetch(PDO::FETCH_ASSOC);
                      
                      ?><div class="uneCorpo">
            <a href="../localisation_folklore/ville_couvre_chef.php?id=<?= $prenom['type_corporation']?>&id2=<?= $prenom['ville']?>"> 
                      <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil_ville/' .$nom['photo_ville'].'">'. '<div>' .$prenom['ville'].  '</div><span class="'.$prenom['avance'].'"></span>'        
                      ?></a></div>
                      <?php   } } 
    $allall = $allall + $allfiliere->rowCount();?>

<!-- CORPORATIONS -->
<?php
if($allcorporation->rowCount() > 0){
  echo '<div class="enTeteCorpo">Corporations</div>';
                    while($prenom = $allcorporation->fetch(PDO::FETCH_ASSOC))  {

                      $allville = $pdo->query('SELECT photo_ville, avance FROM villes WHERE ville IN ( SELECT ville FROM corporations WHERE nom = "'.$prenom['nom'].'")');
                      $nom = $allville->fetch(PDO::FETCH_ASSOC);
                      
                      ?><div class="uneCorpo">
            <a href="../localisation_folklore/ville_couvre_chef.php?id=<?= $prenom['type_corporation']?>&id2=<?= $prenom['ville']?>"> 
                      <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil_ville/' .$nom['photo_ville'].'">'. '<div>' .$prenom['ville'].  '</div><span class="'.$prenom['avance'].'"></span>'        
                      ?></a></div>
                      <?php   } } 
    $allall = $allall + $allcorporation->rowCount();?>

    <!-- CERCLE PENNE -->
<?php
if($allcercle_penne->rowCount() > 0){
  echo '<div class="enTeteCorpo">Cercles Penné</div>';
                    while($prenom = $allcercle_penne->fetch(PDO::FETCH_ASSOC))  {

                      $allville = $pdo->query('SELECT photo_ville, avance FROM villes WHERE ville IN ( SELECT ville FROM corporations WHERE nom = "'.$prenom['nom'].'")');
                      $nom = $allville->fetch(PDO::FETCH_ASSOC);
                      
                      ?><div class="uneCorpo">
            <a href="../localisation_folklore/ville_couvre_chef.php?id=<?= $prenom['type_corporation']?>&id2=<?= $prenom['ville']?>"> 
                      <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil_ville/' .$nom['photo_ville'].'">'. '<div>' .$prenom['ville'].  '</div><span class="'.$prenom['avance'].'"></span>'        
                      ?></a></div>
                      <?php   } } 
    $allall = $allall + $allcercle_penne->rowCount();?>

    <!-- REGIO PENNE -->
<?php
if($allregio_penne->rowCount() > 0){
  echo '<div class="enTeteCorpo">Régionales Penné</div>';
                    while($prenom = $allregio_penne->fetch(PDO::FETCH_ASSOC))  {

                      $allville = $pdo->query('SELECT photo_ville, avance FROM villes WHERE ville IN ( SELECT ville FROM corporations WHERE nom = "'.$prenom['nom'].'")');
                      $nom = $allville->fetch(PDO::FETCH_ASSOC);
                      
                      ?><div class="uneCorpo">
            <a href="../localisation_folklore/ville_couvre_chef.php?id=<?= $prenom['type_corporation']?>&id2=<?= $prenom['ville']?>"> 
                      <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil_ville/' .$nom['photo_ville'].'">'. '<div>' .$prenom['ville'].  '</div><span class="'.$prenom['avance'].'"></span>'        
                      ?></a></div>
                      <?php   } } 
    $allall = $allall + $allregio_penne->rowCount();?>

        <!-- CERCLE -->
<?php
if($allcercle->rowCount() > 0){
  echo '<div class="enTeteCorpo">Cercle</div>';
                    while($prenom = $allcercle->fetch(PDO::FETCH_ASSOC))  {

                      $allville = $pdo->query('SELECT photo_ville, avance FROM villes WHERE ville IN ( SELECT ville FROM corporations WHERE nom = "'.$prenom['nom'].'")');
                      $nom = $allville->fetch(PDO::FETCH_ASSOC);
                      
                      ?><div class="uneCorpo">
            <a href="../localisation_folklore/ville_couvre_chef.php?id=<?= $prenom['type_corporation']?>&id2=<?= $prenom['ville']?>"> 
                      <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil_ville/' .$nom['photo_ville'].'">'. '<div>' .$prenom['ville'].  '</div><span class="'.$prenom['avance'].'"></span>'        
                      ?></a></div>
                      <?php   } } 
    $allall = $allall + $allcercle->rowCount();?>

            <!-- REGIONALE -->
<?php
if($allregionale->rowCount() > 0){
  echo '<div class="enTeteCorpo">Cercle</div>';
                    while($prenom = $allregionale->fetch(PDO::FETCH_ASSOC))  {

                      $allville = $pdo->query('SELECT photo_ville, avance FROM villes WHERE ville IN ( SELECT ville FROM corporations WHERE nom = "'.$prenom['nom'].'")');
                      $nom = $allville->fetch(PDO::FETCH_ASSOC);
                      
                      ?><div class="uneCorpo">
            <a href="../localisation_folklore/ville_couvre_chef.php?id=<?= $prenom['type_corporation']?>&id2=<?= $prenom['ville']?>"> 
                      <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil_ville/' .$nom['photo_ville'].'">'. '<div>' .$prenom['ville'].  '</div><span class="'.$prenom['avance'].'"></span>'        
                      ?></a></div>
                      <?php   } } 
    $allall = $allall + $allregionale->rowCount();?>

                <!-- ORDRE -->
<?php
if($allordre->rowCount() > 0){
  echo '<div class="enTeteCorpo">Ordres</div>';
                    while($prenom = $allordre->fetch(PDO::FETCH_ASSOC))  {

                      $allville = $pdo->query('SELECT photo_ville, avance FROM villes WHERE ville IN ( SELECT ville FROM corporations WHERE nom = "'.$prenom['nom'].'")');
                      $nom = $allville->fetch(PDO::FETCH_ASSOC);
                      
                      ?><div class="uneCorpo">
            <a href="../localisation_folklore/ville_couvre_chef.php?id=<?= $prenom['type_corporation']?>&id2=<?= $prenom['ville']?>"> 
                      <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil_ville/' .$nom['photo_ville'].'">'. '<div>' .$prenom['ville'].  '</div><span class="'.$prenom['avance'].'"></span>'        
                      ?></a></div>
                      <?php   } } 
    $allall = $allall + $allordre->rowCount();?>

<!-- GUILDE -->
<?php
                      $allall = $allall + $allguilde->rowCount();
if($allguilde->rowCount() > 0){
  echo '<div class="enTeteCorpo">Guildes</div>';
                    while($prenom = $allguilde->fetch(PDO::FETCH_ASSOC))  {

                      $allville = $pdo->query('SELECT photo_ville, avance FROM villes WHERE ville IN ( SELECT ville FROM corporations WHERE nom = "'.$prenom['nom'].'")');
                      $nom = $allville->fetch(PDO::FETCH_ASSOC);

                      ?><div class="uneCorpo">
            <a href="../localisation_folklore/ville_couvre_chef.php?id=<?= $prenom['type_corporation']?>&id2=<?= $prenom['ville']?>"> 
                      <?php echo '<img class="blasonUneCorpo" src="../Photos/posts_images_profil_ville/' .$nom['photo_ville'].'">'. '<div>' .$prenom['ville'].  '</div><span class="'.$prenom['avance'].'"></span>'          
                      ?></a></div>
                      <?php   } } 

                                    else if($allall < 1){
                                      ?>
                                      <p class="aucunResultat"> Aucun resultat </p>
                                  <?php } ?>


