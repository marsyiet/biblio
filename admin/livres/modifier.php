<?php
   // session_start();

   // if($_SESSION["id"]){

    $servername = "localhost";
    $username = "root";
    $password ="root";

    include("../includes/connexion.php");
   
    $reqsel = connect()->prepare("SELECT * FROM auteurs");
    $reqsel->execute(array());
    $auteurs = $reqsel->fetchAll();
   
    $id = $_GET['id'];
    //var_dump($id_user);die();
    try{
      // $connect = new PDO ("mysql:host=$servername;dbname=entreprise", $nom, $mot_de_passe, );
          
      $requete1 = connect()->prepare("SELECT * FROM livres WHERE id= ?");
                
                
    $requete1->execute(array($id));
    $reponse = $requete1->fetch();

    echo "<br>";

   if (isset($_POST['modifier'])) 
    {
            $image = $_POST['image'];
            $id_auteur = $_POST['id_auteur'];
            $titre = htmlspecialchars($_POST['titre']);
            $date_parution = $_POST['date_parution'];
            $exemplaires = $_POST['exemplaires'];
            $id1 = $_POST['id'];
            $error = "";
   
        
                    if(empty($image) && empty($titre) && empty($id_auteur) && empty($date_parution) && empty($exemplaires)){ 
                $error = "Veuillez remplir tous les champs"; 
                echo "error";
            }
            else{
               
                    //echo "connexion reussie";
                    $requete = connect()->prepare("UPDATE livres SET  image = :image, id_auteur = :id_auteur, titre = :titre, date_parution = :date_parution, exemplaires = :exemplaires WHERE id = :id1");
                    $requete->execute(array(
                      'image' => $image,
                      'titre' => $titre,
                      'id_auteur' => $id_auteur,
                      'date_parution' => $date_parution,
                      'exemplaires' => $exemplaires,
                      'id1' => $id1));
                //var_dump($requete);die();
                    if($requete){
                        echo "inscription ok";
                        header("Location: liste.php");
                    }
              
            }
        
        
    }
}
catch (PDOExecption $e ){
    echo "Erreur de connection a la base de donnée : ". $e->getMessage();
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
                <img src="../../template/images/logo-dark.svg" alt="logo">
              </div>
              <h4>Enregistrer un livre</h4>
              <form class="pt-3" action="modifier.php" method="POST">
              <div class="form-group">
              <input type="hidden" value="<?php echo $reponse['id']; ?>" name="id" >
              </div>
              <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" class="form-control form-control-lg" id="exampleInputtitre1"  name="image" value="<?php echo $reponse['image']; ?>">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputtitre1" placeholder="titre" name="titre" value="<?php echo $reponse['titre']; ?>">
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
                  <input type="date" class="form-control form-control-lg" id="exampleInputdate1" name="date_parution" value="<?php echo $reponse['date_parution']; ?>">
                </div>
                <div class="form-group">
                  <label for="exemplaires">Nombre d'exemplaire</label>
                  <input type="number" class="form-control form-control-lg" id="exampleInputPassword1" name="exemplaires" value="<?php echo $reponse['exemplaires']; ?>">
                </div>
                <div class="mb-4">
                </div>
                <div class="mt-3">
                <input type="submit" name="modifier" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Enregistrer">                
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
<script src="../../vendors/select2/select2.min.js"></script>
<script src="../../js/select2.js"></script>
</html>
<?php
/*}else{
    header("Location: index.php");
}*/
?>