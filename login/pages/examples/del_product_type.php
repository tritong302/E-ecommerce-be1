<?php
require("../../../config/Database.php");
require("../../../models/model.php");
require("../../../models/product_type.php");

if(isset($_GET['product_type_id'])){
  $id_product_type = intval($_GET['product_type_id']) ;
}
$ProductType = new ProductType();
$deleteProductType = $ProductType->deleteProducType($id_product_type);

header('location: product_type.php');
?>
