
  <?php
require("../../../config/Database.php");
require("../../../models/model.php");
require("../../../models/productsModel.php");
require("../../../models/protypesModel.php");
require("../../../models/manufactures.php");
require("../../../models/userModel.php");
require("../../../models/product_type.php");

// Products
$Products = new Products;
$getAllProductsNew = $Products->getAllProducts();

// Protypes
$Protypes = new Protypes;
$getAllProtypes = $Protypes->getAllProtypes();

// Manufactures
$Manufactures = new Manufactures;
$getAllManufactures = $Manufactures->getAllManufactures();
$Product_Type = new ProductType();
$getAllProduct_Type = $Product_Type->getProductType();
if(isset($_POST['submit']))
  {
    $type_name = $_POST['typename'];
    $id_product_type = $_POST['id_product_type'];
    $insertProtype = $Protypes->insertProtype($type_name,$id_product_type);
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
    <form action="protypes-add.php" method="post">
    <section class="content">
      <div class="row">
      <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">New Protypes</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputStatus">Name</label>
                <input name="typename" type="text" id="inputClientCompany" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputStatus">Loại sản phẩm</label>
                <select name="id_product_type" class="form-control" required>
                  <option value="" disabled selected>Chọn loại sản phẩm</option>
                  <?php foreach ($getAllProduct_Type as $item): ?>
                    <option value="<?php echo $item['product_type_id']; ?>"><?php echo $item['name_product_type']; ?></option>
                  <?php endforeach; ?>
                </select>
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
          <input type="submit" name="submit" value="Protypes Add" class="btn btn-success float-right">
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
