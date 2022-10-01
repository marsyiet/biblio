<?php
    require_once 'dompdf/autoload.inc.php';  
    use Dompdf\Dompdf; 
    $dompdf = new Dompdf();

    require_once 'admin/includes/connexion.php';
    

    

    $requete= connect()->prepare("SELECT livres.titre, livres.date_parution, auteurs.nom 
    FROM livres
    LEFT OUTER JOIN auteurs ON livres.id_auteur = auteurs.id
  "); //jointure
    
    $requete->execute(array());
    $livres = $requete->fetchAll();
    
    ob_start();
    require_once 'sortie_pdf.php';
    $html = ob_get_contents();
    ob_end_clean();
    
    $dompdf->loadHtml($html); 
   
    $dompdf->setPaper('A4', 'landscape'); 
    $dompdf->render(); 
    $dompdf->stream("niceshipest", array("Attachment" => 0));
?>
