<?php
//session_start();
//if($_SESSION['id']){
  

     if (isset($_POST['enregistrer'])) //la fonction isset vérifie si un élément sélectionné dans un formulaire existe
     {
          $libelle = $_POST['libelle'];
         if(empty($libelle)){
            $error = "Veuillez entrer un nom";
            echo $error;
        }
        else{
          include("../includes/connexion.php");
          connect();                    /*$req = $connect->prepare("SELECT * FROM auteurs WHERE nom= ?");
                    $req->execute(array($nom));
                    if(is_countable($req) && count($req) < 0){
                        echo "ok";
                    };*/
                    $requete = connect()->prepare("INSERT INTO cathegorie(libelle) VALUES(?)");
                    $requete->execute(array($libelle));

        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include("../includes/head.php"); ?>
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
              <h4>Enregistrer un genre</h4>
              <form class="pt-3" action="enregistrer.php" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="libelle" placeholder="nom">
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
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../../template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../template/js/off-canvas.js"></script>
  <script src="../../template/js/hoverable-collapse.js"></script>
  <script src="../../template/js/template.js"></script>
  <script src="../../template/js/settings.js"></script>
  <script src="../../template/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
<?php //} else{ header("Location: ../login.php");} ?>