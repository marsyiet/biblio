<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Convert HTML To PDF In PHP With Dompdf</title>
    <link rel="stylesheet" href="template/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="template/images/favicon.png">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>
<div class="main-panel">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
<div class="table-responsive pt-3">
  <style>
      table{
    border-collapse: collapse;
    width: 70%;
    }
    th, td{
      border: 1px solid black;
      padding: 10px;
      vertical-align: top;
    }

    </style>
    <table class="table table-striped">
        <a href="pdf.php" type="button" > Télécharger la liste </a>
        <thead>
          <tr>
            <th class="ml-5">Numéro</th>
            <th>titre</th>
            <th>auteur</th>
            <th>date de parution</th>
            
          </tr>
        </thead>
        <tbody>
          <?php $i = 1;
          foreach($livres as $liv){ ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $liv['titre']; ?></td>
            <td><?php echo $liv['nom']; ?></td>
            <td><?php echo $liv['date_parution']; ?></td>
            <?php $i++;?>
        </tr>
        <?php } ?>
        </tbody>
          </table>
          </div>
          </div>
          </div>
        </div>
        </div>
       <script src=" https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>