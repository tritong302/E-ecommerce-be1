<?php session_start();


require("config/Database.php");
require("models/model.php");
require("models/productsModel.php");
require("models/protypesModel.php");
require("models/manufactures.php");
require("models/userModel.php");
require("models/comment.php");
// User
$User = new User;

// Products
$Products = new Products;

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$view = $Products->setView($id);
}



$getAllProducts = $Products->getAllProducts();
$getProductsById = $Products->getProductsById($id);
foreach ($getProductsById as $value):
	$type_id = $value['type_id'];
endforeach;
$getProductsByTypeId = $Products->getProductsByTypeId($type_id);

// Protypes
$Protypes = new Protypes;
$getAllProtypes = $Protypes->getAllProtypes();

if (isset($_POST['likedId'])) {
	$id = $_POST['likedId'];
	if (isset($_SESSION['user']['user_id'])) {
		$userId = $_SESSION['user']['user_id'];
		$r = $Products->likeProductUser($id, $userId);

		$kq = $Products->countwish($userId);

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
//comment
$Comment = new Comment;
$id_products = $value['id'];
$getAllComment = $Comment->getAllCommentById($id_products);
//vua xem
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $item = $Products->getProductsById($id);

    if(!isset($_COOKIE['viewedProduct'])) {
        $value = [$id];
        setcookie('viewedProduct', json_encode($value), time() + 3600);
    }
    else {
        $viewedProduct = json_decode($_COOKIE['viewedProduct'], true);
        // $viewedProduct = explode(',', $_COOKIE['viewedProduct']);
        //var_dump($viewedProduct);
        if(!in_array($id, $viewedProduct)) {
            if(count($viewedProduct) == 5) {
                array_shift($viewedProduct);
            }
            array_push($viewedProduct, $id);
            setcookie('viewedProduct', json_encode($viewedProduct), time() + 3600);
        }
        else {
            unset($viewedProduct[array_search($id, $viewedProduct)]);
            array_push($viewedProduct, $id);
            setcookie('viewedProduct', json_encode($viewedProduct), time() + 3600);
        }
    }
}
?>


<!-- HEADER -->
<?php include("header.php"); ?>
<!-- /HEADER -->

<!-- SECTION -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <?php foreach ($getProductsByTypeId as $value):
	                    if ($value['id'] == $_GET['id']): ?>
                    <div class="product-preview">
                        <img src="./img/<?php echo $value['image'] ?>" alt="">
                    </div>
                    <?php endif; endforeach; ?>
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="">
                    <div class="product-preview">
                        <img src="" alt="">
                    </div>

                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <?php foreach ($getProductsById as $value): ?>
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name"><?php echo $value['name'] ?></h2>
                    <div>
                        <div class="rating-avg">
                            <?php
                            $rating=new Comment();
                            $id_products=$value['id'];
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
                        <a class="review-link" href="#">10 Review(s) | Add your review</a>
                    </div>
                    <div>
                        <h3 class="product-price"><?php echo number_format($value['price']) ?>
                            <!--<del class="product-old-price">VNĐ</del>-->
                        </h3>
                        <span class="product-available">In Stock</span>
                    </div>
                    <p><?php echo $value['description'] ?></p>

                    <div class="product-options">
                        <label>
                            Size
                            <select class="input-select">
                                <option value="0">X</option>
                            </select>
                        </label>
                        <label>
                            Color
                            <select class="input-select">
                                <option value="0">Red</option>
                            </select>
                        </label>
                    </div>

                    <div class="add-to-cart">
                        <div class="qty-label">
                            Qty
                            <div class="input-number">
                                <input type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                        <form action="all.php?page=1" method="post">
                            <input type="hidden" name="cartId" value="<?php echo $value['id']; ?>">
                            <button class="add-to-cart-btn "><i class="fa fa-shopping-cart"></i>
                                add to cart</button>
                        </form>
                    </div>

                    <ul class="product-btns">
                        <li>
                            <form action="all.php?page=1" method="post">
                                <input type="hidden" name="likedId" value="<?php echo $value['id']; ?>">
                                <button class="btn badge btn-danger "><i class="fa fa-heart-o"></i>
                                    <?php echo $value['pLike'] ?></button>
                            </form>
                        </li>

                    </ul>

                    <ul class="product-links">
                        <li>Category:</li>
                        <li><a href="#">Headphones</a></li>
                        <li><a href="#">Accessories</a></li>
                    </ul>

                    <ul class="product-links">
                        <li>Share:</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>

                </div>
            </div>
            <?php endforeach; ?>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                        <li><a data-toggle="tab" href="#tab2">Details</a></li>

                        <li><a data-toggle="tab" href="#tab3">Reviews </a></li>

                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <?php foreach ($getProductsById as $value): ?>
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><?php echo $value['description'] ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->

                        <!-- tab2  -->
                        <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><?php echo $value['description'] ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab2  -->
                        <?php endforeach; ?>

                        <!-- tab3  -->
                        <div id="tab3" class="tab-pane fade in">
                            <div class="row">
                                <!-- Rating -->
                                <div class="col-md-3">

                                    <div id="rating">
                                        <div class="rating-avg">
                                            <?php
                                            $rating=new Comment();
                                            $id_products=$value['id'];
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
                                                echo '<span style="padding-left: 55px;">'. $item['average_rating'] .'</span>';
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
                                        <ul class="rating">
                                            <?php
                                            $id_products = $value['id'];
                                            $Comment = new Comment();
                                            $getCommentCountByRating = $Comment->getCommentCountsByRating($id_products);

                                            // Tạo một mảng để lưu trữ số lượng đánh giá cho mỗi assess
                                            $comment_counts = array_fill(1, 5, 0);

                                            // Lặp qua kết quả và cập nhật mảng comment_counts
                                            foreach ($getCommentCountByRating as $item) {
                                                $assess = $item['assess'];
                                                $comment_count = $item['comment_count'];
                                                $comment_counts[$assess] = $comment_count;
                                            }
                                            $max_comment_count = max($comment_counts);


                                            for ($assess = 5; $assess >= 1; $assess--) {
                                                ?>
                                                <li>
                                                    <div class="rating-stars">
                                                        <?php

                                                        for ($i = 1; $i <= 5; $i++) {
                                                            if ($i <= $assess) {
                                                                echo '<i class="fa fa-star"></i>';
                                                            } else {
                                                                echo '<i class="fa fa-star-o"></i>';
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div style="width: <?php echo ($comment_counts[$assess] / $max_comment_count) * 100; ?>%;"></div>
                                                    </div>
                                                    <span class="sum"><?php echo $comment_counts[$assess]; ?></span>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                        </ul>

                                    </div>
                                </div>
                                <!-- /Rating -->

                                <!-- Reviews -->
                                <div class="col-md-6">
                                    <div id="reviews">
                                        <?php
                                        if (empty($getAllComment)) {
                                            echo '<p>Không có đánh giá nào</p>';
                                        } else {
                                            foreach ($getAllComment as $comment) {
                                                ?>
                                                <ul class="reviews">
                                                    <li>
                                                        <div class="review-heading">
                                                            <h5 class="name"><?php echo $comment['username'] ?></h5>
                                                            <p class="date"><?php echo $comment['time'];?></p>
                                                            <div class="review-rating">
                                                                <?php
                                                                $assess = $comment['assess'];
                                                                for ($i = 1; $i <= 5; $i++) {
                                                                    if ($i <= $assess) {
                                                                        echo '<i class="fa fa-star"></i>';
                                                                    } else {
                                                                        echo '<i class="fa fa-star-o empty"></i>';
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="review-body">
                                                            <p><?php echo $comment['review']; ?></p>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <ul class="reviews-pagination">
                                            <li class="active">1</li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>

                                </div>
                                <!-- /Reviews -->

                                <!-- Review Form -->
                                <?php
                                ini_set('display_errors', 1);
                                ini_set('display_startup_errors', 1);
                                error_reporting(E_ALL);

                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    $username = $_POST['username'];
                                                    $email = $_POST['email'];
                                                    $review = $_POST['review'];
                                                    $assess = $_POST['selectedRating'];
                                                    $Comment->setProductId(isset($_GET['id']) ? $_GET['id'] : null);
                                                    $Comment = new Comment;
                                                    $addCmt = $Comment->addComment($username, $email, $review,$assess);
                                                }
                                                ?>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        var ratingInputs = document.getElementsByName('rating');
                                        var selectedRating;

                                        for (var i = 0; i < ratingInputs.length; i++) {
                                            ratingInputs[i].addEventListener('change', function () {
                                                selectedRating = this.value;
                                                console.log("Selected Rating: " + selectedRating);
                                            });
                                        }
                                        var reviewForm = document.querySelector('.review-form');
                                        reviewForm.addEventListener('submit', function (event) {
                                            var hiddenInput = document.createElement('input');
                                            hiddenInput.type = 'hidden';
                                            hiddenInput.name = 'selectedRating';
                                            hiddenInput.value = selectedRating;
                                            reviewForm.appendChild(hiddenInput);
                                        });
                                    });
                                </script>
                                <div class="col-md-3">
                                    <div id="review-form">
                                        <form class="review-form" method="POST">
                                            <input class="input" type="text" placeholder="Your Name" name="username">
                                            <input class="input" type="email" placeholder="Your Email" name="email">
                                            <textarea class="input" placeholder="Your Review" name="review"></textarea>

                                            <div class="input-rating">
                                                <span>Your Rating: </span>
                                                <div class="stars" >
                                                    <input id="star5" name="rating" value="5" type="radio"><label
                                                        for="star5"></label>
                                                    <input id="star4" name="rating" value="4" type="radio"><label
                                                        for="star4"></label>
                                                    <input id="star3" name="rating" value="3" type="radio"><label
                                                        for="star3"></label>
                                                    <input id="star2" name="rating" value="2" type="radio"><label
                                                        for="star2"></label>
                                                    <input id="star1" name="rating" value="1" type="radio"><label
                                                        for="star1"></label>
                                                </div>
                                            </div>
                                            <button class="primary-btn" type="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /Review Form -->
                            </div>
                        </div>
                        <!-- /tab3  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->


</div>
<!-- /SECTION -->

<!-- Section -->
<!-- <?php include("related_products.php"); ?> -->
<!-- /Section -->

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