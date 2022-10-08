<?php
  session_start();
  if (isset($_SESSION['id']))
  {
    include("admin/includes/connexion.php");
    connect();
    $id_livre = $_GET['id']; //$_GET['id'] est la valeur de l'identifiant du livre passé en parametre depuis le fichier compte.php et récupéré via la fonction GET 
    $id_adherant = $_SESSION['id']; // $_SESSION['id'] représente l'id de l'utilisateur connecté 
    
    $date_empreunt = date('y-m-d h:i:s');
    //$date_retour = $date_empreunt->add(new DateInterval('P15D'));
    $newDate = new DateTime($date_empreunt);
    $newDate->add(new DateInterval('P2D'));
    $date_retour = $newDate->format('y-m-d h:i:s');
    //var_dump($date_retour);die();
    
    //echo $date;
    

    
    $requete = connect()->prepare("SELECT * FROM livres WHERE id= ?"); 
    $requete->execute(array($id_livre));
    $livre = $requete->fetch();

    $exemplaires = $livre['exemplaires']-1;
    $exemplaires_empreunt = $livre['exemplaires_empreunt']+1;
    

    $requete2 = connect()->prepare("SELECT * FROM empreunter WHERE id_adherant= ?"); 
    $requete2->execute(array($id_adherant));
    $adherant = $requete2->fetch();
    //var_dump($adherant['etat']);die();

    if($adherant['etat']==1){
      echo "Vous avez un empreunt en cours veuillez retourner le livre afin de faire un nouvel emprunt";
    }
    
    else{
    $requete1 = connect()->prepare("INSERT INTO  empreunter (id_adherant, id_livre, date_empreunt, date_retour) VALUES (?,?,?,?)"); 
    $requete1->execute(array($id_adherant, $id_livre, $date_empreunt, $date_retour));

    $req = connect()->prepare("UPDATE livres SET exemplaires = :exemplaires, exemplaires_empreunt = :exemplaires_empreunt WHERE id= :id");
    $req->execute(array(
      'id'=> $id_livre,
      'exemplaires' => $exemplaires,
      'exemplaires_empreunt' => $exemplaires_empreunt,
    ));
  
    if($requete1){
      echo "empreunt effectué";
    }
    
  }
    }
?>