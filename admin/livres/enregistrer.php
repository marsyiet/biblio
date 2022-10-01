<?php
session_start();
if(isset($_SESSION["id"])){

    $servername = "localhost";
    $username = "root";
    $password ="root";

    include("../includes/connexion.php");
    connect();
        $reqsel = connect()->prepare("SELECT * FROM auteurs");
    $reqsel->execute(array());
    $auteurs = $reqsel->fetchAll();
    
    $reqcat = connect()->prepare("SELECT * FROM cathegorie");
    $reqcat->execute(array());
    $cathegorie = $reqcat->fetchAll();
    //var_dump($auteurs);die();

    if (isset($_POST['enregistrer'])) //la fonction isset vérifie si un élément sélectionné dans un formulaire existe
    {
    /* if ($_FILES['image']['error'] == 0)  
      echo  "Erreur lors du transfert ";
     
      $logo =  $_FILES['image']['error'];
      echo  $logo;*/
     
      $image = $_FILES['image']['name'];
     // move_uploaded_file($_FILES['image']['tmp_name'], "../../images");
      //var_dump($_FILES['image']['tmp_name']);die();
      $titre = $_POST['titre'];
      $id_auteur = $_POST['id_auteur']; //informations recuperees au niveau du formulaire via l'attriut name qui se trouve dans l'input
      $id_cathegorie = $_POST['id_cathegorie'];
      $date_parution = $_POST['date_parution'];
      $exemplaires = $_POST['exemplaires'];

      $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
      $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
      
      
         /* if ($_FILES['image']['size'] >= 2000000) echo "Le fichier est trop gros";
          {
              $infosfichier = pathinfo($_FILES['image']['name']);
                  $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                  $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
                  if (in_array($extension_upload, $extensions_autorisees)) echo "Extention correcte";
                  {

                    move_uploaded_file($_FILES['image']['tmp_name'], '../../images/' . basename($_FILES['image']['name']));
                     die();
                  }
                }*/
              
           
   
            if(empty($image)){
              $error = "Veuillez entrer une image"; 
              echo $error;
          }
            elseif(empty($titre)){
                $error = "Veuillez entrer un titre"; 
                echo $error;
            }
             elseif(empty($id_auteur)){ 
              $error = "Veuillez entrer un nom d'auteur"; 
              echo $error;
          }
                elseif(empty($date_parution)){ 
                $error = "Veuillez entrer la date"; 
                echo $error;
            }
            elseif(empty($exemplaires)){ 
                $error = "Veuillez entrer le nombre d'exemplaires"; 
                echo $error;
            }  
            else{ 
              if (in_array($extension_upload, $extensions_autorisees))
      {            echo "extension correcte";       
                    $requete = connect()->prepare("INSERT INTO livres(id_auteur,id_cathegorie,image,titre,date_parution,exemplaires) VALUES(?,?,?,?,?,?)");
                    $requete->execute(array($id_auteur,$id_cathegorie,$image,$titre,$date_parution,$exemplaires,));
      }else{
        echo "format de l'image incorrect; veuillez entrer une image aux formats 'jpg', 'jpeg', 'gif', 'png'";
      }            
                    if($requete){
                        echo "Enregistrement ok";
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
    <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0" style ="margin-top: -10px">
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
                <li class="nav-item"> <a class="nav-link" href="enregistrer.php">Enregistrer</a></li>
                <li class="nav-item"> <a class="nav-link" href="liste.php">Liste</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="../adhérants/enregistrer.php"> Enregistrer </a></li>
                <li class="nav-item"> <a class="nav-link" href="../adhérants/liste.php"> Liste </a></li>
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
              <h4>Enregistrer un livre</h4>
              <form class="pt-3" action="enregistrer.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" class="form-control form-control-lg" id="image"  name="image">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputtitre1" placeholder="titre" name="titre">
                </div>
                <div class="form-group">
                    <label>Choisissez un genre</label>
                    <select class="js-example-basic-single w-100" name="id_cathegorie" style="color:black">
                      <?php foreach($cathegorie as $cat){ ?>
                      <option value="<?php echo $cat['id']; ?>" ><?php echo $cat['libelle']; ?></option><?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Choisissez un auteur</label>
                    <select class="js-example-basic-single w-100" name="id_auteur" style="color:black">
                      <?php foreach($auteurs as $aut){ ?>
                      <option value="<?php echo $aut['id']; ?>" ><?php echo $aut['nom']; ?></option><?php } ?>
                    </select>
                </div>
                <div class="form-group">
                  <label for="exemplaires">Date de parution</label>
                  <input type="date" class="form-control form-control-lg" id="exampleInputdate1" name="date_parution">
                </div>
                <div class="form-group">
                  <label for="exemplaires">Nombre d'exemplaire</label>
                  <input type="number" class="form-control form-control-lg" id="exampleInputPassword1" name="exemplaires">
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

  
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <!-- container-scroller -->
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
</body>

</html>
<?php
}else{
    header("Location: ../login.php");
}
?>