<?php
session_start();
if($_SESSION['id']){


$servername = "localhost"; 
$username = "root"; 
$password ="root"; 

include("admin/includes/connexion.php");
    connect();
    $requete = connect()->prepare("SELECT * FROM empreunter WHERE etat = 1"); 
    $requete->execute();
    $emprunt = $requete->fetchAll();


   
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta content="" name="description">
     <meta content="" name="keywords">
   
     <!-- Favicons -->
     <link href="assets/img/favicon.png" rel="icon">
     <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
   
     <!-- Google Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
   
     <!-- Vendor CSS Files -->
     <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
     <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
     <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
     <link href="assets/vendor/aos/aos.css" rel="stylesheet">
   
     <!-- Template Main CSS Files -->
     <link href="assets/css/variables.css" rel="stylesheet">
     <link href="assets/css/main.css" rel="stylesheet">
   
</head>
<body>
<nav id="navbar" class="navbar">
           <ul>
             <li><a href="index.php">Acceuil</a></li>

             <li><a href="deconnexion.php">Déconnexion</a></li>
           </ul>
         </nav><!-- .navbar -->

      <!-- partial -->
      <div class="main-panel">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="table-responsive pt-3">
                <table class="table table-striped project-orders-table">
                  <thead>
                    <tr>
                      <th class="ml-5">Numéro</th>
                      <th>Nom</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach($emprunt as $em){ 
                    $reqlivre = connect()->prepare("SELECT * FROM livres WHERE id=?");
                    $reqlivre->execute(array($em['id_livre']));
                    $livre = $reqlivre->fetch();?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $livre['titre']; ?></td>
                      <td><?php echo $em['date_empreunt']; ?></td>
                    <!--  <td>
                        <div class="d-flex align-items-center">
                          <a type="button" class="btn btn-success btn-sm btn-icon-text mr-3" href="modifier.php?id=<?php  echo $aut['id']; ?>">
                            Éditer
                            <i class="typcn typcn-edit btn-icon-append"></i>                          
                    </a>
                          <a type="button" class="btn btn-danger btn-sm btn-icon-text" href="supprimer.php?id=<?php  echo $aut['id']; ?>">
                            Supprimer
                            <i class="typcn typcn-delete-outline btn-icon-append"></i>                          
                    </a>
                        </div>
                      </td> -->
                    </tr><?php $i++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
<?php } else{ header("Location: ../login.php");} ?>