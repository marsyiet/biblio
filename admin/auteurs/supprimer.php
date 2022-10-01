<?php
    $servername = "localhost";
    $username = "root";
    $password ="root";

    include("../includes/connexion.php");
    connect();
    $id = $_GET['id'];
    $etat = 1;
    
    $requete1 = connect()->prepare("UPDATE auteurs SET etat = :etat WHERE id = :id"); 
    $requete1->execute(array( 
    'id' => $id,
    'etat' => $etat));
    //var_dump($requete1);die();
   
    if($requete1){
      echo "suppression réussie";
      header("Location: liste.php");
    }
?>
