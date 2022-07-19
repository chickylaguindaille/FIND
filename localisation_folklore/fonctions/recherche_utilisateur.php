<?php

 include("connexionbdd.php");

?>
<?php $id = /*(int)*/ $_GET['id']; ?>





<?php
if(isset($_GET['user'])){;

$user = (String) trim($_GET['user']);





$all = $pdo->query('SELECT DISTINCT ville, photo_ville, avance FROM villes WHERE pays = "'.$id.'" ORDER BY ville');
if(isset($_GET['user']) AND !empty($_GET['user']))
 {
    $recherche = htmlspecialchars($_GET['s']);
    $all = $pdo->query('SELECT DISTINCT ville, photo_ville, avance  FROM villes WHERE ville LIKE "%'. $user .'%" AND pays = "'.$id.'" ORDER BY ville ');
}





            if($all->rowCount() > 0){
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>
            



<?php
            if (substr($prenom['ville'],0,1) > $fLettre)
    {
        $fLettre = substr($prenom['ville'], 0, 1);
        echo '<h1 class="fLettre">'.$fLettre.'</h1>';
    }
?>



            
            <div class="uneVille">
            <a href="../localisation_folklore/filiere.php?id=<?= $prenom['ville']?>"> 
              <?php 
              echo'<img class="blasonUneVille" src="../Photos/posts_images_profil_ville/' .$prenom['photo_ville'].'">'. '<div>' .$prenom['ville']. '</div><span class="'.$prenom['avance'].'"></span>' ?>
              </a></div><?php } } 
              else{
                  ?>
                  <p class="aucunResultat"> Aucun resultat </p>
              <php } ?>
          
    <?php   } } 
    ?>