<?php

session_start();
$_SESSION['id'] = 'me';

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