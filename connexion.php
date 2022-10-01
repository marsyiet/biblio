<?php
   session_start();

    if(isset($_POST['connexion'])){

      include("admin/includes/connexion.php");

      $login = $_POST['nom'];
      $mdp = $_POST['password'];

        if(empty($login) && empty($mdp)){
          $error = "veuillez entrer toutes les informations";
        }
        else{
          
          $requete = connect()->prepare("SELECT * FROM adherant WHERE nom = ? and password = ?");
          $requete->execute(array($login, $mdp));
          $req = $requete->fetchAll();
          //var_dump($req);die();
        
          if(count($req) == 1){
            $_SESSION["id"] = $req[0]['id'];
            
            $_SESSION["login"] = $req[0]['login'];
            //var_dump($_SESSION["login"]);die();
            header("Location: index.php");
          }
          else{
           header("Location:connexion.php");
          }
          
        }

    }
   
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BIBLIO : INSCRIPTION</title>
  <!-- base:css -->
  <link rel="stylesheet" href="template/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="template/images/favicon.png" />
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">

</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h4>CONNEXION</h4>
              <form class="pt-3" action="connexion.php" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputnom1" placeholder="nom" name="nom">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputpassword1" placeholder="password" name="password">
                </div>
                <div class="mb-4">
                </div>
                <div class="mt-3">
                <input type="submit" name="connexion" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Se Connecter">                
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- endinject -->
  <script src="template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="template/vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="template/js/off-canvas.js"></script>
  <script src="template/js/hoverable-collapse.js"></script>
  <script src="template/js/template.js"></script>
  <script src="template/js/settings.js"></script>
  <script src="template/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="template/js/dashboard.js"></script>
</body>


</html>
