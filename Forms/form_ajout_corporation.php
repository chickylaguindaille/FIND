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

//CHEMIN :

define("RACINE_SITE", '../FIND/');

//VARIABLE : 

$content = "";

/************************************************************
 * Definition des constantes / tableaux et variables
 *************************************************************/

// Constantes
define('TARGET', '../Photos/posts_images_profil/');    // Repertoire cible
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


























<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"> 
  <?php
 
   if(isset($_POST['submitPhoto'])) {
    
     if(!empty($_POST['pays']) && !empty($_POST['ville']) && !empty($_POST['type_corporation']) && !empty($_POST['nom']) && !empty($_POST['date_creation']) && !empty($nomImage)){
      
      $pays = $_POST['pays'];
      $ville = $_POST['ville'];
      $type_corporation = $_POST['type_corporation'];
      $nom = $_POST['nom'];
      $abreviation = $_POST['abreviation'];
      $date_creation = $_POST['date_creation'];
      $resume_corporation = $_POST['resume_corporation'];
      $avance = $_POST['avance'];
    


      $query = "INSERT INTO corporations(pays,ville,type_corporation, nom, abreviation, date_creation, resume_corporation, photo_profil_corpo, avance) VALUES('$pays' , '$ville' , '$type_corporation', '$nom' , '$abreviation' , '$date_creation' , '$resume_corporation', '$nomImage', '$avance')";

      $run = mysqli_query($conn, $query) or die(mysqli_error());

      if($run){
        echo "Corporation ajoutée";
        echo '<br>';
      }
      else{
        echo "ERREUR";
      }

     }
     else{
  echo "Il manque des infos<br>";
 }
}
 
 ?>









 
<!-- AJOUT DU PAYS -->

 <label > Pays:</label><br/>
 <select name="pays">
 <?php
$r = $pdo->query('SELECT DISTINCT pays FROM villes');
      while($prenom = $r->fetch(PDO::FETCH_ASSOC))  {?>
 <option value="<?= $prenom['pays']?>"><?= $prenom['pays']?></option>

    <?php   }    ?>
</select><br><br>

 
<!-- AJOUT DE LA VILLE -->
 <label>Ville:</label><br/>
 <select name="ville">
 <?php
$r = $pdo->query('SELECT ville FROM villes');
      while($prenom = $r->fetch(PDO::FETCH_ASSOC))  {?>
 <option value="<?= $prenom['ville']?>"><?= $prenom['ville']?></option>

    <?php   }    ?>
</select><br><br>

<!-- AJOUT DU TYPE D'ASSOCIATION -->
<label>Type association:</label><br/>
 <select name="type_corporation">
    <option value="filiere_falucharde">Filiere Falucharde</option>
    <option value="association">Association</option>
    <option value="cercle_calotte">Cercle Calotte</option>
    <option value="cercle_penne">Cercle Penne</option>
    <option value="cercle">Cercle</option>
    <option value="regionale_penne">Régionale Penne</option>
    <option value="regionale_calotte">Régionale Calotte</option>
    <option value="regionale">Régionale</option>
    <option value="ordre">Ordre</option>
    <option value="guilde">Guilde</option>
    <option value="corporation">Corporation</option>
</select><br><br>

 
<!-- AJOUT DU NOM -->
 <label>Nom:</label><br/>
 <input type="text" name="nom"><br/><br>

  
<!-- AJOUT DE L'ABREVIATION -->
 <label>Abréviation:</label><br/>
 <input type="text" name="abreviation"><br/><br>

  
<!-- AJOUT DE LA DATE DE CREATION -->
 <label>Date création (Attention, format 2000-20-20 et pas 0000_00-00) :</label><br/>
 <input type="text" name="date_creation"><br/><br>

 <!-- AJOUT DU RESUME DE LA CORPORATION -->
 <label>Resumé corporation:</label><br/>
 <input type="text" name="resume_corporation"><br/><br>

  <!-- PHOTO PROFIL CORPO -->
  <label>Photo profil corpo:</label><br/>
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
    <input name="fichier" type="file" id="fichier_a_uploader" />
    <input type="hidden" name="submitPhoto" value="Valider" class="cta" /><br><br>

  <!-- AVANCE -->
<label>Avance:</label><br/>
 <select name="avance">
    <option value="avanceN">AvanceN</option>
    <option value="avanceM">AvanceM</option>
    <option value="avanceO">AvanceO</option>
</select><br><br>


 <!-- BOUTON SUBMIT -->
 <button type="submit" name="submitPhoto">Ajouter</button>
 
 </form>