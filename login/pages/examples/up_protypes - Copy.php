
  <?php
require("../../../config/Database.php");
require("../../../models/model.php");
require("../../../models/productsModel.php");
require("../../../models/protypesModel.php");
require("../../../models/manufactures.php");
require("../../../models/userModel.php");

// Products
$Products = new Products;
$getAllProductsNew = $Products->getAllProducts();

//var_dump($getProductsById[0]['id']); exit;

// Protypes
$Protypes = new Protypes;
$getAllProtypes = $Protypes->getAllProtypes();
if(isset($_GET['typeid'])){
  $type_id = intval($_GET['typeid']); 
}
$getProtypesById = $Protypes->getProtypesById(intval($type_id));

// Manufactures
$Manufactures = new Manufactures;
$getAllManufactures = $Manufactures->getAllManufactures();
 if(isset($_POST['submit']))
  {
    $type_name = $_POST['typename'];
    $updataProtypes = $Protypes->updataProtypes($type_id, $type_name);  
    header('Location: protypes.php');
  }
?>

<?php include("header.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Protypes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="protypes.php"></i>Protypes</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="up_protypes.php?typeid=<?php echo $type_id ?>" method="post">
    <section class="content">
      <div class="row">
      <div class="col-md-3">
      </div>
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Protypes</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Type_Name</label>
                <input type="text" id="inputName" name="typename" value="<?= $getProtypesById[0]['type_name'] ?>" class="form-control">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
      <div class="col-3"></div>
        <div class="col-6">
          <a href="products.php" class="btn btn-secondary">Cancel</a>
          <input type="submit" name="submit" value="Updata Protypes" class="btn btn-success float-right">
      </div>
    </section>
    </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
