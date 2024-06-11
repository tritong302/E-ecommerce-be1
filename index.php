<?php
session_start();


require("config/Database.php");
require("models/model.php");
require("models/productsModel.php");
require("models/protypesModel.php");
require("models/manufactures.php");
require("models/product_type.php");
require("models/userModel.php");
require("models/comment.php");


// User
$User = new User;
// Products
$Products = new Products;
$getAllProducts = $Products->getAllProducts();
$getAllProductsNew = $Products->getAllProductsNew();
$getProductsLimit3 = $Products->getProductsLimit3();
$getProductsLimit6 = $Products->getProductsLimit6();
$getProductsLimit66 = $Products->getProductsLimit66();
$getProductsLimit12 = $Products->getProductsLimit12();
$getAllProductsSelling = $Products->getAllProductsSelling();

// Protypes
$Protypes = new Protypes;
$getAllProtypes = $Protypes->getAllProtypes();

if (isset($_POST['likedId'])) {
	$id = $_POST['likedId'];
	if (isset($_SESSION['user']['user_id'])) {
		$userId = $_SESSION['user']['user_id'];
		$r = $Products->likeProductUser($id, $userId);
		
		$kq=$Products->countwish($userId);
		
	}
	header("Location: index.php");
}

if (isset($_POST['cartId'])) {
	if (!isset($_SESSION['user']['user_id'])) {
		header('Location: login/login.php');
	}
	$id = $_POST['cartId'];
	if (isset($_SESSION['user']['user_id'])) {
		$userId = $_SESSION['user']['user_id'];
		$r = $Products->addCart($id, $userId);
	}
}


// $getProductype = $ProductType->getProducType_Protypes();


?>

<!-- HEADER -->
<?php include("header.php"); ?>
                           
                         
                           
<!-- /HEADER -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop01.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Laptop<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop03.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Tai nghe<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop02.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Smartphone<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">All</a></li>
								<li><a data-toggle="tab" href="#tab2">Tivi</a></li>
								<li><a data-toggle="tab" href="#tab3">Tai nghe</a></li>
								<li><a data-toggle="tab" href="#tab4"> Smartphone</a></li>	
								<li><a data-toggle="tab" href="#tab5"> Laptop</a></li>
								<li><a data-toggle="tab" href="#tab6"> Chuột</a></li>							
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<?php include("products_type.php"); ?>
					<!-- Products tab & slick -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
<script>
    // Set the date we're counting down to
    var countDownDate = new Date().getTime() + (3 * 24 * 60 * 60 * 1000); // Add 3 days in milliseconds

    // Update the countdown every 1 second
    var countdown = setInterval(function() {
        // Get the current date and time
        var now = new Date().getTime();

        // Calculate the remaining time
        var distance = countDownDate - now;

        // Calculate days, hours, minutes, and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Update the HTML elements
        document.getElementById("days").innerText = days;
        document.getElementById("hours").innerText = hours;
        document.getElementById("minutes").innerText = minutes;
        document.getElementById("seconds").innerText = seconds;

        // If the countdown is over, display a message
        if (distance < 0) {
            clearInterval(countdown);
            document.getElementById("countdown").innerHTML = "<p>Deal expired</p>";
        }
    }, 1000);
</script>
		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
                    <div class="col-md-12">
                        <div class="hot-deal">
                            <ul class="hot-deal-countdown" id="countdown">
                                <li>
                                    <div>
                                        <h3 id="days">02</h3>
                                        <span>Days</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h3 id="hours">10</h3>
                                        <span>Hours</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h3 id="minutes">34</h3>
                                        <span>Mins</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h3 id="seconds">60</h3>
                                        <span>Secs</span>
                                    </div>
                                </li>
                            </ul>
                            <h2 class="text-uppercase">hot deal this week</h2>
                            <p>New Collection Up to 50% OFF</p>
                            <a class="primary-btn cta-btn" href="#">Shop now</a>
                        </div>
                    </div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Top selling</h3>
							<div class="section-nav">
							<ul class="section-tab-nav tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab7">All</a></li>
								<li><a data-toggle="tab" href="#tab8">Tivi</a></li>
								<li><a data-toggle="tab" href="#tab8">Tai nghe</a></li>
								<li><a data-toggle="tab" href="#tab10"> Smartphone</a></li>
								<li><a data-toggle="tab" href="#tab11">Laptop</a></li>
								<li><a data-toggle="tab" href="#tab12">Chuột</a></li>	
							</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<?php include("best_selling_products.php"); ?>
					<!-- Products tab & slick -->
					
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-3" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-3">					
								<!-- product widget -->							 
								<?php foreach ($getProductsLimit6  as $key => $value1):?>
									<?php if ($key % 3 == 0) echo "<div>"; ?>													
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value1['image'] ?>" alt="">									
									</div>
									<div class="product-body">
										<?php $getProtypesById = $Protypes->getProtypesById($value1['type_id']);
										foreach($getProtypesById as $value): ?>
										<p class="product-category"><?php echo $value['type_name'] ?> </p>
										<?php endforeach; ?>
										<h3 class="product-name"><a href="product.php?id=<?php echo $value1['id'] ?>"> <?php echo $value1['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value1['price']) ?>VNĐ<!--<del class="product-old-price">VNĐ</del>--> </h4>
									</div>
								</div>
								<?php if($key % 3 == 2) echo "</div>" ?>
								<?php endforeach; ?>								
								<!-- /product widget -->
						</div>
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-4">
							<!-- product widget -->							 
							<?php foreach ($getProductsLimit66  as $key => $value1):?>
									<?php if ($key % 3 == 0) echo "<div>"; ?>													
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value1['image'] ?>" alt="">									
									</div>
									<div class="product-body">
										<?php $getProtypesById = $Protypes->getProtypesById($value1['type_id']);
										foreach($getProtypesById as $value): ?>
										<p class="product-category"><?php echo $value['type_name'] ?> </p>
										<?php endforeach; ?>
										<h3 class="product-name"><a href="product.php?id=<?php echo $value1['id'] ?>"> <?php echo $value1['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value1['price']) ?>VNĐ<!--<del class="product-old-price">VNĐ</del>--> </h4>
									</div>
								</div>
								<?php if($key % 3 == 2) echo "</div>" ?>
								<?php endforeach; ?>								
							<!-- /product widget -->
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs"></div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-5">
							<!-- product widget -->							 
							<?php foreach ($getProductsLimit12  as $key => $value1):?>
									<?php if ($key % 3 == 0) echo "<div>"; ?>													
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value1['image'] ?>" alt="">									
									</div>
									<div class="product-body">
										<?php $getProtypesById = $Protypes->getProtypesById($value1['type_id']);
										foreach($getProtypesById as $value): ?>
										<p class="product-category"><?php echo $value['type_name'] ?> </p>
										<?php endforeach; ?>
										<h3 class="product-name"><a href="product.php?id=<?php echo $value1['id'] ?>"> <?php echo $value1['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value1['price']) ?>VNĐ<!--<del class="product-old-price">VNĐ</del>--> </h4>
									</div>
								</div>
								<?php if($key % 3 == 2) echo "</div>" ?>
								<?php endforeach; ?>								
							<!-- /product widget -->			
						</div>
					</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		
		<!-- /SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- section title -->
                    <div class="col-md-12">
                        <?php
                        $ProductType = new ProductType;

                        $getAllProductType = $ProductType->getProductType();

                        foreach ($getAllProductType as $productType) {
                            $id_product_type = $productType['product_type_id'];
                            $getProductTypeById = $ProductType->getProducTypeById($id_product_type);
                            ?>
                            <div class="section-title">
                                <?php foreach ($getProductTypeById as $items) { ?>
                                    <h3 class="title"><?php echo $items['name_product_type']; ?></h3>
                                <?php } ?>

                                <div class="section-nav">
                                    <ul class="section-tab-nav tab-nav">
                                        <li class="active"><a data-toggle="tab" href="#tab<?php echo $id_product_type; ?>">All</a></li>

                                        <?php
                                        $getProtypes_theoProductType = $ProductType->getProtypes_theoProductType($id_product_type);
                                        foreach ($getProtypes_theoProductType as $nameProtype_producttype) {
                                            ?>
                                            <li><a data-toggle="tab" href="#tab<?php echo $id_product_type; ?>"><?php echo $nameProtype_producttype['type_name']; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
<!--                                product-->
                                <?php
                                $id_product_type = $productType['product_type_id'];
                                $Products = new Products();
                                $getAllProductByProductType = $Products->getProductByProductType($id_product_type)
                                ?>
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                    <?php foreach ($getAllProductByProductType as $value1): foreach ($getAllProtypes as $value2):
                                        if ($value1['product_type_id'] == $value2['product_type_id']): ?>

                                            <div class="product">
                                                <div class="product-img">

                                                    <img style="height: 200px;" src="./img/<?php echo $value1['image']; ?>" alt="">
                                                    <div class="product-label">
                                                        <?php if ($value1['feature'] == 1): ?>
                                                            <span class="sale">-8%</span>
                                                        <?php endif; ?>
                                                        <span class="new">NEW</span>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category"><?php echo $value2['type_name']; ?></p>
                                                    <h3 class="product-name"><a href="product.php?id=<?php echo $value1['id'] ?>"><?php echo $value1['name']; ?></a>
                                                    </h3>
                                                    <?php if ($value1['feature'] == 1): ?>
                                                        <h4 class="product-price"> <?php echo number_format($value1['price'] * 0.8); ?>VNĐ<del
                                                                    class="product-old-price"><?php echo number_format($value1['price']); ?>VNĐ</del>
                                                        </h4>
                                                    <?php else: ?>
                                                        <h4 class="product-price"> <?php echo number_format($value1['price']); ?>VNĐ</h4>
                                                    <?php endif; ?>
                                                    <div class="product-rating">
                                                        <?php
                                                        $rating=new Comment();
                                                        $id_products=$value1['id'];
                                                        $rt = $rating->getAverageRatingPerld($id_products);
                                                        foreach($rt as $item){
                                                            $average_rating = $item['average_rating'];
                                                            $full_star = floor($average_rating);
                                                            $half_star = ceil($average_rating-$full_star);
                                                            for($i=0;$i<$full_star;$i++){
                                                                echo '<i class="fa fa-star"></i>';
                                                            }
                                                            if($half_star>0){
                                                                echo '<i class="fa fa-star-half-o"></i>';
                                                            }
                                                            $empty_star=5-$full_star-$half_star;
                                                            for($i=0;$i<$empty_star;$i++){
                                                                echo '<i class="fa fa-star-o"></i>';
                                                            }
                                                            echo '<span style="padding-left: 55px;"></span>';
                                                        }
                                                        ?>
                                                        <style>
                                                            .fa-star {
                                                                color: #d10024;
                                                            }
                                                            .fa-star-half-o {
                                                                color: #d10024;
                                                            }
                                                            .fa-star-o {
                                                                color: #d10024;
                                                            }
                                                        </style>
                                                    </div>
                                                    <div class="product-btns">

                                                        <form action="index.php" method="post">
                                                            <input type="hidden" name="likedId" value="<?php echo $value1['id']; ?>">
                                                            <button class="btn badge btn-danger"><i class="fa fa-heart-o"></i>
<!--                                                                --><?php //echo $value1['pLike'] ?><!--</button>-->
                                                        </form>

                                                        <button class="quick-view"><a href="product.php?id=<?php echo $value1['id'] ?>"><i
                                                                        class="fa fa-eye"></i><span class="tooltipp">quick view</span></a>
                                                            <?php echo $value1['product_view'] ?></button>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <form action="index.php" method="post">
                                                        <input type="hidden" name="cartId" value="<?php echo $value1['id']; ?>">
                                                        <button class="add-to-cart-btn "><i class="fa fa-shopping-cart"></i>
                                                            add to cart</button>
                                                    </form>
                                                </div>
                                            </div>

                                        <?php endif; endforeach; endforeach; ?>

                                    <!-- /product -->
                                </div>
                            </div>
                        <?php } ?>
                    </div>


					<!-- /section title -->

					<!-- Products tab & slick -->
					
					<!-- Products tab & slick -->
					
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>

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
