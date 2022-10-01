<?php
   // session_start();

   // if($_SESSION["id"]){

    $servername = "localhost";
    $username = "root";
    $password ="root";


    $id = $_GET['id'];
    //var_dump($id_user);die();
    try{
       // $connect = new PDO ("mysql:host=$servername;dbname=entreprise", $nom, $mot_de_passe, );
    
      include("../includes/connexion.php");
      connect();    
      $requete1 = connect()->prepare("SELECT * FROM adherant WHERE id= ?");
                
                
    $requete1->execute(array($id));
    $reponse = $requete1->fetch();

    echo "<br>";

   if (isset($_POST['modifier'])) 
    {
            $avatar = $_POST['avatar'];
            $nom = htmlspecialchars($_POST['nom']);
            $mail = $_POST['mail'];
            $tel = $_POST['tel'];
            $password = $_POST['password'];
            $id1 = $_POST['id'];
            $error = "";
   
        
            if(empty($avatar) && empty($nom) && empty($mail) && empty($tel) && empty($password)){ 
                $error = "Veuillez remplir tous les champs"; 
                echo "error";
            }
            else{
               
                    //echo "connexion reussie";
                    $requete = connect()->prepare("UPDATE adherant SET avatar = :avatar, nom = :nom, mail = :mail, tel = :tel, password = :password WHERE id = :id1");
                    $requete->execute(array(
                      'avatar' => $avatar,
                      'nom' => $nom,
                      'mail' => $mail,
                      'tel' => $tel,
                      'password' => $password,
                      'id1' => $id1 ));
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
              <h4>Enregistrer un adhérant</h4>
              <form class="pt-3" action="modifier.php" method = "POST">
                <div class="form-group">
                <input type="hidden" value="<?php echo $reponse['id']; ?>" name="id" >
                </div>
                <div class="form-group">
                  <label for="avatar">avatar</label>
                  <input type="file" class="form-control form-control-lg" id="exampleInputavatar1" name="avatar" value="<?php echo $reponse['avatar']; ?>" >
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputtitre1" placeholder="nom" value="<?php echo $reponse['nom']; ?>" name="nom">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputauteur1" placeholder="mail" value="<?php echo $reponse['mail']; ?>" name="mail">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputdate1" placeholder="téléphone" value="<?php echo $reponse['tel']; ?>" name="tel">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputdate1" placeholder="mot de passe" value="<?php echo $reponse['password']; ?>" name="password">
                </div>
                <div class="mb-4">
                </div>
                <div class="mt-3">
                <input type="submit"  class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"  value='Changer' name="modifier">
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
