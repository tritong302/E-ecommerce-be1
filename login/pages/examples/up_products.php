
  <?php
require("../../../config/Database.php");
require("../../../models/model.php");
require("../../../models/productsModel.php");
require("../../../models/protypesModel.php");
require("../../../models/manufactures.php");
require("../../../models/userModel.php");
require ("../../../models/product_type.php");

// Products
$Products = new Products;
$getAllProductsNew = $Products->getAllProducts();
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
}
$getProductsById = $Products->getProductsById(intval($id));
//var_dump($getProductsById[0]['id']); exit;

// Protypes
$Protypes = new Protypes;
$getAllProtypes = $Protypes->getAllProtypes();

// Manufactures
$Manufactures = new Manufactures;
$getAllManufactures = $Manufactures->getAllManufactures();
  $productType = new ProductType();
  $getAllProductType = $productType->getProductType();
 if(isset($_POST['submit']))
  {
    $name = $_POST['name'];
    $manu_id = $_POST['manuid'];
    $type_id = $_POST['typeid'];
    $product_type_id = $_POST['product_type_id'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $feature = $_POST['feature'];
    $created_at = $_POST['createdat'];
    $updataProduct = $Products->updataProduct($id, $name, $manu_id, $type_id,$product_type_id, $price, $image, $description, $feature, $created_at);
    header('Location: products.php');
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
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="products.php"></i>Products</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="up_products.php?id=<?php echo $id?>" method="post">
    <section class="content">
      <div class="row">
      <div class="col-md-3">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Note</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
          </div>
          <div class="card-body">
          <div class="form-group">
            <label for="inputName">Manu_Id</label>
              <ul style="list-style: none;">
                <?php foreach($getAllManufactures as $value): ?>
                  <li><?= $value['manu_id'] ?>: <?= $value['manu_name'] ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
            <div class="form-group">
            <label for="inputName">Type_Id</label>
              <ul style="list-style: none;">
                <?php foreach($getAllProtypes as $value): ?>
                  <li><?= $value['type_id'] ?>: <?= $value['type_name'] ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
            <div class="form-group">
            <label for="inputName">Feature</label>
              <ul style="list-style: none;">
              <li>0: Sản phẩm không nổi bật</li>
              <li>1: Sản phẩm nổi bật</li>
              </ul>
            </div>
        </div>
        </div>
      </div>
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Product</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" id="inputName" name="name" value="<?= $getProductsById[0]['name'] ?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputStatus">Manufactures</label>
<!--                <input name="manuid" type="text" id="inputClientCompany" value="--><?//= $getProductsById[0]['manu_id'] ?><!--" class="form-control">-->
                <select name="manuid"  class="form-control">
                  <option value disabled selected>Manufactures</option>
                  <?php
                  foreach ($getAllManufactures as $item){
                    ?>
                    <option value="<?php echo $item['manu_id'] ?>" id="inputClientCompany"><?php echo $item['manu_name'] ?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Protypes</label>
<!--                <input name="typeid" type="text" id="inputClientCompany" value="--><?//= $getProductsById[0]['type_id'] ?><!--" class="form-control">-->

                <select name="typeid" class="form-control">
                  <option value disabled selected>Protypes</option>
                  <?php
                  foreach ($getAllProtypes as $item){
                    ?>
                    <option value="<?php echo $item['type_id']?>"><?php echo $item['type_name']?> </option>
                    <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Product Type</label>
                <select name="product_type_id" class="form-control">
                  <option value disabled selected>Product Type</option>
                  <?php
                  foreach ($getAllProductType as $item){
                    ?>
                    <option value="<?php echo $item['product_type_id']?>"><?php echo $item['name_product_type']?> </option>
                    <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputDescription">Description</label>
                <textarea name="description" id="inputDescription" class="form-control" rows="4"><?= $getProductsById[0]['description'] ?></textarea>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Price</label>
                <input name="price" type="text" value="<?= $getProductsById[0]['price'] ?>" id="inputClientCompany" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Image</label>
                <input  name="image" type="file" id="inputProjectLeader" value="<?= $getProductsById[0]['image'] ?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputStatus">Feature</label>
                <input  name="feature" type="text" id="inputProjectLeader" value="<?= $getProductsById[0]['feature'] ?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputStatus">Created At</label>
                <input  name="createdat" type="text" id="inputProjectLeader" value="<?= $getProductsById[0]['created_at'] ?>" class="form-control">
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
          <input type="submit" name="submit" value="Updata Product" class="btn btn-success float-right">
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
