<?php session_start();
require("config/Database.php");
require("models/model.php");
require("models/productsModel.php");
require("models/protypesModel.php");
require("models/manufactures.php");

// Products
$Products = new Products;
$getAllProducts = $Products->getAllProducts();
$getAllProductsNew = $Products->getAllProductsNew();
$getProductsLimit3 = $Products->getProductsLimit3();
$getProductsLimit6 = $Products->getProductsLimit6();
$getProductsLimit66 = $Products->getProductsLimit66();
$getProductsLimit12 = $Products->getProductsLimit12();
$getAllProductsSelling = $Products->getAllProductsSelling();
if(isset($_COOKIE['viewedProduct'])) {
    $arrId = json_decode($_COOKIE['viewedProduct'], true);
    $viewedProductList = $Products->getProductByIds($arrId);
}
// Protypes
$Protypes = new Protypes;
$getAllProtypes = $Protypes->getAllProtypes();
$kq = count($viewedProductList);
// Lưu giá trị vào session
$_SESSION['viewedProductCount'] = $kq;
?>

<!-- HEADER -->
<?php include("header.php"); ?>
<!-- /HEADER -->

<!-- NEWSLETTER -->
<div id="" class="">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h1>SẢN PHẨM VỪA XEM</h1>


                    <table border="1" cellspacing="0" cellpadding="5" style="margin: 50px 0px 0px 120px;">
                        <tr>
                            <th>Name</th>
                        </tr>
                        <?php
                        foreach ($viewedProductList as $viewedItem) {
                            ?>
                        <tr>
                            <td><img src="./img/<?php echo $viewedItem['image']; ?>" alt="" width="100"><a
                                    href="product.php?id=<?php echo $viewedItem['id']; ?>"><?php echo $viewedItem['name'] ?></a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>



                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /NEWSLETTER -->

<!-- FOOTER -->
<?php include("footer.php"); ?>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>

</body>

</html>