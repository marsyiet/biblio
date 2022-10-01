<?php

   
    include("admin/includes/connexion.php");

    if (isset($_POST['enregistrer'])) //la fonction isset vérifie si un élément sélectionné dans un formulaire existe
    {
            $avatar = $_POST['avatar'];
            $nom = $_POST['nom']; //informations recuperees au niveau du formulaire via l'attriut name qui se trouve dans l'input
            $mail = $_POST['mail'];
            $tel = $_POST['tel'];
            $password = $_POST['password'];
   
            if(empty($avatar)){
                $error = "Veuillez choisir un avatar"; 
                echo $error;
            }
             elseif(empty($nom)){ 
              $error = "Veuillez entrer votre nom"; 
              echo $error;
            }
            elseif(empty($mail)){ 
              $error = "Veuillez entrer votre adresse mail"; 
              echo $error;
            }
                elseif(empty($tel)){ 
                $error = "Veuillez entrer votre numéro de téléphone"; 
                echo $error;
            }
            elseif(empty($password)){ 
                $error = "Veuillez entrer votre mot de passe"; 
                echo $error;
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
              <h4>INSCRIPTION</h4>
              <form class="pt-3" action="inscription.php" method="POST">
                <div class="form-group">
                  <label for="avatar">avatar</label>
                  <input type="file" class="form-control form-control-lg" id="exampleInputavatar1" name="avatar">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputnom1" placeholder="nom" name="nom">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputmail1" placeholder="mail" name="mail">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputtel1" placeholder="tel" name="tel">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputpassword1" placeholder="password" name="password">
                </div>
                <div class="mb-4">
                </div>
                <div class="mt-3">
                <input type="submit" name="enregistrer" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Enregistrer">                
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
