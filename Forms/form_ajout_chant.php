<?php

$conn=mysqli_connect("localhost","root","root","FIND");

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}

?>



<?php


    $host = 'localhost';
    $dbname = 'FIND';
    $username = 'root';
    $password = 'root';
    
 
  try {
  
    //$conn = new PDO($host;$dbname, $username, $password);
    $pdo = new PDO('mysql:host=localhost;dbname=FIND', 'root', 'root', array(PDO::ATTR_ERRMODE =>
PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


   // echo "Connecté à $dbname sur $host avec succès.";

    
    
  } catch (PDOException $e) {
  
    die("Impossible de se connecter à la base de données $dbname :" . $e->getMessage());
  }



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'informations dans FIND</title>
    <link rel="stylesheet" media="screen" href="style.css">
</head>

<header>
<a href="index.php"><img src="../Logos/Logo512.png" alt="logo512" id="logo"></a>
</header>

<nav>
    <ul>
        <li><a href="form_ajout_ville.php">Ajout ville</a>
        </li>

        <li><a href="form_ajout_corporation.php">Ajout corporation</a>
        </li>

        <li><a href="form_ajout_informations.php">Ajout information</a>
        </li>

        <li><a href="form_ajout_chant.php">Ajout chant</a>
        </li>

        <li><a href="form_ajout_comite.php">Ajout comité</a>
        </li>
    </ul>
  </nav> 






  <?php
 
   if(isset($_POST['submit'])) {
    
     if(!empty($_POST['id_corporation']) && !empty($_POST['nom_chant']) && !empty($_POST['texte_chant']) && !empty($_POST['auteur'])){
      
      $id_corporation = $_POST['id_corporation'];
      $nom_chant = $_POST['nom_chant'];
      $texte_chant = nl2br($_POST['texte_chant']);
      $auteur = $_POST['auteur'];


      $query = "INSERT INTO chants_corporations(id_corporation, nom_chant, texte_chant, auteur) VALUES('$id_corporation' , '$nom_chant' , '$texte_chant' , '$auteur')";

      $run = mysqli_query($conn, $query) or die(mysqli_error());

      if($run){
        echo "Chant ajouté";
      }
      else{
        echo "ERREUR";
      }

     }
     else{
  echo "Il manque des infos";
 }
}
 
 ?>
 
 <form method="post"> 

 <!-- ID CORPORATION -->
<label>Id Corporation:</label><br/>
 <input type="text" name="id_corporation"><br/><br>

<!-- NOM CHANT -->
<label>Nom Chant:</label><br/>
 <input type="text" name="nom_chant"><br/><br>

<!-- TEXTE CHANT -->
<label>Texte chant:</label><br/>
 <textarea name="texte_chant"></textarea><br/><br>
  
<!-- AUTEUR -->
<label>Auteur:</label><br/>
 <input type="text" name="auteur"><br/><br>

 <!-- BOUTON SUBMIT -->
 <button type="submit" name="submit">Ajouter</button>
 
 </form>

 
