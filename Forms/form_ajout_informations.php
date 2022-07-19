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
    
     if(!empty($_POST['id_corporation']) && !empty($_POST['type_info']) && !empty($_POST['titre_information']) && !empty($_POST['text_info'])){
      
      $id_corporation = $_POST['id_corporation'];
      $type_info = $_POST['type_info'];
      $titre_information = $_POST['titre_information'];
      $text_info = $_POST['text_info'];
    


      $query = "INSERT INTO infos_corporations(id_corporation,type_info, titre_information, text_info) VALUES('$id_corporation' , '$type_info' , '$titre_information' , '$text_info')";

      $run = mysqli_query($conn, $query) or die(mysqli_error());

      if($run){
        echo "Information ajoutée";
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
 <body>
 <div class="box">
 <form method="post" class="gauche"> 

 <h1>Ajouter Particularité ou Anecdote:</h1><br/>

<!-- ID_CORPORATION -->
<label>Id_corporation:</label><br/>
 <input type="text" name="id_corporation"><br/><br>

<!-- CHOIX TYPE INFO -->
 <label> Type information:</label><br/>
 <select name="type_info">
    <option value="particularite">Particularité</option>
    <option value="anecdote">Anecdote</option>
</select><br><br>

<!-- TITRE INFORMATION -->
 <label>Titre information:</label><br/>
 <input type="text" name="titre_information"><br/><br>

  
<!-- TEXTE INFORMATION -->
 <label>Texte information:</label><br/>
 <input type="text" name="text_info"><br/><br>

 <!-- BOUTON SUBMIT -->
 <button type="submit" name="submit">Ajouter</button>
 
 </form>


























































































 












 












 












 












 












 















 <?php

//CHEMIN :

define("RACINE_SITE", '../FIND/');

//VARIABLE : 

$content = "";

/************************************************************
 * Definition des constantes / tableaux et variables
 *************************************************************/

// Constantes
define('TARGET', '../Photos/posts_images/');    // Repertoire cible
define('MAX_SIZE', 1500000000);    // Taille max en octets du fichier
define('WIDTH_MAX', 10000);    // Largeur max de l'image en pixels
define('HEIGHT_MAX', 10000);    // Hauteur max de l'image en pixels

// Tableaux de donnees
$tabExt = array('jpg', 'gif', 'png', 'jpeg');    // Extensions autorisees
$infosImg = array();

// Variables
$extension = '';
$message = '';
$nomImage = '';
$progress = '';
$type = '';


/************************************************************
 * Creation du repertoire cible si inexistant
 *************************************************************/
if (!is_dir(TARGET)) {
	if (!mkdir(TARGET, 0755)) {
		exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
	}
}

/************************************************************
 * Script d'upload
 *************************************************************/
if (!empty($_POST)) {
	// On verifie si le champ est rempli
	if (!empty($_FILES['fichier']['name'])) {
		// Recuperation de l'extension du fichier
		$extension  = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);

		// On verifie l'extension du fichier
		if (in_array(strtolower($extension), $tabExt)) {
			// On recupere les dimensions du fichier
			$infosImg = getimagesize($_FILES['fichier']['tmp_name']);

			// On verifie le type de l'image
			if ($infosImg[2] >= 1 && $infosImg[2] <= 14) {
				// On verifie les dimensions et taille de l'image
				if (($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['fichier']['tmp_name']) <= MAX_SIZE)) {
					// Parcours du tableau d'erreurs
					if (
						isset($_FILES['fichier']['error'])
						&& UPLOAD_ERR_OK === $_FILES['fichier']['error']
					) {
						// On renomme le fichier
						$nomImage =uniqid().'.jpg';


						// Si c'est OK, on teste l'upload
						if (move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET . $nomImage)) {

							// L'image est uploadé

						} else {
							// Sinon on affiche une erreur systeme
							$message = 'Problème lors de l\'upload !';
						}
					} else {
						$message = 'Une erreur interne a empêché l\'uplaod de l\'image';
					}
				} else {
					// Sinon erreur sur les dimensions et taille de l'image
					$message = 'Erreur dans les dimensions de l\'image !';
				}
			} else {
				// Sinon erreur sur le type de l'image
				$message = 'Le fichier à uploader n\'est pas une image !';
			}
		} else {
			// Sinon on affiche une erreur pour l'extension
			$message = 'L\'extension du fichier est incorrecte !';
		}
	} else {
		// Sinon on affiche une erreur pour le champ vide
		// $message = 'Veuillez remplir le formulaire svp !';
	}
}


if (!empty($message)) {
	echo '<p>', "\n";
	echo "\t\t<strong>", htmlspecialchars($message), "</strong>\n";
	echo "\t</p>\n\n";
}

?>















 <form method="post" class="droite"  enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"> 
 <?php
 
 if(isset($_POST['submitPhoto'])) {
  
   if(!empty($_POST['id_corporation']) && !empty($_POST['nom_photo']) && !empty($_POST['type_photo']) && !empty($_POST['date_photo']) && !empty($nomImage)){
    
    $id_corporation = $_POST['id_corporation'];
    $nom_photo = $_POST['nom_photo'];
    $type_photo = $_POST['type_photo'];
    $date_photo = $_POST['date_photo'];
    //$chemin_fichier = $_POST['fichier'];
  


    $query = "INSERT INTO photos_corporations(id_corporation,nom_photo, type_photo, date_photo, chemin_fichier) VALUES('$id_corporation' , '$nom_photo' , '$type_photo' , '$date_photo' , '$nomImage')";

    $run = mysqli_query($conn, $query) or die(mysqli_error());

    if($run){
      echo "Photo ajoutée";
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

































<h1>Ajouter Photo:</h1><br/>

<!-- ID_CORPORATION -->
<label>Id_corporation:</label><br/>
 <input type="text" name="id_corporation"><br/><br>

<!-- NOM PHOTO -->
<label>Nom Photo:</label><br/>
 <input type="text" name="nom_photo"><br/><br>

<!-- TYPE PHOTO -->
<label> Type photo:</label><br/>
 <select name="type_photo">
    <option value="pins">Pin's</option>
    <option value="decorum">Decorum</option>
</select><br><br>

<!-- DATE PHOTO -->
 <label>Date Photo:</label><br/>
 <input type="text" name="date_photo"><br/><br>

 <!-- CHEMIN FICHIER -->
 <label>Chemin Fichier:</label><br/>
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
    <input name="fichier" type="file" id="fichier_a_uploader" />
    <input type="hidden" name="submitPhoto" value="Valider" class="cta" /><br><br>

 <!-- BOUTON SUBMIT -->
 <button type="submit" name="submitPhoto">Ajouter</button>
 
 </form>

</div>




















































<?php
 
 if(isset($_POST['submitCouvreChef'])) {
  
   if(!empty($_POST['id_corporation'])){
    
    $id_corporation = $_POST['id_corporation'];

    if(empty($_POST['calotte'])){
      $_POST['calotte'] = "non";
      $calotte = $_POST['calotte'];
    }else{
      $_POST['calotte'] = "oui";
      $calotte = $_POST['calotte'];
    }

    if(empty($_POST['penne'])){
      $_POST['penne'] = "non";
      $penne = $_POST['penne'];
    }else{
      $_POST['penne'] = "oui";
      $penne = $_POST['penne'];
    }

    if(empty($_POST['faluche'])){
      $_POST['faluche'] = "non";
      $faluche = $_POST['faluche'];
    }else{
      $_POST['faluche'] = "oui";
      $faluche = $_POST['faluche'];
    }
  


    $query = "INSERT INTO couvre_chef(id_corporation,calotte, penne, faluche) VALUES('$id_corporation' , '$calotte' , '$penne' , '$faluche')";

    $run = mysqli_query($conn, $query) or die(mysqli_error());

    if($run){
      echo "Information ajoutée";
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
<body>
<div class="box">
<form method="post" class="bas"> 

<h1>Ajouter Couvre-chef(s):</h1><br/>

<!-- ID_CORPORATION -->
<label>Id_corporation:</label><br/>
<input type="text" name="id_corporation"><br><br>

<!-- CALOTTE -->
<label>Calotte:</label>
<input type="checkbox" name="calotte" value="oui"><br><br>

<!-- PENNE -->
<label>Penne:</label>
<input type="checkbox" name="penne" value="oui"><br><br>

<!-- FALUCHE -->
<label>Faluche:</label>
<input type="checkbox" name="faluche" value="oui"><br><br>

<!-- BOUTON SUBMIT -->
<button type="submit" name="submitCouvreChef">Ajouter</button>

</form>





 
</body>
</html>