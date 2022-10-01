<?php
   session_start();

    if(isset($_POST['connexion'])){

      include("includes/connexion.php");

      $login = $_POST['username'];
      $mdp = $_POST['password'];

        if(empty($login) && empty($mdp)){
          $error = "veuillez entrer toutes les informations";
        }
        else{
          
          $requete = connect()->prepare("SELECT * FROM user WHERE login = ? and password = ?");
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
           header("Location:login.php");
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
  <title>PolluxUI Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../template/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../template/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                
              </div>
              <h4>Bienvenue dans la partie Admin</h4>
              <form class="pt-3" action="login.php" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg"  placeholder="Nom d'utilisateur" name="username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg"  placeholder="Mot de passe" name="password">
                </div>
                <div class="mt-3">
                <input type="submit" name="connexion" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Se connecter" >                
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                <div class="mb-2">
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Vous n'avez pas de compte ? <a href="utilisateurs/enregister.php" class="text-primary">Créer un compte</a>
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
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../template/js/off-canvas.js"></script>
  <script src="../template/js/hoverable-collapse.js"></script>
  <script src="../template/js/template.js"></script>
  <script src="../template/js/settings.js"></script>
  <script src="../template/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
