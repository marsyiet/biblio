<?php
session_start();
if($_SESSION['id']){

$servername = "localhost"; 
$username = "root"; 
$password ="root"; 

include("../includes/connexion.php");
connect();
    $requete = connect()->prepare("SELECT * FROM adherant"); 
    $requete->execute();
    $auteurs = $requete->fetchAll();


   
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include("../includes/head.php"); ?>
<link rel="stylesheet" href="../search.css">

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
              <input type="text" class="search form-control" placeholder="Search..." aria-label="search" aria-describedby="search">
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
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="table-responsive pt-3">
              <table class="table table-striped project-orders-table results">
                  <thead>
                    <tr>
                      <th class="ml-5">Numéro</th>
                      <th>avatar</th>
                      <th>nom</th>
                      <th>mail</th>
                      <th>tel</th>
                      <th>Action</th>
                    </tr>
                    <tr class="warning no-result">
      <td colspan="4"><i class="fa fa-warning"></i> No result</td>
    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach($auteurs as $aut){ ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $aut['avatar']; ?></td>
                      <td><?php echo $aut['nom']; ?></td>
                      <td><?php echo $aut['mail']; ?></td>
                      <td><?php echo $aut['tel']; ?></td>
                      <td>
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
                      </td>
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
  <script src="../search.js"></script>

  <!-- base:js -->
  <script src="../template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../template/vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../template/js/off-canvas.js"></script>
  <script src="../../template/js/hoverable-collapse.js"></script>
  <script src="../../template/js/template.js"></script>
  <script src="../../template/js/settings.js"></script>
  <script src="../../template/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../template/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
<?php } else{ header("Location: ../login.php");} ?>