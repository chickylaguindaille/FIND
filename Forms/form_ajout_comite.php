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
    
     if(!empty($_POST['id_corporation']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['surnom']) && !empty($_POST['fonction']) && !empty($_POST['date_debut']) && !empty($_POST['date_fin'])){
      
      $id_corporation = $_POST['id_corporation'];
      $prenom = $_POST['prenom'];
      $nom = $_POST['nom'];
      $surnom = $_POST['surnom'];
      $fonction = $_POST['fonction'];
      $date_debut = $_POST['date_debut'];
      $date_fin = $_POST['date_fin'];

      $query = "INSERT INTO historique_comite(id_corporation,prenom,nom,surnom,fonction,date_debut,date_fin) VALUES('$id_corporation' , '$prenom' , '$nom' , '$surnom' , '$fonction' , '$date_debut' , '$date_fin')";

      $run = mysqli_query($conn, $query) or die(mysqli_error());

      if($run){
        echo "Personne ajoutée";
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
 <label > Id corporation:</label><br/>
 <input type="text" name="id_corporation"><br><br>
 
 <label>Prenom:</label><br/>
 <input type="text" name="prenom"><br/><br>

 <label>Nom:</label><br/>
 <input type="text" name="nom"><br/><br>

 <label>Surnom:</label><br/>
 <input type="text" name="surnom"><br/><br>

 <label> Fonction :</label><br/>
 <select name="fonction">
    <option value="GM">GM</option>
    <option value="GC">GC</option>
</select><br><br>

 <label>Date début:</label><br/>
 <input type="text" name="date_debut"><br/><br>

 <label>Date fin:</label><br/>
 <input type="text" name="date_fin"><br/><br>
 
 <button type="submit" name="submit">Ajouter</button>
 
 </form>

 