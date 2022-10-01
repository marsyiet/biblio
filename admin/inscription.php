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