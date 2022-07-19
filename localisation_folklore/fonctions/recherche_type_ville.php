<?php

 include("connexionbdd.php");

?>
<?php $id = /*(int)*/ $_GET['id']; 
      $id2 = /*(int)*/ $_GET['id2']; 
?>





<?php
if(isset($_GET['user'])){;

$user = (String) trim($_GET['user']);





$all = $pdo->query('SELECT DISTINCT nom, photo_profil_corpo, avance FROM corporations WHERE type_corporation = "'.$id.'" AND ville = "'.$id2.'" ORDER BY nom');
if(isset($_GET['user']) AND !empty($_GET['user']))
 {
    $recherche = htmlspecialchars($_GET['s']);
    $all = $pdo->query('SELECT DISTINCT nom, photo_profil_corpo, avance FROM corporations WHERE nom LIKE "%'. $user .'%" AND type_corporation = "'.$id.'" AND ville = "'.$id2.'" ORDER BY nom');
}





            if($all->rowCount() > 0){
                    while($prenom = $all->fetch(PDO::FETCH_ASSOC))  {?>



<?php

            if (substr($prenom['nom'],0,1) > $fLettre)
    {
        $fLettre = substr($prenom['nom'], 0, 1);
        echo '<h1 class="fLettre">'.$fLettre.'</h1>';
    }
?>




            <div class="uneVille">
            <a href="../localisation_folklore/corporation.php?id=<?= $prenom['nom']?>"> 
              <?php echo '<img class="blasonUneVille" src="../Photos/posts_images_profil/' .$prenom['photo_profil_corpo'].'">'. '<div>' .$prenom['nom']. '</div><span class="'.$prenom['avance'].'"></span>' ?>
              </a></div><?php } }
              else{
                  ?>
                  <div class="aucunResultat"> Aucun résultat </div>
              <php } ?>
          
    <?php   }  }
    else{
      echo "";
    }   ?>
</div>