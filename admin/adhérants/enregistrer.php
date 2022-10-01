<?php
session_start();
if($_SESSION["id"]){


    $servername = "localhost";
    $username = "root";
    $password ="root";
    include("../includes/connexion.php");

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
            else{
                try{
                    connect();
                    $requete = connect()->prepare("INSERT INTO adherant(avatar,nom,mail,tel,password) VALUES(?,?,?,?,?)");
                    $requete->execute(array($avatar,$nom,$mail,$tel,$password,));
                    if($requete){
                        echo "inscription ok";
                    }
                }
                catch (PDOExecption $e ){
                    echo "Erreur de connection a la base de donnée : ". $e->getMessage();
                }
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
    <!-- partial:partials/_navbar.html -->
    <!-- partial -->
    <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0" style="margin-top: -10px">
      <div class="navbar-links-wrapper d-flex align-items-stretch">
        <div class="nav-link">
          <a href="javascript:;"><i class="typcn typcn-calendar-outline"></i></a>
        </div>
        <div class="nav-link">
          <a href="javascript:;"><i class="typcn typcn-mail"></i></a>
        </div>
        <div class="nav-link">
          <a href="javascript:;"><i class="typcn typcn-folder"></i></a>
        </div>
        <div class="nav-link">
          <a href="javascript:;"><i class="typcn typcn-document-text"></i></a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Tableau de bord</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Acceuil</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Main Dahboard</p>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-search d-none d-md-block mr-0">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search..." aria-label="search" aria-describedby="search">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="typcn typcn-zoom"></i>
                </span>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Acceuil</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#livre" aria-expanded="false" aria-controls="livre">
              <i class="typcn typcn-document-text menu-icon"></i>
              <span class="menu-title">Livres</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="livre">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../livres/enregistrer.php">Enregistrer</a></li>
                <li class="nav-item"> <a class="nav-link" href="../livres/liste.php">Liste</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#adhérant" aria-expanded="false" aria-controls="adhérant">
              <i class="typcn typcn-user-add-outline menu-icon"></i>
              <span class="menu-title">Adhérants</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="adhérant">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="enregistrer.php"> Enregistrer </a></li>
                <li class="nav-item"> <a class="nav-link" href="liste.php"> Liste </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#utilisateur" aria-expanded="false" aria-controls="utilisateur">
              <i class="typcn typcn-user-add-outline menu-icon"></i>
              <span class="menu-title">Utilisateurs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="utilisateur">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../utilisateurs/enregistrer.php"> Enregistrer </a></li>
                <li class="nav-item"> <a class="nav-link" href="../utilisateurs/liste.php"> Liste </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auteur" aria-expanded="false" aria-controls="auteur">
              <i class="typcn typcn-document-text menu-icon"></i>
              <span class="menu-title">auteurs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auteur">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../auteurs/enregistrer.php">Enregistrer</a></li>
                <li class="nav-item"> <a class="nav-link" href="../auteurs/liste.php">Liste</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../liste_empreunt.php">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Liste des emprunts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../deconnexion.php">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Déconnexion</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
      <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                
              </div>
              
              <h4>Enregistrer un adhérant</h4>
              <form class="pt-3" action="enregistrer.php" method="POST">
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
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html --> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <script src="../template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../template/vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../template/js/off-canvas.js"></script>
  <script src="../template/js/hoverable-collapse.js"></script>
  <script src="../template/js/template.js"></script>
  <script src="../template/js/settings.js"></script>
  <script src="../template/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../template/js/dashboard.js"></script>
  <!-- endinject -->
</body>

</html>
<?php } else{ header("Location: ../login.php");} ?>