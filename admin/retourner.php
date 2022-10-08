<?php
  session_start();
  if (isset($_SESSION['id']))
  {
    include("includes/connexion.php");
    connect();
    $id_livre = $_GET['id_livre']; //$_GET['id'] est la valeur de l'identifiant du livre passé en parametre depuis le fichier compte.php et récupéré via la fonction GET 
   // $_SESSION['id'] représente l'id de l'utilisateur connecté 
    $id_emprunt = $_GET['id_empreunt'];

    $date_empreunt = date('y-m-d h:i:s');
    //$date_retour = $date_empreunt->add(new DateInterval('P15D'));
    $newDate = new DateTime($date_empreunt);
    $newDate->add(new DateInterval('P2D'));
    $date_retour = $newDate->format('d-m-y h:i:s');
    //var_dump($date_retour);die();
    
    $requete = connect()->prepare("SELECT * FROM livres WHERE id= ?"); 
    $requete->execute(array($id_livre));
    $livre = $requete->fetch();

    $exemplaires = $livre['exemplaires']+1;
    $exemplaires_empreunt = $livre['exemplaires_empreunt']-1;
    //var_dump($exemplaires);die();
    
    $req = connect()->prepare("UPDATE livres SET exemplaires = :exemplaires, exemplaires_empreunt = :exemplaires_empreunt WHERE id= :id");
    $req->execute(array(
      'id'=> $id_livre,
      'exemplaires' => $exemplaires,
      'exemplaires_empreunt' => $exemplaires_empreunt,
    ));

    $req = connect()->prepare("UPDATE empreunter SET etat =0 WHERE id=?");
    $req->execute(array($id_emprunt));

    if($requete){
      echo "Retour effectué";
    }
    
    
  }
?>